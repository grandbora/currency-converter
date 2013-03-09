
[![Build Status](https://travis-ci.org/grandbora/currency-converter.png)](https://travis-ci.org/grandbora/currency-converter)

Currency Converter
====================

###Story
This is a small app which fetches the currency rates from external source, and serves fixed amount of donation options for every available currency.  
Currency rates are read from an external xml file and the values are stored locally in the database.  
App serves a simple page where the user can choose one of the available currencies and then see the donation amounts in the currency that is selected.  

###Behind the curtains

'app/refresh.php' file does the fetching of the currency rates, this script can be run periodically.  

overwrite no truncate