<?php
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))
{

include_once "inc/connect.php";
?> 
<!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="pull-left page-title">Hai <?php echo $_SESSION['name']; ?> !</h4>
        </div>
      </div>

      <!-- Start Widget -->
      <?php
        $cek = mysqli_query($con, "SELECT * from player where id_player='$_SESSION[id]' ");
        $pn = mysqli_fetch_array($cek);

        $cek2 = mysqli_query($con, "SELECT count(*) as total from lastsolved where username='$_SESSION[user]' ");
        $ttl = mysqli_fetch_assoc($cek2);

        $cek3 = mysqli_query($con, "SELECT team from player where id_player='$_SESSION[id]' ");
        $tim = mysqli_fetch_array($cek3);

        $cek4 = mysqli_query($con, "SELECT status from player where id_player='$_SESSION[id]' ");
        $stat = mysqli_fetch_array($cek4);

        $status = "";
        if ($stat['status'] == 0){
            $status = "Deactive";
        }else if ($stat['status'] == 1){
            $status = 'Active';
        }else{
            $status = 'Moderator';
        }
      ?>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-danger"><i class="ion-ios7-lightbulb"></i></span>
            <div class="mini-stat-info text-right text-muted">
              <span class="counter"><?php echo $pn['poin']; ?></span> Point
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="md md-flag"></i></span>
            <div class="mini-stat-info text-right text-muted">
              <span class="counter"><?php echo $ttl['total']; ?></span> Challenge solved
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="md md-flag"></i></span>
            <div class="mini-stat-info text-right text-muted">
              <span><?php echo $tim['team'];?></span> Team
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="md md-flag"></i></span>
            <div class="mini-stat-info text-right text-muted">
              <span><?php echo $status; ?></span> Status
            </div>
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
