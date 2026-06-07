{{-- ============================== UBICACIÓN — Three.js ocean band ============================== --}}
<section
    id="ubicacion"
    class="relative overflow-hidden bg-gradient-to-b from-ocean-950 via-ocean-900 to-ocean-950 py-28 lg:py-40"
>
    {{-- WebGL Pacific (mounted by ocean-bg.js; the gradient above is the fallback) --}}
    <div data-ocean-bg class="absolute inset-0"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-terra-300"><x-t><x-slot:es>Ubicación</x-slot:es><x-slot:en>Location</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-sand-50 sm:text-5xl lg:text-6xl">
                <x-t>
                    <x-slot:es>La zona costa de<br><em>Baja California</em></x-slot:es>
                    <x-slot:en>The coast of<br><em>Baja California</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-sand-100/80">
                <x-t>
                    <x-slot:es>Vive donde el mar y la tranquilidad definen el día a día. Real del Mar ofrece un entorno planeado, con conexión ágil a Tijuana, Rosarito y la frontera de San Diego — rodeado de naturaleza y con servicios cercanos. Calidad de vida, crecimiento sostenido y una inversión con alta plusvalía.</x-slot:es>
                    <x-slot:en>Live where the sea and tranquility define everyday life. Real del Mar offers a planned setting with easy access to Tijuana, Rosarito, and the San Diego border — surrounded by nature and close to services. Quality of life, steady growth, and an investment with strong appreciation.</x-slot:en>
                </x-t>
            </p>
        </div>

        {{-- Drive times --}}
        <div class="reveal-group mt-14 grid gap-px overflow-hidden rounded-2xl border border-sand-50/15 bg-sand-50/10 backdrop-blur-sm sm:grid-cols-3">
            @foreach ([
                ['t' => '20 min', 'es' => 'Tijuana', 'en' => 'Tijuana'],
                ['t' => '10 min', 'es' => 'Rosarito', 'en' => 'Rosarito'],
                ['t' => '40 min', 'es' => 'Frontera San Diego', 'en' => 'San Diego border'],
            ] as $destino)
                <div class="bg-ocean-950/40 px-8 py-10 text-center">
                    <p class="display text-4xl font-light text-sand-50">{{ $destino['t'] }}</p>
                    <p class="eyebrow mt-2 text-[0.6rem] text-ocean-300"><span class="lang-es">{{ $destino['es'] }}</span><span class="lang-en">{{ $destino['en'] }}</span></p>
                </div>
            @endforeach
        </div>
        <p class="reveal mt-4 text-xs text-sand-200/40"><x-t><x-slot:es>Tiempos de traslado aproximados.</x-slot:es><x-slot:en>Approximate travel times.</x-slot:en></x-t></p>
    </div>
</section>
