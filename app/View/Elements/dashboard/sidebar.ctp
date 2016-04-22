<?php
//pr($this->params);die;
$controllename = $this->params['controller'];
$actionname =  $this->params['action'];
$admin = $this->params->admin;
if($controllename == 'Users' && $actionname == 'admin_dashboard' && $admin == 1){
        $dashboard = "active";
}elseif($controllename == 'Users' && $actionname == 'admin_index' && $admin == 1){
        $user = "active";
}elseif($controllename == 'Groups' && $actionname == 'admin_index' && $admin == 1){
        $groups = "active";
}
?>
<ul class="page-sidebar-menu">
    <li>
       <form class="search-form search-form-sidebar" role="form">
          <div class="input-icon right">
             <i class="fa fa-search"></i>
             <input type="text" class="form-control input-medium input-sm" placeholder="Search...">
          </div>
       </form>
    </li>
    <li>
       <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
       <div class="sidebar-toggler"></div>
       <div class="clearfix"></div>
       <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    </li>
    <li class="<?=@$dashboard?>">
        <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard','admin'=>'true')); ?>">
       <i class="fa fa-dashboard"></i> 
       <span class="title">Dashboard</span>
       <span class="selected"></span>
       </a>
    </li>
    <li class="<?=@$groups?>">
       <a href="<?php echo $this->Html->url(array('controller'=>'Groups','action'=>'index','admin'=>'true')); ?>">
       <i class="fa fa-group"></i> 
       <span class="title">Groups</span>
       <span class="selected"></span>
       </a>
    </li>
    <li class="<?=@$user?>">
       <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'index','admin'=>'true')); ?>">
       <i class="fa fa-user"></i> 
       <span class="title">Users</span>
       <span class="selected"></span>
       </a>
    </li>
    <li class="">
        <a href="javascript:void(0)">
            <i class="fa fa-list"></i> 
            <span class="title">Master</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu" style="display: none;">
           <li class="">
              <a href="javascript:void(0)">
              School Information</a>
           </li>
           <li class="">
              <a href="javascript:void(0)">
              Student Information</a>
           </li>
        </ul>
    </li>
<!--    <li class="<?=@$modification?>">
       <a href="<?php echo $this->Html->url(array('controller'=>'ModificationLogs','action'=>'index','admin'=>'true')); ?>">
       <i class="fa fa-edit"></i> 
       <span class="title">Modification Logs</span>
       <span class="selected"></span>
       </a>
    </li>-->
 </ul>