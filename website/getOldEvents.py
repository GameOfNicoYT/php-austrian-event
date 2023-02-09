import http.client
import json
import mysql.connector
from const import const

mydb = mysql.connector.connect(
  host= const.Host,
  user= const.User,
  password= const.Password,
  database= const.Database
)

print(mydb)

conn = http.client.HTTPSConnection("api.kumscho.com")

payload = ""

conn.request("GET", "/pastevents", payload)

res = conn.getresponse()
data = res.read()

parse = json.loads(data)

mycursor = mydb.cursor()

lenght = len(parse)

value = 0

sql = "DELETE FROM old_events"

mycursor.execute(sql)

print("------------------------------ [START EVENTS] ----------------------------")


def getOldDATA(token):
    id = json.loads(parse[token]["name"])["de"].lower().replace(" ", "-").replace('"', '')
    EventName = json.loads(parse[token]["name"])["de"]
    description = json.loads(parse[token]["event_description"])["de"]
    url = "https://tickets.kumscho.com/" + parse[token]["logo_imageurl"]

    arr = [id, EventName, description, url]

    sql = "INSERT INTO old_events (ID, Name, Beschreibung, Bild) VALUES (%s, %s, %s, %s)"

    val = (arr[0], arr[1], arr[2], arr[3])

    mycursor.execute(sql, val)


    mydb.commit()


    print("ID: " + arr[0])
    print("Name: " + arr[1])
    print("Beschreibung: " + arr[2])
    print("url: " + arr[3])
    



for x in parse:
    if lenght > 0:
        print("------------------------------------------------")
        getOldDATA(value)
        print("------------------------------------------------")
        value = value + 1
        lenght = lenght - 1

print("---------------------------- [END EVENTS] ---------------------------- ")
print("Code executed and ended with code [0]")
