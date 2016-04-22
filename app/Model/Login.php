<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * Login Model
 *
 */
class Login extends AppModel {

/**
 * ACL behavior
 * @property	$actAs
 * @tutorial	To create ACO's.
 */	
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Login']['group_id'])) {
			$groupId = $this->data['Login']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		}
		return array('Group' => array('id' => $groupId));
	}
	
/**
 * @method		beforeSave
 * @tutorial	Hash password before saving it in database.
 */	
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        	return true;
        }

/**
* Validation rules
*
* @var array
*/        
	public $validate = array(
		'username' => array(
		 			'usernameRule-1'=>array(
		 				'rule'=>'notEmpty',
		 				'message'=>'Please enter username'),
                    'usernameRule-2' => array(
                        'rule' => 'alphanumeric',
                        'message' => 'Username must be letter or number'
                    )),
        'password'=>array(
                    'rule'=>'notEmpty',
                    'message'=>'Please enter password')
	);
}
