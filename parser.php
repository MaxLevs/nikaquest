<?
//����������� ������
require 'config.php';
$search=urlencode(iconv( 'windows-1251', 'utf-8' , $search))

$sRequest = "https://api.vkontakte.ru/method/wall.addComment?q=$search&extended=1&count=1";

//����������� � ����������� ����
$oResponce = json_decode(file_get_contents($sRequest));
$postID = $oResponce->id;
$ownID = $oResponce->owner_id;
$comm = $oResponce->comments;

//��������� ���� �����, ���� �� �������
$fp = fopen('date.txt', 'r');
$date = fgets($fp, 20);
fclose($fp);

//��������� ������������ ���-�� ���������
if($ownID == $groopId && $comm < 5 && $oResponce->date != $date) {

	//���������� ���� �����, ���� �� �������
	$fp = fopen('date.txt', 'w');
	fputs($fp, $oResponce->date);
	fclose($fp);

	//����������� ������������ ����
	$oResponce = file_get_contents('http://nikaquest.hol.es/qpost.php?pot=$postID&own=$ownID');
};

?>