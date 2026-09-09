<x-layouts.app :navDark="true" activePage="home" title="Ethereal Estates — Invest in Tomorrow's Address" :hideFooter="true" bodyClass="overflow-hidden h-screen bg-black">

    <!-- ═══════════ HERO — FULL-SCREEN VIDEO ONLY + TRANSPARENT CATEGORIES ═══════════ -->
    <section class="relative h-[100dvh] w-full overflow-hidden bg-black text-white select-none"
             x-data="{
                 activeIdx: 0,
                 translateX: 0,
                 items: [
                     { label: 'MLS Listings', url: '{{ route('properties.index') }}' },
                     { label: 'Pre-Construction', url: '{{ route('pre-construction') }}' },
                     { label: 'Featured by Ethereal', url: '{{ route('properties.index') }}' }
                 ],
                 wheelTimeout: null,
                 touchStartX: 0,
                 touchEndX: 0,
                 init() {
                     this.$nextTick(() => { this.centerActive(); });
                     window.addEventListener('resize', () => { this.centerActive(); }, { passive: true });
                     this.$watch('activeIdx', () => { this.centerActive(); });
                 },
                 centerActive() {
                     const activeEl = this.$refs['item_' + this.activeIdx];
                     const container = this.$refs.viewport;
                     if (activeEl && container) {
                         const containerCenter = container.offsetWidth / 2;
                         const itemCenter = activeEl.offsetLeft + (activeEl.offsetWidth / 2);
                         this.translateX = containerCenter - itemCenter;
                     }
                 },
                 selectItem(idx) {
                     if (this.activeIdx === idx) {
                         window.location.href = this.items[idx].url;
                     } else {
                         this.activeIdx = idx;
                     }
                 },
                 onWheel(e) {
                     if (this.wheelTimeout) return;
                     if (e.deltaY > 20 || e.deltaX > 20) {
                         if (this.activeIdx < this.items.length - 1) {
                             this.activeIdx++;
                             this.wheelTimeout = setTimeout(() => { this.wheelTimeout = null; }, 350);
                         }
                     } else if (e.deltaY < -20 || e.deltaX < -20) {
                         if (this.activeIdx > 0) {
                             this.activeIdx--;
                             this.wheelTimeout = setTimeout(() => { this.wheelTimeout = null; }, 350);
                         }
                     }
                 },
                 onTouchStart(e) {
                     this.touchStartX = e.touches[0].clientX;
                 },
                 onTouchMove(e) {
                     this.touchEndX = e.touches[0].clientX;
                 },
                 onTouchEnd() {
                     let diff = this.touchStartX - this.touchEndX;
                     if (Math.abs(diff) > 40) {
                         if (diff > 0 && this.activeIdx < this.items.length - 1) {
                             this.activeIdx++;
                         } else if (diff < 0 && this.activeIdx > 0) {
                             this.activeIdx--;
                         }
                     }
                 }
             }"
             @wheel.passive="onWheel($event)"
             @touchstart="onTouchStart($event)"
             @touchmove="onTouchMove($event)"
             @touchend="onTouchEnd()">

        <!-- Background Video (Clean, full-screen) -->
        <video class="absolute inset-0 h-full w-full object-cover pointer-events-none"
               autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('assets/video/hero.mp4') }}" type="video/mp4">
        </video>

        <!-- Subtle Mood Vignette -->
        <div class="absolute inset-0 bg-black/35 pointer-events-none"></div>
        <div class="absolute inset-x-0 bottom-0 h-72 bg-gradient-to-t from-black/85 via-black/40 to-transparent pointer-events-none"></div>
        <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/50 to-transparent pointer-events-none"></div>

        <!-- ═══════════ HORIZONTAL PROPERTY CATEGORIES (TRANSPARENT TRACK OVER BOTTOM OF VIDEO) ═══════════ -->
        <div class="absolute bottom-12 sm:bottom-20 inset-x-0 z-20 overflow-hidden" x-ref="viewport">
            
            <!-- Category Carousel Track (One horizontal line of three labels, no numbering or descriptive text) -->
            <div class="flex items-center transition-transform duration-700 ease-out whitespace-nowrap gap-12 sm:gap-20 md:gap-28 w-max will-change-transform"
                 :style="'transform: translateX(' + translateX + 'px)'"
                 x-ref="track">
                
                <template x-for="(item, idx) in items" :key="idx">
                    <button type="button"
                            :x-ref="'item_' + idx"
                            @click="selectItem(idx)"
                            class="transition-all duration-700 ease-out cursor-pointer focus:outline-none select-none py-2 px-3 group"
                            :class="{
                                'scale-100 opacity-100 z-30': activeIdx === idx,
                                'scale-70 opacity-35 hover:opacity-65 z-20': Math.abs(activeIdx - idx) === 1,
                                'scale-55 opacity-20 hover:opacity-45 z-10': Math.abs(activeIdx - idx) === 2
                            }">
                        <span class="font-fragment uppercase tracking-[0.04em] block transition-all duration-700 leading-tight"
                              :class="{
                                  'text-3xl sm:text-5xl md:text-6xl text-white drop-shadow-2xl': activeIdx === idx,
                                  'text-2xl sm:text-4xl md:text-5xl text-white/70': activeIdx !== idx
                              }"
                              x-text="item.label">
                        </span>
                    </button>
                </template>

            </div>

        </div>

    </section>

</x-layouts.app>
