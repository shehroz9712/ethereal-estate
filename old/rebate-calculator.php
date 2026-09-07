<?php
$pageTitle  = 'Rebate Calculator — Ethereal Estates';
$pageDesc   = 'Calculate your HST/GST rebate eligibility before you buy. Know your savings with Ethereal Estates.';
$activePage = 'rebate';
require 'includes/head.php';
?>
<style>
  .calc-input{width:100%;background:#1e3d27;border:1px solid rgba(255,255,255,.15);border-radius:6px;padding:13px 14px;font-size:14px;color:#fff;font-family:"Urbanist",sans-serif;outline:none;transition:border-color .2s}
  .calc-input::placeholder{color:rgba(255,255,255,.3)}
  .calc-input:focus{border-color:#d5a94e}
  .calc-select{width:100%;background:#1e3d27;border:1px solid rgba(255,255,255,.15);border-radius:6px;padding:13px 14px;font-size:13px;color:#fff;font-family:"Urbanist",sans-serif;outline:none;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23d5a94e'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 14px center;cursor:pointer}
  .range-slider{-webkit-appearance:none;appearance:none;width:100%;height:4px;border-radius:2px;outline:none;cursor:pointer;background:linear-gradient(to right,#d5a94e 55%,rgba(255,255,255,.2) 55%)}
  .range-slider::-webkit-slider-thumb{-webkit-appearance:none;appearance:none;width:20px;height:20px;border-radius:50%;background:#d5a94e;border:2px solid #fff;cursor:pointer;box-shadow:0 2px 6px rgba(0,0,0,.3)}
  .range-slider::-moz-range-thumb{width:20px;height:20px;border-radius:50%;background:#d5a94e;border:2px solid #fff;cursor:pointer}
</style>

<?php require 'includes/navbar.php'; ?>

<!-- PAGE HEADER -->
<div class="px-6 lg:px-14 pt-8 pb-2">
  <a href="index.php" class="inline-flex items-center gap-1.5 text-[11px] tracking-[.14em] uppercase font-medium hover:text-gold transition-colors mb-4" style="color:var(--text-faint)">
    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M5 12l7-7M5 12l7 7"/></svg>Back
  </a>
  <div class="flex items-baseline gap-6 flex-wrap mb-2">
    <p class="text-gold text-xs font-semibold tracking-[.28em] uppercase">(MLS Listings)</p>
    <h1 class="font-fragment text-[1.9rem] sm:text-[2.4rem] lg:text-[2.9rem] uppercase tracking-[.04em] leading-tight" style="color:var(--text)">Know Your Rebate Before You Buy</h1>
  </div>
</div>

<section class="px-6 lg:px-14 py-14 lg:py-20" style="background:var(--bg)">
  <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-14 lg:gap-20 items-start">
    <!-- Left copy -->
    <div>
      <h2 class="font-fragment text-[2rem] sm:text-[2.3rem] lg:text-[2.6rem] uppercase leading-[1.1] tracking-[.03em] mb-6" style="color:var(--text)">Make Informed Decisions with Confidence</h2>
      <p class="text-sm font-light leading-relaxed mb-10" style="color:var(--text-muted)">Understanding your rebate eligibility can make a meaningful difference in your home-buying journey. Estimate your potential GST/HST savings and explore opportunities to maximize the value of your investment.</p>
      <a href="pre-construction.php" class="inline-flex items-center gap-2 border border-gold text-gold hover:bg-gold hover:text-white text-[11px] uppercase tracking-[.18em] font-semibold px-7 py-3.5 transition-all rounded-sm">Explore the Neighborhood ↗</a>
    </div>
    <!-- Right: calculator card -->
    <div class="rounded-2xl overflow-hidden" style="background:#1a2e1e">
      <div class="px-8 py-8">
        <h3 class="font-fragment text-white text-center text-lg uppercase tracking-[.12em] mb-8">Estimate Your Rebate</h3>
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1.5">Property Price</label>
            <input id="prop-price" type="number" placeholder="$" class="calc-input" oninput="calcRebate()"/>
          </div>
          <div>
            <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1.5">Down Payment</label>
            <input id="down-pay" type="number" placeholder="$" class="calc-input" oninput="calcRebate()"/>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1.5">Commission Rate (%)</label>
            <select id="commission" class="calc-select" onchange="calcRebate()">
              <option value="5">5%</option><option value="4">4%</option><option value="3">3%</option><option value="2.5">2.5%</option>
            </select>
          </div>
          <div>
            <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-1.5">Province</label>
            <select id="province" class="calc-select" onchange="calcRebate()">
              <option value="">Select Province</option><option value="ON">Ontario</option><option value="BC">British Columbia</option><option value="AB">Alberta</option><option value="QC">Quebec</option>
            </select>
          </div>
        </div>
        <div class="mb-6">
          <label class="block text-[10px] uppercase tracking-[.18em] text-white/40 mb-3">Rebate Percentage (%)</label>
          <input id="rebate-pct" type="range" min="0" max="100" value="55" class="range-slider" oninput="updateSlider(this);calcRebate()"/>
          <p class="text-center text-white/70 text-sm mt-2" id="slider-val">55%</p>
        </div>
        <button onclick="calcRebate()" class="w-full bg-gold hover:bg-[#e3b961] text-white font-semibold text-sm uppercase tracking-[.18em] py-4 rounded-lg transition-colors mb-6">Calculate Savings</button>
        <div class="flex items-center justify-between border-t border-white/10 pt-5">
          <p class="text-white/60 text-xs uppercase tracking-[.16em] font-medium">Estimated Rebate Amount:</p>
          <p class="font-fragment text-white text-2xl" id="result-amt">$0.00</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>
<?php require 'includes/scripts.php'; ?>
<script>
function updateSlider(el){const v=el.value;document.getElementById('slider-val').textContent=v+'%';el.style.background=`linear-gradient(to right,#d5a94e ${v}%,rgba(255,255,255,.2) ${v}%)`}
function calcRebate(){const p=parseFloat(document.getElementById('prop-price').value)||0;const pct=parseFloat(document.getElementById('rebate-pct').value)||0;const r=p*(pct/100)*.36;document.getElementById('result-amt').textContent='$'+r.toLocaleString('en-CA',{minimumFractionDigits:2,maximumFractionDigits:2})}
</script>
</body>
</html>
