<?phpinclude "inc/connect.php";//Terima input$user = filter($_POST['username']);$pass = filter(md5($_POST['password']));//Cek ke database$cek_tabel = mysqli_query($con, "SELECT * FROM player WHERE username='$user' AND password='$pass' ");$ketemu = mysqli_num_rows($cek_tabel);$r = mysqli_fetch_array($cek_tabel);if ($ketemu > 0) {	if ($r['status'] == 1) {	$waktu = date(" d-M-Y h:i A");	$log = filter($_SERVER['REMOTE_ADDR']);	session_start();		$_SESSION['id']		=	$r['id_player'];		$_SESSION['user']	=	$r['username'];		$_SESSION['name']	=	$r['nama_lengkap'];		$_SESSION['pass']	=	$r['password'];		$_SESSION['team']	= 	$r['team'];        $_SESSION['status'] =   1;	//mysql_query("UPDATE player set last_login='$waktu' , log=$log where id_player='$_SESSION[id]' ") or die ("Update gagal, ".mysql_error());	echo "	<script>		swal({          title: 'Login Success!',          text: 'Welcome to TenesysCTF',          type: 'success'        },function(){          location.assign('home.php');        });	</script>";	}    else if ($r['status'] == 2) {	$waktu = date(" d-M-Y h:i A");	$log = filter($_SERVER['REMOTE_ADDR']);	session_start();		$_SESSION['id']		=	$r['id_player'];		$_SESSION['user']	=	$r['username'];		$_SESSION['name']	=	$r['nama_lengkap'];		$_SESSION['pass']	=	$r['password'];		$_SESSION['team']	= 	$r['team'];        $_SESSION['status'] =   2;	//mysql_query("UPDATE player set last_login='$waktu' , log=$log where id_player='$_SESSION[id]' ") or die ("Update gagal, ".mysql_error());	echo "	<script>		swal({          title: 'Admin Login Success!',          text: 'Welcome to TenesysCTF',          type: 'success'        },function(){          location.assign('admin/home.php');        });	</script>";	}    else {		echo "		<script>			swal({              title: 'Account Not Active!',              text: 'Please contact us',              type: 'error'            });		</script>";	}} else {	echo "	<script>		swal({          title: 'Username/Password Wrong!',          text: 'Check your username or password',          type: 'warning'        });    </script>";}?>