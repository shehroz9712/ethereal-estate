<?php
$pageTitle  = 'Featured Properties — Ethereal Estates';
$pageDesc   = 'Distinctive homes and considered choices across Ontario.';
$activePage = 'featured';
require 'includes/head.php';
$navDark = false;
require 'includes/navbar.php';
?>
<style>
  /* Cards wrapper — clips overflow */
  #cards-viewport {
    overflow: hidden;
    width: 100%;
  }
  /* Track — moves via JS transform */
  #cards-track {
    display: flex;
    gap: 20px;
    will-change: transform;
    transition: transform .45s cubic-bezier(.4,0,.2,1);
  }
  /* Each card — exactly 1/3 of viewport minus gaps */
  .prop-card {
    flex: 0 0 calc((100% - 40px) / 3);  /* 3 cards visible, 2 gaps of 20px */
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
  }
  .prop-card:hover {
    box-shadow: 0 8px 28px rgba(0,0,0,.10);
    transform: translateY(-2px);
    border-color: #d5a94e88;
  }
  .card-img-wrap {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4/3;
    background: #e8e8e8;
  }
  .card-img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .45s cubic-bezier(.2,.8,.2,1);
  }
  .prop-card:hover .card-img { transform: scale(1.04); }

  /* Pagination pills */
  .pg-pill {
    font-size: 12px; letter-spacing: .06em;
    color: #bbb; cursor: pointer;
    padding: 2px 5px; transition: color .2s;
    user-select: none;
  }
  .pg-pill.active { color: #111; font-weight: 700; }
  .pg-pill:hover  { color: #d5a94e; }

  /* Amenity */
  .am { display:flex; align-items:center; gap:5px; font-size:11px; color:#555; white-space:nowrap; }
  .am svg { width:13px; height:13px; color:#d5a94e; flex-shrink:0; }
</style>

<!-- ══ PAGE HEADER ══ -->
<div class="bg-white border-b border-gray-100">

  <!-- Back -->
  <div class="container">
    <a href="index.php"
      class="inline-flex items-center gap-1.5 text-[11px] tracking-wide text-gray-400
             hover:text-gold transition-colors mb-1 pt-3 block">
      <svg width="12" height="9" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 12 9">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7 1L2 4.5l5 3.5M2 4.5h10"/>
      </svg>
      Back
    </a>

    <!-- Title row + pagination -->
    <div class="flex items-center justify-between pb-3 flex-wrap gap-3">

      <!-- Left: label + title -->
      <div class="flex items-baseline gap-5 flex-wrap">
        <span class="text-gold text-[11px] font-semibold tracking-[.18em] uppercase whitespace-nowrap">
          (Properties)
        </span>
        <h1 class="font-fragment text-[1.9rem] lg:text-[2.2rem] font-normal uppercase tracking-[.06em] leading-none text-gray-900">
          Ethereal Estates Living Across Ontario
        </h1>
      </div>

      <!-- Right: pagination only (no arrows) -->
      <div id="pg-pills" class="flex items-center gap-0.5 flex-shrink-0">
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <span class="pg-pill<?= $i===1?' active':'' ?>" data-index="<?= $i-1 ?>"
            onclick="goToCard(<?= $i-1 ?>)">(<?= $i ?>)</span>
        <?php endfor; ?>
      </div>

    </div>
  </div>
</div>

<!-- ══ CARDS AREA ══ -->
<div class="container py-6 pb-12">
  <div id="cards-viewport">
    <div id="cards-track">

      <?php
      $props = [
        ['img'=>'prop-orchard-south.jpg','loc'=>'Bowmanville','title'=>'Orchard South',   'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages','bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
        ['img'=>'prop-mirra.jpg',         'loc'=>'Bowmanville','title'=>'Mirra Townhomes', 'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages','bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
        ['img'=>'prop-chateau9.jpg',      'loc'=>'Bowmanville','title'=>'Chateau 9',       'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages','bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
        ['img'=>'',                       'loc'=>'Bowmanville','title'=>'Orchard West',    'desc'=>'Bungalows and Single Detached Homes with 2 & 3-Car Garages','bed'=>4,'bath'=>6,'gar'=>1,'sqft'=>1400,'bal'=>8],
        ['img'=>'',                       'loc'=>'Whitby',     'title'=>'Highland Reserve','desc'=>'Scenic hillside community with sweeping Lake Ontario views',  'bed'=>5,'bath'=>5,'gar'=>3,'sqft'=>3600,'bal'=>5],
      ];

      $icons = [
        'bed'  => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9.5V17h18V9.5M3 13h18M7 9.5V8a1 1 0 011-1h8a1 1 0 011 1v1.5"/></svg>',
        'bath' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h16v3a4 4 0 01-4 4H8a4 4 0 01-4-4v-3zm0 0V7a2 2 0 012-2h2v3"/></svg>',
        'gar'  => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="8" width="20" height="13" rx="1" stroke-width="1.5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2 11h20M9 21v-4h6v4"/></svg>',
        'sqft' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1" stroke-width="1.5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8h18M8 3v18"/></svg>',
        'bal'  => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M5 10V7a2 2 0 012-2h10a2 2 0 012 2v3M5 10v8h14v-8"/></svg>',
      ];

      foreach ($props as $i => $p):
        $ph  = 'https://placehold.co/600x450/c8c8c8/888888?text='.urlencode($p['title']);
        $src = $p['img'] ? 'assets/images/'.$p['img'] : $ph;
      ?>
      <a href="property-detail.php" class="prop-card">

        <!-- Image -->
        <div class="card-img-wrap">
          <img class="card-img"
            src="<?= $src ?>"
            onerror="this.src='<?= $ph ?>'"
            alt="<?= htmlspecialchars($p['title']) ?>" />
        </div>

        <!-- Body -->
        <div class="p-4 flex flex-col flex-1">
          <p class="text-[10px] font-semibold tracking-[.22em] uppercase text-gray-400 mb-1">
            <?= htmlspecialchars($p['loc']) ?>
          </p>
          <h2 class="font-fragment text-[1.4rem] uppercase tracking-[.05em] leading-tight text-gray-900 mb-2">
            <?= htmlspecialchars($p['title']) ?>
          </h2>
          <p class="text-[11.5px] text-gray-500 font-light leading-relaxed mb-3 flex-1">
            <?= htmlspecialchars($p['desc']) ?>
          </p>

          <!-- Amenities -->
          <div class="flex flex-wrap gap-x-3 gap-y-1.5 border-t border-gray-100 pt-3 mt-auto">
            <span class="am"><?= $icons['bed']  ?> <?= $p['bed']  ?> Bedrooms</span>
            <span class="am"><?= $icons['bath'] ?> <?= $p['bath'] ?> Bathroom</span>
            <span class="am"><?= $icons['gar']  ?> <?= $p['gar']  ?> Garage</span>
            <span class="am"><?= $icons['sqft'] ?> <?= number_format($p['sqft']) ?> sq.ft</span>
            <span class="am"><?= $icons['bal']  ?> <?= $p['bal']  ?> Balcony</span>
          </div>
        </div>

      </a>
      <?php endforeach; ?>

    </div><!-- #cards-track -->
  </div><!-- #cards-viewport -->
</div>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
<script>
/* ══════════════════════════════════════
   SLIDER — loop:true, no arrows, JS-driven
   5 cards, 3 visible at a time.
   Pills (1)(2)(3)(4)(5) each maps to showing
   that card as the first visible card.
   Loop: after card 5 → wraps back to card 1.
══════════════════════════════════════ */

const TOTAL   = 5;
const VISIBLE = 3;
const GAP     = 20;    // px, must match CSS gap
let   current = 0;     // index of first visible card

const viewport = document.getElementById('cards-viewport');
const track    = document.getElementById('cards-track');
const pills    = document.querySelectorAll('.pg-pill');

/* Get single card width (calculated from viewport) */
function cardW() {
  return (viewport.clientWidth - GAP * (VISIBLE - 1)) / VISIBLE;
}

/* Apply position without animation (e.g. on resize) */
function applyPos(animated) {
  const step = cardW() + GAP;
  track.style.transition = animated
    ? 'transform .45s cubic-bezier(.4,0,.2,1)'
    : 'none';
  track.style.transform = `translateX(-${current * step}px)`;
  // sync pills
  pills.forEach((p, i) => p.classList.toggle('active', i === current));
}

/* Go to a specific card index (with loop) */
function goToCard(idx) {
  /* clamp — but since we loop, mod it */
  current = ((idx % TOTAL) + TOTAL) % TOTAL;
  applyPos(true);
}

/* Auto-advance every 4s (loop true) */
setInterval(() => goToCard(current + 1), 4000);

/* Pill click */
pills.forEach(p => {
  p.addEventListener('click', () => goToCard(parseInt(p.dataset.index)));
});

/* Recalculate on resize */
window.addEventListener('resize', () => applyPos(false), { passive: true });

/* Init — set card widths via CSS variable */
function initCardWidths() {
  const w = cardW();
  document.querySelectorAll('.prop-card').forEach(c => {
    c.style.flex = `0 0 ${w}px`;
  });
}

/* Boot */
initCardWidths();
applyPos(false);
window.addEventListener('resize', () => { initCardWidths(); applyPos(false); }, { passive: true });
</script>
</body>
</html>
