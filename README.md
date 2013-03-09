
[![Build Status](https://travis-ci.org/grandbora/currency-converter.png)](https://travis-ci.org/grandbora/currency-converter)

#Currency Converter
====================

##Story
This is a small app which fetches the currency rates from an external source, and presents fixed amount of donation options for every available currency.  
Currency rates are read from an [external xml](http://toolserver.org/~kaldari/rates.xml) file and the values are stored locally in the database.  
App serves a simple page on which the user can choose one of the available currencies and then see the donation amounts in the currency that is selected.  

##Behind the curtains


###Database
 * [``app/refresh.php``](app/refresh.php) file does the fetching of the currency rates. Fetched rates are stored in database. On each refresh, app updates the rates if there is a change for the retrieved currencies. This script can be run periodically.
 * The table that holds the rates is never truncated by the app. Therefore it is not possible to remove a currency via app.
 * Doctrine orm tool is used to manage database transactions. Entity and repository classes can be found under Model/Rate. Doctrine configuration is done in 'app/bootstrap.php'. Model\DoctrineHelper is implemented in order to handle doctrine related configurations.
 * In order to to create the table that holds the rates, you can use "orm:schema-tool:update" command of doctrine. It will run the sql statement below on your database.

     ````CREATE TABLE exchange_rates 
     (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, 
     value DOUBLE PRECISION NOT NULL, UNIQUE INDEX name_unique (name), PRIMARY KEY(id)) 
     DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB````

###Backend Structure
 * All application logic resides in two models, Model\CurrencyConverter and Model\Api. Model\Api is responsible for fetching the rates and updating the database records. Model\CurrencyConverter is responsible for doing conversion calculations. Supports various formats of inputs.
 * Model\Api uses buzz library fo fetch external xml file. Curl client is used for fetching.
 * The contoller of the index page is located under Controller\index. The view is located under View\index.htl.twig. 
 * Controller just passes the rate information to the view, and all the calculations are done on the client side.
 * Twig is used for templating. Configuration is done in ``app/bootrap.php``.

###Frontend Structure
 * There is a thin client side application which is reponsible for calculations and redirections.
 * Require.js is used for module loading. Backbone is used for creating the individual views and interaction handling. jQuery is used for dom manipulation and jQueryMobile is used to create mobile friendly UI.

##Installation
 * Php dependencies are managed by composer(*).
 * For database setup, you may need to change the credentials in ``app/bootrap.php``.

 ##Testing
 * Models are tested. You can run ``phpunit`` on root folder of the project.
 

add links memes
bootstrap
Framework NO