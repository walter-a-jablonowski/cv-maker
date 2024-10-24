<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

?><!DOCTYPE html>
<html lang="<?= $args['lang'] ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <title>Resume</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    <?php require "lib/collapsible/style.css"; ?>
    <?php require "lib/tools_MOV.css"; ?>
    <?php require "designs/$args[design]/styles.css"; ?>
  </style>
</head>
<body>

  <?php
  
    print render("designs/$args[design]/layout.php", /* $args */ [
      'user'     => $args['user'],
      'lang'     => $args['lang'],
      'data'     => $args['data'],
      'captions' => $args['captions'],
      'collapsibleCaptions' => $args['collapsibleCaptions'],
      'res'      => $args['res']
    ]);
  ?>

  <script>
    const captions = {
      'en': <?php echo json_encode( Yaml::parseFile("captions/en.yml")); ?>,
      'de': <?php echo json_encode( Yaml::parseFile("captions/de.yml")); ?>
    }
    const data = {
      'en': <?php echo json_encode( Yaml::parseFile("users/$args[user]/cv_en.yml")); ?>,
      'de': <?php echo json_encode( Yaml::parseFile("users/$args[user]/cv_de.yml")); ?>
    }
  </script>
  <script>
  
    <?php require 'lib/objects_MOV.js'; ?>
    <?php require 'lib/collapsible/controller.js'; ?>
    <?php require 'lib/translation.js'; ?>
  
    <?php if( is_file("designs/$args[design]/controller.js")): ?>
      <?php require "designs/$args[design]/controller.js"; ?>
    <?php endif; ?>
  </script>
</body>
</html>
