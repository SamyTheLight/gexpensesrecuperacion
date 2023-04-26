sudo apt-get update
sudo apt-get ugrade

#Instalamos apache2
sudo apt-get install apache2 -y
sudo service apache2 restart

#Instalamos PHP 8.1
add-apt-repository ppa:ondrej/php
apt-get install -y php8.1 php8.1-dev libapache2-mod-php8.1 libmcrypt-dev php8.1-mysql
phpenmod mcrypt

#Instalamos la GuestAdditions
#sudo apt-get install virtualbox-guest-additions-iso

#Instalamos MySql
sudo apt-get install -y mysql-server
sudo mysql < /vagrant/GExpensesBBDD.sql

#Accedemos remotamente a la base de datos
cp -f /vagrant/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf 
systemctl restart mysql