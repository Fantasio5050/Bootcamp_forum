<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');

$act;

if (isset($_GET['action'])) {
  $act = $_GET['action'] ."Controller.php";
}
else{
  $act = 'topicController.php';
}

//CONATINER/////////////////
if (file_exists('app/Controllers/' .$act)) {
  //HEADER
  include 'app/Controllers/HeaderController.php';
  include $viewH;
  //MAIN
  include 'app/Controllers/' .$act;
  include $view;
  //FOOTER
  include 'App/Controllers/FooterController.php';
  include $viewF;
}
else{
  include 'app/Controllers/ErrorController.php';
  include $viewE;
}
///////////////////////////

 ?>
