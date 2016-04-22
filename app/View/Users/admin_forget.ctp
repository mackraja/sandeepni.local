<div class="content">
<?php echo $this->Form->create('User',array('class'=>'forget-form1','method'=>'post','controller'=>'users','action'=>'admin_forget')); ?>
        <?php echo $this->session->flash(); ?>
        <h3 >Forget Password ?</h3>
        <p>Enter your e-mail address below to reset your password.</p>
        <div class="form-group">
                <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <?php echo $this->Form->input('email',array('label'=>false,'div'=>"",'placeholder'=>'Email','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'255','autofocus')); ?>
                </div>
        </div>
        <div class="form-actions">
            <?php echo $this->Html->link('Back',array('controller'=>'logins','action' => 'admin_login','admin'=>'true'),
                        array('id'=>'back-btn','class'=>'btn btn-default'));?>    
            <?php echo $this->Form->button('Send',array('class'=>'btn btn-success pull-right')); ?>
        </div>
</form>
</div>