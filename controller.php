<?php 
	include_once "db.php";
	
	// CREATE ITEM
	if ($_POST["action"] === "create") {
		if (isset($_POST["item_name"])) {
			$sql = $mysqli->prepare("INSERT INTO item (title) VALUE (?)");
			$sql->bind_param("s", $_POST["item_name"]);
			if ($sql->execute()) header("Location: index.php");
		}
	}
	if ($_POST["action"] === "delete") {
		if (isset($_POST["id"])) {
			$sql = $mysqli->prepare("DELETE FROM item WHERE id=?");
			$sql->bind_param("i", $_POST["id"]);
			if ($sql->execute()) header("Location: index.php");
		}
	}
?>