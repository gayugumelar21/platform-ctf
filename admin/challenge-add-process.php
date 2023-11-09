<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

    include "inc/connect.php";



    $nama_soal  = filter($_POST['nama_soal']);

    $deskripsi  = filter($_POST['deskripsi']);

    $hint   	= filter($_POST['hint']);

    $flag    	= filter($_POST['flag']);

    $kategori  	= filter($_POST['kategori']);

    $level    	= filter($_POST['level']);

    $poin    	= filter($_POST['poin']);

    $display    = "1";



    mysqli_query($con, "INSERT into mission (nama_soal, deskripsi, hint, flag, kategori, level, poin, display) VALUES('".$nama_soal."','".$deskripsi."','".$hint."','".$flag."','".$kategori."','".$level."','".$poin."','".$display."') ") or die ("Gagal Insert, ".mysqli_error($con));

    echo "<meta http-equiv='refresh' content=0;url=challenge.php>";

    }else{

      session_destroy();

      header('Location:../login.php');

}

?>