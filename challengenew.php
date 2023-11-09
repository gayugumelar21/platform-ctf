<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))
{

include_once "inc/connect.php";
include_once "header.php";
include_once "part/menu.php";
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="wraper container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <h4 class="pull-left page-title">10 Soal Terbaru !</h4>
        </div>
      </div>

      <div class="row"> 
        <div class="col-lg-8"> 
          <div class="panel-group panel-group-joined" id="accordion-test"> 
            <?php
              $select =  mysqli_query($con, "SELECT * from player where id_player='$_SESSION[id]' ");
              $dtuser = mysqli_fetch_array($select);
              $explode = explode(",", $dtuser['solved']);
              $count = sizeof($explode);
            ?>
			<div class="panel panel-border panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Latest Challenges</h3>
			</div>
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where  display='1' order by id_soal desc limit 10 ");
                      $check = mysqli_num_rows($chall);
                      if ($check < 1) {
                        echo
                        "<div style='margin:20px;'><h5>Maaf belum ada soal yang dapat ditampilkan.</h5></div>";
                      } else {
                      $m = 1;
                      while ($mission = mysqli_fetch_array($chall)) {
                            $solve_check = "";
                        for ($i=1; $i< $count; $i++) { 
                          if ($explode[$i] == $mission['id_soal']) {
                            $solve_check = "active";
                            break;
                          }
                        }
                      //label level
                      switch ($mission['level']) {
                        case 'Easy':
                          $label_level = "label-success";
                          break;
                        case 'Medium':
                          $label_level = "label-primary";
                          break;
                        case 'Hard':
                          $label_level = "label-danger";
                          break;
                        default :
                          $label_level = "label-inverse";
                          break;
					}	  
					switch ($mission['kategori']) {
						case 'Forensic':
						  $category = "label-success";
						  break;
						case 'Crypto':
						  $category = "label-primary";
						  break;
						case 'Web':
						  $category = "label-purple";
						  break;
						case 'Reverse':
						  $category = "label-danger";
						  break; 
						case 'Recon':
						  $category = "label-warning";
						  break;
						case 'Trivia':
						  $category = "label-pink";
						  break;
						case 'Misc':
						  $category = "label-default";
						  break;					  
						default:
						  $category = "label-inverse";
						  break;
					}
                    ?>
                      <a href="#" id="<?php echo $mission['id_soal'];?>" class="mission list-group-item <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                          <?php echo $mission['nama_soal']." (".$mission['poin'].")"; ?> <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>"><?php echo $mission['level']; ?></span><b> | </b><span class="label <?php echo $category; ?>"><?php echo $mission['kategori']; ?></span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div>
			</div> 
          <!--modal -->
          <div id="tabs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="data"></div>
          </div><!-- /.modal -->

        </div> 
      </div> <!-- end row -->

    </div> <!-- container -->

  </div> <!-- content -->
  <footer class="footer text-right">
    2017 © Tenesys.
  </footer>

</div>

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


<!-- CUSTOM JS -->
<script src="js/jquery.app.js"></script>

<!-- Dashboard -->
<script src="js/jquery.dashboard.js"></script>

<!-- Modal-Effect -->
<script src="assets/modal-effect/js/classie.js"></script>
<script src="assets/modal-effect/js/modalEffects.js"></script>

<script src="assets/notifications/notify.min.js"></script>
<script src="assets/notifications/notify-metro.js"></script>
<script src="assets/notifications/notifications.js"></script>


<script type="text/javascript">
/* ==============================================
Counter Up
=============================================== */

    $('.mission').on('click', function (){

      var url = "part/challenge/detail.php";
      id_soal = this.id;

      $.post(url, {id: id_soal} ,function(data) {
          $(".data").html(data).show();
      });
    });

  
</script>

<?php
}else{
  session_destroy();
  header('Location:login.php');
}