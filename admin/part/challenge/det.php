<?php

session_start();

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{



require_once "../../inc/connect.php";



//Mission

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

  echo "

              <div class='modal-dialog'>

                <div class='modal-content p-0'>

                  <ul class='nav nav-tabs navtab-bg'>

                    <li class='active tab'>

                      <a href='#misi' data-toggle='tab' aria-expanded='false'> 

                        <span class='visible-xs'><i class='fa fa-home'></i></span> 

                        <span class='hidden-xs'>Challenge</span> 

                      </a> 

                    </li>

                    <li class='tab'> 

                      <a href='#selesai' data-toggle='tab' aria-expanded='false'> 

                        <span class='visible-xs'><i class='fa fa-user'></i></span> 

                        <span class='hidden-xs'>Player Solve</span> 

                      </a> 

                    </li> 

                  </ul> 

                  

                  <div class='tab-content'> 

                    <div class='tab-pane active' id='misi'> 

                      <div> 

                        <p>$soal </p> 

                        <p>Hint : $hint </p> 

                        <form class='input-group m-t-10'>

                            <input type='text' name='flag' class='form-control' placeholder='FLAG{A-z}'>

                            <input type='hidden' name='id' value='$id'></input>

                            <span class='input-group-btn'>

                            <button type='button' id='submit' class='btn waves-effect waves-light btn-primary'>Submit</button>

                            </span>

                        </form>

                      </div> 

                      <div id='hasil'></div>

                    </div> 

                    <div class='tab-pane' id='selesai'>

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

    $('#submit').on('click', function (){

      $.post('part/challenge/check.php', $('form').serialize(), function(hasil) {

          $('#hasil').html(hasil).show();

      });

    });

</script>";}



}else{

  session_destroy();

  header('Location:../../login.php');

}