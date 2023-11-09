<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))
{

include_once "header.php";
include_once "part/menu.php";

?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">

    <div class="row">
      <div class="col-sm-12">
        <h4 class="pull-left page-title">Scoreboard !</h4>
      </div>
    </div>
        
      <div class="row">
        <div class="col-md-6v2">
          <div class="panel panel-border panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
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
                          $label = "label-purple";
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
                          <td><span class="badge badge-danger"> <?php echo $score['poin']; ?> </span></td>
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


    </div> <!-- container -->

  </div> <!-- content -->

  <footer class="footer text-right">
    2017 © Tenesys.
  </footer>

</div>
<!-- END wrapper -->

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
  header('Location:login.php');
}
?>