<?php


class AdminMessageController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$messageList = Message::getAllMessage();

		require_once ROOT . '/views/admin/message/index.php';
		return true;
	}

	public function actionView($msgId) {

		self::checkAdmin();

		$msgId = intval($msgId);

		if(isset($_POST['btnEdit'])) {
			$messageId = intval($_POST['messageId']);
			$status = htmlspecialchars($_POST['status']);

			Message::setMessageStatusById($messageId, $status);

			$msg = '<h5 id="delete" class="alert alert-success">Успешно изменено!</h5>';
		}

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$msgInfo = Message::getMessageById($msgId);

		($msgInfo != false) ?: header('Location: /admin/message');

		require_once ROOT . '/views/admin/message/view.php';
		return true;
	}

}