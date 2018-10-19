<?php

class Ge_open_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function gela_open()
    {
        //$rows = array();
        $sql = "select
`subjects`.`sub_id` AS `sub_id`,
`subjects`.`sub_text` AS `sub_text`,
if((`teach`.`day_teach` = 1),_utf8'จันทร์',if((`teach`.`day_teach` = 2),_utf8'อังคาร',if((`teach`.`day_teach` = 3),_utf8'พุธ',if((`teach`.`day_teach` = 4),_utf8'พฤหัสบดี',if((`teach`.`day_teach` = 5),_utf8'ศุกร์',if((`teach`.`day_teach` = 6),_utf8'เสาร์',if((`teach`.`day_teach` = 7),_utf8'อาทิตย์',_utf8'ไม่ระบุ'))))))) AS `d`,
`teach`.`day_teach` AS `day_teach`,
concat(`teach`.`startblock`,'-',`teach`.`endblock`) AS `blocks`,
`teach`.`startblock` AS `startblock`,
`teach`.`endblock` AS `endblock`,
`teach`.`term` AS `term`,
SUBSTRING_INDEX(GROUP_CONCAT(concat(`teach`.`t_no`) ORDER BY `teach`.`t_no`), ',', -1)AS `t_no`,
GROUP_CONCAT( DISTINCT(`teach`.`sec_stu`) ORDER BY `teach`.`t_no`) as`sec_stu`,
`teach`.`rec_no` AS `rec_no`,
`teach`.`section` AS `section`,
SUM(DISTINCT(`teach`.`cou_now`)) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GELA' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function gehu_open()
    {
        //$rows = array();
        $sql = "select
`subjects`.`sub_id` AS `sub_id`,
`subjects`.`sub_text` AS `sub_text`,
if((`teach`.`day_teach` = 1),_utf8'จันทร์',if((`teach`.`day_teach` = 2),_utf8'อังคาร',if((`teach`.`day_teach` = 3),_utf8'พุธ',if((`teach`.`day_teach` = 4),_utf8'พฤหัสบดี',if((`teach`.`day_teach` = 5),_utf8'ศุกร์',if((`teach`.`day_teach` = 6),_utf8'เสาร์',if((`teach`.`day_teach` = 7),_utf8'อาทิตย์',_utf8'ไม่ระบุ'))))))) AS `d`,
`teach`.`day_teach` AS `day_teach`,
concat(`teach`.`startblock`,'-',`teach`.`endblock`) AS `blocks`,
`teach`.`startblock` AS `startblock`,
`teach`.`endblock` AS `endblock`,
`teach`.`term` AS `term`,
SUBSTRING_INDEX(GROUP_CONCAT(concat(`teach`.`t_no`) ORDER BY `teach`.`t_no`), ',', -1)AS `t_no`,
GROUP_CONCAT( DISTINCT(`teach`.`sec_stu`) ORDER BY `teach`.`t_no`) as`sec_stu`,
`teach`.`rec_no` AS `rec_no`,
`teach`.`section` AS `section`,
SUM(DISTINCT(`teach`.`cou_now`)) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GEHU' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function geso_open()
    {
        //$rows = array();
        $sql = "select
`subjects`.`sub_id` AS `sub_id`,
`subjects`.`sub_text` AS `sub_text`,
if((`teach`.`day_teach` = 1),_utf8'จันทร์',if((`teach`.`day_teach` = 2),_utf8'อังคาร',if((`teach`.`day_teach` = 3),_utf8'พุธ',if((`teach`.`day_teach` = 4),_utf8'พฤหัสบดี',if((`teach`.`day_teach` = 5),_utf8'ศุกร์',if((`teach`.`day_teach` = 6),_utf8'เสาร์',if((`teach`.`day_teach` = 7),_utf8'อาทิตย์',_utf8'ไม่ระบุ'))))))) AS `d`,
`teach`.`day_teach` AS `day_teach`,
concat(`teach`.`startblock`,'-',`teach`.`endblock`) AS `blocks`,
`teach`.`startblock` AS `startblock`,
`teach`.`endblock` AS `endblock`,
`teach`.`term` AS `term`,
SUBSTRING_INDEX(GROUP_CONCAT(concat(`teach`.`t_no`) ORDER BY `teach`.`t_no`), ',', -1)AS `t_no`,
GROUP_CONCAT( DISTINCT(`teach`.`sec_stu`) ORDER BY `teach`.`t_no`) as`sec_stu`,
`teach`.`rec_no` AS `rec_no`,
`teach`.`section` AS `section`,
SUM(DISTINCT(`teach`.`cou_now`)) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GESO' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function gesc_open()
    {
        //$rows = array();
        $sql = "select
`subjects`.`sub_id` AS `sub_id`,
`subjects`.`sub_text` AS `sub_text`,
if((`teach`.`day_teach` = 1),_utf8'จันทร์',if((`teach`.`day_teach` = 2),_utf8'อังคาร',if((`teach`.`day_teach` = 3),_utf8'พุธ',if((`teach`.`day_teach` = 4),_utf8'พฤหัสบดี',if((`teach`.`day_teach` = 5),_utf8'ศุกร์',if((`teach`.`day_teach` = 6),_utf8'เสาร์',if((`teach`.`day_teach` = 7),_utf8'อาทิตย์',_utf8'ไม่ระบุ'))))))) AS `d`,
`teach`.`day_teach` AS `day_teach`,
concat(`teach`.`startblock`,'-',`teach`.`endblock`) AS `blocks`,
`teach`.`startblock` AS `startblock`,
`teach`.`endblock` AS `endblock`,
`teach`.`term` AS `term`,
SUBSTRING_INDEX(GROUP_CONCAT(concat(`teach`.`t_no`) ORDER BY `teach`.`t_no`), ',', -1)AS `t_no`,
GROUP_CONCAT( DISTINCT(`teach`.`sec_stu`) ORDER BY `teach`.`t_no`) as`sec_stu`,
`teach`.`rec_no` AS `rec_no`,
`teach`.`section` AS `section`,
SUM(DISTINCT(`teach`.`cou_now`)) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GESC' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function resumes()
    {
        $sql = "SELECT
9-SUM(CASE WHEN LEFT(`sub_id`,4)='GELA' OR LEFT(`sub_id`,4)='gela' THEN 3 ELSE 0 END) AS 'GELA',
6-SUM(CASE WHEN LEFT(`sub_id`,4)='GEHU' OR LEFT(`sub_id`,4)='gehu' THEN 3 ELSE 0 END) AS 'GEHU',
6-SUM(CASE WHEN LEFT(`sub_id`,4)='GESO' OR LEFT(`sub_id`,4)='geso'  THEN 3 ELSE 0 END) AS 'GESO',
9-SUM(CASE WHEN LEFT(`sub_id`,4)='GESC' OR LEFT(`sub_id`,4)='gesc' THEN 3 ELSE 0 END) AS 'GESC'
FROM `ge_regis`
WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "'";
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

    public function choosenow()
    {
        $sql = "SELECT count(`sub_id`)AS `sub_id` FROM `ge_regis` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `term`='2/2561' AND LEFT(`sub_id`,2)='GE'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function geregis($sub_id, $t_no, $day_teach, $startblock, $endblock, $section)
    {
        if ($this->nottime() > 0) {
            echo json_encode(array('errorlimitchoose' => 'ยังไม่ถึงเวลาลงทะเบียนครับ'));
            return;
        }

        if ($this->nottime() <= 0 && $this->model->overtime() <= 0) {
            echo json_encode(array('errorlimitchoose' => 'เกินกำหนดระยะเวลาลงทะเบียนแล้วครับ'));
            return;
        }

        if ($this->choosenow() >= $this->chooselimit()) {
            echo json_encode(array('errorlimitchoose' => 'ลงทะเบียนครบตามจำนวนที่เลือกได้แล้วครับ'));
            return;
        }
        if ($this->sum_units_mow() >= 20) {
            echo json_encode(array('errorlimitchoose' => 'ถ้าลงทะเบียนรายวิชานี้ หน่วยกิตจะเกิน 22 ครับ'));
            return;
        }

        $count_stu_limit = $this->count_stu_insec($t_no) + 1;
        if ($count_stu_limit > 40) {
            echo json_encode(array('errorlimit' => 'section ' . $section . ' เต็มแล้วครับ'));
            return;
        }
        if ($this->chk_student_schedule($day_teach, $startblock, $endblock) > 0) {
            echo json_encode(array('errorblockbusy' => 'คาบ ' . $startblock . ' - ' . $endblock . ' ของ ' . $sub_id . ' ที่เลือก ไม่วางครับ'));
            return;
        }
        if ($this->count_stu_learned($sub_id) == 1) {
            echo json_encode(array('errorlearned' => 'รายวิชา ' . $sub_id . ' นี้ เรียนแล้วครับ'));
            return;
        }
        $sqlinsert = "INSERT INTO `ge_regis` (`student_ID`,`sub_id`,`t_no`,`term`,`au_id`,`sys_creation_date`) VALUES ('" . base64_decode($_SESSION['user_id']) . "','$sub_id','$t_no','2/2561','" . base64_decode($_SESSION['user_id']) . "',NOW())";
        if ($this->db->query($sqlinsert)) {
            $sqlUpdate = "UPDATE `coursess`.`teach` SET `cou_now` = '$count_stu_limit' WHERE `teach`.`t_no` = '$t_no'";
            if ($this->db->query($sqlUpdate)) {
                echo json_encode(array('success' => true));
            }
        } else {
            echo json_encode(array('errorMsg' => 'มีข้อผิดพลาด ลงทะเบียนไม่ได้.'));
        }
    }


    public function sum_units_mow()
    {
        $sql = "SELECT SUM(`subjects`.`sub_units`)AS`sum_units`
  FROM `ge_regis`
  LEFT JOIN `teach` ON`ge_regis`.`t_no`=`teach`.`t_no`
  left JOIN `subjects` ON `teach`.`rec_no` = `subjects`.`rec_no`
  WHERE `ge_regis`.`student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `ge_regis`.`term`='2/2561'
  GROUP BY `ge_regis`.`term`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $sum_units) {
                return $sum_units['sum_units'];
            }
        }
    }



    public function count_stu_insec($t_no)
    {
        $sql = "SELECT `cou_now` FROM `teach` WHERE `t_no`='$t_no'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $cou_now) {
                return $cou_now['cou_now'];
            }
        }
    }

    public function count_stu_learned($sub_id)
    {
        $sql = "SELECT `student_ID` FROM `ge_regis` WHERE `sub_id`='$sub_id' AND `student_ID`='" . base64_decode($_SESSION['user_id']) . "'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function chk_student_schedule($day_teach, $startblock, $endblock)
    {
        $stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
        $time_teach = [];
        $time_learn = [];
        $sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`sec_stu`='$stu_id' AND `day_teach`='" . $day_teach . "') AND (term='2/2561') ORDER BY `startblock`";
        $result_chk = 0;
        foreach ($this->db->to_Object($sqlCommand) as $chkt) {
            for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
                array_push($time_teach, $i);
            }
        }
        for ($a = $startblock; $a <= $endblock; $a++) {
            array_push($time_learn, $a);
        }
        foreach ($time_teach as $value_teach) {
            foreach ($time_learn as $value_learn) {
                if ($value_teach == $value_learn) {
                    $result_chk++;
                }
            }
        }
        return $result_chk; //คืนค่า ไม่ >0 ก็ 0
    }

    public function nottime()
    {
        $sql = "SELECT `DiffStart` FROM `check_time_geregis`WHERE `typesubject`='ge'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $chktime) {
                return $chktime['DiffStart'];
            }
        }
    }

    public function overtime()
    {
        $sql = "SELECT `DiffStop` FROM `check_time_geregis`WHERE `typesubject`='ge'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $chktime) {
                return $chktime['DiffStop'];
            }
        }
    }

    public function manageregis($student_ID)
    {
        $result = array();
        $sql = "select `ge_regis`.`student_ID` AS `student_ID`,`ge_regis`.`t_no` as `t_no`,
`ge_regis`.`sub_id` AS `sub_id`,
`subjects`.`sub_text` AS `sub_text`,
if((`teach`.`day_teach` = 1),_utf8'จันทร์',if((`teach`.`day_teach` = 2),_utf8'อังคาร',if((`teach`.`day_teach` = 3),_utf8'พุธ',if((`teach`.`day_teach` = 4),_utf8'พฤหัสบดี',if((`teach`.`day_teach` = 5),_utf8'ศุกร์',if((`teach`.`day_teach` = 6),_utf8'เสาร์',if((`teach`.`day_teach` = 7),_utf8'อาทิตย์',_utf8'ไม่ระบุ'))))))) AS `d`,
concat(`teach`.`startblock`,'-',`teach`.`endblock`) AS `blocks`,
`ge_regis`.`term`
from `ge_regis` LEFT join `teach` on`ge_regis`.`t_no` = `teach`.`t_no`
LEFT JOIN `subjects` on`teach`.`rec_no` = `subjects`.`rec_no` WHERE`ge_regis`.`student_ID`='$student_ID' AND `ge_regis`.`term`='2/2561' ORDER BY `term`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            $result["rows"] = $this->db->to_Object($sql);
            $result["name"] = $this->check_stuID_Info($student_ID);
            echo json_encode($result);
        }
    }

    public function chk_subjects($student_ID)
    {
        $stu_id = substr($student_ID, 0, 10);
        $sql = "SELECT `sub_id`,`t_no` FROM `teach` WHERE `sec_stu`='$stu_id' AND `term`='2/2561' AND LEFT(`sub_id`,2)<>'GE'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $addsubjects) {
                //echo json_encode(array('errorSql' => '2'));
                $this->addsubjects($student_ID, $addsubjects['sub_id'], $addsubjects['t_no']);
            }
            //$this->manageregis($student_ID);
        }
    }

    public function addsubjects($student_ID, $sub_id, $t_no)
    {
        $sqlinsert = "INSERT INTO `ge_regis` (`student_ID`,`sub_id`,`t_no`,`term`,`au_id`,`sys_creation_date`) VALUES ('$student_ID','$sub_id','$t_no','2/2561','" . base64_decode($_SESSION['user_id']) . "',NOW())";
        if ($this->db->query($sqlinsert)) {
        } else {
            echo "errorSqlsch";

            return;
        }
    }

    public function check_stuID($student_ID)
    {
        $sql = "SELECT * FROM `student_geregis` WHERE `STUDENT_CODE` ='$student_ID'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findstu($student_ID)
    {
        if ($this->check_stuID($student_ID) == 1) {
            $result = array();

            $sql = "select `ge_regis`.`student_ID` AS `student_ID`,`ge_regis`.`t_no` as `t_no`,
`ge_regis`.`sub_id` AS `sub_id`,`subjects`.`sub_text` AS `sub_text`,if((`teach`.`day_teach` = 1),_utf8'จันทร์',if((`teach`.`day_teach` = 2),_utf8'อังคาร',if((`teach`.`day_teach` = 3),_utf8'พุธ',if((`teach`.`day_teach` = 4),_utf8'พฤหัสบดี',if((`teach`.`day_teach` = 5),_utf8'ศุกร์',if((`teach`.`day_teach` = 6),_utf8'เสาร์',if((`teach`.`day_teach` = 7),_utf8'อาทิตย์',_utf8'ไม่ระบุ'))))))) AS `d`,
concat(`teach`.`startblock`,'-',`teach`.`endblock`) AS `blocks`,`ge_regis`.`term` from `ge_regis` LEFT join `teach` on`ge_regis`.`t_no` = `teach`.`t_no`
LEFT JOIN `subjects` on`teach`.`rec_no` = `subjects`.`rec_no` WHERE`ge_regis`.`student_ID`='$student_ID' AND `ge_regis`.`term`='2/2561' ORDER BY `term`";
            if (sizeof($this->db->to_Object($sql)) == 0) {
                $this->chk_subjects($student_ID);
                $this->manageregis($student_ID);
            } else {
                //echo json_encode($this->db->to_Object($sql));
                $result["rows"] = $this->db->to_Object($sql);
                $result["name"] = $this->check_stuID_Info($student_ID);
                echo json_encode($result);
            }
        } else {
            echo json_encode(array('errorSql' => 'ไม่พบข้อมูลนักศึกษา กรุณาตรวจสอบ.'));
            //echo "errorChkstu";
            return;
        }
    }

    public function check_stuID_Info($student_ID)
    {
        $sql = "SELECT * FROM `student_geregis` WHERE `STUDENT_CODE` ='$student_ID'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function delete_subject($student_ID, $sub_id, $t_no)
    {
        if ($this->check_before_delete($student_ID, $sub_id, $t_no) == false) {
            echo json_encode(array('errorMsg' => 'มี ADMIN ท่านอื่นลบข้อมูลนี้ไปแล้วครับ'));
            return;
        }
        if (substr($sub_id, 0, 2) == "GE") {
            if ($this->update_counow_then_delete_subject($t_no) == false) {
                echo json_encode(array('errorMsg' => 'ไม่สามารถลบข้อมูลได้ update counow.'));
                return;
            }
        }
        $sql = "DELETE FROM `ge_regis` WHERE `student_ID` ='$student_ID' AND `sub_id`='$sub_id' AND `t_no`='$t_no' AND `term`='2/2561'";
        $result = $this->db->query($sql);
        if ($result) {
            echo json_encode(array('success' => true));
        //echo json_encode(array('success'=>true));
        } else {
            echo json_encode(array('errorMsg' => 'ไม่สามารถลบข้อมูลได้.'));
        }
    }

    public function update_counow_then_delete_subject($t_no)
    {
        $count_stu_limit = $this->count_stu_insec($t_no) - 1;
        $sqlUpdate = "UPDATE `coursess`.`teach` SET `cou_now` = '$count_stu_limit' WHERE `teach`.`t_no` = '$t_no'";
        $result = $this->db->query($sqlUpdate);
        if ($result) {
            return true;
        //echo json_encode(array('success'=>true));
        } else {
            return false;
        }
    }

    public function check_before_delete($student_ID, $sub_id, $t_no)
    {
        $sqlUpdate = "SELECT  `student_ID` FROM `ge_regis` WHERE `student_ID` ='$student_ID' AND `sub_id`='$sub_id' AND `t_no`='$t_no' AND `term`='2/2561'";
        if (sizeof($this->db->to_Object($sqlUpdate)) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
