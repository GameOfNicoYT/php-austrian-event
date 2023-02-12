<?php

$pw = $_POST["pw-no-hash"];

$pwHash = password_hash($pw, PASSWORD_DEFAULT);

header("Location: ../admin.php?pw=$pw&hash=$pwHash/#passwordHash")

?>