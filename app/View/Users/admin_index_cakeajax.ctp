<?php
//pr($this->request);
?>
<?php echo $this->element('user/add_user');?>
<?php echo $this->element('user/edit_user');?>
<?php echo $this->element('user/view_user');?>
<!-- BEGIN PAGE -->
<div class="page-content">
   <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->         
   <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
               <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
               Widget settings form goes here
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-success">Save changes</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
   <!-- BEGIN STYLE CUSTOMIZER -->         
   <div class="theme-panel hidden-xs hidden-sm">
      <div class="toggler"><i class="fa fa-gear"></i></div>
      <div class="theme-options">
         <div class="theme-option theme-colors clearfix">
            <span>Theme Color</span>
            <ul>
               <li class="color-black current color-default tooltips" data-style="default" data-original-title="Default"></li>
               <li class="color-grey tooltips" data-style="grey" data-original-title="Grey"></li>
               <li class="color-blue tooltips" data-style="blue" data-original-title="Blue"></li>
               <li class="color-red tooltips" data-style="red" data-original-title="Red"></li>
               <li class="color-light tooltips" data-style="light" data-original-title="Light"></li>
            </ul>
         </div>
         <div class="theme-option">
            <span>Layout</span>
            <select class="layout-option form-control input-small">
               <option value="fluid" selected="selected">Fluid</option>
               <option value="boxed">Boxed</option>
            </select>
         </div>
         <div class="theme-option">
            <span>Header</span>
            <select class="header-option form-control input-small">
               <option value="fixed" selected="selected">Fixed</option>
               <option value="default">Default</option>
            </select>
         </div>
         <div class="theme-option">
            <span>Sidebar</span>
            <select class="sidebar-option form-control input-small">
               <option value="fixed">Fixed</option>
               <option value="default" selected="selected">Default</option>
            </select>
         </div>
         <div class="theme-option">
            <span>Footer</span>
            <select class="footer-option form-control input-small">
               <option value="fixed">Fixed</option>
               <option value="default" selected="selected">Default</option>
            </select>
         </div>
      </div>
   </div>
   <!-- END BEGIN STYLE CUSTOMIZER -->            
   <!-- BEGIN PAGE HEADER-->
   <div class="row">
      <div class="col-md-12">
         <!-- BEGIN PAGE TITLE & BREADCRUMB-->
         <h3 class="page-title">
            Managed Users Table
         </h3>
         <ul class="page-breadcrumb breadcrumb">
            <li>
               <i class="fa fa-home"></i>
               <a href="index.html">Home</a> 
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Data Tables</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li><a href="#">Managed Tables</a></li>
         </ul>
         <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
   </div>
   <!-- END PAGE HEADER-->
   <!-- BEGIN PAGE CONTENT-->
   <div class="row">
      <div class="col-md-12">
          <?php echo $this->Form->create(); ?>
         <!-- BEGIN EXAMPLE TABLE PORTLET-->
         <div class="portlet box light-grey">
            <div class="portlet-title">
               <div class="caption"><i class="fa fa-user"></i>Users Table</div>
               <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
               </div>
            </div>
             <div id="deactivateAll"></div>
             <div id="activateAll"></div>
             <div id="deleteAll"></div>
            <div class="portlet-body">
               <div class="table-toolbar">
                   <div class="btn-group">
                      <a class="btn btn-success" data-toggle="modal" href="#add">Add <i class="fa fa-plus"></i></a>
                   </div> 
                <div class="btn-group">
                    <?php
                            echo $this->Js->submit('Delete',array(
                                    'class'=>'btn btn-danger',
                                    'url' => array('controller'=>'Users','action' => 'deleteAll'),
                                    'update' => '#deleteAll',
                                    'confirm' => 'Are you sure you want to Delete',
                                    'before' => $this->Js->get('#sending')->effect('fadeIn'),
                                    'success' => $this->Js->get('#sending')->effect('fadeOut')
                    ));?>
                 </div>
                 <div class="btn-group">
                    <?php
                            echo $this->Js->submit('Deactivate',array(
                                    'class'=>'btn btn-info',
                                    'url' => array('controller'=>'Users','action' => 'deactivateAll'),
                                    'confirm' => 'Are you sure you want to Deactivate',
                                    'update' => '#deactivateAll',
                                    'before' => $this->Js->get('#sending')->effect('fadeIn'),
                                    'success' => $this->Js->get('#sending')->effect('fadeOut')
                    ));?>
                 </div>
                 <div class="btn-group">
                    <?php
                            echo $this->Js->submit('Activate',array(
                                    'class'=>'btn btn-success',
                                    'url' => array('controller'=>'Users','action' => 'activateAll'),
                                    'confirm' => 'Are you sure you want to Activate',
                                    'update' => '#activateAll',
                                    'before' => $this->Js->get('#sending')->effect('fadeIn'),
                                    'success' => $this->Js->get('#sending')->effect('fadeOut')
                    ));?>
                 </div>  
               </div>
               <table class="table table-striped table-bordered table-hover" id="sample_1">
                  <thead>
                     <tr>
                        <th class="table-checkbox">
                            <?php echo $this->Form->checkbox('', array('data-set'=>'#sample_1 .checkboxes','class' => 'group-checkable','title'=>'Check All')); ?>
                        </th>
                        <th>Username</th>
                        <th >Email</th>
                        <th >Name</th>
                        <th >Joined</th>
                        <th >Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $key => $value):?>
                     <tr class="odd gradeX">
                        <td>
                            <?php echo $this->Form->checkbox("User"+$value['User']['id'],
                                        array('value' => $value['User']['id'],'class'=>'checkboxes')); ?>
                        </td>
                        <td><?=$value['User']['username']?></td>
                        <?php $mailto = "mailto:".$value['User']['email'] ?>
                        <td ><a href="<?=$mailto?>"><?=$value['User']['email']?></a></td>
                        <td ><?=$value['User']['first_name'].' '.$value['User']['last_name']?></td>
                        <?php $joined = date("d/m/Y h:m a", strtotime($value['User']['created'])); ?>
                        <td><?=$joined?></td>
                        <?php ($value['User']['status'] == 1)?$status='Activate':$status ='Deactivate'?>
                        <?php ($value['User']['status'] == 1)?$class='btn btn-success':$class ='btn btn-danger'?>
                        <?php ($value['User']['status'] == 1)?$msg='Deactivate':$msg ='Activate'?>
                        <td >
                            <?php 
                                echo $this->Js->link($status, 
                                array('controller'=>'Users', 'action'=>'status', $msg, $value['User']['id']), 
                                array(
                                'confirm' => "Are you sure want to $msg",
                                'update'=>'#activateAll',
                                'class'=>$class));
                            ?>
                            <a class="btn btn-danger" data-toggle="modal" href="#edit<?=$value['User']['id']?>">Edit</a>
                            <a class="btn btn-info" data-toggle="modal" href="#view<?=$value['User']['id']?>">View</a>
                        </td>
                     </tr>
                    <?php endforeach;?>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- END EXAMPLE TABLE PORTLET-->
      </form>
      </div>
   </div>
   <!-- END PAGE CONTENT-->
</div>
   <!-- END PAGE -->