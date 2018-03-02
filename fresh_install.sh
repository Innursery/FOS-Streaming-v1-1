#!/bin/bash
apt-get update
echo "Done apt-get"
echo "Installing PHP5-CLI CURL"
apt-get -y install php5-cli curl
echo "Done"
cd /tmp
wget https://raw.githubusercontent.com/Innursery/FOS-Streaming-v1-1/master/install_panel.php
php install_panel.php
wget https://raw.githubusercontent.com/Innursery/FOS-Streaming-v1-1/master/db_install.sh
chmod 755 db_install.sh
./db_install.sh
