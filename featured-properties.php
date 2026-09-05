<?php
$pageTitle  = 'Featured Properties — Ethereal Estates';
$pageDesc   = 'Distinctive homes and considered choices across Ontario.';
$activePage = 'featured';
require 'includes/head.php';
?>
<style>
  /* ══ PAGE STRUCTURE ══ */
  html, body { height: 100%; }
  body { display: flex; flex-direction: column; min-height: 100vh; }

  /* ══ PAGE HEADER ══ */
  #page-header {
    flex-shrink: 0;
    padding: 14px 40px 0 40px;
    background: #fff;
  }
  .back-link {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11px; letter-spacing: .08em; color: #999;
    text-decoration: none; transition: color .2s; margin-bottom: 4px;
  }
  .back-link:hover { color: #d5a94e; }
  .header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 12px;
    border-bottom: 1px solid #eee;
    gap: 16px;
    flex-wrap: nowrap;
  }
  .header-left {
    display: flex;
    align-items: baseline;
    gap: 24px;
    min-width: 0;
  }
  .prop-label {
    font-size: 12px; letter-spacing: .16em;
    text-transform: uppercase; color: #d5a94e;
    font-weight: 600; white-space: nowrap; flex-shrink: 0;
  }
  .prop-title {
    font-family: "PP Fragment Serif Regular", Georgia, serif;
    font-size: 2rem; font-weight: 400;
    text-transform: uppercase; letter-spacing: .06em;
    color: #111; line-height: 1; white-space: nowrap;
  }

  /* ══ Pagination + Arrows ══ */
  .header-right {
    display: flex; align-items: center; gap: 10px; flex-shrink: 0;
  }
  .pg-pills {
    display: flex; align-items: center; gap: 2px;
  }
  .pg-pill {
    font-size: 12px; letter-spacing: .06em; color: #bbb;
    cursor: pointer; padding: 2px 5px; transition: color .2s;
    font-weight: 400; user-select: none;
  }
  .pg-pill.active { color: #111; font-weight: 600; }
  .pg-pill:hover  { color: #d5a94e; }

  /* Arrow buttons */
  .arr-btn {
    width: 34px; height: 34px; border-radius: 50%;
    border: 1px solid #ddd; background: #fff;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: all .2s; flex-shrink: 0;
  }
  .arr-btn:hover { border-color: #d5a94e; background: #fdf8ee; }
  .arr-btn svg { width: 13px; height: 13px; color: #555; }

  /* ══ CARDS AREA ══ */
  #cards-area {
    flex: 1;
    padding: 24px 40px 24px 40px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }

  /* ══ CARDS TRACK — horizontal slider, 5 cards visible by calc ══ */
  #cards-track {
    display: flex;
    gap: 18px;
    overflow: hidden; /* JS-driven, no native scroll */
    flex: 1;
  }

  /* ══ PROPERTY CARD ══ */
  .prop-card {
    /* Show exactly 3 full cards + peek of 4th — matches Figma */
    flex: 0 0 calc((100% - 3 * 18px) / 3.25);
    min-width: 0;
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 8px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    transition: box-shadow .3s, transform .3s, border-color .3s;
    flex-shrink: 0;
  }
  .prop-card:hover {
    box-shadow: 0 8px 28px rgba(0,0,0,.10);
    transform: translateY(-2px);
    border-color: #d5a94e88;
  }

  /* Card image */
  .card-img-wrap {
    position: relative; overflow: hidden;
    aspect-ratio: 4/3; background: #e8e8e8;
  }
  .card-img {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: transform .45s cubic-bezier(.2,.8,.2,1);
  }
  .prop-card:hover .card-img { transform: scale(1.04); }

  /* Card body */
  .card-body { padding: 16px 18px 18px; display: flex; flex-direction: column; flex: 1; }
  .card-loc {
    font-size: 10px; letter-spacing: .22em; text-transform: uppercase;
    color: #aaa; font-weight: 600; margin-bottom: 4px;
  }
  .card-name {
    font-family: "PP Fragment Serif Regular", Georgia, serif;
    font-size: 1.45rem; text-transform: uppercase;
    letter-spacing: .05em; line-height: 1.1; color: #111; margin-bottom: 7px;
  }
  .card-desc {
    font-size: 11.5px; color: #777; font-weight: 300;
    line-height: 1.5; margin-bottom: 14px; flex: 1;
  }

  /* Amenities row */
  .amenities {
    display: flex; flex-wrap: wrap; gap: 5px 12px;
    border-top: 1px solid #f0f0f0; padding-top: 12px; margin-top: auto;
  }
  .am {
    display: flex; align-items: center; gap: 5px;
    font-size: 11px; color: #555; font-weight: 400; white-space: nowrap;
  }
  .am svg { width: 13px; height: 13px; color: #d5a94e; flex-shrink: 0; }
</style>

<?php $navDark = false; require 'includes/navbar.php'; ?>

<!-- ══ PAGE HEADER ══ -->
<div id="page-header">
  <a href="index.php" class="back-link">
    <svg width="13" height="10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 13 10">
      <path stroke-linecap="round" stroke-linejoin="round" d="M8 1L3 5l5 4M3 5h10"/>
    </svg>
    Back
  </a>

  <div class="header-row">
    <!-- Left: label + title -->
    <div class="header-left">
      <span class="prop-label">(Properties)</span>
      <h1 class="prop-title">Ethereal Estates Living Across Ontario</h1>
    </div>

    <!-- Right: pagination + arrows -->
    <div class="header-right">
      <!-- Page pills (1)(2)...(5) -->
      <div class="pg-pills" id="pg-pills">
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <span class="pg-pill<?= $i===1?' active':'' ?>" data-page="<?= $i-1 ?>"
            onclick="goToCard(<?= $i-1 ?>)">(<?= $i ?>)</span>
        <?php endfor; ?>
      </div>
      <!-- Left arrow -->
      <button class="arr-btn" onclick="shiftCards(-1)" aria-label="Previous">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <!-- Right arrow -->
      <button class="arr-btn" onclick="shiftCards(1)" aria-label="Next">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>
  </div>
</div>

<!-- ══ CARDS AREA ══ -->
<div id="cards-area">
  <div id="cards-track">

    <?php
    $props = [
      ['img'=>'prop-orchard-south.jpg', 'loc'=>'Bowmanville', 'title'=>'Orchard South',    'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
      ['img'=>'prop-mirra.jpg',          'loc'=>'Bowmanville', 'title'=>'Mirra Townhomes',  'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
      ['img'=>'prop-chateau9.jpg',       'loc'=>'Bowmanville', 'title'=>'Chateau 9',        'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
      ['img'=>'',                        'loc'=>'Bowmanville', 'title'=>'Orchard West',     'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
      ['img'=>'',                        'loc'=>'Whitby',      'title'=>'Highland Reserve', 'desc'=>'Scenic hillside community with sweeping Lake Ontario views',  'bed'=>5,'bath'=>5,'gar'=>3,'sqft'=>3600,'bal'=>5],
    ];

    // Amenity icon helper
    $icon = [
      'bed'  => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9.5V17h18V9.5M3 13h18M7 9.5V8a1 1 0 011-1h8a1 1 0 011 1v1.5"/></svg>',
      'bath' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h16v3a4 4 0 01-4 4H8a4 4 0 01-4-4v-3zm0 0V7a2 2 0 012-2h2v3"/></svg>',
      'gar'  => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="8" width="20" height="13" rx="1" stroke-width="1.5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2 11h20M9 21v-4h6v4"/></svg>',
      'sqft' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1" stroke-width="1.5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8h18M8 3v18"/></svg>',
      'bal'  => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M5 10V7a2 2 0 012-2h10a2 2 0 012 2v3M5 10v8h14v-8"/></svg>',
    ];

    foreach ($props as $i => $p):
      $ph  = 'https://placehold.co/560x420/c8c8c8/888888?text='.urlencode($p['title']);
      $src = $p['img'] ? 'assets/images/'.$p['img'] : $ph;
    ?>
    <a href="property-detail.php" class="prop-card" data-index="<?= $i ?>">
      <div class="card-img-wrap">
        <img class="card-img"
          src="<?= $src ?>"
          onerror="this.src='<?= $ph ?>'"
          alt="<?= htmlspecialchars($p['title']) ?>" />
      </div>
      <div class="card-body">
        <p class="card-loc"><?= htmlspecialchars($p['loc']) ?></p>
        <h2 class="card-name"><?= htmlspecialchars($p['title']) ?></h2>
        <p class="card-desc"><?= htmlspecialchars($p['desc']) ?></p>
        <div class="amenities">
          <span class="am"><?= $icon['bed']  ?> <?= $p['bed']  ?> Bedrooms</span>
          <span class="am"><?= $icon['bath'] ?> <?= $p['bath'] ?> Bathroom</span>
          <span class="am"><?= $icon['gar']  ?> <?= $p['gar']  ?> Garage</span>
          <span class="am"><?= $icon['sqft'] ?> <?= number_format($p['sqft']) ?> sq.ft</span>
          <span class="am"><?= $icon['bal']  ?> <?= $p['bal']  ?> Balcony</span>
        </div>
      </div>
    </a>
    <?php endforeach; ?>

  </div>
</div>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
<script>
/* ══════════════════════════════════════════
   CARDS SLIDER  (JS-driven, no overflow scroll)
   5 cards total, show ~3.25 at a time.
   currentIndex = index of leftmost visible card.
══════════════════════════════════════════ */

let currentIdx = 0;
const TOTAL     = 5;          // total cards
const VISIBLE   = 3.25;       // how many show at once
const MAX_IDX   = Math.max(0, TOTAL - Math.floor(VISIBLE)); // = 2 (cards 0-2 can be start)

const track = document.getElementById('cards-track');

function getCardWidth() {
  const card = track.querySelector('.prop-card');
  if (!card) return 300;
  return card.getBoundingClientRect().width + 18; // card + gap
}

function applyPosition(animated) {
  const w = getCardWidth();
  track.style.transition = animated ? 'transform .45s cubic-bezier(.4,0,.2,1)' : 'none';
  track.style.transform  = `translateX(-${currentIdx * w}px)`;
  // Update pills
  document.querySelectorAll('.pg-pill').forEach((el, i) => {
    el.classList.toggle('active', i === currentIdx);
  });
}

function shiftCards(dir) {
  currentIdx = Math.min(MAX_IDX, Math.max(0, currentIdx + dir));
  applyPosition(true);
}

function goToCard(idx) {
  currentIdx = Math.min(MAX_IDX, Math.max(0, idx));
  applyPosition(true);
}

// Recalculate on resize
window.addEventListener('resize', () => applyPosition(false), { passive: true });

// Init
applyPosition(false);
</script>
</body>
</html>
