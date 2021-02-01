<?php


class AdminSourceController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();

		if(isset($_POST['btnAdd'])) {
			$langId = intval($_POST['langId']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"langId" => $langId,
				"title" => $title,
			]);

			$result = Source::addSourceData($params);
			$code = $result['code'];

			($code != 200) ? header('Location: /logout') : header('Location: /admin/source');
		}

		$sourceList = Source::getAllSource();
		$langList = Language::getAllLanguage();

		require_once ROOT . '/views/admin/source/index.php';
		return true;
	}

	public function actionEdit($sourceId) {

		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$error = false;
		$sourceId = intval($sourceId);

		if(isset($_POST['btnEdit'])) {
			$langId = intval($_POST['langId']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"sourceId" => $sourceId,
				"langId" => $langId,
				"title" => $title,
			]);

			$result = Source::setSourceDataById($sourceId, $params);
			$code = $result['code'];
			if($code != 200) $error = 'Не правильный пароль или логин';

			$msg = '<h5 id="delete" class="alert alert-success">Успешно изменено!</h5>';
		}

		if ($error != false ) header('Location: /logout');

		$sourceInfo = Source::getSourceById($sourceId);
		$langList = Language::getAllLanguage();


		require_once ROOT . '/views/admin/source/edit.php';
		return true;
	}
}