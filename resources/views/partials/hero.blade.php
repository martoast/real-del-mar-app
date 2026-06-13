{{-- ============================== HERO ============================== --}}
<section class="grain relative flex min-h-svh items-end overflow-hidden bg-ocean-950">
    {{-- Backdrop --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/hero-cande.jpg') }}"
            alt="Casa Candé en Real del Mar"
            class="h-full w-full object-cover object-bottom lg:object-[center_60%]"
            fetchpriority="high"
        >
        {{-- Subtle readability gradient — keep the image the star --}}
        <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/70 via-transparent to-ocean-950/20"></div>
    </div>

    {{-- Copy — one quiet line, let the video do the talking --}}
    <div class="relative mx-auto w-full max-w-7xl px-6 pb-28 text-center lg:px-10 lg:pb-16 lg:text-left">
        <div class="reveal-group is-revealed mx-auto max-w-3xl lg:mx-0">
            <h1 class="display text-4xl font-light text-sand-50 drop-shadow-[0_2px_24px_rgba(10,26,38,0.55)] sm:text-5xl lg:text-6xl">
                <x-t>
                    <x-slot:es>Donde el Pacífico <em>se convierte</em> en hogar</x-slot:es>
                    <x-slot:en>Where the Pacific <em>becomes</em> home</x-slot:en>
                </x-t>
            </h1>
        </div>
    </div>

    {{-- Scroll cue (arrow only) --}}
    <a href="#esencia"
       class="absolute bottom-8 left-1/2 z-10 -translate-x-1/2"
       aria-label="Bajar">
        <svg class="h-6 w-6 animate-bounce text-sand-100/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </a>
</section>
