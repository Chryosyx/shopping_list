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

	// DELETE ITEM
	if ($_POST["action"] === "delete") {
		if (isset($_POST["id"])) {
			$sql = $mysqli->prepare("DELETE FROM item WHERE id=?");
			$sql->bind_param("i", $_POST["id"]);
			if ($sql->execute()) header("Location: index.php");
		}
	}

	// UPDATE ITEM
	if ($_POST["action"] === "update") {
		if (isset($_POST["id"]) && isset($_POST["value"]) && isset($_POST["name"])) {
			$name = $_POST['name'];
			$sql = $mysqli->prepare("UPDATE item SET $name=? WHERE id=?");
			$sql->bind_param("ii", $_POST["value"], $_POST["id"]);
			if ($sql->execute()) header("Location: index.php");
		}
	}
?>