<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
    
/**
 * Associations
 * 
 * @var	$belongsTo	Many to one.
 * @var	$hasOne		One to one.
 * 
 */	
   public $belongsTo = array(
   		'Login' => array(
   				'className' => 'Login',
   				'fields' => array('Login.id','Login.group_id','Login.username','Login.status')	
   		));
   
   public $hasOne = array(
   		'UserFolder' => array(
   				'className' => 'UserFolder',
   				'conditions' => array('UserFolder.status' => 't'),
   				'fields'=> array('UserFolder.id','UserFolder.user_id','UserFolder.name','UserFolder.description','UserFolder.width','UserFolder.height','UserFolder.status')
   		));
    
/**
 * Validation rules
 *
 * @var array
 */
      
    public $validateforgetemail = array(
    		'email'=>array(
    				'rule'=>'email',
    				'message'=>'Please enter a valid email address.'));
    
    public $validate = array(
    		
    	'first_name'=>array(
    			'first_nameRule-1'=>array(
    				'rule'=>'notEmpty',
    				'message'=>'Please enter first name'),
    			'first_nameRule-2' => array(
    					'rule' => '/^[a-zA-Z -]+$/',
    					'message' => 'First name must contains only letters.'
    			)),
    	'last_name'=>array(
    			'rule'=>'/^[a-zA-Z -]+$/',
    				'message'=>'Last name must contains only letters.',
					'allowEmpty'=>TRUE),
        'email'=>array(
        		'emailRule-1'=>array(
                    'rule'=>'email',
                    'message'=>'Please enter a valid email address.'),
        		'emailRule-2' => array(
        				'rule' => 'isUnique',
        				'message' => 'Email exist, please change email.')),
        'username' => array(
                    'usernameRule-1' => array(
                        'rule' => 'alphaNumeric',
                        'message' => 'Usernames must only contain letters and numbers.'),
        			'usernameRule-2' => array(
                        'rule' => 'is_unique_username',
                        'message' => 'Username exist, please change username.'
                    )),
        'password'=>array(
                        'rule'=> array('lengthBetween', 5, 15),
                        'message'=>'Passwords must be between 5 and 15 characters long.'),
        'password_confirm' => array(
                    'password_confirmRule-1'=>array(
                        'rule'=>array('lengthBetween', 5, 15),
                        'message'=>'Passwords must be between 5 and 15 characters long.'),
                    'password_confirmRule-2' => array(
                        'rule' => 'validate_passwords',
                        'message' => 'Please enter the same password again.',
                    )),
        'group_id' => array(
                    'rule'=>'numeric',
                    'message'=>'Please select Group.'),
    	'state'=>array(
    				'rule' => '/^[a-zA-Z -]+$/',
    				'message' => 'State must contains only letters.',
    				'allowEmpty'=>TRUE),
    	'city'=>array(
    				'rule' => '/^[a-zA-Z -]+$/',
    				'message' => 'City / District must contains only letters.',
    				'allowEmpty'=>TRUE),
    	'mobile'=>array(
    				'rule' => 'numeric',
    				'message' => 'Mobile must contains only numbers.',
    				'allowEmpty'=>TRUE),
    	'dob'=>array(
    				'rule' => 'checkOver18',
    				'message' => 'You must be over 18 years old.',
    				'allowEmpty'=>TRUE),
    	'file'=>array(
    			'fileRule-1'=>array(
    					'rule'=>array('extension',array('gif', 'jpeg', 'png', 'jpg')),
    					'message'=> 'Please supply a valid image.'),
    			'fileRule-2'=>array(
    					'rule'=> array('fileSize', '<=', '2MB'),
    					'message' => 'Image must be less than 2MB'),
    			'fileRule-3'=>array(
    					'rule' => 'uploadError',
    					'message' => 'Something went wrong with the upload.'
    						))
    );
/**
 * @method	validate_passwords
 * @tutorial	To check password and confirm password fields are same.
 * @return boolean
 */
    
    public function validate_passwords(){
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirm'];
    }
    
/**
 * @method	is_unique_username
 * @tutorial	To check username is unique or not.
 * @return boolean
 */ 
       
    public function is_unique_username(){
    	$check_username = $this->Login->find('first',array('fields'=>array('username'), 
    					'conditions'=>array('Login.username'=>$this->data[$this->alias]['username'])));
    	return empty($check_username)?TRUE:FALSE;
    }
    
/**
 * @method	checkOver18
 * @tutorial	To check DOB is more than 18 years.
 * @return boolean
 */
        
    public function checkOver18(){
    	$dob = strtotime($this->data[$this->alias]['dob']);
    	$before_18 = strtotime('-18 year', time());
    	return ($dob < $before_18)?TRUE:FALSE;
    }
}
