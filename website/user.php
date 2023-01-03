<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/user.css">
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

<body><?php
$output = exec('python ./const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[2];
$password = $result[3];
$dbname = $result[4];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT Vorname, Zuname FROM employees WHERE EMailAdresse = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo ('
        
        <div class="Card">
        <img onerror="this.src=`./img/other_pfb.png`" class="imgUser" src="./img/personen/' . $row["Vorname"] . '_' .
            $row["Zuname"] . '_pfb.png" >
            <div class="options">
                <a href="./help/passwort-wechseln.php">Passwort Vergessen</a>
                <a href="./logout.php">Abmelden</a>
            </div>

        ');
    }
}

?>

    </div>

</body>

</html>