<?php

$output = exec('python ./const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[6];
$password = $result[7];
$dbname = $result[4];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM `adminmessages` WHERE `adminmessages`.`ID` = " . $_GET["id"] . ";";
mysqli_query($conn, $sql);

header("Location: ./admin.php#adminMessagesTable")

    ?>