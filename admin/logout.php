<?php
session_start();

if(isset($_SESSION['user']))
{
	session_destroy();
	header('Location:../login.php?status=logut-success');
}else{
	session_destroy();
	header('Location:../login.php?status=please-login');
}
?>