<?php


class Message
{
	public static function getAllMessage() {
		$conn = Db::connect();
		$queryMessage = 'SELECT * FROM `messages` ORDER BY id DESC';
		$sqlMessage = $conn->query($queryMessage);
		$result = [];
		while ($row = $sqlMessage->fetch_assoc()) $result[] = $row;
		return $result;
	}

	public static function getMessageNotify() {
		$conn = Db::connect();
		$queryMessage = "SELECT * FROM `messages` WHERE status = 'WAITING' ORDER BY id DESC";
		$sqlMessage = $conn->query($queryMessage);
		$result = [];
		while ($row = $sqlMessage->fetch_assoc()) $result[] = $row;
		return $result;
	}

	public static function getMessageNotifyCount()
	{
		$conn = Db::connect();
		$queryMessage = "SELECT COUNT(id) as cnt FROM `messages` WHERE status = 'WAITING'";
		$sqlMessage = $conn->query($queryMessage);
		$rowMessage = mysqli_fetch_assoc($sqlMessage);
		return $rowMessage['cnt'];
	}

	public static function setMessageStatusById($msgId, $status) {
		$conn = Db::connect();
		$queryMessage = "UPDATE `messages` SET status = '$status' WHERE id = '$msgId'";
		$conn->query($queryMessage);
	}

	public static function getMessageById($msgId) {
		$conn = Db::connect();
		$queryMessage = "SELECT * FROM `messages` WHERE id = '$msgId'";
		$sqlMsg = $conn->query($queryMessage);
		if ($sqlMsg) $result = $sqlMsg->fetch_assoc();
		else $result = false;
		return $result;
	}

}