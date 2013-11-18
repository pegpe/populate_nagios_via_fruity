Populate Nagios via fruity
==========================

Code for reading events from scom and automatically create hosts/services in Nagios



Two simple scripts that makes the hosts existing in scom to be displayed in Nagios.
Scom is Microsofts attempt to monitor their software and services, a musthave for a site with more than a couple of windowsservers.
With scom2nagios(http://www.mbaeker.de/category/tools/scom2nagios/) you get events exported to NSCA.
But the host and service must already exist in Nagios and this is solved with this tool.

Fruity is an old php/sql interface to Nagios that I really cannot recomend but it is better than manually editing nagiosconf.
Just drop the file in the correct path and create a serviceuser from within the webinterface.
If you improve the PHP code commit it back, PHP is wierd.

Copy populatenagiosviafruity to a path where Nagios can find it and add is as an active check. 
It will automatically add the hosts that shows up in the logfile and map it to the corresponding service of your choice.
No need to manually add any scomhosts in Nagios anymore.
Sometimes "brokens hostdefinitions" is sent by scom, that will show PENDING for an eternity. You can manually delete hosts, if they continue to send data they will be added back.


This hack is ugly but works, hopefully you will find it usefull and add more functionality and clean up the code.

