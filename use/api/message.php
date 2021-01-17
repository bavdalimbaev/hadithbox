<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = appache_request_headers();
$headerToken = $headers['token'];
$ht = 'aaaaaaaaaaa';

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

if($ht == $headerToken) {

	$hadithId = htmlspecialchars($data->hadithId);
	$comment = htmlspecialchars($data->comment);
	$token = htmlspecialchars($data->token);

	$myToken = 'saasas';


	if ($myToken == $token) {

		$conn = mysqli_connect('localhost', 'root', 'root', 'hadithbox');
		$result = $conn->query("INSERT INTO `messages` (hadith_id, comment) VALUES ('$hadithId', '$comment')");

		http_response_code();
		if ($result) {
			http_response_code(200);
			echo http_response_code();
			exit();
		} else {
			http_response_code(401);
			echo http_response_code();
			exit();
		}
	}
	http_response_code(500);
	echo http_response_code();
}
http_response_code(404);
echo http_response_code();
