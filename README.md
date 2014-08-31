# googlesearchwrapper

PHP class wrapping the google web search REST API.
Based on httpful, psr-4 and composer.

## usage

add the package to your composer.json:

    "require": {
		"wingsuitist/googlesearchwrapper": "dev-master",

run composer update in your composer project root

include autoloader from composer:

	require('../vendor/autoload.php');

create a search object:

	$search = \felixideas\GoogleSearchWrapper\Search::search('Hello World'); 

let it search with and get the result object:

	$result = $search->run()

get the data from the result object:

	$result->getAssoc();

## further documentation:

### httpful api

* http://phphttpclient.com/
* http://phphttpclient.com/docs/

### google api

* https://developers.google.com/web-search/docs/

### psr-4

* http://www.php-fig.org/psr/psr-4/

### php composer

* https://getcomposer.org/