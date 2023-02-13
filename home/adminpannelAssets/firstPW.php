<?php

session_start();

$output = exec('python ../const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[6];
$password = $result[7];
$dbname = $result[4];

$newPW = $_POST["inputPWFirstSetup"];
$newPWRep = $_POST["inputPWFirstSetupREP"];
$newPWHash = password_hash($newPW, PASSWORD_DEFAULT);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($newPW === $newPWRep) {
    $sql = "UPDATE `employees` SET `password` = '" . $newPWHash . "' WHERE `employees`.`EMailAdresse` = '" . $_SESSION["email"] . "';";
    $conn->query($sql);
    header('Location: ../admin.php');;
}



?>