<?php
session_start();
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))
{

include_once "header.php";
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
        <h4 class="pull-left page-title">Explanation !</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default panel-fill">

          <div class="panel-body"> 
            <div class="timeline-2">
			
			<div class="time-item">
                <div class="item-info">
                  <p><em><span class="text-success">Apa itu Capture The Flag</span>
				  <br/> Adalah sebuah kompetisi dalam bidang keamanan jaringan dimana peserta bebas melakukan explorasi maupun eksploitasi terhadap suatu sistem dan diminta untuk menyelesaikan tantangan-tantangan yang ada, kompetisi ini dibagi dalam dua kategori yaitu Attack-Defense dan Jeopardy.
				  </em></p>
				</div>
            </div>
			<br/>
			<div class="time-item">
                <div class="item-info">
				  <p><em><span class="text-success">Attack-Defense dan Jeopardy</span>
				  <br/> Attack-Defense adalah kompetisi mengamankan atau menyerang sebuah server, dengan memanfaatkan celah yang telah sengaja disisipi oleh panitia/juri terhadap server peserta, kompetisi jenis ini umumnya diselenggarakan secara onsite.
				  <br/>
				  <br/> Jeopardy Adalah kompetisi untuk menyelesaikan soal-soal yang berupa string atau file agar peserta dapat menganalisis dan mencari tahu apa yang soal tersebut inginkan serta mendapatkan sebuah jawaban atau yang biasa disebut dengan flag.
			    </div>
			</div>
			<br/>
			<div class="time-item">
                <div class="item-info">
				  <p><em><span class="text-success">Macam-macam Jeopardy</span>
				  <br/> Logic Algoritm, adalah bagaimana cara untuk menganalisis alur pada sebuah program.
				  <br/> - Contoh : Algoritma file source program, Logika, Pseudecode, dan lain-lain.
				  <br/>
				  <br/> Digital Forensic, adalah seni dalam mencari pesan tersembunyi pada sebuah file audio, video, image, network traffic, memory dump, dan lain-lain.
				  <br/> - Contoh : Steganography, File Wireshark, dan lain-lain.
				  <br/>
				  <br/> Cryptography, adalah seni dalam mencari pesan tersembunyi pada sebuah pesan/string dalam bentuk lain.
				  <br/> - Contoh : Caesar Cipher, ROT13 Cipher, BASE64, MD5, dan lain-lain.
				  <br/> 
				  <br/> Reverse Engineering/Binary Exploitation, adalah bagaimana cara untuk merombak dan memahami alur pada sebuah program agar dapat menemukan flag.
				  <br/> - Contoh : Program dengan bahasa ; Assembly, C++, Java, dan lain-lain.
				  <br/> 
				  <br/> Web Exploitation, adalah bagaimana cara untuk dapat menembus sistem keamanan pada sebuah website melalui celah-celah yang telah disediakan.
				  <br/> - Contoh : SQL-Injection, XSS, CSS-Injection, Session Fixation dan lain-lain.
				  <br/> 
				  <br/> Pwn Exploitation, adalah bagaimana cara agar dapat mem-baypass atau melakukan overflow pada suatu koneksi dengan menganalisis bagaimana algoritma dari misi yang diberikan.
				  <br/> - Contoh : Baypass login pada sebuah server, Buffer Overflow dan lain-lain.
				  <br/> 
				  <br/> Reconaissance, adalah seni mencari pesan tersembunyi dengan bantuan search engine dan mencari jawaban berdasarkan clue yang diberikan.
				  <br/> - Contoh : Google, Yahoo, Bing, dan lain-lain.
				  <br/> 
				  <br/> Miscellaneous, adalah sebuah kategori dimana soal-soal dapat dianalisis atau dicari dengan cara yang tidak terdefinisikan, bisa juga dengan cara menebak.
				  <br/> 
                  </em></p>
                </div>
              </div>
			  <br/>
			  <div class="time-item">
                <div class="item-info">
                  <p><em><span class="text-success">Format flag</span>
				  <br/>Umumnya flag berformat seperti CTF{Cap7ure_Th3_Fl4g} atau Flag_adajugayangsepertiini tergantung dari penyelenggara CTF.
				  </em></p>
                </div>
              </div>
			  
			  <!--
			  <div class="time-item">
                <div class="item-info">
                  <div class="text-muted">03/07/2016</div>
                  <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                  <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                </div>
              </div>
			  -->
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

</div>

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

<?php
}else{
  session_destroy();
  header('Location:login.php');
}
?>

<!-- Pecah Belah : Pec4han2_ -->