<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

require 'vendor/autoload.php';
require 'lib/render_241008.php';
// require 'lib/SimpleData_240317.php';


// $user = 'Walter';
$user = 'Demo';
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

$html = render('page.php', [
  'user'     => $user,
  'design'   => $design,
  'lang'     => $lang,
  'data'     => /* new SimpleData( */ $data,  // use extract
  'captions' => /* new SimpleData( */ $captions,
  'collapsibleCaptions' => $collapsibleCaptions,
  'res'      => ''
]);

file_put_contents("users/$user/public/index.html", $html);
copy("users/$user/img.png", "users/$user/public/img.png");

if( is_file("users/$user/logo.png"))
  copy("users/$user/logo.png", "users/$user/public/logo.png");

if( is_file("users/$user/qr.png"))
  copy("users/$user/qr.png", "users/$user/public/qr.png");

if( is_file('favicon.ico'))
{
  copy('android-chrome-192x192.png', "users/$user/public/android-chrome-192x192.png");
  copy('android-chrome-512x512.png', "users/$user/public/android-chrome-512x512.png");
  copy('apple-touch-icon.png',       "users/$user/public/apple-touch-icon.png");
  copy('favicon.ico',                "users/$user/public/favicon.ico");
  copy('favicon-16x16.png',          "users/$user/public/favicon-16x16.png");
  copy('favicon-32x32.png',          "users/$user/public/favicon-32x32.png");
  copy('site.webmanifest',           "users/$user/public/site.webmanifest");
}

echo render('page.php', [
  'user'     => $user,
  'design'   => $design,
  'lang'     => $lang,
  'data'     => /* new SimpleData( */ $data,
  'captions' => /* new SimpleData( */ $captions,
  'collapsibleCaptions' => $collapsibleCaptions,
  'res'      => "users/$user/"
]);

?>
