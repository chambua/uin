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
	
	<!-- including head.php file that contains boostraps for styling -->
     <?php require_once('includes/head.php'); ?>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

	<!-- include style for table -->
	<?php require_once('includes/table_style.php')?>
	
</head>

<body>
    <div id="wrapper">
       <!--include side panel menu -->
		<?php require_once('includes/side_menu.php') ?>	

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
         
		<hr/> <!-- include top menu -->
		<?php require_once('includes/top_menu.php') ?>	<hr/>
						
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
				<div class="form-group" style="text-align:center" class="form-group required"><hr/><a target='_blank' href="#">| term and conditions of use | Powered by University Intellectual Nertwork &nbsp &#9400; 2016</a><hr/></div>		
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
