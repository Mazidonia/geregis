<?php

class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = false) {
        if ($noInclude == true) {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        } else if ($noInclude == false) {
            require 'views/header.php';
            require 'views/topmenu.php';
            require 'views/content.php';
            require 'views/' . $name . '.php';
            require 'views/content2.php';
            require 'views/menubar.php';
            require 'views/footer.php';
        } else if ($noInclude == 'none'){
            require 'views/' . $name . '.php';
        }
    }

}
