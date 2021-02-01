<?php

class Source
{
	public static function getAllSource() {
		$findAll = URL . '/api/source/findAll';
		return json_decode(file_get_contents($findAll), true);
	}

	public static function getSourceById($sourceId) {
		$findAll = URL . '/api/source/findById/' . $sourceId;
		return json_decode(file_get_contents($findAll), true);
	}

	public static function addSourceData($params) {
		$url = URL . '/api/source/save';
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curl($url, $params, $headers);
	}

	public static function setSourceDataById($sourceId, $params) {
		$url = URL . '/api/source/update/' . $sourceId;
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curlPut($url, $params, $headers);
	}

}
