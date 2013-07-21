from Input import Input
class Light(Input):
	def __init__(self,pinNumber):
		super(Light,self).__init__(pinNumber)
		print "Light Initialize " + str(self.pinNumber)
