<?php
//     $servername = "localhost";
//     $username = "Mark_42";
//     $password = "enigma";
//     $databasename="Course_Reg";

    $servername = "remotemysql.com";
    $username = "51MdWQ8QKb";
    $password = "aGfBw7kyse";
    $databasename="51MdWQ8QKb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$databasename);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

?>
