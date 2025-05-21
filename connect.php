<?php

$con=new mysqli('localhost','root','shejal@123','restaurant');

if(!$con){
    
    die(mysqli_error($con));
}

?>