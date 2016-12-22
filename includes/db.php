<?php
//Database Connection
$connection = mysqli_connect('localhost','root','root','php_cms');

if($connection){
	echo "we are connected";
}
?>