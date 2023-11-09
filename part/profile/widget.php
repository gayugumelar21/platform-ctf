<?php

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))

{



include_once "inc/connect.php";

?> 

<!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <h4 class="pull-left page-title">Hai <?php echo $_SESSION['name']; ?> !</h4>

        </div>

      </div>



      <!-- Start Widget -->

      <?php

        $cek = mysqli_query($con, "SELECT * from player where id_player='$_SESSION[id]' ");

        $pn = mysqli_fetch_array($cek);



        $cek2 = mysqli_query($con, "SELECT count(*) as total from lastsolved where username='$_SESSION[user]' ");

        $ttl = mysqli_fetch_assoc($cek2);

      ?>

      <div class="row">

        <div class="col-md-6 col-sm-6 col-lg-3">

          <div class="mini-stat clearfix bx-shadow">

            <span class="mini-stat-icon bg-danger"><i class="ion-ios7-lightbulb"></i></span>

            <div class="mini-stat-info text-right text-muted">

              <span class="counter"><?php echo $pn['poin']; ?></span>Point

            </div>

          </div>

        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">

          <div class="mini-stat clearfix bx-shadow">

            <span class="mini-stat-icon bg-success"><i class="md md-flag"></i></span>

            <div class="mini-stat-info text-right text-muted">

              <span class="counter"><?php echo $ttl['total']; ?></span> Challenge solved

            </div>

          </div>

        </div>



        <div class="col-md-9 col-sm-9 col-lg-6">

          <div class="mini-stat clearfix bx-shadow">

            <div class="mini-stat-info text-right text-muted">

              <div class="row">

                <form >

                  <div class="col-sm-9 todo-inputbar">

                    <input type="password" id="password-reset" name="password-reset" class="form-control" placeholder="New Password">

                  </div>

                  <div class="col-sm-3 todo-send">

                    <button class="btn-primary btn-block btn waves-effect waves-light" type="button" id="submit-pwd">Update</button>

                  </div>

                </form>

                <br/><br/>

                  

                <form>

                  <div class="col-sm-9 todo-inputbar">

                    <input type="text" id="team-reset" name="team-reset" class="form-control" placeholder="New Team">

                  </div>

                  <div class="col-sm-3 todo-send">

                      <button class="btn-primary btn-block btn waves-effect waves-light" type="button" id="submit-team">Update</button>

                  </div>

                </form>

              </div>

            </div>

          </div>

        </div>

      </div> 

      <!-- End row-->

<?php

}else{

  session_destroy();

  header('Location:../../login.php');

}

?>