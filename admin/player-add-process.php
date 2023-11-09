<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

    include "inc/connect.php";



    $username       = filter($_POST['username']);

    $email          = filter($_POST['email']);

    $fullname   	= filter($_POST['fullname']);

    $team       	= filter($_POST['team']);

    $password   	= filter(md5($_POST['password']));

    $repeat_pass    = filter(md5($_POST['repeat']));

    $status        	= filter($_POST['status']);



    $cekuser = mysqli_query($con, "SELECT * from player where username='$username' ");



    if (mysqli_num_rows($cekuser) > 0) {

        die("<div class='alert alert-danger alert-dismissable'>

            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>

            Sorry, username allready exist.

            </div>");

    } else if ($password != $repeat_pass) {

        die("<div class='alert alert-warning alert-dismissable'>

            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>

            Sorry, passwords do not match.

            </div>");

    } else {                         

    mysqli_query($con, "INSERT into player (username, email, nama_lengkap, team, password, status) VALUES('".$username."','".$email."','".$fullname."','".$team."','".$password."','".$status."') ") or die ("Gagal Insert, ".mysqli_error($con));

    echo "<meta http-equiv='refresh' content=0;url=scoreboard.php>";

    }

}else{

  session_destroy();

  header('Location:../login.php');

}

?>