<?php
session_start();
require_once 'database.php';



$email = sanitize_input($_POST['email']);
$password = sanitize_input($_POST['password']);

$salt = '1a3b5c7d9e2f4g6';
$hashed_password = hash("sha256", $password . $salt);

$connection = new Connect();
$conn = $connection->getConnection();

$stmt = $conn->prepare("SELECT * FROM User WHERE Email=? AND Password=?");
$stmt->bind_param("ss", $email, $hashed_password);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();


    // echo "<script>localStorage.setItem('user_type', 'lala');localStorage.setItem('user_id', 'lolo');localStorage.setItem('logged_in', 'true')</script>";

    // $_SESSION['user_type'] = $row['User_Type'];
    // $_SESSION['user_id'] = $email;
    // $_SESSION['logged_in'] = true;


    echo "<script>document.write(localStorage.setItem('meme', 'lala'))</script>";

    header("Location: index.php");
    exit();
} else {
    header("Location: login.php?error=incorrect username or password");
    exit();
}

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
