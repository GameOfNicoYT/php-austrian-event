<?php

session_start();

// Wenn der Benutzer nicht angemeldet ist, das Login-Formular anzeigen
if (!isset($_SESSION['logged_in'])) {
    // Anmeldung formular
    header('Location: login.html');
    exit;
}

// Wenn der Benutzer angemeldet ist, den Rest der Seite anzeigen
echo 'Willkommen, ' . $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-PANEL</title>
</head>
<body>
    <form action="./addUser.php" method="post">
        <label for="Vorname">Vorname:</label>
        <input type="text" name="Vorname" id="Vorname">
        <label for="Nachname">Nachname:</label>
        <input type="text" name="Nachname" id="Nachname">
        <label for="Rolle">Rolle:</label>
        <input type="text" name="Rolle" id="Rolle">
        <label for="EMailAdresse">EMail: </label>
        <input type="text" name="EMailAdresse" id="EMailAdresse">
        <label for="kurzeBeschreibung">Kurze Beschreibung:</label>
        <input type="text" name="kurzeBeschreibung" id="kurzeBeschreibung">
        <label for="alt">Alternativ Text:</label>
        <input type="text" name="alt" id="alt">
        <button type="submit">Absenden</button>
    </form>
</body>
</html>


<?php

echo '<br><a href="Logout.php">Abmelden</a>';

?>