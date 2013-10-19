<?php

if (elgg_is_logged_in())
{
forward('activity');
}



?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Elgg Network</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    

        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="mod/independence/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="mod/independence/css/style.css" />
		<link rel="stylesheet" type="text/css" href="mod/independence/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!--  top bar -->
            <div class="codrops-top">
                <a href="#" style="color:white;">
                    <strong>&laquo; About us </strong>
                </a>
                <span class="right">
                    <a href="#" style="color:white;">
                        <strong>Terms of USe</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ top bar -->
			<?php 

echo elgg_view('page/elements/messages', array('object' => $_SESSION['msg']));
unset($_SESSION['msg']);

?>
            <header>
                <h1>Welcome <span>to our network</span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" action="action/login" class="elgg-form" autocomplete="on"> 
							
							<?php
$ts = time();
$token = generate_action_token($ts);
?>

<input type="hidden" name="__elgg_token" value="<?php echo $token; ?>"/>
<input type="hidden" name="__elgg_ts" value="<?php echo $ts; ?>" />

                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="username or email"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="password" /> 
                                </p>
                                <p class="keeplogin"> 
									
									<label for="loginkeeping"><a href="forgotpassword">forgot password?</a></label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" class="elgg-button elgg-button-submit" action="action/login" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  method="post" action="action/register" class="elgg-form" autocomplete="on"> 
							
							<input type="hidden" name="__elgg_token" value="<?php echo $token; ?>" />
<input type="hidden" name="__elgg_ts" value="<?php echo $ts; ?>" />
                                <h1> Sign up </h1> 
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your display name</label>
                                    <input id="usernamesignup" name="name" required="required" type="text" placeholder="Enter Display Name" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="Enter Username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="Enter Email"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="Enter Password"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="password2" required="required" type="password" placeholder="Repeat Password"/>
                                </p>
								<input type="hidden" name="friend_guid" />
<input type="hidden" name="invitecode" />
<input type="hidden" value="register" name="action" />
                                <p class="signin button"> 
									<input type="submit" value="Sign up"  name="submit" class="elgg-button elgg-button-submit"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>