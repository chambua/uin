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
	<!-- including head.php file that contains boostraps for styling -->
     <?php require_once('includes/head.php'); ?>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

	<!-- including style for table -->
	<?php require_once('includes/table_style.php')?>
</head>

<body>

    <div id="wrapper">

    <?php require_once('includes/side_menu.php')?>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
        
	<?php require_once('includes/top_menu.php')?><hr/>
					
		<div class="form-group">
			<div  class="col-xs-10" >
				<a href="create_category.php"><button type="button" href="create_university.php"class="btn btn-default">Add category</button></a><hr/>
					<table style='width:100%'>
						<tbody>
						<tr>
							<td style="width:15%"><b>&nbsp&nbsp&nbsp&nbsp category ID</b></td>
							<td><b>&nbsp&nbsp&nbsp&nbsp category name</b></td>
							<td><b>&nbsp&nbsp&nbsp&nbsp Description</b></td>														
						</tr>
						</tbody>	
					</table>
				
				<?php
					require_once('connectvars.php');				
				// Connect to the database 
					$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
				// Retrieve the score data from MySQL
					$query = "SELECT * FROM  `categories`";
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
									echo '<td style="width:15%">&nbsp&nbsp&nbsp&nbsp'.$row['cat_id'] .'</td>';
										echo '<td><a href="categories_entity.php?cat_id='.$row['cat_id'].'">&nbsp&nbsp&nbsp&nbsp' . $row['cat_name'] .'</a></td>';
										echo '<td>&nbsp&nbsp&nbsp&nbsp'.$row['description'] .'</td>';
										$i++;
									echo"</tr>";	
							echo"</table>";
					}		
				mysqli_close($connect);

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
