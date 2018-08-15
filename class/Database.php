<?php 
/**
 * 
 */
class Database
{
	public $db;

	function __construct()
	{
		$db=new MongoDB\Client("mongodb:localhost:27017");
	}
}
?>