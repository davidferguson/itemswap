import requests
from bs4 import BeautifulSoup
from bottle import route, run, template

def getResults(searchItem, searchLocation):
  returnItems = []
  result = requests.get("https://www.gumtree.com/search?featured_filter=false&max_price=0&distance=0&urgent_filter=false&sort=date&search_scope=false&photos_filter=true&search_category=for-sale&search_location=" + searchLocation + "&q=" + searchItem)
  soup = BeautifulSoup(result.text)
  for item in soup.find_all():
    if "data-q" in item.attrs:
      if item["data-q"] == "naturalresults":
        list = item
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
      itemDescription = item.find_all("p")[0].text.strip()
      itemLocation = item.findAll("div", { "class" : "listing-location" })[0].text.strip()
      returnItems.append({"image":itemImage, "title":itemTitle, "location":itemLocation, "description":itemDescription})
  return returnItems

@route('/search/<item>/<location>')
@route('/search/<item>/<location>/')
def hello(item, location):
  results = getResults(item, location)
  return template('Results', items=results)


run(host='', port=8080)
