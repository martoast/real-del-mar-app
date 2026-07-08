{{-- ============================== VIDEO BANNER ============================== --}}
<section class="relative h-[70vh] min-h-[28rem] w-full overflow-hidden bg-ocean-950">
    {{-- Background video --}}
    <video
        class="absolute inset-0 h-full w-full object-cover"
        autoplay
        loop
        muted
        playsinline
        poster="{{ asset('images/casa-cande-poster.jpg') }}"
    >
        <source src="{{ asset('videos/casa-cande.mp4') }}" type="video/mp4">
    </video>

    {{-- Darkening overlay for text legibility --}}
    <div class="absolute inset-0 bg-ocean-950/40"></div>

    {{-- Centered copy --}}
    <div class="relative flex h-full items-center justify-center px-6 text-center">
        <div class="reveal-group">
            <p class="eyebrow text-sand-200/90">Casas Candé</p>
            <h2 class="display mt-5 text-4xl font-light text-sand-50 sm:text-6xl lg:text-7xl">
                <x-t>
                    <x-slot:es>Donde la arquitectura<br><em>abraza el mar</em></x-slot:es>
                    <x-slot:en>Where architecture<br><em>embraces the sea</em></x-slot:en>
                </x-t>
            </h2>
        </div>
    </div>
</section>
