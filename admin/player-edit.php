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

            <h4 class="page-title">Edit Player !</h4></center>

        </div>

        <form class="form-horizontal m-t-20" method="POST" action="player-edit-process.php?id_edit=<?=$_GET['id_edit'];?>">

          <div id="data"></div>

            

            <?php

                  $ambildata = mysqli_query($con, "select * from player where id_player='" . $_GET['id_edit'] . "'");

                  $data = mysqli_fetch_array($ambildata);

    

                    if ($data['status'] == 0){

                        $namastatus = "Deactive";

                    }

                    else if ($data['status'] == 1){

                        $namastatus = "Active";

                    }

                    else {

                        $namastatus = "Moderator";

                    }

            ?>

            

          <div class="form-group ">

            <div class="col-xs-12">

              <input class="form-control input-lg " type="text" name="username" required="" placeholder="Username" value="<?=$data['username'];?>">

            </div>

          </div>



          <div class="form-group ">

            <div class="col-xs-12">

              <input class="form-control input-lg " type="email" name="email" required="" placeholder="Email" value="<?=$data['email'];?>">

            </div>

          </div>



          <div class="form-group ">

            <div class="col-xs-12">

              <input class="form-control input-lg " type="text" name="fullname" required="" placeholder="Full Name" value="<?=$data['nama_lengkap'];?>">

            </div>

          </div>



          <div class="form-group ">

            <div class="col-xs-12">

              <input class="form-control input-lg " type="text" name="team" required="" placeholder="Team" value="<?=$data['team'];?>">

            </div>

          </div>

        <center>

          <div class="form-group">

                <div class="col-xs-12">

                      <select name="status" class="combobox input-lg form-control">

                          <option value="<?=$data['status'];?>">-- <?=$namastatus;?> --</option>

                          <option value="1">Active</option>

                          <option value="0">Deactive</option>

                          <option value="2">Admin</option>

                      </select>

                </div>

            </div>

        </center>

            

          <div class="form-group text-center m-t-40">

            <div class="col-xs-12">

              <a href="scoreboard.php"><button class="btn btn-primary btn-lg w-lg " type="text">Back</button></a>

              <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Edit</button>

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