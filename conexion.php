<?php
$mysqli=new mysqli('localhost','root','','Planilla');
if($mysqli->connect_error){
	die('Error'.$mysqli->connect_error);
}
?>