<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

if (empty($name) || empty($email) || empty($message)) {
  die("All fields must be filled");
}


$host = "localhost";
$dbname = "leads_db";
$username = "root";
$password = "";
        

$conn = mysqli_connect( $host,
                        $username,
                        $password,
                        $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}    


$sql = "INSERT INTO leads (name, email, message)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sss",
                       $name,
                       $email,
                       $message);

mysqli_stmt_execute($stmt);

echo "Record saved.";

