<ul class="nav navbar-nav pull-right">
    <!-- BEGIN USER LOGIN DROPDOWN -->
    <li class="dropdown user">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
       <?php
       		$userthumb = isset($thumb)?$thumb:'thumb_profile.png';
       		$filepath = isset($thumb)?'files/user/thumb/':'img/profile/';
       ?>
       <?php echo $this->Html->image($filepath.$userthumb); ?>
       <?php 
       		$username = isset($username)?$username['Login']['username']:'';
       ?>
       <span class="username"><?=ucfirst($username)?></span>
       <i class="fa fa-angle-down"></i>
       </a>
       <ul class="dropdown-menu">
          <li>
              <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'profile','admin'=>'true')); ?>"><i class="fa fa-user"></i> My Profile</a>
          </li>
<!--           <li> -->
              <!-- <a href="<?php //echo $this->Html->url(array('controller'=>'Users','action'=>'mail','admin'=>'true')); ?>"><i class="fa fa-envelope"></i> Mail</a>-->
<!--           </li> -->
          <li>
              <a href="<?php echo $this->Html->url(array('controller'=>'logins','action'=>'logout','admin'=>'true')); ?>"><i class="fa fa-key"></i> Log Out</a>
          </li>
       </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->
 </ul>