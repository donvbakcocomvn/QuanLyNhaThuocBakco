<?php

class Router {

    public function __construct($url) {
//        echo "___" . $url . "__";
        $this->Init($url);
        if (isset($_GET["module"])) {
            $this->CheckModule($_GET["module"]);
        }
        if (isset($_GET["controller"])) {
            Application::SetController($_GET["controller"]);
        }
        if (isset($_GET["action"])) {
            Application::SetAction($_GET["action"]);
        }
    }

    public function Init($url) {
        $arr = explode("/", $url);

        // có phải module không
        if ($this->CheckModule($arr[1])) {
            $module = $arr[1];
            $cname = DEFAULT_CONTROLLER;
            $action = DEFAULT_ACTION;
            $params = NULL;
            if (isset($arr[2])) {
                if ($arr[2] != "") {
                    $cname = $arr[2];
                }
            }
            if (isset($arr[3])) {
                if (($arr[3]) != "") {
                    $action = $arr[3];
                }
            }
            array_shift($arr);
            array_shift($arr);
            array_shift($arr);
            array_shift($arr);
            $params = $arr;
            Application::SetController($cname);
            Application::SetAction($action);
            Application::SetParams($params);
            return TRUE;
        } else {
            /**
             * không có module
             * @param {type} parameter
             */
            $cname = DEFAULT_CONTROLLER;
            $action = DEFAULT_ACTION;
            $params = NULL;
            if (isset($arr[1])) {
                if ($arr[1] != "") {
                    $cname = $arr[1];
                }
            }
            if (isset($arr[2])) {
                if (($arr[2]) != "") {
                    $action = $arr[2];
                }
            }
            array_shift($arr);
            array_shift($arr);
            array_shift($arr);
            $params = $arr;
            Application::SetController($cname);
            Application::SetAction($action);
            Application::SetParams($params);
            return TRUE;
        }
    }

    public function CheckModule($module) {
        $filename = __DIR__ . "/Module/{$module}/";
        if (is_dir($filename)) {
            Application::SetModule($module);
            return true;
        }
        return false;
    }

    public function CheckController($controller) {
        $pathController = "Controller/{$controller}/";
        if (file_exists($pathController)) {
            return $controller;
        }
        return null;
    }

}
