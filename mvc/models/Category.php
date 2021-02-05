<?php


class Category
{
	public static function getAllCategory() {
		$findAll = URL . '/api/category/findAll';
		return json_decode(file_get_contents($findAll), true);
	}

	public static function getAllCategoryByLang($langId) {
		$findAll = URL . '/api/category/findByLangId/' . $langId;
		return json_decode(file_get_contents($findAll), true);
	}

	public static function getCategoryById($catId) {
		$findAll = URL . '/api/category/findById/' . $catId;
		return json_decode(file_get_contents($findAll), true);
	}

	public static function addCategoryData($params) {
		$url = URL . '/api/category/save';
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curl($url, $params, $headers);
	}

	public static function setCategoryDataById($categoryId, $params) {
		$url = URL . '/api/category/update/' . $categoryId;
		$headers = [
			'Authorization: Bearer ' . $_SESSION['TOKEN'],
			'Content-Type: application/json'
		];
		return Helper::curlPut($url, $params, $headers);
	}
}