<?php
$pageTitle  = 'Pre-Construction — Ethereal Estates';
$pageDesc   = 'Explore exclusive pre-construction homes across Ontario with Ethereal Estates.';
$activePage = 'pre-construction';
$bodyClass  = 'precon-page';
$extraHead  = '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>';
require 'includes/head.php';
?>
<style>
  /* ── Full-screen lock ── */
  html, body { height: 100%; overflow: hidden; }
  .precon-page { display: flex; flex-direction: column; height: 100dvh; overflow: hidden; }

  /* ── Bootstrap-style container ── */
  /* Centers and constrains all page content, just like Bootstrap's .container */
  .pc-container {
    width: 100%;
    max-width: 1400px;        /* max viewport width */
    margin-left: auto;
    margin-right: auto;
    padding-left: 28px;
    padding-right: 28px;
  }

  /* ── Page header ── */
  #page-header {
    flex-shrink: 0;
    padding-top: 10px;
    padding-bottom: 0;
    border-bottom: 1px solid #e8e8e8;
    background: #fff;
  }

  /* Back link */
  .back-link {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11px; letter-spacing: .08em; color: #888;
    text-decoration: none; transition: color .2s;
    margin-bottom: 2px;
  }
  .back-link:hover { color: #d5a94e; }

  /* Title row */
  .title-row {
    display: flex;
    align-items: baseline;
    gap: 28px;
    flex-wrap: wrap;
    margin-bottom: 10px;
  }
  .pre-label {
    font-size: 12px; letter-spacing: .16em; text-transform: uppercase;
    color: #d5a94e; font-weight: 600; white-space: nowrap;
  }
  .page-title {
    font-family: "PP Fragment Serif Regular", Georgia, serif;
    font-size: 2rem; /* ~32px — matches Figma */
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: #111;
    line-height: 1;
  }

  /* ── Filter bar ── */
  #filter-bar {
    display: flex;
    align-items: center;
    gap: 0;
    border-top: 1px solid #e8e8e8;
    flex-shrink: 0;
  }

  .filter-input-wrap {
    flex: 1;
    min-width: 180px;
    border-right: 1px solid #e8e8e8;
  }
  .filter-input-wrap input {
    width: 100%; padding: 10px 14px;
    font-size: 12px; font-family: "Urbanist", sans-serif;
    color: #444; border: none; outline: none; background: #fff;
    letter-spacing: .01em;
  }
  .filter-input-wrap input::placeholder { color: #bbb; }

  .filter-select-wrap {
    border-right: 1px solid #e8e8e8;
    position: relative;
    flex-shrink: 0;
  }
  .filter-select-wrap:last-child { border-right: none; }
  .filter-select-wrap select {
    appearance: none;
    padding: 10px 30px 10px 14px;
    font-size: 11px; font-family: "Urbanist", sans-serif;
    font-weight: 500; letter-spacing: .1em; text-transform: uppercase;
    color: #333; background: #fff; border: none; outline: none;
    cursor: pointer;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='9' height='5'%3E%3Cpath d='M0 0l4.5 5L9 0z' fill='%23999'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
  }

  /* ── Split body ── */
  #split-body {
    flex: 1;
    display: flex;
    overflow: hidden;
    min-height: 0;
  }

  /* The container inside split-body stretches full width */
  #split-body > .pc-container {
    max-width: 100%;
    width: 100%;
    padding: 0;
    display: flex;
    flex: 1;
    overflow: hidden;
    min-height: 0;
  }

  /* ── LEFT panel ── */
  #left-panel {
    width: 500px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    border-right: 1px solid #e8e8e8;
    overflow: hidden;
    position: relative;
  }
  /* Gold left accent bar */
  #left-panel::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 3px;
    background: #d5a94e;
    z-index: 2;
  }

  #listings-scroll {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
  }
  #listings-scroll::-webkit-scrollbar { width: 0; }

  /* ── Listing row ── */
  .listing-row {
    display: grid;
    grid-template-columns: 1fr 130px;
    border-bottom: 1px solid #efefef;
    cursor: pointer;
    transition: background .15s;
    min-height: 90px;
  }
  .listing-row:hover { background: #fdfaf4; }
  .listing-row.active { background: #fdfaf4; }

  .listing-left {
    padding: 14px 14px 12px 20px; /* 20px left = past the gold bar */
  }

  .listing-city {
    font-size: 10px; letter-spacing: .2em;
    text-transform: uppercase; color: #aaa;
    font-weight: 600; margin-bottom: 3px;
  }
  .listing-name {
    font-family: "PP Fragment Serif Regular", Georgia, serif;
    font-size: 1.3rem; /* ~21px — matches Figma */
    text-transform: uppercase;
    letter-spacing: .06em;
    line-height: 1.1;
    color: #111;
    margin-bottom: 5px;
  }
  .listing-desc {
    font-size: 11px; color: #888;
    font-weight: 300; line-height: 1.45;
    margin-bottom: 6px;
  }

  /* ── Image slider ── */
  .img-slider {
    position: relative;
    overflow: hidden;
    background: #ddd;
    flex-shrink: 0;
    width: 130px;
  }
  .img-slider-track {
    display: flex;
    height: 100%;
    transition: transform .4s cubic-bezier(.4,0,.2,1);
  }
  .slide-img {
    flex-shrink: 0;
    width: 130px;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  /* Dots + circle button */
  .slider-bottom {
    position: absolute;
    bottom: 7px; left: 0; right: 0;
    display: flex; align-items: center; justify-content: center;
    gap: 5px;
  }
  .slide-dot-btn {
    width: 22px; height: 22px; border-radius: 50%;
    border: 1.5px solid rgba(255,255,255,.75);
    background: transparent;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; padding: 0; flex-shrink: 0;
  }
  .slide-dot-btn span {
    width: 6px; height: 6px; border-radius: 50%;
    background: rgba(255,255,255,.85);
    display: block;
  }
  .img-dot {
    width: 5px; height: 5px; border-radius: 50%;
    background: rgba(255,255,255,.55);
    cursor: pointer; flex-shrink: 0;
    transition: background .2s;
  }
  .img-dot.active { background: #fff; }

  /* ── RIGHT: Leaflet map ── */
  #map-panel { flex: 1; min-width: 0; position: relative; }
  #map { width: 100%;
    height: calc(100vh - 335px); }

  /* Custom map pin */
  .leaf-pin { display: flex; flex-direction: column; align-items: center; }
  .leaf-pin-head {
    width: 34px; height: 34px; border-radius: 50%;
    background: #1a2e1e; color: #fff;
    font-size: 9px; font-weight: 700; letter-spacing: .04em;
    display: flex; align-items: center; justify-content: center;
    border: 2px solid #d5a94e;
    box-shadow: 0 2px 8px rgba(0,0,0,.28);
  }
  .leaf-pin-tail {
    width: 2px; height: 7px;
    background: #1a2e1e;
  }
  .leaf-pin-active .leaf-pin-head {
    background: #d5a94e; border-color: #1a2e1e;
  }

  /* Leaflet popup */
  .leaflet-popup-content-wrapper {
    border-radius: 8px !important;
    box-shadow: 0 6px 24px rgba(0,0,0,.14) !important;
    padding: 0 !important; border: none !important;
  }
  .leaflet-popup-content { margin: 0 !important; }
  .leaflet-popup-tip-container { display: none; }
  .map-popup { padding: 11px 14px; min-width: 150px; }

  @media(max-width:768px){
    #left-panel { width: 100%; }
    #map-panel  { display: none; }
  }
</style>

<?php
$navDark = false;
require 'includes/navbar.php';
?>

<!-- ══ PAGE HEADER ══ -->
<div id="page-header">
  <div class="pc-container">
    <a href="index.php" class="back-link">
      <svg width="13" height="10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 13 10">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 1L3 5l5 4M3 5h10"/>
      </svg>
      Back
    </a>
    <div class="title-row">
      <span class="pre-label">(Pre Construction)</span>
      <h1 class="page-title">Welcome to Your New Home</h1>
    </div>
  </div>
</div>

<!-- ══ FILTER BAR ══ -->
<div id="filter-bar">
  <div class="pc-container" style="display:flex;align-items:center;gap:0;padding-left:28px;padding-right:0;">
    <div class="filter-input-wrap">
      <input type="text" placeholder="Search by postcode or area..." />
    </div>
    <?php
    $filters = [
      '30 MILES'     => ['30 Miles','10 Miles','20 Miles','50 Miles'],
      'MAX PRICE'    => ['Max Price','$500K','$750K','$1M','$2M+'],
      'BEDROOMS'     => ['Bedrooms','1+','2+','3+','4+'],
      'BATHROOMS'    => ['Bathrooms','1+','2+','3+'],
      'PROPERTY TYPE'=> ['Property Type','Detached','Townhome','Condo','Bungalow'],
    ];
    foreach ($filters as $label => $opts): ?>
    <div class="filter-select-wrap">
      <select aria-label="<?= $label ?>">
        <?php foreach ($opts as $o): ?>
          <option><?= $o ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ══ SPLIT BODY ══ -->
<div id="split-body">
  <div class="pc-container" style="display:flex;flex:1;overflow:hidden;padding-left:0;padding-right:0;max-width:100%;">

    <!-- LEFT: 3 listings -->
    <div id="left-panel">
    <div id="listings-scroll">
      <?php
      $listings = [
        [
          'id'   => 0,
          'city' => 'BOWMANVILLE',
          'name' => 'Orchard South',
          'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
          'imgs' => ['assets/images/prop-orchard-south.jpg','',''],
          'lat'  => 43.9043, 'lng' => -78.6873,
        ],
        [
          'id'   => 1,
          'city' => 'BOWMANVILLE',
          'name' => 'Chateau 9',
          'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
          'imgs' => ['assets/images/prop-chateau9.jpg','',''],
          'lat'  => 43.9120, 'lng' => -78.6720,
        ],
        [
          'id'   => 2,
          'city' => 'BOWMANVILLE',
          'name' => 'Ellia at Unity',
          'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
          'imgs' => ['assets/images/prop-mirra.jpg','',''],
          'lat'  => 43.8980, 'lng' => -78.6600,
        ],
      ];
      foreach ($listings as $l):
        $isActive = $l['id'] === 0 ? ' active' : '';
      ?>
      <div class="listing-row<?= $isActive ?>" data-id="<?= $l['id'] ?>"
        onclick="selectListing(this, <?= $l['id'] ?>)">

        <!-- Left: text -->
        <div class="listing-left">
          <p class="listing-city"><?= $l['city'] ?></p>
          <h3 class="listing-name"><?= htmlspecialchars($l['name']) ?></h3>
          <p class="listing-desc"><?= htmlspecialchars($l['desc']) ?></p>
        </div>

        <!-- Right: image slider -->
        <div class="img-slider">
          <div class="img-slider-track" id="slider-<?= $l['id'] ?>">
            <?php
            $fallbackColors = ['2a3d2e','1e2e22','283828'];
            foreach ($l['imgs'] as $k => $img):
              $ph  = 'https://placehold.co/130x90/'.$fallbackColors[$k%3].'/aaaaaa?text='.urlencode($l['name']);
              $src = $img ?: $ph;
            ?>
            <img class="slide-img"
              src="<?= $src ?>"
              onerror="this.src='<?= $ph ?>'"
              alt="<?= htmlspecialchars($l['name']) ?>" />
            <?php endforeach; ?>
          </div>

          <!-- Circle + dots -->
          <div class="slider-bottom" id="dots-<?= $l['id'] ?>">
            <button class="slide-dot-btn" onclick="goSlide(event,<?= $l['id'] ?>,0)" aria-label="Slide 1">
              <span></span>
            </button>
            <?php for ($k = 1; $k < count($l['imgs']); $k++): ?>
            <span class="img-dot<?= $k===1?' active':'' ?>"
              onclick="goSlide(event,<?= $l['id'] ?>,<?= $k ?>)"></span>
            <?php endfor; ?>
          </div>
        </div>

      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- RIGHT: real street map -->
  <div id="map-panel">
    <div id="map"></div>
  </div>

  </div><!-- .pc-container -->
</div><!-- #split-body -->

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<?php require 'includes/scripts.php'; ?>
<script>
/* ── Properties data ── */
const PROPS = [
  { id:0, name:'Orchard South', city:'Bowmanville', lat:43.9043, lng:-78.6873 },
  { id:1, name:'Chateau 9',     city:'Bowmanville', lat:43.9120, lng:-78.6720 },
  { id:2, name:'Ellia at Unity',city:'Bowmanville', lat:43.8980, lng:-78.6600 },
];

/* ── Init map ── */
const map = L.map('map', { center:[43.9050,-78.6730], zoom:13 });
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  maxZoom: 19,
}).addTo(map);

/* ── Custom pin icon ── */
function makeIcon(active) {
  return L.divIcon({
    className: '',
    html: `<div class="leaf-pin${active?' leaf-pin-active':''}">
             <div class="leaf-pin-head">TH</div>
             <div class="leaf-pin-tail"></div>
           </div>`,
    iconSize:   [34, 41],
    iconAnchor: [17, 41],
    popupAnchor:[0, -43],
  });
}

/* ── Add markers ── */
const markers = PROPS.map(p => {
  const m = L.marker([p.lat, p.lng], { icon: makeIcon(p.id === 0) })
    .addTo(map)
    .bindPopup(
      `<div class="map-popup">
         <p style="font-size:10px;letter-spacing:.18em;text-transform:uppercase;color:#aaa;margin-bottom:3px">${p.city}</p>
         <p style="font-family:'PP Fragment Serif Regular',Georgia,serif;font-size:.95rem;text-transform:uppercase;color:#111">${p.name}</p>
       </div>`,
      { closeButton: false }
    );

  m.on('click', () => {
    const row = document.querySelector(`.listing-row[data-id="${p.id}"]`);
    if (row) selectListing(row, p.id);
  });

  return m;
});

/* ── Select listing ── */
function selectListing(el, id) {
  document.querySelectorAll('.listing-row').forEach(r => r.classList.remove('active'));
  el.classList.add('active');
  markers.forEach((m, i) => m.setIcon(makeIcon(i === id)));
  map.flyTo([PROPS[id].lat, PROPS[id].lng], 14, { animate:true, duration:.7 });
  markers[id].openPopup();
}

/* ── Image slider ── */
const slideIdx = [0, 0, 0];

function goSlide(e, lid, si) {
  e.stopPropagation();
  setSlide(lid, si);
}

function setSlide(lid, si) {
  const track = document.getElementById('slider-' + lid);
  if (!track) return;
  const total = track.children.length;
  si = ((si % total) + total) % total;
  slideIdx[lid] = si;
  track.style.transform = `translateX(-${si * 130}px)`;
}

/* Auto-advance slides every 3s */
setInterval(() => {
  for (let i = 0; i < PROPS.length; i++) {
    const track = document.getElementById('slider-' + i);
    if (track) setSlide(i, (slideIdx[i] + 1) % track.children.length);
  }
}, 3000);

/* Open first popup on load */
setTimeout(() => markers[0].openPopup(), 500);
</script>
</body>
</html>
