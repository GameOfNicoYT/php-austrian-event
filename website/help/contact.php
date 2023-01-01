<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contakt</title>
</head>

<body>

    <?php



    if (!isset($_GET["done"])) {
        echo ('    <form action="contactSend.php" method="post">
        <label for="name">Voller Name: </label>
        <input type="text" name="name" id="email">
        <label for="email">EMail Adresse (Firmliche EMail):</label>
        <input type="email" name="email" id="email">
        <label for="nachricht">Nachricht:</label>
        <input type="text" name="nachricht" id="nachricht">
        <input type="submit" value="Absenden">
    </form>');
    } else {
        echo ("Anfrage wurde verschickt");
        echo ("<br><a href='../contact.php'>Neue Anfrage</a>");
        exit;
    }

    ?>

</body>

</html>