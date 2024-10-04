<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

require 'vendor/autoload.php';


$user = 'Walter';
// $user    = 'Demo';
$design  = $_GET['design'] ?? 'Black-design_Walter';
$lang    = 'de';

$data     = Yaml::parseFile("users/$user/cv_$lang.yml");
$captions = Yaml::parseFile("captions/$lang.yml");

ob_start();
require "designs/$design/layout.php";
$html = ob_get_clean();

file_put_contents("users/$user/public/cv.html", $html);


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    <?php require "designs/$design/styles.css"; ?>
  </style>
</head>
<body>

  <?php echo $html; ?>

  <?php if( is_file("designs/$design/controller.js")): ?>
    <script>
      <?php require "designs/$design/controller.js"; ?>
    </script>
  <?php endif; ?>
</body>
</html>
