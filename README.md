
[![Build Status](https://travis-ci.org/grandbora/currency-converter.png)](https://travis-ci.org/grandbora/currency-converter)

#Currency Converter
====================

##Story
This is a small app which fetches the currency rates from an external source, and presents fixed amount of donation options for every available currency.  
Currency rates are read from an external xml file and the values are stored locally in the database.  
App serves a simple page where the user can choose one of the available currencies and then see the donation amounts in the currency that is selected.  

##Behind the curtains


###Database
 * 'app/refresh.php' file does the fetching of the currency rates. Fetched rates are stored in database. On each refresh, app updates the rates if there is a change for the retrieved currencies. This script can be run periodically.
 * The table that holds the rates is never truncated by the app. Therefore it is not possible to remove a currency via app.
 * Doctrine orm tool is used to manage database transactions. Entity and repository classes can be found under Model/Rate. Doctrine configuration is done in 'app/bootstrap.php'. Model\DoctrineHelper is implemented in order to handle doctrine related configurations.
 * In order to to create the table that holds the rates, you can use "orm:schema-tool:update" command of doctrine. It will run the sql statement below on your database.

     CREATE TABLE exchange_rates (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, value DOUBLE PRECISION NOT NULL, UNIQUE INDEX name_unique (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB

 ###Application Structure
 * All application logic resides in two models, Model\CurrencyConverter, Model\Api

to be continued



Framework
NO

installation composer
Testing
phpunit

add links memes