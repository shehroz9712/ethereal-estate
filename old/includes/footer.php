<?php
/**
 * includes/footer.php
 * Shared dark footer used on every page.
 */
?>

<!-- ══════════ FOOTER ══════════ -->
<footer style="background:#060e09;" class="text-white pt-14 pb-10 px-6 lg:px-14 border-t border-white/10">
  <div class="max-w-7xl mx-auto">

    <!-- Top grid -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10 pb-10 border-b border-white/10">

      <!-- Col 1-2: Contact -->
      <div class="lg:col-span-2">
        <p class="text-[10px] uppercase tracking-[.24em] text-gold font-semibold mb-2">Let's Talk</p>
        <a href="mailto:office@etherealestates.ca"
          class="font-fragment text-2xl lg:text-3xl text-white hover:text-gold transition-colors block mb-5"
          style="font-family:'PP Fragment Serif Regular',Georgia,serif">
          office@etherealestates.ca
        </a>
        <div class="text-xs text-white/55 font-light leading-relaxed mb-5 space-y-0.5">
          <p>600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada</p>
          <p>Telephone:
            <a href="tel:+14373767611" class="text-white/80 hover:text-gold transition-colors">+1 437-376-7611</a>
          </p>
        </div>
        <!-- Social pills -->
        <div class="flex flex-wrap gap-2">
          <?php foreach (['Instagram','Twitter','Youtube','Behance','LinkedIn'] as $s): ?>
            <a href="#"
              class="px-4 py-1.5 rounded-full border border-white/20 text-[10px] uppercase tracking-[.12em] text-white/70 hover:border-gold hover:text-gold transition-colors">
              <?= $s ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Col 3: Discover More -->
      <div>
        <h3 class="text-sm uppercase tracking-[.14em] text-white mb-4"
          style="font-family:'PP Fragment Serif Regular',Georgia,serif">Discover More</h3>
        <ul class="space-y-2 text-xs text-white/55 font-light">
          <li><a href="about.php"                class="hover:text-gold transition-colors">Our Story</a></li>
          <li><a href="pre-construction.php"     class="hover:text-gold transition-colors">Communities</a></li>
          <li><a href="genius.php"               class="hover:text-gold transition-colors">Genius</a></li>
          <li><a href="news.php"                 class="hover:text-gold transition-colors">News</a></li>
          <li><a href="contact.php"              class="hover:text-gold transition-colors">Contact</a></li>
        </ul>
      </div>

      <!-- Col 4: Quick Links -->
      <div>
        <h3 class="text-sm uppercase tracking-[.14em] text-white mb-4"
          style="font-family:'PP Fragment Serif Regular',Georgia,serif">Quick Links</h3>
        <ul class="space-y-2 text-xs text-white/55 font-light">
          <li><a href="our-story.php"            class="hover:text-gold transition-colors">Our Story</a></li>
          <li><a href="rebate-calculator.php"    class="hover:text-gold transition-colors">Rebate Calculator</a></li>
          <li><a href="join-ethereal.php"        class="hover:text-gold transition-colors">Join Ethereal</a></li>
          <li><a href="#"                        class="hover:text-gold transition-colors">Terms &amp; Conditions</a></li>
          <li><a href="#"                        class="hover:text-gold transition-colors">Privacy Policy</a></li>
        </ul>
      </div>

    </div>

    <!-- Bottom bar -->
    <div class="pt-7 flex flex-col sm:flex-row items-center justify-between gap-4
                text-[11px] text-white/35 tracking-[.1em] uppercase">
      <p>&copy; <?= date('Y') ?> Ethereal Estates. All rights reserved.</p>
      <div class="flex items-center gap-6">
        <a href="index.php"                class="hover:text-gold transition-colors">Home</a>
        <a href="featured-properties.php"  class="hover:text-gold transition-colors">Properties</a>
        <a href="about.php"                class="hover:text-gold transition-colors">About</a>
      </div>
    </div>

  </div>
</footer>
