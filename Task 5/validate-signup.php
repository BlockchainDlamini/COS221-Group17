<?php
require_once __DIR__ . '/database.php';
$dbs = new Connect;
$conn = $dbs->getConnection();
if (!$conn) {
    die("Error: Unable to connect to database");
} else {
    $sql = "SELECT Phone_Number, Email FROM User";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if (!$result) {
        die("SQL error: " . $dbs->errorInfo()[2]);
    } else {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["inputphonenumber"]) && $_POST["inputphonenumber"] === $result["Phone_Number"]) {
                die("Phone number is already is use");
            }
            if (isset($_POST["inputemail"]) && $_POST["inputemail"] === $result["Email"]) {
                die("Email is already in use");
            }
            if (empty($_POST["inputfirstname"])) {
                die("Name is required");
            }
            if (empty($_POST["inputsurname"])) {
                die("Surname is required");
            }
            if (empty($_POST["inputemail"])) {
                die("Email is required");
            }
            if (empty($_POST["inputpassword"])) {
                die("Password is required");
            }
            if (strlen($_POST["inputpassword"]) < 8) {
                die("Password is required to have atleast 8 characters");
            }
            if (!preg_match("/[a-z]/i", $_POST["inputpassword"])) {
                die("Password must contain at least one letter");
            }

            if (!preg_match("/[0-9]/", $_POST["inputpassword"])) {
                die("Password must contain at least one number");
            }
            if (empty($_POST["inputphonenumber"])) {
                die("Phone number is required");
            }
            if (empty($_POST["inputstreetaddress"])) {
                die("Address is required");
            }
            if (empty($_POST["inputprovice"])) {
                die("Province is required");
            }
            if (empty($_POST["inputpostalcode"])) {
                die("Postal Code is required");
            }
        }

    }
}
$salt = '1a3b5c7d9e2f4g6';
$password_hash = hash("sha256", $_POST["inputpassword"] . $salt);
$customer = "Customer";

$sql = "INSERT INTO User(First_Name, Last_Name, Phone_Number, Email, Street_Address, Province, Postal_Code, User_Type,Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
$stmt = $conn->prepare($sql);
$null = NULL;
if (!$stmt) {
    die("SQL error: " . $conn->error);
}
$stmt->bind_param("sssssssss", $_POST["inputfirstname"], $_POST["inputsurname"], $_POST["inputphonenumber"], $_POST["inputemail"], $_POST["inputstreetaddress"], $_POST["inputprovice"], $_POST["inputpostalcode"], $customer, $password_hash);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    $error = $conn->error;
    if ($error[1] === 1062) {
        die("Email already taken");
    } else {
        die($error);
    }
}
