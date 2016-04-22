<div class="content">
<?php echo $this->Form->create('Group',array('class'=>'register-form2','method'=>'post','controller'=>'groups','action'=>'admin_add')); ?>
        <?php echo $this->session->flash(); ?>
        <h3 >Create Group</h3>
        <div class="form-group">
                <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'placeholder'=>'Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64','autofocus')); ?>
                </div>
        </div>
        <div class="form-actions">
            <?php echo $this->Html->link('Back',array('controller'=>'logins','action' => 'admin_login'),
                        array('id'=>'register-back-btn','class'=>'btn btn-default'));?>    
            <?php echo $this->Form->button('Create',array('id'=>'register-submit-btn','class'=>'btn btn-info pull-right')); ?>
        </div>
</form>
</div>