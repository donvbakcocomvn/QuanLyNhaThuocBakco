<?php

namespace Controller;

use Model\Users\FormUser;

class huongdan extends \Application implements IControllerBE {

    public function __construct() {
        new backend();
        self::$_Theme = "backend";
        // \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        //336bdbdba15a2836969cb534cc56f9df
    }

    
	/**
	 *
	 * @return mixed
	 */
	function index() {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function post() {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function put() {
        $this->View();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function delete() {
	}
}
