<?php

session_start();

include "../../inc/connect.php";



$iduser = filter($_SESSION['id']);



if (!empty($_POST['password-reset'])) {

$pass = md5(filter($_POST['password-reset']));



mysqli_query($con, "UPDATE player set password='$pass' where id_player='$iduser' ");

echo "<script>

	swal({

      title: 'Password changes!',

      type: 'success'

    },function(){

      window.setTimeout(function(){location.reload()});

    });

</script>";



}

else if (!empty($_POST['team-reset'])) {

$team = filter($_POST['team-reset']);



mysqli_query($con, "UPDATE player set team='$team' where id_player='$iduser' ");

echo "<script>

	swal({

      title: 'Team changes!',

      type: 'success'

    },function(){

      window.setTimeout(function(){location.reload()});

    });

</script>";



}

else {

echo "<script>

	swal({

      title: 'Error!',

      text: 'Password didn't changes,

      type: 'error'

    });

</script>";

}

?>