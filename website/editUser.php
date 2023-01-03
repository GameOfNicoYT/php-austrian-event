<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <?php

    $output = exec('python ./const/const.py');
    $result = json_decode($output, true);

    $servername = $result[0];
    $username = $result[2];
    $password = $result[3];
    $dbname = $result[4];



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_GET["id"])) {
        header("Location: admin.php");
    }

    $sql = "SELECT * FROM `employees` WHERE `ID` =" . $_GET["id"];
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo ('    
        <form class="form" action="./editUserSEND.php" method="post">
        <label for="ID">ID:</label>
        <input type="text" name="ID" id="ID" value="' . $row["ID"] . '">
        <label for="Vorname">Vorname:</label>
        <input type="text" name="Vorname" id="Vorname" value="' . $row["Vorname"] . '">
        <label for="Nachname">Nachname:</label>
        <input type="text" name="Nachname" id="Nachname" value="' . $row["Zuname"] . '">
        <label for="Rolle">Rolle:</label>
        <input type="text" name="Rolle" id="Rolle" value="' . $row["Rolle"] . '">
        <label for="clearance">Freigabestufe:</label>
        <input type="text" name="clearance" id="clearance" value="' . $row["clearance"] . '">
        <label for="EMailAdresse">EMail: </label>
        <input type="email" name="EMailAdresse" id="EMailAdresse" value="' . $row["EMailAdresse"] . '">
        <label for="kurzeBeschreibung">Kurze Beschreibung:</label>
        <input type="text" name="kurzeBeschreibung" id="kurzeBeschreibung" value="' . $row["KurzeBeschreibung"] . '">
        <label for="alt">Alternativ Text:</label>
        <input type="text" name="alt" id="alt" value="' . $row["alt"] . '">
        <button style="margin-top: 10px;" type="submit">Absenden</button>
        </form>'

        );
    }






    ?>
</body>

</html>