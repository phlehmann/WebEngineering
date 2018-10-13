<!-- 
Author: Philipp Lehmann
-->
<?php
    $dbHost = "127.0.0.1";		//Location Of Database
    $dbUser = "root";			//Database User Name 
    $dbPass = "";				//Database Password 
    $dbDatabase = "webengdb";		//Database Name

    // Create connection
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>