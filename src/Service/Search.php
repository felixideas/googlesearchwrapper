<?php

/*
 * Copyright (C) 2014 Jonas Felix <jonas.felix@icloud.com>
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

namespace GoogleSearchWrapper\Service;

/**
 * Representing a search string
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
	 * return the result as associative array
	 * 
	 * @return array search result
	 */
	public function getAssoc() {
		return json_decode($this->response->body, true);
	}

	/**
	 * run the search
	 * 
	 * @return \GoogleSearchWrapper\Service\Search
	 */
	public function run() {
		$this->response = \Httpful\Request::get($this->getUrl())
				->expects('json')
				->autoParse(false)
				->send();
		return $this;
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
		return $search;
	}
}
