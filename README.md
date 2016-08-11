# NotiFree
The search engine for free items in your area

![alt text](http://www.notifree.ml/ntfr-logo.png)

NotiFree uses data from Freecycle and Gumtree to show you collated results from both sites, saving you the time and effort of having to search both sites.

You can also sign up for an account, and then add searches to your account to be notified of when new items with your specified keywords have been posted on either Gumtree of Freecycle.

## Technologies used
- The website uses HTML, CSS and JavaScript to display the results.
- The account system uses a MySQL database, and is accessed using PHP to authenticate users onto the site.
- The saved searches are also stored in MySQL, and are added and removed using PHP.
- Python is used to web scrape Gumtree and Freecycle, sort the results and display them on the website
- Python is also used to look at the saved searches table, scan for new posts on Gumtree and Freecycle, and email the users.
- A mail server has been setup using Postfix in order to send out the emails correctly. SPF and DKIM have been configured for the mail server to prevent the messages from ending up in users' spam folder.
