<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="../stylesheet/help.css">
</head>

<body>
    <a class="btn-back" href="../user.php">
        < Zurück</a>
            </div>
            <div class="wrapper">
                <div class="title">
                    <h2>Kontaktiere einen Administrator!</h2>
                </div>
                <?php



                if (!isset($_GET["success"])) {
                    echo ('    
                    
                    <div class="form">
                    
                    <form class="contactAdminForm" action="contactSend.php" method="post">
        <label for="name">Voller Name: </label>
        <input type="text" name="name" id="email">
        <label for="email">EMail Adresse (Firmliche EMail):</label>
        <input type="email" name="email" id="email">
        <label for="nachricht">Nachricht:</label>
        <textarea wrap="hard" name="nachricht" id="nachricht" cols="30" rows="10"></textarea>
        <input type="submit" value="Absenden">
    </form>

                    </div>

                    ');

                    if (isset($_GET["error"])) {

                        echo ("<h4 style='margin-top: 10px; font-size: 1.5rem; color: red;'>E-Mail Adresse nicht in System.</h4>");
                    }
                } else {
                    echo ("Anfrage wurde verschickt");
                    echo ("<br><a href='./contact.php'>Neue Anfrage</a>");
                    exit;
                }

                ?>

            </div>

</body>

</html>