<?php


class Language
{
    public static function getAllLanguage() {
        $findAll = URL . '/api/language/findAll';
        $language = json_decode(file_get_contents($findAll), true);

        return $language;
    }

    public static function getLanguageById($langId) {
	    $findAll = URL . '/api/language/findById/' . $langId;
	    $language = json_decode(file_get_contents($findAll), true);

	    return $language;
    }

    public static function addLanguageData($params) {
    	$url = URL . '/api/language/save';
	    $headers = [
		    'Authorization: Bearer ' . $_SESSION['TOKEN'],
		    'Content-Type: application/json'
	    ];
    	return Helper::curl($url, $params, $headers);
    }

    public static function setLanguageDataById($langId, $params) {
    	$url = URL . '/api/language/update/' . $langId;
	    $headers = [
		    'Authorization: Bearer ' . $_SESSION['TOKEN'],
		    'Content-Type: application/json'
	    ];
    	return Helper::curlPut($url, $params, $headers);
    }
}