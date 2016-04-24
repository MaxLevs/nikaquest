<?php
/*
	require  'config.php';

	if (!empty($_GET['code'])){

// ВКонтакт присылает нам код:
		$vkontakteCode=$_GET['code'];
		
// Получим токен:
		$sUrl = "https://api.vkontakte.ru/oauth/access_token?client_id=$vkontakteApplicationId&client_secret=$vkontakteKey&code=$vkontakteCode";

// Cоздадим объект, содержащий ответ сервера ВКонтакте, который приходит в формате JSON:
		//$oResponce = json_decode(file_get_contents($sUrl));
		
		//$fp = fopen('token.txt', 'w');
		//fputs($fp, $oResponce->access_token);
		//fclose($fp);
		
	}
*/
?>
<?
require  'config.php';
?>
<a href="http://api.vkontakte.ru/oauth/authorize?client_id=<?=$vkontakteApplicationId?>&scope=offline,wall&redirect_uri=http://nikaquest.hol.es/connect.php&response_type=token">Авторизация Вконтакте</a>
<?php
echo '<br><br><br>';
echo $_GET['access_token'];
echo 'Вот!';
echo $access_token;
echo $_REQUEST['access_token'];
$i=11;
echo $i;
if (!empty($_GET['access_token'])){
	$token = $_GET['access_token'];
	$exp = $_GET['expires_in'];
	$fp = fopen('token.txt', 'w');
	fputs($fp, $token);
	fclose($fp);
}
?>