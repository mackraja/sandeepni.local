<?php echo $this->Html->charset('utf-8'); ?>
<?php echo $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1')); ?>
<title>Frontend</title>
<?php echo $this->Html->meta('shortcut icon','favicon.ico',array('type' => 'icon'));?>
<?php echo $this->Html->meta('apple-touch-icon','front/img/favicon.ico',array('type' => 'icon'));?>
<?php echo $this->Minify->css(array('front/css/maximage','front/css/styles')); ?>

<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--[if IE 6]>
        <style type="text/css" media="screen">
                .gradient {display:none;}
        </style>
<![endif]-->