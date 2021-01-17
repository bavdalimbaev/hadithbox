<?php
session_start();
if(!isset($_SESSION['TOKEN'])):
	header("Location: /");
endif;

define('URL', 'https://hadithtezal.herokuapp.com');

$delId = intval($_GET['id']);
$delTp = htmlspecialchars($_GET['type']);

$result = false;

switch ($delTp) {
	case 'book':
		$url = URL . '/api/book/delete/' . $delId;
		$result = deleteCurl($url, $delId);
		$urlBack = '/admin/book';
		break;

	case 'category':
		$url = URL . '/api/category/delete/' . $delId;
		$result = deleteCurl($url, $delId);
		$urlBack = '/admin/category';
		break;

	case 'hadith':
		$url = URL . '/api/hadith/delete/' . $delId;
		$result = deleteCurl($url, $delId);
		$urlBack = '/admin/hadith';
		break;

	case 'lang':
		$url = URL . '/api/language/delete/' . $delId;
		$result = deleteCurl($url, $delId);
		$urlBack = '/admin/lang';
		break;

	case 'message':
		$conn = mysqli_connect('localhost', 'root', 'root', 'hadithbox');
		$conn->query("DELETE FROM `messages` WHERE id = '$delId'");
		$result = 200; $urlBack = '/admin/message';
		break;

	case 'source':
		$url = URL . '/api/sourse/delete/' . $delId;
		$result = deleteCurl($url, $delId);
		$urlBack = '/admin/source';
		break;

	default:
		header('Localhost: /admin');
		break;
}

($result != 200) ? 'no' : header('Location: ' . $urlBack . '');
echo '<pre>'; var_dump($result); echo '</pre>';
echo 'noe';
//($result != 200) ? header('Location: /logout') : header('Location: ' . $urlBack);

function deleteCurl($url, $delId) {
	$header = [
		'Authorization: Bearer ' . $_SESSION['TOKEN'],
		'Content-Type: application/json'
	];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode('id => '.$delId));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_exec($ch);
	$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	return $result;
}
