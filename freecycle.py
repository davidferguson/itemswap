import requests
from bs4 import BeautifulSoup
import MySQLdb

class dbConn(object):
	conn = None
	def connect(self):
		self.conn = MySQLdb.connect('127.0.0.1', 'notifree', 'prewired2016', 'notifree')
		self.conn.set_character_set('utf8')
		self.conn.cursor().execute('SET NAMES utf8;')
		self.conn.cursor().execute('SET CHARACTER SET utf8;')
		self.conn.cursor().execute('SET character_set_connection=utf8;')
	def execute(self, sql, values):
		try:
			cursor = self.conn.cursor()
			cursor.execute(sql, values)
			self.conn.commit()
		except (AttributeError, MySQLdb.OperationalError):
			self.connect()
			cursor = self.conn.cursor()
			cursor.execute(sql, values)
			self.conn.commit()
		return cursor
	def select(self, sql, values):
		try:
			cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
			cursor.execute(sql, values)
			result = cursor.fetchall()
			self.conn.commit()
		except (AttributeError, MySQLdb.OperationalError):
			self.connect()
			cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
			cursor.execute(sql, values)
			result = cursor.fetchall()
			self.conn.commit()
		return result

connection = dbConn()

searchLocation = raw_input("Where are you searching? ")

connection.execute("DELETE FROM freecycle", [])

counter = 1
finished = False
while not finished:
  result = requests.get("https://groups.freecycle.org/group/" + searchLocation + "/posts/offer?page=" + str(counter) + "&resultsperpage=100")
  counter = counter + 1
  if not "&rarr;" in result.text:
    finished = True
  soup = BeautifulSoup(result.text)
  for item in soup.find_all("tr"):
    title = item.find_all("a")[1].text.strip()
    #if searchItem in title:
    if True:
      url = item.find_all("a")[0]["href"]
      id = url[(url.find("/posts/") + len("/posts/")):(url[url.find("/posts/") + len("/posts/"):].find("/")+url.find("/posts/") + len("/posts/"))]
      image = "https://groups.freecycle.org/group/FreecycleEdinburgh/post_image/" + id
      result2 = requests.get(url)
      soup2 = BeautifulSoup(result2.text)
      post = soup2.find_all("div", {"id" : "group_post"})
      description = post[0].find_all("div", {"id":"","class":""})[2].find_all("p")[0].text.strip()
      location = post[0].find_all("div", {"id":"","class":""})[0].text.strip()[(post[0].find_all("div", {"id":"","class":""})[0].text.strip().find(":")+1):].strip()
      connection.execute("INSERT INTO freecycle VALUES(0, %s, %s, %s, %s, %s, %s, %s)", ( title, url, id, image, description, location, searchLocation ))

