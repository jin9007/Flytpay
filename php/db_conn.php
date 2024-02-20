<?php
$sname= "localhost";
$uname= "root";
$password="pwroot";

$db_name = "flytpaydb";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo("Connection failed!");

}
?>
