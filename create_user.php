<?php
session_start();
if ($_SESSION['username']!= true){
	header("location:login.php");
	 $_SESSION['username'];
}//starting the session
?>
<?php 
include('connect.php');
$username = $_SESSION['username'] ;
$query=mysql_query("SELECT * FROM user WHERE username='$username'");
$count=mysql_num_rows($query);
while($dis=mysql_fetch_array($query)){
$username = $dis["username"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>SAMORA control panel</title>
	<!-----Including CSS for different screen sizes----->
	<link rel="stylesheet" type="text/css" href="responsiveform.css">
	<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="responsiveform1.css" />
	<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="responsiveform2.css" />
	<link rel="stylesheet" media="screen and (max-width: 350px)" href="responsiveform3.css" />

	<!-- including head.php file that contains boostraps for styling -->
     <?php
		require_once('includes/head.php');
	 ?>
	

	
    <title>FT SAMORA Control panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<style>
		table, th, td {
		table-layout: fixed;
		border: 1px solid black;
		padding: 5px;
		}
		table {
		border-spacing: 15px;
		}
	</style>
	

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                          FT Technologies Ltd.
                    </a>
                </li>
                <li>
            <a href="index.php">User Accounts</a>
                </li>
                <li>
                    <a href="list_all_companies.php">All Companies</a>
                </li>
                <li>
                    <a href="#">Add Company</a>
                </li>
                <li>
                    <a href="create_user.php">Create user</a>
                </li>
                <li>
                    <a href="ex_rate_list.php">Exchange Rate</a>
                </li>
                <li>
                    <li ><a href="change_password.php">Change Password</a></li>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
         
			<nav class="navbar-default">
				<div class="container-fluid">
				<div class="navbar-header">
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>	
					<a class="navbar-brand" class="active" href="#">SAMORA CONTROL PANEL</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
					<li><a href="#"></a></li>
				</ul>
					<?php
						require_once('includes/head_sms.php');
					?>
				</div>
			</nav> <hr/>
					
					
					
					
				<h1 align="left">Create new user account</h1><hr>

<div class="form-group">
    <form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label for="username" class="control-label col-xs-2">username:</label>
            <div class="col-xs-10">
            <input type="text" class="form-control" name="username" >
            </div>
        </div>
        
		<div class="form-group">
            <label for="email" class="control-label col-xs-2">E-mail:</label>
            <div class="col-xs-10">
            <input type="email" class="form-control" name="email" >
            </div>
        </div>


		<div class="form-group">
			<label for="createuser" class="control-label col-xs-2">Create user:</label>
			<div class="col-xs-10">
            <input type="submit" class="btn btn-info" name="createuser" value="Create">
            </div>
        </div>
    </form>
	
					
				<?php 
 
						if(isset($_POST['createuser']))  
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
								echo"<script>alert('User Created, use username as password')</script>";  
							}  
									else  
										{  
											echo "<script>alert('Fail to create user, there is been some error!')</script>";  
										} 
  
  
							}  
  
				?>

</div>


</body>

</html>
