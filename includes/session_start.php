<?php
session_start();
if ($_SESSION['username']!= true){
	header("location:login.php");
	 $_SESSION['username'];
}//starting the session
 
 include('connect.php');
 $username = $_SESSION['username'] ;
 $query=mysql_query("SELECT * FROM users WHERE username='$username'");
 $count=mysql_num_rows($query);
 while($dis=mysql_fetch_array($query)){
 $username = $dis["username"];
 } 
?>