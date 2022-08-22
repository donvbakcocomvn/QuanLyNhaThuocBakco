<?php

class Application {

    static public $_Module;
    static public $_Controller;
    static public $_Theme;
    static public $_Layout;
    static public $_Action;
    static public $_Params;
    static public $_ViewTheme;

    function __construct() {

    }

    public static function SetController($_controllerName) {
        self::$_Controller = $_controllerName;
    }

    public static function SetAction($_actionName) {
        self::$_Action = $_actionName;
    }

    public static function SetLayout($_layout) {
        self::$_Layout = $_layout;
    }

    public static function SetModule($_module) {
        self::$_Module = $_module;
    }

    public function View($data = []) {
        if ($data) {
            if (is_array($data)) {
                extract($data);
            }
        }
        $_module = self::$_Module;
        $_ViewTheme = self::$_ViewTheme;
        $_Params = self::$_Params;
        $controller = self::$_Controller;
        $action = self::$_Action;
        $theme = self::$_Theme;
        $_layout = self::$_Layout == null ? "" : "_" . self::$_Layout;
        $_Content = __DIR__ . "/Views/theme/{$theme}/{$controller}/{$action}.phtml";

        if ($_module) {
            $_Content = __DIR__ . "/Module/{$_module}/Views/{$controller}/{$action}.phtml";
            if ($_ViewTheme != null) {
                $_Content = __DIR__ . "/Views/theme/{$theme}/Module/{$_module}/Views/{$controller}/{$action}.phtml";
            }
        }
        include __DIR__ . "/Views/theme/{$theme}/layout{$_layout}.phtml";
    }

    public function PartialView($data = []) {
        if ($data) {
            if (is_array($data)) {
                extract($data);
            }
        }
        $controller = self::$_Controller;
        $action = self::$_Action;
        $theme = self::$_Theme;
        $_Content = __DIR__ . "/Views/theme/{$theme}/{$controller}/{$action}.phtml";
        include $_Content;
    }

    public static function SetParams($_Params) {
        self::$_Params = $_Params;
    }

    public function getParams($index = null, $defaut = null) {
        if ($index === null) {
            return $defaut;
        }
        return isset(self::$_Params[$index]) ? self::$_Params[$index] : null;
    }

}

?>