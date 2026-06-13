<?php snippet('header') ?>

<main class="contact">
  <h1><?= $site->title()->html() ?></h1>

  <div class="intro"><?= $page->intro()->kirbytext() ?></div>

  <ul class="contact-details">
    <?php if ($page->email()->isNotEmpty()): ?>
      <li><a href="mailto:<?= $page->email()->html() ?>"><?= $page->email()->html() ?></a></li>
    <?php endif ?>
    <?php if ($page->phone()->isNotEmpty()): ?>
      <li><?= $page->phone()->html() ?></li>
    <?php endif ?>
    <?php if ($page->address()->isNotEmpty()): ?>
      <li><?= $page->address()->kirbytext() ?></li>
    <?php endif ?>
    <?php if ($page->instagram()->isNotEmpty()): ?>
      <li><a href="<?= $page->instagram()->html() ?>">Instagram</a></li>
    <?php endif ?>
    <?php if ($page->website()->isNotEmpty()): ?>
      <li><a href="<?= $page->website()->html() ?>">Website</a></li>
    <?php endif ?>
  </ul>
</main>

</body>
</html>
