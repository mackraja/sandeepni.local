<div class="content">
<?php $token = $this->params['pass'][0];?>
<?php echo $this->Form->create('User',array('class'=>'reset-form1','method'=>'post','controller'=>'users','action'=>'admin_reset/'.$token)); ?>
        <?php echo $this->session->flash(); ?>
        <h3 >Reset Password</h3>
        <p>Enter your new password below:</p>
        <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'id'=>'password','placeholder'=>'Password','class'=>'form-control placeholder-no-fix','type'=>'password','autocomplete'=>'off','required'=>false,'maxlength'=>'20','autofocus')); ?>
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
        <div class="form-actions">
            <?php echo $this->Form->button('Reset',array('id'=>'register-submit-btn','class'=>'btn btn-info pull-right')); ?>
        </div>
</form>
</div>