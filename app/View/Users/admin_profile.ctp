<div class="page-content" style="min-height:1015px !important">
<!-- BEGIN STYLE CUSTOMIZER -->         
<?php echo $this->element('theme'); ?>
<!-- END BEGIN STYLE CUSTOMIZER -->            
<!-- BEGIN PAGE HEADER-->
<?php
if(isset($this->data)){
    $username = isset($this->data['Login']['username'])?(strlen($this->data['Login']['username'])<20)?$this->data['Login']['username']:(substr($this->data['Login']['username'], 0, 16).'...'):'';
    $email = isset($this->data['Login']['username'])?(strlen($this->data['User']['email'])<25)?$this->data['User']['email']:(substr($this->data['User']['email'], 0, 21).'...'):'';
    $firstname = isset($this->data['Login']['username'])?(strlen($this->data['User']['first_name'])<10)?$this->data['User']['first_name']:(substr($this->data['User']['first_name'], 0, 6).'...'):'';
    $lastname = isset($this->data['Login']['username'])?(strlen($this->data['User']['last_name'])<10)?$this->data['User']['last_name']:(substr($this->data['User']['last_name'], 0, 6).'...'):'';
    $state = isset($this->data['User']['state'])?$this->data['User']['state']:'';
    $city = isset($this->data['User']['city'])?$this->data['User']['city']:'';
    $mobile = isset($this->data['User']['mobile'])?$this->data['User']['mobile']:'';
    $interest = isset($this->data['User']['interest'])?$this->data['User']['interest']:'';
    $occupation = isset($this->data['User']['occupation'])?$this->data['User']['occupation']:'';
    $dob = isset($this->data['User']['dob'])?date("d M Y", strtotime($this->data['User']['dob'])):'';
    $about = isset($this->data['User']['about'])?$this->data['User']['about']:'';
    $id = isset($this->data['User']['id'])?$this->data['User']['id']:'';
    $login_id = isset($this->data['Login']['id'])?$this->data['Login']['id']:'';
    $UserImage = isset($this->data['UserFolder']['name'])?$this->data['UserFolder']['name']:'dummy_profile.png';
    $filepath = isset($this->data['UserFolder']['name'])?'files/user/':'img/profile/';
    $width = isset($this->data['UserFolder']['width'])?$this->data['UserFolder']['width']:'250';
    $height = isset($this->data['UserFolder']['height'])?$this->data['UserFolder']['height']:'250';
//     pr($this->data);die;
}
?>
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         <?=ucfirst($username)?> Profile
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
               <i class="fa fa-dashboard"></i>
               <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard','admin'=>'true'));?>">Dashboard</a> 
               <i class="fa fa-angle-right"></i>
            </li>
         <li><a href="javascript:void(0)">Profile</a></li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->
<?php echo $this->session->flash(); ?>
<div id="outerupdate"></div>
<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
   <div class="col-md-12">
      <!--BEGIN TABS-->
      <div class="tabbable tabbable-custom">
         <ul class="nav nav-tabs">
            <li class="<?php if($tab == 0){echo 'active';}?>"><a data-toggle="tab" href="#tab_1_1">Overview</a></li>
            <li class="<?php if(in_array($tab,array(1,2,3))){echo 'active';}?>"><a data-toggle="tab" href="#tab_1_3">Account</a></li>
         </ul>
         <div class="tab-content">
            <div id="tab_1_1" class="tab-pane <?php if($tab == 0){echo 'active';}?>">
               <div class="row">
                  <div class="col-md-3">
                     <ul class="list-unstyled profile-nav">
                        <li>
                        	<?php echo $this->Html->image($filepath.$UserImage, array('alt' => '','class'=>'img-responsive')); ?>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-8 profile-info">
                            <h1><?=ucfirst($firstname).' '.ucfirst($lastname)?></h1>
                           <p><?=$about?></p>
                           <ul class="list-inline">
                              <li><i class="fa fa-map-marker"></i> India | <?=$state?> | <?=$city?></li>
                              <li><i class="fa fa-calendar"></i> <?=$dob?></li>
                              <li><i class="fa fa-briefcase"></i> <?=$occupation?></li>
                              <li><i class="fa fa-star"></i> <?=$mobile?></li>
                              <li><i class="fa fa-heart"></i> <?=$interest?></li>
                              <li><i class="fa fa-envelope"></i> <?=$email?></li>
                           </ul>
                        </div>
                        <!--end col-md-8-->
                     </div>
                     <!--end row-->
                  </div>
               </div>
            </div>
            <!--tab_1_2-->
            <div id="tab_1_3" class="tab-pane <?php if(in_array($tab,array(1,2,3))){echo 'active';}?>">
               <div class="row profile-account">
                  <div class="col-md-3">
                     <ul class="ver-inline-menu tabbable margin-bottom-10">
                        <li class="<?php if($tab == 1 || $tab == 0){echo 'active';}?>">
                           <a href="#tab_1-1" data-toggle="tab">
                                <i class="fa fa-cog"></i> 
                                Personal info
                           </a> 
                           <span class="after"></span>                                    
                        </li>
                        <li class="<?php if($tab == 2){echo 'active';}?>"><a href="#tab_2-2" data-toggle="tab"><i class="fa fa-picture-o"></i> Change Avatar</a></li>
                        <li class="<?php if($tab == 3){echo 'active';}?>"><a href="#tab_3-3" data-toggle="tab"><i class="fa fa-lock"></i> Change Password</a></li>
                     </ul>
                  </div>
                  <div class="col-md-9">
                     <div class="tab-content">
                        <div class="tab-pane <?php if($tab == 1 || $tab == 0){echo 'active';}?>" id="tab_1-1">
                            <?php echo $this->Form->create('User'); ?>
                              <div class="form-group">
                                 <label class="control-label">First Name</label>
                                 <?php echo $this->Form->input('first_name',array('label'=>false,'div'=>false,'placeholder'=>'First Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Last Name</label>
                                 <?php echo $this->Form->input('last_name',array('label'=>false,'div'=>false,'placeholder'=>'Last Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Date of Birth</label>
                                 <div class="input-group input-medium date date-picker" data-date="<?php echo date('Y-M-D');?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                    <?php echo $this->Form->input('dob',array('label'=>false,'div'=>false,'class'=>'form-control','type'=>'text','readonly')); ?>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">State</label>
                                 <?php echo $this->Form->input('state',array('label'=>false,'div'=>false,'placeholder'=>'State','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'256')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">City / District</label>
                                 <?php echo $this->Form->input('city',array('label'=>false,'div'=>false,'placeholder'=>'City','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'256')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Mobile</label>
                                 <?php echo $this->Form->input('mobile',array('label'=>false,'div'=>false,'placeholder'=>'Mobile','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'10')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Interests</label>
                                 <?php echo $this->Form->input('interest',array('label'=>false,'div'=>false,'placeholder'=>'Design, Web development','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'256')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Occupation</label>
                                 <?php echo $this->Form->input('occupation',array('label'=>false,'div'=>false,'placeholder'=>'Work occupation ?','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'256')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">About</label>
                                 <?php echo $this->Form->input('about',array('label'=>false,'div'=>false,'placeholder'=>'Write about yourself.','class'=>'form-control placeholder-no-fix','type'=>'textarea','autocomplete'=>'off','required'=>false,'maxlength'=>'2000')); ?>
                              </div>
                              <div class="margiv-top-10">
                                 <?php echo $this->Form->hidden('id',array('value'=>$id)); ?>
                                 <?php echo $this->Form->hidden('form_type',array('value'=>'1')); ?>
                                 <?php echo $this->Form->button('Save Changes',array('class'=>'btn btn-success')); ?>
                                  <?php echo $this->Html->link('Cancel',array('controller' => 'Users', 'action' => 'profile'),
                                		array('class' => 'btn btn-default'));?>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane <?php if($tab == 2){echo 'active';}?>" id="tab_2-2">
                           <?php echo $this->Form->create('User',array('type'=>'file')); ?>
                           		<div data-provides="fileupload" class="fileupload fileupload-new">
									<div style="width: <?=$width?>px; height: <?=$height?>px;" class="fileupload-new thumbnail">
									   <?php echo $this->Html->image($filepath.$UserImage); ?>
									</div>
									<div style="max-width: 1000px; max-height: 1000px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail"></div>
									<div>
									   <span class="btn btn-default btn-file">
									   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
									   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
										<?php echo $this->Form->input('file',array('label'=>false,'div'=>false,
																'class'=>'default','type'=>'file','required'=>false)); ?>
									   </span>
									   <a data-dismiss="fileupload" id="removefile" class="btn btn-danger fileupload-exists" href="javascript:void(0);"><i class="fa fa-trash"></i> Remove</a>
									</div>
								</div>
                              <div class="margin-top-10">
                                <?php echo $this->Form->hidden('id',array('value'=>$id)); ?>
                                <?php echo $this->Form->hidden('x1'); ?>
                                <?php echo $this->Form->hidden('x2'); ?>
                                <?php echo $this->Form->hidden('y1'); ?>
                                <?php echo $this->Form->hidden('y2'); ?>
                                <?php echo $this->Form->hidden('w'); ?>
                                <?php echo $this->Form->hidden('h'); ?>
                                <?php echo $this->Form->hidden('form_type',array('value'=>'2')); ?>
                                <?php echo $this->Form->button('Submit',array('class'=>'btn btn-success')); ?>
                                 <?php echo $this->Html->link('Cancel',array('controller' => 'Users', 'action' => 'profile'),
                                		array('class' => 'btn btn-default'));?>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane <?php if($tab == 3){echo 'active';}?>" id="tab_3-3">
                          <?php echo $this->Form->create('User'); ?>
                              <div class="form-group">
                                 <label class="control-label">New Password</label>
                                 <?php echo $this->Form->input('password',array('label'=>false,'id'=>'password','div'=>false,'placeholder'=>'New Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'20')); ?>
                              </div>
                              <div class="form-group">
                                 <label class="control-label">Re-type New Password</label>
                                 <?php echo $this->Form->input('password_confirm',array('label'=>false,'div'=>false,'placeholder'=>'Re-type New Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'20')); ?>
                              </div>
                              <div class="margin-top-10">
                                <?php echo $this->Form->hidden('id',array('value'=>$login_id)); ?>
                                <?php echo $this->Form->hidden('form_type',array('value'=>'3')); ?>
                                <?php echo $this->Form->button('Change Password',array('class'=>'btn btn-success')); ?>
                                <?php echo $this->Html->link('Cancel',array('controller' => 'Users', 'action' => 'profile'),
                                		array('class' => 'btn btn-default'));?>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!--end col-md-9-->                                   
               </div>
            </div>
            <!--end tab-pane-->
         </div>
      </div>
      <!--END TABS-->
   </div>
</div>
<!-- END PAGE CONTENT-->
</div>