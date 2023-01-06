<?php
session_start();
session_destroy();
echo ($_SESSION["email"]);
header('Location: login.php');

?>