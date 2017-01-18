import time, smtplib, requests
import RPi.GPIO as GPIO
import datetime

phoneNumber = 0
mailAddress = ""

codes = ["3625"]

ALARMCRAZY = 0
ALARMFANCY = 1
ALARMWILD = 2
ACTIVATETIME = 5

activateTime = ACTIVATETIME
mode = ALARMCRAZY
alarmActive = False

def alarmWild():
    GPIO.output(17,1)
    GPIO.output(27,0)
    time.sleep(0.05)
    GPIO.output(17,1)
    GPIO.output(27,0)
    time.sleep(0.05)

def alarmCrazy():
    GPIO.output(17,0)
    GPIO.output(27,0)
    time.sleep(0.1)
    GPIO.output(17,1)
    GPIO.output(27,1)
    time.sleep(0.1)

def alarmFancy():
    GPIO.output(17,0)
    GPIO.output(27,0)
    time.sleep(0.7)
    GPIO.output(27,1)
    time.sleep(0.3)

def startup():
    global mailAddress
    global phoneNumber
    global alarmActive
    
    GPIO.output(17,1)
    GPIO.output(27,0)
    GPIO.output(23,1)
    GPIO.setmode(GPIO.BCM)
    GPIO.setup(17, GPIO.OUT)
    GPIO.setup(27, GPIO.OUT)
    GPIO.setup(23, GPIO.OUT)
    GPIO.setup(18, GPIO.IN,  pull_up_down=GPIO.PUD_UP)
    GPIO.setup(24, GPIO.IN,  pull_up_down=GPIO.PUD_UP)

    if mailAddress == "":
        while not changeMail():
            time.sleep(0.1)
    if phoneNumber == 0:
        while not changePhone():
            time.sleep(0.1)

def sendMail(message):
    SUBJECT = "Your alarm has been triggered"
    TO = mailAddress
    FROM = "asysteem@gmail.com"
    BODY = 'Subject: %s\n\n%s' % (SUBJECT, message)
    s = smtplib.SMTP("smtp.gmail.com",587)
    s.set_debuglevel(0)
    s.ehlo()
    s.starttls()
    s.login("asysteem@gmail.com", "qweasdzxc1")
    s.sendmail(FROM,TO,BODY)
    s.quit

def sendSMS(message):
    global phoneNumber
    r = requests.post('https://bulksms.vsms.net/eapi/submission/send_sms/2/2.0', data={'username' : 'ditiszorandom', 'password' : 'qweasdzxc', 'message' : str(message), 'msisdn' : int(phoneNumber)})
    s = r.status_code
    if s == requests.codes.ok:
        return True

def alarmTriggered():
    GPIO.output(23,0)
    message = "Your alarm has been triggered at {}".format(datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S'))
    sendMail(message)
    #sendSMS(message)

def changePhone():
    global phoneNumber
    curPhone = phoneNumber
    try:
        phoneNumber = int("316" + input("Your new phone number: +316"))
        if 31599999999 < phoneNumber < 31700000000:
            if input("Do you wish to change your phone number to {}? <Y/N> ".format("+"+str(phoneNumber))) in ["Y", "y"]:
                print("Saved!")
                return True
            else:
                phoneNumber = curPhone
    except ValueError:
        print("This is not a correct phone number.")

def changeMail():
    global mailAddress
    newmail = input("Your new mail address: ")
    if ("@" in newmail):
        if input("Your mail address will be changed to {}, are you sure? <Y/N> ".format(newmail)) in ["Y","y"]:
            mailAddress = newmail
            print('Saved!')
            return True
    else:
        print("This is not a valid mail address")

def warning():
    global mode
    i = 0
    while i < 20 and not tripping():
        if mode == ALARMCRAZY:
            alarmCrazy()
        if mode ==  ALARMFANCY:
            alarmFancy()
        if mode == ALARMWILD:
            alarmWild()
        i+=1
    if alarmActive:
        alarmTriggered()
    while not tripping() and alarmActive:
        if mode == ALARMCRAZY:
            alarmCrazy()
        if mode ==  ALARMFANCY:
            alarmFancy()
        if mode == ALARMWILD:
            alarmWild()

def tripping():
    if not GPIO.input(24):
        if deactivate():
            return True

def waiting(seconds):
    for i in range(seconds):
        GPIO.output(17,0)
        time.sleep(0.5)
        GPIO.output(17,1)
        time.sleep(0.5)

def password():
    global alarmActive
    global codes
    print("", end="")
    code = str(input("Please enter the security code: "))
    if code in codes:
        return True
    if code == "admin" and not alarmActive:
        if input("Password: ") == "default":
            menu()

def activate():
    global alarmActive
    if not alarmActive and password():
        print("Alarm activated!")
        waiting(activateTime)
        GPIO.output(17,0)
        GPIO.output(27,1)
        alarmActive = True

def deactivate():
    global alarmActive
    if alarmActive and password():
        print("Alarm deactivated!")
        GPIO.output(17,1)
        GPIO.output(23,1)
        GPIO.output(27,0)
        alarmActive = False
        return True

def menu():
    global mode
    global activateTime
    global phoneNumber
    menuOptions = "1. Set alarm type.\n2. Set alarm delay\n3. Alarm message options\n4. Exit\n"
    choice = int(input(menuOptions))
    while choice != 4:
        if choice == 1:
            alarmtype = int(input("1. Wild alarm\n2. Crazy alarm\n3. Fancy alarm\n"))
            if alarmtype == 1:
                mode = ALARMWILD
            elif alarmtype == 2:
                mode = ALARMCRAZY
            else:
                mode = ALARMFANCY
        elif choice == 2:
            try:
                activateTime = int(input("Set alarm delay in seconds: "))
                print("Alarm delay succesfully altered!")
            except ValueError:
                print("This is not a valid duration")
        elif choice == 3:
            options = int(input("1. Set phone number\n2. Set e-mail address\n"))
            if options == 1:
                changePhone()
            elif options == 2:
                changeMail()
        choice = int(input(menuOptions))

def main():
    try:
        startup()
        while True:
            input_state = GPIO.input(18)
            if input_state == False and alarmActive:
                warning()
            if not GPIO.input(24):
                if alarmActive:
                    deactivate()
                else:
                    activate()

    except KeyboardInterrupt:
        GPIO.cleanup()

main()
