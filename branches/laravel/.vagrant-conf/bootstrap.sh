#!/bin/bash

function pecho {
  echo "[Bootstrap] ${1}"
}

pecho "Update apt"
apt-get update > /dev/null

pecho "Install CURL"
apt-get install -y curl > /dev/null

debconf-set-selections <<< 'mysql-server mysql-server/root_password password demo'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password demo'

pecho "Install MySQL server"
apt-get install -y mysql-server > /dev/null

pecho "Install Apache and PHP5"
apt-get install -y apache2 php5 php5-mysql > /dev/null
pecho "Install PHP5 modules"
apt-get install -y php5-curl php5-gd php5-xdebug php5-ldap php5-mcrypt > /dev/null

pecho "Enable mcrypt"
mv -i /etc/php5/conf.d/mcrypt.ini /etc/php5/mods-available/

pecho "Activate mod rewrite"
a2enmod rewrite > /dev/null

pecho "Activate mcrypt mod"
php5enmod mcrypt

# Allow xdebug for IP 192.168.33.15
pecho "Configure xdebug"
cat /vagrant/.vagrant-conf/xdebug.conf >> /etc/php5/conf.d/xdebug.ini

pecho "Change Apache Document Root"
cp /vagrant/.vagrant-conf/apache.conf /etc/apache2/sites-available/000-default.conf

# DooPHP needs to generate some files in views/. He must be allowed to write
pecho "Add vagrant user to www-data group"
adduser www-data vagrant > /dev/null

pecho "Restart Apache"
service apache2 restart

# If phpmyadmin does not exist
if [ ! -f /etc/phpmyadmin/config.inc.php ];
then

        # Used debconf-get-selections to find out what questions will be asked
        # This command needs debconf-utils

        # Handy for debugging. clear answers phpmyadmin: echo PURGE | debconf-communicate phpmyadmin

        echo 'phpmyadmin phpmyadmin/dbconfig-install boolean false' | debconf-set-selections
        echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | debconf-set-selections

        echo 'phpmyadmin phpmyadmin/app-password-confirm password vagrant' | debconf-set-selections
        echo 'phpmyadmin phpmyadmin/mysql/admin-pass password demo' | debconf-set-selections
        echo 'phpmyadmin phpmyadmin/password-confirm password demo' | debconf-set-selections
        echo 'phpmyadmin phpmyadmin/setup-password password demo' | debconf-set-selections
        echo 'phpmyadmin phpmyadmin/database-type select mysql' | debconf-set-selections
        echo 'phpmyadmin phpmyadmin/mysql/app-pass password demo' | debconf-set-selections
        
        echo 'dbconfig-common dbconfig-common/mysql/app-pass password demo' | debconf-set-selections
        echo 'dbconfig-common dbconfig-common/mysql/app-pass demo' | debconf-set-selections
        echo 'dbconfig-common dbconfig-common/password-confirm password demo' | debconf-set-selections
        echo 'dbconfig-common dbconfig-common/app-password-confirm password demo' | debconf-set-selections
        echo 'dbconfig-common dbconfig-common/app-password-confirm password demo' | debconf-set-selections
        echo 'dbconfig-common dbconfig-common/password-confirm password demo' | debconf-set-selections
        
        pecho "Install PhpMyAdmin"
        apt-get -y install phpmyadmin > /dev/null
fi

pecho "Set Timezone into php.ini"
sed -i 's/;date.timezone =/date.timezone = Europe\/Paris/g' /etc/php5/apache2/php.ini
pecho "PHP - Active display_errors"
sed -i 's/display_errors = Off/display_errors = On/g' /etc/php5/apache2/php.ini
