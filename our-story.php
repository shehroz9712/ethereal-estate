<?php
$pageTitle  = 'Our Story — Ethereal Estates';
$pageDesc   = 'The story behind Ethereal Estates — a history of excellence in Ontario homebuilding.';
$activePage = 'about';
require 'includes/head.php';
?>
<style>
  .hero-wrap{position:relative;width:100%;border-radius:16px;overflow:hidden;height:400px}
  .hero-wrap img{width:100%;height:100%;object-fit:cover;display:block}
  .hero-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.35),rgba(0,0,0,.65));display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px}
  .big-stat{font-family:"PP Fragment Serif Regular",Georgia,serif;font-size:4rem;line-height:1;color:var(--text)}
  .big-year{font-family:"PP Fragment Serif Regular",Georgia,serif;font-size:5rem;line-height:1;color:var(--text);letter-spacing:.02em}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- HERO -->
<div class="px-4 lg:px-14 pt-4">
  <div class="hero-wrap">
    <img src="assets/images/about-hero.jpg" onerror="this.src='https://placehold.co/1400x400/b8b8b8/777777?text=Our+Story'" alt="Our Story"/>
    <div class="hero-overlay">
      <span class="block w-10 h-px bg-gold mb-4"></span>
      <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-5xl uppercase tracking-[.06em] leading-tight mb-3">About Ethereal Estates</h1>
      <p class="text-white/80 text-sm font-light max-w-lg leading-relaxed">Ethereal Estates is a leading high quality homes firm, committed to thoughtful craftsmanship.</p>
    </div>
  </div>
</div>

<!-- OUR COMPANY INTRO -->
<section class="px-6 lg:px-14 py-16 lg:py-20" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-14 items-start">
    <div>
      <p class="text-[11px] tracking-[.28em] uppercase font-semibold mb-4" style="color:var(--text-faint)">(The Company)</p>
      <div class="rounded-2xl overflow-hidden" style="aspect-ratio:4/3">
        <img src="assets/images/about-interior.jpg" onerror="this.src='https://placehold.co/640x480/c8c8c8/888888?text=Company+Photo'" alt="Company" class="w-full h-full object-cover"/>
      </div>
    </div>
    <div>
      <h2 class="font-fragment text-[1.4rem] uppercase tracking-[.1em] mb-4" style="color:var(--text)">Our Company</h2>
      <p class="text-sm font-light leading-relaxed mb-6" style="color:var(--text-muted)">Ethereal Estates is a leading high-quality homes firm, committed to building high quality homes using premium materials and superior craftsmanship. Each home is thoughtfully designed to offer exceptional value, lasting quality, and a location that supports everyday convenience.</p>
      <div class="mt-8">
        <p class="text-[10px] tracking-[.22em] uppercase font-semibold mb-2" style="color:var(--text-faint)">Founded in</p>
        <p class="big-year">2003</p>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="px-6 lg:px-14 pb-16" style="border-top:1px solid var(--border);padding-top:48px;background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <h2 class="font-fragment text-[1.8rem] sm:text-[2.2rem] lg:text-[2.6rem] uppercase tracking-[.04em] text-center mb-10" style="color:var(--text)">A History of Excellence in Homebuilding</h2>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-0" style="border-top:1px solid var(--border)">
      <?php
      $stats = [
        ['num'=>'100%','sub'=>'green quality','desc'=>'for livability & wellness'],
        ['num'=>'55',  'sub'=>'award winning','desc'=>'for content & elegance'],
        ['num'=>'15,000','sub'=>'green spaces','desc'=>'for livability & wellness'],
        ['num'=>'236+','sub'=>'Ontario locations','desc'=>'across the province'],
      ];
      foreach ($stats as $i => $s): ?>
      <div class="py-10 <?= $i<3?'border-r':''; ?>" style="border-color:var(--border);padding-<?= $i===0?'right':'left-right' ?>:2rem">
        <p class="big-stat"><?= $s['num'] ?></p>
        <p class="text-[10px] uppercase tracking-[.18em] font-semibold mt-2" style="color:var(--text-faint)"><?= $s['sub'] ?></p>
        <p class="text-[10px] font-light mt-1" style="color:var(--text-faint)"><?= $s['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- GENIUS BANNER -->
<section class="px-6 lg:px-14 pb-16" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <div class="relative rounded-2xl overflow-hidden" style="height:260px">
      <img src="https://placehold.co/1200x260/1a2e1e/555555?text=Genius+Banner" alt="Genius" class="absolute inset-0 w-full h-full object-cover"/>
      <div class="absolute inset-0" style="background:linear-gradient(to right,rgba(10,20,13,.9) 38%,rgba(10,20,13,.2))"></div>
      <div class="relative z-10 h-full flex items-center px-10 lg:px-14 justify-between gap-8">
        <p class="font-fragment text-white text-2xl lg:text-3xl italic">Genius.</p>
        <div class="text-right max-w-xs">
          <h3 class="font-fragment text-white text-xl lg:text-2xl uppercase leading-tight tracking-wide mb-2">Discover the Genius of a Ethereal Estates</h3>
          <p class="text-white/65 text-xs font-light mb-4">When it comes to "Standard Features" Ethereal Estates is raising the bar.</p>
          <a href="genius.php" class="inline-flex items-center gap-2 bg-gold hover:bg-[#e3b961] text-white text-[10px] uppercase tracking-[.16em] font-semibold px-5 py-2.5 transition-colors">Take the Genius Tour ↗</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHAT MAKES US DIFFERENT -->
<section class="px-6 lg:px-14 pb-16 lg:pb-20" style="border-top:1px solid var(--border);padding-top:56px;background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <h2 class="font-fragment text-[1.8rem] sm:text-[2.2rem] lg:text-[2.6rem] uppercase tracking-[.06em] text-center mb-12" style="color:var(--text)">What Makes Us Different?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
      <?php
      $diff = [
        ['title'=>'Design Sets Ethereal Estates Apart','desc'=>'Each Ethereal Estates is remarkable by referencing design principles that are at home again. Each Ethereal Estates is constantly recognizable by its unparalleled architectural character.'],
        ['title'=>'In House Sales','desc'=>'This means the transition to a full-time and professional life and built-in sales. In a transaction, company confirms and designs to make homes that fully fits the demanding environment.'],
        ['title'=>'Great Value','desc'=>'Ethereal Estates homes include features standard that set them apart from similar homes. These standard features are designed to create value in your home for a lifetime.'],
        ['title'=>'Award-Winning Builder','desc'=>'We have earned our award-winning reputation with every build through land, unit, and lifestyle. Whether achieving the highest levels of industry achievement, we can provide you with the home of your dreams.'],
      ];
      foreach ($diff as $i => $d): ?>
      <div>
        <div class="rounded-xl overflow-hidden mb-4" style="aspect-ratio:4/3">
          <img src="https://placehold.co/560x420/c<?= $i%2?'0':'8' ?>c<?= $i%2?'0':'8' ?>c<?= $i%2?'0':'8' ?>/<?= $i%2?'777':'888' ?>888?text=<?= urlencode($d['title']) ?>" alt="<?= htmlspecialchars($d['title']) ?>" class="w-full h-full object-cover"/>
        </div>
        <h3 class="font-fragment text-lg uppercase mb-2" style="color:var(--text)"><?= $d['title'] ?></h3>
        <p class="text-xs font-light leading-relaxed" style="color:var(--text-muted)"><?= $d['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CONQUERING CANCER -->
<section class="px-6 lg:px-14 py-14 lg:py-16" style="background:#1a2e1e">
  <div class="max-w-3xl mx-auto text-center">
    <h2 class="font-fragment text-white text-[1.8rem] sm:text-[2.2rem] lg:text-[2.6rem] uppercase tracking-[.04em] mb-6">Conquering Cancer Since 2008</h2>
    <p class="text-white/70 text-sm font-light leading-relaxed mb-8">Every Year, The Walk to Conquer Cancer has raised over $68 million to help your effort. When you walk with Team Ethereal Estates, every step you take puts the fight against cancer even further.</p>
    <a href="contact.php" class="inline-flex items-center gap-2 border border-gold text-gold hover:bg-gold hover:text-white text-[11px] uppercase tracking-[.18em] font-semibold px-7 py-3.5 transition-all">Become a Sponsor / Participant ↗</a>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
</body>
</html>
