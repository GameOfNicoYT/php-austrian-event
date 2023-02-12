
import json

# Server

servername = "127.0.0.1"

# READ

dbHost = "localhost"
dbUser = "web"
dbPassword = "test"
dbDatabase = "testing"

# WRITE

Host = "localhost"
User = "root"
Password = "Unterrohr!264"
Database = "testing"

#EXTRA

arr = [servername, dbHost, dbUser, dbPassword, dbDatabase,Host, User, Password, Database]
print(json.dumps(arr))
