<?php

namespace Model;

class Permission {

    public function __construct() {
        
    }

    public static function Check($param0, $param1=[]) {
        $kt = User::CurentUser()->CheckPremision($param0, $param1);
        /**
         * không có quyền
         * @param {type} parameter
         */
        if ($kt == false) {
            exit("Bạn không có quền trên đường dẫn này.");
        }
    }
    public static function CheckPremision($param0, $param1=[]) {
        if(!is_array($param0)){
            $param0 = [$param0];
        }
        return User::CurentUser()->CheckPremision($param0, $param1); 
    }

}
