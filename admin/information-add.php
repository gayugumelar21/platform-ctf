<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

    include "inc/connect.php";



    $keterangan = filter($_POST['informasi']);

    $waktu      = date('Y-m-d H:i:s', time());



    mysqli_query($con, "INSERT into information VALUES('0','".$waktu."','".$keterangan."') ") or die ("Gagal Insert, ".mysqli_error($con));

    echo "<meta http-equiv='refresh' content='0;url=information.php'>";

}else{

  session_destroy();

  header('Location:../login.php');

}

?>
