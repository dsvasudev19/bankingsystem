<?php
    $servername="localhost";
    $username="root";
    $password="";
    $databasename="dsv_bank";

    $conn = new mysqli($servername,$username,$password,$databasename);
    if($conn->connect_error){

        die("connection failed " . $conn->connect_error);
    }

?>