<?php snippet('header') ?>

<main class="news">
  <h1><?= $page->title()->html() ?></h1>

  <?php if ($page->text()->isNotEmpty()): ?>
    <div class="intro"><?= $page->text()->kirbytext() ?></div>
  <?php endif ?>

  <ul class="news-list">
    <?php foreach ($page->articles()->toStructure() as $item): ?>
      <li class="news-item">
        <h2><?= $item->title()->html() ?></h2>
        <time><?= $item->date()->toDate('d M Y') ?></time>
        <?php if ($item->category()->isNotEmpty()): ?>
          <span class="category"><?= $item->category()->html() ?></span>
        <?php endif ?>
        <div class="text"><?= $item->text()->kirbytext() ?></div>
        <?php if ($item->link()->isNotEmpty()): ?>
          <a href="<?= $item->link()->html() ?>">Read more</a>
        <?php endif ?>
      </li>
    <?php endforeach ?>
  </ul>
</main>

</body>
</html>
