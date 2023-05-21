<?php

namespace Module\datlich\Model;

use Model\Mail;

class DatLich extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions
{

    public $Id;
    public $Code;
    public $ADDRESS;
    public $SERVICENAME;
    public $AMOUNT;
    public $BOD;
    public $DATEEXAMINATION;
    public $DISTRICS;
    public $EMAIL;
    public $FULLNAME;
    public $HOSPITAL;
    public $HOSPITALADDRESS;
    public $PHONE;
    public $PROVINCE;
    public $ROOM;
    public $WARD;


    public function __construct($tc = null)
    {
        parent::$TableName = prefixTable . "phieuhen";
        parent::__construct();

        if (!is_array($tc)) {
            $id = $tc;
            $tc = $this->GetById($id);
            if (!$tc) {
                $tc = $this->GetByCode($id);
            }
        }

        $this->Id = $tc["Id"] ?? null;
        $this->Code = $tc["Code"] ?? null;
        $this->ADDRESS = $tc["ADDRESS"] ?? null;
        $this->AMOUNT = $tc["AMOUNT"] ?? null;
        $this->BOD = $tc["BOD"] ?? null;
        $this->DATEEXAMINATION = $tc["DATEEXAMINATION"] ?? null;
        $this->DISTRICS = $tc["DISTRICS"] ?? null;
        $this->EMAIL = $tc["EMAIL"] ?? null;
        $this->FULLNAME = $tc["FULLNAME"] ?? null;
        $this->HOSPITAL = $tc["HOSPITAL"] ?? null;
        $this->HOSPITALADDRESS = $tc["HOSPITALADDRESS"] ?? null;
        $this->PHONE = $tc["PHONE"] ?? null;
        $this->PROVINCE = $tc["PROVINCE"] ?? null;
        $this->ROOM = $tc["ROOM"] ?? null;
        $this->WARD = $tc["WARD"] ?? null;
        $this->SERVICENAME = $tc["SERVICENAME"] ?? null;
    }

    public function ToString()
    { 
        
    }
    public function PhieuHen()
    {
        $content = file_get_contents("Module/datlich/public/index/detail.html");
        foreach ((array) $this as $key => $value) {
            $content = str_replace("[{$key}]", $value, $content);
        }
        return $content;
    }

    public function Delete($Id)
    {
        return $this->DeleteById($Id);
    }

    public function GetById($Id)
    {
        return $this->SelectById($Id);
    }
    public function GetByCode($Id)
    {
        return $this->SelectRow("`Code` = '{$Id}'");
    }

    public function GetItems($param, $indexPage, $pageNumber, &$total)
    {
        $where = "1=1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model)
    {
        unset($model["Id"]);
        return $this->Insert($model);
    }
    public function SendMail()
    {
        $mail = new Mail();
        $mailContent = file_get_contents("public/Mailcontent.html");
        foreach ((array) $this as $key => $value) {
            $mailContent = str_replace("[{$key}]", $value, $mailContent);
        }
        // echo $mailContent;
        $mail->SendMail(
            "Phiếu Hẹn " . $this->Code,
            $mailContent,
            "donv@bakco.com.vn"
        );
    }

    public function Put($model)
    {
        return $this->UpdateRow($model);
    }

    public static function ToSelect()
    {
        $where = "1=1";
        $self = new self();
        $self->GetToSelect($where, ["Id", "Name"]);
    }

}