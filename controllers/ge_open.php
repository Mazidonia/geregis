<?php

class Ge_open extends Controller {

    function __construct() {
        parent::__construct();

    }

    function index() {

            $this->view->gela = $this->model->gela_open();
            $this->view->gehu = $this->model->gehu_open();
            $this->view->geso = $this->model->geso_open();
            $this->view->gesc = $this->model->gesc_open();
          $this->view->render('ge_open/index', true);
    }


}
