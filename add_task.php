<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $conn->query("INSERT INTO tasks (title) VALUES ('$title')");
}

header('Location: index.php');
