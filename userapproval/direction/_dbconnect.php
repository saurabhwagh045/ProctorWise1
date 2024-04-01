<?php
$server = "localhost";
$username = "root";
$password = "Saurabh@890";
$database ="system_db";

$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
//    echo "Success";
//}
//else{
    die("Error".mysqli_connect_error());
}

?>