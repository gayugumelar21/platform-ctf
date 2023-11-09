<?php
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))
{

include_once "inc/connect.php";
?> 
<!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="pull-left page-title">Selamat Datang <?php echo $_SESSION['name']; ?> !</h4>
        </div>
      </div>

      <!-- Start Widget -->
      <?php
        $cek = mysqli_query($con, "SELECT count(*) as total from mission where display=1");
        $jml = mysqli_fetch_assoc($cek);

        $cek = mysqli_query($con, "SELECT count(*) as total from player");
        $ttl = mysqli_fetch_assoc($cek);

      ?>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-info"><i class="ion-flag"></i></span>
            <div class="mini-stat-info text-right text-muted">
              <span class="counter"><?php echo $jml['total']; ?></span> Challenges Release
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-purple"><i class="ion-android-contacts"></i></span>
            <div class="mini-stat-info text-right text-muted">
              <span class="counter"><?php echo $ttl['total']; ?></span> Participant
            </div>
          </div>
        </div>

        <div align="center" class="col-md-6 col-sm-6 col-lg-3">
          <div style="margin-top: 27px;">
            <img src="images/teknokrat.png" width="250px" height="48px">
          </div>
        </div>

        <div align="center" class="col-md-6 col-sm-6 col-lg-3">
          <div>
            <img src="images/protek.png" width="180" height="87">
          </div>
        </div>
      </div> 
      <!-- End row-->
<?php
}else{
  session_destroy();
  header('Location:../../login.php');
}
?>
