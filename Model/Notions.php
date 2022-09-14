<?php

namespace  Model;


class Notions
{

    public function __construct()
    {
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
        $op = [];
        foreach ($notions as $key => $value) {
            $op[$value["countryCode"]] = $value["name"];
        }
        return $op;
    }
}
