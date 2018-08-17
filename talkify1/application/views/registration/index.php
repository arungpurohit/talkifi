<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Talkifi Demo Registration</title>
		<base href="<?php echo base_url();?>"/>
        <link type="text/css" rel="stylesheet" href="css/rhinoslider-1.05.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/rhinoslider-1.05.min.js"></script>
        <script type="text/javascript" src="js/mousewheel.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
			$(document).ready(function() {
                $('#slider').rhinoslider({
                    controlsPlayPause: false,
                    showControls: 'always',
                    showBullets: 'always',
                    controlsMousewheel: false,
                    prevText: 'Back',
                    nextText:'Proceed',
				    slidePrevDirection: 'toRight',
					slideNextDirection: 'toLeft'
                });


                $(".rhino-prev").hide();
                $('.rhino-next').after('<a class="form-submit" href="javascript:void(0);" >Proceed</a>');
                $(".rhino-next").hide();




                var info = ["COMPANY DETAILS","PROFILE SETTINGS","DEFAULT CONFIGURATION"];
                var images = ["contact-details.png","personal-details-icon.png","account-details.png"];
                $('.rhino-bullet').each(function(index){
                    $(this).html('<p style="margin: 0pt; font-size: 13px; font-weight: bold;"><img src="./img/'+
                        images[index]+'"></p><p class="bullet-desc">'+info[index]+'</p></a>');
                });

            });
			//var readUrl   = 'index.php/demoregistration/demoregistrations/';

            $('.form-submit').live("click",function(){

                $('.form-error').html("");

                var current_tab = $('#slider').find('.rhino-active').attr("id");

                switch(current_tab){
                    case 'rhino-item0':
                        step1_validation();
                        break;
                    case 'rhino-item1':
                        step2_validation();
                        break;
                    case 'rhino-item2':
                        step3_validation();
                        break;
                }
            });

            var step1_validation = function(){

                var err = 0;

                if($('#cmpname').val() == ''){
                    $('#cmpname').parent().parent().find('.form-error').html("Company Name is Required");
                    err++;
                }
                if($('#cmpcity').val() == ''){
                    $('#cmpcity').parent().parent().find('.form-error').html("Company City is Required");
                    err++;
                }
                if($('#state').val() == '0'){
                    $('#state').parent().parent().find('.form-error').html("Please Select state");
                    err++;
                }
				if($('#cmpzip').val() == ''){
					$('#cmpzip').parent().parent().find('.form-error').html("Company Zip is Required");
					 err++;
				}
				if($('#cmpphone').val() == ''){
                    $('#cmpphone').parent().parent().find('.form-error').html("Company Phone is Required");
                    err++;
                }
                if(err == 0){
                    $(".rhino-active-bullet").removeClass("step-error").addClass("step-success");
                    $(".rhino-next").show();
                    $('.form-submit').hide();
                    $('.rhino-next').trigger('click');
                }else{
                    $(".rhino-active-bullet").removeClass("step-success").addClass("step-error");
                }


            };

            var step2_validation = function(){
                var err = 0;
				
				if($('#contactperson').val() == ''){
                    $('#contactperson').parent().parent().find('.form-error').html("Contact Person Name is Required");
                    err++;
                }
				if($('#contactemail').val() == ''){
                    $('#contactemail').parent().parent().find('.form-error').html("Contact Person Email is Required");
                    err++;
                }
				if($('#contactphone').val() == ''){
                    $('#contactphone').parent().parent().find('.form-error').html("Contact Person Phone is Required");
                    err++;
                }
                if($('#username').val() == ''){
                    $('#username').parent().parent().find('.form-error').html("Username is Required");
                    err++;
                }
                if($('#pass').val() == ''){
                    $('#pass').parent().parent().find('.form-error').html("Password is Required");
                    err++;
                }
                if($('#cpass').val() == ''){
                    $('#cpass').parent().parent().find('.form-error').html("confirm Password is Required");
                    err++;
                }
                
                if(err == 0){
                    $(".rhino-active-bullet").removeClass("step-error").addClass("step-success");
                    $(".rhino-next").show();
                    $('.form-submit').hide();
                    $('.rhino-next').trigger('click');
                }else{
                    $(".rhino-active-bullet").removeClass("step-success").addClass("step-error");
                }

            };

            var step3_validation = function(){
                var err = 0;

                if($('#industry').val() == ''){
                    $('#industry').parent().parent().find('.form-error').html("Industry is Required");
                    err++;
                }
				if($('#noofusers').val() == '0'){
                    $('#noofusers').parent().parent().find('.form-error').html("Please Select No. Users");
                    err++;
                }
				if($('#nooftelephonyusers').val() == '0'){
                    $('#nooftelephonyusers').parent().parent().find('.form-error').html("Please Select No. Telephony Users");
                    err++;
                }
                if(err == 0){
                    $(".rhino-active-bullet").removeClass("step-error").addClass("step-success");
                    $(".rhino-next").show();
                    $('.form-submit').hide();
                    $('.rhino-next').trigger('click');
                }else{
                    $(".rhino-active-bullet").removeClass("step-success").addClass("step-error");
                }
				
				$('#form-submit').submit();
				/*$.ajax({
					url: 'index.php/demoregistration/',
					type: 'POST',
					data: $( '#form-submit' ).serialize(),
					success: function( response ) {
							
							//alert(response);
											
                	}
				});*/ //end ajax()
				
            };
        </script>
        <style type="text/css">
            body { background-color:#fff; }
            #wrapper{
                border: 1px solid #DCDADA;
                border-radius: 5px 5px 5px 5px;
                box-shadow: 2px 2px 2px #E1E1E1;
                width:700px;
                height:540px;
                background:#2E5E79;

            }
            #wrapper h3{
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                font-size:16px;
                height:40px;
                margin:0;
                padding:16px 0 0 20px;
                text-shadow: 1px 1px 2px #000;
                filter: dropshadow(color=#000, offx=1, offy=1);
                color:#fff;
            }
            #slider {
				background: #fff;
                /*IE bugfix*/
                padding:0;
                margin:0;
                width:700px;
                height:440px;	

            }

            #slider li { list-style:none; }

            #page {
                width:600px;
                margin:50px auto;
            }

            #slider{
                color: #000;
                background:#f4f4f4;
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                font-size:12px;
            }

            .form-step{

                padding:19% 3% !important;


            }

            .form-submit{
                cursor: pointer;
                display: block;
                position: absolute;
                right: 0;
                bottom: 0;
                -moz-user-select: none;
                background: none repeat scroll 0 0 #6F95DC;
                border-radius: 5px 5px 5px 5px;
                color: #FFFFFF;
                display: block;
                margin: 0 25px 25px;
                padding: 10px;
                text-align: center;
                width: 125px;
                z-index: 10;
                font-weight: bold;
                text-decoration: none;
                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#94b9e9), to(#4870d2));
                background-image: -moz-linear-gradient(#94b9e9, #4870d2);
                background-image: -webkit-linear-gradient(#94b9e9, #4870d2);
                background-image: -o-linear-gradient(#94b9e9, #4870d2);
                filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#94b9e9, endColorstr=#4870d2)";
                -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#94b9e9, endColorstr=#4870d2)";
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;

            }

            .errorDisplay{
                border:2px solid red;
            }

            .form-left{
                color: #717171;
                float: left;
                font-size: 13px;
                font-weight: bold;
                padding: 5px;
                width: 200px;
            }
            .form-right{
                float: left;
                width: 214px;
            }
            .row{
                float: left;
                margin: 5px 0;
                width: 100%;
            }
            .form-step input[type='text']{
                border: 1px solid #CFCFCF;
                border-radius: 4px 4px 4px 4px;
                height: 25px;
                padding: 3px;
                width: 200px;
            }
            select{
                border-radius: 4px;
                border: 1px solid #CFCFCF;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                background: #FFF;
                padding: 2px;
                height: 30px;
                width:205px;
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                font-size:12px;
                background:#f4f4f4;
            }

            select option{
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                font-size:12px;
                background:#f4f4f4;
                color:#717171;
            }


            .form-error{
                color: red;
                font-size: 12px;
                padding: 8px;
            }

            .step-error{
                background:#f5715f !important;
                color:#FFF !important;
                -moz-box-shadow:1px 1px 4px #C6C4C4
                    -webkit-box-shadow:1px 1px 4px #C6C4C4
                    box-shadow:1px 1px 4px #C6C4C4
            }
            .step-success{
                background:#72e487 !important;
                color:#FFF !important;
                -moz-box-shadow:1px 1px 1px 4px #C6C4C4
                    -webkit-box-shadow:1px 1px 1px 4px #C6C4C4
                    box-shadow:1px 1px 1px 4px #C6C4C4
            }
            .bullet-desc{
                font-size: 14px;
                font-weight: bold;
            }
        </style>
   
	
        <div id="page">
            <div id="wrapper">
                <h3>Talkifi Demo Registration</h3>
				<?php if($inserted!=""){
					echo "Registration done successfully";
				}
				?>
			<?php // echo form_open('demoregistration/','form-submit');?>
			
			<form name="form-submit" action="index.php/demoregistration" method="post" accept-charset="utf-8" id="form-submit"/>
				<?php echo validation_errors(); ?>
                    <div id="slider">
				
                        <div class="form-step" >

                            <div class="row">
                                <div class="form-left">Company Name *</div>
                                <div class="form-right"><input type="text" id="cmpname" name="cmpname" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
							<div class="row">
                                <div class="form-left">Address *</div>
                                <div class="form-right"><textarea id="cmpaddress" name="cmpaddress" ></textarea></div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">City *</div>
                                <div class="form-right"><input type="text" id="cmpcity" name="cmpcity" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">State</div>
                                <div class="form-right">
                                    <select id="cmpstate" name="cmpstate">
									 	<option value="0">SELECT</option>
                                        <option value="AP">Andra Pradesh	</option>
										<option value="ArPr">Arunachal Pradesh	</option>
										<option value="AS">	Assam	</option>
										<option value="BI">	Bihar	</option>
										<option value="CH">	Chhattisgarh	</option>
										<option value="DE">	Delhi 	</option>
										<option value="GA">	Goa	</option>
										<option value="GU">	Gujarat	</option>
										<option value="HA">	Haryana	</option>
										<option value="HP">	Himachal Pradesh	</option>
										<option value="JK">	Jammu and Kashmir	</option>
										<option value="JH">	Jharkhand	</option>
										<option value="KA">	Karnataka	</option>
										<option value="KE">	Kerala	</option>
										<option value="MP">	Madya Pradesh	</option>
										<option value="MH">	Maharashtra	</option>
										<option value="MA">	Manipur	</option>
										<option value="ME">	Meghalaya	</option>
										<option value="MZ">	Mizoram	</option>
										<option value="NA">	Nagaland	</option>
										<option value="OR">	Orissa	</option>
										<option value="PU">	Punjab	</option>
										<option value="RA">	Rajasthan	</option>
										<option value="SI">	Sikkim	</option>
										<option value="TN">	Tamil Nadu	</option>
										<option value="TR">	Tripura	</option>
										<option value="UT">	Uttaranchal	</option>
										<option value="UP">	Uttar Pradesh	</option>
										<option value="WB">	West Bengal	</option>
                                    </select>
                                </div>
                                <div class="form-error"></div>
                            </div>
							 <div class="row">
                                <div class="form-left">ZIP *</div>
                                <div class="form-right"><input type="text" id="cmpzip" name="cmpzip" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
							 <div class="row">
                                <div class="form-left">Phone *</div>
                                <div class="form-right"><input type="text" id="cmpphone" name="cmpphone" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                        </div>
                        <div class="form-step" >
							 <div class="row">
                                <div class="form-left">Contact Person Name *</div>
                                <div class="form-right"><input type="text" id="contactperson" name="contactperson" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">Contact Person Email *</div>
                                <div class="form-right"><input type="text" id="contactemail" name="contactemail" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">Contact Person Phone *</div>
                                <div class="form-right"><input type="text" id="contactphone" name="contactphone" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                           <div class="row">
                                <div class="form-left">Referred By *</div>
                                <div class="form-right">
                                    <select id="referred" name="referred">
									 	<option value="0">SELECT</option>
                                         <option value="AB">ARINDAM </option>
										<option value="VJ" selected="selected">VIJI</option>
                                        <option value="HA">HARSHA</option>
                                        <option value="SL">SUNIL</option>
										<option value="YA">YATHISH</option>
										<option value="OT">OTHERS</option>
                                    </select>
                                </div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">Password *</div>
                                <div class="form-right"><input type="password" id="pass" name="pass" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                            <div class="row">
                                <div class="form-left">Confirm Password *</div>
                                <div class="form-right"><input type="password" id="cpass" name="cpass" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
                        </div>
                        <div class="form-step">
                            <div class="row">
                                <div class="form-left">Industry *</div>
                                <div class="form-right"><input type="text" id="industry" name="industry" class="form-input" /></div>
                                <div class="form-error"></div>
                            </div>
							<div class="row">
                                <div class="form-left">No. of users *</div>
                                <div class="form-right">
                                    <select id="noofusers" name="noofusers">
									 	<option value="">SELECT</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
                                    </select>
                                </div>
                                <div class="form-error"></div>
                            </div>
                           <div class="row">
                                <div class="form-left">No. of Telephony users *</div>
                                <div class="form-right">
                                    <select id="nooftelephonyusers" name="nooftelephonyusers">
									 	<option value="0">SELECT</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
                                    </select>
                                </div>
                                <div class="form-error"></div>
                            </div>
							
                        </div>
                    </div>
                </form>
            </div>
        </div>
		</div>
    
