#############################################################################
# File name:  Makefile
# Author:     chadd williams
# Date:       Oct 13, 2021
# Class:      CS445
# Assignment: Big DB 
# Purpose:	Copy files from PHP directory to web directory 
#############################################################################

all: copy

copy: 
	echo ${USER}
	mkdir -p /srv/www/htdocs/php/${USER}/BigDB
	chmod o+rx -R /srv/www/htdocs/php/${USER}/BigDB
	rsync -ahv * /srv/www/htdocs/php/${USER}/BigDB
