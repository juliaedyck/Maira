<?php snippet('header') ?>

<main class="contact">

  <div class="contact-left">
    <?php if (page()->intro()->isNotEmpty()): ?>
      <div class="intro"><?= page()->intro()->kirbytext() ?></div>
    <?php endif ?>

    <ul class="contact-details">
      <?php if (page()->email()->isNotEmpty()): ?>
        <li><a href="mailto:<?= page()->email()->html() ?>"><?= page()->email()->html() ?></a></li>
      <?php endif ?>
      <?php if (page()->phone()->isNotEmpty()): ?>
        <li><?= page()->phone()->html() ?></li>
      <?php endif ?>
      <?php if (page()->address()->isNotEmpty()): ?>
        <li><?= page()->address()->kirbytext() ?></li>
      <?php endif ?>
      <?php if (page()->instagram()->isNotEmpty()): ?>
        <li><a href="<?= page()->instagram()->html() ?>">Instagram</a></li>
      <?php endif ?>
      <?php if (page()->website()->isNotEmpty()): ?>
        <li><a href="<?= page()->website()->html() ?>">Website</a></li>
      <?php endif ?>
    </ul>
  </div>

  <div class="contact-right">
    <?php if ($cover = page()->cover()->toFile()): ?>
      <img class="cover" src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>">
    <?php endif ?>
  </div>

</main>

</body>
</html>
