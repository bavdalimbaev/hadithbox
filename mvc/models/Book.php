<?php

class Book
{
	public static function getAllBook() {
		$findAll = URL . '/api/book/findAll';
		return json_decode(file_get_contents($findAll), true);
	}

	public static function getAllBookByLang($langId) {
		$findAll = URL . '/api/book/findByLangId/' . $langId;
		return json_decode(file_get_contents($findAll), true);
	}

	public static function getBookById($bookId) {
		$findAll = URL . '/api/book/findById/' . $bookId;
		return json_decode(file_get_contents($findAll), true);
	}

	public static function addBookData($params) {
		$url = URL . '/api/book/save';
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curl($url, $params, $headers);
	}

	public static function setBookDataById($bookId, $params) {
		$url = URL . '/api/book/update/' . $bookId;
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curlPut($url, $params, $headers);
	}

}
