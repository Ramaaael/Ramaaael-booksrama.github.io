<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "tbl_pengguna";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
    echo "ERORR DATABASE";
    die("error!");
}

?>