
[![Build Status](https://travis-ci.org/grandbora/currency-converter.png)](https://travis-ci.org/grandbora/currency-converter)

Currency Converter
====================

##Story
This is a small app which fetches the currency rates from external source, and serves fixed amount of donation options for every available currency.  
Currency rates are read from an external xml file and the values are stored locally in the database.  
App serves a simple page where the user can choose one of the available currencies and then see the donation amounts in the currency that is selected.  

##Behind the curtains


###Database
 * 'app/refresh.php' file does the fetching of the currency rates. Fetched rates are stored in database. On each refresh, app updates the rates if there is a change for the retrieved currencies. This script can be run periodically.
 * App never truncates the table that holds rates, therefore it is not possible to remove a currency via app.
 * App uses doctrine orm tool to manage database transactions. Entity and repository classes can be found under Model/Rate.
 * App uses doctrine orm tool to manage database transactions. Entity and repository classes can be found under Model/Rate.

 ###Application Structure
 * All application logic resides in two models, Model\CurrencyConverter, Model\Api

to be continued



Framework
NO

installation composer
Testing
phpunit

add links memes