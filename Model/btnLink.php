<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

class btnLink {

    public function __construct() {

    }

    static public function Post() {
        return sprintf("/%s/%s/post/", \Application::$_Module, \Application::$_Controller);
    }

    static public function Put($id) {
        return sprintf("/%s/%s/put/{$id}", \Application::$_Module, \Application::$_Controller);
    }

    static public function btnPut($id, $Permission, $content = null, $class = null) {

        if (\Model\Permission::CheckPremision($Permission) == false) {
            return;
        }
        if ($content === null) {
            $content = "Sửa";
        }
        if ($class === null) {
            $class = "btn btn-sm btn-primary";
        }
        $linkSua = self::Put($id);
        $btn = <<<BTNSUA
                <a class="{$class}"  href="{$linkSua}" >{$content}</a>
BTNSUA;
        return $btn;
    }

    static public function Delete($id) {
        return sprintf("/%s/%s/delete/{$id}", \Application::$_Module, \Application::$_Controller);
    }

    public static function btnPost($Permission, $content = null, $class = null) {
        if (\Model\Permission::CheckPremision($Permission) == false) {
            return;
        }
        if ($content === null) {
            $content = "Thêm Mới";
        }
        if ($class === null) {
            $class = "btn btn-sm btn-success";
        }
        $link = self::Post();
        $btn = <<<BTNSUA
                <a class="{$class}"  href="{$link}" >{$content}</a>
BTNSUA;
        return $btn;
    }

    public static function btnDelete($id, $Permission, $Title, $content = null, $class = null) {

        if (\Model\Permission::CheckPremision($Permission) == false) {
            return;
        }
        if ($content === null) {
            $content = "Xóa";
        }
        if ($class === null) {
            $class = "btn btn-sm btn-danger";
        }
        $linkSua = self::Delete($id);
        $btn = <<<BTNSUA
                <a class="{$class}" title="{$Title}"  href="{$linkSua}" >{$content}</a>
BTNSUA;
        return $btn;
    }

    public static function btnSave($content = null, $class = null) {
        if ($content === null) {
            $content = "Lưu";
        }
        if ($class === null) {
            $class = "btn btn-success";
        }
        $btn = <<<BTNSUA
                <button type="submit" class="{$class}" title="Lưu"  >{$content}</button>
BTNSUA;
        return $btn;
    }

}
