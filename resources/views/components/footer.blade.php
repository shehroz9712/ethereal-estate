<!-- ══════════ FOOTER ══════════ -->
<footer class="bg-[#060e09] text-white pt-16 pb-12 px-6 sm:px-10 lg:px-16 border-t border-white/10">
    <div class="max-w-7xl mx-auto">

        <!-- Top grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 pb-12 border-b border-white/10">

            <!-- Col 1-2: Contact -->
            <div class="lg:col-span-2">
                <p class="text-[11px] uppercase tracking-[0.25em] text-[#d5a94e] font-semibold mb-3">Let's Talk</p>
                <a href="mailto:office@etherealestates.ca"
                   class="font-fragment text-2xl sm:text-3xl text-white hover:text-[#d5a94e] transition-colors block mb-6">
                    office@etherealestates.ca
                </a>
                <div class="text-xs text-white/60 font-light leading-relaxed mb-6 space-y-1">
                    <p>600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada</p>
                    <p>Telephone:
                        <a href="tel:+14373767611" class="text-white/85 hover:text-[#d5a94e] transition-colors font-normal">+1 437-376-7611</a>
                    </p>
                </div>
                <!-- Social pills -->
                <div class="flex flex-wrap gap-2">
                    @foreach (['Instagram','Twitter','Youtube','Behance','LinkedIn'] as $social)
                        <a href="#"
                           class="px-4 py-1.5 rounded-full border border-white/20 text-[10px] uppercase tracking-[0.14em] text-white/70 hover:border-[#d5a94e] hover:text-[#d5a94e] transition-colors">
                            {{ $social }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Col 3: Discover More -->
            <div>
                <h3 class="font-fragment text-base uppercase tracking-[0.12em] text-white mb-5">Discover More</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    <li><a href="{{ route('about') }}" class="hover:text-[#d5a94e] transition-colors">About Us</a></li>
                    <li><a href="{{ route('pre-construction') }}" class="hover:text-[#d5a94e] transition-colors">Pre-Construction</a></li>
                    <li><a href="{{ route('properties.index') }}" class="hover:text-[#d5a94e] transition-colors">Featured Properties</a></li>
                    <li><a href="{{ route('genius') }}" class="hover:text-[#d5a94e] transition-colors">Genius Experience</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-[#d5a94e] transition-colors">Ethereal Edit</a></li>
                </ul>
            </div>

            <!-- Col 4: Quick Links -->
            <div>
                <h3 class="font-fragment text-base uppercase tracking-[0.12em] text-white mb-5">Quick Links</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    <li><a href="{{ route('our-story') }}" class="hover:text-[#d5a94e] transition-colors">Our Story</a></li>
                    <li><a href="{{ route('rebate-calculator') }}" class="hover:text-[#d5a94e] transition-colors">Rebate Calculator</a></li>
                    <li><a href="{{ route('join-ethereal') }}" class="hover:text-[#d5a94e] transition-colors">Join Ethereal</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-[#d5a94e] transition-colors">Contact Advisory</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="hover:text-[#d5a94e] transition-colors">Client Portal Sign In</a></li>
                    @else
                        <li><a href="{{ route('user.dashboard') }}" class="hover:text-[#d5a94e] transition-colors">Client Dashboard</a></li>
                    @endguest
                </ul>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-white/40 tracking-[0.12em] uppercase">
            <p>&copy; 2026 Ethereal Estates. All rights reserved.</p>
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="hover:text-[#d5a94e] transition-colors">Home</a>
                <a href="{{ route('properties.index') }}" class="hover:text-[#d5a94e] transition-colors">Properties</a>
                <a href="{{ route('about') }}" class="hover:text-[#d5a94e] transition-colors">About</a>
                <a href="{{ route('contact') }}" class="hover:text-[#d5a94e] transition-colors">Contact</a>
            </div>
        </div>

    </div>
</footer>
