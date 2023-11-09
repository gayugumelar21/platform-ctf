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
          <h4 class="pull-left page-title">Challenges !</h4>
        </div>
      </div>
                
      <div class="row"> 
        <div class="col-lg-12"> 
          <div class="panel-group panel-group-joined" id="accordion-test"> 
            <?php
              $select =  mysqli_query($con, "SELECT * from player where id_player='$_SESSION[id]' ");
              $dtuser = mysqli_fetch_array($select);
              $explode = explode(",", $dtuser['solved']);
              $count = sizeof($explode);
            ?>
            <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#misc" class="collapsed">
                    <i class="md-gps-fixed"></i>  Miscellaneous
                  </a> 
                </h4> 
              </div> 
              <div id="misc" class="panel-collapse collapse"> 
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Misc' && display='1' order by poin asc ");
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
                    ?>
                        <a href="#" id="
                        <?php echo $mission['id_soal'];?>" class="mission list-group-item 
                        <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                        <?php echo $mission['nama_soal']." (".$mission['poin'].")";
                        ?> 
                          <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>">
                              <?php echo $mission['level']; ?>
                          </span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div> 
            </div>
              
            <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#forensic" class="collapsed">
                    <i class="md-gps-fixed"></i>  Digital Forensic
                  </a> 
                </h4> 
              </div> 
              <div id="forensic" class="panel-collapse collapse"> 
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Forensic' && display='1' order by poin asc ");
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
                    ?>
                        <a href="#" id="
                        <?php echo $mission['id_soal'];?>" class="mission list-group-item 
                        <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                        <?php echo $mission['nama_soal']." (".$mission['poin'].")";
                        ?> 
                          <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>">
                              <?php echo $mission['level']; ?>
                          </span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div> 
            </div> 
            <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#crypto" class="collapsed">
                    <i class="md-vpn-key"></i>  Cryptography
                  </a> 
                </h4> 
              </div> 
              <div id="crypto" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Crypto' && display='1' order by poin asc ");
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
                    ?>
                      <a href="#" id="<?php echo $mission['id_soal'];?>" class="mission list-group-item <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                          <?php echo $mission['nama_soal']." (".$mission['poin'].")"; ?> <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>"><?php echo $mission['level']; ?></span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div>
            </div> 
            <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#web" class="collapsed">
                    <i class="md-public"></i>  Web Exploitation
                  </a> 
                </h4> 
              </div> 
              <div id="web" class="panel-collapse collapse"> 
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Web' && display='1' order by poin asc ");
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
                    ?>
                      <a href="#" id="<?php echo $mission['id_soal'];?>" class="mission list-group-item <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                          <?php echo $mission['nama_soal']." (".$mission['poin'].")"; ?> <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>"><?php echo $mission['level']; ?></span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div> 
            </div> 
            <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#reverse" class="collapsed">
                    <i class="md-security"></i>  Reverse Engineering
                  </a> 
                </h4> 
              </div> 
              <div id="reverse" class="panel-collapse collapse"> 
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Reverse' && display='1' order by poin asc ");
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
                    ?>
                      <a href="#" id="<?php echo $mission['id_soal'];?>" class="mission list-group-item <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                          <?php echo $mission['nama_soal']." (".$mission['poin'].")"; ?> <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>"><?php echo $mission['level']; ?></span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div> 
            </div> 
             <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#pwn" class="collapsed">
                    <i class="md-security"></i>  Pwn
                  </a> 
                </h4> 
              </div> 
              <div id="pwn" class="panel-collapse collapse"> 
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Pwn' && display='1' order by poin asc ");
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
                    ?>
                      <a href="#" id="<?php echo $mission['id_soal'];?>" class="mission list-group-item <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                          <?php echo $mission['nama_soal']." (".$mission['poin'].")"; ?> <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>"><?php echo $mission['level']; ?></span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div> 
            </div> 
            <div class="panel panel-default panel-fill"> 
              <div class="panel-heading"> 
                <h4 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordion-test" href="#recon" class="collapsed">
                    <i class="md-track-changes"></i>  Reconaissance
                  </a> 
                </h4> 
              </div> 
              <div id="recon" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="list-group" style="margin: -20px;">
                    <?php
                      $chall = mysqli_query($con, "SELECT * from mission where kategori='Recon' && display='1' order by poin asc ");
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
                    ?>
                      <a href="#" id="<?php echo $mission['id_soal'];?>" class="mission list-group-item <?php echo $solve_check; ?>" data-toggle="modal" data-target="#tabs-modal">
                          <?php echo $mission['nama_soal']." (".$mission['poin'].")"; ?> <span style="margin-left: 7px;" class="label <?php echo $label_level; ?>"><?php echo $mission['level']; ?></span>
                      </a>
                    <?php
                      $m++;
                    }}
                    ?>
                  </div>
                </div> 
              </div>
            </div> 
		  </div>
          <!-- modal -->
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
