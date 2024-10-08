<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

require 'vendor/autoload.php';


// $user = 'Walter';
$user    = 'Demo';
$design  = $_GET['design'] ?? 'Black-design_Walter';
$lang    = $_GET['lang']   ?? 'en';

$data     = Yaml::parseFile("users/$user/cv_$lang.yml");
$captions = Yaml::parseFile("captions/$lang.yml");

$img = 'img.png';

ob_start();
require 'page.php';
$html = ob_get_clean();

file_put_contents("users/$user/public/cv.html", $html);
copy("users/$user/img.png", "users/$user/public/img.png");

if( is_file("users/$user/qr.png"))
  copy("users/$user/qr.png", "users/$user/public/qr.png");

$img = "users/$user/img.png";

ob_start();
require 'page.php';
$html = ob_get_clean();

echo $html;

?>
