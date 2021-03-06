import requests
from bs4 import BeautifulSoup
from bottle import route, run, template
import MySQLdb
import datetime
import smtplib

# easy to use object to use with the database
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
	def select(self, sql):
		try:
			cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
			cursor.execute(sql)
			result = cursor.fetchall()
			self.conn.commit()
		except (AttributeError, MySQLdb.OperationalError):
			self.connect()
			cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
			cursor.execute(sql)
			result = cursor.fetchall()
			self.conn.commit()
		return result

# used to remap Freecycle groups to locations
locations = [
  ["renfrew","Renfrew Scotland"],
  ["AberdeenUK","Aberdeen"],
  ["AberdeenshireWestFreecycle","Aberdeenshire"],
  ["AirdrieUK","Airdrie"],
  ["ArbroathUK","Arbroath"],
  ["freecycleayr","Ayr"],
  ["BathgateFreecycle","Bathgate"],
  ["BerwickshireUK","Berwickshire"],
  ["freecyclefifecentral","Fife"],
  ["freecycleclacks","Clackmannanshire"],
  ["cumbernauld-freecycle","Cumbernauld"],
  ["Dumbarton","Dumbarton"],
  ["Dumfries-GallowayFreecycle","Dumfries & Galloway"],
  ["freecycledundee","Dundee"],
  ["DunoonUK","Dunoon"],
  ["edunbartonfreecycle","East Dunbartonshire"],
  ["EastFifeUK","Fife"],
  ["EastLothianUK","East Lothian"],
  ["Easter-RossFreecycle","Easterross"],
  ["FreecycleEdinburgh","Edinburgh"],
  ["Ellon","Ellon"],
  ["FalkirkUK","Falkirk"],
  ["Galashiels_Freecycle","Galashiels"],
  ["GlasgowUK","Glasgow"],
  ["freecyclegrangemouth","Grangemouth"],
  ["GreenockUK","Greenock"],
  ["HamiltonLarkhall","Hamilton Larkhall"],
  ["helensburgh-freecycle","Helensburgh"],
  ["HuntlyUK","Huntly"],
  ["InvernessUK","Inverness"],
  ["IrvineUK","Irvine"],
  ["IsleOfBute","Bute"],
  ["KilmarnockUK","Kilmarnock"],
  ["KintyreUK","Kintyre"],
  ["KirriemuirUK","Kirriemuir"],
  ["LanarkUK","Lanark"],
  ["freecyclelinlithgow","Linlithgow"],
  ["LivingstonUK","Livingston"],
  ["Freecycle-Midlothian","Midlothian"],
  ["montrose","Montrose"],
  ["morayfreecycle","Moray"],
  ["NorthwestSutherlandUK","Sutherland"],
  ["ObanNorthArgyllUK","Argyll"],
  ["orkneyfreecycle_group","Orkney"],
  ["paisley-freecycle","Paisley"],
  ["Peeblesshire_Freecycle","Peeblesshire"],
  ["PerthSouthUKFreecycle","Perth"],
  ["RoxburghshireUK","Roxburghshire"],
  ["SaltcoatsUK","Saltcoats"],
  ["freecycleshetland","Shetland"],
  ["skyelochalshfreecycle","Skye & Lochalsh"],
  ["QueensferryUK","South Queensferry"],
  ["stirlingcityfreecycle","Stirling"],
  ["WestFifeScotland","Fife"],
  ["WesternIslesUK","Western Isles"],
  ["Wick","Wick"]
]

# used to sort results in order of date
def sortResults(freecycleResults, gumtreeResults):
  if freecycleResults is not None and gumtreeResults is not None:
    allResults = freecycleResults + gumtreeResults
  elif freecycleResults is None:
    allResults = gumtreeResults
  elif gumtreeResults is None:
    allResults = freecycleResults
  allTimes = []
  for result in allResults:
    allTimes.append(result["epoch"])
  sortedResults = [x for (y,x) in sorted(zip(allTimes,allResults))]
  return sortedResults

# remaps the freecycle location to a gumtree location
def remapLocation(freecycleLocation):
  for location in locations:
    if location[0] == freecycleLocation:
      return location[1]

# converts dates like "3 hours ago" into unix timestamp
def parseGumtreeDate(dateString):
  print dateString
  dateArray = dateString.lower().split(" ")
  if len(dateArray) != 3:
    return 0
  if dateArray[2] != "ago":
    return 0
  if dateArray[1] == "minute" or dateArray[1] == "minutes" or dateArray[1] == "mins":
    minutesToSubtract = int(dateArray[0])
    postDate = (datetime.datetime.now() - datetime.timedelta(minutes=minutesToSubtract))
  if dateArray[1] == "hour" or dateArray[1] == "hours" or dateArray[1] == "hrs":
    hoursToSubtract = int(dateArray[0])
    postDate = (datetime.datetime.now() - datetime.timedelta(hours=hoursToSubtract))
  if dateArray[1] == "day" or dateArray[1] == "days" or dateArray[1] == "dys":
    daysToSubtract = int(dateArray[0])
    postDate = (datetime.datetime.now() - datetime.timedelta(days=daysToSubtract))
  postDate = (postDate - datetime.timedelta(hours=1))
  epochDate = (postDate - datetime.datetime(1970,1,1)).total_seconds()
  return epochDate

# converts dates like "Aug 20 15:43:41 2016" into unix timestamp
def parseFreecycleDate(dateString):
  postDate = datetime.datetime.strptime(dateString, "%b %d %H:%M:%S %Y")
  epochDate = (postDate - datetime.datetime(1970,1,1)).total_seconds()
  return epochDate

# grab and parse results from freecycle
def getFreecycleResults(searchItem, searchLocation):
  returnItems = []
  result = requests.get("https://groups.freecycle.org/group/" + searchLocation + "/posts/offer?page=1&resultsperpage=100")
  soup = BeautifulSoup(result.text)
  for item in soup.find_all("tr"):
    title = item.find_all("a")[1].text.strip()
    if searchItem in title:
      url = item.find_all("a")[0]["href"]
      id = url[(url.find("/posts/") + len("/posts/")):(url[url.find("/posts/") + len("/posts/"):].find("/")+url.find("/posts/") + len("/posts/"))]
      image = "https://groups.freecycle.org/group/FreecycleEdinburgh/post_image/" + id
      result2 = requests.get(url)
      soup2 = BeautifulSoup(result2.text)
      post = soup2.find_all("div", {"id" : "group_post"})
      description = post[0].find_all("div", {"id":"","class":""})[2].find_all("p")[0].text.strip()
      location = post[0].find_all("div", {"id":"","class":""})[0].text.strip()[(post[0].find_all("div", {"id":"","class":""})[0].text.strip().find(":")+1):].strip()
      postDate = item.find_all("td")[0].text.split("\n")[2].strip()[(item.find_all("td")[0].text.split("\n")[2].strip().find(" ")):].strip()
      epochDate = parseFreecycleDate(postDate)
      returnItems.append({"image":image, "title":title, "location":location , "description":description, "url":url, "epoch":epochDate})
      return returnItems

# grab and parse results from gumtree
def getGumtreeResults(searchItem, searchLocation):
  list = ""
  searchLocation = remapLocation(searchLocation)
  returnItems = []
  result = requests.get("https://www.gumtree.com/search?featured_filter=false&max_price=0&distance=0&urgent_filter=false&sort=date&search_scope=false&photos_filter=true&search_category=for-sale&search_location=" + searchLocation + "&q=" + searchItem)
  soup = BeautifulSoup(result.text)
  for item in soup.find_all():
    if "data-q" in item.attrs:
      if item["data-q"] == "naturalresults":
        list = item
  if list == "":
    return []
  items = list.find_all("li")
  for item in items:
    check = item.find_all("article", { "class" : "listing-maxi" })
    if len(check) != 0:
      try:
        try:
          itemImage = item.find_all("img")[1]["src"]
        except:
          itemImage = item.find_all("img")[0]["src"]
      except:
        itemImage = item.find_all("img")[0]["data-lazy"]
      itemTitle = item.find_all("h2")[0].text.strip()
      if "wanted" in itemTitle.lower() or "selling" in itemTitle.lower() or "wanted" in itemTitle.lower() or "swap" in itemTitle.lower():
        continue
      itemDescription = item.find_all("p")[0].text.strip() + "..."
      if "wanted" in itemDescription.lower() or "selling" in itemDescription.lower() or "wanted" in itemDescription.lower() or "swap" in itemDescription.lower():
        continue
      itemLocation = item.findAll("div", { "class" : "listing-location" })[0].text.strip()
      itemLink = "http://gumtree.com" + item.find_all("a")[0]["href"]
      itemDate = item.findAll("strong")[0].text.strip()[(item.findAll("strong")[0].text.strip().find("\n")):].strip()
      if itemDate == "0":
          itemDate = item.findAll("strong")[1].text.strip()[(item.findAll("strong")[1].text.strip().find("\n")):].strip()
      epochDate = parseGumtreeDate(itemDate)
      returnItems.append({"image":itemImage, "title":itemTitle, "location":itemLocation, "description":itemDescription, "url":itemLink, "epoch":epochDate, "date":itemDate})
  return returnItems

# scan gumtree and freecycle and work out which ones are new
def rescanSearch(searchItem, searchLocation, lastScanDate):
  freecycleResults = getFreecycleResults(searchItem, searchLocation)
  gumtreeResults = getGumtreeResults(searchItem, searchLocation)
  results = sortResults(freecycleResults, gumtreeResults)
  reversedResults = list(reversed(results))
  newResults = []
  for result in reversedResults:
    print result["epoch"]
    print lastScanDate
    if int(float(result["epoch"])) > int(float(lastScanDate)):
      newResults.append(result)
  print newResults
  return newResults

### MAIN SCRIPT ##########

# connect to database and get data
dbconnection = dbConn()
searches = dbconnection.select("SELECT * FROM searches")

# loop through all saved searches, emailing out new posts
for search in searches:
  newItems = rescanSearch(search["keywords"], search["location"], search["time"])
  if len(newItems) != 0:
    itemString = ""
    for item in newItems:
      itemString = itemString + "\n" + item["title"] + " :: " + item["url"]
    currentTime = (datetime.datetime.now() - datetime.datetime(1970,1,1)).total_seconds()
    dbconnection.execute("UPDATE searches SET time=%s WHERE id=%s", [ currentTime, search["id"] ])
    email = dbconnection.select("SELECT email FROM users WHERE username = '" + search["username"] + "'")[0]["email"]
    sender = 'notifree@jscard.org'
    receivers = [email]
    message = """From: NotiFree Mailer <notifree@jscard.org>
To: To Person <""" + email + """>
Subject: New '""" + search["keywords"] + """' - NotiFree Notifications

Hi """ + search["username"] + """,

Since you last searched, new items matching '""" + search["keywords"] + """' have been posted.
""" + itemString
  try:
     smtpObj = smtplib.SMTP('localhost')
     smtpObj.sendmail(sender, receivers, message)
     print "Successfully sent email"
  except SMTPException:
     print "Error: unable to send email"
