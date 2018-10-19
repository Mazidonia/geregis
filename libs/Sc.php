<?php

class convert_dateClass
{
    public function convert_date_BE_to_AD($strDate)
    {
        $subdt = explode("-", $strDate);
        $yeardt = $subdt[2] - 543;
        $mdt = $subdt[1];
        $ddt = $subdt[0];
        $dt = \DateTime::createFromFormat('d-m-Y', $ddt . '-' . $mdt . '-' . $yeardt);
        $new_date = $dt->format('Y-m-d');
        return "'" . $new_date . "'";
    }
}

class getValueParam
{
    public function getparam($length)
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        //$length = count($url);
        switch ($length) {
            case 4:
                return $url[3];
                break;
            case 3:
                return $url[2];
                break;
            case 2:
                return $url[1];
                break;
            case 1:
                return $url[0];
                break;
            default:
                return false;
                break;
        }
        /*  if (empty($url[0])) {
          return false;
          } else {
          return $url[0];
          } */
    }
}

class getValueURL
{
    public function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $length = count($url);
        switch ($length) {
            case 4:
                return $url[0] . "/" . $url[1] . "/" . $url[2] . "/" . $url[3];
                break;
            case 3:
                return $url[0] . "/" . $url[1] . "/" . $url[2];
                break;
            case 2:
                return $url[0] . "/" . $url[1];
                break;
            case 1:
                return $url[0];
                break;
            default:
                return false;
                break;
        }
        /*  if (empty($url[0])) {
          return false;
          } else {
          return $url[0];
          } */
    }
}

function chk_student_learned($st, $sub_id)
{
    $result_chk = 0;
    $db = new Database();
    $sqlCommand = "SELECT`sub_id` FROM `ge_regis` WHERE `sub_id`='$sub_id'  AND `student_ID`='$st'";
    $result_chk = $db->count_rows($sqlCommand);
    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
}

function chk_student_only($st, $day, $Term, $block)
{
    $stu_id = substr($st, 0, 10);
    $db = new Database();
    $chk = [];
    //$sqlCommand = "SELECT `startblock`,`endblock`,`sub_id`,`r_no`,`Tnames` FROM `list_load_teacher_for_chk` WHERE (`sec_stu`='$stu_id' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $sqlCommand = "SELECT  `teach`.`t_no`,`teach`.`startblock`, `teach`.`endblock`, `teach`.`sub_id`, `teach`.`r_no` AS `r_no` FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='" . $Term . "' AND `day_teach`='" . $day . "' ORDER BY `startblock`";
    $result_chk = [];
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        unset($chk); //reset คาบ
        $chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($chk, $i);
        }
        $chk_array = count($chk); //หาจำนวน array
        $arraytrue = $chk_array - 1;
        // $k = 1;
        for ($p = 0; $p <= $arraytrue; $p++) { //เช็คคาบว่าชนไหม
            if ($chk[$p] == $block) {
                //$result_chk =  $chkt[sub_id];
                $result_chk["sub_id"] = "$chkt[sub_id]";
                $result_chk["r_no"] = "$chkt[r_no]";
                $result_chk["t_no"] = "$chkt[t_no]";
                //$result_chk["k"] = "$k";
            }
            //$k++;
        }
    }
    return $result_chk; //คืนค่า ไม่ 1 ก็ 0
    //return $chk;
}

function chk_student($st, $day, $Term, $blockstart, $blockend)
{
    //$stu_id = substr($st, 0, 10);
    $db = new Database();
    $time_teach = [];
    $time_learn = [];
    //$sqlCommand = "SELECT `startblock`,`endblock`,`sub_id` FROM `teach` WHERE (`sec_stu`='$stu_id' AND `day_teach`='" . $day . "') AND (term='" . $Term . "') ORDER BY `startblock`";
    $sqlCommand = "SELECT `teach`.`startblock`, `teach`.`endblock`, `teach`.`sub_id` FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='" . $Term . "' AND `day_teach`='" . $day . "' ORDER BY `startblock`";

    $result_chk = 0;
    foreach ($db->to_Object($sqlCommand) as $chkt) {
        //$result = count($b);
        //unset($chk); //reset คาบ
        //$chk = []; //สร้างตัวแปรใหม่
        for ($i = $chkt[startblock]; $i <= $chkt[endblock]; $i++) {
            array_push($time_teach, $i);
        }
    }
    for ($a = $blockstart; $a <= $blockend; $a++) {
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


function chk_date_test($date_test, $time_id)
{
    //$stu_id = substr($st, 0, 10);
    $db = new Database();
    $sqlCommand = "SELECT count(`teach`.`sub_id`) AS 'count_date_test' ,`teach`.`date_test`
    FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no`
    WHERE `ge_regis`.`student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='2/2561' AND if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) ='" . $time_id . "'AND `teach`.`date_test`='" . $date_test . "'";
    /*$sqlCommand = "SELECT `teach`.`date_test`,if((`teach`.`time_test` = '09.00-10.30'),_utf8'1',if((`teach`.`time_test` = '11.00-12.30'),_utf8'2',if((`teach`.`time_test` = '13.30-15.00'),_utf8'3',if((`teach`.`time_test` = '15.30-17.00'),_utf8'4',if((`teach`.`time_test` = '09.00-12.30'),_utf8'12',if((`teach`.`time_test` = '13.30-17.00'),_utf8'34',_utf8'xxx')))))) AS `time_id`
     FROM `ge_regis` LEFT JOIN `teach` ON `teach`.`t_no` = `ge_regis`.`t_no` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `teach`.`term`='" . $Term . "' AND  ORDER BY `startblock`";*/

    foreach ($db->to_Object($sqlCommand) as $chk_date_test) {
        return $chk_date_test['count_date_test'];
    }
}

function chooselimit()
{
    $db = new Database();
    $stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
    $sql = "SELECT count(`sub_id`)AS `sub_id` FROM `plans_sec` WHERE `stu_sec`='$stu_id' AND `term`='2' AND `y_thai`='2561' AND LEFT(`sub_id`,4)='GExx'";
    if (sizeof($db->to_Object($sql)) > 0) {
        foreach ($db->to_Object($sql) as $cou_now) {
            return $cou_now['sub_id'];
        }
    }
}

function choosenow()
{
    $db = new Database();
    $sql = "SELECT count(`sub_id`)AS `sub_id` FROM `ge_regis` WHERE `student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `term`='2/2561' AND LEFT(`sub_id`,2)='GE'";
    if (sizeof($db->to_Object($sql)) > 0) {
        foreach ($db->to_Object($sql) as $cou_now) {
            return $cou_now['sub_id'];
        }
    }
}

function chk_tea($t_no)
{
    $db = new Database();
    $stu_id = substr(base64_decode($_SESSION['user_id']), 0, 10);
    $sql = "select `teach_detail`.`tea_ID` AS `tea_ID`, concat(`list_teacher`.`rank_signal`,`list_teacher`.`tea_Name`) AS `Tnames` from `teach` left join `teach_detail` on`teach`.`t_no` = `teach_detail`.`t_no` left join `list_teacher` on`list_teacher`.`tea_ID` = `teach_detail`.`tea_ID` WHERE `teach`.`t_no`='$t_no'";
    if (sizeof($db->to_Object($sql)) > 0) {
        return $db->to_Object($sql);
    }
}


function sum_units()
{
    $db = new Database();
    $sql = "SELECT SUM(`subjects`.`sub_units`)AS`sum_units`
FROM `ge_regis`
LEFT JOIN `teach` ON`ge_regis`.`t_no`=`teach`.`t_no`
left JOIN `subjects` ON `teach`.`rec_no` = `subjects`.`rec_no`
WHERE `ge_regis`.`student_ID`='" . base64_decode($_SESSION['user_id']) . "' AND `ge_regis`.`term`='2/2561'
GROUP BY `ge_regis`.`term`";
    if (sizeof($db->to_Object($sql)) > 0) {
        foreach ($db->to_Object($sql) as $sum_units) {
            return $sum_units['sum_units'];
        }
    }
}
