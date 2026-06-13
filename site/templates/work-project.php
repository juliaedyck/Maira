<?php snippet('header') ?>

<main class="work-project">
  <?php if ($cover = $page->image()): ?>
    <img class="cover" src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>">
  <?php endif ?>

  <h1><?= $page->title()->html() ?></h1>

  <div class="text"><?= $page->text()->kirbytext() ?></div>

  <?php if ($page->embed()->isNotEmpty()): ?>
    <div class="embed">
      <?= $page->embed()->kirbytext() ?>
    </div>
  <?php endif ?>

  <?php $gallery = $page->files()->template('image'); ?>
  <?php if ($gallery->isNotEmpty()): ?>
    <div class="gallery">
      <?php foreach ($gallery as $image): ?>
        <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
      <?php endforeach ?>
    </div>
  <?php endif ?>
</main>

</body>
</html>
