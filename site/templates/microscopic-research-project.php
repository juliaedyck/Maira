<?php snippet('header') ?>

<main class="microscopic-research-project">
  <?php if ($image = $page->image()): ?>
    <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
  <?php endif ?>

  <h1><?= $page->title()->html() ?></h1>
</main>

</body>
</html>
