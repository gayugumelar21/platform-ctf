<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{

include_once "inc/connect.php";



?>

<html>

    <head>

      <link href="css/bootstrap.min.css" rel="stylesheet" />



      <!-- Font Icons -->

      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

      <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

      <link href="css/material-design-iconic-font.min.css" rel="stylesheet">



      <!-- Plugins css -->

      <link href="assets/modal-effect/css/component.css" rel="stylesheet">



      <!-- animate css -->

      <link href="css/animate.css" rel="stylesheet" />



      <!-- Plugins css -->

      <link href="assets/notifications/notification.css" rel="stylesheet" />



      <!-- DataTables -->

      <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />



      <!-- Waves-effect -->

      <link href="css/waves-effect.css" rel="stylesheet">



      <!-- sweet alerts -->

      <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">



      <!-- Custom Files -->

      <link href="css/helper.css" rel="stylesheet" type="text/css" />

      <link href="css/style.css" rel="stylesheet" type="text/css" />



      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

      <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

      <![endif]-->



      <script src="js/modernizr.min.js"></script>

    </head>

<body onLoad="window.print();">

    <div class="row">

        <div class="col-md-6v2">

          <div class="panel panel-border panel-danger">

            <div class="panel-heading">

              <h3 class="panel-title"></h3>

            </div>

              

            <div class="panel-body">

              <p align="center">

                  <?php 

                  $totaluser = mysqli_query($con, "SELECT COUNT(id_player) as totaluser from player");

                  $totalplayer = mysqli_query($con, "SELECT COUNT(id_player) as totalplayer FROM player WHERE status = 1 OR status = 0");

                  $totaladmin = mysqli_query($con, "SELECT COUNT(id_player) as totaladmin FROM player WHERE status = 2");

                  

                  ?>

                Jumlah terdaftar sebanyak <b>

                <?php $totus = mysqli_fetch_array($totaluser); echo $totus['totaluser'];?></b>

                akun, dengan Player sebanyak <b>

                <?php $totpla = mysqli_fetch_array($totalplayer); echo $totpla['totalplayer'];?></b>

                orang dan Admin sebanyak <b>

                <?php $totad=mysqli_fetch_array($totaladmin); echo $totad['totaladmin'];?></b> 

                orang.

              </p><hr/>

              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <table class="table table-striped">

                    <thead>

                      <tr>

                        <th>Rank</th>

                        <th>Name</th>

                        <th>Team</th>

                        <th>Point</th>

                        <th>Status</th>

                      </tr>

                    </thead>

                    <tbody>

                      <?php

                      $check = mysqli_query($con, "SELECT * from player order by poin desc, waktu asc");

                      $m=1;

                      while ($score = mysqli_fetch_array($check)) {

                        $dt = explode(" ", $score['waktu']);

                        $dt2 = explode("-", $dt['0']);

                        $tm = explode(":", $dt['1']);

                        $tm2 = $tm['0'].":".$tm['1'];



                        $mon = bln($dt2['1']);

                        $time = $dt2['2']." ".$mon." - ".$tm2;



                        if ($score['status'] == 1) {

                          $status = "Active";

                          $label = "label-success";

                        }

                        else if($score['status'] == 2) {

                          $status = "Moderator";

                          $label = "label-primary";

                        }

                        else {

                          $status = "Deactive";

                          $label = "label-danger";

                        }

                        

                        ?>

                        <tr>

                          <td><?php echo $m; ?></td>

                          <td><?php echo $score['nama_lengkap']; ?></td>

                          <td><?php echo $score['team']; ?></td>

                          <td><span class="badge badge-purple"> <?php echo $score['poin']; ?> </span></td>

                          <td>

                              <span class="label <?php echo $label; ?>"><?php echo $status; ?></span>

                          </td>

                        </tr>

                        <?php

                        $m++;

                      }

                      ?>

                    </tbody>

                  </table>

                </div>

              </div>

            </div>

          </div>

        </div>



      </div> <!-- End Row -->



<script>

  var resizefunc = [];

</script>



<!-- jQuery  -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/waves.js"></script>

<script src="js/wow.min.js"></script>

<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="js/jquery.scrollTo.min.js"></script>

<script src="assets/jquery-detectmobile/detect.js"></script>

<script src="assets/fastclick/fastclick.js"></script>

<script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>

<script src="assets/jquery-blockui/jquery.blockUI.js"></script>





<!-- CUSTOM JS -->

<script src="js/jquery.app.js"></script>



<script src="assets/datatables/jquery.dataTables.min.js"></script>

<script src="assets/datatables/dataTables.bootstrap.js"></script>





<script type="text/javascript">

  $(document).ready(function() {

    $('#datatable').dataTable();

  } );

</script>

<?php

}else{

  session_destroy();

  header('Location:../login.php');

}

?>

</body>    

</html>

