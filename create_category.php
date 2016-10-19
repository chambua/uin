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
                <li><a href="#">comments</a></li>
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
					<?php
						require_once('includes/head_sms.php');
					?>
				</div>
			</nav> <hr/>
						
		<div class="form-group">
			<div  class="col-xs-10" >
			<p align="center" ><font color="DarkCyan">Fill the form to Add new category</font></p><hr>
        
					<!-- creating the form to create new category-->
					<form role="form" name="create" method="post" action="" >
	
						<div class="form-group">
							<label >Category name:</label>
							<input name="cat_name" type="text" required class="form-control">
						</div>

						<div class="form-group">
							<label>Description:</label>
							<textarea rows="10" name="description" type="textarea" class="form-control" placeholder="give description"></textarea>
						</div>

						<div class="form-group">
							<input name="create" type="submit" class="btn btn-info" value="Add">
						</div>
					</form>
					
					
					<?php 
				if(isset($_POST['create']))  
				{  
					require_once("connectvars.php");	  
					$cat_name = $_POST["cat_name"];
					$description = $_POST["description"];
		
				// all form fields should be filled 
	 
	            if($cat_name=='')  
					{  
						echo"<script>alert('Please enter the category name')</script>";  
						exit();  
					}
	            
				if($description=='')  
					{ 
						echo"<script>alert('Please enter the Descrption')</script>";  
						exit();  
					}

				//make connection to the database.
					$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);   
					$check_category="select * from category WHERE cat_name='$cat_name'";  
					$run_query=mysqli_query($dbcon,$check_category);  
				
				// comfiriming if the name already exit in the database
				if(mysqli_num_rows($run_query)>0)  
					{  
						echo "<script>alert('University $cat_name is already exist in database, Please try another one!')</script>";  
						exit();  
					}  
				
                //insert the category name into the database.  
					$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
					$insert_uni="insert into categories VALUES ('NULL','$cat_name','$description','NOW()')";
					echo "<meta http-equiv='refresh' content='0;url=categories.php'>";
					if(mysqli_query($dbcon,$insert_uni))  
					{  
						echo"<script>alert('Category added')</script>";  
					}  
						else  
							{  
								echo "<script>alert('Fail to add Category, there is been some error!')</script>";  
							} 
  
				}  
			?>									  
				<div class="form-group" style="text-align:center" class="form-group required"><hr/><a target='_blank' href="tnc.html">| term and conditions of use | Powered by University Intellectual Nertwork &nbsp &#9400; 2016</a><hr/></div>				  		
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
