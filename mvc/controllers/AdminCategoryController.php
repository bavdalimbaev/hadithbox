<?php


class AdminCategoryController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		if(isset($_POST['btnAdd'])) {
			$langId = intval($_POST['langId']);
			$status = htmlspecialchars($_POST['status']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"langId" => $langId,
				"status" => $status,
				"title" => $title,
			]);

			$result = Category::addCategoryData($params);
			$code = $result['code'];

			($code != 200) ? header('Location: /logout') : header('Location: /admin/category');
		}

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$categoryList = Category::getAllCategory();
		$langList = Language::getAllLanguage();

		require_once ROOT . '/views/admin/category/index.php';
		return true;
	}

	public function actionEdit($categoryId) {

		self::checkAdmin();

		$error = false;
		$categoryId = intval($categoryId);

		if(isset($_POST['btnEdit'])) {
			$langId = intval($_POST['langId']);
			$status = htmlspecialchars($_POST['status']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"langId" => $langId,
				"status" => $status,
				"title" => $title,
			]);

			$result = Category::setCategoryDataById($categoryId, $params);
			$code = $result['code'];
			if($code != 200) $error = 'Не правильный пароль или логин';

			$msg = '<h5 id="delete" class="alert alert-success">Успешно изменено!</h5>';
		}

		if ($error != false ) header('Location: /logout');

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$categoryInfo = Category::getCategoryById($categoryId);
		$langList = Language::getAllLanguage();


		require_once ROOT . '/views/admin/category/edit.php';
		return true;
	}

}