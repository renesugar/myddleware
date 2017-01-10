<?php
/*********************************************************************************
 * This file is part of Myddleware.

 * @package Myddleware
 * @copyright Copyright (C) 2013 - 2015  Stéphane Faure - CRMconsult EURL
 * @copyright Copyright (C) 2015 - 2016  Stéphane Faure - Myddleware ltd - contact@myddleware.com
 * @link http://www.myddleware.com	
 
 This file is part of Myddleware.
 
 Myddleware is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 Myddleware is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Myddleware.  If not, see <http://www.gnu.org/licenses/>.
*********************************************************************************/

namespace Myddleware\RegleBundle\Solutions;

class mysqlcore extends database {
	
	protected $driver = 'mysql';
	
	protected $fieldName = 'Field';
	protected $fieldLabel = 'Field';
	protected $fieldType = 'Type';
	
	// Generate query
	protected function get_query_show_tables() {
		return 'SHOW TABLES FROM '.$this->dbname;
	}
	
	// Query to get all the flieds of the table
	protected function get_query_describe_table($table) {
		return 'DESCRIBE `'.$table.'`';
	}
	
	// Get the header of an insert query
	protected function get_query_create_table_header($table) {
		return  "CREATE TABLE ".$param['rule']['name_slug']." (
			id int not null IDENTITY(1, 1) PRIMARY KEY,
			date_modified smalldatetime default CURRENT_TIMESTAMP,";
	}
	
	// Get the header of an insert query
	protected function get_query_insert_header($table) {
		return  "INSERT INTO `".$table."` ("; ;
	}
	
}// class mysqlcore

/* * * * * * * *  * * * * * *  * * * * * * 
	si custom file exist alors on fait un include de la custom class
 * * * * * *  * * * * * *  * * * * * * * */
$file = __DIR__.'/../Custom/Solutions/mysql.php';
if(file_exists($file)){
	require_once($file);
}
else {
	//Sinon on met la classe suivante
	class mysql extends mysqlcore {
		
	}
} 