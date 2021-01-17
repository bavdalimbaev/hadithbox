<?php


class SignController extends Helper
{
//	private $userIp;
//
//	public function __construct()
//	{
//		$this->userIp = $_SERVER['REMOTE_ADDR'];
//	}
	public function actionIndex()
	{
		if(!isset($_SESSION['CSRF'])) $_SESSION['CSRF'] = bin2hex(random_bytes(32));

		$error = false;

		if(isset($_SESSION['TOKEN'])!=""):
			header("Location: /admin/dashboard");
		endif;

		if (isset($_POST['authUser'])) {

			$username = htmlspecialchars($_POST['login']);
			$password = htmlspecialchars($_POST['password']);
			$csrf = htmlspecialchars($_POST['check']);

			if ($_SESSION['CSRF'] != $csrf) $error = 'Не правильный пароль или логин';

			if(empty($error) && !empty($username) && !empty($password)) {

				$url = URL . '/api/auth/signin';
				$params = json_encode([
					"password" => $password,
					"username" => $username,
				]);
				$headers = ['Content-Type: application/json'];

				$result = self::curl($url, $params, $headers);
				$code = $result['code'];
				if($code != 200) $error = 'Не правильный пароль или логин';
			}

			if ($error === false && !empty($result['token'])) {
				$_SESSION['TOKEN'] = $result['token'];
				header('Location: /admin/dashboard');
			}
		}

		require_once(ROOT . '/views/admin/index.php');
		return true;
	}

	public function actionLogout()
	{
		session_destroy();
		header("Location: /");
	}
}