<?php


class Hadith
{
	public static function getAllHadith() {
		$findAll = URL . '/api/hadith/findAll';
		$hadith = json_decode(file_get_contents($findAll), true);

		return $hadith;
	}

	public static function getHadithById($hadithId) {
		$findAll = URL . '/api/hadith/findById/' . $hadithId;
		$hadith = json_decode(file_get_contents($findAll), true);

		return $hadith;
	}

	public static function addHadithData($params) {
		$url = URL . '/api/hadith/save';
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curl($url, $params, $headers);
	}

	public static function setHadithDataById($hadithId, $params) {
		$url = URL . '/api/hadith/update/' . $hadithId;
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curlPut($url, $params, $headers);
	}
}