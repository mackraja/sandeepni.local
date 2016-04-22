<div class="page-content">
<!-- BEGIN STYLE CUSTOMIZER -->         
<?php echo $this->element('theme'); ?>
<!-- END BEGIN STYLE CUSTOMIZER -->            
<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Compose Mail <small></small>
      </h3>
      <ul class="page-breadcrumb breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>
               <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard','admin'=>'true'));?>">Dashboard</a> 
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="javascript:void(0)">Mail</a>
            </li>
         </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN REGIONAL STATS PORTLET-->
      <div class="portlet">
         <div class="portlet-body">
            <div class="row inbox">
               <div class="col-md-2">
                  <ul class="inbox-nav margin-bottom-10">
                     <li class="inbox active">
                        <a href="javascript:;" class="btn" data-title="Compose">Compose</a>
                        <b></b>
                     </li>
                     <li class="sent"><a class="btn" href="javascript:;"  data-title="Sent">Sent</a><b></b></li>
                     <li class="draft"><a class="btn" href="javascript:;" data-title="Draft">Draft</a><b></b></li>
                     <li class="trash"><a class="btn" href="javascript:;" data-title="Trash">Trash</a><b></b></li>
                  </ul>
               </div>
               <div class="col-md-10">
                   <div class="inbox-content">
                       <?php echo $this->Form->create('User',array('class'=>'inbox-compose form-horizontal','method'=>'post',
                                    'type'=>'file','controller'=>'users','action'=>'admin_mail')); ?>
                        <div class="inbox-compose-btn">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i>Send</button>
                            <button class="btn btn-default">Discard</button>
                            <button class="btn btn-default">Draft</button>
                        </div>
                        <div class="inbox-form-group mail-to">
                            <label class="control-label">To:</label>
                            <div class="controls controls-to">
                                <?php echo $this->Form->input('to',array('label'=>false,'div'=>false,'placeholder'=>'',
                                            'class'=>'form-control col-md-12','type'=>'text','autocomplete'=>'off',
                                            'required'=>false,'maxlength'=>'256')); ?>
                                <span class="inbox-cc-bcc">
                                <span class="inbox-cc">Cc</span>
                                <span class="inbox-bcc">Bcc</span>
                                </span>
                            </div>
                        </div>
                        <div class="inbox-form-group input-cc display-hide">
                            <a class="close" href="javascript:;"></a>
                            <label class="control-label">Cc:</label>
                            <div class="controls controls-cc">
                                <?php echo $this->Form->input('cc',array('label'=>false,'div'=>false,'placeholder'=>'',
                                            'class'=>'form-control','type'=>'text','autocomplete'=>'off',
                                            'required'=>false,'maxlength'=>'256')); ?>
                            </div>
                        </div>
                        <div class="inbox-form-group input-bcc display-hide">
                            <a class="close" href="javascript:;"></a>
                            <label class="control-label">Bcc:</label>
                            <div class="controls controls-bcc">
                                <?php echo $this->Form->input('bcc',array('label'=>false,'div'=>false,'placeholder'=>'',
                                            'class'=>'form-control','type'=>'text','autocomplete'=>'off',
                                            'required'=>false,'maxlength'=>'256')); ?>
                            </div>
                        </div>
                        <div class="inbox-form-group">
                            <label class="control-label">Subject:</label>
                            <div class="controls">
                                <?php echo $this->Form->input('subject',array('label'=>false,'div'=>false,'placeholder'=>'',
                                            'class'=>'form-control','type'=>'text','autocomplete'=>'off',
                                            'required'=>false,'maxlength'=>'256')); ?>
                            </div>
                        </div>
                        <div class="inbox-form-group">
                            <div class="col-md-12">
                                <textarea class="wysihtml5 inbox-form-control" rows="6"></textarea>
                            </div>
                        </div>
                       </form>       
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>