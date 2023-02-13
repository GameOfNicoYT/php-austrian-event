<div class="actionsFlex">
    <form class="form" action="./addUser.php" method="post" enctype="multipart/form-data">
        <h4>Neue Staffmember hinzufügen:</h4>
        <label for="Vorname">Vorname:</label>
        <input type="text" name="Vorname" id="Vorname" required>
        <label for="Nachname">Nachname:</label>
        <input type="text" name="Nachname" id="Nachname" required>
        <label for="Rolle">Rolle:</label>
        <input type="text" name="Rolle" id="Rolle" required>
        <label for="clearance">Freigabestufe:</label>
        <input type="text" name="clearance" id="clearance" required>
        <label for="EMailAdresse">EMail: </label>
        <input type="email" name="EMailAdresse" id="EMailAdresse" required>
        <label for="kurzeBeschreibung">Kurze Beschreibung:</label>
        <input type="text" name="kurzeBeschreibung" id="kurzeBeschreibung" required>
        <label for="alt">Alternativ Text:</label>
        <input type="text" name="alt" id="alt" required>
        <button style="margin-top: 10px;" type="submit">Absenden</button>
    </form>


</div>
<div class="editUser">
    <?php

    $output = exec('python ./const/const.py');
    $result = json_decode($output, true);

    $servername = $result[0];
    $username = $result[6];
    $password = $result[7];
    $dbname = $result[4];

    $sql = "SELECT ID, Vorname, Zuname, Rolle, clearance, EMailAdresse, KurzeBeschreibung, alt FROM employees";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo ('
    
        <a href="./editUser.php?id=' . $row["ID"] . '" class="UserCard"><div class="UserCardCard">
        
        <img onerror="this.src=`./img/other_pfb.png`" id="imUserAdmin" src="./img/personen/' . $row["Vorname"] . '_' . $row["Zuname"] . '_pfb.png" >
        <h3>' . $row["Vorname"] . " " . $row["Zuname"] . '</h3>
        </div></a>
    
        ');
        }
    }

    ?>
</div>
<div id="passwordHash">
    <form action="./adminpannelAssets/hash.php" method="post">

        <label for="pw-no-hash">Passwort: </label>
        <?php

        if (isset($_GET["pw"])) {
            echo ('<input value="' . $_GET["pw"] . '" type="text" name="pw-no-hash" id="pw-no-hash">');
        } else {
            echo ('<input type="text" name="pw-no-hash" id="pw-no-hash">');
        }

        ?>
        <button type="submit">Konvertieren</button>
        <label for="pw-hash">Hash: </label>
        <?php

        if (isset($_GET["hash"])) {
            echo ('<input value="' . $_GET["hash"] . '" type="text" name="pw-hash" id="pw-hash" readonly>');
        } else {
            echo ('<input type="text" name="pw-hash" id="pw-hash" readonly>');
        }

        ?>
    </form>
    <button onclick="copy()">Kopieren</button>

    <script>
        function copy() {
            let text = document.getElementById("pw-hash");
            let textEdit = text.value
            console.log(textEdit)
            navigator.clipboard.writeText(textEdit)
        }
    </script>


</div>