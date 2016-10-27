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
     <?php require_once('includes/head.php'); ?>
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	
	
	<!-- include table style -->
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
        
	<?php require_once('includes/top_menu.php')?>	<hr/>
					
			<div class="form-group">
				<div  class="col-xs-10" >
				
				<?php
				// including shared files 
					require_once('connectvars.php');
				
					if (isset($_GET['cat_id']))
					{	
					// Grab the score data from the GET
						$cat_id = $_GET['cat_id'];
					}
				  
					else if (isset($_POST['cat_id'])) 
					{
                    // Grab the score data from the POST
						$cat_id = $_POST['cat_id'];
			   	    }
				  
				    // Connect to the database 
						$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				        $query = "SELECT * FROM categories_entity WHERE cat_id = '$cat_id' ";
					    $data = mysqli_query($connect, $query);
							
					// Loop through the array of score data, formatting it as HTML 
					$i = 0;
						while ($row = mysqli_fetch_array($data)) 
						{ 
					// Display the score data
							if ($i == 0) 
								{
								}
					//echo all post details
					echo "<table style='width:100%; text-align:left;'>";
									echo"<tr>";
									echo '<h3>'.'<b>'.$row['username'].'</b>'.'&nbsp:&nbsp' . $row['title'] . '</h3>';	
									echo "<hr>";									
									echo '<p>'.$row['description'].'</p>';
									echo "<hr>";
									$i++;
									echo"</tr>";	
							echo"</table>";
						}
							  mysqli_close($connect);
							  ?>
							  
							 <div class="form-group" style="text-align:center" class="form-group required"><a target='_blank' href="tnc.html">| term and conditions of use | Powered by University Intellectual Nertwork &nbsp &#9400; 2016</a><hr/></div>
						</div>
					</div>	  				  		
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
