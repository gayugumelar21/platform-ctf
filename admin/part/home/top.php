<?php

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{



include_once "inc/connect.php";

?> 

    <div class="col-md-6">

      <div class="panel panel-border panel-danger">

        <div class="panel-heading">

          <h3 class="panel-title">Top 10 Player</h3>

        </div>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

              <table class="table table-striped">

                <thead>

                  <tr>

                    <th>#</th>

                    <th>Name</th>

                    <th>Team</th>

                    <th>Point</th>

                    <th>Time</th>

                  </tr>

                </thead>

                <tbody>

                <?php

                  $check = mysqli_query($con, "SELECT * from player where status='1' order by poin desc, waktu asc limit 10");

                  $m=1;

                  while ($top = mysqli_fetch_array($check)) {

                  $dt = explode(" ", $top['waktu']);

                  $dt2 = explode("-", $dt['0']);

                  $tm = explode(":", $dt['1']);

                  $tm2 = $tm['0'].":".$tm['1'];



                  $mon = bln($dt2['1']);

                  $time = $dt2['2']." ".$mon." - ".$tm2;

                    

                ?>

                  <tr>

                    <td><?php echo $m; ?></td>

                    <td><?php echo $top['nama_lengkap']; ?></td>

                    <td><?php echo $top['team']; ?></td>

                    <td><span class="badge badge-danger"> <?php echo $top['poin']; ?> </span></td>

                    <td><?php echo $time; ?></td>

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

<?php

}else{

  session_destroy();

  header('Location:../../login.php');

}

?>