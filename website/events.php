<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="./stylesheet/index.css">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>

        <?php

        include("./header.php")

            ?>
    </header>

    <main>

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

        $sql = "SELECT ID, EventName , Von, Bis, Beschreibung, Bild FROM events";
        $result = $conn->query($sql);
        echo '<div class="eventsCards">';
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //inserte CARD DESIGN HERE
                // echo "BESCH: " . $row["Beschreibung"]. "<br>";
        
                echo '

                <div class="eventsCard">
                    <div class="EventsPictureDiv">
                        <img src="' . $row["Bild"] . '" class="enventsPictures">
                    </div>
                    <div class="backgroundCard">
                        <h1>' . $row["EventName"] . '</h1>
                        <p>' . $row["Beschreibung"] . '</p>
                        <div class="EventsAnchorDiv"><a class="EventsAnchor" href="https://tickets.kumscho.com/kumscho/' . $row["ID"] . '/"><p>Tickets Kaufen!</p></a></div>
                    </div>
                </div>
            
            ';
                //END OF CARD DESIGN
            }
        }
        $sql = "SELECT ID, Name, Beschreibung, Bild FROM old_events";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //inserte CARD DESIGN HERE
                // echo "BESCH: " . $row["Beschreibung"]. "<br>";
        
                echo '

                <div class="eventsCard old">
                    <div class="EventsPictureDiv">
                        <img src="' . $row["Bild"] . '" class="enventsPictures">
                    </div>
                    <div class="backgroundCard">
                        <h1>' . $row["Name"] . '</h1>
                        <div style="display: flex; width: 100%"><h3>Vergangenes Event</h3></div>
                        <p>' . $row["Beschreibung"] . '</p>
                        <div class="EventsAnchorDiv"><a class="EventsAnchor" href="https://tickets.kumscho.com/kumscho/' . $row["ID"] . '/"><p>Tickets Kaufen!</p></a></div>
                    </div>
                </div>
            
            ';
                //END OF CARD DESIGN
            }
        }
        $conn->close();
        echo '</div>'
            ?>

    </main>

    <footer>

        <?php

        include("./footer.php")

            ?>

    </footer>
</body>

</html>