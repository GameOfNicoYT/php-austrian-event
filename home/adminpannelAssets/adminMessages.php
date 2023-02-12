<head>
    <link rel="stylesheet" href="../stylesheet/admin.css">
</head>




<div class="adminMessageCard">
    <h1>Support Tickets</h1>
    <div class="content">
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

        $sql = "SELECT * FROM `adminmessages`";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            echo "<table id='adminMessagesTable' class='adminMessagesTable'><tr><th>ID</th><th>EMail</th><th>Nachricht</th><th>Bearbeitet Von</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["email"] . "</td><td>" . $row["nachricht"] . "</td><td>" . $row["bearbeitetVon"] . "</td><td class='button'><a href='./claimTicket.php?ticketID=" . $row['ID'] . "&supMail=" . $_SESSION['email'] . "'><button>Ticket auf sich nehmen</button></a></td>   <td class='button'><a href='./closeTicket.php?id=" . $row["ID"] . "'><button>Ticket schließen</button></a></td></tr>";
            }

            echo "</table>";
        } else {
            echo "0 Offene Tickets";

        }



        echo '
</tbody>

</table>
';

        ?>
    </div>
</div>