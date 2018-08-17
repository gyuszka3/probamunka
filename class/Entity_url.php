<?php 
/**
 * summary
 */
class Entity_url extends SQL
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function get_ids($entity_type)
    {
    	$result=parent::get_entityId($entity_type);

    	return $result;
    }
}
?>