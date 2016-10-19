<?php
require_once("connectvars.php");
//define posted value
$name = isset( $_POST['name'] ) ? mysql_real_escape_string( $_POST['name'] ) : "";
 
if($name == null){
    //if no name input
    echo "Please enter a Company name.";
}elseif(strlen( $name ) < 2){
    //if the input is less than 2 characters
    //we used 'strlen' function to count string characters
    echo "name is too short.";
}else{
    //query the inputted value
    $sql = "select  * from subcategoryentities where name = '$name'";
 
    $rs = mysql_query( $sql );
    $num = mysql_num_rows( $rs );
 
    if($num == 1 ){ //if name found
        while($row = mysql_fetch_array( $rs )){
            $fn = $row['name'];
            echo "<div style='color: red; font-weight: bold;'>company exist.</div>";
        }
    }else{ //if username not found
        echo "<span style='font-weight: bold;'>$name</span> Proceed!";
    }
}
?>