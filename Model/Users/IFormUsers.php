<?php

namespace Model\Users;

interface IFormUsers {

    public static function Id($val = null);

    public static function Name($val = null);

    public static function Username($val = null);

    public static function Email($val = null);

    public static function Password($val = null);

    public static function KeyPassword($val = null);

    public static function BOD($val = null);

    public static function Status($val = null);

    public static function Active($val = null);

    public static function DateCreate($val = null);

    public static function TokenReset($val = null);
}
