<?php

session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
define("DEFAULT_ACTION", "index");
define("DEFAULT_CONTROLLER", "index");

spl_autoload_register(function($className) {
    $className = str_replace("\\", "/", $className);
    $className = str_replace("_", "/", $className);
    $className = __DIR__ . "/{$className}.php";
    if (file_exists($className)) {
        include_once $className;
    }
//    echo "___".$className;
});
define("prefixTable", "lap1_");
define("QuanLy", "quanly");
define("LoginPage", "/login");
global $INI;
if (FALSE) {
    $INI['host'] = "localhost";
    $INI['username'] = "root";
    $INI['password'] = "root";
    $INI['DBname'] = "nhathuoc1";
} else {
    $INI['host'] = "localhost";
    $INI['username'] = "root";
    $INI['password'] = "";
    $INI['DBname'] = "nhathuoc1";
}

//#mbne6Y3&foG
