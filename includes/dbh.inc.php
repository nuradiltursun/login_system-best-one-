<?php

$servername="localhost";
$admin="root";
$password="";
$dbname="students";

$conn=mysqli_connect($servername,$admin,$password,$dbname);

if(!$conn){
    die("connect faild".mysqli_connect_error());
    // echo "connect";
}

