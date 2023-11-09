<?php
include "inc/connect.php";

//Terima input
$user	= filter($_POST['username']);
$team 	= filter($_POST['team']);
$name 	= filter($_POST['name']);
$email 	= filter($_POST['email']);
$pass 	= filter(md5($_POST['password']));
$repeat	= filter(md5($_POST['repeat']));
$time   = date('Y-m-d H:i:s', time());

$status = "0";
$solved = "0";
$poin	= "0";

$cekuser = mysqli_query($con, "SELECT * from player where username='$user' ");

if (mysqli_num_rows($cekuser) > 0) {
	die("<div class='alert alert-danger alert-dismissable'>
    	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
    	Sorry, username allready exist.
		</div>");
} else if ($pass != $repeat) {
	die("<div class='alert alert-warning alert-dismissable'>
    	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
    	Sorry, passwords do not match.
		</div>");
} else {
	mysqli_query($con, "INSERT into player VALUES('0','".$user."','".$team."','".$name."','".$email."','".$pass."','".$status."','".$solved."','".$poin."','".$time."','',' ') ") or die ("Gagal Update, ".mysqli_error($con));
	echo ("<div class='alert alert-success alert-dismissable'>
    	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
    	Registration success, please <a href='login.php'>login</a>
		</div>");
	echo "<META http-equiv='refresh' content='0;URL=login.php?silakan-login'>";
}

?>
