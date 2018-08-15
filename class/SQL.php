<?php
require 'Database.php';
/**
 * 
 */
class SQL extends Database
{
	function __construct()
	{
		parent::__construct();
	}
	function insert($array)
	{
		$this->db->probamunka->insertOne($array);
	}
}
?>