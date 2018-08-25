<?php
/**
 *
 */
class Del_old extends SQL
{
    public function __construct()
    {
        parent::__construct();
    }
    public function delete()
    {
        parent::delete_old();
    }
}
