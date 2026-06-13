<?php snippet('header') ?>

<main class="herbal-medicine-research">
  <h1><?= $page->title()->html() ?></h1>

  <?php if ($image = $page->image()): ?>
    <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
  <?php endif ?>

  <div class="text"><?= $page->text()->kirbytext() ?></div>
</main>

</body>
</html>
