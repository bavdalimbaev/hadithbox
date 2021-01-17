<?php


class AdminBookController extends Helper
{
	public function actionIndex()
	{
		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();

		if(isset($_POST['btnAdd'])) {
			$langId = intval($_POST['langId']);
			$author = htmlspecialchars($_POST['author']);
			$description = htmlspecialchars($_POST['description']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"langId" => $langId,
				"author" => $author,
				"description" => $description,
				"title" => $title,
			]);

			$result = Book::addBookData($params);
			$code = $result['code'];

			($code != 200) ? header('Location: /logout') : header('Location: /admin/book');
		}

		$bookList = Book::getAllBook();
		$langList = Language::getAllLanguage();

		require_once ROOT . '/views/admin/book/index.php';
		return true;
	}

	public function actionEdit($bookId) {

		self::checkAdmin();

		$messageNotify = Message::getMessageNotify();
		$messageNotifyCount = Message::getMessageNotifyCount();
		$error = false;
		$bookId = intval($bookId);

		if(isset($_POST['btnEdit'])) {
			$langId = intval($_POST['langId']);
			$author = htmlspecialchars($_POST['author']);
			$description = htmlspecialchars($_POST['description']);
			$title = htmlspecialchars($_POST['title']);

			$params = json_encode([
				"langId" => $langId,
				"author" => $author,
				"description" => $description,
				"title" => $title,
			]);

			$result = Book::setBookDataById($bookId, $params);
			$code = $result['code'];
			if($code != 200) $error = 'Не правильный пароль или логин';

			$msg = '<h5 id="delete" class="alert alert-success">Успешно изменено!</h5>';
		}

		if ($error != false ) header('Location: /logout');

		$bookInfo = Book::getBookById($bookId);
		$langList = Language::getAllLanguage();


		require_once ROOT . '/views/admin/book/edit.php';
		return true;
	}
}