<!-- Add responsive -->
<div id="toggle" class="modal fade" tabindex="-1" data-width="760">
<?php echo $this->Form->create('Group',array('class'=>'group-add-form')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title" id="change-group"></h4>
      <div id="update"></div>
<!--       <div id="toggleprogressBar"></div> -->
   </div>
   <div class="modal-body">
    <div class="row">
         <div class="col-md-6">
              <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Name</label>
                <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'placeholder'=>'Name','class'=>'form-control placeholder-no-fix','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                </div>
            </div>
         </div>
         <div class="col-md-6">
              <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Status</label>
                <div class="input-icon">
                        <?php echo $this->Form->input('status',array('options'=> $status,'empty'=>'Select Status','label'=>false,'div'=>false,'class'=>'form-control placeholder-no-fix','required'=>false)); ?>
                </div>
            </div>
         </div>
         <?php echo $this->Form->input('id',array('label'=>false,'div'=>false,'class'=>'form-control placeholder-no-fix','type'=>'hidden','autocomplete'=>'off','required'=>false,'hiddenfiled'=>true)); ?>
    </div>
   </div>
   <div class="modal-footer">
       <?php echo $this->Form->button('Close',array('data-dismiss'=>'modal','id'=>'CloseModel','class'=>'btn btn-default')); ?>
       <?php echo $this->Form->button('Save',array('id'=>'register-submit-btn','class'=>'btn btn-info')); ?>
   </div>
</form>
</div>