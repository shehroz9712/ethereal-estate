<?php
$pageTitle  = 'Contact Us — Ethereal Estates';
$pageDesc   = 'Every good decision starts here. Connect with Ethereal Estates for luxury homes and pre-construction investments in Ontario.';
$activePage = 'contact';
require 'includes/head.php';
?>
<style>
  .hero-wrap{position:relative;width:100%;border-radius:16px;overflow:hidden;height:400px}
  .hero-wrap img{width:100%;height:100%;object-fit:cover;display:block}
  .hero-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.3),rgba(0,0,0,.62));display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px}
  .f-input{width:100%;border:none;border-bottom:1px solid var(--input-border);padding:11px 0;font-family:"Urbanist",sans-serif;font-size:12px;font-weight:400;color:var(--input-text);background:transparent;outline:none;transition:border-color .2s;letter-spacing:.01em}
  .f-input::placeholder{color:var(--input-ph)}
  .f-input:focus{border-color:#d5a94e}
  .f-label{display:block;font-size:10px;letter-spacing:.22em;text-transform:uppercase;color:var(--text-faint);font-weight:500;margin-bottom:2px}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- HERO -->
<div class="px-4 lg:px-14 pt-4">
  <div class="hero-wrap">
    <img src="assets/images/contact-hero.jpg" onerror="this.src='https://placehold.co/1400x400/b8b8b8/777777?text=Contact+Hero'" alt="Contact Hero"/>
    <div class="hero-overlay">
      <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-[3.2rem] uppercase tracking-[.06em] leading-tight mb-3">Let's Start the Conversation</h1>
      <p class="text-white/80 text-sm font-light max-w-lg leading-relaxed tracking-wide">Whether you're buying, selling, investing, or exploring pre-construction opportunities,<br class="hidden sm:block"/> our team is here to guide you every step of the way.</p>
    </div>
  </div>
</div>

<!-- INTRO + FORM -->
<section class="px-6 lg:px-14 py-16 lg:py-20" style="background:var(--bg)">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-start">
    <div>
      <h2 class="font-fragment text-[2rem] sm:text-[2.4rem] lg:text-[2.8rem] uppercase leading-[1.1] tracking-[.03em] max-w-sm" style="color:var(--text)">
        Every Great Real Estate Journey Starts With a Conversation.
      </h2>
      <p class="mt-6 text-sm font-light leading-relaxed max-w-xs" style="color:var(--text-muted)">
        At Ethereal Estates, we believe real estate is personal. Whether you're searching for your dream home, exploring investment opportunities, or looking to maximize the value of your property, our team is ready to provide expert guidance tailored to your unique needs.
      </p>
    </div>
    <div>
      <form onsubmit="event.preventDefault();alert('Message sent! We will be in touch within 24 hours.')" class="space-y-7">
        <div class="grid grid-cols-2 gap-6">
          <div><label class="f-label">First Name*</label><input type="text" required class="f-input"/></div>
          <div><label class="f-label">Last Name*</label><input type="text" required class="f-input"/></div>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <div><label class="f-label">Phone No*</label><input type="tel" required class="f-input"/></div>
          <div><label class="f-label">Postal Code*</label><input type="text" required class="f-input"/></div>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <div><label class="f-label">Email Address*</label><input type="email" required class="f-input"/></div>
          <div><label class="f-label">Confirm Email*</label><input type="email" required class="f-input"/></div>
        </div>
        <div><label class="f-label">Message</label><textarea rows="4" class="f-input resize-none"></textarea></div>
        <button type="submit" class="inline-flex items-center gap-2 bg-gold hover:bg-[#e3b961] text-white text-[11px] uppercase tracking-[.2em] font-semibold px-8 py-4 transition-colors">Submit Message ↗</button>
      </form>
    </div>
  </div>
</section>

<!-- GENERAL ENQUIRIES + AGENT PHOTO -->
<section class="px-6 lg:px-14 py-16 lg:py-20" style="background:var(--bg-soft)">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
    <div>
      <h2 class="font-fragment text-[1.9rem] lg:text-[2.3rem] uppercase tracking-[.05em] text-center lg:text-left mb-10" style="color:var(--text)">General Enquiries</h2>
      <div class="space-y-0 divide-y" style="border-color:var(--border)">
        <?php
        $offices = [
          ['name'=>'Head Office','lines'=>['600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada','Phone: <a href="tel:+14373767611" class="hover:text-gold">+1 437-376-7611</a>','Email: <a href="mailto:office@etherealestates.ca" class="hover:text-gold">office@etherealestates.ca</a>']],
          ['name'=>'Sales Team','lines'=>['Phone: <a href="tel:4169875500" class="hover:text-gold">(416) 987-5500</a>','Dedicated Pre-Construction &amp; Resale Advisory']],
          ['name'=>'Design Studio','lines'=>['600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1','Phone: <a href="tel:+14373767611" class="hover:text-gold">+1 437-376-7611</a>','By appointment for bespoke builder finishes']],
          ['name'=>'Customer Care','lines'=>['Phone: <a href="tel:+14373767611" class="hover:text-gold">+1 437-376-7611</a>','Email: <a href="mailto:office@etherealestates.ca" class="hover:text-gold">office@etherealestates.ca</a>']],
        ];
        foreach ($offices as $o): ?>
        <div class="py-6 grid grid-cols-[140px_1fr] gap-4 items-start">
          <p class="font-fragment text-sm uppercase tracking-wide" style="color:var(--text)"><?= $o['name'] ?></p>
          <div class="text-xs font-light space-y-1 leading-relaxed" style="color:var(--text-muted)">
            <?php foreach ($o['lines'] as $l): ?><p><?= $l ?></p><?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="flex justify-center lg:justify-end">
      <div class="rounded-2xl overflow-hidden w-full max-w-[400px]" style="aspect-ratio:3/4">
        <img src="assets/images/contact-agent.jpg" onerror="this.src='https://placehold.co/400x533/c8c8c8/888888?text=Agent+Photo'" alt="Agent" class="w-full h-full object-cover object-top"/>
      </div>
    </div>
  </div>
</section>

<!-- MAP + LOCATION -->
<section class="px-0">
  <div class="max-w-full grid lg:grid-cols-2">
    <div class="overflow-hidden" style="min-height:420px">
      <img src="assets/images/contact-map.jpg" onerror="this.src='https://placehold.co/800x420/d0d0d0/888888?text=Map'" alt="Map" class="w-full h-full object-cover" style="min-height:420px"/>
    </div>
    <div class="flex flex-col justify-center px-10 lg:px-16 py-14" style="background:var(--bg-soft)">
      <h2 class="font-fragment text-[1.8rem] lg:text-[2.2rem] uppercase tracking-[.06em] mb-6" style="color:var(--text)">Our Location</h2>
      <p class="text-sm font-light leading-relaxed" style="color:var(--text-muted)">600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada</p>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
</body>
</html>
