# Import required Python libraries
import RPi.GPIO as GPIO
import os
import time
import MySQLdb

# Use BCM GPIO references
# instead of physical pin numbers
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
# Define GPIO to use on Pi
GPIO_LED = 4
GPIO_PIR = 7

print "PIR Module Test (CTRL-C to exit)"

# Set pin as input
GPIO.setup(GPIO_LED,GPIO.OUT)
GPIO.setup(GPIO_PIR,GPIO.IN)      # Echo
Current_State = 0
Previous_State = 0

def mySql_Con():
  db = MySQLdb.connect(host="140.138.77.98", user="bigdata_team04", passwd="284gj4rm42l3xjp4", db="2016_bigdata_team04")
  cursor = db.cursor()
  # excute SQL 
  cur_time = time.strftime("%Y-%m-%d %H:%M:%S")
  data_form ={cur_time}
  insert_stmt = "INSERT INTO DataCollection (Rasp_ID, Data_time, Data_humidity, Data_centigrade, Data_vibration) VALUES ('A01', %s, 10, 10, 10)"
  cursor.execute(insert_stmt, data_form)
  select_stmt = "SELECT * FROM DataCollection"
  cursor.execute(select_stmt)
  result = cursor.fetchall()
  # output result
  for record in result:
      print (record)
  cursor.close()
  db.close()

try:
 
  print "Waiting for PIR to settle ..."
 
  # Loop until PIR output is 0
  while GPIO.input(GPIO_PIR)==1:
    Current_State  = 0
 
  print "  Ready"
 
  # Loop until users quits with CTRL-C
  while True :
 
    # Read PIR state
    Current_State = GPIO.input(GPIO_PIR)
 
    if Current_State==1 and Previous_State==0:
      # PIR is triggered
      print "  Motion detected!"
      #If Motion detected, light up the LED
      for i in range(10):
        GPIO.output(4,1)
        time.sleep(0.2)
        GPIO.output(4,0)
        time.sleep(0.2)
      os.system("python Trans_DHT.py 11 17")
      # mySql_Con()
      # Record previous state
      Previous_State=1
    elif Current_State==0 and Previous_State==1:
      # PIR has returned to ready state
      print "  Ready"
      Previous_State=0
 
    # Wait for 10 milliseconds
    time.sleep(0.01)
 
except KeyboardInterrupt:
  print "  Quit"
  # Reset GPIO settings
  GPIO.cleanup()


