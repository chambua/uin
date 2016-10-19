<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="msapplication-tap-highlight" content="no" />
    
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
      <title>SamoraApp</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




<!-- Include jQuery Mobile stylesheets -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<!-- Include the jQuery library -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include the jQuery Mobile library -->
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  

        


    </head>
    <body >




<div data-role="page">
  <div data-role="header">
    <a href="#" class="ui-btn ui-btn-b ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>
    <h1>Samora Avenue</h1>
    <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>
  </div>



    <div class="container" align="center"  data-role="main" class="ui-content">
  <h2>What we Offer</h2>
  <p> Fill free to navigate through the app, and get information you want.</p>
  


  <div class="panel panel-default" align="center">
  <div class="panel-body">

  <?php
                require_once('connectvars.php');
              
                // Connect to the database 
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
              
                // Retrieve the score data from MySQL
                
                $query = "SELECT * FROM  `maincategories`";
                $data = mysqli_query($connect, $query);
              
                // Loop through the array of score data, formatting it as HTML 
                $i = 0;
                while ($row = mysqli_fetch_array($data)) { 
                // Display the score data
                if ($i == 0) {
                }
                $catid = $row['catid'];
                echo '<ul>';
                echo '<li><div class="list-group" align="center"><a  class="list-group-item active" href="2nd_level_subcat.php?catid='.$row['catid'] .'">.'.$row['name'].'.</a></div></li>';
                echo '</ul>';
                  
                $i++;
                }
                mysqli_close($connect);
                ?>
    </div>
    </div>

      <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">
            app.initialize();
        </script>
   



  <div data-role="footer" style="text-align:center;">
    <div data-role="controlgroup" data-type="horizontal">
      <a href="#" class="ui-btn ui-btn-b ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Add Me On Facebook</a>
      <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Add Me On Twitter</a>
      <a href="#" class="ui-btn ui-btn-b ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Add Me On Instagram</a>
    </div>
  </div>
</div>



  

    </body>
</html>
