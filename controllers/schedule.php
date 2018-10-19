<?php

class Schedule extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == "") {
            //Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
    }

    public function index()
    {
        if ($this->model->nottime() > 0) {
            $this->view->render('ge/nottime');
        } elseif ($this->model->nottime() <= 0 && $this->model->overtime() >= 0) {
            $this->view->msg = $this->model->index();
            $this->view->render('schedule/index');
        } elseif ($this->model->nottime() <= 0 && $this->model->overtime() <= 0) {
            $this->view->render('ge/overtime');
        }
    }

    public function resumes()
    {
        $this->view->learned = $this->model->learned();
        $this->view->msg = $this->model->resumes();
        $this->view->chooselimit = $this->model->chooselimit();
        $this->view->render('schedule/resumes');
    }
}
