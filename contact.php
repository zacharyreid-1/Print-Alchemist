<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'printalchemist');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, 3307);

if ($conn->connect_error) {
    die('Connection Failed ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name_input'];
    $email = $_POST['email_input'];
    $mess = $_POST['message_input'];
    $query = $conn->prepare("INSERT INTO printalchemist (userName, userEmail, userMessage) VALUES (?, ?, ?)");
    $query->bind_param('sss', $name, $email, $mess);
    $query->execute();

    header("Location: submit.html");

    $conn->close();
}
?>