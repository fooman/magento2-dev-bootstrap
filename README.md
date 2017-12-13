Fooman Magento 2 - Minimal Bootstrap
===================

This repository provides a bare bones Magento 2 functional framework for development:
- instantiated ObjectManager
- working autogeneration of factories, proxies, etc 
- translations
- all registered modules are enabled

Magento 2 is running in developer mode without database.

The final aim for this project is to have tag 2.1.6 of this repository match Magento Opensource 2.1.6. with a fully 
automated creation of etc/di.xml, functions.php and composer.json based on the corresponding Magento version. 
This in turn means that until then commits and tags in this repository are subject to change.

### Installation Instructions via Composer

Add this repository to your root composer.json file:

    composer config repositories.fooman-magento2-dev-bootstrap vcs http://github.com/fooman/magento2-dev-bootstrap

Magento's composer installer currently insists on the presence of the `app/etc` folder (you probably want to gitignore it). 
Create it with:

    mkdir -p app/etc

then run:

    composer require --dev fooman/magento2-dev-bootstrap:dev-master

