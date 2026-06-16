document.addEventListener('DOMContentLoaded', function () {
  var wrap = document.querySelector('.magnifier-wrap');
  var img  = wrap && wrap.querySelector('.home-image');

  if (!wrap || !img) return;

  // SVG filter for wave distortion
  var svgNS = 'http://www.w3.org/2000/svg';
  var svg = document.createElementNS(svgNS, 'svg');
  svg.style.cssText = 'position:absolute;width:0;height:0;overflow:hidden';
  svg.innerHTML =
    '<defs>' +
      '<filter id="wave-melt" x="-40%" y="-40%" width="180%" height="180%">' +
        '<feTurbulence id="melt-turbulence" type="fractalNoise" baseFrequency="0.02 0.03" numOctaves="3" result="noise"/>' +
        '<feDisplacementMap in="SourceGraphic" in2="noise" scale="45" xChannelSelector="R" yChannelSelector="G"/>' +
      '</filter>' +
    '</defs>';
  document.body.appendChild(svg);

  var turbulence = svg.querySelector('#melt-turbulence');

  // Each lens: size, zoom, x/y amplitudes, x/y speeds, phase offset
  var lenses = [
    { size: 260, zoom: 2.5, ax: 0.35, ay: 0.28, sx: 0.38, sy: 0.76, phase: 0 },
    { size: 180, zoom: 3.0, ax: 0.30, ay: 0.32, sx: 0.52, sy: 0.44, phase: 2.1 },
    { size: 220, zoom: 2.0, ax: 0.40, ay: 0.22, sx: 0.29, sy: 0.61, phase: 4.4 },
  ];

  // Build lens elements
  var nodes = lenses.map(function (cfg) {
    var lens = document.createElement('div');
    lens.className = 'magnifier-lens';
    lens.style.width  = cfg.size + 'px';
    lens.style.height = cfg.size + 'px';
    lens.style.filter = 'url(#wave-melt)';

    var zoomImg = document.createElement('img');
    zoomImg.className = 'magnifier-zoom';
    zoomImg.src = img.src;
    zoomImg.alt = '';
    lens.appendChild(zoomImg);
    wrap.appendChild(lens);

    return { lens: lens, zoom: zoomImg, cfg: cfg };
  });

  function tick() {
    var W = img.offsetWidth;
    var H = img.offsetHeight;
    var t = Date.now() / 1000;

    // Morph the shared wave filter
    var fx = 0.02 + 0.009 * Math.sin(t * 0.35);
    var fy = 0.03 + 0.009 * Math.cos(t * 0.28);
    turbulence.setAttribute('baseFrequency', fx + ' ' + fy);

    nodes.forEach(function (node) {
      var cfg  = node.cfg;
      var half = cfg.size / 2;
      var tp   = t + cfg.phase;

      var cx = W * 0.5 + W * cfg.ax * Math.sin(tp * cfg.sx);
      var cy = H * 0.5 + H * cfg.ay * Math.sin(tp * cfg.sy);

      node.lens.style.left = (cx - half) + 'px';
      node.lens.style.top  = (cy - half) + 'px';

      node.zoom.style.width  = W * cfg.zoom + 'px';
      node.zoom.style.height = H * cfg.zoom + 'px';
      node.zoom.style.left   = (half - cx * cfg.zoom) + 'px';
      node.zoom.style.top    = (half - cy * cfg.zoom) + 'px';
    });

    requestAnimationFrame(tick);
  }

  if (img.complete) {
    tick();
  } else {
    img.addEventListener('load', tick);
  }
});
