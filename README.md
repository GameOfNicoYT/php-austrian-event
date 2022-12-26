# Zuerst alles durchlesen, danach erst die init.py ausführen!!!

1. Datenbank
    1.1 Für den Server wird XAMPP verwendet. Setzte dazu XAMPP auf und clone das repo nach ./XAMPP/dashboard/ und starte zuerst Apache und danach MySQL im UI
    1.2 Lege eine Datenbank an mit beliebigen Namen indem du localhost/phpmyadmin in deine Suchmaschiene eingibst und danach die normalen SQL Schritte ienleitest.
    1.3 Lege danach die Zugriffsrechte für die SQL Datenbank wie folgt an:
        1.3.1: Benutzername: web;  Hostname: Beliebig (entweder % oder etwas anderes); Passwort: Ja (beliebig); Globle Rechte: SELECT; GRANT: Nein

2. Website
    2.1 Öffne die Datei "./init.py" und lasse die Software eine Tabelle Erstellen und alles Konfigurieren.
    2.2 Das getEvent.py script muss extern zum Server jeden Tag/Stunde/Minute geladen werden. Für dies kann auch Hilfe einbezogen werden.

3. Recht
    3.1 Hiermit erteilt der Besitzer dieses Codes teilrechte an Elias Mangold für seine Nutzung.
    3.2 Nutzung für andere ist nicht gestattet, ohne eine schriftliche Bestätigung mit einer registrierten RID (Rechnung Identifikation)
