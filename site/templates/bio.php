<?php snippet('header') ?>

<main class="bio">

  <div class="bio-left">
    <div class="text"><?= page()->text()->kirbytext() ?></div>

      <ul class="social-links">
      <?php if (page()->instagram()->isNotEmpty()): ?>
        <li><a href="<?= page()->instagram()->html() ?>">Instagram</a></li>
      <?php endif ?>
      <?php if (page()->website()->isNotEmpty()): ?>
        <li><a href="<?= page()->website()->html() ?>">Website</a></li>
      <?php endif ?>
      <?php if (page()->facebook()->isNotEmpty()): ?>
        <li><a href="<?= page()->facebook()->html() ?>">Facebook</a></li>
      <?php endif ?>
      <?php if (page()->vimeo()->isNotEmpty()): ?>
        <li><a href="<?= page()->vimeo()->html() ?>">Vimeo</a></li>
      <?php endif ?>
    </ul>
    
<?php if ($page->text2()->isNotEmpty()): ?>
  <div class="text upcoming">
    <?= nl2br($page->text2()->kirbytext()) ?>
  </div>
<?php endif ?>

  
  </div>

  <div class="bio-right">
    <?php if ($photo = page()->image()): ?>
      <img class="portrait" src="<?= $photo->url() ?>" alt="<?= $photo->alt()->html() ?>">
    <?php endif ?>
  </div>

</main>

</body>
</html>
