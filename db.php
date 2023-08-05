<?php

// show all errors
error_reporting(E_ALL);

$servername = "localhost";
$user = "root";
$password = "";
$database = "shopping_list";

$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Keine Verbindung möglich: " . $mysqli->connect_error);
} 

# Get Todos
function getTodos() : array {
    global $mysqli;

    $shopping_items = [];
    $result = $mysqli->query("SELECT * FROM item ORDER BY id DESC");
    if($result){
        while ($i = $result->fetch_object()) {
            $shopping_items[] = $i;
        }
        return $shopping_items;
    } else {
        return "es ist etwas schiefgelaufen";
    }
}

?>