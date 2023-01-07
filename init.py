import mysql.connector
import time
import os
import subprocess

print("Zuerst werden die Admin Daten benötigt, um die Tabelle zu erstellen. Stelle sicher, dass dieser User Admin (Alle Berechtigungen) hat.")

servername = input("Bitte Servername eingeben (IP-Adresse): ")
user= input("Bitte Username eingeben mit Admin berechtigung: ")
host= input("Bitte Host eingeben: ")
password= input("Passwort eingeben (Ansonst frei lassen): ")
database= input("Name der Datenbank eingeben: ")

mydb = mysql.connector.connect(
  user = user,
  host = host,
  password = password,
  database = database
)
print("Als nächstes muss ein user mit SELECT berechtigung eingegeben werden, um SQL Injections vorzubeugen.")
dbUser = input("Bitte Username nur mit SELECT berechtigung eingeben: ")
dbHost = input("Bitte Host eingeben: ")
dbPassword = input("Passwort eingeben (Ansonst frei lassen) :")
dbDatabase = input("Name der Datenbank eingeben: ")

f = open("./website/const/const.py", "w")
f.write(f"""
import json

# Server

servername = "{servername}"

# READ

dbHost = "{dbHost}"
dbUser = "{dbUser}"
dbPassword = "{dbPassword}"
dbDatabase = "{dbDatabase}"

# WRITE

Host = "{host}"
User = "{user}"
Password = "{password}"
Database = "{database}"

#EXTRA

arr = [servername, dbHost, dbUser, dbPassword, dbDatabase,Host, User, Password, Database]
print(json.dumps(arr))
""")
f.close()

mycursor = mydb.cursor()


sql = "CREATE TABLE `" + dbDatabase + "`.`events` (`ID` TEXT NOT NULL , `EventName` TEXT NOT NULL , `Von` DATETIME NOT NULL , `Bis` DATETIME NOT NULL , `Beschreibung` LONGTEXT NOT NULL , `Bild` TEXT NOT NULL ) ENGINE = InnoDB;"
mycursor.execute(sql)
sql = "CREATE TABLE `"+ dbDatabase +"`.`employees` (`ID` INT NOT NULL AUTO_INCREMENT , `Vorname` TEXT NOT NULL , `Zuname` TEXT NOT NULL , `Rolle` TEXT NOT NULL , `clearance` TEXT NOT NULL, `EMailAdresse` TEXT NOT NULL , `KurzeBeschreibung` TEXT NOT NULL ,`alt` TEXT NOT NULL, `password` TEXT NOT NULL, PRIMARY KEY (`ID`)) ENGINE = InnoDB;"
mycursor.execute(sql)
sql = "CREATE TABLE `" + dbDatabase + "`.`old_events` (`ID` TEXT NOT NULL , `EventName` TEXT NOT NULL , `Beschreibung` LONGTEXT NOT NULL , `Bild` TEXT NOT NULL ) ENGINE = InnoDB;"
mycursor.execute(sql)
sql = "INSERT INTO `employees` (`ID`, `Vorname`, `Zuname`, `Rolle`, `EMailAdresse`, `Kurze Beschreibung`, `password`) VALUES ('1', 'Andre', 'Kaufmann', 'CEO' 'andre.kaufmann@domain.tld', 'ANDRE', '$2y$10$Oa33WEy4/l3Sa9kzWlkE2.Qcni/NDigAhbxmokNdg0O61B2yPn0jq/')"
mycursor.execute(sql)
sql = "CREATE TABLE `" + dbDatabase + "`.`clearance` (`ID` INT NOT NULL , `TEXT` TEXT NOT NULL , `Beschreibung` TEXT NOT NULL ) ENGINE = InnoDB;"
mycursor.execute(sql)
sql = "INSERT INTO `clearance` (`ID`, `TEXT`, `Beschreibung`) VALUES ('0', 'CEO', 'Chief Executive Office, kurz: Chef'), ('1', 'dbAdmin', 'Datenbank Administration'), ('3', 'Staff', 'Mitarbeiter ohne Datenveränderungsrechte.');"
mycursor.execute(sql)
sql = "CREATE TABLE `" + dbDatabase +"`.`adminmessages` (`ID` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `email` TEXT NOT NULL , `nachricht` LONGTEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;"
mycursor.execute(sql)
time.sleep(2)

print("Table created!")

print("Please copy the httpd.conf file, and replace it with the C:/xampp/apache/conf/httpd.conf file")

def check():
    done = input("Fertig? (Y Yes /N No)")

    if(done == "Y"):
        return
    else:
        print("Du MUSST die Datei jetzt austauschen!")
        check()
    
check()

os.replace("C:/xampp/apache/conf/httpd.conf", "/httpd.conf")

time.sleep(3)

print("Running EventSearch!")

subprocess.Popen(["python", "./website/getEvents.py"])

print("Installation Completet")
print("DELETING CONFIG FILES")

time.sleep(1)

os.remove("init.py")
os.remove("README.md")

if(os.path.exists("/httpd.conf")):
    os.remove("httpd.conf")