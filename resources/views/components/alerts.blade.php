@if(session('success') || session('error') || session('info') || $errors->any())
<div class="fixed top-24 right-6 z-50 max-w-md w-full space-y-3 pointer-events-none"
     x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, 7000)">

    @if(session('success'))
        <div class="pointer-events-auto flex items-start gap-3 p-4 bg-[#06130d] text-white rounded-lg border border-[#d5a94e] shadow-2xl backdrop-blur-md">
            <span class="text-[#d5a94e] text-lg mt-0.5">✓</span>
            <div class="flex-1 text-xs leading-relaxed">
                <p class="font-semibold uppercase tracking-wider text-[#d5a94e] mb-0.5">Success</p>
                <p class="text-white/90 font-light">{{ session('success') }}</p>
            </div>
            <button type="button" @click="show = false" class="text-white/50 hover:text-white text-sm">✕</button>
        </div>
    @endif

    @if(session('error'))
        <div class="pointer-events-auto flex items-start gap-3 p-4 bg-red-950/90 text-white rounded-lg border border-red-500 shadow-2xl backdrop-blur-md">
            <span class="text-red-400 text-lg mt-0.5">⚠</span>
            <div class="flex-1 text-xs leading-relaxed">
                <p class="font-semibold uppercase tracking-wider text-red-300 mb-0.5">Error</p>
                <p class="text-white/90 font-light">{{ session('error') }}</p>
            </div>
            <button type="button" @click="show = false" class="text-white/50 hover:text-white text-sm">✕</button>
        </div>
    @endif

    @if(session('info'))
        <div class="pointer-events-auto flex items-start gap-3 p-4 bg-[#1a2e1e] text-white rounded-lg border border-white/20 shadow-2xl backdrop-blur-md">
            <span class="text-[#d5a94e] text-lg mt-0.5">ℹ</span>
            <div class="flex-1 text-xs leading-relaxed">
                <p class="font-semibold uppercase tracking-wider text-white mb-0.5">Notice</p>
                <p class="text-white/80 font-light">{{ session('info') }}</p>
            </div>
            <button type="button" @click="show = false" class="text-white/50 hover:text-white text-sm">✕</button>
        </div>
    @endif

    @if($errors->any())
        <div class="pointer-events-auto flex items-start gap-3 p-4 bg-red-950/95 text-white rounded-lg border border-red-400 shadow-2xl">
            <span class="text-red-400 text-lg mt-0.5">⚠</span>
            <div class="flex-1 text-xs">
                <p class="font-semibold uppercase tracking-wider text-red-300 mb-1">Please correct the following:</p>
                <ul class="list-disc list-inside space-y-0.5 text-white/80 font-light">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" @click="show = false" class="text-white/50 hover:text-white text-sm">✕</button>
        </div>
    @endif

</div>
@endif
