<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkuser($use, $pass)
    {
        $query = "SELECT * FROM `student_geregis` WHERE `STUDENT_CODE` ='$use' AND `DATE_OF_BIRTH`='$pass'";
        if ($this->db->count_rows($query) == 1) {
            foreach ($this->db->to_Object($query) as $user) {
                if ($user['STUDENT_ROLE'] == '1') {
                    Session::init();
                    Session::set('loggedIn', true);
                    Session::set('user_id', base64_encode($user['STUDENT_CODE']));
                    Session::set('aname', $user['STUDENT_NAME']);
                    Session::set('STUDENT_PROGRAM', $user['STUDENT_PROGRAM']);
                    Session::set('STUDENT_ROLE', base64_encode($user['STUDENT_ROLE']));
                    Session::setSession('loggedIn', true);
                    Session::setSession('user_id', base64_encode($user['STUDENT_CODE']));
                    Session::setSession('aname', $user['STUDENT_NAME']);
                    Session::setSession('STUDENT_PROGRAM', $user['STUDENT_PROGRAM']);
                    Session::setSession('STUDENT_ROLE', base64_encode($user['STUDENT_ROLE']));


                    echo json_encode(array('success' => 'admin'));
                } else {
                    Session::init();
                    Session::set('loggedIn', true);
                    Session::set('user_id', base64_encode($user['STUDENT_CODE']));
                    Session::set('aname', $user['STUDENT_NAME']);
                    Session::set('STUDENT_PROGRAM', $user['STUDENT_PROGRAM']);
                     
                    Session::setSession('loggedIn', true);
                    Session::setSession('user_id', base64_encode($user['STUDENT_CODE']));
                    Session::setSession('aname', $user['STUDENT_NAME']);
                    Session::setSession('STUDENT_PROGRAM', $user['STUDENT_PROGRAM']);
                    Session::setSession('STUDENT_ROLE', base64_encode($user['STUDENT_ROLE']));
                    
                    echo json_encode(array('success' => 'stu'));
                }
            }
        } else {
            //echo $query.'<BR>';
            echo json_encode(array('errorMsg' => 'ไม่พบข้อมูลผู้ใช้งาน.'));
        }
    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        return json_encode(array('success' => true));
    }

    public function test()
    {
        $id = 15 + 15;

        return json_encode(array('success' => true, 'msg' => 'บันทึกเรียบร้อยคะ'));
        //echo '11';
    }
}
