<?php

namespace Model;

class Common {

    public function __construct() {

    }

    public static function ToUrl($url) {
        header("Location: " . $url);
        exit();
    }

    public static function TextInput($text) {
        $text = trim($text);
        $text = htmlspecialchars($text);
        $text = addslashes($text);
        return $text;
    }

    public static function uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function IsEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function DateTimeFomatDatabase() {
        return "Y-m-d H:i:s";
    }

    public static function DateTimeFomatView() {
        return "d-m-Y";
    }

    public static function DateFomatDatabase() {
        return "Y-m-d";
    }

    public static function StrToDateDB($strdate) {
        return date(\Model\Common::DateFomatDatabase(), strtotime($strdate));
    }

    public static function DateFomatView() {
        return "d-m-Y";
    }

    public static function PhanTrang($TongSoDong, $TrangThuBaoNhieu, $SoDong, $LinkPhanTrang) {
        $SoDong = max(1, intval($SoDong));
        $TrangThuBaoNhieu = max(1, intval($TrangThuBaoNhieu));
        $SoTrang = ceil($TongSoDong / $SoDong);
        $SoTrang = max(0, $SoTrang);
        $TrangTrai = $TrangThuBaoNhieu - 1;
        $TrangTrai = max(1, $TrangTrai);
        $TrangPhai = $TrangThuBaoNhieu + 1;
        $TrangPhai = min($TrangPhai, $SoTrang);
        $TrangMin = $TrangThuBaoNhieu - 3;
        $TrangMin = $TrangThuBaoNhieu - 3;
        $TrangMin = max(1, $TrangMin);
        $TrangMax = $TrangThuBaoNhieu + 3;
        $TrangMax = min($TrangMax, $SoTrang);
        $TrangTraiCham = $TrangThuBaoNhieu - 7;
        $TrangTraiCham = max(1, $TrangTraiCham);
        $TrangPhaiCham = $TrangThuBaoNhieu + 7;
        $TrangPhaiCham = min($TrangPhaiCham, $SoTrang);

        $_linkTrangDau = str_replace("[i]", 1, $LinkPhanTrang);
        $_linkTrangTrai = str_replace("[i]", $TrangTrai, $LinkPhanTrang);
        $_linkTrangCuoi = str_replace("[i]", $SoTrang, $LinkPhanTrang);
        $_linkTrangPhai = str_replace("[i]", $TrangPhai, $LinkPhanTrang);
        $_linkTrangTraiCham = str_replace("[i]", $TrangTraiCham, $LinkPhanTrang);
        $_linkTrangPhaiCham = str_replace("[i]", $TrangPhaiCham, $LinkPhanTrang);


        ob_start();
        ?>
        <ul class="pagination pagination-md no-margin">
            <li><a ><?php echo $TrangThuBaoNhieu . "/" . $SoTrang; ?></a></li>
            <li><a href="<?php echo $_linkTrangDau ?>"><i class="fa fa-angle-double-left" ></i></a></li>
            <li><a href="<?php echo $_linkTrangTrai ?>"><i class="fa fa-angle-left" ></i></a></li>
            <li class="hidden-xs" ><a href="<?php echo $_linkTrangTraiCham ?>">...</a></li>
            <?php
            for ($index = $TrangMin; $index <= $TrangMax; $index++) {
                $_link = str_replace("[i]", $index, $LinkPhanTrang);
                ?>
                <li class="<?php echo $TrangThuBaoNhieu == $index ? 'active' : ''; ?>" >
                    <a href="<?php echo $_link; ?>"><?php echo $index; ?></a>
                </li>
                <?php
            }
            ?>
            <li class="hidden-xs" ><a href="<?php echo $_linkTrangPhaiCham ?>">...</a></li>
            <li><a href="<?php echo $_linkTrangPhai ?>"><i class="fa fa-angle-right" ></i></a></li>
            <li><a href="<?php echo $_linkTrangCuoi ?>"><i class="fa fa-angle-double-right" ></i></a></li>
        </ul>
        <?php
        $str = ob_get_clean();
        return $str;
    }

    public static function BoDauTienViet($str) {
        if (!$str)
            return false;

        $str = str_replace(array(',', '<', '>', '&', '{', '}', "[", "]", '*', '?', '/', '+', '@', '%', '"'), array(' '), $str);
        $str = str_replace(array("'"), array(' '), $str);
        while (strpos($str, "  ") > 0) {
            $str = str_replace("  ", " ", $str);
        }
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $str = preg_replace("/($codau)/i", $khongdau, $str);
        }
        $str = strtolower($str);
        $str = trim($str);
        $str = preg_replace('/[^a-zA-Z0-9\ ]/', '', $str);
        $str = str_replace(" ", "-", $str);
        return $str;
    }

    public static function ViewPrice($number) {
        return number_format($number, 0, ".", ",") . " vnđ";
    }

    public static function DateTime() {
        return date("Y-m-d H:i:s", time());
    }

    public static function TextInputNoHtml($text) {
        $text = strip_tags($text);
        $text = trim($text);
        $text = addslashes($text);
        return $text;
    }

    public static function Index($index, $indexPage, $pageNumber) {
        return ($indexPage - 1) * $pageNumber + $index + 1;
    }

    public static function DaysInMonth($month, $year) {
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    public static function NameDateByDate($ngayThanhNam, $isvalue = false) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $weekday = date("l", strtotime($ngayThanhNam));
        $weekday = strtolower($weekday);

        $a = [
            "monday" => "Thứ Hai",
            "tuesday" => "Thứ ba",
            "wednesday" => "Thứ Tư",
            "thursday" => "Thứ Năm",
            "friday" => "Thứ Sáu",
            "saturday" => "Thứ Bảy",
            "sunday" => "Chủ Nhật",
        ];
        if ($isvalue == FALSE)
            return $a[$weekday];
        return $weekday;
    }

    public static function FromDateToDateToList($begin, $end) {
        $begin = new \DateTime($begin);
        $end = new \DateTime($end);
        $end->setTime(0, 0, 1);
        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($begin, $interval, $end);
        $dateList = [];
        foreach ($period as $dt) {
            $dateList[] = $dt->format("Y-m-d");
        }
        return $dateList;
    }

    public static function NgayTrongTuan() {
        $a = [
            "monday" => "Thứ Hai",
            "tuesday" => "Thứ ba",
            "wednesday" => "Thứ Tư",
            "thursday" => "Thứ Năm",
            "friday" => "Thứ Sáu",
            "saturday" => "Thứ Bảy",
            "sunday" => "Chủ Nhật",
        ];
        return $a;
    }

}
