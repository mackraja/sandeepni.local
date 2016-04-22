<?php echo $this->element('user/add_edit_user');?>
<?php echo $this->element('user/view_user');?>
<?php $countUser = count($users);?>
<!-- BEGIN PAGE -->
<div class="page-content">
   <!-- BEGIN STYLE CUSTOMIZER -->         
   <?php echo $this->element('theme'); ?>
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
               <i class="fa fa-dashboard"></i>
               <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard','admin'=>'true'));?>">Dashboard</a> 
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="javascript:void(0)">Users</a>
            </li>
         </ul>
         <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
   </div>
   <!-- END PAGE HEADER-->
   <div id="outerupdate"></div>
   <!-- BEGIN PAGE CONTENT-->
   <div class="row">
      <div class="col-md-12">
          <?php $base_url = array('controller' => 'Users', 'action' => 'index');
              echo $this->Form->create("Filter",array('class'=>'form-inline','role'=>'form','url' => $base_url)); ?>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
         <div class="portlet box light-grey">
             
            <div class="portlet-title">
               <div class="caption">
                   <i class="fa fa-filter"></i>User Filters
               </div>
            </div>
             <div class="portlet-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('keyword',array('label'=>false,'div'=>false,'placeholder'=>'Search','class'=>'form-control','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                    </div>
                    <div class="form-group">
                       <?php echo $this->Form->input('status',array('options'=> $status,'empty'=>'Select Status','label'=>false,'div'=>false,'class'=>'form-control','required'=>false)); ?>
                    </div>
                    <div class="form-group">
                       <?php echo $this->Form->input('group_id',array('options'=> $group,'empty'=>'Select Group','label'=>false,'div'=>false,'class'=>'form-control','required'=>false)); ?>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-success" type="submit">Search <i class="fa fa-search"></i></button>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'index','admin'=>'true'));?>">Reset <i class="fa fa-refresh"></i></a>
                    </div>
            </div>
         </div>
         
         <div class="portlet box light-grey">
            <div class="portlet-title">
               <div class="caption">
                   <i class="fa fa-user"></i>Users Table
               </div>
            </div>
             <div id="deactivateAll"></div>
             <div id="activateAll"></div>
             <div id="deleteAll"></div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                       <a class="btn btn-success" id="addUserId" data-toggle="modal" href="javascript:void(0)">Add New <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="btn-group none" id="action-div">
                           <a data-toggle="dropdown" href="javascript:void(0)" class="btn btn-success dropdown-toggle">
                           <i class="fa fa-cogs"></i> Actions
                           <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu">
                              <li><a href="javascript:void(0)" onclick="statusUserId(1,0,1);"><i class="fa fa-unlock"></i> Active</a></li>
                              <li><a href="javascript:void(0)" onclick="statusUserId(0,0,1);"><i class="fa fa-lock"></i> Deactive</a></li>
                              <li class="divider"></li>
                              <li><a href="javascript:void(0)" onclick="deleteUserId(0,1);"><i class="fa fa-trash"></i> Delete</a></li>
                           </ul>
                    </div>
                    <div class="btn-group pull-right">
                        <?php $disable=($countUser>=5)?'':'disabled'; ?>
                        <?php echo $this->Form->input('limit',array('options'=> $limit_arr,'value'=>$limit,'label'=>false,'div'=>false,'class'=>'form-control input-xsmall','required'=>false, $disable)); ?>
                    </div>
                 </div>
               <table class="td-count table table-striped table-bordered table-hover" id="">
                  <thead>
                     <tr>
                     <?php $c2u = ($countUser>=2)?'':'disabled';?>
                     	<th>
                            <div class="btn-group">
                            	<?php echo $this->Form->checkbox('All', array('id'=>'CheckAll','title'=>'Check All','disabled'=>$c2u)); ?>
	                     	</div>
                        </th>
                       <?php
                        if(isset($users) && $countUser>=2){
                            $username_sort = $this->Paginator->sort('Login.username','Username');
                            $email_sort = $this->Paginator->sort('email','Email');
                            $name_sort = $this->Paginator->sort('first_name','Name');
                            $joined_sort = $this->Paginator->sort('created','Joined');
                        }else{
                            $username_sort = 'Username';
                            $email_sort = 'Email';
                            $name_sort = 'Name';
                            $joined_sort = 'Joined';
                        }
                        $sort = isset($this->params['named']['sort'])?$this->params['named']['sort']:'';
                        $direction = isset($this->params['named']['direction'])?$this->params['named']['direction']:'';
                        $adu = ($sort == 'Login.username')?"_".$direction:'';
                        $ade = ($sort == 'email')?"_".$direction:'';
                        $adn = ($sort == 'first_name')?"_".$direction:'';
                        $adj = ($sort == 'created')?"_".$direction:'';
                        ?>
                        <th class="sorting<?=$adu?>"><?php echo $username_sort;?></th>
                        <th class="sorting<?=$ade?>"><?php echo $email_sort;?></th>
                        <th class="sorting<?=$adn?>"><?php echo $name_sort;?></th>
                        <th class="sorting<?=$adj?>"><?php echo $joined_sort?></th>
                        <th >Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php if($users){ $n=1;?>
                    <?php foreach($users as $key => $value):?>
                     <tr class="odd gradeX">
						<td>
                            <?php echo $this->Form->checkbox("User"+$value['Login']['id'],
                                        array('value' => $value['Login']['id'],'class'=>'checksingle','title'=>'Check','disabled'=>$c2u)); ?>
                        </td>
                        <?php
                        if($value['Login']['status'] == 't'){
                            $deactive= '';
                            }else{
                            $deactive= 'class="deactive_td"';
                        }?>
                        <?php
                            $username = (strlen($value['Login']['username'])<20)?$value['Login']['username']:substr($value['Login']['username'], 0, 16).'...';
                            $email = (strlen($value['User']['email'])<25)?$value['User']['email']:substr($value['User']['email'], 0, 21).'...';
                            $firstname = (strlen($value['User']['first_name'])<10)?$value['User']['first_name']:substr($value['User']['first_name'], 0, 6).'...';
                            $lastname = (strlen($value['User']['last_name'])<10)?$value['User']['last_name']:substr($value['User']['last_name'], 0, 6).'...';
                        ?>
                        <td <?=$deactive?>><?=$username?></td>
                        <?php $mailto = "mailto:".$email ?>
                        <td <?=$deactive?>><a href="<?=$mailto?>"><?=$email?></a></td>
                        <td <?=$deactive?>><?=$firstname.' '.$lastname?></td>
                        <?php $joined = date("d/m/Y h:m a", strtotime($value['User']['created'])); ?>
                        <td <?=$deactive?>><?=$joined?></td>
                        <?php ($value['Login']['status'] == 't')?$status='fa fa-unlock':$status='fa fa-lock'?>
                        <?php ($value['Login']['status'] == 't')?$statustype='0':$statustype='1'?>
                        <?php ($value['Login']['status'] == 't')?$statustitle='Active':$statustitle='Deactive'?>
                        <td>
                        	<a href="javascript:void(0)" onclick="statusUserId(<?=$statustype?>,<?=$n?>,0);"><i title="<?=$statustitle?>" class="<?=$status?> fa-lg"></i></a>
                        	<a href="javascript:void(0)" onclick="editUserId(<?=$n?>);"><i title="Edit" class="fa fa-edit fa-lg"></i></a>
                        	<a href="javascript:void(0)" onclick="viewUserId(<?=$n?>);"><i title="View" class="fa fa-info-circle fa-lg"></i></a>
                        	<a href="javascript:void(0)" onclick="deleteUserId(<?=$n?>,0);"><i title="Delete" class="fa fa-trash fa-lg"></i></a>
                        </td>
                     </tr>
                     <span style="display: none" id="_<?=$n?>"><?=$value['Login']['id']?></span>
                    <?php $n++; endforeach;?>
                    <?php }?>
                  </tbody>
               </table>
                <?php echo $this->element('pagination');?>
            </div>
         </div>
         <!-- END EXAMPLE TABLE PORTLET-->  
      </form>
      </div>
   </div>
   
   <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE -->