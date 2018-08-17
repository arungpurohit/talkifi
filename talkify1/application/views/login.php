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
                    <!--<img src="img/logo.png" alt="Logo" />-->
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

<?php echo validation_errors();?>

<div id="login-box">
<?php echo form_open('verifylogin');?>
<H2>Talkify Login</H2>
Adding Wings to technology...
<br />
<br />
<div id="login-box-name" style="margin-top:20px;">User Name:</div>
<div id="login-box-field" style="margin-top:20px;">
<input name="user_name" class="form-login" title="Username" type="email" required /></div><br>
<div id="login-box-name">Password:</div><div id="login-box-field">
<input name="pswd" type="password" class="form-login" title="Password" required /></div>
<br />
<span class="login-box-options"><input type="checkbox" name="1" value="1"> Remember Me <a href="#" style="margin-left:30px;">Forgot password?</a></span>
<br />
<br />
	<input type="submit" name="login" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="cmp_reset" class="btn" value="clear"/>

</form>
</div>

</div>

</body>		
</html>
</body>
</html>
