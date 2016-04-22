<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
                'DebugKit.Toolbar' => array('autoRun' => false),
                'Acl',
                'Auth' => array(
                    'authenticate' => array(
                        'Form' => array(
                            'userModel' => 'Login',
                            'passwordHasher' => 'Blowfish',
                            'scope' => array('Login.status' => 't')
                                        )
                        )
                    ),
                'Session');
        public $helpers = array('Minify.Minify');
        
        public function beforeRender(){
             $this->response->disableCache();
            //header("Cache-Control: no-store, no-cache, must-revalidate");
            //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            //header("Pragma: no-cache"); 
        }
        
        public function beforeFilter() {
            $this->Auth->allow('index');
            if (isset($this->params['prefix']) && ($this->params['admin'] == 'true')) {
                    $this->layout = 'dashboard';
             }
            if(@$this->request->params['admin']){
                //Setup Auth for Admin
                $this->Auth->loginAction = array('controller' =>'Logins','action' => 'admin_login');
            }
            
	        $this->loadModel('Login');
	        $username = $this->Login->find('first',array('fields'=>array('username'),'conditions'=>array('Login.id'=>$this->Auth->user('id'))));
	        $this->set('username',$username);
	        // User Thumbnail
	        $this->loadModel('User');
	        $thumb = $this->User->find('first',array('fields'=>'UserFolder.name', 'conditions'=>array('User.login_id'=>$this->Auth->user('id'))));
	        if(isset($thumb['UserFolder']['name'])){
	        	$this->set('thumb',$thumb['UserFolder']['name']);
	        }	
       }
      
       public function is_connected(){
            $connected = @fsockopen("www.google.com", 80); 
            //website, port  (try 80 or 443)
            if ($connected){
                $is_conn = true; //action when connected
                fclose($connected);
            }else{
                $is_conn = false; //action in connection failure
            }
            return $is_conn;
       }
        
	   public function getFlash($type=null,$msg=null){
		   	$title = ($type==1)?'Success':'Error';
		   	$class = ($type==1)?'alert-success':'alert-danger';
		   	$message = '<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
	                    						<strong>'.$title.'!</strong> '.$msg;
		   	$params = array('class'=>'alert '.$class.' alert-dismissable');
		   	return $this->Session->setFlash($message,'default',$params);
	   }
}