<?php snippet('header') ?>

<?php
  $categories = [
    'music-performance' => 'Music / Performance',
    'dj-sets'           => 'DJ Sets',
    'sound-baths'       => 'Sound Baths',
  ];

  $active   = get('category');
  $projects = page()->children()->listed();

  if ($active && array_key_exists($active, $categories)) {
    $projects = $projects->filterBy('category', $active);
  }
?>

<main class="work">


  <nav class="filter">
    <a class="filter-btn<?= !$active ? ' is-active' : '' ?>" href="<?= page()->url() ?>">All</a>
    <?php foreach ($categories as $slug => $label): ?>
      <a class="filter-btn<?= $active === $slug ? ' is-active' : '' ?>" href="<?= page()->url() ?>?category=<?= $slug ?>">
        <?= $label ?>
      </a>
    <?php endforeach ?>
  </nav>

  <div class="project-grid">
    <?php foreach ($projects as $project): ?>
      <a class="project-card" href="<?= $project->url() ?>">
        <?php if ($image = $project->files()->template('cover')->first()): ?>
          <div class="project-card-image">
            <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
          </div>
        <?php endif ?>
        <h2><?= $project->title()->html() ?></h2>
      </a>
    <?php endforeach ?>
  </div>
</main>

</body>
</html>
