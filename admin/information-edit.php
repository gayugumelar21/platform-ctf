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



    <div class="row">

      <div class="col-sm-12">

        <h4 class="pull-left page-title">Edit Information !</h4>

      </div>

    </div>

        

    <div class="row">

      <div class="col-md-12">

        <div class="panel panel-default panel-fill">

        

          <div class="panel-body">

              <form method="POST" action="information-edit-process.php?id_edit=<?=$_GET['id_edit'];?>">

             <div class="form-group">

                <div class="col-xs-12">

                    <?php

                    $ambildata = mysqli_query($con, "select * from information where id_information='" . $_GET['id_edit'] . "'");

                    $data = mysqli_fetch_array($ambildata);

                    ?>

                    <textarea class="form-control" rows="3" type="text" name="informasi" required="" placeholder="New Information"><?=$data['description'];?></textarea>

                </div>

            </div>

              <div class="form-group">

                <div align="right" class="col-xs-12">

                    <br/><button type="submit" class="btn waves-effect w-lg waves-light btn-primary"><b class="md-edit"></b> Edit Information</button>

                </div>

            </div>

              </form>

          </div> 

        </div>

        </div>

      </div> <!-- End Row -->

        

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

                        <th>Option</th>

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

                          <td>

                              <span><a href="information-edit.php?id_edit=<?php echo $score['id_information'];?>">

                                  <button type="button" class="btn waves-effect waves-light btn-primary btn-xs"><i class="md-edit"></i></button></a>

                              </span>

                              <span><a href="#" class="show-detail-delete" data-id="<?php echo $score['id_information'];?>" data-toggle="modal" data-target="#tabs-modal-delete">

                                  <button type="button" class="btn waves-effect waves-light btn-danger btn-xs"><i class="md-delete"></i></button>

                                  </a>

                              </span>

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



<!-- Modal -->

<center>

<div id="tabs-modal-delete" class="modal fade" role="dialog">

    <div class="modal-setengah">

       <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-body">

                <p>Apakah anda yakin ingin menghapus informasi ini ?</p>

                <p>

                    <a href="#" class="btn waves-effect waves-light w-lg btn-primary" id="link-del"><b class="md-check"></b> Ya</a>

                    <a href="#">

                    <button type="button" class="btn waves-effect waves-light w-lg btn-primary" data-dismiss="modal"><b class="md-close"></b> Tidak</button></a>

                </p>

            </div>

        </div>

    </div>

</div>

</center>

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

<script type="text/javascript">

  $(document).ready(function() {

    $('#datatable').dataTable();

  } );

    $(".show-detail-delete").on("click", function(){

        var url = "information-detail.php?id=" + $(this).data('id');

        var urlDelete = 'information-delete.php?id_delete=' + $(this).data('id');

        $.getJSON(url, function(data, status){

            $("#link-del").attr('href', urlDelete);

        });

    });

</script>



<script src="js/jquery.app.js"></script>

<?php

}else{

  session_destroy();

  header('Location:../login.php');

}

?>