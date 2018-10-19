<?php

class Schedule_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function resumes()
    {
        $sql = "SELECT
SUM(CASE WHEN LEFT(`sub_id`,4)='GELA' OR LEFT(`sub_id`,4)='gela' THEN 3 ELSE 0 END) AS 'GELA',
SUM(CASE WHEN LEFT(`sub_id`,4)='GEHU' OR LEFT(`sub_id`,4)='gehu' THEN 3 ELSE 0 END) AS 'GEHU',
SUM(CASE WHEN LEFT(`sub_id`,4)='GESO' OR LEFT(`sub_id`,4)='geso'  THEN 3 ELSE 0 END) AS 'GESO',
SUM(CASE WHEN LEFT(`sub_id`,4)='GESC' OR LEFT(`sub_id`,4)='gesc' THEN 3 ELSE 0 END) AS 'GESC'
FROM `ge_regis`
WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "'";
        // base64_encode($user['STUDENT_CODE']);
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function chooselimit()
    {
        $stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
        $sql = "SELECT count(`sub_id`)AS `sub_id` FROM `plans_sec` WHERE `stu_sec`='$stu_id' AND `term`='2' AND `y_thai`='2561' AND LEFT(`sub_id`,4)='GExx'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function learned()
    {
        $sql = "SELECT if((LEFT(`sub_id`,4)='GELA'),_utf8'1',if((LEFT(`sub_id`,4)='GEHU'),_utf8'2',if((LEFT(`sub_id`,4)='GESO'),_utf8'3',if((LEFT(`sub_id`,4)='GESC'),_utf8'4',_utf8'5')))) AS `order`, `sub_id`,`sub_text`,`term`FROM `list_person_schedule` WHERE`student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND LEFT(`sub_id`,2)='GE' ORDER BY `order` ASC";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function index()
    {
        $sql = "SELECT `sub_id` FROM `ge_regis` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `term`='2/2561' ORDER BY `term`";
        if (sizeof($this->db->to_Object($sql)) == 0) {
            $this->chk_subjects();
        }
    }

    public function chk_subjects()
    {
        $stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
        $sql = "SELECT `sub_id`,`t_no` FROM `teach` WHERE `sec_stu`='$stu_id' AND `term`='2/2561' AND LEFT(`sub_id`,2)<>'GE'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $addsubjects) {
                $this->addsubjects($addsubjects['sub_id'], $addsubjects['t_no']);
            }
        }
    }

    public function addsubjects($sub_id, $t_no)
    {
        $sqlinsert = "INSERT INTO `ge_regis` (`student_ID`,`sub_id`,`t_no`,`term`,`au_id`,`sys_creation_date`) VALUES ('" . base64_decode($_SESSION['user_id']) . "','$sub_id','$t_no','2/2561','" . base64_decode($_SESSION['user_id']) . "',NOW())";
        if ($this->db->query($sqlinsert)) {
        } else {
            echo json_encode(array('errorSql' => 'มีข้อผิดพลาด ลงทะเบียนไม่ได้.'));
        }
    }

    public function nottime()
    {
        $sql = "SELECT `DiffStart` FROM `check_time_geregis` WHERE `typesubject`='sc'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $chktime) {
                return $chktime['DiffStart'];
            }
        }
    }

    public function overtime()
    {
        $sql = "SELECT `DiffStop` FROM `check_time_geregis` WHERE `typesubject`='sc'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $chktime) {
                return $chktime['DiffStop'];
            }
        }
    }
}
