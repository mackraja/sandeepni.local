<!-- Add responsive -->
<div id="toggle" class="modal fade" tabindex="-1" data-width="760">
<?php echo $this->Form->create('User',array('class'=>'user-add-form')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title" id="change-user"></h4>
      <div id="update"></div>
<!--       <div id="toggleprogressBar"></div> -->
   </div>
   <div class="modal-body">
    <div class="row">
         <div class="col-md-6">
              <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">First Name</label>
                <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <?php echo $this->Form->input('first_name',array('label'=>false,'div'=>false,'placeholder'=>'First Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                    <div class="input-icon">
                            <i class="fa fa-font"></i>
                            <?php echo $this->Form->input('last_name',array('label'=>false,'div'=>false,'placeholder'=>'Last Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                    </div>
            </div>
            <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                            <i class="fa fa-envelope"></i>
                            <?php echo $this->Form->input('email',array('label'=>false,'div'=>false,'placeholder'=>'Email','class'=>'form-control placeholder-no-fix','type'=>'text','required'=>false,'maxlength'=>'256')); ?>
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Group</label>
                    <div class="input-icon">
                            <?php echo $this->Form->input('group_id',array('options'=> $group,'empty'=>'Select Group','label'=>false,'div'=>false,'class'=>'form-control placeholder-no-fix','required'=>false)); ?>
                    </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <?php echo $this->Form->input('username',array('label'=>false,'div'=>false,'placeholder'=>'Username','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                </div>
                </div>
                <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'placeholder'=>'Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                        <div class="controls">
                                <div class="input-icon">
                                        <i class="fa fa-ok"></i>
                                        <?php echo $this->Form->input('password_confirm',array('label'=>false,'div'=>false,'placeholder'=>'Re-type Your Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                                </div>
                        </div>
                </div>
                <?php echo $this->Form->input('userid',array('label'=>false,'div'=>false,'class'=>'form-control placeholder-no-fix','type'=>'hidden','autocomplete'=>'off','required'=>false,'hiddenfiled'=>true)); ?>
                <?php echo $this->Form->input('loginid',array('label'=>false,'div'=>false,'class'=>'form-control placeholder-no-fix','type'=>'hidden','autocomplete'=>'off','required'=>false,'hiddenfiled'=>true)); ?>
         </div>
      </div>
   </div>
   <div class="modal-footer">
       <?php echo $this->Form->button('Close',array('data-dismiss'=>'modal','id'=>'CloseModel','class'=>'btn btn-default')); ?>
       <?php echo $this->Form->button('Save',array('id'=>'register-submit-btn','class'=>'btn btn-info')); ?>
   </div>
</form>
</div>