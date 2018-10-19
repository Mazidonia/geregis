<?php

class Ge extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('user_id');
        if ($logged == "") {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
    }

    public function index()
    {
        // if ($this->model->nottime() > 0) {
        //     $this->view->render('ge/nottime');
        // } elseif ($this->model->nottime() <= 0 && $this->model->overtime() >= 0) {
        //     $this->view->msg = $this->model->index();
        //     $this->view->render('schedule/index');
        // } elseif ($this->model->nottime() <= 0 && $this->model->overtime() <= 0) {
        //     $this->view->render('ge/overtime');
        // }
        $this->view->resumes = $this->model->resumes();
        $this->view->gela = $this->model->gela_open();
        $this->view->gehu = $this->model->gehu_open();
        $this->view->geso = $this->model->geso_open();
        $this->view->gesc = $this->model->gesc_open();
        $this->view->chooselimit = $this->model->chooselimit();
        $this->view->choosenow = $this->model->choosenow();
        $this->view->render('ge/index');
    }

    public function geregis($sub_id, $t_no, $day_teach, $startblock, $endblock, $section, $date_test, $time_id)
    {
        $this->view->geregis = $this->model->geregis($sub_id, $t_no, $day_teach, $startblock, $endblock, $section, $date_test, $time_id);
    }

    public function open()
    {
        $this->view->gela = $this->model->gela_open();
        $this->view->gehu = $this->model->gehu_open();
        $this->view->geso = $this->model->geso_open();
        $this->view->gesc = $this->model->gesc_open();
        $this->view->render('ge/open');
    }

    public function manageregis($student_ID = false)
    {
        $Role = Session::get('STUDENT_ROLE');
        if (base64_decode($Role) != "1") {
            //Session::destroy();
            header('location: ' . URL . 'error');
            exit;
        }

        if ($student_ID != '') {
            $this->view->manageregis = $this->model->manageregis($student_ID);
        }
        $this->view->render('ge/manageregis');
    }

    public function managepassword($student_ID = false)
    {
        $Role = Session::get('STUDENT_ROLE');
        if (base64_decode($Role) != "1") {
            header('location: ' . URL . 'error');
            exit;
        }

        if ($student_ID != '') {
            $this->view->managepassword = $this->model->managepassword($student_ID);
        }
        $this->view->render('ge/managepassword');
    }

    public function findstu($student_ID)
    {
        $Role = Session::get('STUDENT_ROLE');
        if (base64_decode($Role) != "1") {
            //Session::destroy();
            header('location: ' . URL . 'error');
            exit;
        }
        $this->model->findstu($student_ID);
    }


    public function findstupwd($student_ID)
    {
        $Role = Session::get('STUDENT_ROLE');
        if (base64_decode($Role) != "1") {
            //Session::destroy();
            header('location: ' . URL . 'error');
            exit;
        }
        $this->model->findstupwd($student_ID);
    }


    public function delete_subject($student_ID, $sub_id, $t_no)
    {
        $Role = Session::get('STUDENT_ROLE');
        if (base64_decode($Role) != "1") {
            //Session::destroy();
            header('location: ' . URL . 'error');
            exit;
        }
        $this->model->delete_subject($student_ID, $sub_id, $t_no);
    }

    public function update_password($student_ID, $stu_pwd)
    {
        $Role = Session::get('STUDENT_ROLE');
        if (base64_decode($Role) != "1") {
            header('location: ' . URL . 'error');
            exit;
        }
        $this->model->update_password($student_ID, $stu_pwd);
    }
}
