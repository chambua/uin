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
     <?php require_once('includes/head.php');  ?>
	
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
		<?php require_once('includes/top_menu.php') ?>	<hr/>
				
		<div class="form-group">
			<div  class="col-xs-10" >
				<table class='table-striped' style='width:100%'>
					<tbody>
						<tr>
							<td><b>&nbsp&nbsp&nbsp&nbsp user</b></td>
							<td><b>&nbsp&nbsp&nbsp&nbsp last name</b></td>			
							<td><b>&nbsp&nbsp&nbsp&nbsp Email</b></td>											
						</tr>
					</tbody>	
				</table>
						
				<?php
					require_once('connectvars.php');				
				// Connect to the database 
					$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
				// Retrieve the score data from MySQL
					$query = "SELECT * FROM  `users`";
					$data = mysqli_query($connect, $query);
				// Loop through the array of score data, formatting it as HTML 
					$i = 0;
					
					while ($row = mysqli_fetch_array($data)) { 
				// Display the score data
							if ($i == 0) 
							{
							}
							echo "<table style='width:100%; text-align:left;'>";
									echo"<tr>";
										echo '<td><a href="view_entity_admin.php?user_id='.$row['user_id'].'">&nbsp&nbsp&nbsp&nbsp' . $row['username'] .'</a></td>';
										echo '<td>&nbsp&nbsp&nbsp&nbsp'.$row['last_name'] .'</td>';
										echo '<td>&nbsp&nbsp&nbsp&nbsp'.$row['email'] .'</td>';
										$i++;
									echo"</tr>";							
							echo"</table>";
					}		
				mysqli_close($connect);

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
