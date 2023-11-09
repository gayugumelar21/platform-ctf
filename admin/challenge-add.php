<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))
{

include_once "inc/connect.php";
include_once "../header.php";
include_once "part/menu.php";
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->         

<div class="content-page">
  <!-- Start content -->
  <div class="content2">
    <div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
      <div class="panel-body">
        <div class="col-sm-12"><center>
            <h4 class="page-title">Add Challenges !</h4></center>
        </div>
        <form class="form-horizontal m-t-12" method="POST" action="challenge-add-process.php">
          <div id="data"></div>
          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="text" name="nama_soal" required="" placeholder="Nama Soal">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <textarea class="form-control" rows="3" type="text" name="deskripsi" required="" placeholder="Deskripsi Soal"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
                <textarea class="form-control" rows="2" type="text" name="hint" required="" placeholder="Hint"></textarea>
            </div>
          </div>

         <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="text" name="flag" required="" placeholder="Flag">
            </div>
          </div>
            
            <div class="form-group">
                <div class="col-xs-12">
                      <select name="kategori" class="combobox input-lg form-control">
			  <option>-- Kategori --</option>
			 <option value="Misc">Miscellaneous</option>

                          <option value="Forensic">Digital Forensic</option>
                          <option value="Crypto">Cryptography</option>
                          <option value="Web">Web Exploitation</option>
                          <option value="Reverse">Reverse Engineering</option>
                          <option value="Pwn">Pwn</option>
                          <option value="Recon">Reconaissance</option>
                      </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                      <select name="level" class="combobox input-lg form-control">
                          <option>-- Level --</option>
                          <option value="Easy">Easy</option>
                          <option value="Medium">Medium</option>
                          <option value="Hard">Hard</option>
                      </select>
                </div>
            </div>
            
          <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="text" name="poin" required="" placeholder="Poin">
            </div>
          </div>
        
          <div class="form-group text-center m-t-12">
            <div class="col-xs-12">
              <a href="challenge.php"><button class="btn btn-primary btn-lg w-lg " type="text">Back</button></a>
              <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Post</button>
            </div>
          </div>
        </form> 
      </div>                                 
    </div>
  </div>

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
  header('Location:../login.php');
}
