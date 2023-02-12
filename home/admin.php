<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-PANEL</title>
    <link rel="stylesheet" href="./stylesheet/login.css">
    <link rel="stylesheet" href="./stylesheet/admin.css">
</head>

<body>
    <div class="userHead">

        <?php

        session_start();

        // Wenn der Benutzer nicht angemeldet ist, das Login-Formular anzeigen
        if (!isset($_SESSION['logged_in'])) {
            // Anmeldung formular
            header('Location: login.php');
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

        $sql = 'SELECT Vorname, Zuname, clearance FROM employees WHERE EMailAdresse="' . $_SESSION['email'] . '"';

        $result = mysqli_query($conn, $sql);

        // Wenn der Benutzer angemeldet ist, den Rest der Seite anzeigen
        echo ('<div class="div-greeting"><h2 class="h2-greeting">' . 'Willkommen, ' . $_SESSION['email'] . "</h2></div>");

        while ($row = mysqli_fetch_assoc($result)) {
            echo ('<div class="div-image"><a href="./user.php"><img onerror="this.src=`./img/other_pfb.png`" class="imgUser" src="./img/personen/' . $row["Vorname"] . '_' . $row["Zuname"] . '_pfb.png" ></a></div>');

            echo ("</div>");
            if ($row["clearance"] <= 1) {
                include("./adminpannelAssets/admin.php");
                include("./adminpannelAssets/adminMessages.php");
            }
        }


        ?>
</body>
</html>