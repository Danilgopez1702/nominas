<?php
$con = new mysqli('localhost', 'root', '', 'carlos');

if (!$con){
	die('Could not connect: ' . mysql_error());
}
?>