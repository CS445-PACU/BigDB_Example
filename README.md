# BigDB_Example


## Files

* basicErrorHandling.php
  *  from PHPExamples  
* *connDB.php - does not exist, create from connDB_template.php*
* connDB_template.php
  *  from PHPExamples. Copy to connDB.php and fill out Database, PUNetID, and Password.
* findCourseByProfIDCourseID.php
* findCoursesByProfID.php
* findCoursesByTitle.php
* main.php
* queryAllProfs.php
* showCourseList.php
* showOneCourse.php
* test.php - http://localhost/php/PUNETID/BigDB_Example/test.php
  *   checks PHP environment. Look for pdo_mysql
  *   Install pdo_mysql via:
  *   sudo /root/enableUpdates.sh
  *   sudo zypper in php7-mysql
  *   sudo /root/disableUpdates.sh
  *   sudo systemctl restart apache2



## VS Code

Use VS Code to open the folder PHP inside this project.  This folder contains an example PHP file and the necessary configuration to get the debugger working.

## PHP

Install the [PHP-Debug extension](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug).

You don't need to do any further configuration to get PHP or the debugger to work.

* The Debug configuration _Launch currently open script_ will launch the current script in the debugger.  This is useful to testing small scripts and examples.
* The Debug configuration _Listen for Xdebug_ will start the debugger and wait for your local webserver to launch a PHP script and connect to the running debugger.  Once you start developing your website, this will be the easiest deubg method to use.

## Copy code to webserver

In the terminal, type 
```
make copy
```

This will copy your PHP code to /srv/www/htdocs/php/PUNETID/BigDB_Example

You can open this website in your VM via:

http://localhost/php/PUNETID/BigDB_Example/

(hint: you can edit this README file to change PUNETID to your actual PUNETID so you can use the link above.)
