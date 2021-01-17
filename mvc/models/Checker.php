<?php


class Checker
{
	public static function checkLogged() {
		if (isset($_SESSION['TOKEN'])!="") return 'admin';

		header("Location: /logout");
	}
}