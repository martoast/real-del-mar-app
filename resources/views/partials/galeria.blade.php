{{-- ============================== GALERÍA (dual-row marquee + slideshow lightbox) ============================== --}}
@php
    // Row 1 — interiores (casas + departamentos). Row 2 — exteriores & comunidad.
    $rowCasas = [
        ['img' => 'rdm-casa-sala.jpg', 'alt' => 'Sala de casa Candé'],
        ['img' => 'rdm-casa-comedor.jpg', 'alt' => 'Comedor con vista al mar'],
        ['img' => 'rdm-depto-a-sala.jpg', 'alt' => 'Sala y comedor del Departamento A'],
        ['img' => 'rdm-casa-recamara.jpg', 'alt' => 'Recámara principal'],
        ['img' => 'rdm-depto-b-sala.jpg', 'alt' => 'Sala y comedor del Departamento B'],
        ['img' => 'rdm-casa-barra.jpg', 'alt' => 'Barra y bar de casa Candé'],
        ['img' => 'rdm-depto-a-terraza.jpg', 'alt' => 'Terraza frente al Pacífico'],
    ];
    $rowComunidad = [
        ['img' => 'rdm-casa-fachada.jpg', 'alt' => 'Fachada de casa Candé al atardecer'],
        ['img' => 'rdm-casa-esquina.jpg', 'alt' => 'Casas Candé en esquina'],
        ['img' => 'rdm-casas-aerea.jpg', 'alt' => 'Vista aérea de las casas'],
        ['img' => 'rdm-edificios-golf.jpg', 'alt' => 'Torres sobre el campo de golf'],
        ['img' => 'rdm-torres-sunset.jpg', 'alt' => 'Torres al atardecer'],
        ['img' => 'rdm-caseta.jpg', 'alt' => 'Acceso y caseta de seguridad'],
        ['img' => 'rdm-masterplan.jpg', 'alt' => 'Vista aérea de Real del Mar'],
    ];

    // Flat, ordered list shared by the lightbox slideshow. Each gallery
    // button opens at its index in this list (both marquee copies map to it).
    $casasCount = count($rowCasas);
    $lightbox = array_map(
        fn ($i) => ['src' => asset('images/' . $i['img']), 'alt' => $i['alt']],
        array_merge($rowCasas, $rowComunidad),
    );
@endphp

<section
    id="galeria"
    class="overflow-hidden bg-ocean-950 py-24 lg:py-32"
    x-data="{
        items: @js($lightbox),
        i: 0,
        open: false,
        openAt(idx) { this.i = idx; this.open = true; },
        next() { this.i = (this.i + 1) % this.items.length; },
        prev() { this.i = (this.i - 1 + this.items.length) % this.items.length; },
    }"
>
    {{-- Header (constrained) --}}
    <div class="mx-auto mb-14 max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-terra-300"><x-t><x-slot:es>Galería</x-slot:es><x-slot:en>Gallery</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-sand-50 sm:text-5xl">
                <x-t>
                    <x-slot:es>Espacios que <em>se sienten</em></x-slot:es>
                    <x-slot:en>Spaces you <em>can feel</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mt-6 text-lg leading-relaxed text-sand-100/70">
                <x-t>
                    <x-slot:es>Real del Mar es un desarrollo integral frente al Pacífico que ofrece un estilo de vida exclusivo en un entorno natural privilegiado. Combina arquitectura contemporánea, planeación urbana de calidad y una comunidad completa con residencias de alto nivel, áreas verdes y servicios educativos, deportivos y de hospitalidad.</x-slot:es>
                    <x-slot:en>Real del Mar is an integrated development facing the Pacific that offers an exclusive lifestyle in a privileged natural setting. It blends contemporary architecture, thoughtful urban planning, and a complete community with high-end residences, green spaces, and educational, sports, and hospitality services.</x-slot:en>
                </x-t>
            </p>
            <p class="mt-5 text-lg leading-relaxed text-sand-100/70">
                <x-t>
                    <x-slot:es>Diseñado para armonizar con el paisaje, brinda seguridad, conectividad y alto valor — tanto para vivir como para invertir.</x-slot:es>
                    <x-slot:en>Designed to harmonize with the landscape, it offers security, connectivity, and lasting value — to live in and to invest in.</x-slot:en>
                </x-t>
            </p>
        </div>
    </div>

    {{-- The two scrolling rows --}}
    <div class="marquee-stage space-y-5">
        {{-- Row 1 → scrolls right-to-left --}}
        <div class="marquee">
            <div class="marquee-track marquee-track--rtl">
                @foreach (range(1, 2) as $copy)
                    <div class="flex" @if ($copy === 2) aria-hidden="true" @endif>
                        @foreach ($rowCasas as $idx => $item)
                            <button
                                type="button"
                                @click="openAt({{ $idx }})"
                                class="group mr-5 block shrink-0 overflow-hidden rounded-2xl"
                                tabindex="{{ $copy === 2 ? '-1' : '0' }}"
                            >
                                <img
                                    src="{{ asset('images/' . $item['img']) }}"
                                    alt="{{ $copy === 1 ? $item['alt'] : '' }}"
                                    loading="lazy"
                                    class="h-64 w-auto max-w-none object-cover transition-transform duration-700 group-hover:scale-105 lg:h-80"
                                >
                            </button>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Row 2 → scrolls left-to-right (opposite) --}}
        <div class="marquee">
            <div class="marquee-track marquee-track--ltr">
                @foreach (range(1, 2) as $copy)
                    <div class="flex" @if ($copy === 2) aria-hidden="true" @endif>
                        @foreach ($rowComunidad as $idx => $item)
                            <button
                                type="button"
                                @click="openAt({{ $casasCount + $idx }})"
                                class="group mr-5 block shrink-0 overflow-hidden rounded-2xl"
                                tabindex="{{ $copy === 2 ? '-1' : '0' }}"
                            >
                                <img
                                    src="{{ asset('images/' . $item['img']) }}"
                                    alt="{{ $copy === 1 ? $item['alt'] : '' }}"
                                    loading="lazy"
                                    class="h-64 w-auto max-w-none object-cover transition-transform duration-700 group-hover:scale-105 lg:h-80"
                                >
                            </button>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Lightbox slideshow --}}
    <div
        x-cloak
        x-show="open"
        x-transition.opacity.duration.300ms
        @keydown.escape.window="open = false"
        @keydown.arrow-right.window="open && next()"
        @keydown.arrow-left.window="open && prev()"
        @click="open = false"
        class="fixed inset-0 z-[60] flex items-center justify-center bg-ocean-950/95 p-6 backdrop-blur-sm"
    >
        {{-- Close --}}
        <button type="button" @click="open = false"
            class="absolute right-5 top-5 z-10 flex h-12 w-12 items-center justify-center rounded-full border border-sand-50/20 text-2xl text-sand-50 transition-colors hover:bg-sand-50/10"
            aria-label="Cerrar">&times;</button>

        {{-- Prev --}}
        <button type="button" @click.stop="prev()"
            class="absolute left-4 top-1/2 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full border border-sand-50/20 text-sand-50 transition-colors hover:bg-sand-50/10 sm:left-8 sm:h-14 sm:w-14"
            aria-label="Anterior">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>

        {{-- Next --}}
        <button type="button" @click.stop="next()"
            class="absolute right-4 top-1/2 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full border border-sand-50/20 text-sand-50 transition-colors hover:bg-sand-50/10 sm:right-8 sm:h-14 sm:w-14"
            aria-label="Siguiente">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </button>

        {{-- Image + caption --}}
        <figure @click.stop class="flex max-h-[88vh] max-w-6xl flex-col items-center">
            <img :src="items[i].src" :alt="items[i].alt" class="max-h-[78vh] w-auto rounded-2xl object-contain shadow-2xl">
            <figcaption class="mt-4 flex items-center gap-3 text-sand-200/70">
                <span class="eyebrow text-[0.6rem]" x-text="items[i].alt"></span>
                <span class="text-[0.6rem] text-sand-200/40" x-text="(i + 1) + ' / ' + items.length"></span>
            </figcaption>
        </figure>
    </div>
</section>
