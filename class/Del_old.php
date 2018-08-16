<?php
/**
 * 
 */
class Del_old extends SQL
{
	
	function __construct()
	{
		parent::__construct();
	}
	function delete()
	{
		parent::delete_old();
	}
}
?>