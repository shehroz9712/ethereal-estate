<?php
$pageTitle  = 'Ethereal Estates — Invest in Tomorrow\'s Address';
$pageDesc   = 'Discover exclusive pre-construction opportunities and luxury real estate across Ontario with Ethereal Estates.';
$bodyClass  = 'hero-page';
$activePage = 'home';
$navDark    = true;          // transparent white-text navbar over video
require 'includes/head.php';
require 'includes/navbar.php'; // ← single navbar, dark/transparent mode
?>

<!-- ═══════════ HERO — full-screen video ═══════════ -->
<section class="relative min-h-[100dvh] w-full overflow-hidden bg-black text-white">

  <!-- Background video -->
  <video class="absolute inset-0 h-full w-full object-cover" autoplay muted loop playsinline preload="auto">
    <source src="assets/video/hero.mp4" type="video/mp4">
  </video>

  <!-- Dark overlays -->
  <div class="absolute inset-0 bg-black/40"></div>
  <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/25 to-black/35"></div>
  <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/60 to-transparent"></div>

  <!-- Hero body — full height, push content below absolute navbar -->
  <div class="relative z-10 flex min-h-[100dvh] flex-col">

    <!-- Spacer so content clears the absolute navbar (~72px tall) -->
    <div class="h-[72px] shrink-0"></div>

    <!-- ── Main content ── -->
    <main class="flex flex-1 items-center px-5 pb-10 pt-4 sm:px-8 lg:px-[7%] lg:pb-14">
      <div class="grid w-full items-center gap-10 lg:grid-cols-[1fr_390px] xl:grid-cols-[1fr_420px] xl:gap-20">

        <!-- Left copy -->
        <div class="max-w-[680px]">
          <h1 class="font-fragment text-[35px] font-normal uppercase leading-[1.4] tracking-[.035em]
                      sm:text-[30px] md:text-[35px] lg:text-[42px] xl:text-[44px] text-white">
            Invest in Tomorrow's<br class="hidden sm:block">
            Address, at Today's Price
          </h1>
          <p class="mt-5 text-sm font-light tracking-wide text-white/85 sm:text-base">
            Discover Exclusive Pre-Construction Opportunities.
          </p>
          <a href="rebate-calculator.php"
            class="mt-7 inline-flex items-center gap-2 bg-[#d5a94e] px-6 py-4 text-[15px]
                   font-medium uppercase tracking-[.12em] text-white transition hover:bg-[#e3b961]">
            Check Rebate Eligibility <span>↗</span>
          </a>
        </div>

        <!-- Right card -->
        <div class="w-full max-w-[420px] justify-self-center rounded-[15px] border border-white/10
                    bg-[#06130d]/80 p-6 shadow-2xl backdrop-blur-[5px] sm:p-8 lg:p-7 xl:p-8">
          <h2 class="font-fragment text-[27px] uppercase leading-[1.05] tracking-wide sm:text-[29px] text-white">
            Find Your Perfect<br>Property
          </h2>

          <?php
          $items = [
            ['num' => '1.', 'label' => 'Pre-Construction',                        'href' => 'pre-construction.php'],
            ['num' => '2.', 'label' => 'Featured Properties by Ethereal Estates', 'href' => 'featured-properties.php'],
            ['num' => '3.', 'label' => 'MLS Listings',                            'href' => 'pre-construction.php'],
          ];
          foreach ($items as $item): ?>
            <div class="mt-7 first:mt-8">
              <div class="flex gap-2 text-sm leading-5 text-white/90 sm:text-[15px]">
                <span><?= $item['num'] ?></span>
                <span><?= $item['label'] ?></span>
              </div>
              <a href="<?= $item['href'] ?>"
                class="mt-3 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40
                       px-5 py-2.5 text-[11px] text-white transition
                       hover:border-[#d5a94e] hover:bg-[#d5a94e]/10">
                Explore Now <span class="text-[#d5a94e]">↗</span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </main>

    <!-- Vertical slider dots -->
    <div class="absolute right-4 top-1/2 z-20 flex -translate-y-1/2 flex-col items-center gap-3 sm:right-6 lg:right-7">
      <span class="flex h-5 w-5 items-center justify-center rounded-full border border-white/80">
        <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
      </span>
      <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
      <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
      <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
      <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
    </div>

  </div>
</section>

<?php require 'includes/scripts.php'; ?>
</body>
</html>
