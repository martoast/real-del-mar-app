{{-- ============================== HERO ============================== --}}
<section class="grain relative flex min-h-svh items-end overflow-hidden bg-ocean-950">
    {{-- Backdrop --}}
    <div class="absolute inset-0">
        <video
            class="h-full w-full object-cover"
            autoplay
            loop
            muted
            playsinline
            poster="{{ asset('images/hero-poster.jpg') }}"
        >
            <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
        </video>
        {{-- Subtle readability gradient — keep the video the star --}}
        <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/70 via-transparent to-ocean-950/20"></div>
    </div>

    {{-- Copy — one quiet line, let the video do the talking --}}
    <div class="relative mx-auto w-full max-w-7xl px-6 pb-12 lg:px-10 lg:pb-16">
        <div class="reveal-group is-revealed max-w-3xl">
            <p class="eyebrow mb-5 text-sand-200/90">Rosarito · Baja California</p>
            <h1 class="display text-4xl font-light text-sand-50 drop-shadow-[0_2px_24px_rgba(10,26,38,0.55)] sm:text-5xl lg:text-6xl">
                Donde el Pacífico <em>se convierte</em> en hogar
            </h1>
        </div>
    </div>

    {{-- Scroll cue --}}
    <a href="#esencia"
       class="group absolute bottom-8 left-1/2 z-10 flex -translate-x-1/2 flex-col items-center gap-2"
       aria-label="Bajar">
        <span class="eyebrow text-[0.55rem] text-sand-100/70">Descubrir</span>
        <svg class="h-5 w-5 animate-bounce text-sand-100/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </a>
</section>
