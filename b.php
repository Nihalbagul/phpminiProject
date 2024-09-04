<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "phpq";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Name']) && isset($_POST['ID']) && isset($_POST['Email'])) {
    $name = $_POST['Name'];
    $user_id = $_POST['ID'];
    $email = $_POST['Email'];

   
    $stmt = $conn->prepare("INSERT INTO users (name, user_id, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $user_id, $email);


    if ($stmt->execute()) {
        echo "Record successfully inserted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: Missing required POST parameters (Name, ID, and/or Email).";
}

$conn->close();
?>
