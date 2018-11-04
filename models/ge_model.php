<?php

class Ge_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function gela_open() {
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
SUM(`teach`.`cou_now`) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`,
`teach`.`date_test` AS `date_test`,
`teach`.`time_test` AS `time_test`,
if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) AS `time_id`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GELA' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011') OR LEFT(`teach`.`sec_stu`,4)='6111')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function gehu_open() {
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
SUM(`teach`.`cou_now`) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`,
`teach`.`date_test` AS `date_test`,
`teach`.`time_test` AS `time_test`,
if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) AS `time_id`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GEHU' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011') OR LEFT(`teach`.`sec_stu`,4)='6111')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function geso_open() {
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
SUM(`teach`.`cou_now`) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`,
`teach`.`date_test` AS `date_test`,
`teach`.`time_test` AS `time_test`,
if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) AS `time_id`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GESO' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011') OR LEFT(`teach`.`sec_stu`,4)='6111')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function gesc_open() {
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
SUM(`teach`.`cou_now`) AS `cou_now`,
SUM(DISTINCT(`teach`.`limits`)) AS `limits`,
`teach`.`r_no` AS `r_no`,
GROUP_CONCAT(DISTINCT(concat(`tbrank`.`rank_name`,`teachers`.`tea_Name`))) AS `tea_Name`,
`teach`.`date_test` AS `date_test`,
`teach`.`time_test` AS `time_test`,
if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) AS `time_id`
from `teach` join `subjects` on`teach`.`rec_no` = `subjects`.`rec_no`
LEFT JOIN `teach_detail` ON `teach`.`t_no`=`teach_detail`.`t_no`
LEFT JOIN `teachers`ON `teach_detail`.`tea_id`=`teachers`.`tea_ID`
LEFT JOIN `tbrank` ON `teachers`.`tea_Rank`=`tbrank`.`rank_id`
WHERE LEFT(`teach`.`sub_id`, 4)='GESC' AND  `teach`.`term`='2/2561' AND(LEFT(`teach`.`sec_stu`,4)='5911' OR LEFT(`teach`.`sec_stu`,4)='6011') OR LEFT(`teach`.`sec_stu`,4)='6111')
GROUP BY `teach`.`sub_id`,`teach`.`section`
ORDER BY `teach`.`sub_id`,`teach`.`day_teach`";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function resumes() {
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

    public function chooselimit() {
        $stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
        $sql = "SELECT count(`sub_id`)AS `sub_id` FROM `plans_sec` WHERE `stu_sec`='$stu_id' AND `term`='2' AND `y_thai`='2561' AND LEFT(`sub_id`,4)='GExx'";
       
            foreach ($this->db->to_Object($sql) as $cou_now) {
                return $cou_now['sub_id'];
            }
           // return $this->db->to_Object($sql);
        
    }

    public function choosenow() {
        $sql = "SELECT count(`sub_id`)AS `sub_id` FROM `ge_regis` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `term`='2/2561' AND LEFT(`sub_id`,2)='GE'";
        // if (sizeof($this->db->to_Object($sql)) > 0) {
        //     return $this->db->to_Object($sql);
        // }
        foreach ($this->db->to_Object($sql) as $cou_now) {
            return $cou_now['sub_id'];
        }
    }

    public function geregis($sub_id, $t_no, $day_teach, $startblock, $endblock, $section,$date_test,$time_id) {
       

      if ($this->nottime() > 0) {
        echo json_encode(array('errorlimitchoose' => 'ยังไม่ถึงเวลาลงทะเบียนครับ'));
        return;
      }

       if ($this->nottime() <= 0 && $this->overtime() <= 0) {
        echo json_encode(array('errorlimitchoose' => 'เกินกำหนดระยะเวลาลงทะเบียนแล้วครับ'));
        return;
      }

      $chooselimit= $this->chooselimit();
      $choosenow= $this->choosenow();

      if ($chooselimit== 0) {
        echo json_encode(array('errorlimitchoose' => 'แผนการเรียนในเทอมนี้ของคุณ ไม่มีสิทธิ์เลือกรายวิชา GE ครับ'));
        return;
      }

      if ($choosenow >= $chooselimit) {
        echo json_encode(array('errorlimitchoose' => 'เลือกรายวิชา GE ครบตามแผนการเรียนในเทอมนี้แล้วครับ'));
        return;
    }
        if ($this->sum_units_mow() >= 20) {
          echo json_encode(array('errorlimitchoose' => 'ถ้าลงทะเบียนรายวิชานี้ หน่วยกิตจะเกิน 22 ครับ'));
          return;
        }

        $count_stu_limit = $this->count_stu_insec($sub_id,$section) + 1;
        $limit_stu_insec = $this->limit_stu_insec($sub_id,$section);

 
        if ($count_stu_limit > $limit_stu_insec) {
            echo json_encode(array('errorlimit' => 'section ' . $section . ' เต็มแล้วครับ'));
            return;
        }
        if ($this->chk_student_schedule($day_teach, $startblock, $endblock) > 0) {
            echo json_encode(array('errorblockbusy' => 'คาบ ' . $startblock . ' - ' . $endblock . ' ของ ' . $sub_id . ' ที่เลือก ไม่วางครับ'));
            return;
        }

        if ($this->chk_time_test($date_test, $time_id) > 0) {
            echo json_encode(array('errorblockbusy' => 'วันและเวลาสอบของ ' . $sub_id . ' ที่เลือก ตรงกับรายวิชาอื่นที่เลือกไปแล้วครับ'));
            return;
        }

        if ($this->count_stu_learned($sub_id) == 1) {
            echo json_encode(array('errorlearned' => 'รายวิชา ' . $sub_id . ' นี้ เรียนแล้วครับ'));
            return;
        }

        $count_stu_limit_update = $this->count_stu_insec_update($t_no) + 1;

        $sqlinsert = "INSERT INTO `ge_regis` (`student_ID`,`sub_id`,`t_no`,`term`,`au_id`,`sys_creation_date`) VALUES ('" . base64_decode($_SESSION['user_id']) . "','$sub_id','$t_no','2/2561','" . base64_decode($_SESSION['user_id']) . "',NOW())";
        if ($this->db->query($sqlinsert)) {
            $sqlUpdate = "UPDATE `coursess`.`teach` SET `cou_now` = '$count_stu_limit_update' WHERE `teach`.`t_no` = '$t_no'";
            if ($this->db->query($sqlUpdate)) {
                echo json_encode(array('success' => true));
            }
        } else {
            echo json_encode(array('errorMsg' => 'มีข้อผิดพลาด ลงทะเบียนไม่ได้.'));
        }
    }


    public function sum_units_mow() {
      $sql = "SELECT SUM(`subjects`.`sub_units`)AS`sum_units`
  FROM `ge_regis`
  LEFT JOIN `teach` ON `ge_regis`.`t_no`=`teach`.`t_no`
  left JOIN `subjects` ON `teach`.`rec_no` = `subjects`.`rec_no`
  WHERE `ge_regis`.`student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `ge_regis`.`term`='2/2561'
  GROUP BY `ge_regis`.`term`";
      if (sizeof($this->db->to_Object($sql)) > 0) {
          foreach ($this->db->to_Object($sql) as $sum_units) {
              return $sum_units['sum_units'];
          }
      }
    }



    public function count_stu_insec($sub_id,$section) {
        $sql = "SELECT SUM(`cou_now`) AS `cou_now` FROM `teach` WHERE `sub_id`='$sub_id' AND `section`='$section' AND `term`='2/2561'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $cou_now) {
                return $cou_now['cou_now'];
            }
        }
    }


    public function limit_stu_insec($sub_id,$section) {
        $sql = "SELECT `limits` AS `limits` FROM `teach` WHERE `sub_id`='$sub_id' AND `section`='$section' AND `term`='2/2561'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $limits) {
                return $limits['limits'];
            }
        }
    }




    public function count_stu_insec_update($t_no) {
        $sql = "SELECT `cou_now` FROM `teach` WHERE `t_no`='$t_no'AND `term`='2/2561'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $cou_now) {
                return $cou_now['cou_now'];
            }
        }
    }

    public function count_stu_learned($sub_id) {
        $sql = "SELECT `student_ID` FROM `ge_regis` WHERE `sub_id`='$sub_id' AND `student_ID`='" . base64_decode($_SESSION['user_id']) . "'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function chk_student_schedule($day_teach, $startblock, $endblock) {
        //$stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
        $time_teach = [];
        $time_learn = [];
        $sqlCommand = "SELECT `teach`.`startblock`, `teach`.`endblock`, `teach`.`sub_id` FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='2/2561' AND `day_teach`='" . $day_teach . "' ORDER BY `startblock`";

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

    public function chk_time_test($date_test, $time_id) {

        $sqlCommand = "SELECT count(`teach`.`sub_id`) AS 'count_date_test'
        FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no`
        WHERE `ge_regis`.`student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='2/2561' AND if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) ='" . $time_id . "'AND `teach`.`date_test`='" . $date_test . "'";
        /*$sqlCommand = "SELECT `teach`.`date_test`,if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) AS `time_id`
         FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='" . $Term . "' AND  ORDER BY `startblock`";*/

          foreach ($this->db->to_Object($sqlCommand) as $chk_date_test) {
          return $chk_date_test['count_date_test'];
        }
    }

    public function nottime() {
        $sql = "SELECT `DiffStart` FROM `check_time_geregis`WHERE `typesubject`='ge'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $chktime) {
                return $chktime['DiffStart'];
            }
        }
    }

    public function overtime() {
        $sql = "SELECT `DiffStop` FROM `check_time_geregis`WHERE `typesubject`='ge'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            foreach ($this->db->to_Object($sql) as $chktime) {
                return $chktime['DiffStop'];
            }
        }
    }

    public function manageregis($student_ID) {
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

    public function chk_subjects($student_ID) {
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

    public function addsubjects($student_ID, $sub_id, $t_no) {
        $sqlinsert = "INSERT INTO `ge_regis` (`student_ID`,`sub_id`,`t_no`,`term`,`au_id`,`sys_creation_date`) VALUES ('$student_ID','$sub_id','$t_no','2/2561','" . base64_decode($_SESSION['user_id']) . "',NOW())";
        if ($this->db->query($sqlinsert)) {

        } else {
            echo "errorSqlsch";

            return;
        }
    }

    public function check_stuID($student_ID) {
        $sql = "SELECT `STUDENT_CODE` FROM `student_geregis` WHERE `STUDENT_CODE` ='$student_ID'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findstu($student_ID) {

        if ($this->check_stuID($student_ID) == 1) {
            $result = array();
            $sql = "select `ge_regis`.`student_ID` AS `student_ID`,`ge_regis`.`t_no` as `t_no`,`teach`.`section` as `section`,
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

    public function check_stuID_Info($student_ID) {
        $sql = "SELECT * FROM `student_geregis` WHERE `STUDENT_CODE` ='$student_ID'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            return $this->db->to_Object($sql);
        }
    }

    public function delete_subject($student_ID, $sub_id, $t_no) {
        if ($this->check_before_delete($student_ID, $sub_id, $t_no) == false) {
            echo json_encode(array('errorMsg' => 'มี ADMIN ท่านอื่นลบข้อมูลนี้ไปแล้วครับ'));
            return;
        }
        if (substr($sub_id, 0, 2) == "GE") {
            if ($this->update_counow_then_delete_subject($t_no) == FALSE) {
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

    public function update_counow_then_delete_subject($t_no) {
        $count_stu_limit_update = $this->count_stu_insec_update($t_no) - 1;
        $sqlUpdate = "UPDATE `coursess`.`teach` SET `cou_now` = '$count_stu_limit_update' WHERE `teach`.`t_no` = '$t_no'";
        $result = $this->db->query($sqlUpdate);
        if ($result) {
            return true;
            //echo json_encode(array('success'=>true));
        } else {
            return false;
        }
    }

    public function check_before_delete($student_ID, $sub_id, $t_no) {

        $sqlUpdate = "SELECT  `student_ID` FROM `ge_regis` WHERE `student_ID` ='$student_ID' AND `sub_id`='$sub_id' AND `t_no`='$t_no' AND `term`='2/2561'";
        if (sizeof($this->db->to_Object($sqlUpdate)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function managepassword($student_ID) {
        $result = array();
        $sql = "SELECT * FROM `student_geregis` WHERE STUDENT_CODE`='$student_ID'";
        if (sizeof($this->db->to_Object($sql)) > 0) {
            $result["rows"] = $this->db->to_Object($sql);
            echo json_encode($result);
        }
    }
    public function findstupwd($student_ID) {
      $sql = "SELECT * FROM `student_geregis` WHERE `STUDENT_CODE` ='$student_ID'";
      if (sizeof($this->db->to_Object($sql)) > 0) {
        echo json_encode($this->db->to_Object($sql));
      }  else {
            echo json_encode(array('errorSql' => 'ไม่พบข้อมูลนักศึกษา กรุณาตรวจสอบ.'));
            return;
        }
    }


    public function update_password($student_ID, $stu_pwd) {

        $sqlUpdate = "UPDATE `coursess`.`student_geregis` SET `DATE_OF_BIRTH` = '$stu_pwd' WHERE `student_geregis`.`STUDENT_CODE` = '$student_ID'";
        $result = $this->db->query($sqlUpdate);
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('errorMsg' => 'ไม่สามารถแก้ไขรหัสผ่านได้.'));
        }
    }

}
