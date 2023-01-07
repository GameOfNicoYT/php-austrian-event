<?php
$Vorname = $_POST['Vorname'];
$Nachname = $_POST["Nachname"];
$Rolle = $_POST["Rolle"];
$clearance = $_POST["clearance"];
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
    <link rel="stylesheet" href="./stylesheet/login.css">
</head>

<body>



    <?php

    echo ('<form class="addUserForm" method="post" action="sendDATA.php">
<label class="label vorname" for="Vorname">Vorname:</label>
<input class="input vorname"type="text" name="Vorname" id="Vorname" value="' . $Vorname . '" readonly>
<label class="label nachname" for="Nachname">Nachname:</label>
<input class="input nachname"type="text" name="Nachname" id="Nachname" value="' . $Nachname . '" readonly>
<label class="label rolle" for="Rolle">Rolle:</label>
<input class="input rolle"type="text" name="Rolle" id="Rolle" value="' . $Rolle . '" readonly>
<label class="label email" for="EMailAdresse">EMail: </label>
<input class="input email"type="text" name="EMailAdresse" id="EMailAdresse" value="' . $email . '" readonly>
<label class="label kurzeBeschreibung" for="kurzeBeschreibung">Kurze Beschreibung:</label>
<input class="input kurzeBeschreibung"type="text" name="kurzeBeschreibung" id="kurzeBeschreibung" value="' . $kurzeBeschreibung . '" readonly>
<label class="label alt" for="alt">Alternativ Text:</label>
<input class="input alt"type="text" name="alt" id="alt" value="' . $Alt . '" readonly>
<label style="display: none;" for="clearance">Staff Level:</label>
<input style="display: none;" type="text" name="clearance" id="clearance" value="' . $clearance . '" readonly>


<p class="info">Daten Überprüfen und Passwort eingeben!<br> Keine Angst, das Passwort wird gehash.<br>Das heißt keiner sieht dein Passwort, sondern nur einen "Platzhalter"</p>

<label for="password">Passwort: </label>
<input id="inputPW" name="password" type="password">
<button class="FormButtonSend" >Weiter</button>
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