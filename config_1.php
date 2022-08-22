 <?php
 session_start();
 ob_start();
 
spl_autoload_register(function($className){
    $className = str_replace("\\", "/", $className);
    $className = str_replace("_", "/", $className);
     $className = "{$className}.php";
    if(file_exists($className)){
        include $className;
    }
//    echo "___".$className; 
});
define("prefixTable", "lap1_");
define("QuanLy", "quanly");
define("LoginPage", "/index.php?controller=login");
global $INI;
$INI['host'] = "localhost";
$INI['username'] = "root";
$INI['password'] = "";
$INI['DBname'] = "lap1";
//@.rOKU1sh2r*
//#mbne6Y3&foG

 ?>