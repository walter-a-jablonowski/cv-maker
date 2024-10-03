<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['personal']['name'] ?> - Resume</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    <?php require "designs/$design/styles.css"; ?>
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      
      <img src="users/<?= $user ?>/img.png" alt="<?= $data['personal']['name'] ?>" class="profile-img">
      
      <h1 style="font-size: 2.4vw;"><?= $data['personal']['name'] ?></h1>  <!-- fix font size so that it matches container -->
      
      <?php if( ! empty( $data['personal']['summary'] )): ?>
        <p><?= $data['personal']['summary'] ?></p>
      <?php endif; ?>

      <div class="contact-info">
        <table style="margin-left: -4px;">
          <tr>
            <td><i class="bi bi-envelope"></i></td>
            <td><?= $data['personal']['email'] ?></td>
          </tr>
          <tr>
            <td><i class="bi bi-globe"></i></td>
            <td><a href="<?= $data['personal']['url'] ?>"><?= str_replace(['https://', 'http://'], '', $data['personal']['url'] ) ?></a></td>
          </tr>
          <tr>
            <td style="vertical-align: top;"><i class="bi bi-geo-alt-fill"></i></td>
            <td>
              <?= $data['personal']['location']['address'] ?> <br>
              <?= $data['personal']['location']['postalCode'] ?> <?= $data['personal']['location']['city'] ?>
            </td>
          </tr>
        </table>
      </div>

      <!-- <h2>Dev skills</h2> -->
      
      <?php foreach( $data['skills']['dev'] as $skill => $level): ?>
        <div class="skill" style="margin-top: 20px;">
          <div class="skill-name"><?= $skill ?></div>
          <div class="skill-bar">
            <div class="skill-level" style="width: <?= $level ?>%;"></div>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- <h2>Language skills</h2> -->
      
      <div class="lang-skills" style="margin-top: 40px;">
        <?php foreach( $data['skills']['lang'] as $language => $proficiency): ?>
          <span class="lang-skill"><?= $language ?>: <?= $proficiency ?></span>
        <?php endforeach; ?>
      </div>
        
      <div style="padding-top: 40px;">
        <table class="misc-personal">
          <tr>
            <td>Born:</td>
            <td><?= $data['personal']['dateOfBirth'] ?></td>
          </tr>
          <tr>
            <td>Nationality:</td>
            <td><?= $data['personal']['nationality'] ?></td>
          </tr>
          <tr>
            <td>Marital status:</td>
            <td><?= $data['personal']['maritalStatus'] ?></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="main-content">

      <?php if( ! empty( $data['personal']['logo'] )): ?>
        <div style="text-align: center;">
          <img src="users/<?= $user ?>/<?= $data['personal']['logo'] ?>" width="150">
        </div>
      <?php endif; ?>
      
      <section>
        <h2>Summary</h2>
        <p><?= $data['summary'] ?></p>
      </section>

      <section>
        <h2>Special skills</h2>
        <p><?= $data['specialSkills'] ?></p>
      </section>

      <section>
        <h2>Goals</h2>
        <p><?= $data['goals'] ?></p>
      </section>

      <section>
  
        <h2>Experience</h2>
  
        <div class="timeline">
          <?php foreach( $data['experience'] as $job): ?>
            <div class="experience-item">
              <h3>
                <span class="date"><?= $job['from'] ?> - <?= $job['until'] ?></span>
                &nbsp;
                <?= $job['position'] ?>
              </h3>
              <?php if( ! empty( $job['organisation']) || ! empty( $job['summary'])): ?>
                <p>
                  <?php if( ! empty( $job['organisation'] )): ?>
                    <span class="label">Company:</span> <?= $job['organisation'] ?>
                  <?php endif; ?>
                  <?php if( ! empty( $job['summary']) && ! empty( $job['organisation'])): ?>
                    <br>
                  <?php endif; ?>
                  <?php if( ! empty( $job['summary'] )): ?>
                    <?= $job['summary'] ?>
                  <?php endif; ?>
                </p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
        
      <section>
          
        <h2>Education</h2>
        
        <div class="timeline">
          <?php foreach( $data['education'] as $edu): ?>
            <div class="education-item">
              <h3>
                <span class="date"><?= $job['from'] ?> - <?= $job['until'] ?></span>
                &nbsp;
                <?= $edu['institution'] ?>
              </h3>
              <?php if( ! empty( $edu['summary']) || ! empty( $edu['degree'])): ?>
                <p>
                  <?php if( ! empty( $edu['summary'] )): ?>
                    <?= $edu['summary'] ?>
                  <?php endif; ?>
                  <?php if( ! empty( $edu['summary']) && ! empty( $edu['degree'])): ?>
                    <br>
                  <?php endif; ?>
                  <?php if( ! empty( $edu['degree'] )): ?>
                    <span class="label">Degree:</span> <?= $edu['degree'] ?>
                  <?php endif; ?>
                </p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <p class="footer">
        powered by <a href="https://github.com/walter-a-jablonowski/cv-maker" target="_blank">cv-maker</a> &copy; Walter A. Jablonowski 2024
      </p>
    </div>
    
  </div>
  <?php if( is_file("designs/$design/controller.js")): ?>
    <script>
      <?php require "designs/$design/controller.js"; ?>
    </script>
  <?php endif; ?>
</body>
</html>
