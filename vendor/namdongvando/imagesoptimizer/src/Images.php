<?php

namespace Imagesoptimizer;

class Images {

    function __construct() {

    }

    static function OptimizerFolder($dir) {
        $a = [];
        self::redDirectoryByPath($dir, $a, true);
        foreach ($a as $fullPath) {
            self::Optimizer($fullPath);
        }
    }

    private static function redDirectoryByPath($dir, &$a, $fullDir = false) {
        if (!is_dir($dir)) {
            return;
        }
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != "..") {
                    $fileName = $dir . $file;
                    if (is_file($fileName)) {
                        $a[] = $fullDir == true ? $fileName : $file;
                    } else {
                        self::redDirectoryByPath($dir . $file . "/", $a, $fullDir);
                    }
                }
            }
            closedir($dh);
        }
    }

    static function Optimizer($filePath, $toFilePath = null, $w = null, $h = null) {
        ini_set('memory_limit', '-1');
        $url = $filePath;
        try {
            if (file_exists($url)) {
                $imagesInfor = getimagesize($url);
                if ($imagesInfor) {
                    $filePath = "/" . $filePath;
                    if ($w == null && $h == null) {
                        $w = $imagesInfor[0];
                        $h = $imagesInfor[1];
                    }
                    $DuongDanHinh = explode("/", $filePath);
                    $TenHinhFull = end($DuongDanHinh);
                    $aTenHinh = explode(".", $TenHinhFull);
                    $TenHinh = reset($aTenHinh);
                    $PhanMoRong = end($aTenHinh);
                    $ThuMuc = explode($TenHinhFull, $filePath);
                    $ThuMuc = reset($ThuMuc);
                    $ThuMuc = substr($ThuMuc, 1);
                    $TenHinhnew = self::create_thumb1($TenHinhFull, $w, $h, $ThuMuc, $TenHinh, 2, $toFilePath);
                    return $ThuMuc . $TenHinhnew;
                }
            } else {
                throw new \Exception("file is not exists.");
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    private static function create_thumb1($file, $width, $height, $folder, $file_name, $zoom_crop = '2', $toFilePath = null) {
        $new_width = $width;
        $Dai = $width;
        $new_height = $height;
        $Cao = $height;
        if ($new_width && !$new_height) {
            $new_height = floor($height * ($new_width / $width));
        } else if ($new_height && !$new_width) {
            $new_width = floor($width * ($new_height / $height));
        }
        $image_url = $folder . $file;
        $origin_x = 0;
        $origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
        $array = FALSE;
        if (getimagesize($image_url))
            $array = getimagesize($image_url);
        if ($array) {
            list($image_w, $image_h) = $array;
        } else {
            return FALSE;
        }
        $width = $image_w;
        $height = $image_h;
// ACQUIRE THE ORIGINAL IMAGE
        $TenHinh = explode('.', $image_url);
        $image_ext = trim(strtolower(end($TenHinh)));
        switch (strtoupper($image_ext)) {
            case 'JPG' :
            case 'JPEG' :
                $image = @imagecreatefromjpeg($image_url);
                $func = 'imagejpeg';
                break;
            case 'PNG' :
                $image = @imagecreatefrompng($image_url);
                $func = 'imagepng';
                break;
            case 'GIF' :
                $image = imagecreatefromgif($image_url);
                $func = 'imagegif';
                break;
            default : return null;
        }

// scale down and add borders
        if ($zoom_crop == 3) {

            $final_height = $height * ($new_width / $width);

            if ($final_height > $new_height) {
                $new_width = $width * ($new_height / $height);
            } else {
                $new_height = $final_height;
            }
        }

        // create a new true color image
        $canvas = imagecreatetruecolor($new_width, $new_height);
        imagealphablending($canvas, false);
        // Create a new transparent color for image
        $color = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
        // Completely fill the background of the new image with allocated color.
        imagefill($canvas, 0, 0, $color);
        // scale down and add borders
        if ($zoom_crop == 2) {

            $final_height = $height * ($new_width / $width);

            if ($final_height > $new_height) {

                $origin_x = $new_width / 2;
                $new_width = $width * ($new_height / $height);
                $origin_x = round($origin_x - ($new_width / 2));
            } else {

                $origin_y = $new_height / 2;
                $new_height = $final_height;
                $origin_y = round($origin_y - ($new_height / 2));
            }
        }
        imagesavealpha($canvas, true);
        if ($zoom_crop > 0) {

            $src_x = $src_y = 0;
            $src_w = $width;
            $src_h = $height;

            $cmp_x = $width / $new_width;
            $cmp_y = $height / $new_height;
            if ($cmp_x > $cmp_y) {

                $src_w = round($width / $cmp_x * $cmp_y);
                $src_x = round(($width - ($width / $cmp_x * $cmp_y)) / 2);
            } else if ($cmp_y > $cmp_x) {

                $src_h = round($height / $cmp_y * $cmp_x);
                $src_y = round(($height - ($height / $cmp_y * $cmp_x)) / 2);
            }
            $align = FALSE;
            if ($align) {
                if (strpos($align, 't') !== false) {
                    $src_y = 0;
                }
                if (strpos($align, 'b') !== false) {
                    $src_y = $height - $src_h;
                }
                if (strpos($align, 'l') !== false) {
                    $src_x = 0;
                }
                if (strpos($align, 'r') !== false) {
                    $src_x = $width - $src_w;
                }
            }
            imagecopyresampled($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);
        } else {
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        }

        $new_file = $file_name . '.' . $image_ext;

        if ($toFilePath == null) {
            $toFilePath = $folder . $new_file;
        }
        if ($func == 'imagejpeg')
            $func($canvas, $toFilePath, 72);
        else
            $func($canvas, $toFilePath, 5);
        return $new_file;
    }

}

?>