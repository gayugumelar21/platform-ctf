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
        <h4 class="pull-left page-title">Information !</h4>
      </div>
    </div>
        
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default panel-fill">

          <div class="panel-body"> 
                
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
                        <th>No</th>
                        <th>Date</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $check = mysqli_query($con, "SELECT * from information order by id_information desc, date asc");
                      $m=1;
                      while ($score = mysqli_fetch_array($check)) {
                        $dt = explode(" ", $score['date']);
                        $dt2 = explode("-", $dt['0']);
                        $tm = explode(":", $dt['1']);
                        $tm2 = $tm['0'].":".$tm['1'];

                        $mon = bln($dt2['1']);
                        $time = $dt2['2']." ".$mon." - ".$tm2;

                        
                        ?>
                        <tr>
                          <td><?php echo $m; ?></td>
                          <td><?php echo $score['date']; ?></td>
                          <td><?php echo $score['description']; ?></td>
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
                
            </div>
          </div> 
        </div>
        </div>
      </div> <!-- End Row -->
    </div> <!-- container -->
  </div> <!-- content -->

  <footer class="footer text-right">
    2016 © Tenesys.
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
<?php
}else{
  session_destroy();
  header('Location:login.php');
}
?>