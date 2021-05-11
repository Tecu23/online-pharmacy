<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "AndreI99@";
$dbName = "database_temabd";


$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);



if(!$conn){
  die("Connection failed:" . mysqli_connect_error());  
}

    