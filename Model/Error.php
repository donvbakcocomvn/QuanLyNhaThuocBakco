<?php

namespace Model;

class Error {

    const success = "success";
    const danger = "danger";
    const info = "info";
    const warning = "warning";

    public function __construct($type, $content) {
        $_SESSION["Error"] = isset($_SESSION["Error"]) ? $_SESSION["Error"] : null;
        self::SetError($type, $content);
    }

    static public function SetError($type, $content) {
        $_SESSION["Error"]["Type"] = $type;
        $_SESSION["Error"]["Content"] = $content;
    }

    static public function GetError() {
        $_SESSION["Error"] = isset($_SESSION["Error"])?$_SESSION["Error"]:null;
        $e = $_SESSION["Error"];
        $_SESSION["Error"] = null;
        return $e;
    }

}
