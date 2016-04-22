<div class="content">
<?php echo $this->Form->create('Login',array('class'=>'login-form','method'=>'post','controller'=>'logins','action'=>'admin_login')); ?>
    <h3 class="form-title">Login to your account</h3>
    <?php echo $this->session->flash(); ?>
   <!--  <div class="alert alert-danger alert-dismissable">
    		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
            <span>Enter username and password.</span>
    </div> -->
    <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <?php echo $this->Form->input('username',array('label'=>false,'div'=>false,'placeholder'=>'Username','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64','autofocus')); ?>
            </div>
    </div>
    <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'placeholder'=>'Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'20')); ?>
            </div>
    </div>
    <div class="form-actions">
<!--            <label class="checkbox">
                <?php //echo $this->Form->checkbox('login_remember'); ?>Remember me
            </label>-->
            <?php echo $this->Form->button('Login',array('id'=>'loginbutton','class'=>'btn btn-success-light pull-right')); ?>
    </div>
    <div class="forget-password">
            <h4>Forgot your password ?</h4>
            <p>
                    no worries, click <?php echo $this->Html->link('here',array('controller'=>'users','action' => 'forget')); ?>
                    to reset your password.
            </p>
    </div>
<!--    <div class="create-account">
            <p>
                    Don't have an account yet ?&nbsp;
                    <?php //echo $this->Html->link('Create an account',array('controller'=>'users','action' => 'register')); ?>
            </p>
    </div>-->
</form>
</div>