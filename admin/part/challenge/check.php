<?php

session_start();

include "../../inc/connect.php";

date_default_timezone_set('Asia/Jakarta');



$hitung = "";

if (!empty($_POST['flag']) && !empty($_POST['id'])) {

$jawaban = filter($_POST['flag']);

$idsoal = filter($_POST['id']);

$iduser = filter($_SESSION['id']);



$query = mysqli_query($con, "SELECT * FROM mission WHERE id_soal='$idsoal' and flag='$jawaban' ");

$hitung = mysqli_num_rows($query);

}

if ($hitung > 0) {



	$datasoal = mysqli_fetch_array($query);

	$kueri = mysqli_query($con, "SELECT * FROM player where id_player='$iduser' ");

	$datauser = mysqli_fetch_array($kueri);

	$idsolve = $datauser['solved'].",".$datasoal['id_soal'];

	$pointotal = $datauser['poin']+$datasoal['poin'];

	$pisah = explode(",",$datauser['solved']);

	$ukuran = sizeof($pisah);

	for ($i=1; $i<$ukuran; $i++) {

		if ($pisah[$i] == $datasoal['id_soal']) {

			die("<script>$.Notification.autoHideNotify('info', 'top right', 'Hmm...','Already solved!');</script>");

		}}

		$waktu = date(" d M - H:i");

		if ($datasoal['display'] == 0) {

			echo"<script>$.Notification.autoHideNotify('error', 'top right', 'Sorry...','Time is up!');</script>";

		} else {

			mysqli_query($con, "UPDATE player set solved='$idsolve' , poin='$pointotal' , waktu=now() where id_player='$iduser' ") or die ("Update gagal, ".mysqli_error($con));

			mysqli_query($con, "INSERT into lastsolved VALUES('0','".$datauser['username']."','".$datasoal['id_soal']."','".$datasoal['nama_soal']."','".$datasoal['kategori']."','".$datasoal['level']."','".$waktu."')") or die ("Update gagal, ".mysqli_error($con));

			echo "<script>$.Notification.autoHideNotify('success', 'top right', 'Yeah...','You got it, flag correct!');window.setTimeout(function(){location.reload()},2000)</script>";

		}

		

} else {

	echo "<script>$.Notification.autoHideNotify('error', 'top right', 'Opps...','Try harder!');</script>";

}

?>

