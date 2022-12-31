<?php
$Vorname = $_POST['Vorname'];
$Nachname = $_POST["Nachname"];
$Rolle = $_POST["Rolle"];
$email = $_POST["EMailAdresse"];
$kurzeBeschreibung = $_POST["kurzeBeschreibung"];
$Alt = $_POST["alt"];





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

    <?php

    echo ('<form method="post" action="sendDATA.php">
<label for="Vorname">Vorname:</label>
<input type="text" name="Vorname" id="Vorname" value="' . $Vorname . '" readonly>
<label for="Nachname">Nachname:</label>
<input type="text" name="Nachname" id="Nachname" value="' . $Nachname . '" readonly>
<label for="Rolle">Rolle:</label>
<input type="text" name="Rolle" id="Rolle" value="' . $Rolle . '" readonly>
<label for="EMailAdresse">EMail: </label>
<input type="text" name="EMailAdresse" id="EMailAdresse" value="' . $email . '" readonly>
<label for="kurzeBeschreibung">Kurze Beschreibung:</label>
<input type="text" name="kurzeBeschreibung" id="kurzeBeschreibung" value="' . $kurzeBeschreibung . '" readonly>
<label for="alt">Alternativ Text:</label>
<input type="text" name="alt" id="alt" value="' . $Alt . '" readonly>

<p>Daten Überprüfen und Passwort eingeben!</p>

<label for="password">Passwort: </label>
<input id="inputPW" name="password" type="password">
<button>Weiter</button>
<a onclick="pwswitch()" href="#">Passwort anzeigen</a>

</form>

')

        ?>


    <script>

        let pwhide = true

        function pwswitch() {
            if (pwhide) {
                let input = document.getElementById("inputPW")
                input.setAttribute("type", "text")
                pwhide = false
                return 0
            }
            if (!pwhide) {
                let input = document.getElementById("inputPW")
                input.setAttribute("type", "password")
                pwhide = true
                return 0
            }

        }

    </script>

</body>

</html>