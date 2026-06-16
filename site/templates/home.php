<?php snippet('header') ?>

<main class="home">
  <?php if ($image = $page->image()): ?>
    <div class="magnifier-wrap">

      <svg style="display:none">
        <filter id="warp" x="0%" y="0%" width="100%" height="100%">
          <feTurbulence id="turbulence" type="turbulence" baseFrequency="0.003" numOctaves="3" result="noise"/>
          <feDisplacementMap in="SourceGraphic" in2="noise" scale="15" xChannelSelector="R" yChannelSelector="G"/>
        </filter>
      </svg>

      <div class="warp-inner">
        <img class="home-image" src="<?= $image->url() ?>" alt="<?= $image->alt()->html() ?>">
      </div>

    </div>

    <script>
      const turbulence = document.getElementById('turbulence');
      const start = performance.now();

      function animate(now) {
        const elapsed = (now - start) / 1000;
        const freq = 0.003 + Math.sin(elapsed * 0.3) * 0.002 + Math.sin(elapsed * 0.5) * 0.001;
        turbulence.setAttribute('baseFrequency', freq);
        requestAnimationFrame(animate);
      }

      requestAnimationFrame(animate);
    </script>
  <?php endif ?>
</main>