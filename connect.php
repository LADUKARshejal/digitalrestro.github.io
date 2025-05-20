<?php

$con=new mysqli('localhost','root','shejal@123','Restaurant');

if(!$con){
    
    die(mysqli_error($con));
}

?>