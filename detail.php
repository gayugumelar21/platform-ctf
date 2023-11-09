<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))

{



include "inc/connect.php";



//Soal

$data = "";

$soal = "";

$hint = "";

$id = "";

if(isset($_POST['id'])){

  $id = $_POST['id'];

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

                  <ul class="nav nav-tabs navtab-bg nav-justified">

                    <li class="active">

                      <a href="#misi" data-toggle="tab" aria-expanded="false"> 

                        <span class="visible-xs"><i class="fa fa-home"></i></span> 

                        <span class="hidden-xs">Challenge</span> 

                      </a> 

                    </li> 

                    <li class=""> 

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

                        <p>Hint : <?php echo $hint; ?> </p> 

                        <div class="input-group m-t-10">

                            <input type="text" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="FLAG{A-z}">

                            <input type="hidden" value="<?php echo $id; ?>"></input>

                            <span class="input-group-btn">

                            <button type="button" class="btn waves-effect waves-light btn-primary">Submit</button>

                            </span>

                        </div>

                      </div> 

                    </div> 

                    <div class="tab-pane" id="selesai">

                    <ul>

                      <li>z3r0-net</li>

                      <li>dArkBoy</li>

                    </ul>

                    </div> 

                    </div> 

                  </div>

                </div><!-- /.modal-content -->

              </div><!-- /.modal-dialog --> 



<script>

$(document).ready(function() {

$("form").on("submit", function (e) {

    $.ajax({

        type: "POST",

        url: "flag.php",

        data: $(this).serialize(),

        success: function (data) {

        }

    });

    e.preventDefault();

});

});

</script>



<?php

}else{

  session_destroy();

  header('Location:login.php');

}