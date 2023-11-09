<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))
{

require_once "../../inc/connect.php";

//Soal
$data = "";
$soal = "";
$hint = "";
$id = "";
if(!empty($_POST['id'])){
  $id = filter($_POST['id']);
  $lihat = mysqli_query($con, "SELECT * from mission where id_soal='$id' ");
  $data = mysqli_fetch_array($lihat);

  if ($data['display'] == "1") {
    $soal = $data['deskripsi'];
    $hint = $data['hint'];
    $id = $data['id_soal'];
  }
}
//Player selesai

?>

              <div class="modal-dialog">
                <div class="modal-content p-0">
                  <ul class="nav nav-tabs navtab-bg">
                    <li class="active tab">
                      <a href="#misi" data-toggle="tab" aria-expanded="false"> 
                        <span class="visible-xs"><i class="fa fa-home"></i></span> 
                        <span class="hidden-xs">Challenge</span> 
                      </a> 
                    </li>
                    <li class="tab"> 
                      <a href="#selesai" data-toggle="tab" aria-expanded="false"> 
                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                        <span class="hidden-xs">Player Solve</span> 
                      </a> 
                    </li> 
                  </ul> 
                  
                  <div class="tab-content"> 
                    <div class="tab-pane active" id="misi"> 
                      <div> 
                        <p><?php echo $soal; ?> </p> 
                        <br/><p>Hint : <?php echo $hint; ?> </p> 
                        <form class="input-group m-t-10">
                            <input type="text" name="flag" class="form-control" placeholder="tenesys{flag}">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"></input>
                            <span class="input-group-btn">
                            <button type="button" id="submit" class="btn waves-effect waves-light btn-primary">Submit</button>
                            </span>
                        </form>
                      </div> 
                      <div id="hasil"></div>
                    </div> 
                    <div class="tab-pane" id="selesai">
                    <ul>
                    <?php
                      $cek = mysqli_query($con, "SELECT * from lastsolved where id_soal='$id'");
                      #$cek = mysqli_query($con, "SELECT * from lastsolved where id_soal='$id' limit 10");
                      $hitung = mysqli_num_rows($cek);           
                      if ($hitung < 1) {
                        echo "<p>Belum ada player yang menyelesaikan misi ini.</p>";
                      }else{
                      $n= 1;
                      while ($dtsolve = mysqli_fetch_array($cek)) {
                      $nama = mysqli_query($con, "SELECT nama_lengkap from player where username='$dtsolve[username]' ");
                      $l = mysqli_fetch_array($nama);
                    ?>
                      <li><?php echo $l['nama_lengkap']; ?></li>
                    <?php
                     $n++;
                      }}
                    ?>
                    </ul>
                    </div> 
                    </div> 
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog --> 

<script>
    $('#submit').on('click', function (){
      $.post('part/challenge/check.php', $("form").serialize(), function(hasil) {
          $("#hasil").html(hasil).show();
      });
    });
</script>

<?php
}else{
  session_destroy();
  header('Location:../../login.php');
}
