<?php
function filter($data) {
    global $con;
    $data = htmlspecialchars(trim(htmlentities(strip_tags($data))));
 

    // if (get_magic_quotes_gpc())
    //     $data = stripslashes($data);
 
    $data = mysqli_real_escape_string($con, $data);

    return $data;
  
}

function bln($data){
  switch ($data) {
    case 1:
      return "Jan";
      break;
    case 2:
      return "Feb";
      break;
    case 3:
      return "Mar";
      break;
    case 4:
      return "Apr";
      break;
    case 5:
      return "May";
      break;
    case 6:
      return "Jun";
      break;
    case 7:
      return "Jul";
      break;
    case 8:
      return "Aug";
      break;
    case 9:
      return "Sep";
      break;
    case 10:
      return "Oct";
      break;
    case 11:
      return "Nov";
      break;
    case 12:
      return "Dec";
      break;
}}

$server		= "localhost";
$username	= "root";
$password	= "";
$database 	= "tenesys";

$con = mysqli_connect($server,$username,$password, $database);
mysqli_select_db($con, $database) or die("Database tidak bisa dibuka");

?>
