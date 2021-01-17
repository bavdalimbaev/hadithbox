<?php
class SiteController
{
	public function actionIndex()
	{
        echo 'pre 1<br>';

print_r($_SESSION);

//        if(!isset($_SESSION['TOKEN'])) {
//            $url = 'https://hadithtezal.herokuapp.com/api/auth/signin';
//            $params = json_encode(array(
//                "password" => "hadith_tezal_123!@#",
//                "username" => "Admin",
//            ));
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/json'));
//            $result = curl_exec($ch);
//
//            $result = json_decode($result, true);
//            $_SESSION['TOKEN'] = $result['token'];
//        } else {
//
//
////        $url = 'https://hadithtezal.herokuapp.com/api/language/save';
//        $url = 'https://hadithtezal.herokuapp.com/api/language/delete/85';
////            $url = 'https://hadithtezal.herokuapp.com/api/language/update/52';
//            $headers = [
//                'Authorization: Bearer ' . $_SESSION['TOKEN'],
//                'Content-Type: application/json'
//            ];
//            $postData = [
//                "id" => "85",
////                "status" => "DISABLED",
////                "title" => "TITLE"
//            ];
//
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//            $result = curl_exec($ch);
//            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//            if ($statusCode == 403) unset($_SESSION['TOKEN']);
//
//
//            echo '<pre>Результат ';
//            print_r($result);
//            echo '</pre>';
//            echo '<pre>Статус ';
//            print_r($statusCode);
//            echo '</pre>';
//
//
//            echo 'pre';

//        }













//		require_once(ROOT . '/views/index.php');
		return true;
	}

}
