<x-layouts.app activePage="rebate" title="Rebate Calculator — Ethereal Estates">

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 pt-8 pb-4">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-[11px] uppercase tracking-[0.14em] text-gray-400 hover:text-[#d5a94e] transition-colors mb-4">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M5 12l7-7M5 12l7 7"/></svg>Back
        </a>
        <h1 class="font-fragment text-2xl sm:text-4xl lg:text-5xl uppercase tracking-[0.04em] text-gray-900 leading-tight">
            Know Your Rebate Before You Buy
        </h1>
    </div>

    <!-- ═══════════ MAIN CALCULATOR SECTION (matches Figma MLS Listings.png) ═══════════ -->
    <section class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-12 lg:py-16"
             x-data="{
                 price: 1000000,
                 downPayment: 200000,
                 commission: 5,
                 province: 'ON',
                 rebatePct: 55,
                 rebateAmount: 0,
                 calculate() {
                     const p = parseFloat(this.price) || 0;
                     const c = parseFloat(this.commission) || 5;
                     const pct = parseFloat(this.rebatePct) || 55;
                     // Standard Ontario builder/brokerage rebate formula
                     const totalCommission = p * (c / 100);
                     this.rebateAmount = totalCommission * (pct / 100);
                 },
                 init() {
                     this.calculate();
                 }
             }">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            <!-- Left Copy -->
            <div>
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block mb-3">
                    Calculated Confidence
                </span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase leading-[1.1] tracking-[0.03em] text-gray-900 mb-6">
                    Make Informed Decisions With Confidence
                </h2>
                <div class="gold-line"></div>
                <p class="text-sm font-light text-gray-600 leading-relaxed mb-8">
                    Understanding your rebate eligibility can make a meaningful difference in your home-buying journey. Estimate your potential commission and GST/HST rebate savings before submitting offers or signing builder agreements.
                </p>
                <div class="space-y-4 text-xs text-gray-500 font-light mb-8">
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#fdfaf4] text-[#d5a94e] border border-[#d5a94e] flex items-center justify-center font-bold">1</span>
                        <span>Input the approximate purchase price and down payment.</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#fdfaf4] text-[#d5a94e] border border-[#d5a94e] flex items-center justify-center font-bold">2</span>
                        <span>Select your province to incorporate applicable tax parameters.</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-[#fdfaf4] text-[#d5a94e] border border-[#d5a94e] flex items-center justify-center font-bold">3</span>
                        <span>Receive instant transparency on potential cash back at closing.</span>
                    </div>
                </div>

                <a href="{{ route('pre-construction') }}" class="btn-gold-outline text-xs">
                    Explore Communities ↗
                </a>
            </div>

            <!-- Right Calculator Card (Figma dark forest green card) -->
            <div class="bg-[#1a2e1e] text-white rounded-2xl p-6 sm:p-10 shadow-2xl border border-white/10">
                <h3 class="font-fragment text-xl sm:text-2xl uppercase tracking-[0.08em] text-center mb-8 text-[#d5a94e]">
                    Estimate Your Rebate
                </h3>

                <div class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.18em] text-white/50 mb-1.5 font-medium">Property Price ($)</label>
                            <input type="number"
                                   x-model="price"
                                   @input="calculate()"
                                   placeholder="1000000"
                                   class="w-full bg-[#06130d]/70 border border-white/20 rounded px-4 py-3 text-sm text-white focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.18em] text-white/50 mb-1.5 font-medium">Down Payment ($)</label>
                            <input type="number"
                                   x-model="downPayment"
                                   @input="calculate()"
                                   placeholder="200000"
                                   class="w-full bg-[#06130d]/70 border border-white/20 rounded px-4 py-3 text-sm text-white focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.18em] text-white/50 mb-1.5 font-medium">Commission Rate (%)</label>
                            <select x-model="commission"
                                    @change="calculate()"
                                    class="w-full bg-[#06130d]/70 border border-white/20 rounded px-4 py-3 text-sm text-white focus:outline-none focus:border-[#d5a94e]">
                                <option value="5">5.0% Standard</option>
                                <option value="4">4.0%</option>
                                <option value="3">3.0%</option>
                                <option value="2.5">2.5% Buyer Side</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.18em] text-white/50 mb-1.5 font-medium">Province / Location</label>
                            <select x-model="province"
                                    @change="calculate()"
                                    class="w-full bg-[#06130d]/70 border border-white/20 rounded px-4 py-3 text-sm text-white focus:outline-none focus:border-[#d5a94e]">
                                <option value="ON">Ontario (ON)</option>
                                <option value="BC">British Columbia (BC)</option>
                                <option value="AB">Alberta (AB)</option>
                                <option value="QC">Quebec (QC)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Range Slider -->
                    <div class="pt-2">
                        <div class="flex items-center justify-between text-[10px] uppercase tracking-wider text-white/60 mb-2">
                            <span>Rebate Percentage</span>
                            <span class="text-[#d5a94e] font-bold text-sm" x-text="rebatePct + '%'"></span>
                        </div>
                        <input type="range"
                               min="10" max="80" step="5"
                               x-model="rebatePct"
                               @input="calculate()"
                               class="w-full accent-[#d5a94e] cursor-pointer" />
                    </div>

                    <!-- Output Banner -->
                    <div class="border-t border-white/15 pt-6 mt-4 flex items-baseline justify-between">
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.18em] text-white/50">Estimated Rebate Return</p>
                            <p class="text-[11px] text-[#d5a94e] font-light">Subject to contract confirmation</p>
                        </div>
                        <p class="font-fragment text-3xl sm:text-4xl text-white"
                           x-text="'$' + Number(rebateAmount).toLocaleString('en-CA', { minimumFractionDigits: 2, maximumFractionDigits: 2 })">
                        </p>
                    </div>

                    <button type="button"
                            onclick="window.dispatchEvent(new CustomEvent('open-vip-modal', { detail: { title: 'Rebate Inquiries' } }))"
                            class="w-full btn-gold justify-center text-xs py-3.5 mt-4 cursor-pointer">
                        Lock In Your Rebate Allocation ↗
                    </button>
                </div>
            </div>

        </div>

    </section>

</x-layouts.app>
