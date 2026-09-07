<?php
/**
 * includes/navbar.php  —  Single navbar for all pages.
 *
 * $activePage  — highlights current nav link
 * $navDark     — true on index.php (transparent, white text over video)
 *                false everywhere else (sticky white nav)
 */
$activePage = $activePage ?? '';
$navDark    = $navDark    ?? false;

$links = [
    'pre-construction' => ['href' => 'pre-construction.php',  'label' => 'Pre-Construction'],
    'featured'         => ['href' => 'featured-properties.php','label' => 'Featured Properties'],
    'about'            => ['href' => 'about.php',             'label' => 'About Us'],
    'contact'          => ['href' => 'contact.php',           'label' => 'Contact Us'],
    'rebate'           => ['href' => 'rebate-calculator.php', 'label' => 'Calculate Your Rebate'],
];
?>

<?php if ($navDark): ?>
<!-- ══════ DARK / TRANSPARENT NAV (index.php only) ══════ -->
<header id="site-navbar"
  class="absolute inset-x-0 top-0 z-50 flex items-center justify-between pe-5 sm:pe-8 lg:pe-12 py-4">

  <!-- Logo -->
  <a href="index.php" class="shrink-0">
    <img src="assets/images/logo.png"
         onerror="this.src='assets/images/logo.png'"
         alt="Ethereal Estates" />
  </a>

  <!-- Desktop links -->
  <nav class="hidden lg:flex items-center gap-7 xl:gap-9">
    <?php foreach ($links as $key => $link): ?>
      <a href="<?= $link['href'] ?>"
         class="flex items-center gap-1 text-[13px] tracking-[.17em] uppercase
                text-white transition-colors hover:text-[#d5a94e]
                <?= $key === $activePage ? '!text-[#d5a94e]' : '' ?>">
        <?= htmlspecialchars($link['label']) ?>
        <span class="text-[#d5a94e]">↗</span>
      </a>
    <?php endforeach; ?>
  </nav>

  <!-- Mobile hamburger -->
  <button id="mobile-toggle"
    class="lg:hidden flex flex-col gap-1.5 p-2 rounded"
    aria-label="Open Navigation" aria-expanded="false">
    <span class="ham-line block w-6 h-0.5 bg-white transition-all"></span>
    <span class="ham-line block w-6 h-0.5 bg-white transition-all"></span>
    <span class="ham-line block w-4 h-0.5 bg-white transition-all"></span>
  </button>

  <!-- Mobile drawer -->
  <div id="mobile-menu"
    class="lg:hidden fixed inset-x-0 z-50 border-b shadow-xl px-6 py-5 -translate-y-[150%]"
    style="top:65px; background:rgba(10,20,13,.97); border-color:rgba(255,255,255,.12);
           transition:transform .3s cubic-bezier(.4,0,.2,1);">
    <div class="flex flex-col gap-0 text-xs uppercase tracking-widest font-medium">
      <?php foreach ($links as $key => $link): ?>
        <a href="<?= $link['href'] ?>"
          class="py-3 border-b border-white/10 flex justify-between items-center
                 transition-colors hover:text-[#d5a94e]"
          style="color:<?= $key === $activePage ? '#d5a94e' : 'rgba(255,255,255,.85)' ?>">
          <?= htmlspecialchars($link['label']) ?>
          <span class="text-[#d5a94e]">↗</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

</header>

<?php else: ?>
<!-- ══════ LIGHT / STICKY NAV (all other pages) ══════ -->
<header id="site-navbar"
  class="sticky top-0 z-50 bg-white/96 backdrop-blur-md border-b border-gray-100"
  style="transition:transform .35s cubic-bezier(.4,0,.2,1);">

  <div class="flex items-center justify-between pe-6 lg:pe-12 py-4 gap-4">

    <!-- Logo -->
    <a href="index.php" class="shrink-0">
      <img src="assets/images/logo-dark.png"
           onerror="this.src='assets/images/logo.png'"
           alt="Ethereal Estates"
         />
    </a>

    <!-- Desktop links -->
    <nav class="hidden lg:flex items-center gap-7 xl:gap-9 flex-1 justify-end">
      <?php foreach ($links as $key => $link): ?>
        <a href="<?= $link['href'] ?>" 
           class="text-[15px] nav-link<?= $key === $activePage ? ' active' : '' ?>">
          <?= htmlspecialchars($link['label']) ?>
          <span class="text-gold">↗</span>
        </a>
      <?php endforeach; ?>
    </nav>

    <!-- Mobile hamburger -->
    <button id="mobile-toggle"
      class="lg:hidden flex flex-col gap-1.5 p-2 rounded"
      aria-label="Open Navigation" aria-expanded="false">
      <span class="ham-line block w-6 h-0.5 bg-gray-900 transition-all"></span>
      <span class="ham-line block w-6 h-0.5 bg-gray-900 transition-all"></span>
      <span class="ham-line block w-4 h-0.5 bg-gray-900 transition-all"></span>
    </button>

  </div>

  <!-- Mobile drawer -->
  <div id="mobile-menu"
    class="lg:hidden fixed inset-x-0 z-50 bg-white border-b border-gray-200 shadow-xl px-6 py-5 -translate-y-[150%]"
    style="top:65px; transition:transform .3s cubic-bezier(.4,0,.2,1);">
    <div class="flex flex-col gap-0 text-xs uppercase tracking-widest font-medium">
      <?php foreach ($links as $key => $link): ?>
        <a href="<?= $link['href'] ?>"
          class="py-3 border-b border-gray-100 flex justify-between items-center
                 text-gray-800 hover:text-gold transition-colors"
          style="color:<?= $key === $activePage ? '#d5a94e' : '' ?>">
          <?= htmlspecialchars($link['label']) ?>
          <span class="text-gold">↗</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

</header>
<?php endif; ?>
