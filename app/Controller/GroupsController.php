<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');
       
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('admin_add');
        }
/**
 * @method	admin_index
 * @tutorial	List group module.
 *
 */
	public function admin_index() {
			// Get Group ID of current Login user
			$this->loadModel('Login');
			$getid = $this->Login->find('first',array(
							'fields'=>array('group_id'),
							'conditions'=>array('Login.id'=>$this->Auth->user('id'))));
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
							$conditions['OR'] = array('Group.name LIKE' => '%' . $value . '%');
						}else{
								$conditions['Group.'.$param_name] = $value;
						}	
	                    	$this->request->data['Filter'][$param_name] = $value;
					}
				}
				$conditions['AND'] = array(
						array('Group.id !=' => $getid['Login']['group_id']),
						array('Group.is_delete' => 0));
			}
            $limit = (isset($this->params['named']['limit']))?$this->params['named']['limit']:5; 
            $this->Group->recursive = 0;
            $this->paginate = array(
                'limit' => $limit,
                'conditions' => $conditions,
                'order'=>array('Group.id'=> 'DESC')
            );
            //debug($this->paginate());die;            
            $this->set('Groups', $this->paginate());
            $this->set('status',array('t'=>'Active','f'=>'Deactive'));
            $this->set('limit_arr',array('5'=>'5','10'=>'10','20'=>'20'));
            $this->set('limit',$limit);
            // Pass the search parameter to highlight the text
            $this->set('keyword', isset($this->params['named']['keyword']) ? $this->params['named']['keyword'] : "");
        }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
// 	public function admin_view($id = null) {
// 		if (!$this->Group->exists($id)) {
// 			throw new NotFoundException(__('Invalid group'));
// 		}
// 		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
// 		$this->set('group', $this->Group->find('first', $options));
// 	}

/**
 * @method	admin_add
 * @tutorial	Used to add group from frontend.
 *
 */
	public function admin_add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Group->data = $this->data;
			if($this->Group->validates()){
				$groupData['Group']['name'] = $this->data['Group']['name'];
				$groupData['Group']['status'] = 't';
				$this->Group->create();
				if ($this->Group->save($groupData)) {
					$this->getFlash(1,'The group has been saved.');
					return $this->redirect(array('action' => 'add'));
				} else {
					$this->getFlash(0,'The group could not be saved. Please, try again.');
				}
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
// 	public function admin_edit($id = null) {
// 		if (!$this->Group->exists($id)) {
// 			throw new NotFoundException(__('Invalid group'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Group->save($this->request->data)) {
// 				$this->Session->setFlash(__('The group has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
// 			$this->request->data = $this->Group->find('first', $options);
// 		}
// 	}

// /**
//  * admin_delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function admin_delete($id = null) {
// 		$this->Group->id = $id;
// 		if (!$this->Group->exists()) {
// 			throw new NotFoundException(__('Invalid group'));
// 		}
// 		$this->request->allowMethod('post', 'delete');
// 		if ($this->Group->delete()) {
// 			$this->Session->setFlash(__('The group has been deleted.'));
// 		} else {
// 			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'));
// 		}
// 		return $this->redirect(array('action' => 'index'));
// 	}
	
/**
* @method	admin_AddEditGroup
* @tutorial		Used to save or update group detail.
*
*/
	public function admin_AddEditGroup(){
		if(!$this->RequestHandler->isPost()) {
			throw new NotFoundException(__('Invalid request'));
		}
		if($this->request->is('post')){
				if(!empty($this->data['Group']['id'])){	// Edit Group Data
					
					// Check groupname exist or not
					$check_groupname = $this->Group->find('first',array(
							'fields'=>array('name'),
							'conditions'=>array('Group.name'=>$this->data['Group']['name'], 'Group.id !=' =>$this->data['Group']['id'])));
					if(empty($check_groupname)){
						$this->Group->id = $this->data['Group']['id'];
						if($this->Group->save($this->data)){
							$class = "alert-success";
							$title = "Success";
							$msg = "Group updated successfuly.";
						}else{
							$class = "alert-success";
							$title = "Success";
							$msg = "Group cound not be saved.";
						}
					}else{
						$class = "alert-danger";
						$title = "Error";
						$msg = "Group already exist.";
					}
				}else {	// Add Group Data
					
					// Check groupname exist or not
					$check_groupname = $this->Group->find('first',array(
							'fields'=>array('id'),
							'conditions'=>array('Group.name'=>$this->data['Group']['name'])));
					if(empty($check_groupname)){
						$this->Group->create();
						if($this->Group->save($this->data['Group'])){
							$class = "alert-success";
							$title = "Success";
							$msg = "Group added successfuly.";
						}else{
							$class = "alert-success";
							$title = "Success";
							$msg = "Group cound not be saved.";
						}
					}else{
						$class = "alert-danger";
						$title = "Error";
						$msg = "Group already exist.";
					}
				}
				$this->set('class',$class);
				$this->set('title',$title);
				$this->set('msg',$msg);
				echo $this->render('/Elements/ajaxMessage');
				exit();
			}
	}
	
/**
* @method	admin_Status
* @tutorial		Used to group status activate or deactivate.
*
*/
	public function admin_Status(){
		if(!$this->RequestHandler->isPost()) {
			throw new NotFoundException(__('Invalid request'));
		}
		if($this->request->is('post')){
			$type = ($this->data['type'] == 1)?'t':'f';
			$msgtype = ($this->data['type'] == 1)?'activated':'deactivated';
			if($this->data['all'] == 1){
				try {
					$id = explode(",",$this->data['id']);
					$this->Group->updateAll(
							array('Group.status' => "'$type'"),
							array('Group.id' => $id));
					$class = "alert-success";
					$title = "Success";
					$msg = "Group $msgtype successfuly.";
				}catch (Exception $e){
					$class = "alert-danger";
					$title = "Error";
					$msg = "Group could not be $msgtype.";
				}
			}
			elseif ($this->data['all'] == 0){
				try {
					$this->Group->id = $this->data['id'];
					$this->Group->save(array('Group' => array('status' => $type)));
					$class = "alert-success";
					$title = "Success";
					$msg = "Group $msgtype successfuly.";
				}catch (Exception $e){
					$class = "alert-danger";
					$title = "Error";
					$msg = "Group could not be $msgtype.";
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
* @tutorial		Used to delete groups. (Not deleting from database.)
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
					$this->Group->updateAll(
							array('Group.is_delete' => 1),
							array('Group.id' => $id));
					$class = "alert-success";
					$title = "Success";
					$msg = "Group deleted successfuly.";
				}catch (Exception $e){
					$class = "alert-danger";
					$title = "Error";
					$msg = "Group could not be deleted.";
				}
			}elseif ($this->data['all'] == 0){
				try {
					$this->Group->id = $this->data['id'];
					$this->Group->save(array('Group' => array('is_delete' => 1)));
					$class = "alert-success";
					$title = "Success";
					$msg = "Group deleted successfuly.";
				}catch (Exception $e){
					$class = "alert-danger";
					$title = "Error";
					$msg = "Group could not be deleted.";
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
* @method	admin_EditViewGroup
* @tutorial		Used to view group detail on edit toggle.
*
*/
	public function admin_EditViewGroup(){
		if(!$this->RequestHandler->isPost()) {
			throw new NotFoundException(__('Invalid request'));
		}
		if($this->request->is('post')){
			$group_detail = $this->Group->find('first',
					array('fields' => array('id','name','status'),
							'conditions' => array('Group.id'=>$this->data['id'])));
			echo json_encode($group_detail);
			exit;
		}
	}
	
}
