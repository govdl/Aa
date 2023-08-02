<?php
$host = "localhost";
$user = "root";
$password = "guss1301";
$db = "user";

$conn = new mysqli($host, $user, $password, $db);

if($conn->connect_errno){
    die('Connection Error : '.$conn->connect_error);
}
?>