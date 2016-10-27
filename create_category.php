<!-- start session -->
<?php require_once('includes/session_start.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>University Intellectual Nertwork</title>
     <?php	require_once('includes/head.php'); ?>
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	
</head>
<body>
    <div id="wrapper">
    
	<!-- include side menu -->
	<?php require_once('includes/side_menu.php')?>
        
		<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
        
	<?php require_once('includes/top_menu.php') ?><hr/>
						
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

    </div>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
