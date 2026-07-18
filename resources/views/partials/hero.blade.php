{{-- ============================== HERO ============================== --}}
<section class="grain relative flex min-h-svh items-end justify-center overflow-hidden bg-ocean-950">
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
    {{-- Copy — bottom-centered, like the Riviera hero --}}
    <div class="reveal-group is-revealed relative z-10 mx-auto w-full max-w-5xl px-6 pb-32 text-center sm:pb-20">
        {{-- Logo de Candé, centrado sobre el eyebrow --}}
        <img src="{{ asset('images/cande-logo.png') }}" alt="Candé at Real del Mar"
            class="mx-auto mb-7 h-16 w-auto drop-shadow-[0_2px_24px_rgba(2,22,55,0.55)] sm:h-20">
        <p class="eyebrow text-terra-300 drop-shadow-[0_2px_24px_rgba(10,26,38,0.55)]"><x-t><x-slot:es>Exclusividad</x-slot:es><x-slot:en>Exclusivity</x-slot:en></x-t></p>
        <h1 class="display mt-5 text-4xl font-light text-sand-50 drop-shadow-[0_2px_24px_rgba(10,26,38,0.55)] sm:text-5xl lg:text-6xl">
            <x-t>
                <x-slot:es>Sólo 37 residencias y <em>54 departamentos</em></x-slot:es>
                <x-slot:en>Only 37 homes and <em>54 apartments</em></x-slot:en>
            </x-t>
        </h1>
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
