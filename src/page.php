<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    <?php require "lib/tools_MOV.css"; ?>
    <?php require "designs/$design/styles.css"; ?>
  </style>
</head>
<body>

  <?php require "designs/$design/layout.php"; ?>

  <?php if( is_file("designs/$design/controller.js")): ?>
    <script>
      <?php require "designs/$design/controller.js"; ?>
    </script>
  <?php endif; ?>
</body>
</html>
