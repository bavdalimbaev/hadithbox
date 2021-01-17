<?php

class AdminController extends Helper
{
	public function actionIndex() {
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();

//		$books = Book::getAllBook();
//		$categories = Category::getAllCategory();
//		$hadiths = Hadith::getAllHadith();
//		$language = Language::getAllLanguage();

		require_once ROOT . '/views/admin/dashboard.php';
		return true;
	}
}