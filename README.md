
[![Build Status](https://travis-ci.org/grandbora/currency-converter.png)](https://travis-ci.org/grandbora/currency-converter)

#Currency Converter
====================

##Story
This is a small app which fetches the currency rates from an external source, and presents fixed amount of donation options for every available currency.  
Currency rates are read from an [external xml](http://toolserver.org/~kaldari/rates.xml) file and the values are stored locally in the database.  
App serves a simple page on which the user can choose one of the available currencies and then see the donation amounts in the currency that is selected.  

##Behind the curtains


###Database
 * [``app/refresh.php``](app/refresh.php) file does the fetching of the currency rates. Fetched rates are stored in database. On each refresh, app updates the rates if there is a change in the retrieved currency rates. This script can be run periodically.
 * The table that holds the rates is never truncated by the app. Therefore it is not possible to remove a currency via app.
 * [Doctrine orm tool](http://www.doctrine-project.org/) is used to manage database transactions. Entity and repository classes can be found under [``Model\Rate``](src/Model/Rate). Doctrine configuration is done in [``app/bootstrap.php``](app/bootstrap.php). [``Model\DoctrineHelper``](src/Model/DoctrineHelper.php) is implemented in order to handle doctrine related configurations.
 * In order to to create the table that holds the rates, you can use ``orm:schema-tool:update`` command of doctrine. It will run the sql statement below on your database.

     ````CREATE TABLE exchange_rates   
     (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL,   
     value DOUBLE PRECISION NOT NULL, UNIQUE INDEX name_unique (name), PRIMARY KEY(id))   
     DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB````

###Backend Structure
 * All application logic resides in two models, [``Model\CurrencyConverter``](src/Model/CurrencyConverter.php) and [``Model\Api``](src/Model/Api.php). [``Model\Api``](src/Model/Api.php) is responsible for fetching the rates and updating the database records. [``Model\CurrencyConverter``](src/Model/CurrencyConverter.php) is responsible for doing conversion calculations. Supports various formats of inputs.
 * [``Model\Api``](src/Model/Api.php) uses [buzz library](https://github.com/kriswallsmith/Buzz) fo fetch external xml file. [Curl client](https://github.com/kriswallsmith/Buzz/blob/master/lib/Buzz/Client/Curl.php) is used for fetching.
 * The contoller of the index page is located under [``Controller\Index``](src/Controller/Index.php). The view is located under [``View\index.htl.twig``](src/View/index.html.twig). 
 * [Controller](src/Controller/Index.php) just passes the rate information to the [view](src/View/index.html.twig), and all the calculations are done on the client side.
 * [Response](https://github.com/symfony/HttpFoundation/blob/master/Response.php) class of [Symfony Http Foundation component](https://github.com/symfony/HttpFoundation) is returned by the [index action](https://github.com/grandbora/currency-converter/blob/master/src/Controller/Index.php#L28).
 * [Twig](http://twig.sensiolabs.org/) is used for templating. Configuration is done in [``app/bootstrap.php``](app/bootstrap.php).

###Frontend Structure
 * There is a thin client side application which is reponsible for calculations and redirections.
 * [Require.js](http://requirejs.org/) is used for module loading. [Backbone](http://backbonejs.org/) is used for creating the individual views and interaction handling. [jQuery](http://jquery.com/) is used for dom manipulation and [jQueryMobile](http://jquerymobile.com/) is used to create mobile friendly UI.

##Installation
 * Php dependencies are managed by [composer](http://getcomposer.org/)([*](http://cdn.memegenerator.net/instances/400x/29641170.jpg)).
 * For database setup, you may need to change the credentials in [``app/bootstrap.php``](app/bootstrap.php).

##Testing
 * Models are tested. You can run ``phpunit`` on root folder of the project.
 * [Travis CI](https://travis-ci.org/) is running the unit tests only.
 

##More (todo notes to $self)
 * I did not want to use an
 