# Zuerst alles durchlesen, danach erst die init.py ausführen!!!

1. Datenbank
    1.1 Für den Server wird XAMPP verwendet. Setzte dazu XAMPP auf und clone das repo nach ./XAMPP/htdocs/ und starte zuerst Apache und danach MySQL im UI
    1.2 Lege eine Datenbank an mit beliebigen Namen indem du localhost/phpmyadmin in deine Suchmaschiene eingibst und danach die normalen SQL Schritte einleitest.
    1.3 Lege danach die Zugriffsrechte für die SQL Datenbank wie folgt an:
        1.3.1: Benutzername: web;  Hostname: Beliebig (entweder % oder etwas anderes); Passwort: Ja (beliebig); Globle Rechte: SELECT; GRANT: Nein

2. Website
    2.1 Öffne die Datei "./init.py" und lasse die Software eine Tabelle Erstellen und alles Konfigurieren.
    2.2 Das getEvent.py script muss extern zum Server jeden Tag/Stunde/Minute geladen werden. Für dies kann auch Hilfe einbezogen werden.

3. Feinschliff
    3.1 Vergewisse dich, dass nach dem ausführen der init.py die Datei update.py in einem anderem Verzeichniss ist, am besten am Desktop. Schau auch, dass alle elemente des website Ordners jetzt im Verzeichniss C:/XAMMP/htdocs/[INHALT DES Website Ordners] sind. ACHTUNG! DER WEBSITE ORDNER MUSS GELÖSCHT SEIN!

4. Recht
    4.1 Hiermit erteilt der Besitzer dieses Codes teilrechte an Elias Mangold für seine Nutzung.
    4.2 Nutzung für andere ist nicht gestattet, ohne eine schriftliche Bestätigung mit einer registrierten RID (Rechnung Identifikation)

5. Hilfe
    5.1 Wenn du dir unsicher bist Kontaktiere mich per mail oder privat; mail: info@nicoproyer.at; discord: GameOfNicoYT#0420