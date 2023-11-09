<?php

$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if ($_SESSION['status'] == 2 && !empty($_SESSION['user']))

{



include_once "inc/connect.php";

?>

    <div class="col-md-12">

      <div class="panel panel-border panel-success">

        <div class="panel-heading">

          <h3 class="panel-title">Already Solved</h3>

        </div>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

              <?php

                $user = mysqli_query($con, "SELECT * FROM player where id_player='$_SESSION[id]' ");

                $fetch = mysqli_fetch_array($user);



                if($fetch['solved'] !=NULL){

                  $idsoal=$fetch['solved'];

                  $pecah=explode( ",", $idsoal);

              ?>

              <table class="table table-striped">

                <thead>

                  <tr>

                    <th>#</th>

                    <th>Challenge</th>

                    <th>Level</th>

                    <th>Point</th>

                    <th>Category</th>

                    <th>Time</th>

                  </tr>

                </thead>

                <tbody>

                <?php

                  for($i=0; $i< sizeof($pecah); $i++){ 

                  $soal = $pecah[$i];

                  $qry=mysqli_query($con,  "SELECT * from mission where id_soal='$soal' ");

                  $n=1;

                  while ($fetch = mysqli_fetch_array($qry)) {



                  //label for category 

                  switch ($fetch['kategori']) {

                    case 'Forensic':

                      $category = "label-success";

                      break;

                    case 'Crypto':

                      $category = "label-primary";

                      break;

                    case 'Web':

                      $category = "label-purple";

                      break;

                    case 'Reverse':

                      $category = "label-danger";

                      break; 

                    case 'Misc':

                      $category = "label-default";

                      break;                   

                    default:

                      $category = "label-inverse";

                      break;

                  }



                  switch ($fetch['level']) {

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



                  $qry2 = mysqli_query($con, "SELECT * from lastsolved where username='$_SESSION[user]' AND id_soal='$soal' ");

                  $fetch2 = mysqli_fetch_array($qry2)



                ?>

                  <tr>

                    <td><?php echo $n; ?></td>

                    <td><?php echo $fetch['nama_soal']; ?></td>                 

                    <td><span class="label <?php echo $label_level; ?>"><?php echo $fetch['level']; ?></span></td>

                    <td><span class="badge badge-danger"><?php echo $fetch['poin']; ?></span></td>

                    <td><span class="label <?php echo $category; ?>"><?php echo $fetch['kategori']; ?></span></td>

                    <td><?php echo $fetch2['waktu']; ?></td>

                  </tr>

                <?php

                  $n++;

                  }}

                ?>

                </tbody>

              </table>

              <?php } ?>

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