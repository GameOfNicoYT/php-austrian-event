<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    // Anmeldung formular
    header('Location: login.html');
    exit;
}

echo ("<title>Hi, " . $_SESSION["email"] . "</title>");

?>
</head>
<body>
<a href="Logout.php">Abmelden</a>
</body>
</html>