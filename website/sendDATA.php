<?php

$output = exec('python ./const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[6];
$password = $result[7];
$dbname = $result[4];

$Vorname = $_POST['Vorname'];
$Nachname = $_POST["Nachname"];
$Rolle = $_POST["Rolle"];
$email = $_POST["EMailAdresse"];
$kurzeBeschreibung = $_POST["kurzeBeschreibung"];
$Alt = $_POST["alt"];
$UserPassword = $_POST["password"];
$UserPasswordHash = password_hash($UserPassword, PASSWORD_DEFAULT);
$clearance = $_POST["clearance"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `employees` (`ID`, `Vorname`, `Zuname`, `Rolle`,`clearance`, `EMailAdresse`, `KurzeBeschreibung`, `alt`, `password`) VALUES (NULL, '" . $Vorname . "', '" . $Nachname . "', '" . $Rolle . "', '" . $clearance . "', '" . $email . "', '" . $kurzeBeschreibung . "', '" . $Alt . "', '" . $UserPasswordHash . "');";
$conn->query($sql);
header('Location: admin.php')

?>