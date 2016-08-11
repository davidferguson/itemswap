import sys, os, bottle

sys.path = ['/var/www/notifree.ml/itemswap/'] + sys.path

os.chdir(os.path.dirname(__file__))

import search

application = bottle.default_app()
