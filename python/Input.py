import RPi.GPIO as GPIO
class Input(object): 
	pinNumber = 0

	def __init__(self,pinNumber):
		self.pinNumber = pinNumber
		GPIO.setmode(GPIO.BOARD)
		GPIO.setup(self.pinNumber,GPIO.OUT) 
		print "Init input as " + str(pinNumber)

	def status(self):
		GPIO.input(self.pinNumber)
		print "Returning Status"

 	def turnOn(self):
		GPIO.input(self.pinNumber,GPIO.HIGH)
		print "Turn Input On"
	def turnOff(self):
		GPIO.input(self.pinNumber,GPIO.LOW)
		print "Turn Input Off"

