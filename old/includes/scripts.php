<?php
/**
 * includes/scripts.php
 * Global JS included just before </body> on every page.
 * No theme toggle — index.php is always dark, all other pages always light.
 */
?>
<script>
/* ══════════════════════════════════════════
   MOBILE MENU
══════════════════════════════════════════ */
(function () {
  const toggle = document.getElementById('mobile-toggle');
  const menu   = document.getElementById('mobile-menu');
  if (!toggle || !menu) return;

  let open = false;

  toggle.addEventListener('click', () => {
    open = !open;
    menu.style.transform = open ? 'translateY(0)' : 'translateY(-150%)';
    toggle.setAttribute('aria-expanded', String(open));

    // Animate hamburger lines → X when open
    const lines = toggle.querySelectorAll('.ham-line');
    if (lines.length >= 2) {
      lines[0].style.transform = open ? 'translateY(6px) rotate(45deg)'   : '';
      lines[1].style.transform = open ? 'translateY(-6px) rotate(-45deg)' : '';
      if (lines[2]) lines[2].style.opacity = open ? '0' : '1';
    }
  });

  // Close on outside click
  document.addEventListener('click', (e) => {
    if (open && !toggle.contains(e.target) && !menu.contains(e.target)) {
      open = false;
      menu.style.transform = 'translateY(-150%)';
      toggle.setAttribute('aria-expanded', 'false');
      toggle.querySelectorAll('.ham-line').forEach(l => {
        l.style.transform = '';
        l.style.opacity   = '1';
      });
    }
  });
})();


/* ══════════════════════════════════════════
   NAVBAR — hide on scroll down, show on scroll up
   Only runs on sticky (light) pages, not on index.php
   where navbar is absolute-positioned over the video.
══════════════════════════════════════════ */
(function () {
  const nav = document.getElementById('site-navbar');
  if (!nav) return;
  // Absolute-positioned hero nav should not be hidden
  if (nav.classList.contains('absolute')) return;

  let lastY = 0;
  nav.style.transition = 'transform .35s cubic-bezier(.4,0,.2,1)';

  window.addEventListener('scroll', () => {
    const y = window.scrollY;
    nav.style.transform = (y > lastY && y > 80) ? 'translateY(-100%)' : 'translateY(0)';
    lastY = y;
  }, { passive: true });
})();
</script>
