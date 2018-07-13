{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/
-->*}
{strip}
<!DOCTYPE html>
<html>
	<head>
		<title>Vtiger login page Custom</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- for Login page we are added -->

                            
{*                newly added links and scripts*}
                 <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
                <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="libraries/css/style.css">	
	</head>
	<body>
                                        <div class="pen-title">
                                            <h2>Gallagher Security Middle East</h2>
                                            <span>CRM powered by Vtiger {$CURRENT_VERSION} </span>  <!--get the version automatically-->
                                          </div>
                                    
 <div class="container" id="loginDiv">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action="index.php?module=Users&action=Login" method="POST">
        
{if isset($smarty.request.error)}
<div class="alert alert-error">
<p>Invalid username or password.</p>
</div>
{/if}
												{if isset($smarty.request.fpError)}
<div class="alert alert-error">
<p>Invalid Username or Email address.</p>
</div>
{/if}

{if isset($smarty.request.status)}
<div class="alert alert-success">
<p>Mail has been sent to your inbox, please check your e-mail.</p>
</div>
{/if}
												{if isset($smarty.request.statusError)}
													<div class="alert alert-error">
<p>Outgoing mail server was not configured.</p>
</div>
{/if}

                                                                                                
      <div class="input-container">
        <input type="text" id="Username" name="username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" ><span>Go</span></button>
      </div>
      <div class="controls" id="forgotPassword">
      <div class="footer"><a>Forgot your password?</a></div>
   
  </div>
 </form>
  </div>
  </div>

{*Form for Forget Password*}

<div class="container hide" id="forgotPasswordDiv">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Forgot Password</h1>
    <form action="forgotPassword.php" method="POST">
                                                                                                
      <div class="input-container">
        <input type="text" id="user_name" required="required"/>
        <label for="user_name">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="emailId" required="required"/>
        <label for="emailId">Email</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
          <button type="submit" name="retrievePassword" ><span>Go</span></button>
      </div>
      <div class="controls" id="backButton">
      <div class="footer"><a>Back</a></div>
    </form>
  </div>
  </div>
  </div>

{*End of Forget Password Form*}
																
														
	</body>
	<script>
		jQuery(document).ready(function(){
			jQuery("#forgotPassword a").click(function() {
				jQuery("#loginDiv").hide();
				jQuery("#forgotPasswordDiv").show();
			});
			
			jQuery("#backButton a").click(function() {
				jQuery("#loginDiv").show();
				jQuery("#forgotPasswordDiv").hide();
			});
			
			jQuery("button[name='retrievePassword']").click(function (){
				var username = jQuery('#user_name').val();
				var email = jQuery('#emailId').val();
				
				var email1 = email.replace(/^\s+/,'').replace(/\s+$/,'');
				var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
				var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
				
				if(username == ''){
					alert('Please enter valid username');
					return false;
				} else if(!emailFilter.test(email1) || email == ''){
					alert('Please enater valid email address');
					return false;
				} else if(email.match(illegalChars)){
					alert( "The email address contains illegal characters.");
					return false;
				} else {
					return true;
				}
				
			});
		});
	</script>
{*          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>*}
</html>	
{/strip}
