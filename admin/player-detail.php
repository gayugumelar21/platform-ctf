<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

    include "inc/connect.php";



    $id = $_GET['id'];

    $q = mysqli_query($con, "select * from player where id_player = '" . $id . "'");

    $data = mysqli_fetch_array($q);

    echo json_encode($data);

}else{

  session_destroy();

  header('Location:../login.php');

}

?>