<?php
$pageTitle = 'Pre-Construction — Ethereal Estates';
$pageDesc  = 'Explore exclusive pre-construction homes across Ontario.';
$activePage = 'pre-construction';
$bodyClass  = 'precon-body';
$extraHead = '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<style>
  /* Lock entire page — no scroll on body */
  html, body { height:100%; overflow:hidden; }
  body.precon-body { display:flex; flex-direction:column; }

  /* Navbar stays at top, does not grow */
  #site-navbar { flex-shrink:0; }

  /* main-wrap takes all space below navbar */
  #main-wrap { flex:1; min-height:0; display:flex; flex-direction:column; overflow:hidden; }

  /* Split row takes remaining height after header+filter */
  #pc-split { flex:1; min-height:0; display:flex; overflow:hidden; }

  /* Left column: fixed 40%, scroll only inside */
  #left-col {
    position:relative; width:40%; flex-shrink:0;
    display:flex; flex-direction:column;
    border-right:1px solid #e8e8e8; overflow:hidden;
  }

  /* The scroll div fills left-col exactly */
  #listings-scroll {
    flex:1; min-height:0;
    overflow-y:auto; overflow-x:hidden;
  }
  #listings-scroll::-webkit-scrollbar { width:3px; }
  #listings-scroll::-webkit-scrollbar-thumb { background:#e0e0e0; border-radius:2px; }

  /* Right column: map fills remaining 60% */
  #right-col { flex:1; position:relative; min-width:0; min-height:0; }
  #map { position:absolute; inset:0; width:100%; height:100%; }

  /* Leaflet popup */
  .leaflet-popup-content-wrapper { border-radius:8px!important; box-shadow:0 6px 24px rgba(0,0,0,.14)!important; padding:0!important; border:none!important; }
  .leaflet-popup-content { margin:0!important; }
  .leaflet-popup-tip-container { display:none; }

  /* Responsive */
  @media (max-width:768px) {
    #left-col  { width:100% !important; }
    #right-col { display:none !important; }
  }
  @media (min-width:769px) and (max-width:1100px) {
    #left-col { width:50% !important; }
  }
</style>';

require 'includes/head.php';
$navDark = false;
require 'includes/navbar.php';
?>

<div id="main-wrap">

  <!-- ── PAGE HEADER ── -->
  <div style="flex-shrink:0; background:#fff; border-bottom:1px solid #e8e8e8;">
   <div class="container">
    <div style="position:relative; display:flex; align-items:center;
                justify-content:space-between; padding:10px 0;">

        <!-- Left: back + label -->
        <div style="display:flex; flex-direction:column; gap:3px;">
          <a href="index.php" style="display:inline-flex; align-items:center; gap:5px;
                   font-size:11px; color:#aaa; text-decoration:none;
                   font-family:'Urbanist',sans-serif; transition:color .2s;" onmouseover="this.style.color='#d5a94e'"
            onmouseout="this.style.color='#aaa'">
            <svg width="12" height="9" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 12 9">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 1L2 4.5l5 3.5M2 4.5h10" />
            </svg>
            Back
          </a>
          <span style="font-size:11px; font-weight:600; letter-spacing:.18em;
                       text-transform:uppercase; color:#d5a94e;
                       font-family:'Urbanist',sans-serif;">
            (Pre Construction)
          </span>
        </div>

        <!-- Centre: title -->
        <h1 style="position:absolute; left:50%; transform:translateX(-50%);
                   font-family:'PP Fragment Serif Regular',Georgia,serif;
                   font-size:clamp(1.3rem,2.2vw,2rem);
                   font-weight:400; text-transform:uppercase;
                   letter-spacing:.06em; color:#111;
                   white-space:nowrap; margin:0; line-height:1;">
          Welcome to Your New Home
        </h1>

        <!-- Right: spacer for visual balance -->
        <div style="width:100px;"></div>
      </div>
   </div><!-- .container -->
  </div><!-- header -->

  <!-- ── FILTER BAR ── -->
  <div style="flex-shrink:0; background:#fff; border-bottom:1px solid #e8e8e8;
              display:flex; align-items:stretch; overflow-x:auto;">

      <!-- Search input -->
      <div style="flex:1; min-width:160px; border-right:1px solid #e8e8e8; padding-left:28px;">
        <input type="text" placeholder="Search by postcode or area..." style="width:100%; height:100%; padding:10px 12px 10px 0;
               font-size:12px; color:#555; font-family:'Urbanist',sans-serif;
               border:none; outline:none; background:transparent;" />
      </div>

      <?php
      $filters = [
        ['l' => '30 Miles', 'o' => ['30 Miles', '10 Miles', '20 Miles', '50 Miles']],
        ['l' => 'Max Price', 'o' => ['Max Price', '$500K', '$750K', '$1M', '$2M+']],
        ['l' => 'Bedrooms', 'o' => ['Bedrooms', '1+', '2+', '3+', '4+']],
        ['l' => 'Bathrooms', 'o' => ['Bathrooms', '1+', '2+', '3+']],
        ['l' => 'Property Type', 'o' => ['Property Type', 'Detached', 'Townhome', 'Condo', 'Bungalow']],
      ];
      foreach ($filters as $f): ?>
        <div style="border-right:1px solid #e8e8e8; flex-shrink:0;">
          <select style="height:100%; padding:10px 28px 10px 14px;
                     font-size:11px; font-weight:500; letter-spacing:.1em;
                     text-transform:uppercase; color:#444;
                     font-family:'Urbanist',sans-serif;
                     background:#fff url(\" data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='9'
            height='5' %3E%3Cpath d='M0 0l4.5 5L9 0z' fill='%23999' /%3E%3C/svg%3E\") no-repeat right 10px center;
            border:none; outline:none; cursor:pointer; appearance:none;">
            <?php foreach ($f['o'] as $o): ?>
              <option><?= $o ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- ══════════════════════════════════
  <!-- ══ SPLIT: 40% listings | 60% map ══ -->
  <div id="pc-split">

  <!-- LEFT 40% -->
  <div id="left-col">
    <!-- Gold accent bar -->
    <div style="position:absolute; left:0; top:0; bottom:0; width:3px; background:#d5a94e; z-index:5;"></div>
    <!-- Scrollable listings -->
    <div id="listings-scroll">

          <?php
          $listings = [
            [
              'id' => 0, 'city' => 'BOWMANVILLE', 'name' => 'Orchard South',
              'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
              'imgs' => ['assets/images/prop-orchard-south.jpg','assets/images/prop-chateau9.jpg','assets/images/prop-mirra.jpg'],
              'lat' => 43.9043, 'lng' => -78.6873,
            ],
            [
              'id' => 1, 'city' => 'BOWMANVILLE', 'name' => 'Chateau 9',
              'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
              'imgs' => ['assets/images/prop-chateau9.jpg','assets/images/prop-mirra.jpg','assets/images/prop-orchard-south.jpg'],
              'lat' => 43.9120, 'lng' => -78.6720,
            ],
            [
              'id' => 2, 'city' => 'BOWMANVILLE', 'name' => 'Ellia at Unity',
              'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
              'imgs' => ['assets/images/prop-mirra.jpg','assets/images/prop-orchard-south.jpg','assets/images/prop-chateau9.jpg'],
              'lat' => 43.8980, 'lng' => -78.6600,
            ],
            [
              'id' => 3, 'city' => 'OSHAWA', 'name' => 'Mirra Townhomes',
              'desc' => 'Modern townhomes with expansive rooftop terraces and designer kitchens',
              'imgs' => ['assets/images/prop-mirra.jpg','assets/images/prop-orchard-south.jpg','assets/images/prop-chateau9.jpg'],
              'lat' => 43.8971, 'lng' => -78.8658,
            ],
            [
              'id' => 4, 'city' => 'WHITBY', 'name' => 'Highland Reserve',
              'desc' => 'Scenic hillside community with sweeping Lake Ontario views',
              'imgs' => ['assets/images/prop-chateau9.jpg','assets/images/prop-mirra.jpg','assets/images/prop-orchard-south.jpg'],
              'lat' => 43.8975, 'lng' => -78.9417,
            ],
            [
              'id' => 5, 'city' => 'AJAX', 'name' => 'Orchard West',
              'desc' => 'Master-planned neighborhood with parks, top schools and modern family recreation',
              'imgs' => ['assets/images/prop-orchard-south.jpg','assets/images/prop-chateau9.jpg','assets/images/prop-mirra.jpg'],
              'lat' => 43.8510, 'lng' => -79.0300,
            ],
                [
              'id' => 2,
              'city' => 'BOWMANVILLE',
              'name' => 'Ellia at Unity',
              'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
              'imgs' => ['assets/images/prop-mirra.jpg', 'assets/images/prop-orchard-south.jpg', 'assets/images/prop-chateau9.jpg'],
              'lat' => 43.8980,
              'lng' => -78.6600,
            ],
                [
              'id' => 2,
              'city' => 'BOWMANVILLE',
              'name' => 'Ellia at Unity',
              'desc' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
              'imgs' => ['assets/images/prop-mirra.jpg', 'assets/images/prop-orchard-south.jpg', 'assets/images/prop-chateau9.jpg'],
              'lat' => 43.8980,
              'lng' => -78.6600,
            ],
          ];
          $ph = ['2a3d2e', '1e2e22', '283828'];

          foreach ($listings as $l):
            $bg = $l['id'] === 0 ? '#fdfaf4' : '#fff';
            ?>
            <div data-id="<?= $l['id'] ?>" onclick="selectListing(this, <?= $l['id'] ?>)" style="display:grid; grid-template-columns:1fr 130px;
                 border-bottom:1px solid #f0f0f0; cursor:pointer;
                 background:<?= $bg ?>; transition:background .15s;"
              onmouseover="if(this.dataset.active!='1')this.style.background='#fdfaf4'"
              onmouseout="if(this.dataset.active!='1')this.style.background='#fff'">

              <!-- Text -->
              <div style="padding:16px 12px 14px 22px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:.2em;
                      text-transform:uppercase; color:#bbb; margin:0 0 4px;
                      font-family:'Urbanist',sans-serif;">
                  <?= htmlspecialchars($l['city']) ?>
                </p>
                <h3 style="font-family:'PP Fragment Serif Regular',Georgia,serif;
                       font-size:1.3rem; text-transform:uppercase;
                       letter-spacing:.06em; line-height:1.1;
                       color:#111; margin:0 0 7px;">
                  <?= htmlspecialchars($l['name']) ?>
                </h3>
                <p style="font-size:11px; font-weight:300; color:#888;
                      line-height:1.5; margin:0;
                      font-family:'Urbanist',sans-serif;">
                  <?= htmlspecialchars($l['desc']) ?>
                </p>
              </div>

              <!-- Image slider -->
              <div style="position:relative; width:130px; flex-shrink:0;
                      overflow:hidden; background:#ddd;">
                <div id="sl-<?= $l['id'] ?>" style="display:flex; height:100%;
                     transition:transform .4s cubic-bezier(.4,0,.2,1);">
                  <?php foreach ($l['imgs'] as $k => $img):
                    $fb = 'https://placehold.co/130x120/' . $ph[$k % 3] . '/aaa?text=' . urlencode($l['name']);
                    ?>
                    <img src="<?= $img ?>" onerror="this.src='<?= $fb ?>'" alt="<?= htmlspecialchars($l['name']) ?>" style="width:130px; height:100%; min-height:120px;
                       object-fit:cover; flex-shrink:0; display:block;" />
                  <?php endforeach; ?>
                </div>

                <!-- Dots -->
                <div style="position:absolute; bottom:8px; left:0; right:0;
                        display:flex; align-items:center;
                        justify-content:center; gap:5px;">
                  <button onclick="gsl(event,<?= $l['id'] ?>,0)" style="width:20px; height:20px; border-radius:50%;
                       border:1.5px solid rgba(255,255,255,.7);
                       background:transparent; cursor:pointer; padding:0;
                       display:flex; align-items:center; justify-content:center;
                       flex-shrink:0;">
                    <span style="width:5px; height:5px; border-radius:50%;
                             background:rgba(255,255,255,.9); display:block;"></span>
                  </button>
                  <?php for ($k = 1; $k < count($l['imgs']); $k++): ?>
                    <span id="d-<?= $l['id'] ?>-<?= $k ?>" onclick="gsl(event,<?= $l['id'] ?>,<?= $k ?>)" style="width:5px; height:5px; border-radius:50%;
                       background:rgba(255,255,255,.45);
                       cursor:pointer; flex-shrink:0; display:block;
                       transition:background .2s;"></span>
                  <?php endfor; ?>
                </div>
              </div>

            </div>
          <?php endforeach; ?>

        </div><!-- #listings-scroll -->
      </div><!-- left 40% -->

      <!-- RIGHT 60% ── map fills entire remaining area -->
      <div id="right-col" style="flex:1; position:relative; min-width:0; min-height:0;">
        <div id="map" style="position:absolute; top:0; right:0; bottom:0; left:0;"></div>
      </div>

    </div><!-- split -->

  </div><!-- #main-wrap -->
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<?php require 'includes/scripts.php'; ?>
<script>
  /* ── Map init ── */
  const PROPS = [
    { id:0, name:'Orchard South',   city:'Bowmanville', lat:43.9043, lng:-78.6873 },
    { id:1, name:'Chateau 9',       city:'Bowmanville', lat:43.9120, lng:-78.6720 },
    { id:2, name:'Ellia at Unity',  city:'Bowmanville', lat:43.8980, lng:-78.6600 },
    { id:3, name:'Mirra Townhomes', city:'Oshawa',      lat:43.8971, lng:-78.8658 },
    { id:4, name:'Highland Reserve',city:'Whitby',      lat:43.8975, lng:-78.9417 },
    { id:5, name:'Orchard West',    city:'Ajax',        lat:43.8510, lng:-79.0300 },
  ];

const map = L.map('map', { center: [43.8900, -78.8000], zoom: 10 });
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    maxZoom: 19,
  }).addTo(map);

  function mkIcon(a) {
    const bg = a ? '#d5a94e' : '#1a2e1e';
    const bd = a ? '#1a2e1e' : '#d5a94e';
    return L.divIcon({
      className: '',
      iconSize: [34, 41], iconAnchor: [17, 41], popupAnchor: [0, -43],
      html: `<div style="display:flex;flex-direction:column;align-items:center;">
      <div style="width:34px;height:34px;border-radius:50%;background:${bg};
        border:2px solid ${bd};color:#fff;font-size:9px;font-weight:700;
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 2px 8px rgba(0,0,0,.3);">TH</div>
      <div style="width:2px;height:7px;background:${bg};"></div></div>`,
    });
  }

  const MKS = PROPS.map(p => {
    const m = L.marker([p.lat, p.lng], { icon: mkIcon(p.id === 0) })
      .addTo(map)
      .bindPopup(
        `<div style="padding:10px 13px;min-width:140px;">
         <p style="font-size:10px;letter-spacing:.16em;text-transform:uppercase;
                   color:#aaa;margin:0 0 2px;font-family:'Urbanist',sans-serif">${p.city}</p>
         <p style="font-family:'PP Fragment Serif Regular',Georgia,serif;
                   font-size:.9rem;text-transform:uppercase;color:#111;margin:0">${p.name}</p>
       </div>`,
        { closeButton: false }
      );
    m.on('click', () => {
      const r = document.querySelector(`[data-id="${p.id}"]`);
      if (r) selectListing(r, p.id);
    });
    return m;
  });

  function selectListing(el, id) {
    document.querySelectorAll('[data-id]').forEach(r => {
      r.style.background = '#fff';
      r.dataset.active = '0';
    });
    el.style.background = '#fdfaf4';
    el.dataset.active = '1';
    MKS.forEach((m, i) => m.setIcon(mkIcon(i === id)));
    map.flyTo([PROPS[id].lat, PROPS[id].lng], 14, { animate: true, duration: .7 });
    MKS[id].openPopup();
  }

  /* ── Sliders ── */
  const SI = [0, 0, 0];

  function gsl(e, lid, si) {
    e.stopPropagation();
    setSl(lid, si);
  }

  function setSl(lid, si) {
    const t = document.getElementById('sl-' + lid);
    if (!t) return;
    const tot = t.children.length;
    si = ((si % tot) + tot) % tot;
    SI[lid] = si;
    t.style.transform = `translateX(-${si * 130}px)`;
    for (let k = 1; k < tot; k++) {
      const d = document.getElementById(`d-${lid}-${k}`);
      if (d) d.style.background = k === si
        ? 'rgba(255,255,255,.95)'
        : 'rgba(255,255,255,.45)';
    }
  }

  setInterval(() => {
    for (let i = 0; i < 6; i++) {
      const t = document.getElementById('sl-' + i);
      if (t) setSl(i, (SI[i] + 1) % t.children.length);
    }
  }, 3000);

  setTimeout(() => MKS[0].openPopup(), 500);
</script>
</body>

</html>