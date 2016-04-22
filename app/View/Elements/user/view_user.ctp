<!-- Edit responsive -->
<div id="viewtoggle" class="modal fade" tabindex="-1" data-width="760">    
   <div class="modal-header">
      <button type="button" class="close view-win" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">View User</h4>
   </div>
   <div class="modal-body">
      <div class="row">
         <div class="col-md-6">
            <p>Your personal details below:</p>
            <div class="form-group">
                <label class="control-label col-md-4">First Name :</label>
                <div class="col-md-8">
                   <p id="ViewFirstName" class="form-control-static"></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Last Name :</label>
                <div class="col-md-8">
                   <p id="ViewLastName" class="form-control-static"></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Email :</label>
                <div class="col-md-8">
                   <p id="ViewEmail" class="form-control-static"></p>
                </div>
            </div>
         </div>
         <div class="col-md-6">
            <p>Your account details below:</p>
            <div class="form-group">
                <label class="control-label col-md-4">Username :</label>
                <div class="col-md-8">
                   <p id="ViewUsername" class="form-control-static"></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Group :</label>
                <div class="col-md-8">
                   <p id="ViewGroupName" class="form-control-static"></p>
                </div>
            </div>
         </div>
      </div>
   </div>
    <div class="modal-footer">
            <?php echo $this->Form->button('Close',array('data-dismiss'=>'modal','class'=>'view-win btn btn-default')); ?>
    </div>
</form>
</div>