<?php
$sesi_username      = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($_SESSION['status'] == 1 && !empty($_SESSION['user']))
{

include_once "inc/connect.php";
?>
<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <div class="user-details">
      <div class="pull-left">
        <img src="images/flag-ico.png" alt="" class="thumb-md img-circle">
      </div>
      
      <div class="user-info">
        <a class="dropdown-toggle"><?php echo $_SESSION['user']; ?></span></a>
        <p class="text-muted m-0"><?php echo $_SESSION['team']; ?></p>
      </div>
    </div>
    <!--- Divider -->
    <div id="sidebar-menu">
      <ul>
        <li>
          <a href="home.php" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
        </li>
        <li>
          <a href="challenge.php" class="waves-effect"><i class="md md-flag"></i><span> Challenges </span></a>
        </li>
		<li>
          <a href="scoreboard.php" class="waves-effect"><i class="md-content-paste"></i><span> Scoreboard </span></a>
        </li>
		<li>
          <a href="information.php" class="waves-effect"><i class="md-check-box"></i><span> Information </span></a>
        </li>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
}else{
  session_destroy();
  header('Location:../../404.php');
}
?>