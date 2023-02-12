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

conn.request("GET", "/events", payload)

res = conn.getresponse()
data = res.read()

parse = json.loads(data)

mycursor = mydb.cursor()

lenght = len(parse)

value = 0

sql = "DELETE FROM events"

mycursor.execute(sql)

print("------------------------------ [START EVENTS] ----------------------------")


def getDATA(token):
    id = parse[token]["slug"]
    EventName = json.loads(parse[token]["name"])["de"]
    dateFrom = parse[token]["date_from"][:-1]
    dateTo = parse[token]["date_to"][:-1]
    description = json.loads(parse[token]["event_description"])["de"]

    spliter = "<strong>"
    splitertwo = "</strong>"

    split_text = description.split(splitertwo)
    description = split_text[0]


    split_text = description.split(spliter)
    descriptionFinish = spliter.join(split_text[1:])

    print(descriptionFinish)

    url = "https://tickets.kumscho.com/" + parse[token]["logo_imageurl"]

    arr = [id, EventName, dateFrom, dateTo, descriptionFinish, url]

    sql = "INSERT INTO events (ID, EventName, Von, Bis, Beschreibung, Bild) VALUES (%s, %s, %s, %s, %s, %s)"

    val = (arr[0], arr[1], arr[2], arr[3], arr[4], arr[5])

    mycursor.execute(sql, val)


    mydb.commit()


    print("ID: " + arr[0])
    print("Name: " + arr[1])
    print("dateFrom: " + arr[2])
    print("dateTo: " + arr[3])
    print("Beschreibung: " + arr[4])
    print("url: " + arr[5])
    



for x in parse:
    if lenght > 0:
        print("------------------------------------------------")
        getDATA(value)
        print("------------------------------------------------")
        value = value + 1
        lenght = lenght - 1

print("---------------------------- [END EVENTS] ---------------------------- ")
print("Code executed and ended with code [0]")
