<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username)) {
  echo "<script>window.location ='home.php'</script>";
} else {
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Tenesys CTF platform, build for learning together.">
  <meta name="author" content="Hendrik Agung.M">

  <link rel="shortcut icon" href="images/favicon.ico">

  <title>TenesysCTF - Register</title>

  <!-- Base Css Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Icons -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
  <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

  <!-- sweet alerts -->
  <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

  <!-- animate css -->
  <link href="css/animate.css" rel="stylesheet" />

  <!-- Waves-effect -->
  <link href="css/waves-effect.css" rel="stylesheet">

  <!-- Custom Files -->
  <link href="css/helper.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <script src="js/modernizr.min.js"></script>
        
</head>
<body>


  <div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
      <div class="panel-heading bg-img"> 
        
        <h3 class="text-center m-t-10 text-white"> <strong>Tenesys CTF</strong> Register </h3>
      </div> 


      <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST">
          <div id="data"></div>
          <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="text" name="username" required="" placeholder="Username">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="email" name="email" required="" placeholder="Email">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="text" name="name" required="" placeholder="Full Name">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control input-lg " type="text" name="team" required="" placeholder="Team">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control input-lg" type="password" name="password" required="" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control input-lg" type="password" name="repeat" required="" placeholder="Repeat Password">
            </div>
          </div>
			<p align="center"><i>*untuk sementara akun anda <b>belum aktif</b> karena membutuhkan <b>persetujuan admin</b>, silahkan tunggu kurang dari 12 jam</i></p>
            
          <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
              <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Register</button>
            </div>
          </div>

          <div class="form-group m-t-30">
              <div class="col-sm-12 text-center">
                  <a href="login.php">Already have account?</a>
              </div>
          </div>

        </form> 
      </div>                                 
    </div>
  </div>
        
  <script>
    var resizefunc = [];
  </script>
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
  <script src="assets/sweet-alert/sweet-alert.min.js"></script>

  <!-- CUSTOM JS -->
  <script src="js/jquery.app.js"></script>
  <script>
  $(document).ready(function() {
  $("form").on("submit", function (e) {
      $.ajax({
          type: "POST",
          url: "register-process.php",
          data: $(this).serialize(),
          success: function (data) {
              $("#data").html(data).show();
              return false;
          }
      });
      e.preventDefault();
  });
  });
  </script>

</body>
</html>
<?php } ?>