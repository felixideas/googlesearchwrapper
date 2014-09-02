# googlesearchwrapper

PHP class wrapping the google web search REST API.
Based on httpful, psr-4 and composer.

## usage

add the package to your composer.json:

    "require": {
		"wingsuitist/googlesearchwrapper": "dev-master",

run _composer update_ in your composer project root

include autoloader from composer:

	require('../vendor/autoload.php');

create a search object:

	$search = \felixideas\GoogleSearchWrapper\Search::search('Hello World'); 

_coming soon: all the options that you can set for the search_

let it search and get the result object:

	$result = $search->run()

get the full response from the result object:

	$result->getFullResponse();

_coming soon: iterator implementation for the result object_

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