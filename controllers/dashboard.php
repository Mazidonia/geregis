<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: login');
            exit;
        }
    }

    function index() {
        $this->view->check_ge_now = $this->model->check_ge_now();
        $this->view->render('dashboard/index');
    }

}
