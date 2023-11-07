<?php


/*
PHP CRUD TUTORIAL:

steps:
1.create database and connect with front end
2.Insert data
3.Displayed data
4.Edit/Update
5.delete
*/


$host = "localhost";
$user = "root";
$password = "";
$db = "crud";

$conn=mysqli_connect($host,$user,$password,$db);

if($conn){
    echo "";
}
else{
    echo "connection was failed";
}

?>