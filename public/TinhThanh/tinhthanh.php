<?php
class TinhThanh
{
    public $id;
    public $code;
    public $name;
    public function __construct($local = null)
    {
        $this->id = isset($local["id"]) ? $local["id"] : null;
        $this->code = isset($local["code"]) ? $local["code"] : null;
        $this->name = isset($local["name"]) ? $local["name"] : null;
    }


    public function DSTinh()
    {
        $file = fopen("local.json", "r");
        $content = fread($file, filesize("local.json"));
        $fileContent = file_get_contents("local.json");
        $DSTinh = json_decode($fileContent, JSON_UNESCAPED_UNICODE);
        return $DSTinh;
        // foreach ($DSTinh as $index => $tinh) {
        //     echo $tinh["name"] . "<br>";
        //     echo $tinh["code"];
        //     echo $tinh["id"]."<br>";
        //     var_dump($tinh);
        // }
    }

    public static function GetById($id)
    {
        $no = new TinhThanh ();
        $notions = $no->DSTinh();
        foreach ($notions as $value) {
            $name = $value["name"];
            $code = $value["countryCode"];
            if ($id == $code) {
                return $name;
            }
        }
        return null;
    }

    public static function TinhThanhToOption()
    {
        $tinhthanh = new TinhThanh();
        $dsTinhThanh = $tinhthanh->DSTinh();
        foreach ($dsTinhThanh as $k => $tinh) {
            echo "<option value='{$tinh["id"]}' >{$tinh["name"]}</option>";
        }
    }
    // tim danh sách huyện theo tỉnh
    public static function DSHuyen($maTinh)
    {
        // districts
        $huyen = new TinhThanh();
        $dsTinh = self::DSTinh();
        foreach ($dsTinh as $key => $tinh) {
            if ($tinh["id"] == $maTinh) {
                return $tinh["districts"];
            }
        }
        return [];
    }
    // chuyển danh sách huyện qua options
    public function DSHuyen2Option($maTinh)
    {
        $dsHuyen = $this->DSHuyen($maTinh);
        foreach ($dsHuyen as $key => $huyen) {
            echo "<option value='{$huyen["id"]}' >{$huyen["name"]}</option>";
        }
    }
    // chuyển danh sách xa thành options
    public function DSPhuongXa2Option($maTinh, $maHuyen)
    {
        $dsPhuongXa = $this->DSPhuongXa($maTinh, $maHuyen);
        foreach ($dsPhuongXa as $key => $px) {
            echo "<option value='{$px["id"]}' >{$px["name"]}</option>";
        }
    }
    // tìm danh sách xa theo tỉnh thành, quận huyen
    public function DSPhuongXa($maTinh, $maHuyen)
    {
        $dsHuyen = $this->DSHuyen($maTinh);
        foreach ($dsHuyen as $key => $huyen) {
            if ($huyen["id"] == $maHuyen) {
                return $huyen["wards"];
            }
        }
        return [];
    }
}

$tinh = new TinhThanh();
if (isset($_GET["maTinh"]) && isset($_GET["maHuyen"])) {
    // lấy danh sách xã 
    // var_dump($_GET["maHuyen"]);
    $tinh->DSPhuongXa2Option($_GET["maTinh"], $_GET["maHuyen"]);
    exit();
}
if (isset($_GET["maTinh"])) {
    // lấy danh sách xã
    $tinh->DSHuyen2Option($_GET["maTinh"]);
    exit();
}
$tinh->TinhThanhToOption();
