<div class="content">
<?php echo $this->Form->create('User',array('class'=>'register-form1','method'=>'post','controller'=>'users','action'=>'admin_register')); ?>
        <?php echo $this->session->flash(); ?>
        <h3 >Sign Up</h3>
        <p>Enter your personal details below:</p>
        <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">First Name</label>
                <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <?php echo $this->Form->input('first_name',array('label'=>false,'div'=>false,'placeholder'=>'First Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64','autofocus')); ?>
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
                        <?php echo $this->Form->input('email',array('label'=>false,'div'=>false,'placeholder'=>'Email','class'=>'form-control placeholder-no-fix','type'=>'text','required'=>false,'maxlength'=>'255')); ?>
                </div>
        </div>
        <p>Enter your account details below:</p>
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
                        <?php echo $this->Form->input('password',array('label'=>false,'id'=>'password','div'=>false,'placeholder'=>'Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'20')); ?>
                </div>
        </div>
        <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                <div class="controls">
                        <div class="input-icon">
                                <i class="fa fa-ok"></i>
                                <?php echo $this->Form->input('password_confirm',array('label'=>false,'div'=>false,'placeholder'=>'Re-type Your Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'20')); ?>
                        </div>
                </div>
        </div>
        <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Group</label>
                    <div class="input-icon">
                            <?php echo $this->Form->input('group_id',array('options'=> $group,'empty'=>'Select Group','label'=>false,'div'=>false,'class'=>'form-control placeholder-no-fix','required'=>false)); ?>
                    </div>
        </div>
        <div class="form-actions">
            <?php echo $this->Html->link('Back',array('controller'=>'logins','action' => 'admin_login'),
                        array('id'=>'register-back-btn','class'=>'btn btn-default'));?>    
            <?php echo $this->Form->button('Sign Up',array('id'=>'register-submit-btn','class'=>'btn btn-info pull-right')); ?>
        </div>
</form>
</div>