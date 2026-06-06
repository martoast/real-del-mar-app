{{-- ============================== UBICACIÓN — Three.js ocean band ============================== --}}
<section
    id="ubicacion"
    class="relative overflow-hidden bg-gradient-to-b from-ocean-950 via-ocean-900 to-ocean-950 py-28 lg:py-40"
>
    {{-- WebGL Pacific (mounted by ocean-bg.js; the gradient above is the fallback) --}}
    <div data-ocean-bg class="absolute inset-0"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-terra-300">Ubicación</p>
            <h2 class="display mt-6 text-4xl font-light text-sand-50 sm:text-5xl lg:text-6xl">
                La zona costa de<br><em>Baja California</em>
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-sand-100/80">
                Vive donde el mar y la tranquilidad definen el día a día. Real del Mar
                ofrece un entorno planeado, con conexión ágil a Tijuana, Rosarito y la
                frontera de San Diego — rodeado de naturaleza y con servicios cercanos.
                Calidad de vida, crecimiento sostenido y una inversión con alta plusvalía.
            </p>
        </div>

        {{-- Drive times --}}
        <div class="reveal-group mt-14 grid gap-px overflow-hidden rounded-2xl border border-sand-50/15 bg-sand-50/10 backdrop-blur-sm sm:grid-cols-3">
            @foreach ([
                ['t' => '20 min', 'l' => 'Tijuana'],
                ['t' => '10 min', 'l' => 'Rosarito'],
                ['t' => '40 min', 'l' => 'Frontera San Diego'],
            ] as $destino)
                <div class="bg-ocean-950/40 px-8 py-10 text-center">
                    <p class="display text-4xl font-light text-sand-50">{{ $destino['t'] }}</p>
                    <p class="eyebrow mt-2 text-[0.6rem] text-ocean-300">{{ $destino['l'] }}</p>
                </div>
            @endforeach
        </div>
        <p class="reveal mt-4 text-xs text-sand-200/40">Tiempos de traslado aproximados.</p>
    </div>
</section>
