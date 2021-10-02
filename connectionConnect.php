<?php
$servername = "localhost";
$username = "db21_025";
$password = "db21_025";
$dbname = "db21_025";

$conn = new mysqli($servername,$username,$password);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

if(!$conn->select_db($dbname)){
    die("Connection failed: ".$conn->connect_error);
}

?>