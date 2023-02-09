<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paswort wechseln</title>
</head>

<body>



    <form action="pwChance.php" method="post">

        <label for="oldPW">Altes Passwort:</label>
        <input type="password" name="oldPW" id="oldPW">
        <p onclick="clearPWOld()">Passwort anzeigen</p>
        <?php

        if (isset($_GET["err"])) {

            if ($_GET["err"] == "pw") {
                echo ("<p>Falsches Passwort</p>");
            }
        }

        ?>
        <label for="newPW">Neues Passwort:</label>
        <input type="password" name="newPW" id="newPW">
        <label for="newPWRep">Neues Passwort wiederholen:</label>
        <input type="password" name="newPWRep" id="newPWRep">
        <p onclick="clearPWNew()">Passwort anzeigen</p>
        <?php
        if (isset($_GET["err"])) {
            if ($_GET["err"] == "pwRep") {
                echo ("<p>Passwörter müssen überein stimmen.</p>");
            }
        }

        ?>

        <input type="submit" value="Absenden">

        <?php
        if (isset($_GET["success"])) {
            if (isset($_GET["success"])) {
                echo ("<p>Passwort geändert!</p>");
            }
        }

        ?>


    </form>

    <script>

        let pwOldType = "pw"
        let pwNewType = "txt"

        function clearPWOld() {

            if (pwOldType === "pw") {
                document.getElementById("oldPW").setAttribute("type", "text");
                pwOldType = "txt"
            } else if (pwOldType === "txt") {
                document.getElementById("oldPW").setAttribute("type", "password");
                pwOldType = "pw"
            }
        }
        function clearPWNew() {

            if (pwNewType == "pw") {
                document.getElementById("newPW").setAttribute("type", "text");
                document.getElementById("newPWRep").setAttribute("type", "text");
                pwNewType = "txt"
            } else if (pwNewType == "txt") {
                document.getElementById("newPW").setAttribute("type", "password");
                document.getElementById("newPWRep").setAttribute("type", "password");
                pwNewType = "pw"
            }
        }

    </script>


</body>

</html>