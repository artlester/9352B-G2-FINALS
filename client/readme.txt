1. Edit httpd-vhosts.conf
<VirtualHost *:80>
  ServerName audirentur.com
  ServerAlias www.audirentur.com
  DocumentRoot "${INSTALL_DIR}/www/client"
  <Directory "${INSTALL_DIR}/www/client/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
  </Directory>
</VirtualHost>
<VirtualHost *:80>
  ServerName customer.audirentur.com
  ServerAlias www.customer.audirentur.com
  DocumentRoot "${INSTALL_DIR}/www/client/customer"
</VirtualHost>

2. Restart Apache Service

3. Edit hosts file
127.0.0.1 audirentur.com
127.0.0.1 customer.audirentur.com

4. Go to MySQL Console & Create User
CREATE USER 'Audirentur'@'ip address' IDENTIFIED BY 'Audirentur2018;';
GRANT ALL PRIVILEGES ON * . * TO 'Audirentur'@'ip address';
FLUSH PRIVILEGES;
EXIT;

5. Create connection and import database at workbench