<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');

$act;

if (isset($_GET['action'])) {
  $act = $_GET['action'] .".php";
}
else{
  $act = 'Home.php';
}

//HEADER////////////////////
include 'app/Controllers/header.php';
include $viewH;
////////////////////////////


//CONATINER/////////////////
if (file_exists('app/Controllers/' .$act)) {
  include 'app/Controllers/' .$act;
  include $view;
}
else{
  include 'app/Controllers/Error.php';
  include $viewE;
}
///////////////////////////

//FOOTER///////////////////
include 'App/Controllers/Footer.php';
include $viewF;
///////////////////////////


 ?>
