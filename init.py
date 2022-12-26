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
""")
f.close()

mycursor = mydb.cursor()


sql = "CREATE TABLE `" + dbDatabase + "`.`events` (`ID` TEXT NOT NULL , `EventName` TEXT NOT NULL , `Von` DATETIME NOT NULL , `Bis` DATETIME NOT NULL , `Beschreibung` LONGTEXT NOT NULL , `Bild` TEXT NOT NULL ) ENGINE = InnoDB;"
print(sql)
mycursor.execute(sql)

time.sleep(2)

print("Table created!")

print("Running EventSearch!")

subprocess.Popen(["python", "./website/getEvents.py"])

print("Installation Completet")
print("DELETING CONFIG FILES")

os.remove("init.py")
os.remove("README.md")