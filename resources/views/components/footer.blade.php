<!-- ══════════ FOOTER ══════════ -->
<footer class="bg-[#060e09] text-white pt-16 pb-12 px-6 sm:px-10 lg:px-16 border-t border-white/10">
    <div class="max-w-7xl mx-auto">

        <!-- Top grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pb-14 border-b border-white/10">

            <!-- Col 1: Contact (spans 6 cols) -->
            <div class="lg:col-span-6 space-y-5">
                <p class="text-[12px] tracking-[0.25em] text-[#c5983e] font-serif italic">Let's Talk</p>
                <a href="mailto:office@etherealestates.ca"
                   class="font-fragment text-2xl sm:text-3xl lg:text-[34px] text-white hover:text-[#c5983e] transition-colors block leading-none">
                    office@etherealestates.ca
                </a>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-xs text-white/60 font-light pt-2">
                    <p>600 Matheson Blvd W Unit 5<br/>Mississauga, ON L5R 4C1, Canada</p>
                    <div>
                        <span class="text-white/40">Telephone:</span>
                        <a href="tel:+14373767611" class="text-white/85 hover:text-[#c5983e] transition-colors ml-1 font-normal">+1 437 376 7611</a>
                    </div>
                </div>

                <!-- Social pills -->
                <div class="flex flex-wrap gap-2.5 pt-3">
                    @foreach (['Instagram', 'Twitter', 'Youtube', 'Behance', 'Linkedin'] as $social)
                        <a href="#"
                           class="px-4 py-1.5 rounded-full border border-white/25 text-[11px] font-normal tracking-wide text-white/80 hover:border-[#c5983e] hover:text-[#c5983e] transition-colors">
                            {{ $social }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Col 2: Discover More (spans 3 cols) -->
            <div class="lg:col-span-3">
                <h3 class="font-fragment text-base uppercase tracking-[0.12em] text-white mb-5">Discover More</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    <li><a href="{{ route('our-story') }}" class="hover:text-[#c5983e] transition-colors">Our Story</a></li>
                    <li><a href="{{ route('pre-construction') }}" class="hover:text-[#c5983e] transition-colors">Communities</a></li>
                    <li><a href="{{ route('genius') }}" class="hover:text-[#c5983e] transition-colors">Genius</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-[#c5983e] transition-colors">News</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-[#c5983e] transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Col 3: Quick Links (spans 3 cols) -->
            <div class="lg:col-span-3">
                <h3 class="font-fragment text-base uppercase tracking-[0.12em] text-white mb-5">Quick Links</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    <li><a href="#" class="hover:text-[#c5983e] transition-colors">GT USA</a></li>
                    <li><a href="#" class="hover:text-[#c5983e] transition-colors">Sitemap</a></li>
                    <li><a href="#" class="hover:text-[#c5983e] transition-colors">Terms and Conditions</a></li>
                    <li><a href="#" class="hover:text-[#c5983e] transition-colors">Privacy Policy</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="pt-8 text-xs text-white/40 font-light tracking-wide">
            <p>&copy; 2026 Ethereal. All rights reserved</p>
        </div>

    </div>
</footer>
