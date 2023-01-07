<?php

$name = $_POST["name"];
$email = $_POST["email"];
$nachricht = $_POST["nachricht"];

$output = exec('python ../const/const.py');
$result = json_decode($output, true);

$servername = $result[0];
$username = $result[6];
$password = $result[7];
$dbname = $result[4];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT EMailAdresse FROM employees";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo ($row["EMailAdresse"] === $email);
    if ($row["EMailAdresse"] === $email) {
        $sql = "INSERT INTO `adminmessages` (`name`, `email`, `nachricht`, `bearbeitetVon`) VALUES ('" . $name . "', '" . $email . "', '" . $nachricht . "', '-');";
        $conn->query($sql);
        header("Location: ./contact.php?success=true");
    } else {
        header("Location: ./contact.php?error=true");
    }
}


?>