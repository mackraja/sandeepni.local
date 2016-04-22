<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en'>
<!--<![endif]-->
    <head>
            <?php echo $this->element('front/header'); ?>
    </head>
    <body>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('front/scripts'); ?>
    </body>
</html>
