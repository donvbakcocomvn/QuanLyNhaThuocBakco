<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

class Lang extends DB implements IModelService {

    public function __construct() {
        self::$TableName = prefixTable . "lang";
        parent::__construct();
    }

    //put your code here
    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        
    }

    public function Put($model) {
        
    }

    static public function ToOptions() {
        $where = " 1 =1 ";
        $lg = new Lang();
        return $lg->SelectToOptions($where, ["Id", "Name"]);
    }

}
