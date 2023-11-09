<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

    include "inc/connect.php";



    $username  = filter($_POST['username']);

    $email     = filter($_POST['email']);

    $fullname  = filter($_POST['fullname']);

    $team      = filter($_POST['team']);

    $status    = filter($_POST['status']);



    mysqli_query($con, "update player set 

        username = '".$username."', 

        email = '".$email."',

        nama_lengkap = '".$fullname."',

        team = '".$team."',

        status = '".$status."'

        where id_player='" . $_GET['id_edit'] . "'") or die ("Gagal Insert, ".mysqli_error($con));

    echo "<meta http-equiv='refresh' content='0;url=scoreboard.php'>";

}else{

  session_destroy();

  header('Location:../login.php');

}

?>