<?php

$output = exec('python ./const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[2];
$password = $result[3];
$dbname = $result[4];

// Verbindung mit der Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Eingaben aus dem Formular auslesen
$email = $_POST['email'];
$password = $_POST['password'];

// Benutzerdaten aus der Datenbank abrufen
$result = mysqli_query($conn, "SELECT * FROM employees WHERE EMailAdresse='$email'");
$user = mysqli_fetch_assoc($result);

// Passwort vergleichen
if (password_verify($password, $user['password'])) {
  // Anmeldung erfolgreich
  session_start();
  $_SESSION['logged_in'] = true;
  $_SESSION['email'] = $email;
  header('Location: admin.php');
  exit;
} else {
  // Anmeldung fehlgeschlagen
  echo 'Falsche E-Mail-Adresse oder Passwort';
}

// Verbindung mit der Datenbank schließen
mysqli_close($conn);
?>
