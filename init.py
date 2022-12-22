import mysql.connector
import time
import os

mydb = mysql.connector.connect(
  user= input("Bitte Username eingeben mit Admin berechtigung: "),
  host= input("Bitte Host eingeben: "),
  password= input("Passwort eingeben (Ansonst frei lassen) :"),
  database= input("Name der Datenbank eingeben: ")
)

dbUser = input("Bitte Username nur mit SELECT berechtigung eingeben: ")
dbHost = input("Bitte Host eingeben: ")
dbPassword = input("Passwort eingeben (Ansonst frei lassen) :")
dbDatabase = input("Name der Datenbank eingeben: ")

f = open("./website/const/const.py", "w")
f.write(f"""dbHost = "{dbHost}"
dbUser = "{dbUser}"
dbPassword = "{dbPassword}"
dbDatabase = "{dbDatabase}"
""")
f.close()

mycursor = mydb.cursor()

sql = "CREATE TABLE `rescue and tactical`.`events` (`ID` TEXT NOT NULL , `EventName` TEXT NOT NULL , `Von` DATETIME NOT NULL , `Bis` DATETIME NOT NULL , `Beschreibung` LONGTEXT NOT NULL , `Bild` TEXT NOT NULL ) ENGINE = InnoDB;"

mycursor.execute(sql)

time.sleep(2)

print("Table created!")
print("Installation Completet")
print("DELETING CONFIG FILES")

time.sleep(0.5)

os.remove("init.py")
os.remove("README.md")