<?php


class AdminHadithController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$hadith = Hadith::getAllHadith();
		echo '<pre>'; var_dump($_SESSION['TOKEN']); echo '</pre>';
		echo '<pre>'; var_dump($hadith); echo '</pre>';

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

			$translate = $description = $stts = $title = $langId = [];
			foreach ($langList as $key => $row){

				$htmlLangBookId = 'bookId-'.$key;
				$htmlLangCategories = 'categoryId-'.$key;
				$htmlLangDescription = 'description-'.$key;
				$htmlLangStatus = 'stts-'.$key;
				$htmlLangTitle = 'title-'.$key;
				$htmlLangId = 'langId-'.$key;

				$translateCategories = array();
				foreach ($_POST['categoryId'] as $patent => $val) {
					array_push($translateCategories, intval($_POST[$htmlLangCategories][$patent]));
				}

				$translateBookId = intval($_POST[$htmlLangBookId]);
				$translateDescription = htmlspecialchars($_POST[$htmlLangDescription]);
				$translateStatus = htmlspecialchars($_POST[$htmlLangStatus]);
				$translateTitle = htmlspecialchars($_POST[$htmlLangTitle]);
				$translateLangId = empty($_POST[$htmlLangTitle]) ? null : intval($_POST[$htmlLangId]);

				if($translateTitle != null) {
					array_push($translate, [
						"bookId" => $translateBookId, "categories" => $translateCategories,
						"description" => $translateDescription, "langId" => $translateLangId,
						"status" => $translateStatus, "title" => $translateTitle]);
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
		$categoryList = Category::getAllCategory();

		require_once ROOT . '/views/admin/hadith/add.php';
		return true;
	}

	public function actionEdit($hadithId) {

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

			$translate = $description = $stts = $title = $langId = [];
			foreach ($langList as $key => $row){
				$htmlLangBookId = 'bookId-'.$key;
				$htmlLangCategories = 'categoryId-'.$key;
				$htmlLangDescription = 'description-'.$key;
				$htmlLangStatus = 'stts-'.$key;
				$htmlLangTitle = 'title-'.$key;
				$htmlLangTrId = 'translate-'.$key;
				$htmlLangId = 'langId-'.$key;

				$translateCategories = array();
				foreach ($_POST['categoryId'] as $patent => $val) {
					array_push($translateCategories, intval($_POST[$htmlLangCategories][$patent]));
				}

				$translateBookId = intval($_POST[$htmlLangBookId]);
				$translateDescription = htmlspecialchars($_POST[$htmlLangDescription]);
				$translateStatus = htmlspecialchars($_POST[$htmlLangStatus]);
				$translateTitle = htmlspecialchars($_POST[$htmlLangTitle]);
				$translateTrId = intval($_POST[$htmlLangTrId]);
				$translateLangId = empty($_POST[$htmlLangTitle]) ? null : intval($_POST[$htmlLangId]);

				if($translateTitle != null) {
					array_push($translate, [
						"bookId" => $translateBookId, "categories" => $translateCategories, "id" => $translateTrId,
						"description" => $translateDescription, "langId" => $translateLangId,
						"status" => $translateStatus, "title" => $translateTitle]);
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