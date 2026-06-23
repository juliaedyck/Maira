<?php snippet('header') ?>

<main class="herbal-medicine-research">

  <div class="hmr-left">
    <div class="text"><?= page()->text()->kirbytext() ?></div>
  </div>

  <div class="hmr-right">
    <?php if ($image = page()->image()): ?>
      <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
    <?php endif ?>
  </div>

</main>

</body>
</html>
