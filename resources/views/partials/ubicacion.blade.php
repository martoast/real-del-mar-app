{{-- ============================== UBICACIÓN — Three.js ocean band ============================== --}}
<section
    id="ubicacion"
    class="relative overflow-hidden bg-gradient-to-b from-ocean-950 via-ocean-900 to-ocean-950 py-28 lg:py-40"
>
    {{-- WebGL Pacific (mounted by ocean-bg.js; the gradient above is the fallback) --}}
    <div data-ocean-bg class="absolute inset-0"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            {{-- Text column --}}
            <div class="reveal-group">
                <p class="eyebrow text-terra-300"><x-t><x-slot:es>Ubicación</x-slot:es><x-slot:en>Location</x-slot:en></x-t></p>
                <h2 class="display mt-6 text-4xl font-light text-sand-50 sm:text-5xl lg:text-6xl">
                    <x-t>
                        <x-slot:es>Real del Mar en la costa<br><em>de Baja California</em></x-slot:es>
                        <x-slot:en>Real del Mar on the coast<br><em>of Baja California</em></x-slot:en>
                    </x-t>
                </h2>
                <p class="mt-8 text-lg leading-relaxed text-sand-100/80">
                    <x-t>
                        <x-slot:es>Vive donde el mar y la tranquilidad definen el día a día. Real del Mar ofrece un entorno planeado, con conexión ágil a Tijuana, Rosarito y la frontera de San Diego — rodeado de naturaleza y con servicios cercanos. Calidad de vida, crecimiento sostenido y una inversión con alta plusvalía.</x-slot:es>
                        <x-slot:en>Live where the sea and tranquility define everyday life. Real del Mar offers a planned setting with easy access to Tijuana, Rosarito, and the San Diego border — surrounded by nature and close to services. Quality of life, steady growth, and an investment with strong appreciation.</x-slot:en>
                    </x-t>
                </p>

                {{-- Drive times --}}
                <div class="reveal-group mt-10 grid grid-cols-1 gap-px overflow-hidden rounded-2xl border border-sand-50/15 bg-sand-50/10 backdrop-blur-sm sm:grid-cols-3">
                    @foreach ([
                        ['t' => '8 min', 'es' => 'Garita de San Ysidro', 'en' => 'San Ysidro Border'],
                        ['t' => '10 min', 'es' => 'Zona Río Tijuana', 'en' => 'Tijuana River Zone'],
                        ['t' => '13 min', 'es' => 'Aeropuerto', 'en' => 'Airport'],
                    ] as $destino)
                        <div class="flex items-center justify-center gap-3 bg-ocean-950/40 px-5 py-5 text-center sm:flex-col sm:gap-0 sm:px-6 sm:py-7">
                            <p class="display whitespace-nowrap text-3xl font-light leading-none text-sand-50 sm:text-4xl">{{ $destino['t'] }}</p>
                            <p class="eyebrow text-[0.55rem] text-ocean-300 sm:mt-2"><span class="lang-es">{{ $destino['es'] }}</span><span class="lang-en">{{ $destino['en'] }}</span></p>
                        </div>
                    @endforeach
                </div>
                <p class="reveal mt-4 text-xs text-sand-200/40"><x-t><x-slot:es>Tiempos con las nuevas vialidades, validados por el Arq. Carlos Rivera.</x-slot:es><x-slot:en>Times with the new roadways, validated by Arch. Carlos Rivera.</x-slot:en></x-t></p>
            </div>

            {{-- Map column --}}
            <div class="reveal overflow-hidden rounded-2xl border border-sand-50/15 bg-sand-50 p-4 sm:p-6">
                <img
                    src="{{ asset('images/mapa-cande.png') }}"
                    alt="Mapa de ubicación de Candé en Real del Mar, zona costa de Baja California"
                    loading="lazy"
                    class="mx-auto h-auto w-full"
                >
            </div>
        </div>
    </div>
</section>
