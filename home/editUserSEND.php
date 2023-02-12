<?php

session_start();

$output = exec('python ./const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[6];
$password = $result[7];
$dbname = $result[4];

$UserID = $_POST["ID"];
$UserVorname = $_POST['Vorname'];
$UserNachname = $_POST["Nachname"];
$UserRolle = $_POST["Rolle"];
$UserClearance = $_POST["clearance"];
$UserEmail = $_POST["EMailAdresse"];
$UserKurzeBeschreibung = $_POST["kurzeBeschreibung"];
$UserAlt = $_POST["alt"];
$AdminPW = $_POST["AdminPW"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM employees WHERE EMailAdresse = '" . $_SESSION["email"] . "';";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $AdminPWdbHash = $row["password"];
}

if (password_verify($AdminPW, $AdminPWdbHash)) {
    $sql = "UPDATE `employees` SET `ID` = '" . $UserID . "', `Vorname` = '" . $UserVorname . "', `Zuname` = '" . $UserNachname . "', `Rolle` = '" . $UserRolle . "', `clearance` = '" . $UserClearance . "', `EMailAdresse` = '" . $UserEmail . "', `KurzeBeschreibung` = '" . $UserKurzeBeschreibung . "', `alt` = '" . $UserAlt . "' WHERE `employees`.`ID` = " . $UserID . "";
    $conn->query($sql);
    header("Location: ./editUser.php?success=True");
} else {
    header("Location: ./editUser.php?id=" . $UserID . "&error=True");
}
?>