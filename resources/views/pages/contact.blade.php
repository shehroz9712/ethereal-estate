<x-layouts.app activePage="contact" title="Contact Advisory — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[340px] sm:h-[400px] rounded-2xl overflow-hidden shadow-2xl bg-gray-900 flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/contact-hero.jpg') }}" alt="Contact Ethereal Estates" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <h1 class="font-fragment text-white text-3xl sm:text-5xl uppercase tracking-[0.06em] leading-tight mb-3">
                    Let's Start The Conversation
                </h1>
                <p class="text-white/85 text-xs sm:text-sm md:text-base font-light tracking-wide leading-relaxed">
                    Whether you're buying, selling, investing, or exploring pre-construction opportunities across Ontario.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ INTRO & FORM SECTION (matches Figma Contact Us.png) ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
            
            <!-- Left Narrative -->
            <div>
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block mb-3">
                    Personalized Advisory
                </span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase leading-[1.1] tracking-[0.03em] text-gray-900 mb-6">
                    Every Good Decision Starts Here.
                </h2>
                <div class="gold-line"></div>
                <p class="text-sm font-light text-gray-600 leading-relaxed mb-6">
                    Every real estate decision begins with understanding what you are trying to achieve. Our team takes the time to listen, answer the questions that matter, and help you determine the right next step. Whether you are buying, selling, or considering a pre-construction allocation, the conversation starts here.
                </p>
                <div class="p-6 rounded-xl bg-[#fdfaf4] border border-gray-200 text-xs text-gray-600 space-y-2">
                    <p class="font-semibold uppercase tracking-wider text-gray-900 mb-1">Direct Communications</p>
                    <p>Phone: <a href="tel:+14373767611" class="text-gray-900 hover:text-[#d5a94e] font-medium">+1 437-376-7611</a></p>
                    <p>Email: <a href="mailto:office@etherealestates.ca" class="text-gray-900 hover:text-[#d5a94e] font-medium">office@etherealestates.ca</a></p>
                    <p>Hours: Monday &ndash; Saturday, 9:00 AM &ndash; 7:00 PM EST</p>
                </div>
            </div>

            <!-- Right Form: TELL US WHAT YOU'RE LOOKING FOR -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 sm:p-10 shadow-lg">
                <h3 class="font-fragment text-xl sm:text-2xl uppercase tracking-[0.04em] text-gray-900 mb-2">
                    Tell Us What You're Looking For.
                </h3>
                <p class="text-xs text-gray-500 font-light mb-8">
                    Complete the form below and an Ethereal Estates advisor will connect with you promptly.
                </p>

                <form action="{{ route('inquiries.contact') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">First Name *</label>
                            <input type="text" name="first_name" required placeholder="First Name" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Last Name</label>
                            <input type="text" name="last_name" placeholder="Last Name" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Phone Number *</label>
                            <input type="tel" name="phone" required placeholder="+1 (---) --- ----" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Postal Code</label>
                            <input type="text" name="postal_code" placeholder="Postal Code" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Email Address *</label>
                        <input type="email" name="email" required placeholder="name@domain.com" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white" />
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Message</label>
                        <textarea name="message" rows="4" placeholder="How can we assist your real estate journey?" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full btn-gold justify-center text-xs py-3.5 mt-2 cursor-pointer">
                        Submit Message ↗
                    </button>
                </form>
            </div>

        </div>
    </section>

    <!-- ═══════════ GENERAL ENQUIRIES + AGENT PHOTO (matches Figma Contact Us.png) ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-20 bg-[#fdfaf4] border-t border-gray-200">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <h3 class="font-fragment text-2xl sm:text-3xl uppercase tracking-[0.04em] text-gray-900 mb-8">General Enquiries</h3>
                <div class="space-y-6 divide-y divide-gray-200">
                    <div class="pt-4 first:pt-0 grid grid-cols-[140px_1fr] gap-4">
                        <p class="font-fragment text-sm uppercase text-gray-900">Head Office</p>
                        <div class="text-xs text-gray-600 font-light space-y-1">
                            <p>600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada</p>
                            <p>Phone: <a href="tel:+14373767611" class="hover:text-[#d5a94e] font-medium">+1 437-376-7611</a></p>
                            <p>Email: <a href="mailto:office@etherealestates.ca" class="hover:text-[#d5a94e] font-medium">office@etherealestates.ca</a></p>
                        </div>
                    </div>
                    <div class="pt-6 grid grid-cols-[140px_1fr] gap-4">
                        <p class="font-fragment text-sm uppercase text-gray-900">Sales Advisory</p>
                        <div class="text-xs text-gray-600 font-light space-y-1">
                            <p>Phone: <a href="tel:+14373767611" class="hover:text-[#d5a94e] font-medium">+1 437-376-7611</a></p>
                            <p>Dedicated Pre-Construction &amp; Resale Advisory Across Greater Ontario</p>
                        </div>
                    </div>
                    <div class="pt-6 grid grid-cols-[140px_1fr] gap-4">
                        <p class="font-fragment text-sm uppercase text-gray-900">Design Studio</p>
                        <div class="text-xs text-gray-600 font-light space-y-1">
                            <p>600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1</p>
                            <p>Available by appointment for custom finishes, elevation reviews, and lot selection</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end">
                <div class="rounded-2xl overflow-hidden shadow-2xl aspect-[3/4] max-w-sm w-full bg-gray-100">
                    <img src="{{ asset('assets/images/contact-agent.jpg') }}" alt="Ethereal Advisor" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
