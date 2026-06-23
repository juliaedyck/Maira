<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= site()->description()->html() ?>">

  <title><?= page()->title() ?> — <?= site()->title() ?></title>

  <?= css('assets/index.css') ?>

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

  <?php $page = page('home')?>
  <div class= "head">
  <h1><?= $page->headline()?></h1>

  <?php if ($page->intro()->isNotEmpty()): ?>
    <div class="intro"><?= $page->intro() ?></div>
    <?php endif ?>
    </div>
    
    <?php snippet('nav') ?>

<script>
  var nav  = document.querySelector('.nav');
  var head = document.querySelector('.head');

  head.addEventListener('click', function (e) {
    e.stopPropagation();
    nav.classList.toggle('nav--open');
  });
</script>
