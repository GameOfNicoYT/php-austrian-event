<?php

session_start();

$output = exec('python ../const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[6];
$password = $result[7];
$dbname = $result[4];

$oldPW = $_POST["oldPW"];
$newPW = $_POST["newPW"];
$newPWRep = $_POST["newPWRep"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password, EMailAdresse FROM employees WHERE `employees`.`EMailAdresse` = '" . $_SESSION["email"] . "'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        

        if ($newPW === $newPWRep) {
            if (password_verify($oldPW, $user['password'])) {
                $newPWHash = password_hash($newPW, PASSWORD_DEFAULT);
                $sql = "UPDATE `employees` SET `password` = '" . $newPWHash . "' WHERE `employees`.`EMailAdresse` = '" . $_SESSION["email"] . "';";
                $conn->query($sql);
                header("Location: ../logout.php");
            } else {
                header("Location: passwort-wechseln.php?err=pw");
            }

        }
        else{
            header("Location: passwort-wechseln.php?err=pwRep");
        }

    }
}

?>