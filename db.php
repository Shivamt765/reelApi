<?php
$servername="localhost";
$username="root";
$password="";
$db="reel_api";
$mysqli=new mysqli($servername,$username,$password,$db);
if(!$mysqli){
    echo "Connection Unsucessful".mysqli_connect_error();
}
?>