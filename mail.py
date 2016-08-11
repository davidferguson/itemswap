#!/usr/bin/python

import smtplib

sender = 'notifree@jscard.org'
receivers = ['fergusondavid6@gmail.com']

message = """From: NotiFree Mailer <notifree@jscard.org>
To: To Person <fergusondavid6@gmail.com>
Subject: NotiFree Notifications

This is a test e-mail message.
"""

try:
   smtpObj = smtplib.SMTP('localhost')
   smtpObj.sendmail(sender, receivers, message)         
   print "Successfully sent email"
except SMTPException:
   print "Error: unable to send email"
