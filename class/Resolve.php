<?php
/**
 * summary
 */
class Resolve extends SQL
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function resolve($full_url)
    {
        $result=parent::resolve_find($full_url, 200, 1);
        if ($result) {
            return $result;
        } else {
            $result=parent::resolve_find($full_url, 301, -1);
            if ($result) {
                header("Location: http://".$result["target_url"]);
            } else {
                header("Location: notfound.php");
            }
        }
    }
}
