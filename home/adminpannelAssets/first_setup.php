<div class="FirstSetupPW">

    <h1>Bitte ändern Sie ihr Passwort:</h1>
    <form id="firstSetupPWForm" class="firstSetupPWForm" action="./adminpannelAssets/firstPW.php" method="POST">
        <label for="inputPWFirstSetup">Passwort eingeben: </label>
        <input name="inputPWFirstSetup" id="inputPWFirstSetup" type="password">
        <label for="inputPWFirstSetupREP">Passwort wiederholen: </label>
        <input name="inputPWFirstSetupREP" id="inputPWFirstSetupREP" type="password">
        <p class="firstSetupPWShowButton" onclick="showPWFirstSetup()">Passwort Anzeigen</p>
        <button class="firstSetupPWShowButton">Absenden</button>
    </form>




    <script>

        const buttonPWFirstSetup = document.getElementById("showPSFirstSetup")
        const inputPWFirstSetup = document.getElementById("inputPWFirstSetup")
        let buttonSHOWPW = false

        function showPWFirstSetup() {
            if (buttonSHOWPW == false) {
                inputPWFirstSetup.setAttribute("type", "text")
                buttonSHOWPW = true
            } else {
                if (buttonSHOWPW == true) {
                    inputPWFirstSetup.setAttribute("type", "password")
                    buttonSHOWPW = false
                }
            }
        }

        const form = document.getElementById("firstSetupPWForm")

        function chanceColor(){
            form.style.background = #faf0e6
        }

    </script>
</div>