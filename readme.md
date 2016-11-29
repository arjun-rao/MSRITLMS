Welcome to the MSRITLMS Installation Guide for Ubuntu 16.04:

###Install LAMP Stack

    sudo apt-get install apache2
    sudo su
    root@ubuntu:~# systemctl    enable  apache2
    root@ubuntu:~# systemctl    start  apache2
    root@ubuntu:~# systemctl    status  apache2

Apache to be tested at: http://localhost/

Install MySQL:
    sudo apt-get install mysql-server mysql-client
	
    sudo systemctl status mysql
	

Install PHP
    sudo apt-get update 
	
    sudo apt-get install php7.0-mysql php7.0-curl php7.0-json php7.0-cgi  php7.0
	
    sudo apt install libapache2-mod-php7

Test PHP
    php -v
	
    sudo vi  /var/www/html/info.php
	
    <?php
	
	    phpinfo();
		
    ?>
	
    sudo systemctl restart apache2 #restarts apache

Install PHPMyAdmin
    sudo apt-get install phpmyadmin
	
    sudo nano /etc/apache2/apache2.conf
	
At the end of the file include:

    Include /etc/phpmyadmin/apache.conf
    sudo systemctl restart apache2

Test at http://localhost/phpmyadmin
Create a new database called msritweb or similar

### Clone Project

1) Git clone from Repo to directory - eg /home/user/MSRITLMS/
2) Install composer (getcomposer.org)
3) cd to MSRITLMS/
Run:

    composer install

5) Setup correct folder permissions:

	sudo chgrp -R www-data storage bootstrap/cache
	
    sudo chmod -R ug+rwx storage bootstrap/cache
	
6) Change .env.example file to .env and set database params
   Copy app.php and database.php from config/backup to config/ and change the respective parameters - for key and database
   use php artisan generate:key
   
7) change parameters in config/database.php to match database

8) Create db seed (for at least user’s table, dept table, and pages for department home (parent_code = NULL) and ensure migrations are correct, run 

    php artisan optimize
	
    php artisan:migrate
	
    php artisan db:seed --class=customDBClass 
	
9) Add virtualhost (sites-available Directory) to MSRITLMS directory (eg: isedept.app), and suitable entry to /etc/hosts
    
	sudo a2ensite isedept.app
	
    sudo systemctl restart apache2

10) Enable mod_rewrite

    sudo a2enmod rewrite


10) Visit isedept.app or similar






