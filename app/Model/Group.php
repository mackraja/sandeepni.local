<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 */
class Group extends AppModel {

/**
 * ACL behavior
 * 
 * @property	$actAs
 * @tutorial	To create ACO's.
 */
	
    public $actsAs = array('Acl' => array('type' => 'requester'));
    
    public function parentNode() {
        return null;
    }
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name'=>array(
    			'nameRule-1'=>array(
    				'rule'=>'notEmpty',
    				'message'=>'Please enter group name.'),
    			'nameRule-2' => array(
    					'rule' => '/^[a-zA-Z -]+$/',
    					'message' => 'Group name must contains only letters.'),
				'nameRule-3' => array(
						'rule' => 'isUnique',
						'message' => 'Group name exist, please change name.')),
		'status' => array(
				'rule' => array('inList', array('t','f')),
				'message' => 'Please check status.',
				'allowEmpty' => TRUE)
		);
}
