<?php
$host="localhost";
$username="root";
$password="";
$databasename="user_login";

$connect=new mysqli($host,$username,$password,$databasename);

if($connect->connect_errno){
echo "Connection Error $connect->connect_error";
}