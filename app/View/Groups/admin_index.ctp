<?php echo $this->element('group/add_edit_group');?>
<?php $countGroup = count($Groups);?>
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
            Managed Groups Table
         </h3>
         <ul class="page-breadcrumb breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>
               <a href="<?php echo $this->Html->url(array('controller'=>'Groups','action'=>'dashboard','admin'=>'true'));?>">Dashboard</a> 
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="javascript:void(0)">Groups</a>
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
          <?php $base_url = array('controller' => 'Groups', 'action' => 'index');
              echo $this->Form->create("Filter",array('class'=>'form-inline','role'=>'form','url' => $base_url)); ?>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
         <div class="portlet box light-grey">
             
            <div class="portlet-title">
               <div class="caption">
                   <i class="fa fa-filter"></i>Group Filters
               </div>
            </div>
             <div class="portlet-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('keyword',array('label'=>false,'div'=>false,'placeholder'=>'Search','class'=>'form-control','type'=>'text','autocomplete'=>'off','required'=>false,'maxlength'=>'64')); ?>
                    </div>
                    <div class="form-group">
                       <?php echo $this->Form->input('status',array('options'=> $status,'empty'=>'Select Status','label'=>false,'div'=>false,'class'=>'form-control','required'=>false)); ?>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-success" type="submit">Search <i class="fa fa-search"></i></button>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?php echo $this->Html->url(array('controller'=>'Groups','action'=>'index','admin'=>'true'));?>">Reset <i class="fa fa-refresh"></i></a>
                    </div>
            </div>
         </div>
         
         <div class="portlet box light-grey">
            <div class="portlet-title">
               <div class="caption">
                   <i class="fa fa-group"></i>Groups Table
               </div>
            </div>
             <div id="deactivateAll"></div>
             <div id="activateAll"></div>
             <div id="deleteAll"></div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                       <a class="btn btn-success" id="addgroupId" data-toggle="modal" href="javascript:void(0)">Add New <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="btn-group none" id="action-div">
                           <a data-toggle="dropdown" href="javascript:void(0)" class="btn btn-success dropdown-toggle">
                           <i class="fa fa-cogs"></i> Actions
                           <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu">
                              <li><a href="javascript:void(0)" onclick="statusGroupId(1,0,1);"><i class="fa fa-unlock"></i> Active</a></li>
                              <li><a href="javascript:void(0)" onclick="statusGroupId(0,0,1);"><i class="fa fa-lock"></i> Deactive</a></li>
                              <li class="divider"></li>
                              <li><a href="javascript:void(0)" onclick="deleteGroupId(0,1);"><i class="fa fa-trash"></i> Delete</a></li>
                           </ul>
                    </div>
                    <div class="btn-group pull-right">
                        <?php $disable= ($countGroup>=5)?'':'disabled'; ?>
                        <?php echo $this->Form->input('limit',array('options'=> $limit_arr,'value'=>$limit,'label'=>false,'div'=>false,'class'=>'form-control input-xsmall','required'=>false, $disable)); ?>
                    </div>
                 </div>
               <table class="table table-striped table-bordered table-hover" id="">
                  <thead>
                     <tr>
                     <?php $c2u = (($countGroup)>=2)?'':'disabled';?>
                     	<th>
                            <div class="btn-group">
                            	<?php echo $this->Form->checkbox('All', array('id'=>'CheckAll','title'=>'Check All','disabled'=>$c2u)); ?>
	                     	</div>
                        </th>
                       <?php
                        if(isset($Groups) && $countGroup>=2){
                            $name_sort = $this->Paginator->sort('name','Name');
                            $joined_sort = $this->Paginator->sort('created','Joined');
                            $modified_sort = $this->Paginator->sort('modified','Modified');
                        }else{
                            $name_sort = 'Name';
                            $joined_sort = 'Joined';
                            $modified_sort = 'Modified';
                        }
                        $sort = isset($this->params['named']['sort'])?$this->params['named']['sort']:'';
                        $direction = isset($this->params['named']['direction'])?$this->params['named']['direction']:'';
                        $adn = ($sort == 'name')?"_".$direction:'';
                        $adj = ($sort == 'created')?"_".$direction:'';
                        $adm = ($sort == 'modified')?"_".$direction:'';
                        ?>
                        <th class="sorting<?=$adn?>"><?php echo $name_sort;?></th>
                        <th class="sorting<?=$adj?>"><?php echo $joined_sort?></th>
                        <th class="sorting<?=$adm?>"><?php echo $modified_sort?></th>
                        <th >Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php if($Groups){ $n=1;?>
                    <?php foreach($Groups as $key => $value):?>
                     <tr class="odd gradeX">
						<td>
                            <?php echo $this->Form->checkbox("Group"+$value['Group']['id'],
                                        array('value' => $value['Group']['id'],'class'=>'checksingle','title'=>'Check','disabled'=>$c2u)); ?>
                        </td>
                        <?php
                        if($value['Group']['status'] == 't'){
                            $deactive= '';
                            }else{
                            $deactive= 'class="deactive_td"';
                        }?>
                        <?php
                            $name = (strlen($value['Group']['name'])<20)?$value['Group']['name']:substr($value['Group']['name'], 0, 16).'...';
                        ?>
                        <td <?=$deactive?>><?=$name?></td>
                        <?php $joined = date("d/m/Y h:m a", strtotime($value['Group']['created'])); ?>
                        <td <?=$deactive?>><?=$joined?></td>
                        <?php $modified = date("d/m/Y h:m a", strtotime($value['Group']['modified'])); ?>
                        <td <?=$deactive?>><?=$modified?></td>
                        <?php ($value['Group']['status'] == 't')?$status='fa fa-unlock':$status='fa fa-lock'?>
                        <?php ($value['Group']['status'] == 't')?$statustype='0':$statustype='1'?>
                        <?php ($value['Group']['status'] == 't')?$statustitle='Active':$statustitle='Deactive'?>
                        <td>
                        	<a href="javascript:void(0)" onclick="statusGroupId(<?=$statustype?>,<?=$n?>,0);"><i title="<?=$statustitle?>" class="<?=$status?> fa-lg"></i></a>
                        	<a href="javascript:void(0)" onclick="editGroupId(<?=$n?>);"><i title="Edit" class="fa fa-info-circle fa-lg"></i></a>
                        	<a href="javascript:void(0)" onclick="deleteGroupId(<?=$n?>,0);"><i title="Delete" class="fa fa-trash fa-lg"></i></a>
                        </td>
                     </tr>
                     <span style="display: none" id="_<?=$n?>"><?=$value['Group']['id']?></span>
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