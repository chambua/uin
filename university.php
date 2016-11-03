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
         
		 <!-- include top menu -->
		<?php require_once('includes/top_menu.php') ?>	
		 <hr/>
						
	
	
				<table  style='width:100%'>
					<tr>
						<th>&nbsp&nbsp&nbsp&nbsp University name</th>
						<th>&nbsp&nbsp&nbsp&nbsp Description</th>	
						<th style="width:20%" align="right"><a class="btn btn-default" href="create_university.php">Add university</a></th>												
					</tr>	
				</table>
                      	
				<?php
					require_once('connectvars.php');				
				// Connect to the database 
					$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
				// Retrieve the score data from MySQL
					$query = "SELECT * FROM  `university`";
					$data = mysqli_query($connect, $query);
				// Loop through the array of score data, formatting it as HTML 
					$i = 0;
					
					while ($row = mysqli_fetch_array($data)) { 
				// Display the score data
							if ($i == 0) 
							{
							}
							echo "<table style='width:100%; text-align:left;'>";
									echo"<tr >";
										echo '<td><a href="university_user.php?uni_id='.$row['uni_id'].'">&nbsp&nbsp&nbsp&nbsp' . $row['uni_name'] .'</a></td>';
										echo '<td align="left">&nbsp&nbsp&nbsp&nbsp'.$row['uni_description'] .'</td>';
										echo '<td style="width:20%" align="right"><a class="btn btn-default" href="edit_university.php?uni_id='.$row['uni_id'].'">edit<span class="glyphicon glyphicon-pencil" aria-hidden="true"> </a></button></td>';
								
									echo"</tr>";
								$i++;									
							echo"</table>";
					}		
				mysqli_close($connect);

				?>												  
				<div class="form-group" style="text-align:center" class="form-group required"><hr/><a target='_blank' href="tnc.html">| term and conditions of use | Powered by University Intellectual Nertwork &nbsp &#9400; 2016</a><hr/></div>				  		
	
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
