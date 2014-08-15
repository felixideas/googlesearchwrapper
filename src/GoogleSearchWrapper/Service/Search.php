<?php
/*
 * Copyright (C) 2014 Jonas Felix
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

namespace GoogleSearchWrapper;

/**
 * Description of newPHPClass
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
	 * 
	 */
	private function __construct() {
	}
	
	public function query($query) {
		$this->query = $query;
	}
	
	public static function search($query) {
		$search = new Search();
		$seqrch->query($query);
		return $search;
	}
}