<!DOCTYPE html>
<html style="overflow: hidden;" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./stylesheet/login.css">
</head>

<body>
    <main>
        <h1>Login:</h1>
        <form action="checkup.php" method="post">
            <label for="email">E-Mail-Adresse:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Passwort:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <?php

            if (isset($_GET["error"])) {
                echo ("<h3>Falsches Passwort</h3>");
            }

            ?>
            <input class="btn-login" type="submit" value="Anmelden">
        </form>
        <a class="pw-reset" href="./help/contact.php">Passwort Vergessen</a>
    </main>
</body>

</html>