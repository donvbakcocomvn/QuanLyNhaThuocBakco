<?php

namespace Model;

class PathCkfinder {

    public static $baseUrl;

    static function Set($param) {
        $pathArray = explode('/', $param);
        $dir = "";
        foreach ($pathArray as $value) {
            if ($value) {
                $dir .= "/" . $value;
                $pathDir = substr($dir, 1);
                if (!is_dir($pathDir)) {
                    mkdir($pathDir, 0777);
                }
            }
        }

        self::$baseUrl = $param;
    }

    static function Get() {
        return self::$baseUrl;
    }

}
