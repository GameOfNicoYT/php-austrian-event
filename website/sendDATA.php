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
$image = $_POST["image"];

echo ($image);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `employees` (`ID`, `Vorname`, `Zuname`, `Rolle`,`clearance`, `EMailAdresse`, `KurzeBeschreibung`, `alt`, `password`) VALUES (NULL, '" . $Vorname . "', '" . $Nachname . "', '" . $Rolle . "', '" . $clearance . "', '" . $email . "', '" . $kurzeBeschreibung . "', '" . $Alt . "', '" . $UserPasswordHash . "');";
$conn->query($sql);

// Dateinamen und MIME-Typ des Bildes festlegen
$filename = 'bild.jpg';
$mimetype = 'image/jpeg';

// Bild als binäre Daten aus der Datei einlesen
$fp = fopen($filename, 'rb');
$image = fread($fp, filesize($filename));
fclose($fp);

// Binäre Daten und MIME-Typ in die Datenbank eintragen
$query = "INSERT INTO bilder (data, mimetype) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "bs", $image, $mimetype);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: admin.php')

?>