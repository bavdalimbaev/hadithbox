<?php


class AdminHadithController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$hadith = Hadith::getAllHadith();

		require_once ROOT . '/views/admin/hadith/index.php';
		return true;
	}

	public function actionAdd() {

		self::checkAdmin();
		$langList = Language::getAllLanguage();

		if(isset($_POST['btnAdd'])) {
			$status = htmlspecialchars($_POST['status']);
			$transcript = htmlspecialchars($_POST['transcript']);

			if($_FILES["imageUrl"]["name"] != "") {
				$target_dir = ROOT . "/use/source/hadith/";
				$fileTypeName = explode(".", $_FILES["imageUrl"]["name"]);
				$newFileName = 'hadith'.round(microtime(true)) . '.' . end($fileTypeName);
				$target_file = $target_dir . $newFileName;
				move_uploaded_file($_FILES["imageUrl"]["tmp_name"], $target_file);
				$imageUrl = "/use/source/hadith/" . $newFileName;
			}

			$translate = [];
			foreach ($langList as $key => $row) {
				$htmlLangArray = [
					'bookId' => 'bookId-'.$key, 'sourceId' => 'sourceId-'.$key, 'langId' => 'langId-'.$key,
					'categoryId' => 'categoryId-'.$key, 'description' => 'description-'.$key,
					'status' => 'stts-'.$key, 'title' => 'title-'.$key
				];

				$translateCategories = array();
				foreach ($_POST[$htmlLangArray['categoryId']] as $patent => $val) {
					array_push($translateCategories, intval($_POST[$htmlLangArray['categoryId']][$patent]));
				}

				$translateArray = [
					'bookId' => intval($_POST[$htmlLangArray['bookId']]), 'sourceId' => intval($_POST[$htmlLangArray['sourceId']]),
					'description' => htmlspecialchars($_POST[$htmlLangArray['description']]),
					'status' => htmlspecialchars($_POST[$htmlLangArray['status']]), 'title' => htmlspecialchars($_POST[$htmlLangArray['title']]),
					'langId' => empty($_POST[$htmlLangArray['title']]) ? null : intval($_POST[$htmlLangArray['langId']]),
				];

				if($translateArray['title'] != null) {
					array_push($translate, [
						"bookId" => $translateArray['bookId'], "sourceId" => $translateArray['sourceId'], "categories" => $translateCategories,
						"description" => $translateArray['description'], "langId" => $translateArray['langId'],
						"status" => $translateArray['status'], "title" => $translateArray['title']]);
				}
			}

			$params = json_encode([
				"imageUrl"      => $imageUrl,
				"status"        => $status,
				"transcript"    => $transcript,
				"translateDto"  => $translate,   // array
			]);

			$result = Hadith::addHadithData($params);
			$code = $result['code'];
			($code != 200) ? header('Location: /logout') : header('Location: /admin/hadith/add');
		}

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$bookList = Book::getAllBook();
		$sourceList = Source::getAllSource();
		$categoryList = Category::getAllCategory();

		require_once ROOT . '/views/admin/hadith/add.php';
		return true;
	}

	public function actionEdit($hadithId) {
//		print_r(array_keys(get_defined_vars()));

		self::checkAdmin();
		$hadithId = intval($hadithId);
		$langList = Language::getAllLanguage();

		if(isset($_POST['btnEdit'])) {
			$status = htmlspecialchars($_POST['status']);
			$transcript = htmlspecialchars($_POST['transcript']);

			if($_FILES["imageUrl"]["name"] != "") {
				$target_dir = ROOT . "/use/source/hadith/";
				$fileTypeName = explode(".", $_FILES["imageUrl"]["name"]);
				$newFileName = 'hadith'.$hadithId.round(microtime(true)) . '.' . end($fileTypeName);
				$target_file = $target_dir . $newFileName;
				move_uploaded_file($_FILES["imageUrl"]["tmp_name"], $target_file);
				$imageUrl = "/use/source/hadith/" . $newFileName;
			}

			$translate = [];
			foreach ($langList as $key => $row){
				$htmlLangArray = [
					'bookId' => 'bookId-'.$key, 'sourceId' => 'sourceId-'.$key, 'langId' => 'langId-'.$key,
					'categoryId' => 'categoryId-'.$key, 'description' => 'description-'.$key,
					'status' => 'stts-'.$key, 'title' => 'title-'.$key, 'translate' => 'translate-'.$key
				];

				$translateCategories = array();
				foreach ($_POST[$htmlLangArray['categoryId']] as $patent => $val) {
					array_push($translateCategories, intval($_POST[$htmlLangArray['categoryId']][$patent]));
				}

				$translateArray = [
					'bookId' => intval($_POST[$htmlLangArray['bookId']]), 'sourceId' => intval($_POST[$htmlLangArray['sourceId']]),
					'description' => htmlspecialchars($_POST[$htmlLangArray['description']]), 'status' => htmlspecialchars($_POST[$htmlLangArray['status']]),
					'title' => htmlspecialchars($_POST[$htmlLangArray['title']]), 'translate' => htmlspecialchars($_POST[$htmlLangArray['translate']]),
					'langId' => empty($_POST[$htmlLangArray['title']]) ? null : intval($_POST[$htmlLangArray['langId']]),
				];

				if($translateArray['title'] != null) {
					array_push($translate, [
						"bookId" => $translateArray['bookId'], "sourceId" => $translateArray['sourceId'], "categories" => $translateCategories,
						"id" => $translateArray['translate'], "description" => $translateArray['description'], "langId" => $translateArray['langId'],
						"status" => $translateArray['status'], "title" => $translateArray['title']]);
				}
			}

			$params = json_encode([
				"imageUrl"      => $imageUrl,
				"status"        => $status,
				"transcript"    => $transcript,
				"translateDto"  => $translate,   // array
			]);
			$result = Hadith::setHadithDataById($hadithId, $params);

			$code = $result['code'];
			($code != 200) ? header('Location: /logout') : header('Location: /admin/hadith');
		}

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$bookList = Book::getAllBook();
		$categoryList = Category::getAllCategory();
		$sourceList = Source::getAllSource();
		$hadith = Hadith::getHadithById($hadithId);
		$hadithInfo = $hadith['hadith'];
		$hadithLangInfo = $hadith['translate'];

		require_once ROOT . '/views/admin/hadith/edit.php';
		return true;
	}


	public function actionView($hadithId) {

		self::checkAdmin();
		$hadithId = intval($hadithId);
		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$hadith = Hadith::getHadithById($hadithId);
		$hadithInfo = $hadith['hadith'];
		$hadithLangInfo = $hadith['translate'];

		require_once ROOT . '/views/admin/hadith/view.php';
		return true;
	}
}