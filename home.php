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
 $query=mysql_query("SELECT * FROM users WHERE username='$username'");
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

	<title>University Intellectual Nertwork</title>
	<!-----Including CSS for different screen sizes----->
	<link rel="stylesheet" type="text/css" href="responsiveform.css">
	<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="responsiveform1.css" />
	<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="responsiveform2.css" />
	<link rel="stylesheet" media="screen and (max-width: 350px)" href="responsiveform3.css" />

	<!-- including head.php file that contains boostraps for styling -->
     <?php
		require_once('includes/head.php');
	 ?>
	
    <title>University Intellectual Nertwork</title>

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
                <li class="sidebar-brand"><a href="#">UIN</a></li>
				<li><a class="active" href="home.php">Home</a></li>
                <li><a href="index.php">User Accounts</a></li>
                <li><a class="active" href="posts.php">posts</a></li>
                <li><a href="comments.php">comments</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="university.php">University</a></li>
                <li><li ><a href="change_password.php">Uploaded Files</a></li></li>
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
						<a class="navbar-brand" class="active" href="#">University Intellectual Nertwork</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="#"></a></li>
					</ul>
						<?php require_once('includes/head_sms.php'); ?>
				</div>
			</nav> <hr/>
							
		
			<h3 align="center" class="list-group-item" ><font color="DarkCyan">Database Informations</font></h3>
			
  
                      	
					<?php
					
					// Connect to the database 
						require_once('connectvars.php');	
						// counting the number of users
						$result=mysql_query("SELECT count(*) as total from users");
						$data=mysql_fetch_assoc($result);
						
						echo '<a  class="list-group-item">number of users in the App:&nbsp'.$data['total'].'</a>';
						
						//counting the number of the categories_entity
						$result=mysql_query("SELECT count(*) as total from categories_entity");
						$data=mysql_fetch_assoc($result);			
						echo '<a  class="list-group-item">number of posts in the App:&nbsp'.$data['total'].'</a>';
						
						
						//counting the number of the university
						$result=mysql_query("SELECT count(*) as total from university");
						$data=mysql_fetch_assoc($result);
						echo '<a  class="list-group-item">number of university in the App:&nbsp'.$data['total'].'</a>';
						
						
						//counting the number of the comments
						$result=mysql_query("SELECT count(*) as total from comments");
						$data=mysql_fetch_assoc($result);
						echo '<a  class="list-group-item"> number of comments in the App:&nbsp'.$data['total'].'</a>';
					
						//counting the number of the categories
						$result=mysql_query("SELECT count(*) as total from categories");
						$data=mysql_fetch_assoc($result);
						echo '<a  class="list-group-item"> number of categories in the App:&nbsp'.$data['total'].'</a>';
					?>		

				
				<div class="form-group" style="text-align:center" class="form-group required"><hr/>
					<a target='_blank' href="#">| term and conditions of use | Powered by University Intellectual Nertwork &nbsp &#9400; 2016</a><hr/>
				</div>
				
			</div>
		</div>
		
	  </form>
	</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
