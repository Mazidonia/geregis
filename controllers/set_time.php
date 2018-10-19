
<?php

class Set_time extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('STUDENT_ROLE');
        if (base64_decode($logged) != "1") {
            Session::destroy();
            header('location: error');
            exit;
        }
    }

    function index() {
        $this->view->time_current_sc = $this->model->time_current_sc();
        $this->view->time_current_ge = $this->model->time_current_ge();
        $this->view->render('set_time/index');
    }
     function update($date_start,$date_stop,$type) {
        $this->model->update($date_start,$date_stop,$type);
        //$this->view->render('set_time/index');
    }

}
