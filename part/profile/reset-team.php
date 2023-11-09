<?php

session_start();

include "../../inc/connect.php";



$iduser = filter($_SESSION['id']);



if (!empty($_POST['team-reset'])) {

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

session_destroy();

}

else {

echo "<script>

	swal({

      title: 'Error!',

      text: 'Team name didn't changes,

      type: 'error'

    });

</script>";

}

?>