<nav class="nav">
  <?php
  $pages = $site->find(
    'microscopic-research',
    'work',
    'herbal-medicine-research',
    'bio',
    'contact',
    'news'
  );
  ?>
  <?php foreach ($pages as $item): ?>
    <a class="nav-link<?= $item->isActive() ? ' is-active' : '' ?>" href="<?= $item->url() ?>">
      <?= $item->title()->html() ?>
    </a>
  <?php endforeach ?>
</nav>
