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
 * The Result of a Google Search
 *
 * @author jf
 */
class Result {
	/**
	 * @var \Httpful\Response  
	 */
	public $httpfulResponse;
	
	/**
	 * @var \felixideas\GoogleSearchWrapper\Search
	 */
	public $search;
	
	/**
	 * 
	 * @param \Httpful\Response $httpfulResponse
	 * @param \felixideas\GoogleSearchWrapper\Search $search
	 */
	public function __construct($httpfulResponse, $search) {
		$this->search = $search;
		$this->httpfulResponse = $httpfulResponse;
	}
	

	/**
	 * return the result as associative array
	 * 
	 * @return array search result
	 */
	public function getAssoc() {
		return json_decode($this->httpfulResponse->body, true);
	}
}
