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
    <div class="admin-wrapper">
        <div class="userHead">
            <?php

            session_start();

            // Wenn der Benutzer nicht angemeldet ist, das Login-Formular anzeigen
            if (!isset($_SESSION['logged_in'])) {
                // Anmeldung formular
                header('Location: login.html');
                exit;
            }

            $output = exec('python ./const/const.py');
            $result = json_decode($output, true);

            $servername = $result[0];
            $username = $result[2];
            $password = $result[3];
            $dbname = $result[4];

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = 'SELECT Vorname, Zuname FROM employees WHERE EMailAdresse="' . $_SESSION['email'] . '"';

            $result = mysqli_query($conn, $sql);

            // Wenn der Benutzer angemeldet ist, den Rest der Seite anzeigen
            echo ('<h2 id="h2-greeting" >' . 'Willkommen, ' . $_SESSION['email'] . "</h2>");

            while($row = mysqli_fetch_assoc($result)) {
                echo ('<img class="imgUser" src="./img/personen/' . $row["Vorname"] . '_' . $row["Zuname"] . '_trans.png">');
            }


                ?>



        </div>
        <form class="form" action="./addUser.php" method="post">
            <h4>Neue Staffmember hinzufügen:</h4>
            <label for="Vorname">Vorname:</label>
            <input type="text" name="Vorname" id="Vorname">
            <label for="Nachname">Nachname:</label>
            <input type="text" name="Nachname" id="Nachname">
            <label for="Rolle">Rolle:</label>
            <input type="text" name="Rolle" id="Rolle">
            <label for="clearance">Freigabestufe:</label>
            <input type="text" name="clearance" id="clearance">
            <label for="EMailAdresse">EMail: </label>
            <input type="email" name="EMailAdresse" id="EMailAdresse">
            <label for="kurzeBeschreibung">Kurze Beschreibung:</label>
            <input type="text" name="kurzeBeschreibung" id="kurzeBeschreibung">
            <label for="alt">Alternativ Text:</label>
            <input type="text" name="alt" id="alt">
            <button style="margin-top: 10px;" type="submit">Absenden</button>
        </form>
        <a href="Logout.php">Abmelden</a>
    </div>
</body>

</html>