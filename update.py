import subprocess
from time import sleep

subprocess.run(["start", "C:/xampp/apache_start.bat"], shell=True)
subprocess.run(["start", "C:/xampp/mysql_start.bat"], shell=True)

sleep(5)

subprocess.Popen(["python", "website/getEvents.py"])
subprocess.Popen(["python", "website/getOldEvents.py"])