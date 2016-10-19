<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->


<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>NEW USER</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Fill out the form below to login to Register.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	
	<!--USERNAME--><input name="username" type="text" class="input username" value="Username" onfocus="this.value=''" /><!--END USERNAME-->
    <!--email--><input name="email" type="email" class="input email" value="Email" onfocus="this.value=''" /><!--END email-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="register" value="REGISTER" class="button" />
	 <!--REGISTER BUTTON--><form action="login.php"><input type="submit" name="submit" value="login" class="register" /><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->
					
				<?php 
 
						if(isset($_POST['register']))  
							{  
								include("connectvars.php");//make connection here  

								$username = $_POST["username"];
								$password = md5($username);
								$email = $_POST["email"];
   
						if($username=='')  
							{  
								echo"<script>alert('Please enter the User Name')</script>";  
								exit();  
							}
						
						if($email=='')  
							{  
								echo"<script>alert('Please enter the email')</script>";  
								exit();  
							}
	   
						//here query check weather if user already registered so can't register again.

						$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);   
						$check_user="select * from user WHERE username='$username'";  
						$run_query=mysqli_query($dbcon,$check_user);  
  
						if(mysqli_num_rows($run_query)>0)  
							{  
								echo "<script>alert('User $username is already exist in our database, Please try another one!')</script>";  
								exit();  
							}  

						//insert the user into the database.  
						$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
						$insert_user="insert into user VALUES ('$username','$password','$email')";
						if(mysqli_query($dbcon,$insert_user))  
							{  
								echo"<script>alert('User Created, Now Click Login')</script>";  
							}  
									else  
										{  
											echo "<script>alert('Fail to create user, there is been some error!')</script>";  
										} 
  
  
							}  
  
				?>

</div>




</html>