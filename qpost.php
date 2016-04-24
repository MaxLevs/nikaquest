<?php

require 'config.php';
$vkontakteAccessToken = file_get_contents('token.txt');
$ownID=$_GET['own'];
$postID=$_GET['pot'];

//Здесь генерируется текст из базы.
$textComm = "Возможно, банально, но как дела?)";
$textComm = urlencode(iconv( 'windows-1251', 'utf-8' , $textComm));

//Строка запроса к серверу Вконтакте
$sRequest = "https://api.vkontakte.ru/method/wall.addComment?owner_id=$ownID&v=5.50&access_token=$vkontakteAccessToken&post_id=$postID&text=$textComm";

//Ответ от Вконтакте
$oResponce = json_decode(file_get_contents($sRequest));
$fp = fopen('vkans.txt', 'w');
fputs($fp, $oResponce);
fclose($fp);

?>