<?php

/*
 * Copyright (C) 2014 Jonas Felix <jonas.felix@felixideas.ch>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace felixideas\GoogleSearchWrapper;

/**
 * Representing a search request
 *
 * @author Jonas Felix
 */
class Search {

	private $baseUrl = "https://ajax.googleapis.com/ajax/services/search/web";
	private $defaultParameters = array(
		'v' => '1.0',
	);
	private $query;
	
	/**
	 * @var \Httpful\Request 
	 */
	public $httpfulRequest;
	
	/**
	 * @var \Httpful\Response  
	 */
	public $httpfulResponse;
	
	/**
	 * @var \felixideas\GoogleSearchWrapper\Result
	 */
	public $result;

	/**
	 * private to prevent direct instances
	 * use static search instead
	 */
	private function __construct() {
	}

	/**
	 * set query string
	 * 
	 * @param string $query search string
	 */
	public function setQuery($query) {
		$this->query = $query;
	}

	/**
	 * combine the default parameters and search string
	 * 
	 * @return string search url
	 */
	public function getUrl() {
		$parameters = $this->defaultParameters;
		$parameters['q'] = $this->query;
		return $this->baseUrl . '?' . http_build_query($parameters);
	}
	
	/**
	 * run the search
	 * 
	 * @return \GoogleSearchWrapper\Service\Search
	 */
	public function run() {
		$this->httpfulResponse = $this->httpfulRequest->send();
		$this->result = new Result($this->httpfulResponse, $this);
		return $this->result;
	}
	
	/**
	 * build the request object with default settings
	 * 
	 * @return void
	 */
	private function buildRequest() {
		$this->httpfulRequest = \Httpful\Request::get($this->getUrl())
				->expects('json')
				->autoParse(false);
	}

	/**
	 * build a new search object
	 * 
	 * @param string $query search 
	 * @return \GoogleSearchWrapper\Service\Search
	 */
	public static function search($query) {
		$search = new Search();
		$search->setQuery($query);
		$search->buildRequest();
		return $search;
	}
}
