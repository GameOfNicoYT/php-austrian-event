# Zuerst alles durchlesen, danach erst die init.py ausführen!!!

1. Datenbank
    1.1Für den Server wird XAMPP verwendet.
    1.2 Lege eine Datenbank an mit beliebigen Namen.
    1.3 Lege danach die Zugriffsrechte für die SQL Datenbank wie folgt an:
        1.3.1: Benutzername: web;  Hostname: Beliebig (entweder % oder etwas anderes); Passwort: Ja (beliebig); Globle Rechte: SELECT; GRANT: Nein

2. Website
    2.1 Öffne die Datei "./init.py" und lasse die Software eine Tabelle Erstellen und alles Konfigurieren.
    2.2 Die getEvent.py muss jeden Tag/Stunde/Minute (Wie gewunscht) durch ein Bootscript ausgeführt werden.