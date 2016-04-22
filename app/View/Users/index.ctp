<!-- Social Links -->
<nav class="social-nav">
        <ul>
            <li><?php $facebook = $this->Html->image("front/img/icon-facebook.png");
                echo $this->Html->link($facebook,'https://www.facebook.com/MackRaja',array('target'=>'_blank','escape' => false));?></li>
            <li><?php $twitter = $this->Html->image("front/img/icon-twitter.png");
                echo $this->Html->link($twitter,'https://twitter.com/montykhanna007',array('target'=>'_blank','escape' => false));?></li>
            <li><?php $googleplus = $this->Html->image("front/img/icon-google.png");
                echo $this->Html->link($googleplus,'https://plus.google.com/+MontyKhanna',array('target'=>'_blank','escape' => false));?></li>
            <li><?php $linkedin = $this->Html->image("front/img/icon-linkedin.png");
                echo $this->Html->link($linkedin,'http://in.linkedin.com/pub/monty-khanna/54/15a/b85',array('target'=>'_blank','escape' => false));?></li>
            <li><?php $pinterest = $this->Html->image("front/img/icon-pinterest.png");
                echo $this->Html->link($pinterest,'https://www.pinterest.com/mkmontykhanna/',array('target'=>'_blank','escape' => false));?></li>
        </ul>
</nav>

<!-- Switch to full screen -->
<button class="full-screen" onclick="$(document).toggleFullScreen()"></button>

<!-- Site Logo -->
<div id="logo"><a href="<?php echo $this->Html->url(array('controller' => 'logins', 'action' => 'login', 'admin' => true)); ?>" class="active">Admin</a></div>

<!-- Main Navigation -->
<nav class="main-nav">
        <ul>
                <li><?php echo $this->Html->link('Home','#home',array('class'=>'active'));?></li>
                <li><?php echo $this->Html->link('About','#about');?></li>
                <li><?php echo $this->Html->link('Contact','#contact');?></li>
        </ul>
</nav>

<!-- Slider Controls -->
<?php echo $this->Html->image("front/img/arrow-left.png", array('id'=>'arrow_left','alt'=>'Slide Left','url' => '#'));?>
<?php echo $this->Html->image("front/img/arrow-right.png", array('id'=>'arrow_right','alt'=>'Slide Right','url' => '#'));?>

<!-- Home Page -->
<section class="content show" id="home">
        <h1>Welcome</h1>
        <h5>Our new site is coming soon!</h5>
</section>

<!-- About Page -->
<section class="content hide" id="about">
        <h1>About</h1>
        <h5>Here's a little about myself.</h5>
        <p>My name is "MontyKhanna". I post graduated from a three-year program in IT(MCA). I'm career-driven and want success in every aspect of my life. I'm very adventurous and like to travel new places. I like to travel at Hilly areas, Camping, Tracking. You can see my recent travel pics. Join me at <a href="https://www.facebook.com/MackRaja" target="_blank">Facebook</a>.</p>
</section>

<!-- Contact Page -->
<section class="content hide" id="contact">
        <h1>Contact</h1>
        <h5>Get in touch.</h5>
        <p>Email: <a href="mailto:mkmontykhanna@gmail.com">mkmontykhanna@gmail.com</a><br />
           Mobile: +91 9896360087<br />
           Skype: MackRaja1<br /></p>
</section>

<!-- Background Slides -->
<div id="maximage">
        <div>
                <?php echo $this->Html->image("front/img/backgrounds/bg-img-1.jpg", array('alt' => ''));?>
                <?php echo $this->Html->image("front/img/backgrounds/gradient.png", array('class'=>'gradient','alt' => ''));?>
        </div>
        <div>
                <?php echo $this->Html->image("front/img/backgrounds/bg-img-2.jpg", array('alt' => ''));?>
                <?php echo $this->Html->image("front/img/backgrounds/gradient.png", array('class'=>'gradient','alt' => ''));?>
        </div>
        <div>
                <?php echo $this->Html->image("front/img/backgrounds/bg-img-3.jpg", array('alt' => ''));?>
                <?php echo $this->Html->image("front/img/backgrounds/gradient.png", array('class'=>'gradient','alt' => ''));?>
        </div>
        <div>
                <?php echo $this->Html->image("front/img/backgrounds/bg-img-4.jpg", array('alt' => ''));?>
                <?php echo $this->Html->image("front/img/backgrounds/gradient.png", array('class'=>'gradient','alt' => ''));?>
        </div>
        <div>
                <?php echo $this->Html->image("front/img/backgrounds/bg-img-5.jpg", array('alt' => ''));?>
                <?php echo $this->Html->image("front/img/backgrounds/gradient.png", array('class'=>'gradient','alt' => ''));?>                
        </div>
</div>