<x-layouts.app activePage="contact" title="Contact Us — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[360px] sm:h-[420px] lg:h-[460px] rounded-2xl overflow-hidden shadow-2xl bg-[#09150e] flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/contact-hero.jpg') }}"
                 alt="Contact Ethereal Estates"
                 class="absolute inset-0 w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-b from-black/25 via-black/35 to-black/55 pointer-events-none"></div>

            <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center">
                <span class="block w-10 h-[1.5px] bg-[#c5983e] mb-4"></span>
                <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-[44px] uppercase tracking-[0.06em] leading-tight mb-3">
                    EVERY GOOD DECISION STARTS HERE.
                </h1>
                <p class="text-white/85 text-xs sm:text-sm md:text-base font-light tracking-wide leading-relaxed max-w-xl">
                    Every real estate decision begins with understanding what you are trying to achieve.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ SECTION 2: INTRO & FORM ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white relative overflow-hidden">
        <!-- Blueprint wireframe in background on left -->
        <div class="absolute left-[-100px] lg:left-[-40px] top-6 w-[440px] sm:w-[520px] pointer-events-none select-none opacity-[0.16] z-0">
            <img src="{{ asset('assets/images/about/Group.png') }}" alt="Blueprint Wireframe" class="w-full h-auto filter contrast-125" />
        </div>

        <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[45%_55%] gap-12 lg:gap-16 items-start">
            
            <!-- Left: Headline (Form Heading) -->
            <div>
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block mb-3">Contact Our Advisory</span>
                <h2 class="font-fragment text-2xl sm:text-3xl lg:text-[38px] uppercase leading-[1.14] tracking-[0.03em] text-[#111] max-w-md">
                    TELL US WHAT<br />
                    YOU’RE LOOKING FOR.
                </h2>
                <div class="gold-line mt-4"></div>
            </div>

            <!-- Right: Intro Text & Form -->
            <div class="space-y-8">
                <p class="text-sm font-light text-gray-600 leading-relaxed">
                    Every real estate decision begins with understanding what you are trying to achieve. Our team takes the time to listen, answer the questions that matter and help you determine the right next step. Whether you are buying, selling or considering an opportunity, the conversation starts here.
                </p>

                <form action="{{ route('inquiries.contact') }}" method="POST" class="space-y-6 pt-2">
                    @csrf
                    
                    <!-- Row 1: First Name & Last Name -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                                FIRST NAME<span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="first_name"
                                   required
                                   class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors" />
                        </div>
                        <div>
                            <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                                LAST NAME<span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="last_name"
                                   required
                                   class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors" />
                        </div>
                    </div>

                    <!-- Row 2: Telephone & Postal Code -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                                TELEPHONE<span class="text-red-500">*</span>
                            </label>
                            <input type="tel"
                                   name="phone"
                                   required
                                   class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors" />
                        </div>
                        <div>
                            <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                                POSTAL CODE<span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="postal_code"
                                   required
                                   class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors" />
                        </div>
                    </div>

                    <!-- Row 3: Email Address & Confirm Email -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                                EMAIL ADDRESS<span class="text-red-500">*</span>
                            </label>
                            <input type="email"
                                   name="email"
                                   required
                                   class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors" />
                        </div>
                        <div>
                            <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                                CONFIRM EMAIL<span class="text-red-500">*</span>
                            </label>
                            <input type="email"
                                   name="confirm_email"
                                   required
                                   class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors" />
                        </div>
                    </div>

                    <!-- Row 4: Message -->
                    <div>
                        <label class="block text-[10px] tracking-[0.2em] uppercase font-semibold text-gray-500 mb-1">
                            MESSAGE
                        </label>
                        <textarea name="message"
                                  rows="3"
                                  class="w-full bg-transparent border-b border-gray-300 focus:border-[#c5983e] pb-2 pt-1 text-xs text-gray-900 outline-none transition-colors resize-none"></textarea>
                    </div>

                    <!-- Action Button: Pill Shape -->
                    <div class="pt-2">
                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-full bg-[#c5983e] hover:bg-[#b08432] text-white text-[11px] uppercase tracking-[0.18em] font-semibold px-9 py-3.5 transition-colors shadow-sm cursor-pointer">
                            Submit Message ↗
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- ═══════════ SECTION 3: GENERAL ENQUIRIES + ADVISOR PHOTO ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-[#faf8f5] relative overflow-hidden border-t border-gray-100">
        <!-- Blueprint wireframe in background on left -->
        <div class="absolute left-[-60px] bottom-4 w-[460px] pointer-events-none select-none opacity-[0.12] z-0">
            <img src="{{ asset('assets/images/about/Group.png') }}" alt="Blueprint Wireframe" class="w-full h-auto filter contrast-125" />
        </div>

        <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left: Enquiry Categories -->
            <div>
                <h2 class="font-fragment text-2xl sm:text-3xl lg:text-[34px] uppercase tracking-[0.06em] text-gray-900 mb-10 text-center lg:text-left">
                    GENERAL ENQUIRIES
                </h2>

                <div class="space-y-0 divide-y divide-gray-200">
                    <!-- Head Office -->
                    <div class="py-6 grid grid-cols-1 sm:grid-cols-[140px_1fr] gap-3 sm:gap-6 items-start">
                        <p class="font-fragment text-sm uppercase tracking-wide text-gray-900">Head Office</p>
                        <div class="text-xs font-light text-gray-600 space-y-1 leading-relaxed">
                            <p>600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada</p>
                            <p>Phone: <a href="tel:+14373767611" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">+1 437-376-7611</a></p>
                            <p>Email: <a href="mailto:office@etherealestates.ca" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">office@etherealestates.ca</a></p>
                        </div>
                    </div>

                    <!-- Sales Team -->
                    <div class="py-6 grid grid-cols-1 sm:grid-cols-[140px_1fr] gap-3 sm:gap-6 items-start">
                        <p class="font-fragment text-sm uppercase tracking-wide text-gray-900">Sales Team</p>
                        <div class="text-xs font-light text-gray-600 space-y-1 leading-relaxed">
                            <p>Phone: <a href="tel:4169875500" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">(416) 987-5500</a></p>
                        </div>
                    </div>

                    <!-- Design Studio -->
                    <div class="py-6 grid grid-cols-1 sm:grid-cols-[140px_1fr] gap-3 sm:gap-6 items-start">
                        <p class="font-fragment text-sm uppercase tracking-wide text-gray-900">Design Studio</p>
                        <div class="text-xs font-light text-gray-600 space-y-1 leading-relaxed">
                            <p>600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada</p>
                            <p>Phone: <a href="tel:+14373767611" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">+1 437-376-7611</a></p>
                            <p>Email: <a href="mailto:office@etherealestates.ca" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">office@etherealestates.ca</a></p>
                        </div>
                    </div>

                    <!-- Customer Care -->
                    <div class="py-6 grid grid-cols-1 sm:grid-cols-[140px_1fr] gap-3 sm:gap-6 items-start">
                        <p class="font-fragment text-sm uppercase tracking-wide text-gray-900">Customer Care</p>
                        <div class="text-xs font-light text-gray-600 space-y-1 leading-relaxed">
                            <p>Phone: <a href="tel:+14373767611" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">+1 437-376-7611</a></p>
                            <p>Email: <a href="mailto:office@etherealestates.ca" class="hover:text-[#c5983e] font-normal text-gray-800 transition-colors">office@etherealestates.ca</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Real Team / Office Advisory Photography per specification -->
            <div class="w-full flex justify-center lg:justify-end">
                <div class="rounded-2xl overflow-hidden shadow-xl aspect-[3/4] w-full max-w-[440px] bg-[#09150e]">
                    <img src="{{ asset('assets/images/about/Group 1686565521.png') }}"
                         onerror="this.src='{{ asset('assets/images/founder-nakul.jpg') }}'"
                         alt="Ethereal Estates Advisory Team"
                         class="w-full h-full object-cover object-center" />
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 4: OUR LOCATION (MAP + BLUEPRINT) ═══════════ -->
    <section class="w-full overflow-hidden border-t border-gray-100">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-stretch">
            <!-- Left Half: Full Bleed Map Image -->
            <div class="relative w-full h-[380px] sm:h-[460px] lg:h-[500px] overflow-hidden bg-gray-100">
                <img src="{{ asset('assets/images/contact-map.jpg') }}"
                     alt="Ethereal Estates Office Map Location"
                     class="w-full h-full object-cover" />
            </div>

            <!-- Right Half: Location Details with Blueprint Wireframe Background -->
            <div class="relative w-full h-[380px] sm:h-[460px] lg:h-[500px] bg-white flex flex-col items-center justify-center text-center p-8 sm:p-12 overflow-hidden">
                <!-- Blueprint wireframe in background -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none opacity-[0.24]">
                    <img src="{{ asset('assets/images/about/Group.png') }}"
                         alt="Architectural Wireframe"
                         class="w-[520px] sm:w-[600px] max-w-none filter contrast-125" />
                </div>

                <!-- Content Centered -->
                <div class="relative z-10 max-w-md px-4">
                    <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[42px] uppercase tracking-[0.06em] text-gray-900 mb-4">
                        OUR LOCATION
                    </h2>
                    <p class="text-xs sm:text-sm font-light text-gray-600 leading-relaxed">
                        600 Matheson Blvd W Unit 5, Mississauga, ON L5R 4C1, Canada
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
