<?php
  ob_start();
  session_start();
  include "includes/config.php";


  date_default_timezone_set('UTC');


  if(isset($_SESSION['sname']) and isset($_SESSION['spass'])){
   header("location: index.html");
   exit();
}
?>

<?php include "loginpage1.php"; ?>



