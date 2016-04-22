<?php echo $this->Html->charset('utf-8'); ?>
<title>Admin Dashboard Template</title>
<base style="display:none" href="<?php echo $this->webroot;?>">
<?php echo $this->element('meta'); ?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php echo $this->element('header_global'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<?php echo $this->Minify->css('plugins/select2/select2_conquer'); ?>
<?php echo $this->Minify->css('plugins/data-tables/DT_bootstrap'); ?>
<?php echo $this->Minify->css('plugins/bootstrap-modal/css/bootstrap-modal-bs3patch'); ?>
<?php echo $this->Minify->css('plugins/bootstrap-modal/css/bootstrap-modal'); ?>
<!-- BEGIN THEME STYLES --> 
<?php echo $this->Minify->css(array('css/style-conquer','css/style','css/style-responsive','css/plugins')); ?>
<?php echo $this->Minify->css('css/themes/default',array('id' => 'style_color')); ?>
<?php echo $this->Minify->css('css/custom'); ?>
<!-- END THEME STYLES -->
<?php //echo $this->Html->meta('favicon.ico','',array('type' => 'icon'));?>