<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

require 'vendor/autoload.php';
require 'lib/render_241008.php';
// require 'lib/SimpleData_240317.php';


$user   = 'Walter';
// $user = 'Demo';
$design = $_GET['design'] ?? 'Black-design_Walter';
$lang   = $_GET['lang']   ?? 'en';

$data     = Yaml::parseFile("users/$user/cv_$lang.yml");
$captions = Yaml::parseFile("captions/$lang.yml");

$collapsibleCaptions = [];

foreach( scandir('captions') as $fil )
{
  if( pathinfo($fil, PATHINFO_EXTENSION) !== 'yml')  continue;
  $lng = pathinfo($fil, PATHINFO_FILENAME);
  $collapsibleCaptions[$lng] = Yaml::parseFile("captions/$fil")['collapsible'];
}

$html = render('page.php', /* new SimpleData( */ [
  'user'     => $user,
  'design'   => $design,
  'lang'     => $lang,
  'data'     => $data,
  'captions' => $captions,
  'collapsibleCaptions' => $collapsibleCaptions,
  'img'      => "users/$user/img.png"
]);

file_put_contents("users/$user/public/cv.html", $html);
copy("users/$user/img.png", "users/$user/public/img.png");

if( is_file("users/$user/qr.png"))
copy("users/$user/qr.png", "users/$user/public/qr.png");

echo render('page.php', /* new SimpleData( */ [
  'user'     => $user,
  'design'   => $design,
  'lang'     => $lang,
  'data'     => $data,
  'captions' => $captions,
  'collapsibleCaptions' => $collapsibleCaptions,
  'img' => "users/$user/img.png"
]);

?>
