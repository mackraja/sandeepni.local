<?php
App::uses('AppController', 'Controller');
/**
 * Logins Controller
 *
 * @property Login $Login
 * @property PaginatorComponent $Paginator
 */
class LoginsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('admin_login');
	}
/**
 * @method	admin_login
 * @tutorial	Used to login users.
 *
 */
        public function admin_login(){
            $this->layout = 'admin';
            if ($this->request->is('post')) {
                $this->Login->data = $this->data;
                if($this->Login->validates()){
                    if(!$this->Auth->login()) {
                    	$username = $this->Login->find('count',array(
                                                'fields' => array('id'),
                                                'conditions'=>array('Login.username'=>$this->request->data['Login']['username'])));
                    	if($username === 0){
                        	$this->getFlash(0,"Invalid Username. Please try again...");
                        }else if($username > 0){
                        	$status = $this->Login->find('count',array(
                                                'fields' => array('id'),
                                                'conditions'=>array('Login.username'=>$this->request->data['Login']['username'],'Login.status'=>'t')));
                        	if($status === 0){
                        		$this->getFlash(0,"Please activate your account.");
                        	}else{
                        		$this->getFlash(0,"Invalid Password. Please try again...");
                        	}
                        }
                            $this->redirect(array('controller' => 'Logins', 'action' => 'admin_login'));
                    }else{
                            $this->Session->write('admin',TRUE);
                            $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));
                        }   // end else auth
            	}   // end validation
            }   // end post
        }   // end function

/**
 * @method	admin_logout
 * @tutorial	Used to logout users.
 *
 */
        public function admin_logout(){
            $this->Session->write('admin',FALSE);
            $this->Auth->logout();
            $this->getFlash(1,"logged out.");
            $this->redirect(array('controller' => 'Logins', 'action' => 'admin_login'));
        }

/**
 * @method	admin_status
 * @tutorial	Used to users status activate or deactivate.
 *
 */
		public function admin_status(){
			if(!$this->RequestHandler->isPost()) {
				throw new NotFoundException(__('Invalid request'));
			}
                if($this->request->is('post')){
                	$type = ($this->data['type'] == 1)?'t':'f';
                	$msgtype = ($this->data['type'] == 1)?'activated':'deactivated';
                	if($this->data['all'] == 1){
                		try {
                			$id = explode(",",$this->data['id']);
                			$this->Login->updateAll(
                					array('Login.status' => "'$type'"),
                					array('Login.id' => $id));
                			$class = "alert-success";
                			$title = "Success";
                			$msg = "User $msgtype successfuly.";
                		}catch (Exception $e){
                			$class = "alert-danger";
                			$title = "Error";
                			$msg = "User could not be $msgtype.";
                		}
                	}
                	elseif ($this->data['all'] == 0){
                		try {
                			$this->Login->id = $this->data['id'];
                			$this->Login->save(array('Login' => array('status' => $type)));
                			$class = "alert-success";
                			$title = "Success";
                			$msg = "User $msgtype successfuly.";
                		}catch (Exception $e){
                			$class = "alert-danger";
                			$title = "Error";
                			$msg = "User could not be $msgtype.";
                		}
                	}
                 $this->set('class',$class);
                 $this->set('title',$title);
                 $this->set('msg',$msg);
                 echo $this->render('/Elements/ajaxMessage');
                 exit;
                }
        }

/**
 * @method	admin_delete
 * @tutorial	Used to delete users. (Not deleting from database.)
 *
 */
        public function admin_delete() {
        	if(!$this->RequestHandler->isPost()) {
        		throw new NotFoundException(__('Invalid request'));
        	}
        	if($this->request->is('post')){
        		if($this->data['all'] == 1){
        			try {
        				$id = explode(",",$this->data['id']);
        				$this->Login->updateAll(
        						array('Login.is_delete' => 1),
        						array('Login.id' => $id));
        				$class = "alert-success";
        				$title = "Success";
        				$msg = "User deleted successfuly.";
        			}catch (Exception $e){
        				$class = "alert-danger";
        				$title = "Error";
        				$msg = "User could not be deleted.";
        			}
        		}elseif ($this->data['all'] == 0){
        			try {
        				$this->Login->id = $this->data['id'];
        				$this->Login->save(array('Login' => array('is_delete' => 1)));
        				$class = "alert-success";
        				$title = "Success";
        				$msg = "User deleted successfuly.";
        			}catch (Exception $e){
        				$class = "alert-danger";
        				$title = "Error";
        				$msg = "User could not be deleted.";
        			}
        		}
        		 $this->set('class',$class);
                 $this->set('title',$title);
                 $this->set('msg',$msg);
        		echo $this->render('/Elements/ajaxMessage');
        		exit;
        	}
        }
}
