<?php snippet('header') ?>

<?php
  $cover   = page()->files()->template('cover')->first();
  $gallery = page()->files()->not(page()->files()->template('cover'));
?>

<main class="work-project">

  <div class="work-project-left">
    <a class="back-link" href="<?= page()->parent()->url() ?>">←</a>
    <h1><?= page()->title()->html() ?></h1>

    <div class="text"><?= page()->text()->kirbytext() ?></div>

<?php
  $videoUrl = page()->video()->value();
  $soundcloudUrl = page()->soundcloud()->value();
  $videoEmbed = '';

  if ($videoUrl) {
    if (preg_match('/(?:youtube\.com\/watch\?v=|youtube\.com\/live\/|youtu\.be\/)([a-zA-Z0-9_-]+)/', $videoUrl, $m)) {
      $videoEmbed = 'https://www.youtube.com/embed/' . $m[1] . '?rel=0';
    } elseif (preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $m)) {
      $videoEmbed = 'https://player.vimeo.com/video/' . $m[1];
    }
  }
?>

<?php if ($videoEmbed): ?>
  <div class="embed embed--video">
    <iframe
      src="<?= $videoEmbed ?>"
      frameborder="0"
      allow="autoplay; fullscreen; picture-in-picture"
      allowfullscreen>
    </iframe>
  </div>
<?php endif ?>

<?php if ($soundcloudUrl): ?>
  <div class="embed embed--audio">
    <iframe
      src="https://w.soundcloud.com/player/?url=<?= urlencode($soundcloudUrl) ?>&color=%23000000&auto_play=false&hide_related=true&show_comments=false&show_teaser=false&visual=true"
      frameborder="0"
      allow="autoplay">
    </iframe>
  </div>
<?php endif ?>

</div>

  <div class="work-project-right">
    <?php if ($cover): ?>
      <img id="cover-display" class="cover" src="<?= $cover->url() ?>" alt="<?= $cover->alt()->html() ?>">
    <?php endif ?>

    <?php if ($gallery->isNotEmpty()): ?>
      <div class="gallery">
        <?php foreach ($gallery as $image): ?>
          <img
            class="gallery-thumb"
            src="<?= $image->url() ?>"
            alt="<?= $image->alt()->html() ?>"
          >
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>

</main>

<script>
  document.querySelectorAll('.gallery-thumb').forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      var display = document.getElementById('cover-display');
      if (!display) return;
      display.src = thumb.src;
      display.alt = thumb.alt;
      document.querySelectorAll('.gallery-thumb').forEach(function (t) {
        t.classList.remove('is-active');
      });
      thumb.classList.add('is-active');
    });
  });
</script>

</body>
</html>
