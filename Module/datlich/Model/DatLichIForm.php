<?php

namespace Module\datlich\Model;

interface DatLichIForm
{

    public function Id($val = null, $prop = []);
    public function ADDRESS($val = null, $prop = []);
    public function SERVICENAME($val = null, $prop = []);
    public function AMOUNT($val = null, $prop = []);
    public function BOD($val = null, $prop = []);
    public function DATEEXAMINATION($val = null, $prop = []);
    public function DISTRICS($val = null, $prop = []);
    public function EMAIL($val = null, $prop = []);
    public function FULLNAME($val = null, $prop = []);
    public function HOSPITAL($val = null, $prop = []);
    public function HOSPITALADDRESS($val = null, $prop = []);
    public function PHONE($val = null, $prop = []);
    public function PROVINCE($val = null, $prop = []);
    public function ROOM($val = null, $prop = []);
    public function WARD($val = null, $prop = []);
}