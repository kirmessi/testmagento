# Magento 2.2, my study project

**Before installation**
- get credentials from https://marketplace.magento.com
- generate Access Key, use Public Key as login and Private Key as pass
- create mysql database and user, basic tips:
    - 	sudo mysql -u root -p
    -   CREATE DATABASE name;
    -   CREATE USER 'test_user'@'localhost' IDENTIFIED BY 'pass';
    - 	GRANT ALL PRIVILEGES ON * . * TO 'test_user'@'localhost';
    - 	FLUSH PRIVILEGES;

**Get .tar magento 2.2 with simple data**
- https://magento.com/tech-resources/download

**Prerequisites**
- Magento 2.2 archives are compatible with PHP 7.0 only. If you’re using PHP 7.1, download Magento 2.2 with Composer instead to avoid compatibility issues during installation.
- switch from 7.2 to 7.0 php versions:
    - sudo a2dismod php7.2
    - sudo a2enmod php7.0
    - sudo update-alternatives --set php /usr/bin/php7.0
- check all Magento System Requirements https://devdocs.magento.com/guides/v2.2/install-gde/system-requirements2.html

**Unpack archive**
- going to the root magento folder, set permissions:
    - find var generated vendor pub/static pub/media app/etc -type f -exec chmod g+w {} +
    - find var generated vendor pub/static pub/media app/etc -type d -exec chmod g+ws {} +
    - sudo chown -R :<web server group> .
    - chmod u+x bin/magento
    - chmod -R 777 var/ pub/ generated/ app/etc
    
**Install magento modules through Composer**
- composer config repositories.magento composer https://repo.magento.com/
- composer require vendor/module (in our case bsscommerce/mega-menu)
- composer update
- php bin/magento setup:upgrade
- but permissions again are disabled, need: chmod -R 777 var/ pub/ generated/ app/etc

**CLI basic commands**
- **php bin/magento**
- deploy:mode:set - Set application mode (production, developer)
- deploy:mode:show - Displays current application mode
- setup:upgrade - Upgrades the Magento application, DB data, and schema
- setup:di:compile - Generates DI configuration and all missing classes that can be 
- auto-generated
- cache:clean - Cleans cache type(s)
- indexer:reindex - Reindexes Data
