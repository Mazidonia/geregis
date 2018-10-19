<?php

class Manual extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('user_id');
        if ($logged == "") {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
    }

    function index() {
        
        $this->view->render('manual/index');
    }

   

}
