<?php

class Set_time_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function time_current_ge() {
        $sql = "SELECT * FROM `check_time_geregis`WHERE `typesubject`='ge'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }


    public function time_current_sc() {
        $sql = "SELECT * FROM `check_time_geregis`WHERE `typesubject`='sc'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function update($date_start,$date_stop,$type) {

        $sqlUpdate = "UPDATE `between_post_geregis` SET `date_start` = '$date_start',`date_stop` = '$date_stop' WHERE `typesubject` = '$type'";
        $result = $this->db->query($sqlUpdate);
        if ($result) {

            echo json_encode(array('success'=>true));
        } else {
            echo json_encode(array('errorSql'=>'มีข้อผิดพลาด Update เวลาลงทะเบียนไม่ได้.'));
        }
    }

}
