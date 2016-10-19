<?php
	$host="localhost";
	$dbname="uin";
	$dbuser="root";
	$dbpass="";

		//connect to the server
		$conn=mysql_connect($host,$dbuser,$dbpass);
		if(!$conn)
			{
				die("connection to server has not been established");
			}
				//connect to the database
				if(!mysql_select_db($dbname))
				{
					die("<p>database not found...</p>");
				}
?>