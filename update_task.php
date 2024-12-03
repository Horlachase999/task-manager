<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $conn->query("UPDATE tasks SET status = 'completed' WHERE id = $id");
}

header('Location: index.php');
