<?php
$pageTitle  = 'Genius — Ethereal Estates';
$pageDesc   = 'Discover the Genius of an Ethereal Estates home. Smart, connected, beautifully designed.';
$activePage = '';
require 'includes/head.php';
?>
<style>
  .hero-wrap{position:relative;width:100%;border-radius:16px;overflow:hidden;height:380px}
  .hero-wrap img{width:100%;height:100%;object-fit:cover;display:block}
  .hero-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.3),rgba(0,0,0,.65));display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px}
  .video-cell{position:relative;overflow:hidden;cursor:pointer;background:#111;border-radius:10px}
  .video-cell img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .5s cubic-bezier(.2,.8,.2,1);opacity:.85}
  .video-cell:hover img{transform:scale(1.05);opacity:1}
  .play-btn{position:absolute;inset:0;display:flex;align-items:center;justify-content:center}
  .play-btn span{width:44px;height:44px;border-radius:50%;background:rgba(213,169,78,.85);display:flex;align-items:center;justify-content:center;transition:transform .2s,background .2s}
  .video-cell:hover .play-btn span{transform:scale(1.15);background:#d5a94e}
  .brand-logo{height:32px;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--text-muted)}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- HERO -->
<div class="px-4 lg:px-14 pt-4">
  <div class="hero-wrap">
    <img src="https://placehold.co/1400x380/b0b0b0/777777?text=Genius+Hero" onerror="this.src='https://placehold.co/1400x380/b0b0b0/777777?text=Genius+Hero'" alt="Genius"/>
    <div class="hero-overlay">
      <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-5xl uppercase tracking-[.06em] leading-tight mb-3">Make Yourself at Home</h1>
      <p class="text-white/80 text-sm font-light max-w-lg leading-relaxed">Ethereal Estates is committed to building high-quality homes using premium materials and superior craftsmanship.</p>
    </div>
  </div>
</div>

<!-- INTRO: LEFT TEXT + RIGHT 3 PORTRAITS -->
<section class="px-6 lg:px-14 py-16 lg:py-20" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-[1fr_460px] gap-12 items-start">
    <div>
      <h2 class="font-fragment text-[2rem] sm:text-[2.4rem] lg:text-[2.8rem] uppercase leading-[1.1] tracking-[.03em] mb-6" style="color:var(--text)">Doorbell / Countertops / Fireplace / Temperature / Tour the Model Home</h2>
      <p class="text-sm font-light leading-relaxed" style="color:var(--text-muted)">Ethereal Estates is committed to building high-quality homes using premium materials and superior craftsmanship. Each home is thoughtfully designed to offer exceptional value, lasting quality, and a location that supports everyday convenience.</p>
    </div>
    <div class="grid grid-cols-3 gap-3">
      <?php foreach ([1,2,3] as $n): ?>
      <div class="rounded-xl overflow-hidden" style="aspect-ratio:3/4">
        <img src="https://placehold.co/200x267/c<?= $n==2?'0':'8' ?>c<?= $n==2?'0':'8' ?>c<?= $n==2?'0':'8' ?>/<?= $n==3?'666':'888' ?>888?text=Feature+<?= $n ?>" alt="Feature <?= $n ?>" class="w-full h-full object-cover"/>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- LEGACY VIDEOS -->
<section class="px-6 lg:px-14 pb-16 lg:pb-20" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <h2 class="font-fragment text-center text-[1.6rem] sm:text-[1.9rem] lg:text-[2.2rem] uppercase tracking-[.1em] mb-8" style="color:var(--text)">Legacy Videos</h2>
    <div class="grid gap-1" style="grid-template-columns:repeat(3,1fr)">
      <?php
      $vids = ['Legacy Video 1','Legacy Video 2','Legacy Video 3','Legacy Video 4','Legacy Video 5','Make the Switch'];
      foreach ($vids as $i => $v):
        $col = ($i%3)+1; $row = floor($i/3)+1;
      ?>
      <div class="video-cell" style="grid-column:<?= $col ?>;grid-row:<?= $row ?>;aspect-ratio:4/3">
        <img src="https://placehold.co/480x360/<?= $i%2?'c0c0c0':'c8c8c8' ?>/<?= $i%2?'777':'888' ?>777?text=<?= urlencode($v) ?>" alt="<?= htmlspecialchars($v) ?>"/>
        <div class="play-btn"><span><svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></span></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- THIS ISN'T JUST ABOUT REAL ESTATE -->
<section class="px-6 lg:px-14 py-14" style="background:var(--bg);border-top:1px solid var(--border)">
  <div class="max-w-7xl mx-auto">
    <h2 class="font-fragment text-center text-[1.5rem] sm:text-[1.8rem] lg:text-[2rem] uppercase tracking-[.1em] mb-8" style="color:var(--text)">This Isn't Just About Real Estate.</h2>
    <div class="flex justify-center mb-8">
      <div class="rounded-2xl overflow-hidden w-full max-w-2xl" style="aspect-ratio:21/6">
        <img src="https://placehold.co/840x240/c8c8c8/888888?text=Movement+Arrows" alt="Movement" class="w-full h-full object-cover"/>
      </div>
    </div>
    <div class="max-w-xl">
      <p class="text-base font-normal mb-2" style="color:var(--text)">When it comes to "standard features" Ethereal Estates is raising the bar. No matter the size of the home, every new Ethereal Estates home in every GENIUS featured community is now a GENIUS home.</p>
    </div>
  </div>
</section>

<!-- 3-COLUMN FEATURES -->
<section class="px-6 lg:px-14 py-14 lg:py-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-6">
    <?php foreach (['Connection','Couture','Conversation'] as $i => $f): ?>
    <div>
      <div class="rounded-xl overflow-hidden mb-3" style="aspect-ratio:4/3">
        <img src="https://placehold.co/440x330/c<?= $i==1?'0':'8' ?>c<?= $i==1?'0':'8' ?>c<?= $i==1?'0':'8' ?>/<?= $i==2?'666':'888' ?>888?text=<?= urlencode($f) ?>" alt="<?= $f ?>" class="w-full h-full object-cover"/>
      </div>
      <p class="text-[10px] tracking-[.24em] uppercase font-semibold text-center" style="color:var(--text-faint)"><?= $f ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- GENIUS DARK BANNER -->
<section class="px-6 lg:px-14 pb-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <div class="relative rounded-2xl overflow-hidden" style="height:260px">
      <img src="https://placehold.co/1200x260/1a2e1e/555555?text=Genius+Banner" alt="Genius Banner" class="absolute inset-0 w-full h-full object-cover"/>
      <div class="absolute inset-0" style="background:linear-gradient(to right,rgba(10,20,13,.9) 38%,rgba(10,20,13,.2))"></div>
      <div class="relative z-10 h-full flex items-center px-10 lg:px-14 justify-between gap-8">
        <p class="font-fragment text-white text-2xl lg:text-3xl italic">Genius.</p>
        <div class="text-right max-w-xs">
          <h3 class="font-fragment text-white text-xl lg:text-2xl uppercase leading-tight tracking-wide mb-2">Discover the Genius of a Ethereal Estates Home</h3>
          <p class="text-white/65 text-xs font-light mb-4">When it comes to "Standard Features" Ethereal Estates is raising the bar.</p>
          <a href="#" class="inline-flex items-center gap-2 bg-gold hover:bg-[#e3b961] text-white text-[10px] uppercase tracking-[.16em] font-semibold px-5 py-2.5 transition-colors">Take the Genius Tour ↗</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED BRANDS -->
<section class="px-6 lg:px-14 pb-16" style="border-top:1px solid var(--border);padding-top:48px;background:var(--bg)">
  <div class="max-w-5xl mx-auto">
    <p class="text-center text-[11px] tracking-[.22em] uppercase font-semibold mb-8" style="color:var(--text-faint)">Featured GENIUS™ home brands:</p>
    <div class="flex flex-wrap items-center justify-center gap-10 lg:gap-16 mb-6">
      <div class="brand-logo">QUARTZ</div>
      <div class="brand-logo" style="color:#4285f4">Google</div>
      <div class="brand-logo">Aprilaire</div>
      <div class="brand-logo">SHERWIN<br/><span style="font-size:10px;font-weight:400">WILLIAMS.</span></div>
    </div>
    <div class="flex flex-wrap items-center justify-center gap-10 lg:gap-16">
      <div class="brand-logo" style="color:#00a1de">nest</div>
      <div class="brand-logo" style="color:#d40000">ROGERS</div>
      <div class="brand-logo">LiftMaster</div>
      <div class="brand-logo" style="color:#d5a94e">myQ</div>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
</body>
</html>
