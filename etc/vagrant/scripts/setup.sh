#!/bin/bash
 
# Setup script designed to get a Ubuntu 14.04 LTS server
# up and running with secure defaults.
 
# =============
# Update system
# =============
 
# get system up to date
apt-get update && apt-get upgrade -y



# =============
# Base packages
# =============
 
# install base packages
apt-get install -y build-essential curl dos2unix gcc git libmcrypt4 libpcre3-dev \
make python2.7-dev python-pip re2c unattended-upgrades whois vim \
libssl-dev software-properties-common python-software-properties ntp mysql-client

pip install --upgrade httpie


# ============
# PHP packages
# ============
apt-get install -y php5-fpm php5-cli php5-dev php-pear \
php5-mysql php5-pgsql php5-sqlite \
php5-apcu php5-json php5-curl php5-dev php5-gd \
php5-gmp php5-imap php5-mcrypt php5-xdebug \
php5-memcached php5-redis

php5enmod mcrypt

service php5-fpm restart

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

printf "\nPATH=\"/home/vagrant/.composer/vendor/bin:\$PATH\"\n" | tee -a /home/vagrant/.profile


# ==============
# NGINX packages
# ==============
apt-get install -y nginx

#Set Symlink
if [ ! -d /var/www ]; then sudo ln -s /vagrant/ /var/www; fi

NGINX=$(cat <<EOF
server {
    listen 80 default;

    root /var/www/public;
    index index.php;

    server_name "";

    location / {
        try_files \$uri \$uri/ /index.php?\$args;
    }

    error_page 404 /404.html;
    error_page 500 502 503 504 /50x.html;

    location ~ \.php\$ {
        try_files \$uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)\$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        #fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }
}
EOF
)
echo "${NGINX}" > /etc/nginx/sites-available/default

# dont expose server versions
sed -i 's/# server_tokens/server_tokens/g' /etc/nginx/nginx.conf
sed -i 's/expose_php = On/expose_php = Off/g' /etc/php5/fpm/php.ini

service nginx restart
service php5-fpm restart


# ================
# MySQL server
# ================
echo 'mysql-server mysql-server/root_password password pass' | debconf-set-selections
echo 'mysql-server mysql-server/root_password_again password pass' | debconf-set-selections
apt-get -y install mysql-server-5.5

# Set up DB
MYSQLDB=$(cat <<EOF

GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '';
FLUSH PRIVILEGES;

DROP DATABASE IF EXISTS app;
CREATE DATABASE app;
USE app;

EOF
)

echo "${MYSQLDB}" > /tmp/mysql.in
/usr/bin/mysql -u root -ppass < /tmp/mysql.in
rm /tmp/mysql.in


# ================
# Varnish packages
# ================
#apt-get install -y varnish

#VARNISH=$(cat <<EOF
## Should we start varnishd at boot?  Set to "no" to disable.
#START=yes
#
## Maximum number of open files (for ulimit -n)
#NFILES=131072
#
## Maximum locked memory size (for ulimit -l)
#MEMLOCK=82000
#
#DAEMON_OPTS="-a :80 \
#             -T localhost:6082 \
#             -t 0 \
#             -f /etc/varnish/cacheall.vcl \
#             -S /etc/varnish/secret \
#             -s malloc,256m"
#EOF
#)
#echo "${VARNISH}" > /etc/default/varnish
#
#VCL=$(cat <<EOF
#backend default {
#    .host = "127.0.0.1";
#    .port = "8080";
#}
#
#EOF
#)
#echo "${VCL}" > /etc/varnish/cacheall.vcl
#
#service varnish restart

# ===========
# Mailcatcher
# ===========
apt-get install libsqlite3-dev
apt-get install ruby1.9.1-dev
gem install mailcatcher
# Make it start on boot
echo "@reboot $(which mailcatcher) --ip=0.0.0.0" >> /etc/crontab
update-rc.d cron defaults

# Make php use it to send mail
sudo echo "sendmail_path = /usr/bin/env $(which catchmail)" >> /etc/php5/mods-available/mailcatcher.ini
# Notify php mod manager
sudo php5enmod mailcatcher

# Start it now
/usr/bin/env $(which mailcatcher) --ip=0.0.0.0

# Add aliases
if [[ -f "/home/vagrant/.profile" ]]; then
    sudo echo "alias mailcatcher=\"mailcatcher --ip=0.0.0.0\"" >> /home/vagrant/.profile
    . /home/vagrant/.profile
fi


# ===================
# Additional packages
# ===================
apt-get install libxrender1   
apt-get install libfontconfig

(cd /vagrant/ && composer update)