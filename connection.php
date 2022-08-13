<?php
//connent data base
$servername = "localhost";
$username="root";
$password ="";
$dbname="hms";
//create connection
$conn =mysqli_connect($servername, $username, $password,$dbname);
if ($conn -> connect_error){
die("connection failed:".$conn->connect_error);
}else{
    //echo "Welcome!" ;
 }
?>