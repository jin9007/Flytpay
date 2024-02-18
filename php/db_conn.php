<?php
$sname= "172.30.1.37";
$uname= "flytpayadmin";
$password="flytpaypw";

$db_name = "flytpaydb";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo("Connection failed!");

}
?>