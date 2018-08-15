<?php 
/**
 * 
 */
class Database
{
	public $db;

	function __construct()
	{
		$this->db=(new MongoDB\Client())->probamunka;
	}
}
?>