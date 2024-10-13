<div class="container">
  <div class="sidebar">
    
    <img src="<?= $args['img'] ?>" class="profile-img" style="max-width: 200px;">
    
    <h1 style="font-size: 2.4vw;">  <!-- fix font size so that it matches container -->
      <?=    $args['data']['personal']['name']
          // $args->get('data.personal.name')
      ?>
    </h1>
    
    <?php if( ! empty( $args['data']['personal']['summary'] )): ?>
      <p data-key="personal.summary">
        <?= $args['data']['personal']['summary'] ?>
      </p>
    <?php endif; ?>

    <div class="contact-info">
      <table style="margin-left: -4px;">
        <tr>
          <td><i class="bi bi-envelope"></i></td>
          <td>
            <a href="mailto:<?= $args['data']['personal']['email'] ?>"><?= $args['data']['personal']['email'] ?></a>
          </td>
        </tr>
        <tr>
          <td><i class="bi bi-globe"></i></td>
          <td>
            <a href="<?= $args['data']['personal']['url'] ?>">
              <?= str_replace(['https://', 'http://'], '', $args['data']['personal']['url'] ) ?>
            </a>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: top;"><i class="bi bi-geo-alt-fill"></i></td>
          <td>
            <a href="https://goo.gl/maps/RRCcuAVrxa2qfJr9A" target="_blank">
              <?= $args['data']['personal']['location']['address'] ?> <br>
              <?= $args['data']['personal']['location']['postalCode'] ?> <?= $args['data']['personal']['location']['city'] ?>
            </a>
          </td>
        </tr>
      </table>
    </div>

    <?php foreach( $args['data']['skills']['dev'] as $skill => $level ): ?>
      <div class="skill" style="margin-top: 20px;">
        <div class="skill-name"><?= $skill ?></div>
        <div class="skill-bar">
          <div class="skill-level" style="width: <?= $level ?>%;"></div>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="lang-skills" style="margin-top: 40px;">
      <?php foreach( $args['data']['skills']['lang'] as $lang => $level ): ?>
        <span class="lang-skill">
          <span data-caption="<?= $lang ?>"><?= $args['captions'][$lang] ?></span>: <span data-key="skills.lang.<?= $lang ?>"><?= $level ?></span>
        </span>
      <?php endforeach; ?>
    </div>
      
    <div class="new-page" style="padding-top: 20px;">
      <table class="misc-personal">
        <tr>
          <td data-caption="born">
            <?= $args['captions']['born'] ?>:
          </td>
          <td data-key="personal.dateOfBirth">
            <?= $args['data']['personal']['dateOfBirth'] ?>
          </td>
        </tr>
        <tr>
          <td data-caption="nationality">
            <?= $args['captions']['nationality'] ?>:
          </td>
          <td data-key="personal.nationality">
            <?= $args['data']['personal']['nationality'] ?>
          </td>
        </tr>
        <tr>
          <td data-caption="maritalStatus">
            <?= $args['captions']['maritalStatus'] ?>:
          </td>
          <td data-key="personal.maritalStatus">
            <?= $args['data']['personal']['maritalStatus'] ?>
          </td>
        </tr>
      </table>
    </div>

    <?php if( is_file("users/$args[user]/qr.png")): ?>
      <div style="padding: 20px 0 5px 0;">
        Scan me
      </div>
      <div>
        <img src="users/<?= $args['user'] ?>/qr.png" style="max-width: 200px;">
      </div>
    <?php endif; ?>
  </div>

  <div class="main-content">

    <div class="action-buttons">
      <button id="printBtn" class="btn btn-action" onclick="printCV()">
        <i class="bi bi-printer"></i>
      </button>
      <button id="langBtn"  class="btn btn-action lang-en" onclick="toggleLanguage()">
        <img  src="https://flagcdn.com/w20/us.png">
      </button>
    </div>

    <?php if( ! empty( $args['data']['personal']['logo'] )): ?>
      <div style="text-align: center;">
        <img src="users/<?= $args['user'] ?>/<?= $args['data']['personal']['logo'] ?>"  style="max-width: 150px;">
      </div>
    <?php endif; ?>
    
    <section>
      <h2 data-caption="summary">
        <?= $args['captions']['summary'] ?>
      </h2>
      <p data-key="summary">
        <?= $args['data']['summary'] ?>
      </p>
    </section>

    <section>
      <h2 data-caption="specialSkills">
        <?= $args['captions']['specialSkills'] ?>
      </h2>
      <p>
        <!-- collapsible -->
         <div class="collapsible" data-captions="<?= htmlspecialchars( json_encode( $args['collapsibleCaptions'])) ?>">
          <div data-key="specialSkills" class="content collapsed">
            <?= $args['data']['specialSkills'] ?>
          </div>
          <span class="more-btn" data-caption="collapsible.readMore">Read more ...</span>
          <!-- special elem -->
          <span class="info">
            <i class="bi bi-info-circle"></i> see online version at <a href="https://is.gd/waj_cv">is.gd/waj_cv</a>
          </span>
        </div>
      </p>
    </section>
    
    <section>
      <h2 data-caption="goals">
        <?= $args['captions']['goals'] ?>
      </h2>
      <div data-key="goals">  <!-- ul can't be inside p (html used in yml) -->
        <?= $args['data']['goals'] ?>
      </div>
    </section>
    
    <section class="new-page">
      
      <h2 data-caption="experience">
        <?= $args['captions']['experience'] ?>
      </h2>
      
      <div class="timeline" data-list="experience">
        <?php foreach( $args['data']['experience'] as $idx => $job ): ?>
          <div class="experience-item" data-idx="<?= $idx ?>">
            <h3>
              <span class="date">
                <span data-key="from"><?= $job['from'] ?></span> - <span data-key="until"><?= $job['until'] ?></span>
              </span>
              &nbsp;
              <span data-key="position"><?= $job['position'] ?></span>
            </h3>
            <?php if( ! empty( $job['organisation']) || ! empty( $job['summary'])): ?>
              <p class="details">
                <?php if( ! empty( $job['organisation'] )): ?>
                  <div>
                    <span class="label" data-caption="company">Company</span>: <span data-key="organisation"><?= $job['organisation'] ?></span>
                  </div>
                <?php endif; ?>
                <?php if( ! empty( $job['summary'] )): ?>
                  <div data-key="summary"><?= $job['summary'] ?></div>
                <?php endif; ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
      
    <section>
        
      <h2 data-caption="education">
        <?= $args['captions']['education'] ?>
      </h2>
      
      <div class="timeline" data-list="education">
        <?php foreach( $args['data']['education'] as $idx => $edu ): ?>
          <div class="education-item" data-idx="<?= $idx ?>">
            <h3>
              <span class="date">
                <span data-key="from"><?= $edu['from'] ?></span> - <span data-key="until"><?= $edu['until'] ?></span>
              </span>
              &nbsp;
              <span data-key="institution"><?= $edu['institution'] ?></span>
            </h3>
            <?php if( ! empty( $edu['summary']) || ! empty( $edu['degree'])): ?>
              <p class="details">
                <?php if( ! empty( $edu['summary'] )): ?>
                  <div data-key="summary"><?= $edu['summary'] ?></div>
                <?php endif; ?>
                <?php if( ! empty( $edu['degree'] )): ?>
                  <div>
                    <span class="label" data-caption="degree">Degree</span>: <span data-key="degree"><?= $edu['degree'] ?></span>
                  </div>
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
