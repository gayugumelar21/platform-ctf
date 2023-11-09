<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

    include "inc/connect.php";



    $nama_soal  = filter($_POST['nama_soal']);

    $deskripsi  = $_POST['deskripsi'];

    $hint       = $_POST['hint'];

    $flag       = filter($_POST['flag']);

    $kategori   = filter($_POST['kategori']);

    $level      = filter($_POST['level']);

    $poin       = filter($_POST['poin']);



    mysqli_query($con, "update mission set 

        nama_soal = '".$nama_soal."', 

        deskripsi = '".$deskripsi."',

        hint = '".$hint."',

        flag = '".$flag."',

        kategori = '".$kategori."',

        level = '".$level."',

        poin = '".$poin."' 

        where id_soal='" . $_GET['id_edit'] . "'") or die ("Gagal Insert, ".mysqli_error($con));

    echo "<meta http-equiv='refresh' content='0;url=challenge.php'>";

}else{

  session_destroy();

  header('Location:../login.php');

}

?>