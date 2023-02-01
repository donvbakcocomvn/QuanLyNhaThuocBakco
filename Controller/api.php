<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

use Model\Notions;

/**
 * Description of api
 *
 * @author MSI
 */
class api extends \Application
{

    public function __construct()
    {
    }

    public function nations()
    {
        $notions = new Notions();
        echo json_encode($notions->GetNotions());
    }
    public function nationsOptions()
    { 
        echo json_encode(Notions::GetToOptions());
    }

    /**
     * trả vể dang sách thẻ <option></option>
     * @param {type} parameter
     */
    function GetQuanHuyenTag()
    {
        $idTinh = $this->getParams(0);
        $location = new \Model\Locations();
        $items = $location->GetByIdParents($idTinh);
        $html = "";
        foreach ($items as $key => $value) {
            $_item = new \Model\Locations($value);
            $html .= <<<THELI
                  <option value="$_item->Id" >$_item->Name</option>
THELI;
        }
        echo $html;
    }

    function diemdanh()
    {
    }
}
