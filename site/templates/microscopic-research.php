<?php snippet('header') ?>

<main class="microscopic-research">

  <?php if (page()->intro()->isNotEmpty()): ?>
    <div class="intro"><?= page()->intro()->kirbytext() ?></div>
  <?php endif ?>

  <div class="image-grid">
    <?php foreach (page()->entries()->toStructure() as $entry): ?>
      <?php $img = $entry->image()->toFile() ?>
      <figure class="image-grid-item">
        <?php if ($img): ?>
          <img src="<?= $img->url() ?>" alt="<?= $entry->title()->html() ?>">
        <?php endif ?>
        <?php if ($entry->title()->isNotEmpty()): ?>
          <figcaption><?= $entry->title()->html() ?></figcaption>
        <?php endif ?>
      </figure>
    <?php endforeach ?>

    <div class="image-zoom-overlay" id="imageZoom" hidden>
      <img id="imageZoomImg" src="" alt="">
      <figcaption id="imageZoomCaption"></figcaption>
    </div>
  </div>

</main>

<script>
  var grid    = document.querySelector('.image-grid');
  var overlay = document.getElementById('imageZoom');
  var zoomImg = document.getElementById('imageZoomImg');
  var zoomCap = document.getElementById('imageZoomCaption');

  document.querySelectorAll('.image-grid-item img').forEach(function (img) {
    img.addEventListener('click', function () {
      zoomImg.src = img.src;
      zoomImg.alt = img.alt;
      zoomCap.textContent = img.closest('figure').querySelector('figcaption')?.textContent || '';
      overlay.hidden = false;
    });
  });

  overlay.addEventListener('click', function () {
    overlay.hidden = true;
  });
</script>

</body>
</html>
