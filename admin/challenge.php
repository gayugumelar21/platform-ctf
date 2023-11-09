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
        <h4 class="pull-left page-title">Challenges !</h4>
      </div>
    </div>
        
    <p align="right">
        <a href="challenge-add.php"><button type="button" class="btn waves-effect waves-light btn-primary"><b class="md-add-circle"></b> Add Challenge</button></a>
    </p>
        
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
                        <th>Category</th>
                        <th>Name</th>
                        <th>Point</th>
                        <th>Level</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $check = mysqli_query($con, "SELECT * from mission where kategori in ('Web', 'Reverse','Pwn', 'Forensic', 'Recon', 'Crypto', 'Misc') order by id_soal desc, waktu asc");
                      $m= mysqli_num_rows($check);
                      while ($score = mysqli_fetch_array($check)) {
                        $dt = explode(" ", $score['waktu']);
                        $dt2 = explode("-", $dt['0']);
                        $tm = explode(":", $dt['1']);
                        $tm2 = $tm['0'].":".$tm['1'];

                        $mon = bln($dt2['1']);
                        $time = $dt2['2']." ".$mon." - ".$tm2;

                        if ($score['level'] == "Easy") {
                          $status = "Easy";
                          $label = "label-success";
                        }
                        else if($score['level'] == "Medium") {
                          $status = "Medium";
                          $label = "label-primary";
                        }
                        else {
                          $status = "Hard";
                          $label = "label-danger";
                        }
                          
                        if ($score['kategori'] == 'Forensic'){
                            $namakategori = "Digital Forensic";
			}
			else if ($score['kategori'] == 'Misc'){
                            $namakategori = "Miscellaneous";
                        }

                        else if ($score['kategori'] == 'Web'){
                            $namakategori = "Web Exploitation";
                        }
                        else if ($score['kategori'] == 'Crypto'){
                            $namakategori = "Cryptography";
                        }
                        else if ($score['kategori'] == 'Reverse'){
                            $namakategori = "Reverse Engineering";
                        }
                        else if ($score['kategori'] == 'Pwn'){
                            $namakategori = "Pwn";
                        }
                        else {
                            $namakategori = "Reconaissance";
                        }
                        
                        ?>
                        <tr>
                          <td><?php echo $m; ?></td>
                          <td><?php echo $namakategori; ?></td>
                          <td><?php echo $score['nama_soal']; ?></td>
                          <td><span class="badge badge-purple"> <?php echo $score['poin']; ?> </span></td>
                            <td><span class="label <?php echo $label; ?>"><?php echo $status; ?></span></td>
                          <td>
                              <span><a href="#" class="show-detail-view" data-id="<?php echo $score['id_soal'];?>"  data-toggle="modal" data-target="#tabs-modal-view">
                                  <button type="button" class="btn waves-effect waves-light btn-success btn-xs"><i class="md-remove-red-eye"></i></button></a>
                              </span>
                              <span><a href="challenge-edit.php?id_edit=<?php echo $score['id_soal'];?>">
                                  <button type="button" class="btn waves-effect waves-light btn-primary btn-xs"><i class="md-edit"></i></button></a>
                              </span>
                              <span><a href="#" class="show-detail-delete" data-id="<?php echo $score['id_soal'];?>" data-toggle="modal" data-target="#tabs-modal-delete">
                                  <button type="button" class="btn waves-effect waves-light btn-danger btn-xs"><i class="md-delete"></i></button>
                                  </a>
                              </span>
                          </td>
                        </tr>
                        <?php
                        $m--;
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
    
    <!-- Modal -->
<div id="tabs-modal-view" class="modal fade" role="dialog">
    <div class="modal-dialog">
       <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nama Soal</h4>
            </div>
            <div class="modal-body">
                <div class="modal-deskripsi">Deskripsi</div><hr/>
                <p><b>Hint : </b></p><p class="modal-hint">hint</p>
            </div>
            <div class="modal-footer">
                <b><p class="modal-flag">flag</p></b>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
<center>
<div id="tabs-modal-delete" class="modal fade" role="dialog">
    <div class="modal-setengah">
       <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus soal <b class="modal-title">#</b> pada kategori <b class="modal-category">#</b> ?</p>
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
    
    $(".show-detail-view").on("click", function(){
        var url = "challenge-detail.php?id=" + $(this).data('id');
        $.getJSON(url, function(data, status){
            $(".modal-title").text(data.nama_soal);
            $(".modal-deskripsi").html(data.deskripsi);
            $(".modal-hint").html(data.hint);
            $(".modal-flag").text(data.flag);
        });
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable();
  } );
    $(".show-detail-delete").on("click", function(){
        var url = "challenge-detail.php?id=" + $(this).data('id');
        var urlDelete = 'challenge-delete.php?id_delete=' + $(this).data('id');
        $.getJSON(url, function(data, status){
            $("#link-del").attr('href', urlDelete);
            $(".modal-title").text(data.nama_soal);
            var kategori = data.kategori;
            if (kategori == 'Crypto'){
                kategori = 'Cryptography';
            } else if (kategori == 'Web'){
                kategori = 'Web Exploitation';
	    } else if (kategori == 'Misc'){
                kategori = 'Miscellaneous';
            } 
	   
	    else if (kategori == 'Reverse'){
                kategori = 'Reverse Engineering';
            } 
             else if (kategori == 'Pwn'){
                kategori = 'Pwn';
            }
            else if (kategori == 'Forensic'){
                kategori = 'Digital Forensic';
            } else{
                kategori = 'Reconaissance';
            }
            $(".modal-category").text(kategori);
        });
    });
</script>
<?php
}else{
  session_destroy();
  header('Location:../login.php');
}
?>
