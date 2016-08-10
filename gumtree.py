import requests
from bs4 import BeautifulSoup
from bottle import route, run, template

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

def remapLocation(freecycleLocation):
    for location in locations:
        if location[0] == freecycleLocation:
            return location[1]


def getResults(searchItem, searchLocation):
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
      returnItems.append({"image":itemImage, "title":itemTitle, "location":itemLocation, "description":itemDescription})
  return returnItems

@route('/search/<item>/<location>')
@route('/search/<item>/<location>/')
def hello(item, location):
  results = getResults(item, location)
  return template('Results', items=results)


run(host='', port=8080)
