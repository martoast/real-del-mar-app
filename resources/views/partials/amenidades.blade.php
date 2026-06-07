{{-- ============================== AMENIDADES (slider) ============================== --}}
@php
    $amenidades = [
        ['img' => 'rdm-am-golf.webp',        't_es' => 'Campo de golf',      't_en' => 'Golf course',     'd_es' => '8 hoyos con vistas espectaculares al mar.',            'd_en' => '8 holes with stunning sea views.'],
        ['img' => 'rdm-am-hipico.webp',      't_es' => 'Club hípico',        't_en' => 'Equestrian club',  'd_es' => 'Cabalgatas y espacios para disfrutar junto al mar.',   'd_en' => 'Spaces to enjoy horseback riding by the sea.'],
        ['img' => 'rdm-am-club.webp',        't_es' => 'Casa Club',          't_en' => 'Clubhouse',        'd_es' => 'Espacios sociales elegantes para convivir y relajarse.', 'd_en' => 'Elegant social spaces to gather and relax.'],
        ['img' => 'rdm-am-alberca.webp',     't_es' => 'Alberca',            't_en' => 'Pool',             'd_es' => 'Descanso y disfrute en un entorno privado.',           'd_en' => 'Rest and enjoyment in a private setting.'],
        ['img' => 'rdm-am-padel.webp',       't_es' => 'Pádel y Tenis',      't_en' => 'Padel & Tennis',   'd_es' => 'Energía y precisión en canchas privadas.',             'd_en' => 'Energy and precision on private courts.'],
        ['img' => 'rdm-am-parque.webp',      't_es' => 'Parque ecológico',   't_en' => 'Ecological park',  'd_es' => 'Áreas verdes para reconectar con la naturaleza.',      'd_en' => 'Green areas to connect with nature.'],
        ['img' => 'rdm-am-escuela.webp',     't_es' => 'Escuela privada',    't_en' => 'Private school',   'd_es' => 'Educación de primer nivel dentro del complejo.',       'd_en' => 'First-class education within the community.'],
        ['img' => 'rdm-am-restaurante.webp', 't_es' => 'Restaurante y bar',  't_en' => 'Restaurant & bar', 'd_es' => 'Gastronomía y coctelería con vistas incomparables.',   'd_en' => 'Cuisine and cocktails with incomparable views.'],
        ['img' => 'rdm-am-spa.jpg',          't_es' => 'Spa (próximamente)', 't_en' => 'Spa (coming soon)','d_es' => 'Bienestar y relajación en un entorno de lujo.',        'd_en' => 'Wellness and relaxation in a luxurious setting.'],
    ];
@endphp

<section id="amenidades" class="overflow-hidden bg-sand-100 py-24 lg:py-32"
    x-data="{ nudge(dir) { const t = $refs.track; const c = t.querySelector('[data-card]'); const amt = c ? c.offsetWidth + 24 : 380; t.scrollBy({ left: dir * amt, behavior: 'smooth' }); } }">

    {{-- Header + arrows --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="flex flex-col gap-8 md:flex-row md:items-end md:justify-between">
            <div class="reveal-group max-w-xl">
                <p class="eyebrow text-terra-500"><x-t><x-slot:es>Amenidades</x-slot:es><x-slot:en>Amenities</x-slot:en></x-t></p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                    <x-t>
                        <x-slot:es>Eleva tu <em>día a día</em></x-slot:es>
                        <x-slot:en>Elevate your <em>everyday</em></x-slot:en>
                    </x-t>
                </h2>
                <p class="mt-6 text-lg leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>Vivir en Candé significa tener acceso a las amenidades exclusivas de Real del Mar — un entorno diseñado para disfrutar, relajarse y mantenerse activo, siempre con el mar como telón de fondo.</x-slot:es>
                        <x-slot:en>Living in Candé means access to the exclusive amenities of Real del Mar — an environment designed to enjoy, relax, and stay active, always with the sea as a backdrop.</x-slot:en>
                    </x-t>
                </p>
            </div>

            {{-- Arrows --}}
            <div class="flex gap-3">
                <button @click="nudge(-1)" aria-label="Anterior"
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-ink/15 text-ink transition-colors hover:border-ink/40 hover:bg-ink hover:text-sand-50">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="nudge(1)" aria-label="Siguiente"
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-ink/15 text-ink transition-colors hover:border-ink/40 hover:bg-ink hover:text-sand-50">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Slider track (native scroll-snap; arrows nudge it) --}}
    <div x-ref="track"
        class="mt-14 flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth px-6 pb-2 lg:px-10 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        @foreach ($amenidades as $a)
            <article data-card class="group w-[78vw] shrink-0 snap-start sm:w-[340px] lg:w-[380px]">
                <div class="relative overflow-hidden rounded-2xl bg-ocean-950 shadow-lg shadow-ink/5">
                    <img src="{{ asset('images/' . $a['img']) }}" alt="{{ $a['t_es'] }}" loading="lazy"
                        class="aspect-[3/4] w-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/90 via-ocean-950/15 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-7">
                        <h3 class="display text-2xl text-sand-50"><span class="lang-es">{{ $a['t_es'] }}</span><span class="lang-en">{{ $a['t_en'] }}</span></h3>
                        <p class="mt-2 text-sm leading-relaxed text-sand-100/80"><span class="lang-es">{{ $a['d_es'] }}</span><span class="lang-en">{{ $a['d_en'] }}</span></p>
                    </div>
                </div>
            </article>
        @endforeach
        {{-- trailing spacer so the last card can rest with breathing room --}}
        <div class="w-2 shrink-0 lg:w-6" aria-hidden="true"></div>
    </div>
</section>
