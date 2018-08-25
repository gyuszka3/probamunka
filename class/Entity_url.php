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
    public function get_ids($entity_id)
    {
        $result=parent::get_entityId($entity_id);
        $data =[];
        foreach ($result as $value) {
            array_push($data, $value["fullUrl"]);
        }
        return $data;
    }
}
