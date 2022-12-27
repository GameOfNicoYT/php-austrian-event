<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/index.css">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <title>event managemenatat seite geil</title>

</head>

<body>

    <header>

        <?php

        include("./header.php")

            ?>
    </header>

    <main>

        <div class="ourTeam">
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

            $sql = "SELECT Vorname, Zuname, Rolle, EMailAdresse, KurzeBeschreibung, alt FROM employees";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    //inserte CARD DESIGN HERE
            

                    echo '

                <div class="teamCard">
                    <div class="Card">
                        <img src="./img/personen/' . $row["Vorname"] . '_' . $row["Zuname"] . '_trans.png"
                            alt="' . $row["Vorname"] . $row["Zuname"] . ', ' . $row["alt"] . '.">
                        <div class="backgroundCard">
                            <h1>' . $row["Vorname"] .' '. $row["Zuname"] . '</h1>
                            <h3>' . $row["Rolle"] . '</h3>
                            <p>Mail: ' . $row["EMailAdresse"] . '</p>
                            <p style="margin-top: 10px;"> '. $row["KurzeBeschreibung"]. ' </p>
                        </div>
                    </div>
                </div>
        
                ';
                    //END OF CARD DESIGN
                }
            }
            $conn->close();
            echo '</div>'

                ?>
        </div>

    </main>

    <footer>

        <?php

        include("./footer.php")

            ?>

    </footer>


</body>

</html>