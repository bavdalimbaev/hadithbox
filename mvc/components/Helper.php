<?php

abstract class Helper {

	public static function checkAdmin() {
		$admin = Checker::checkLogged();
		if ($admin == 'admin') return true;
		die('Доступ закрыт');
	}

	public static function curl($url, $params, $header) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = json_decode(curl_exec($ch), true);
		$result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		return $result;
	}

	public static function curlDelete($url, $params, $header) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = json_decode(curl_exec($ch), true);
		$result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		return $result;
	}

	public static function curlPut($url, $params, $header) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = json_decode(curl_exec($ch), true);
		$result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		return $result;
	}

}