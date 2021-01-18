<?php

class AdminController extends Helper
{
	public function actionIndex() {
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();

		require_once ROOT . '/views/admin/dashboard.php';
		return true;
	}
}