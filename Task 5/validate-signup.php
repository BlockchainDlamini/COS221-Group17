<?php
require_once __DIR__ . '/Config.php';
$dbs = new Connect;
if (!$dbs) {
    die("Error: Unable to connect to database");
} else {
    $sql = "SELECT Phone_Number, Email FROM User";
    $stmt = $dbs->runSelectQuery($sql);
    if (!$stmt) {
        die("SQL error: " . $dbs->errorInfo()[2]);
    } else {
        if ($_POST["inputphonenumber"] === $stmt["Phone_Number"]) {
            die("Phone number is already is use");
        }
        if ($_POST["inputemail"] === $stmt["Email"]) {
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
        if (empty($_POST["inputusertype"])) {
            die("User Type is required");
        }
    }
}
$salt = '1a3b5c7d9e2f4g6';
$password_hash = hash("sha256", $password . $salt);

$db = new Connect;
if (!$db) {
    die("Error: Unable to connect to database.");
} else {
    $sql = "INSERT INTO User(First_Name, Last_Name, Phone_Number, Email,Street_Address, Province, Postal_Code, User_Type, Department,Password,Credientials,Preferences) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $db->prepare($sql);
    $null = NULL;
    if (!$stmt) {
        die("SQL error: " . $db->errorInfo()[2]);
    }
    $stmt->bind_param(1, $_POST["inputfirstname"]);
    $stmt->bind_param(2, $_POST["inputsurname"]);
    $stmt->bind_param(3, $_POST["inputphonenumber"]);
    $stmt->bind_param(4, $_POST["inputemail"]);
    $stmt->bind_param(5, $_POST["inputstreetaddress"]);
    $stmt->bind_param(6, $_POST["inputprovice"]);
    $stmt->bind_param(7, $_POST["inputpostalcode"]);
    $stmt->bind_param(8, $_POST["inputusertype"]);
    $stmt->bind_param(9, $null);
    $stmt->bind_param(10, $password_hash);
    $stmt->bind_param(11, $null);
    $stmt->bind_param(12, $null);
    if ($stmt->execute()) {
        header("Location:index.php");
        exit;
    } else {
        $error = $stmt->errorInfo();
        if ($error[1] === 1062) {
            die("Email already taken");
        } else {
            die($error[2]);
        }
    }
}
?>