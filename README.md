Populate Nagios via fruity
==========================

Code fore reading events from scom and automatially create hosts/services in Nagios



Two simple scripts that makes hosts existing in scom to be displayed in Nagios.
Scom is Microsofts attempt to monitor their software and services, a musthave for a site with more than a couple of windowsservers.
With scom2nagios(http://www.mbaeker.de/category/tools/scom2nagios/) you get events exported to NSCA.
But the host and service must already exist in Nagios and this is solved with this tool.

Fruity is an old php/sql interface to Nagios that I really cannot recomend but it is better than manually editing nagiosconf.
Just drop the file in the correct path and create a serviceuser.
If you improve the PHP code commit it back, PHP is wierd.

Copy populatenagiosviafruity to a path where Nagios can find it and add is as an active check. 
It will automatically add the hosts that shows up in the logfile and map it to the corresponding service of your choice.
No need to manually add any scomhosts in Nagios anymore.


This hack is ugly but works, hopefully you will find it usefull and add more functionality and clean up the code.

