<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

require 'vendor/autoload.php';


$user = 'Walter';
// $user    = 'Demo';
$design  = $_GET['design'] ?? 'Black-design_Walter';

$data = Yaml::parseFile("users/$user/cv.yml");

ob_start();
require "designs/$design/layout.php";
$html = ob_get_clean();

file_put_contents("users/$user/public/cv.html", $html);

echo $html;

?>
