<?php snippet('header') ?>



<main class="home">
  <h1><?= $page->headline()->html() ?></h1>
  <div class="intro"><?= $page->intro()->kirbytext() ?></div>

  <?php if ($image = $page->image()): ?>
    <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
  <?php endif ?>
</main>

</body>
</html>
