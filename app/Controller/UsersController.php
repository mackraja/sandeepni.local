<?php
App::uses('AppController', 'Controller');
App::uses ('CakeEmail','Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public $components = array('RequestHandler','Qimage');
    
/**
 * @see Controller::beforeFilter()
 * 
 */    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('initDB','admin_forget','admin_reset','admin_activate','admin_register');
    }
    
/**
 * @method	initDB
 * @tutorial	Used to set ACL on groups or users.
 */    
    public function initDB() {
        
        $group = $this->User->Group;
        
        // Allow admins to everything
        $group->id = 501;
        $this->Acl->allow($group, 'controllers');

        // allow managers to posts and widgets
        $group->id = 502;
        $this->Acl->deny($group, 'controllers/users/admin_status');
        
        // allow basic users to log out
        //$this->Acl->allow($group, 'controllers/users/logout');

        // we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }
    
/**
 * @method	index
 * @tutorial	Frontend Method
 * 
 */
        public function index() {
            $this->layout = 'front';
        }

/**
 * @method	admin_index
 * @tutorial	List of users module.
 *
 */
        public function admin_index(){
        	$this->loadModel('Login');
            //debug($this->data['Filter']);die;
            $conditions = array();
			//Transform POST into GET
			if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
				$filter_url['controller'] = $this->request->params['controller'];
				$filter_url['action'] = $this->request->params['action'];
				// We need to overwrite the page every time we change the parameters
				$filter_url['page'] = 1;
	                        
				// for each filter we will add a GET parameter for the generated url
				foreach($this->data['Filter'] as $name => $value){
                                if($value){
                                    $value = strip_tags(trim($value));
                                    // You might want to sanitize the $value here
                                    // or even do a urlencode to be sure
                                    $filter_url[$name] = urlencode($value);
					}
				}
               	//debug($filter_url);die;
				// now that we have generated an url with GET parameters, 
				// we'll redirect to that page
				return $this->redirect($filter_url);
			} else {
	                foreach($this->params['named'] as $param_name => $value){
					// Don't apply the default named parameters used for pagination
					if(!in_array($param_name, array('page','sort','direction','limit'))){
                            if($param_name == "keyword"){
                            $value = strip_tags(trim($value));
							$conditions['OR'] = array(
                                                    array('Login.username LIKE' => '%' . $value . '%'),
                                                    array('User.email LIKE' => '%' . $value . '%'),
                                                    array('User.first_name LIKE' => '%' . $value . '%'),
                                                    array('User.last_name LIKE' => '%' . $value . '%')    
							);
						}else {
								$conditions['Login.'.$param_name] = $value;
						}
	                        $this->request->data['Filter'][$param_name] = $value;
					}
				}
	        	$conditions['AND'] = array(
	        							array('Login.id !=' => $this->Auth->user('id')),
	        							array('Login.is_delete' => 0));
			}
            $limit = (isset($this->params['named']['limit']))?$this->params['named']['limit']:5; 
            $this->User->recursive = 0;
            $this->paginate = array(
                'limit' => $limit,
                'conditions' => $conditions,
                'order'=>array('User.id'=> 'DESC')
            );
            //debug($this->paginate());die;            
            $this->set('users', $this->paginate());
            $this->set('status',array('t'=>'Active','f'=>'Deactive'));
            $this->set('limit_arr',array('5'=>'5','10'=>'10','20'=>'20'));
            $this->set('limit',$limit);
            $this->loadModel('Group');
            $this->set('group', $this->Group->find('list', array('conditions' => array("Group.status" => 't'))));
            // Pass the search parameter to highlight the text
            $this->set('keyword', isset($this->params['named']['keyword']) ? $this->params['named']['keyword'] : "");
        }

/**
 * @method	admin_register
 * @tutorial	Register users from frontend.
 *
 */     
        public function admin_register(){
            $this->layout = 'admin';
            $this->loadModel('Group');
            $this->set('group', $this->Group->find('list', array('conditions' => array("Group.status" => 't'))));
            if ($this->request->is('post')) {
                $this->User->data = $this->data;
                if($this->User->validates()){
                	if($this->is_connected()){
                    	$key = Security::hash(String::uuid(),'sha512',true);
                        $hash = sha1($this->request->data['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'Users','action'=>'activate'), true ).'/'.$key.'#'.$hash;
                        
                        /* =======Email======*/
                        $Email = new CakeEmail();
                        $Email->config('gmail')
                                ->template('gmail','gmail')
                                ->emailFormat('html')
                                ->to($this->request->data['User']['email'])
                                ->subject('Activate your GolokTech account')
                                ->viewVars(array('username' => $this->request->data['User']['username'], 'url' => $url,'type' => 'activate'));
                        try {
                            if($Email->send()) {
                            	
                            	// Saving data in logins table
                        		$login_add['Login']['group_id'] = $this->data['User']['group_id'];
                            	$login_add['Login']['username'] = $this->data['User']['username'];
                            	$login_add['Login']['password'] = $this->data['User']['password'];
                            	$login_add['Login']['status'] = 'f';
                            	 
                            	$this->Login->create();
                            	$this->Login->save($login_add);			// added login details successfuly.
                            	$last_id = $this->Login->getLastInsertId();
                            	 
                            	// Saving data in users table
                            	$user_add['User']['login_id'] = $last_id;
                            	$user_add['User']['email'] = $this->data['User']['email'];
                            	$user_add['User']['first_name'] = $this->data['User']['first_name'];
                            	$user_add['User']['last_name'] = $this->data['User']['last_name'];
                            	
                            	$user_add['User']['server_name'] = $_SERVER['SERVER_NAME'];
                            	$user_add['User']['server_add'] = $this->request->clientIp();
                            	$user_add['User']['browser'] = $_SERVER['HTTP_USER_AGENT'];
                            	$user_add['User']['token'] = $key;
                            	 
                            	$this->User->create();	
                                if ($this->User->save($user_add)) {
                                	$email = $user_add['User']['email'];
                                	$this->getFlash(1,"We have sent an email to <strong>$email</strong>. Open it up to activate your account.");
                                }else {
                                	$this->getFlash(0,"The user could not be saved. Please, try again...");
                                }   // end else !$this->request->data
                            }else{
                            	$this->getFlash(0,"Mail not sent due to Server Slow.");
                            }   // end else !$Email->send()
                        }catch (Exception $e) {
                        	$this->getFlash(0,"Mail not sent due to Server Slow.");
                        }   // end catch 
                        $this->redirect(array('controller' => 'Logins', 'action' => 'admin_login'));
                    }else{
                    		$this->getFlash(0,"Internet is not Connected.");
                        }   // end else check internet connection
                }   // end validation
            }   // end post
        }   // end function 

/**
 * @method	admin_forget
 * @tutorial	Send mail to users id if user forget password.
 *
 */     
        public function admin_forget(){
            $this->layout = 'admin';
            if ($this->request->is('post')) {
                $this->User->data = $this->data;
                $this->User->validate = $this->User->validateforgetemail;
                if($this->User->validates()){
                    $email = $this->User->find('first',array('fields'=>array('id','email','login_id'), 'conditions'=>array('User.email'=>$this->request->data['User']['email'])));
                    if($email) {
                    	$this->loadModel('Login');
                    	$status = $this->Login->find('first',array('fields'=>array('username'),'conditions'=>array('Login.id'=>$email['User']['login_id'],'Login.status'=>'t')));
                    	if($status) {
                            if($this->is_connected()){
                                $key = Security::hash(String::uuid(),'sha512',true);
                                $hash = sha1($status['Login']['username'].rand(0,100));
                                $url = Router::url( array('controller'=>'Users','action'=>'reset'), true ).'/'.$key.'#'.$hash;

                                /* =======Email======*/
                                $Email = new CakeEmail();
                                $Email->config('gmail')
                                        ->template('gmail','gmail')
                                        ->emailFormat('html')
                                        ->to($email['User']['email'])
                                        ->subject('GolokTech Reset Password')
                                        ->viewVars(array('username' => $status['Login']['username'], 'url' => $url,'type' => 'forgot'));
                                try {
                                    if($Email->send()){
                                     $this->User->id = $email['User']['id'];
                                     if($this->User->saveField('token',$key)){
                                     	$this->getFlash(1,"Please check your email to reset password.");
                                    }else{
                                    	$this->getFlash(0,"Data could not be saved.");
                                    }}   // end else !$Email->send()
                                }catch (Exception $e) {
                                	$this->getFlash(0,"Mail not sent due to Server Slow.");
                                }
                            }else{
                            	$this->getFlash(0,"Internet is not Connected.");
                            }   // end else check internet connection
                        }else{
                        	$this->getFlash(0,"Please activate your account.");
                        }   // end else $email['User']['status'] == 0;
                    }else{
                    	$this->getFlash(0,"No account were found with this email address. Please try again...");
                    }   // end else !$email
                }   // end validation
            }   // end post
        }   // end function

/**
 * @method	admin_activate
 * @tutorial	To check user account is activated by token.
 *
 */        

        public function admin_activate($token = NULL){
        	$db_token = $this->User->find('first',array('fields'=>'id,login_id', 'conditions'=>array('User.token'=>$token)));
        	if($db_token){
                $key = Security::hash(String::uuid(),'sha512',true);
                $this->User->id = $db_token['User']['id'];
                $this->User->save(array('User'=>array('token'=>$key)));
                $this->loadModel('Login');
                $this->Login->id = $db_token['User']['login_id'];
                $this->Login->save(array('Login'=>array('status'=>'t')));
                $this->getFlash(1,"Your account activated successfully.");
            }else {
            	$this->getFlash(0,"Token expired. Please resend request.");
            }   // end else !$db_token
            $this->redirect(array('controller' => 'Logins', 'action' => 'admin_login'));
        }

/**
 * @method	admin_reset
 * @tutorial	Reset user password.
 *
 */

        public function admin_reset($token = NULL){
            $db_token = $this->User->find('first',array('fields'=>'id,login_id', 'conditions'=>array('User.token'=>$token)));
            if(!$db_token){
            	$this->getFlash(0,"Token expired. Please resend request.");
                $this->redirect(array('controller' => 'Logins', 'action' => 'admin_login'));
            }
            $this->layout = 'admin';
            //pr($this->data);die;
            if ($this->request->is('post')) {
                $this->User->data = $this->data;
                $this->User->validate = $this->User->validateregister;
                if($this->User->validates()) {
                    $key = Security::hash(String::uuid(),'sha512',true);
                    $this->User->id = $db_token['User']['id'];
                    $this->request->data['User']['token'] = $key;
                    $this->User->save($this->request->data);
                    $this->loadModel('Login');
                    $this->Login->id = $db_token['User']['login_id'];
                    $this->Login->save(array('Login'=>array('password'=>  $this->request->data['User']['password'])));
                    $this->getFlash(1,"Password Changed.");
                    $this->redirect(array('controller' => 'Logins', 'action' => 'admin_login'));
                }   // end validation
            }   // end post
        }   // end function

/**
 * @method	admin_dashboard
 * @tutorial	Dashboard page after login.
 *
 */     
        public function admin_dashboard()
        {
        	
        }

/**
 * @method	admin_profile
 * @tutorial	Used to save 1.) Personal information 2.) Update user image 3.) Change password 
 *
 */
        public function admin_profile(){
            
        	$this->set('tab',0);
        	if ($this->request->is('post') || $this->request->is('put')) 
            {
            	//debug($this->data);die;
            	// change personal info
                if($this->request->data['User']['form_type'] == 1){
                	$this->User->data = $this->data;
                	if($this->User->validates()) {
                		$this->User->id = $this->data['User']['id'];
                		if($this->User->save($this->User->data)){
                			$this->getFlash(1,'User personal info saved successfully.');
                			$this->redirect(array('controller' => 'Users', 'action' => 'admin_profile'));
                		}else{
                			$this->getFlash(0,'User personal info could not be saved.');
                		}
                	}
                	$this->set('tab',1);
                // change user image
                    }elseif($this->request->data['User']['form_type'] == 2){
                    	$this->User->data = $this->data;
                    	if($this->User->validates()) {
                    		
                    		// Renamed file
                    		$extension = pathinfo($this->data['User']['file']['name'], PATHINFO_EXTENSION);
                    		$enc_name = 'u'.substr(md5(uniqid(rand())), 0, 15).'.'.$extension;
                    		$filepath = 'assets/files' . DS . 'user'. DS;
                    		rename($filepath.$this->data['User']['file']['name'],$filepath.$enc_name);
                    		
                    		// Crop Image
                    		$data['x'] = $this->data['User']['x1'];
                    		$data['y'] = $this->data['User']['y1'];
                    		$data['w'] = $this->data['User']['w'];
                    		$data['h'] = $this->data['User']['h'];
                    		$data['output'] = $filepath;
                    		$data['file'] = $filepath.$enc_name;
                    		$this->Qimage->crop($data);
                    		
                    		// Saving Croped Image
                    		$data['user_id'] = $this->data['User']['id'];
                    		$data['name'] = $enc_name;
                    		$data['description'] = 'crop';
                    		$data['width'] = $this->data['User']['w'];
                    		$data['height'] = $this->data['User']['h'];
                    		$data['type'] = $extension;
                    		$data['status'] = 't';
                    		unset($data['w'], $data['h'],$data['output'],$data['file']);
                    		
                    		// Check User Image
                    		$this->loadModel('UserFolder');
                    		$check_userImage = $this->UserFolder->find('first',array('fields'=>'id,name', 
                    												'conditions'=>array('UserFolder.user_id'=>$this->data['User']['id'])));
                    		if($check_userImage){
                    			$check_userImageId = $check_userImage['UserFolder']['id'];
                    			unlink($filepath.$check_userImage['UserFolder']['name']);
                    			unlink($filepath.'thumb/'.$check_userImage['UserFolder']['name']);
                    			$this->UserFolder->id = $check_userImageId;
                    		}else{
                    			$check_userImageId = '';
                    			$this->UserFolder->create();
                    		}
                    		
                    		if($this->UserFolder->save($data)){
                    			
                    			//Thumb Image
                    			unset($data['x'], $data['y'],$data['user_id'],$data['description'],$data['type'],$data['status'],$data['name']);
                    			$data['file'] = $filepath.$enc_name;
                    			$data['width'] = '29';
                    			$data['height'] = '29';
                    			$data['output'] = 'assets/files' . DS . 'user/thumb' . DS;
                    			if (!is_dir($data['output'])){
                    				mkdir($data['output'],0777, true);
                    			}
                    			$this->Qimage->resize($data);
                    		}
                    		$this->getFlash(1,'User profile image updated successfully.');
                    		$this->redirect(array('controller' => 'Users', 'action' => 'admin_profile'));
                    	}
                    	$this->set('tab',2);
					// change user password                        
                    }elseif($this->request->data['User']['form_type'] == 3){
                    	$this->User->data = $this->data;
                    	if($this->User->validates()) {
                    		$this->Login->id = $this->data['User']['id'];
                    		$password = $this->data['User']['password'];
	                    	if($this->Login->saveField('password',$password)){
	                    		$this->getFlash(1,'User password saved successfully.');
	                    		$this->redirect(array('controller' => 'Users', 'action' => 'admin_profile'));
	                		}else{
	                			$this->getFlash(0,'User password could not be saved.');
	                		}
                    	}else{
                    		$nv_data = $this->data['User'];
                    	}
                    	$this->set('tab',3);
                    }
            }
            $fields = array('User.id','User.email','User.first_name','User.last_name','User.dob','User.mobile','User.interest','User.occupation',
            		'User.about','User.country','User.state','User.city','User.address','Login.id','Login.username','UserFolder.name','UserFolder.width','UserFolder.height');
            $profile = $this->User->find('first', array('fields'=>$fields,'conditions'=>array('User.login_id'=>$this->Auth->user('id'))));
            $nv_data = isset($nv_data)?$nv_data:array();
            $new_nv_data['User'] = array_merge($profile['User'],$nv_data);
            $this->request->data = array_merge($profile,$new_nv_data);
            $this->set('thumb',$profile['UserFolder']['name']);
        }
        
/**
 * @method	admin_AddEditUser
 * @tutorial	Used to save or update users detail.
 * 
 */
        public function admin_AddEditUser(){
            if(!$this->RequestHandler->isPost()) {
                throw new NotFoundException(__('Invalid request'));
            }
                if($this->request->is('post')){
                	$this->loadModel('Login');
                	$remove = array('');
                    $add_edit_user = array_diff($this->data['User'], $remove);
                    if(!empty($add_edit_user)){
                    	
                    	if(isset($add_edit_user['loginid']) && isset($add_edit_user['userid'])){
                    		$condition_username = array('Login.username'=>$add_edit_user['username'], 'Login.id !=' =>$add_edit_user['loginid']);
                    		$condition_email = array('User.email'=>$add_edit_user['email'], 'User.id != '=>$add_edit_user['userid']);
                    	}else{
                    		$condition_username = array('Login.username'=>$add_edit_user['username']);
                    		$condition_email = array('User.email'=>$add_edit_user['email']);
                    	}
                    	// Check username exist or not
                    	$check_username = $this->Login->find('count',array(
                    			'fields'=>array('id'),
                    			'conditions'=>$condition_username));
                    	// Check email exist or not
                    	$check_email = $this->User->find('count',array(
                    			'fields'=>array('id'),
                    			'conditions'=>$condition_email));
                    	 
                        if(!empty($add_edit_user['userid'])){	// Edit User Data
                            switch (true){
                        		case ($check_username === 0 && $check_email === 0):
                        			// Check password length
                        			if(!isset($add_edit_user['password']) || (strlen($add_edit_user['password'])>=5 && strlen($add_edit_user['password'])<=15)) {
                        				 
                        				$group_id = $add_edit_user['group_id'];
                        				$username = trim($add_edit_user['username']);
                        				$login_edit['Login.username'] = "'$username'";
                        				$login_edit['Login.group_id'] = "'$group_id'";
                        				if(isset($add_edit_user['password'])){
                        					$passwordHasher = new BlowfishPasswordHasher();
                        					$password = $passwordHasher->hash($add_edit_user['password']);
                        					$login_edit['Login.password'] = "'$password'";
                        				}
                        				 
                        				$this->Login->updateAll($login_edit,array('Login.id' => $add_edit_user['loginid']));
                        				 
                        				$email = $add_edit_user['email'];
                        				$first_name = trim($add_edit_user['first_name']);
                        				$last_name = trim($add_edit_user['last_name']);
                        				$user_edit['User.email'] = "'$email'";
                        				$user_edit['User.first_name'] = "'$first_name'";
                        				$user_edit['User.last_name'] = "'$last_name'";
                        				 
                        				$this->User->updateAll($user_edit,array('User.id' => $add_edit_user['userid']));
                        				 
                        				$class = "alert-success";
                        				$title = "Success";
                        				$msg = "User updated successfuly.";
                        			}else{
                        				$class = "alert-danger";
                        				$title = "Error";
                        				$msg = "Passwords must be between 5 and 15 characters long.";
                        			}
                        			break;
                        		case ($check_email === 1 && $check_username === 1):
	                        			$class = "alert-danger";
	                        			$title = "Error";
	                        			$msg = "Username or Email is already exist.";
                        			break;
                        		case ($check_username === 1):
	                        			$class = "alert-danger";
	                        			$title = "Error";
	                        			$msg = "Username is already exist.";
                        			break;
                        		case ($check_email === 1):
	                        			$class = "alert-danger";
	                        			$title = "Error";
	                        			$msg = "Email is already exist.";
                        			break;
                        	}
                        }else {		// Add User Data
                        	switch (true){
                        		case ($check_username === 0 && $check_email === 0):
                        			// Saving data in logins table
                        			//pr($add_edit_user);die;
                        			//echo "Here";die;
                        			$login_add['Login']['group_id'] = $add_edit_user['group_id'];
                        			$login_add['Login']['username'] = trim($add_edit_user['username']);
                        			$login_add['Login']['password'] = trim($add_edit_user['password']);
                        			
                        			$this->Login->create();
                        			$this->Login->save($login_add);
                        			$login_last_id = $this->Login->getLastInsertId();
                        			
                        			// Saving data in users table
                        			$user_add['User']['login_id'] = $login_last_id;
                        			$user_add['User']['email'] = $add_edit_user['email'];
                        			$user_add['User']['first_name'] = trim($add_edit_user['first_name']);
                        			$user_add['User']['last_name'] = trim($add_edit_user['last_name']);
                        			$user_add['User']['server_name'] = $_SERVER['SERVER_NAME'];
                        			$user_add['User']['server_add'] = $this->request->clientIp();
                        			$user_add['User']['browser'] = $_SERVER['HTTP_USER_AGENT'];
                        			
                        			$this->User->create();
                        			$this->User->save($user_add);
                        			$user_last_id = $this->User->getLastInsertId();
                        			
                        			if(!empty($user_last_id) && !empty($login_last_id)){
                        				$class = "alert-success";
                        				$title = "Success";
                        				$msg = "User created successfuly.";
                        			}else{
                        				$class = "alert-danger";
                        				$title = "Error";
                        				$msg = "User cound not be created.";
                        			}	
                        		break;
                        		case ($check_email === 1 && $check_username === 1):
                        			$class = "alert-danger";
                        			$title = "Error";
                        			$msg = "Username or Email is already exist.";
                        		break;
                        		case ($check_username === 1):
                        			$class = "alert-danger";
                        			$title = "Error";
                        			$msg = "Username is already exist.";
                        		break;
                        		case ($check_email === 1):
                        			$class = "alert-danger";
                        			$title = "Error";
                        			$msg = "Email is already exist.";
                        		break;
                        	}
                        }
                        $this->set('class',$class);
                        $this->set('title',$title);
                        $this->set('msg',$msg);
                        echo $this->render('/Elements/ajaxMessage');
                        exit();
                    }
                }
        }

/**
* @method	admin_EditViewUser
* @tutorial		Used to view users detail on edit toggle.
*
*/
        public function admin_EditViewUser(){
           if(!$this->RequestHandler->isPost()) {
                throw new NotFoundException(__('Invalid request'));
            }
               if($this->request->is('post')){
               	$this->loadModel('Group');
                   $user_detail = $this->User->find('first',
                            array('fields' => array('User.id','User.login_id','User.first_name','User.last_name',
                            						'User.email','Login.username','Login.group_id'),
                            'conditions' => array('User.login_id'=>$this->data['id'])));
                   $group_name = $this->Group->find('first',
                            array('fields' => array('name'),
                            'conditions' => array('Group.id'=>$user_detail['Login']['group_id'])));
                   $result = array_merge($user_detail,$group_name);
                   echo json_encode($result);
                   exit;
               }
        }

/**
 * admin_mail method
 * 
 */ 
//         public function admin_mail(){
//            debug($this->data);
//            die;
//         }
        
/**
 * @method	admin_uploadImage
 * @tutorial	Used to upload images to server.
 * 
 */        
        public function admin_uploadImage(){
        	if($this->data['User']['file']['error'] == 0){
        		$filepath = 'assets/files' . DS . 'user'. DS;
        		if (!is_dir($filepath)){
                	mkdir($filepath,0777, true);
                }
                list($width, $height) = getimagesize($this->data['User']['file']['tmp_name']);
                if($width >= 800  && $height >= 800 ){
                	$class = "alert-danger";
                	$title = "Error";
                	$msg = "Image width and height must be less than or equal to 800px.";
                	$this->set('class',$class);
                	$this->set('title',$title);
                	$this->set('msg',$msg);
                	echo $this->render('/Elements/ajaxMessage');
                }else{
                	$pth = $filepath.$this->data['User']['file']['name'];
                	move_uploaded_file($this->data['User']['file']['tmp_name'], $pth);
                	echo $this->data['User']['file']['name'];
                }
                exit;
        	}
        }
        
/**
 * @method	admin_deleteImage
 * @tutorial	Used to delete unwanted images.
 * 
 */        public function admin_deleteImage(){
 				if($this->data['type'] == 'user'){
 					$path = 'assets'. DS .'files' . DS . 'user' . DS;
 				}
 				unlink($path.$this->data['name']);
 				exit;
        	}
        
//        public function ajax_validate_form(){
//            if($this->RequestHandler->isAjax()) {
//                $this->data['User'][$this->params['form']['field']] = $this->params['form']['value'];
//                $this->User->data = $this->data;
//                $this->User->validate = $this->User->validateregister;
//                if($this->User->validates()){
//                    $this->autoRender = FALSE;
//                }else{
//                    $error = $this->validationErrors($this->User);
//                    $this->set('error',$error[$this->params['form']['field']]);
//                }
//            }
//        }
}