<?php
$pageTitle  = 'About Us — Ethereal Estates';
$pageDesc   = 'Ethereal Estates — We see beyond the property to the decision that shapes what comes next.';
$activePage = 'about';
require 'includes/head.php';
?>
<style>
  .hero-banner{position:relative;width:100%;height:420px;overflow:hidden;border-radius:16px}
  .hero-banner img{width:100%;height:100%;object-fit:cover;display:block}
  .hero-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.42),rgba(0,0,0,.55));display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px}
  .team-card{background:var(--bg-card);border-radius:12px;overflow:hidden}
  .team-card img{width:100%;aspect-ratio:3/4;object-fit:cover;display:block}
  .nl-input{width:100%;background:transparent;border-bottom:1px solid rgba(255,255,255,.25);padding:10px 0;font-size:13px;color:#fff;outline:none;font-family:"Urbanist",sans-serif;transition:border-color .2s}
  .nl-input::placeholder{color:rgba(255,255,255,.35)}
  .nl-input:focus{border-color:#d5a94e}
</style>

<?php $activePage='about'; require 'includes/navbar.php'; ?>

<!-- HERO BANNER -->
<div class="px-4 lg:px-14 pt-4">
  <div class="hero-banner">
    <img src="assets/images/about-hero.jpg" onerror="this.src='https://placehold.co/1400x420/c8c8c8/888888?text=About+Hero'" alt="About Ethereal Estates" />
    <div class="hero-overlay">
      <span class="block w-10 h-px bg-gold mb-4"></span>
      <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-5xl uppercase tracking-[.06em] leading-tight">About Ethereal Estates</h1>
      <p class="text-white/80 text-sm font-light mt-3 max-w-lg leading-relaxed tracking-wide">
        Ethereal Estates is a modern real estate firm that serves premium clients with confidence. Ranked as one of Ontario's most innovative companies.
      </p>
    </div>
  </div>
</div>

<!-- SECTION 1: STORY — 3 COLUMN -->
<section class="px-6 lg:px-14 py-16 lg:py-20">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[220px_1fr_1fr] gap-8 lg:gap-10 items-start">
    <div class="lg:pt-2">
      <p class="text-[11px] tracking-[.28em] uppercase text-gold font-semibold mb-8">(About)</p>
      <h2 class="font-fragment text-[2.2rem] sm:text-[2.5rem] lg:text-[2.7rem] uppercase leading-[1.08] tracking-[.02em]" style="color:var(--text)">
        Ontario's<br/>Finest<br/>Addresses,<br/>Thoughtfully<br/>Connected
      </h2>
    </div>
    <div class="rounded-xl overflow-hidden w-full" style="aspect-ratio:3/4">
      <img src="assets/images/about-interior.jpg" onerror="this.src='https://placehold.co/480x640/c8c8c8/888888?text=Interior+Photo'" alt="About Interior" class="w-full h-full object-cover"/>
    </div>
    <div class="lg:pt-2 relative">
      <p class="text-sm font-light leading-relaxed mb-5" style="color:var(--text-muted)">
        Founded in 2024, Ethereal Estates is a modern real estate firm dedicated to helping buyers, sellers, and investors navigate Ontario's dynamic property market with confidence. Backed by over a decade of combined industry experience and more than $70M in transaction value, we combine market expertise, strategic insight, and personalized service to deliver exceptional outcomes at every stage of the real estate journey.
      </p>
      <p class="text-sm font-light leading-relaxed mb-8" style="color:var(--text-muted)">
        Whether you're purchasing your first home, expanding your investment portfolio, or seeking the right opportunity in a competitive market, Ethereal Estates is committed to creating lasting value through every transaction.
      </p>
      <a href="pre-construction.php" class="inline-flex items-center gap-2 bg-gold hover:bg-[#e3b961] text-white text-[11px] uppercase tracking-[.18em] font-semibold px-7 py-3.5 transition-colors">
        More About Us ↗
      </a>
      <div class="absolute bottom-0 right-0 opacity-[0.06] pointer-events-none select-none" style="width:160px">
        <svg viewBox="0 0 160 120" fill="none"><path d="M80 10L10 55V115H60V80H100V115H150V55L80 10Z" stroke="currentColor" stroke-width="2"/><rect x="65" y="55" width="30" height="25" stroke="currentColor" stroke-width="1.5"/></svg>
      </div>
    </div>
  </div>
</section>

<!-- STATS BAND -->
<section class="relative px-6 lg:px-14 py-16 lg:py-24 overflow-hidden" style="background:var(--bg)">
  <div class="absolute inset-0 pointer-events-none select-none flex items-center justify-end" aria-hidden="true">
    <svg viewBox="0 0 700 520" fill="none" class="w-[55%] max-w-[600px] opacity-[0.055]">
      <rect x="80" y="120" width="540" height="360" stroke="#111" stroke-width="2.5"/>
      <path d="M60 120 L350 20 L640 120" stroke="#111" stroke-width="2.5"/>
      <rect x="20" y="200" width="100" height="280" stroke="#111" stroke-width="2"/>
      <rect x="580" y="200" width="100" height="280" stroke="#111" stroke-width="2"/>
      <rect x="300" y="360" width="100" height="120" stroke="#111" stroke-width="2"/>
      <rect x="130" y="180" width="80" height="65" stroke="#111" stroke-width="1.5"/>
      <rect x="490" y="180" width="80" height="65" stroke="#111" stroke-width="1.5"/>
      <rect x="130" y="290" width="80" height="65" stroke="#111" stroke-width="1.5"/>
      <rect x="490" y="290" width="80" height="65" stroke="#111" stroke-width="1.5"/>
      <rect x="260" y="190" width="180" height="120" stroke="#111" stroke-width="1.5"/>
    </svg>
  </div>
  <div class="relative max-w-7xl mx-auto">
    <div class="grid grid-cols-3 mb-2">
      <div></div>
      <div class="py-6">
        <p class="font-fragment text-[4.5rem] lg:text-[5.5rem] leading-none text-[#1a2e1e]">$70M+</p>
        <p class="text-[11px] tracking-[.14em] text-gold font-semibold mt-2 uppercase">Transaction Value</p>
        <p class="text-[11px] font-light mt-0.5" style="color:var(--text-faint)">in residential and investment real estate</p>
      </div>
      <div class="py-6">
        <p class="font-fragment text-[4.5rem] lg:text-[5.5rem] leading-none text-[#1a2e1e]">75</p>
        <p class="text-[11px] tracking-[.14em] text-gold font-semibold mt-2 uppercase">Sales Closed</p>
        <p class="text-[11px] font-light mt-0.5" style="color:var(--text-faint)">helping clients achieve their property goals</p>
      </div>
    </div>
    <div class="grid grid-cols-3 mb-2">
      <div class="py-6">
        <p class="font-fragment text-[5rem] lg:text-[6.5rem] leading-none text-[#1a2e1e]">133+</p>
        <p class="text-[11px] tracking-[.14em] text-gold font-semibold mt-2 uppercase">Successful Transactions</p>
        <p class="text-[11px] font-light mt-0.5" style="color:var(--text-faint)">Sales and lease deals completed across Ontario</p>
      </div>
      <div></div><div></div>
    </div>
    <div class="grid grid-cols-3">
      <div></div>
      <div class="py-6">
        <p class="font-fragment text-[4.5rem] lg:text-[5.5rem] leading-none text-[#1a2e1e]">58</p>
        <p class="text-[11px] tracking-[.14em] text-gold font-semibold mt-2 uppercase">Lease Transactions</p>
        <p class="text-[11px] font-light mt-0.5" style="color:var(--text-faint)">connecting tenants and landlords seamlessly</p>
      </div>
      <div></div>
    </div>
  </div>
</section>

<!-- RECOGNIZED AMONG ONTARIO'S BEST -->
<section style="background:#1a2e1e" class="text-white overflow-hidden">
  <div class="grid lg:grid-cols-2" style="min-height:520px">
    <div class="flex flex-col justify-start px-8 lg:px-14 pt-14 pb-14">
      <h2 class="font-fragment text-[2.4rem] sm:text-[2.9rem] lg:text-[3.3rem] uppercase leading-[1.05] tracking-[.02em] text-white mb-10 max-w-sm">Recognized Among Ontario's Best</h2>
      <p class="text-white/60 text-sm font-light leading-relaxed max-w-xs">
        Every achievement represents the trust our clients place in us. From being recognized among Century 21 Canada's Top 100 Producers to receiving the prestigious Double Centurion Award and Top 30 Under 30 recognition, these milestones reflect our unwavering commitment to excellence, integrity, and exceptional client experiences.
      </p>
    </div>
    <div class="relative overflow-hidden" style="min-height:520px">
      <img src="assets/images/founder-nakul.jpg" onerror="this.src='https://placehold.co/700x520/2a3d2e/aaaaaa?text=Founder+Portrait'" alt="Founder" class="absolute inset-0 w-full h-full object-cover object-top"/>
    </div>
  </div>
</section>

<!-- A VISION OF INSPIRED LIVING -->
<section style="background:#0d0d0d" class="text-white overflow-hidden">
  <div class="grid lg:grid-cols-[45%_55%]" style="min-height:560px">
    <div class="relative overflow-hidden" style="min-height:420px">
      <img src="assets/images/vision-interior.jpg" onerror="this.src='https://placehold.co/630x560/1a1a1a/555555?text=Vision+Interior'" alt="Vision" class="absolute inset-0 w-full h-full object-cover"/>
    </div>
    <div class="relative flex flex-col px-10 lg:px-14 py-14">
      <div class="flex justify-end mb-auto">
        <p class="text-[11px] tracking-[.28em] uppercase text-gold font-semibold">(Our beliefs)</p>
      </div>
      <div class="flex-1 flex items-center">
        <h2 class="font-fragment text-[2.6rem] sm:text-[3rem] lg:text-[3.4rem] uppercase leading-[1.05] tracking-[.02em] text-white">A Vision of<br/>Inspired Living</h2>
      </div>
      <div class="mt-auto pt-10">
        <p class="text-white/55 text-sm font-light leading-relaxed max-w-xs ml-auto text-right">
          We envision a future where every property represents more than an investment — it becomes the foundation for growth, financial freedom, and a life well lived. Through expertise, integrity, and innovation, we strive to be Ontario's most trusted real estate partner.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- THIS ISN'T JUST ABOUT REAL ESTATE -->
<section class="pt-16 pb-12 lg:pt-20 lg:pb-14 px-6 lg:px-14 overflow-hidden" style="background:var(--bg)">
  <div class="max-w-4xl mx-auto">
    <h2 class="font-fragment text-center text-[1.4rem] sm:text-[1.7rem] lg:text-[2rem] uppercase tracking-[.12em] mb-10" style="color:var(--text)">This Isn't Just About Real Estate.</h2>
    <div class="flex justify-center mb-10">
      <svg viewBox="0 0 560 160" xmlns="http://www.w3.org/2000/svg" class="w-full max-w-[580px]" style="overflow:visible">
        <defs>
          <clipPath id="ch1"><polygon points="0,0 120,0 150,80 120,160 0,160 30,80"/></clipPath>
          <clipPath id="ch2"><polygon points="110,0 230,0 260,80 230,160 110,160 140,80"/></clipPath>
          <clipPath id="ch3"><polygon points="220,0 340,0 370,80 340,160 220,160 250,80"/></clipPath>
          <clipPath id="ch4"><polygon points="330,0 450,0 480,80 450,160 330,160 360,80"/></clipPath>
        </defs>
        <image href="assets/images/about/card-1.png" x="0" y="0" width="160" height="160" clip-path="url(#ch1)" preserveAspectRatio="xMidYMid slice"/>
        <image href="assets/images/about/card-2.png" x="110" y="0" width="160" height="160" clip-path="url(#ch2)" preserveAspectRatio="xMidYMid slice"/>
        <image href="assets/images/about/card-3.png" x="220" y="0" width="160" height="160" clip-path="url(#ch3)" preserveAspectRatio="xMidYMid slice"/>
        <image href="assets/images/about/card-4.png" x="330" y="0" width="160" height="160" clip-path="url(#ch4)" preserveAspectRatio="xMidYMid slice"/>
        <polygon points="0,0 120,0 150,80 120,160 0,160 30,80" fill="none" stroke="white" stroke-width="2"/>
        <polygon points="110,0 230,0 260,80 230,160 110,160 140,80" fill="none" stroke="white" stroke-width="2"/>
        <polygon points="220,0 340,0 370,80 340,160 220,160 250,80" fill="none" stroke="white" stroke-width="2"/>
        <polygon points="330,0 450,0 480,80 450,160 330,160 360,80" fill="none" stroke="white" stroke-width="2"/>
      </svg>
    </div>
    <div class="flex items-start justify-center gap-10">
      <div class="text-center max-w-sm">
        <p class="text-base font-semibold leading-relaxed mb-2" style="color:var(--text)">It's about belonging. Growth. Building something lasting.</p>
        <p class="text-sm font-light leading-relaxed" style="color:var(--text-muted)">You're not simply buying a property. You're investing in a lifestyle, a community, and a future that's uniquely yours. That's where we come in.</p>
      </div>
      <button class="shrink-0 w-11 h-11 rounded-full bg-[#1a2e1e] hover:bg-[#2a4a30] flex items-center justify-center transition-colors mt-1" aria-label="Play">
        <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
      </button>
    </div>
  </div>
</section>

<!-- GENIUS BANNER -->
<section class="px-6 lg:px-14 pb-14" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <div class="relative rounded-2xl overflow-hidden" style="height:300px">
      <img src="assets/images/about/Group 1686565517.png" onerror="this.src='https://placehold.co/1200x300/1a2e1e/444444?text=Genius+Banner'" alt="Genius" class="absolute inset-0 w-full h-full object-cover"/>
      <div class="absolute inset-0" style="background:linear-gradient(to right,rgba(8,18,10,.92),rgba(8,18,10,.70) 45%,rgba(8,18,10,.30))"></div>
      <div class="relative z-10 h-full flex flex-col justify-between px-10 lg:px-14 py-8">
        <p class="font-fragment text-white text-[1.6rem] lg:text-[1.9rem] italic tracking-wide">Genius.</p>
        <div class="flex justify-end">
          <div class="text-right max-w-[300px]">
            <h3 class="font-fragment text-white text-[1.2rem] lg:text-[1.45rem] uppercase leading-tight tracking-[.04em] mb-2">A Vision Built on Trust &amp; Results</h3>
            <p class="text-white/60 text-xs font-light mb-4">Meet Nakul Sood – Founder, Ethereal Estates</p>
            <a href="genius.php" class="inline-flex items-center gap-2 bg-gold hover:bg-[#e3b961] text-white text-[10px] uppercase tracking-[.18em] font-semibold px-6 py-2.5 transition-colors">Watch the Journey ↗</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TEAM SECTION -->
<section class="px-6 lg:px-14 pb-16 lg:pb-20" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
      <div>
        <p class="text-[11px] tracking-[.28em] uppercase font-semibold mb-2" style="color:var(--text-faint)">(Teams)</p>
        <h2 class="font-fragment text-[2rem] lg:text-[2.4rem] uppercase tracking-[.04em] leading-tight" style="color:var(--text)">Experts You Can Trust</h2>
      </div>
      <p class="text-sm font-light max-w-sm leading-relaxed" style="color:var(--text-muted)">From first conversations to final closings, our team is here to listen, advise, and deliver real results — helping clients thrive in Ontario's most dynamic communities.</p>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
      <?php
      $team = [
        ['img'=>'team-1.jpg','name'=>'James Hartwell','role'=>'Senior Partner'],
        ['img'=>'team-2.jpg','name'=>'Sophia Lane','role'=>'Director, Pre-Construction'],
        ['img'=>'team-3.jpg','name'=>'Nakul Sood','role'=>'Founder & Principal Broker','founder'=>true],
        ['img'=>'team-4.jpg','name'=>'Priya Nair','role'=>'Client Relations'],
        ['img'=>'team-5.jpg','name'=>'David Sterling','role'=>'Investment Strategy'],
        ['img'=>'team-6.jpg','name'=>'Elena Rostova','role'=>'Design Consultant'],
      ];
      foreach ($team as $m):
        $ph = 'https://placehold.co/400x533/d0d0d0/777777?text='.urlencode($m['name']);
      ?>
      <div class="team-card<?= !empty($m['founder']) ? ' relative' : '' ?>">
        <img src="assets/images/<?= $m['img'] ?>" onerror="this.src='<?= $ph ?>'" alt="<?= htmlspecialchars($m['name']) ?>"/>
        <?php if (!empty($m['founder'])): ?>
          <div class="absolute bottom-0 left-0 right-0 px-4 py-3 flex items-center justify-between" style="background:rgba(255,255,255,.95)">
            <div>
              <h4 class="font-fragment text-sm uppercase text-gray-900"><?= $m['name'] ?></h4>
              <p class="text-[9px] uppercase tracking-[.14em] text-gold font-bold"><?= $m['role'] ?></p>
            </div>
            <div class="flex gap-1.5">
              <span class="w-2 h-2 rounded-full bg-gold"></span>
              <span class="w-2 h-2 rounded-full bg-gold/50"></span>
              <span class="w-2 h-2 rounded-full bg-gold/30"></span>
            </div>
          </div>
        <?php else: ?>
          <div class="p-4">
            <h4 class="font-fragment text-base uppercase leading-tight" style="color:var(--text)"><?= $m['name'] ?></h4>
            <p class="text-[10px] uppercase tracking-[.16em] text-gold font-bold mt-1"><?= $m['role'] ?></p>
          </div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- NEWSLETTER -->
<section style="background:#0f1f12" class="py-16 lg:py-20 px-6 lg:px-14">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
    <div class="rounded-2xl overflow-hidden" style="aspect-ratio:4/3">
      <img src="assets/images/newsletter-cabin.jpg" onerror="this.src='https://placehold.co/640x480/1a3020/555555?text=Newsletter'" alt="Newsletter" class="w-full h-full object-cover"/>
    </div>
    <div>
      <h2 class="font-fragment text-white text-[1.9rem] sm:text-[2.2rem] lg:text-[2.6rem] uppercase leading-[1.1] tracking-[.04em] mb-4">
        Be the First to Know About Ontario's Most Exclusive Real Estate Opportunities
      </h2>
      <p class="text-white/60 text-sm font-light leading-relaxed mb-8">I consent to receiving updates from Ethereal Estates regarding new project launches, market insights, and real estate opportunities across Ontario.</p>
      <form onsubmit="event.preventDefault();alert('Subscribed!')" class="space-y-5">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1">First Name</label>
            <input type="text" placeholder="First name" class="nl-input"/>
          </div>
          <div>
            <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1">Last Name</label>
            <input type="text" placeholder="Last name" class="nl-input"/>
          </div>
        </div>
        <div>
          <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1">Email Address</label>
          <input type="email" placeholder="name@domain.com" class="nl-input"/>
        </div>
        <button type="submit" class="bg-gold hover:bg-[#e3b961] text-white text-[11px] uppercase tracking-[.18em] font-semibold px-8 py-3.5 transition-colors">Subscribe Now ↗</button>
      </form>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
</body>
</html>
