<?php echo $this->Html->docType('html5');?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<?php $admin_cont = array('Users','Groups');?>
<head>
    <?php if($this->params->controller == 'Users' && $this->params->action == 'admin_profile' && $this->params->admin == 1){
        echo $this->element('profile/header');
    }elseif($this->params->controller == 'Users' && $this->params->action == 'admin_mail' && $this->params->admin == 1){
        echo $this->element('mail/header'); 
    }elseif(in_array($this->params->controller,$admin_cont) && $this->params->action == 'admin_index' && $this->params->admin == 1){
        echo $this->element('user/header'); 
    }else{
        echo $this->element('dashboard/header'); 
    }?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
   <!-- BEGIN HEADER -->   
   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="header-inner">
         <!-- BEGIN LOGO -->
         <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_dashboard')); ?>">
             <?php echo $this->Html->image('img/logo.png', array('alt' => 'logo','class'=>'img-responsive')); ?>
         </a>
         <!--<form class="search-form search-form-header" role="form" action="index.html" >
            <div class="input-icon right">
               <i class="fa fa-search"></i>
               <input type="text" class="form-control input-medium input-sm" name="query" placeholder="Search...">
            </div>
         </form>-->
         <!-- END LOGO -->
         <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
         <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <?php echo $this->Html->image('img/menu-toggler.png', array('alt' => '')); ?>
         </a> 
         <!-- END RESPONSIVE MENU TOGGLER -->
         <!-- BEGIN TOP NAVIGATION MENU -->
         <?php echo $this->element('dashboard/topnavigation'); ?>
         <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <div class="clearfix"></div>
   <!-- BEGIN CONTAINER -->
   <div class="page-container">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar navbar-collapse collapse">
         <!-- BEGIN SIDEBAR MENU -->        
            <?php echo $this->element('dashboard/sidebar'); ?>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <?php echo $this->fetch('content'); ?>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      <?php echo $this->element('dashboard/footer'); ?>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <?php if($this->params->controller == 'Users' && $this->params->action == 'admin_profile' && $this->params->admin == 1){
        echo $this->element('profile/scripts');
    }elseif($this->params->controller == 'Users' && $this->params->action == 'admin_mail' && $this->params->admin == 1){
        echo $this->element('mail/scripts'); 
    }elseif(in_array($this->params->controller,$admin_cont) && $this->params->action == 'admin_index' && $this->params->admin == 1){
        echo $this->element('user/scripts'); 
    }else{
        echo $this->element('dashboard/scripts'); 
    }?>
   <!-- END JAVASCRIPTS -->
   <?php //echo $this->element('sql_dump'); ?>
</body>
<!-- END BODY -->
</html>