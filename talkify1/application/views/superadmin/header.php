<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Talkifi Super Admin</title>
	<base href="<?php echo base_url();?>"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
	
	<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.8.2.custom.css" />
	<link type="text/css" rel="stylesheet" href="css/styles.css" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
      
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>

	
	<script type="text/javascript" src="js/jquery-ui-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-templ.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
       <script src="js/setup.js" type="text/javascript"></script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
						<h1> Talkifi Super Admin</h1>
					</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo "super admin";?></li>
                            <li><a href="index.php/logout">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey"></span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
			<?php foreach($menus as $keymenu=>$valmenu)
			{
			?>
			  <li class="<?php echo $valmenu[1];?>"><a href="<?php echo $valmenu[2];?>"><span><?php echo $valmenu[0];?></span></a> </li>
    	    <?php }?>
			<div align="right" style="color:#FFFFFF; vertical-align:bottom"><strong>Powered by Talkifi</strong></div>
		</ul>
        </div>
        <div class="clear">
        </div>