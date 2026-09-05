<?php
$pageTitle  = 'Market Insights — Ethereal Estates';
$pageDesc   = 'Stay informed with the latest Ontario real estate trends, pre-construction opportunities and expert guidance.';
$activePage = '';
require 'includes/head.php';
?>
<style>
  .hero-wrap{position:relative;width:100%;border-radius:16px;overflow:hidden;height:380px}
  .hero-wrap img{width:100%;height:100%;object-fit:cover;display:block}
  .hero-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.25),rgba(0,0,0,.65));display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px}
  .article-row{display:grid;grid-template-columns:1fr 320px;gap:40px;align-items:center;padding:36px 0;border-bottom:1px solid var(--border)}
  .article-row:first-child{padding-top:0}
  @media(max-width:768px){.article-row{grid-template-columns:1fr;gap:16px}}
  .article-row img{width:100%;aspect-ratio:16/10;object-fit:cover;border-radius:10px;display:block}
  .arrow-cta{width:38px;height:38px;border-radius:50%;background:#1a2e1e;color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;transition:background .2s;flex-shrink:0;margin-top:14px}
  .arrow-cta:hover{background:#d5a94e}
  .pg-btn{width:38px;height:38px;border-radius:50%;border:1px solid var(--border);background:var(--bg-card);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:500;cursor:pointer;transition:all .2s;text-decoration:none;color:var(--text-muted)}
  .pg-btn.active,.pg-btn:hover{background:#d5a94e;border-color:#d5a94e;color:#fff}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- HERO -->
<div class="px-4 lg:px-14 pt-4">
  <div class="hero-wrap">
    <img src="assets/images/news-hero.jpg" onerror="this.src='https://placehold.co/1400x380/b8b8b8/777777?text=Market+Insights'" alt="Market Insights"/>
    <div class="hero-overlay">
      <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-5xl uppercase tracking-[.06em] leading-tight mb-3">Market Insights</h1>
      <p class="text-white/80 text-sm font-light max-w-xl leading-relaxed">Stay informed with the latest Ontario real estate trends, pre-construction opportunities, investment strategies, and expert guidance.</p>
    </div>
  </div>
</div>

<!-- ARTICLES -->
<section class="px-6 lg:px-14 py-14 lg:py-20" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-baseline gap-6 flex-wrap mb-12">
      <p class="text-gold text-xs font-semibold tracking-[.28em] uppercase">(Blog &amp; Resources)</p>
      <h2 class="font-fragment text-[1.8rem] sm:text-[2.2rem] lg:text-[2.6rem] uppercase tracking-[.04em] leading-tight" style="color:var(--text)">Market Insights</h2>
    </div>

    <?php
    $articles = [
      ['date'=>'2026-04-13','title'=>'Discover Ethereal Estates\'s New Release at Palmetto','excerpt'=>'North Oshawa is fast becoming a destination for those seeking...','img'=>'news-art-1.jpg'],
      ['date'=>'2026-04-13','title'=>'Ready. Set. Rebate!','excerpt'=>'Palmetto is Ethereal Estates\'s newest community. North Oshawa is fast becoming...','img'=>'news-art-2.jpg'],
      ['date'=>'2026-04-13','title'=>'Your Georgina Weekend Guide: 8 Things to Do','excerpt'=>'Palmetto is Ethereal Estates\'s newest community. North Oshawa is fast becoming...','img'=>''],
      ['date'=>'2026-04-13','title'=>'Ontario Pre-Construction Market Update: Q2 2026','excerpt'=>'Palmetto is Ethereal Estates\'s newest community. North Oshawa is fast becoming...','img'=>''],
      ['date'=>'2026-04-13','title'=>'5 Reasons to Invest in Bowmanville Real Estate','excerpt'=>'Palmetto is Ethereal Estates\'s newest community. North Oshawa is fast becoming...','img'=>''],
    ];
    foreach ($articles as $i => $a):
      $ph = 'https://placehold.co/320x200/c'.($i%2?'0':'8').'c'.($i%2?'0':'8').'c'.($i%2?'0':'8').'/'.($i%2?'777':'888').'777?text=Article+'.($i+1);
      $src = $a['img'] ? 'assets/images/'.$a['img'] : $ph;
      $last = $i === count($articles)-1;
    ?>
    <div class="article-row" style="<?= $last?'border-bottom:none':'' ?>">
      <div>
        <p class="text-[11px] font-light mb-3" style="color:var(--text-faint)"><?= $a['date'] ?></p>
        <h3 class="font-fragment text-[1.5rem] lg:text-[1.7rem] uppercase leading-tight mb-3" style="color:var(--text)"><?= htmlspecialchars($a['title']) ?></h3>
        <p class="text-sm font-light leading-relaxed" style="color:var(--text-muted)"><?= htmlspecialchars($a['excerpt']) ?></p>
        <a href="news-detail.php" class="arrow-cta" aria-label="Read article">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
      <img src="<?= $src ?>" onerror="this.src='<?= $ph ?>'" alt="<?= htmlspecialchars($a['title']) ?>"/>
    </div>
    <?php endforeach; ?>

    <!-- Pagination -->
    <div class="flex items-center justify-center gap-3 mt-14">
      <a href="#" class="pg-btn">01</a>
      <a href="#" class="pg-btn active">02</a>
      <a href="#" class="pg-btn">03</a>
      <a href="#" class="pg-btn" aria-label="Next">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
</body>
</html>
