<?php snippet('header') ?>

<main class="microscopic-research">
  <h1><?= $page->title()->html() ?></h1>

  <div class="project-grid">
    <?php foreach ($page->children()->listed() as $project): ?>
      <a class="project-card" href="<?= $project->url() ?>">
        <?php if ($image = $project->image()): ?>
          <img src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
        <?php endif ?>
        <h2><?= $project->title()->html() ?></h2>
      </a>
    <?php endforeach ?>
  </div>
</main>

</body>
</html>
