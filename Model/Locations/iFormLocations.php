<?php

namespace Model\Locations;

interface iFormLocations {

    //put your code here
    static public function Id($val = null);

    static public function Name($val = null);

    static public function ParentsId($val = null);

    static public function IsPublic($val = null);

    static public function Note($val = null);
}
