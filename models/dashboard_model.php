<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_ge_now()
    {
        $sql = "SELECT
LEFT(`sub_id`,4) AS `sub_id`,
SUM(CASE WHEN LEFT(`sub_id`,2) = 'GE' THEN `remain` ELSE 0 END) AS `cou_st`,
((40*COUNT(`sub_id`))-SUM(CASE WHEN `remain`<=40 THEN `remain` ELSE 40 END)) AS'remain',
(40*COUNT( `sub_id`)) AS `all`
FROM `list_sum_22561`
GROUP BY LEFT(`sub_id`,4)";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }
}
