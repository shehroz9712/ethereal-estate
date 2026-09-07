<?php
$pageTitle  = 'Orchard South, Bowmanville — Ethereal Estates';
$pageDesc   = 'Orchard South in Bowmanville. Luxury bungalows and single detached homes with 2 & 3-car garages. Starting from $999,900.';
$activePage = 'pre-construction';
require 'includes/head.php';
?>
<style>
  .tab-pill{font-size:11px;font-weight:500;letter-spacing:.12em;text-transform:uppercase;padding:8px 18px;border-radius:999px;cursor:pointer;color:var(--text-muted);transition:all .2s;background:transparent;border:none}
  .tab-pill:hover{color:var(--text);background:var(--bg-soft)}
  .tab-pill.active{background:#0f2e1a;color:#fff}
  .tab-section{display:block}
  .tab-section.hidden{display:none}
  #register-modal{opacity:0;pointer-events:none;transition:opacity .3s ease}
  #register-modal.open{opacity:1;pointer-events:all}
  .spec-card{padding:24px;border:1px solid var(--border);border-radius:10px;transition:border-color .2s}
  .spec-card:hover{border-color:#d5a94e88}
  .feature-card{padding:24px;border:1px solid var(--border);border-radius:10px;background:var(--bg-soft)}
  .floor-card{border:1px solid var(--border);border-radius:12px;overflow:hidden;padding:24px;background:var(--bg-card);transition:border-color .2s}
  .floor-card:hover{border-color:#d5a94e}
  .sub-nav{position:sticky;top:57px;z-index:40;border-bottom:1px solid var(--border);background:var(--nav-bg);backdrop-filter:blur(8px)}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- HERO BANNER -->
<div class="px-4 lg:px-14 pt-4">
  <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl" style="height:580px">
    <img src="https://placehold.co/1600x580/b8b8b8/777777?text=Orchard+South+Hero" alt="Orchard South" class="w-full h-full object-cover"/>
    <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(0,0,0,.85) 0%,rgba(0,0,0,.35) 50%,rgba(0,0,0,.2) 100%)"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 pb-28">
      <span class="text-gold tracking-[.25em] uppercase text-xs font-semibold mb-2">Bowmanville</span>
      <h1 class="font-fragment text-4xl sm:text-5xl lg:text-6xl text-white uppercase tracking-[.06em] mb-3">Orchard South</h1>
      <p class="text-white/90 text-sm md:text-base font-light tracking-wide mb-6">Starting from $999,900*</p>
      <button onclick="openModal()" class="inline-flex items-center gap-2 bg-gold hover:bg-[#e3b961] text-white font-semibold text-xs tracking-[.18em] uppercase px-7 py-3 transition-all shadow-lg">Now Selling ↗</button>
    </div>
    <!-- Info bar -->
    <div class="absolute bottom-6 inset-x-6 lg:inset-x-12 rounded-xl p-5 border border-white/15" style="background:rgba(0,0,0,.65);backdrop-filter:blur(8px)">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs font-light text-white">
        <?php
        $infos = [
          ['label'=>'Address','val'=>'Middle Road & Concession Road 3'],
          ['label'=>'Community Type','val'=>'Bungalows & Single Detached Homes with 2 & 3-Car Garages'],
          ['label'=>'Model Home Open At','val'=>'132 Ronald Hooper Ave, Bowmanville, L1C 3K2'],
        ];
        foreach ($infos as $i => $inf): ?>
        <div class="<?= $i<2?'border-b md:border-b-0 md:border-r border-white/10 pb-2 md:pb-0 md:pr-4':'' ?>">
          <p class="text-white/50 text-[10px] tracking-[.16em] uppercase mb-1"><?= $inf['label'] ?></p>
          <p class="font-medium text-white/90"><?= htmlspecialchars($inf['val']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- SUB-NAV TABS -->
<div class="sub-nav px-6 lg:px-14 py-3">
  <div class="flex items-center justify-between flex-wrap gap-3">
    <div class="flex items-center gap-1 overflow-x-auto">
      <button class="tab-pill active" onclick="switchTab('overview')">Overview</button>
      <button class="tab-pill" onclick="switchTab('neighborhood')">Neighborhood</button>
      <button class="tab-pill" onclick="switchTab('gallery')">Gallery</button>
      <button class="tab-pill" onclick="switchTab('floorplans')">Floor Plans</button>
    </div>
    <button onclick="openModal()" class="text-xs uppercase tracking-[.14em] font-semibold text-gold hover:text-gold/70 transition-colors">Register Now ↗</button>
  </div>
</div>

<!-- ── TAB: OVERVIEW ── -->
<section id="tab-overview" class="tab-section px-6 lg:px-14 py-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-12 gap-12 items-start">
    <div class="lg:col-span-5">
      <div class="lg:sticky" style="top:120px">
        <span class="text-gold uppercase tracking-[.25em] text-xs font-semibold block mb-2">The Collection</span>
        <h2 class="font-fragment text-3xl md:text-4xl uppercase tracking-[.04em] leading-tight mb-5" style="color:var(--text)">Following the incredible success of Orchard West, Orchard East, and Eden Towns.</h2>
        <div class="h-1 w-16 bg-gold mb-6"></div>
        <p class="text-sm font-light leading-relaxed mb-6" style="color:var(--text-muted)">Each previously released community successfully sold out. Ethereal Estates proudly presents Orchard South, a signature collection of bungalows and expansive single-detached family homes.</p>
        <div class="p-6 rounded-lg" style="background:var(--bg-soft);border:1px solid var(--border)">
          <p class="text-xs uppercase tracking-[.18em] font-semibold mb-3" style="color:var(--text-faint)">Quick Specifications</p>
          <div class="grid grid-cols-2 gap-3 text-xs" style="color:var(--text-muted)">
            <div>Bedrooms: <strong style="color:var(--text)">3–5</strong></div>
            <div>Bathrooms: <strong style="color:var(--text)">3–6</strong></div>
            <div>Sq Footage: <strong style="color:var(--text)">1,400–3,600</strong></div>
            <div>Garages: <strong style="color:var(--text)">2 &amp; 3-Car</strong></div>
          </div>
        </div>
      </div>
    </div>
    <div class="lg:col-span-7 space-y-8">
      <div class="rounded-xl overflow-hidden" style="aspect-ratio:16/10;background:var(--border)">
        <img src="https://placehold.co/1000x625/c8c8c8/888888?text=Orchard+South+Interior" alt="Interior" class="w-full h-full object-cover"/>
      </div>
      <div class="text-sm font-light leading-relaxed space-y-4" style="color:var(--text-muted)">
        <p>Experience the tranquility of Bowmanville's natural surroundings with direct access to parks, golf courses, and conservation reserves. Just minutes from Historic Downtown Bowmanville, you'll enjoy top-rated schools, charming restaurants, and convenient boutique shopping.</p>
        <p>With the Highway 407 extension and rapid transit connections, traveling to the Greater Toronto Area has never been more seamless. Each home is crafted with high-standard architectural finishes, 10-foot ceilings on main levels, and custom-designed chef kitchens.</p>
      </div>
      <div class="grid sm:grid-cols-2 gap-4">
        <div class="spec-card"><h3 class="font-fragment text-lg uppercase tracking-wide mb-2" style="color:var(--text)">Gourmet Kitchens</h3><p class="text-xs font-light leading-relaxed" style="color:var(--text-muted)">Quartz countertops, European soft-close cabinetry, and integrated panel-ready appliance options.</p></div>
        <div class="spec-card"><h3 class="font-fragment text-lg uppercase tracking-wide mb-2" style="color:var(--text)">Primary Ensuites</h3><p class="text-xs font-light leading-relaxed" style="color:var(--text-muted)">Spa-inspired freestanding soaker tubs, frameless glass showers, and heated porcelain flooring.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ── TAB: NEIGHBORHOOD ── -->
<section id="tab-neighborhood" class="tab-section hidden px-6 lg:px-14 py-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <div class="max-w-3xl mb-12">
      <span class="text-gold uppercase tracking-[.25em] text-xs font-semibold block mb-2">Location &amp; Lifestyle</span>
      <h2 class="font-fragment text-3xl md:text-4xl uppercase tracking-[.04em] mb-4" style="color:var(--text)">Historic Bowmanville Charms</h2>
      <p class="text-sm font-light leading-relaxed" style="color:var(--text-muted)">Nestled in the heart of Durham Region, Orchard South offers an exceptional opportunity to live in a scenic, family-friendly community with every modern convenience close at hand.</p>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
      <?php
      $highlights = [
        ['icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z','title'=>'Parks &amp; Trails','desc'=>'Bowmanville Valley Trail, Stephen\'s Gulch, and Lake Ontario beaches.'],
        ['icon'=>'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253','title'=>'Top Schools','desc'=>'Reputable elementary and secondary schools within minutes of the neighborhood.'],
        ['icon'=>'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6','title'=>'Hwy 407 &amp; GO','desc'=>'Rapid connectivity to Downtown Toronto, Markham, and Durham employment hubs.'],
        ['icon'=>'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z','title'=>'Historic Downtown','desc'=>'Artisan bakeries, local markets, family bistros, and annual street festivals.'],
      ];
      foreach ($highlights as $h): ?>
      <div class="feature-card">
        <div class="w-8 h-8 text-gold mb-3"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="<?= $h['icon'] ?>"/></svg></div>
        <h3 class="font-fragment text-base uppercase tracking-wide mb-1" style="color:var(--text)"><?= $h['title'] ?></h3>
        <p class="text-xs font-light" style="color:var(--text-muted)"><?= $h['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="relative rounded-2xl overflow-hidden" style="height:384px;background:var(--border)">
      <img src="https://placehold.co/1400x384/d0d0d0/888888?text=Bowmanville+Map" alt="Map" class="w-full h-full object-cover"/>
      <div class="absolute inset-0 flex items-center justify-center" style="background:rgba(0,0,0,.35)">
        <div class="p-6 rounded-xl max-w-md shadow-2xl text-center" style="background:rgba(255,255,255,.95)">
          <p class="text-[10px] tracking-[.2em] uppercase font-bold text-gold mb-1">Sales Centre &amp; Model Home</p>
          <h3 class="font-fragment text-xl text-gray-900 mb-2">132 Ronald Hooper Avenue</h3>
          <p class="text-xs text-gray-600 mb-4">Bowmanville, ON L1C 3K2 — Open Daily by Appointment</p>
          <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-block bg-[#0f2e1a] text-white text-[11px] uppercase tracking-[.14em] px-5 py-2.5 transition hover:opacity-80">Get Driving Directions ↗</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TAB: GALLERY ── -->
<section id="tab-gallery" class="tab-section hidden px-6 lg:px-14 py-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <span class="text-gold uppercase tracking-[.25em] text-xs font-semibold block mb-2">Visual Showcase</span>
    <h2 class="font-fragment text-3xl md:text-4xl uppercase tracking-[.04em] mb-10" style="color:var(--text)">Architecture &amp; Interior Gallery</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php for ($i=1;$i<=6;$i++): ?>
      <div class="rounded-xl overflow-hidden cursor-pointer" style="aspect-ratio:4/3;background:var(--border)">
        <img src="https://placehold.co/900x675/<?= $i%2?'c0c0c0':'c8c8c8' ?>/<?= $i%2?'777':'888' ?>777?text=Gallery+<?= $i ?>" alt="Gallery <?= $i ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"/>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ── TAB: FLOOR PLANS ── -->
<section id="tab-floorplans" class="tab-section hidden px-6 lg:px-14 py-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <span class="text-gold uppercase tracking-[.25em] text-xs font-semibold block mb-2">Bespoke Layouts</span>
    <h2 class="font-fragment text-3xl md:text-4xl uppercase tracking-[.04em] mb-3" style="color:var(--text)">Lot Collections &amp; Floor Plans</h2>
    <p class="text-sm font-light mb-10" style="color:var(--text-muted)">Explore our 33', 38', and 45' lot collections with multiple elevation choices.</p>
    <div class="grid md:grid-cols-3 gap-8">
      <?php
      $plans = [
        ['lot'=>"33' Collection",'elev'=>'A / B','name'=>'The Willow',   'beds'=>4,'baths'=>'3.5','sqft'=>'2,240'],
        ['lot'=>"38' Collection",'elev'=>'A / B / C','name'=>'The Highfield','beds'=>5,'baths'=>'4.5','sqft'=>'2,960'],
        ['lot'=>"45' Collection",'elev'=>'A / B','name'=>'The Estate',   'beds'=>5,'baths'=>'5','sqft'=>'3,600'],
      ];
      foreach ($plans as $p): ?>
      <div class="floor-card">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-bold uppercase tracking-[.18em] text-gold"><?= $p['lot'] ?></span>
          <span class="text-[11px]" style="color:var(--text-faint)">Elevation <?= $p['elev'] ?></span>
        </div>
        <h3 class="font-fragment text-2xl uppercase tracking-wide mb-2" style="color:var(--text)"><?= $p['name'] ?></h3>
        <p class="text-xs font-light mb-4" style="color:var(--text-muted)">Single detached residence with expansive open-concept great room and premium finishes throughout.</p>
        <div class="rounded-lg mb-4 flex items-center justify-center p-4" style="aspect-ratio:4/3;background:var(--bg-soft);border:1px dashed var(--border)">
          <div class="text-center">
            <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:var(--text-faint)"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="text-xs font-medium" style="color:var(--text-faint)">Floor Plan Schematic</p>
          </div>
        </div>
        <div class="flex items-center justify-between text-xs border-t pt-4 mb-4" style="color:var(--text-muted);border-color:var(--border)">
          <span><?= $p['beds'] ?> Beds</span><span>&bull;</span><span><?= $p['baths'] ?> Baths</span><span>&bull;</span><span><?= $p['sqft'] ?> Sq.Ft</span>
        </div>
        <button onclick="openModal()" class="w-full bg-[#0f2e1a] text-white text-xs uppercase tracking-[.14em] py-3 rounded hover:bg-[#0f2e1a]/80 transition-colors">Request Floor Plan ↗</button>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- REGISTER MODAL -->
<div id="register-modal" class="fixed inset-0 z-[200] flex items-center justify-center p-4">
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal()"></div>
  <div class="relative w-full max-w-lg rounded-2xl p-8 shadow-2xl z-10" style="background:var(--bg-card)">
    <button onclick="closeModal()" class="absolute top-4 right-4 hover:text-gold transition-colors" style="color:var(--text-faint)">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <h3 class="font-fragment text-2xl uppercase tracking-[.06em] mb-1" style="color:var(--text)">Register Your Interest</h3>
    <p class="text-xs font-light mb-6" style="color:var(--text-muted)">Be first to receive floor plans, pricing, and VIP access for Orchard South.</p>
    <form onsubmit="event.preventDefault();closeModal();alert('Thank you! A member of our team will be in touch shortly.')" class="space-y-4">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-[10px] uppercase tracking-[.16em] font-medium mb-1" style="color:var(--text-faint)">First Name*</label>
          <input type="text" required class="w-full px-4 py-3 text-sm rounded-lg" style="border:1px solid var(--border);background:var(--bg-soft);color:var(--text);outline:none" onfocus="this.style.borderColor='#d5a94e'" onblur="this.style.borderColor='var(--border)'"/>
        </div>
        <div>
          <label class="block text-[10px] uppercase tracking-[.16em] font-medium mb-1" style="color:var(--text-faint)">Last Name*</label>
          <input type="text" required class="w-full px-4 py-3 text-sm rounded-lg" style="border:1px solid var(--border);background:var(--bg-soft);color:var(--text);outline:none" onfocus="this.style.borderColor='#d5a94e'" onblur="this.style.borderColor='var(--border)'"/>
        </div>
      </div>
      <div>
        <label class="block text-[10px] uppercase tracking-[.16em] font-medium mb-1" style="color:var(--text-faint)">Email Address*</label>
        <input type="email" required class="w-full px-4 py-3 text-sm rounded-lg" style="border:1px solid var(--border);background:var(--bg-soft);color:var(--text);outline:none" onfocus="this.style.borderColor='#d5a94e'" onblur="this.style.borderColor='var(--border)'"/>
      </div>
      <div>
        <label class="block text-[10px] uppercase tracking-[.16em] font-medium mb-1" style="color:var(--text-faint)">Phone Number</label>
        <input type="tel" class="w-full px-4 py-3 text-sm rounded-lg" style="border:1px solid var(--border);background:var(--bg-soft);color:var(--text);outline:none" onfocus="this.style.borderColor='#d5a94e'" onblur="this.style.borderColor='var(--border)'"/>
      </div>
      <button type="submit" class="w-full bg-gold hover:bg-[#e3b961] text-white font-semibold text-xs uppercase tracking-[.18em] py-4 rounded-lg transition-colors">Submit Registration ↗</button>
    </form>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
<script>
function switchTab(id){
  document.querySelectorAll('.tab-section').forEach(s=>s.classList.add('hidden'));
  document.querySelectorAll('.tab-pill').forEach(b=>b.classList.remove('active'));
  document.getElementById('tab-'+id).classList.remove('hidden');
  event.currentTarget.classList.add('active');
}
function openModal(){document.getElementById('register-modal').classList.add('open')}
function closeModal(){document.getElementById('register-modal').classList.remove('open')}
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeModal()});
</script>
</body>
</html>
