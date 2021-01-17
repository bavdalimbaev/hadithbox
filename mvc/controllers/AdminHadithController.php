<?php


class AdminHadithController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$hadithList = Hadith::getAllHadith();
//		echo '<pre>'; var_dump($hadithList[1]); echo '</pre>';

		require_once ROOT . '/views/admin/hadith/index.php';
		return true;
	}

	public function actionAdd() {

		self::checkAdmin();

		if(isset($_POST['btnAdd'])) {
			$bookId = htmlspecialchars($_POST['bookId']);
			$categoryId = htmlspecialchars($_POST['categoryId']);
			$sourceId = htmlspecialchars($_POST['sourceId']);
			$status = htmlspecialchars($_POST['status']);
			$transcript = htmlspecialchars($_POST['transcript']);


			if($_FILES["imageUrl"]["name"] != "") {
				$target_dir = "/use/source/hadith/";
				$target_file = $target_dir . basename($_FILES["imageUrl"]["name"]);
				move_uploaded_file($_FILES["imageUrl"]["tmp_name"], $target_file);
			}


			$description = array(htmlspecialchars($_POST['description-1']), htmlspecialchars($_POST['description-2']), htmlspecialchars($_POST['description-3']));
			$stts = array(htmlspecialchars($_POST['stts-1']), htmlspecialchars($_POST['stts-2']), htmlspecialchars($_POST['stts-3']));
			$title = array(htmlspecialchars($_POST['title-1']), htmlspecialchars($_POST['title-2']), htmlspecialchars($_POST['title-3']));
			$langId = array(empty($title[0]) ? null : intval($_POST['langId-1']), empty($title[1]) ? null : intval($_POST['langId-2']), empty($title[2]) ? null : intval($_POST['langId-3']));

			$array = []; $i = 0;
			foreach ($title as $kei => $rows) {
				if(!empty($title[$i])) {
					array_push($array, ["description" => $description[$i], "langId" => $langId[$i], "status" => $stts[$i], "title" => $title[$i]]);
				}
				$i++;
			}

			$params = json_encode([
				"bookId" => $bookId,
				"categoryId" => $categoryId,
				"imageUrl" => $target_file,
				"sourcesId" => [],
				"status" => $status,
				"transcript" => $transcript,
				"translateDto" => $array,
			]);

			$result = Hadith::addHadithData($params);
			$code = $result['code'];
//			echo '<pre>'; var_dump($result); echo '</pre>';
			($code != 200) ? header('Location: /logout') : header('Location: /admin/hadith/add');
		}

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$bookList = Book::getAllBook();
		$categoryList = Category::getAllCategory();
		$sourceList = Source::getAllSource();
		$langList = Language::getAllLanguage();

		require_once ROOT . '/views/admin/hadith/add.php';
		return true;
	}

	public function actionEdit($hadithId) {

		self::checkAdmin();
		$hadithId = intval($hadithId);

		if(isset($_POST['btnEdit'])) {
			$bookId = htmlspecialchars($_POST['bookId']);
			$categoryId = htmlspecialchars($_POST['categoryId']);
			$sourceId = htmlspecialchars($_POST['sourceId']);
			$status = htmlspecialchars($_POST['status']);
			$transcript = htmlspecialchars($_POST['transcript']);


			if($_FILES["imageUrl"]["name"] != "") {
				$target_dir = "/use/source/hadith/";
				$target_file = $target_dir . basename($_FILES["imageUrl"]["name"]);
				move_uploaded_file($_FILES["imageUrl"]["tmp_name"], $target_file);
			}


			$description = array(htmlspecialchars($_POST['description-1']), htmlspecialchars($_POST['description-2']), htmlspecialchars($_POST['description-3']));
			$stts = array(htmlspecialchars($_POST['stts-1']), htmlspecialchars($_POST['stts-2']), htmlspecialchars($_POST['stts-3']));
			$title = array(htmlspecialchars($_POST['title-1']), htmlspecialchars($_POST['title-2']), htmlspecialchars($_POST['title-3']));
			$langId = array(empty($title[0]) ? null : intval($_POST['langId-1']), empty($title[1]) ? null : intval($_POST['langId-2']), empty($title[2]) ? null : intval($_POST['langId-3']));
			$translateId = array(intval($_POST['translate-1']), intval($_POST['translate-2']), intval($_POST['translate-3']));

			$array = []; $i = 0;
			foreach ($title as $kei => $rows) {
				if(!empty($title[$i])) {
					array_push($array, ["description" => $description[$i], "id" => $translateId[$i], "hadithId" => $hadithId, "langId" => $langId[$i], "status" => $stts[$i], "title" => $title[$i]]);
				}
				$i++;
			}

			$params = json_encode([
				"bookId" => $bookId,
				"categoryId" => $categoryId,
				"imageUrl" => $target_file,
				"sourcesId" => [],
				"status" => $status,
				"transcript" => $transcript,
				"translateDto" => $array,
			]);

			echo '<pre>'; var_dump($params); echo '</pre>';

			$result = Hadith::setHadithDataById($hadithId, $params);
			$code = $result['code'];
//			echo '<pre>'; var_dump($result); echo '</pre>';
//			exit();
//			($code != 200) ? header('Location: /logout') : header('Location: /admin/hadith');
		}

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$bookList = Book::getAllBook();
		$categoryList = Category::getAllCategory();
		$sourceList = Source::getAllSource();
		$langList = Language::getAllLanguage();
		$hadith = Hadith::getHadithById($hadithId);
		$hadithInfo = $hadith['hadith'];
		$hadithLangInfo = $hadith['translate'];

		require_once ROOT . '/views/admin/hadith/edit.php';
		return true;
	}
}