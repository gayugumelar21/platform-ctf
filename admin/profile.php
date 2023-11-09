<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))
{

include_once "../header.php";
include_once "part/menu.php";
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
    <?php include_once "part/profile/widget.php" ?>
    <div class="row">
    <?php include_once "part/profile/solved.php" ?>
    </div><!-- End Row -->
    <div id="hasil"></div>
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
<script src="assets/chat/moment-2.2.1.js"></script>
<script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/jquery-detectmobile/detect.js"></script>
<script src="assets/fastclick/fastclick.js"></script>
<script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets/jquery-blockui/jquery.blockUI.js"></script>
<!-- <script src="assets/sweet-alert/sweet-recon.init.js"></script> -->

<!-- sweet alerts -->
<script src="assets/sweet-alert/sweet-alert.min.js"></script>
<script src="assets/sweet-alert/sweet-alert.init.js"></script>

<!-- Counter-up -->
<script src="assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="js/jquery.app.js"></script>

<!-- Dashboard -->
<script src="js/jquery.dashboard.js"></script>

<!-- skycons -->
<script src="js/skycons.min.js" type="text/javascript"></script>

<script src="assets/notifications/notify.min.js"></script>
<script src="assets/notifications/notify-metro.js"></script>
<script src="assets/notifications/notifications.js"></script>


<script type="text/javascript">
  /* ==============================================
  Counter Up
  =============================================== */
  jQuery(document).ready(function($) {
    $('.counter').counterUp({
      delay: 100,
      time: 1200
    });
  });

    $('#submit').on('click', function (){
      $.post('part/profile/reset.php', $("form").serialize(), function(hasil) {
          $("#hasil").html(hasil).show();
      });
    });
</script>
<?php
}else{
  session_destroy();
  header('Location:../login.php');
}