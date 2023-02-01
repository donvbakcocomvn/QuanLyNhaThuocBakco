<?php

namespace  Model;


class Notions
{


    public function __construct()
    {
    }

    // Hàm lấy Tên nước by Code
    public static function GetById($id)
    {
        $no = new Notions();
        $notions = $no->GetNotions();
        foreach ($notions as $value) {
            $name = $value["name"];
            $code = $value["countryCode"];
            if ($id == $code) {
                return $name;
            }
        }
        return null;
    }

    public function GetNotions()
    {
        $path  = "public/nations_1.json";
        $content = file_get_contents($path);
        return json_decode($content, JSON_OBJECT_AS_ARRAY);
    }

    static public function GetToOptions()
    {
        $no =  new Notions;
        $notions = $no->GetNotions();
        // echo $notions["name"];
        $op = [];
        foreach ($notions as $key => $value) {
            $op[$value["countryCode"]] = $value["name"];
        }
        return $op;
    }
}
