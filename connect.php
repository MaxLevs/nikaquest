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
<?php
if (!empty($_GET['access_token'])){
	$token = $_GET['access_token'];
	$exp = $_GET['expires_in'];
	$fp = fopen('token.txt', 'w');
	fputs($fp, $token);
	fclose($fp);
}
?>

<?
require  'config.php';

$aurl = 'http://api.vkontakte.ru/oauth/authorize?client_id='. $vkontakteApplicationId .'&scope=offline,wall&redirect_uri=http://nikaquest.hol.es/connect.php&response_type=token';

$token = file_get_contents($aurl);
print_r(json_decode($token));
//echo '<a href="'. $aurl .'">Получить токен</a>';


?>