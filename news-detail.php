<?php
$pageTitle  = 'Innovative Cleaning Technologies to Watch in 2024 — Ethereal Estates';
$pageDesc   = 'Market insights and real estate news from Ethereal Estates.';
$activePage = '';
require 'includes/head.php';
?>
<style>
  .article-body p{font-size:14px;font-weight:300;line-height:1.8;color:var(--text-muted);margin-bottom:16px}
  .article-body h2{font-family:"PP Fragment Serif Regular",Georgia,serif;font-size:1.6rem;text-transform:uppercase;letter-spacing:.03em;color:var(--text);margin:32px 0 12px}
  .article-body h3{font-family:"Urbanist",sans-serif;font-size:14px;font-weight:600;color:#d5a94e;letter-spacing:.08em;margin:24px 0 8px;display:flex;align-items:center;gap:8px}
  .article-body h3::before{content:"»";color:#d5a94e;font-size:16px}
  .toc-item{display:flex;align-items:flex-start;gap:8px;padding:8px 0;border-bottom:1px solid var(--border-soft);font-size:12px;color:var(--text-muted);cursor:pointer;transition:color .2s;text-decoration:none}
  .toc-item:last-child{border-bottom:none}
  .toc-item:hover{color:#d5a94e}
  .toc-item.active{color:#d5a94e;font-weight:600}
  .toc-item::before{content:"»";color:#d5a94e;font-size:13px;flex-shrink:0;margin-top:1px}
  .search-input{width:100%;border:1px solid var(--border);border-radius:4px;padding:10px 14px;font-size:12px;font-family:"Urbanist",sans-serif;color:var(--text);background:var(--bg-card);outline:none;transition:border-color .2s}
  .search-input:focus{border-color:#d5a94e}
  .post-nav{border-top:1px solid var(--border);padding-top:20px;display:grid;grid-template-columns:1fr 1fr;gap:20px}
  .post-nav a{font-size:12px;color:var(--text-muted);text-decoration:none;transition:color .2s}
  .post-nav a:hover{color:#d5a94e}
  .post-nav a span{display:block;font-size:10px;text-transform:uppercase;letter-spacing:.14em;color:var(--text-faint);margin-bottom:4px}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- ARTICLE HEADER -->
<div class="px-6 lg:px-14 pt-8 pb-6" style="border-bottom:1px solid var(--border)">
  <a href="news.php" class="inline-flex items-center gap-1.5 text-[11px] tracking-[.14em] uppercase font-medium hover:text-gold transition-colors mb-5" style="color:var(--text-faint)">
    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M5 12l7-7M5 12l7 7"/></svg>Back
  </a>
  <h1 class="font-fragment text-[1.8rem] sm:text-[2.2rem] lg:text-[2.7rem] uppercase tracking-[.04em] leading-tight max-w-3xl" style="color:var(--text)">
    Innovative Cleaning Technologies to Watch in 2024
  </h1>
</div>

<!-- HERO IMAGE -->
<div class="px-6 lg:px-14 py-6">
  <div class="rounded-2xl overflow-hidden w-full" style="aspect-ratio:21/8">
    <img src="assets/images/news-hero.jpg" onerror="this.src='https://placehold.co/1200x457/c8c8c8/888888?text=Article+Hero'" alt="Article Hero" class="w-full h-full object-cover"/>
  </div>
</div>

<!-- MAIN: ARTICLE + SIDEBAR -->
<section class="px-6 lg:px-14 pb-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-[1fr_280px] gap-14">
    <div class="article-body">
      <p>Meticulously Cleaning is the company you should contact. One of the best cleaning teams in the city, offering affordable professional cleaning services to both homeowners and businesses.</p>
      <p>When it comes to your business premises, cleanliness and hygiene are important for several reasons. As well as wanting to provide the most comfortable and safe environment for you and your staff, if you are a client-facing business, you will want to ensure the place is cleaned to a high standard.</p>
      <h2>Etherealestate.com, seamlessly find your new home</h2>
      <p>We're on a mission to make life effortless. Based in Canada and powered by passion, we bring a fresh sparkle to homes, offices, and everything in between.</p>
      <h3>Tailor your search</h3>
      <p>Robotic vacuums and mops have evolved significantly, now offering advanced navigation, machine learning capabilities, and improved cleaning performance.</p>
      <h3>Let our model homes convince you</h3>
      <p>Artificial intelligence is enabling smarter cleaning equipment that can adapt to different surfaces, optimize energy use, and detect areas requiring extra attention.</p>
      <h3>Fall in love with your new neighbourhood</h3>
      <p>This innovative technology uses electricity to convert water and salt into a powerful yet eco-friendly cleaning solution.</p>
      <h2>Discover Our Featured Communities</h2>
      <p>Our expertise lies in crafting captivating and engrossing multiplayer environments. Our team of professionals is committed to developing excellent, personalized solutions that meet your demands.</p>
      <div class="grid grid-cols-2 gap-4 my-6">
        <div class="rounded-xl overflow-hidden" style="aspect-ratio:4/3">
          <img src="https://placehold.co/400x300/c0c0c0/777777?text=Community+1" alt="Community 1" class="w-full h-full object-cover"/>
        </div>
        <div class="rounded-xl overflow-hidden" style="aspect-ratio:4/3">
          <img src="https://placehold.co/400x300/b8b8b8/666666?text=Community+2" alt="Community 2" class="w-full h-full object-cover"/>
        </div>
      </div>
      <?php
      $communities = [
        ['name'=>'Eversley Estates, King City – 42\' &amp; 62\' Estate Homes','desc'=>'Robotic vacuums and mops have evolved significantly, now offering advanced navigation and machine learning capabilities.'],
        ['name'=>'Bayview Trail, Aurora – 36\', 40\' &amp; 60\' Luxury Detached','desc'=>'Artificial intelligence is enabling smarter cleaning equipment that can adapt to different surfaces.'],
        ['name'=>'Meadowlark Enclave, Bolton – 36\' &amp; 40\' Grand Detached','desc'=>'This innovative technology uses electricity to convert water and salt into a powerful eco-friendly cleaning solution.'],
      ];
      foreach ($communities as $c): ?>
      <div class="flex items-start gap-3 mb-4">
        <span class="text-gold font-bold mt-0.5 flex-shrink-0">✓</span>
        <div>
          <p class="font-semibold text-sm mb-1" style="color:var(--text)"><?= $c['name'] ?></p>
          <p class="text-xs font-light leading-relaxed" style="color:var(--text-muted)"><?= $c['desc'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
      <div class="post-nav mt-10">
        <a href="news-detail.php"><span>← Previous Post</span>Discover Ethereal Estates's New Release at Palmetto</a>
        <a href="news-detail.php" class="text-right"><span>Next Post →</span>Your Georgina Weekend Guide: 8 Things to Do</a>
      </div>
    </div>
    <!-- SIDEBAR -->
    <div class="space-y-8">
      <div class="rounded-xl p-6" style="background:var(--bg-soft);border:1px solid var(--border)">
        <h4 class="font-fragment text-sm uppercase tracking-[.14em] mb-4" style="color:var(--text)">Table of Content</h4>
        <?php
        $toc = ['1st Tip: Heading of 1st tip here','2nd Tip: Heading of 2nd tip here','3rd Tip: Heading of 3rd tip here','4th Tip: Heading of 4th tip here','5th Tip: Heading of 5th tip here','6th Tip: Heading of 6th tip here','7th Tip: Heading of 7th tip here'];
        foreach ($toc as $i => $item): ?>
        <a href="#" class="toc-item<?= $i===0?' active':'' ?>"><?= $item ?></a>
        <?php endforeach; ?>
      </div>
      <div>
        <h4 class="font-fragment text-sm uppercase tracking-[.14em] mb-4 text-center" style="color:var(--text)">Search</h4>
        <div class="relative">
          <input type="text" placeholder="Search by keywords..." class="search-input pr-10"/>
          <button class="absolute right-3 top-1/2 -translate-y-1/2 hover:text-gold transition-colors" style="color:var(--text-faint)">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
</body>
</html>
