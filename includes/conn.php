<?php
    $servername = "localhost";
    $username = "Mark_42";
    $password = "enigma";
    $databasename="Course_Reg";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$databasename);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully <br>";

?>