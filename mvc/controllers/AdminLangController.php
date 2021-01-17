<?php


class AdminLangController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();

		if(isset($_POST['btnAdd'])) {
			$status = htmlspecialchars($_POST['status']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"status" => $status,
				"title" => $title,
			]);

			$result = Language::addLanguageData($params);
			$code = $result['code'];

			($code != 200) ? header('Location: /logout') : header('Location: /admin/lang');
		}

		$langList = Language::getAllLanguage();

		require_once ROOT . '/views/admin/language/index.php';
		return true;
	}

	public function actionEdit($langId) {
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$error = false;
		$langId = intval($langId);

		if(isset($_POST['btnEdit'])) {
			$status = htmlspecialchars($_POST['status']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"status" => $status,
				"title" => $title,
			]);

			$result = Language::setLanguageDataById($langId, $params);
			$code = $result['code'];
			if($code != 200) $error = 'Не правильный пароль или логин';

			$msg = '<h5 id="delete" class="alert alert-success">Успешно изменено!</h5>';
		}

		if ($error != false ) header('Location: /logout');

		$langInfo = Language::getLanguageById($langId);

		require_once ROOT . '/views/admin/language/edit.php';
		return true;
	}
}