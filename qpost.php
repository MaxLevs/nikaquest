<?php

require 'config.php';
$vkontakteAccessToken = file_get_contents('token.txt');
$ownID=$_GET['own'];
$postID=$_GET['pot'];

//����� ������������ ����� �� ����.
$textComm = "��������, ��������, �� ��� ����?)";
$textComm = urlencode(iconv( 'windows-1251', 'utf-8' , $textComm));

//������ ������� � ������� ���������
$sRequest = "https://api.vkontakte.ru/method/wall.addComment?owner_id=$ownID&v=5.50&access_token=$vkontakteAccessToken&post_id=$postID&text=$textComm";

//����� �� ���������
$oResponce = json_decode(file_get_contents($sRequest));
$fp = fopen('vkans.txt', 'w');
fputs($fp, $oResponce);
fclose($fp);

?>