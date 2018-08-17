<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Talkify Login</title>
<base href="<?php echo base_url();?>"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
	<link href="css/login-box.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="images/talkifi.png" alt="Logo" />
					<h1><font color="#FFFFFF"> Talkifi</font></h1></div>
                <div class="floatright">
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
</div>
<div style="padding: 40px 0 0 300px;">
<div id="login-box">
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

<div id="login-box-name" style="margin-top:20px;">Email</div>
<div id="login-box-field" style="margin-top:20px;"><input name="identity" id="identity" class="form-login" title="Username" type="email" required /></div>
<div id="login-box-name">Password:</div><div id="login-box-field">
<input name="password" type="password" class="form-login" title="Password" required /></div>
<br />
<span class="login-box-options"> <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> </span>
<br />
	<input type="submit" name="submit" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="cmp_reset" class="btn" value="clear"/>
<?php echo form_close();?>

<br />
<br />

<span class="login-box-options"><a href="index.php/forgot-pass"><?php echo lang('login_forgot_password');?></a>  </span>
	<br/>

</div>
</div>