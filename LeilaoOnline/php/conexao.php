<?php 

$con=new mysqli('localhost','root','','leilao');
$con->set_charset("utf8");
if(!$con){
    die(mysqli_error($con));
}

?>