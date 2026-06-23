<?php snippet('header') ?>

<main class="research">

  <?php if ($page->intro()->isNotEmpty()): ?>
    <div class="intro"><?= $page->intro()->kirbytext() ?></div>
  <?php endif ?>

  <div class="research-links">
    <?php foreach ($site->find('microscopic-research', 'herbal-medicine-research') as $item): ?>
      <a class="research-card" href="<?= $item->url() ?>">
        <?php if ($image = $item->image()): ?>
          <div class="research-card-image">
            <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
          </div>
        <?php endif ?>
        <h2><?= $item->title()->html() ?></h2>
      </a>
    <?php endforeach ?>
  </div>
</main>

</body>
</html>
