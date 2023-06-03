<?php
    session_start();
    require_once 'config.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);

        $salt = '1a3b5c7d9e2f4g6';
        $hashed_password = hash("sha256", $password . $salt);

        $connection = new Connect();
        $conn = $connection->conn;

        $stmt = $conn->prepare("SELECT * FROM User WHERE Email=? AND 'Password'=?");
        $stmt->bind_param("ss", $email, $hashed_password); 
        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $email;
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=incorrect username or password");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }

    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>