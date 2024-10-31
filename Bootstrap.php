<?php

/**
 * Bootstrap class initializes plugin
 *
 * @author  Way2Web <developers@way2web.nl>
 * @package classes
 * @version 0.1
 */
class Bootstrap {

    public function __construct() {
    }

    /**
     * @access public
     * @return void
     */
    public function run() {
        require_once("controllers/BaseController.php");
        new \controllers\BaseController();
    }

    public function activate() {
    }

    public function deactivate() {
    }
}

