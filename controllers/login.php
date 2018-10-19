<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        Session::init();
        $logged = Session::get('user_id');
        if ($logged != "") {
            //Session::destroy();
            header('location: ' . URL . 'dashboard');
            exit;
        }
        $this->view->render('login/index', true);
    }

    function checkuser($user, $pass) {
        $result = $this->model->checkuser($user, $pass);
        echo $result;
    }

    function logout() {
        $result = $this->model->logout();
        echo $result;
    }

    function test() {
        $c_id = $this->model->test();
        echo $c_id;
    }

}
