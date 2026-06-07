{{-- ============================== GALERÍA (dual-row marquee) ============================== --}}
@php
    // Row 1 — interiores & residencias. Row 2 — comunidad & amenidades.
    $rowCasas = [
        ['img' => 'cande-exterior.png', 'alt' => 'Fachada de casa Candé'],
        ['img' => 'interior-living.png', 'alt' => 'Sala con vista al mar'],
        ['img' => 'terraza.png', 'alt' => 'Terraza frente al Pacífico'],
        ['img' => 'interior-bano.png', 'alt' => 'Baño con acabados naturales'],
    ];
    $rowComunidad = [
        ['img' => 'torres-exterior.png', 'alt' => 'Torres de departamentos'],
        ['img' => 'amenidad-alberca.png', 'alt' => 'Alberca de borde infinito'],
        ['img' => 'amenidad-padel.png', 'alt' => 'Cancha de pádel'],
        ['img' => 'amenidad-firepit.png', 'alt' => 'Fire pits al atardecer'],
        ['img' => 'masterplan.png', 'alt' => 'Masterplan de Real del Mar'],
    ];
@endphp

<section
    id="galeria"
    class="overflow-hidden bg-ocean-950 py-24 lg:py-32"
    x-data="{ lbOpen: false, lbSrc: '', lbAlt: '', open(s, a) { this.lbSrc = s; this.lbAlt = a; this.lbOpen = true; } }"
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
                    <x-slot:es>Recorre las residencias, los interiores y la comunidad. Pasa el cursor para detener, haz clic en cualquier imagen para verla en grande.</x-slot:es>
                    <x-slot:en>Explore the residences, interiors, and community. Hover to pause, click any image to view it full size.</x-slot:en>
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
                        @foreach ($rowCasas as $item)
                            <button
                                type="button"
                                @click="open('{{ asset('images/' . $item['img']) }}', '{{ $item['alt'] }}')"
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
                        @foreach ($rowComunidad as $item)
                            <button
                                type="button"
                                @click="open('{{ asset('images/' . $item['img']) }}', '{{ $item['alt'] }}')"
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

    {{-- Lightbox --}}
    <div
        x-cloak
        x-show="lbOpen"
        x-transition.opacity.duration.300ms
        @keydown.escape.window="lbOpen = false"
        @click="lbOpen = false"
        class="fixed inset-0 z-[60] flex items-center justify-center bg-ocean-950/95 p-6 backdrop-blur-sm"
    >
        <button
            type="button"
            @click="lbOpen = false"
            class="absolute right-6 top-6 flex h-12 w-12 items-center justify-center rounded-full border border-sand-50/20 text-2xl text-sand-50 transition-colors hover:bg-sand-50/10"
            aria-label="Cerrar"
        >&times;</button>
        <figure @click.stop class="max-h-[88vh] max-w-6xl">
            <img :src="lbSrc" :alt="lbAlt" class="max-h-[80vh] w-auto rounded-2xl object-contain shadow-2xl">
            <figcaption class="eyebrow mt-4 text-center text-[0.6rem] text-sand-200/70" x-text="lbAlt"></figcaption>
        </figure>
    </div>
</section>
