<?php 
session_start();
$connection = new mysqli('localhost','root','','registration');
$id=$_POST['action'];
$idcheck=$_POST['idcheck'];;	
mysqli_query($connection, "UPDATE `notes` SET `completed`='0' WHERE id='$id'");
var_dump($id);
echo "<script type='text/javascript'>alert('$id');</script>";
?>