{{-- ============================== RESPALDO (FRISA + CUAIK) ============================== --}}
<section class="py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500">Respaldo</p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                Trayectoria que <em>da confianza</em>
            </h2>
        </div>

        <div class="mt-16 grid gap-6 lg:grid-cols-2">
            {{-- Grupo FRISA --}}
            <div class="reveal-group rounded-2xl bg-ocean-900 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ocean-300">El desarrollador</p>
                <h3 class="display mt-4 text-3xl text-sand-50">Grupo <em>FRISA</em></h3>
                <p class="mt-6 leading-relaxed text-sand-100/75">
                    Desarrollador inmobiliario con sólida trayectoria en México. Fundado en
                    1957, cuenta con más de seis décadas de experiencia en la creación de
                    comunidades integrales y proyectos de alto valor, distinguiéndose por su
                    calidad, cumplimiento y visión de largo plazo.
                </p>
                <div class="mt-10 grid grid-cols-2 gap-x-6 gap-y-8">
                    @foreach ([
                        ['n' => '1957', 'l' => 'Fundación · 65+ años'],
                        ['n' => '377,000+', 'l' => 'Viviendas construidas'],
                        ['n' => '210,000+', 'l' => 'Lotes comercializados'],
                        ['n' => '16+', 'l' => 'Ciudades en México'],
                    ] as $stat)
                        <div>
                            <p class="display text-3xl font-light text-terra-300">{{ $stat['n'] }}</p>
                            <p class="eyebrow mt-2 text-[0.55rem] text-sand-200/60">{{ $stat['l'] }}</p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-10 border-t border-sand-50/10 pt-6 text-xs leading-relaxed text-sand-200/50">
                    Experiencia en desarrollos inmobiliarios, parques industriales,
                    centros comerciales y desarrollos turísticos.
                </p>
            </div>

            {{-- Cuaik --}}
            <div class="reveal-group rounded-2xl border border-ink/8 bg-sand-100 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ink-soft">La arquitectura</p>
                <h3 class="display mt-4 text-3xl text-ink">Cuaik <em>CDS</em></h3>
                <p class="mt-6 leading-relaxed text-ink-soft">
                    Fundada por el arquitecto Santiago Cuaik, la firma es reconocida por su
                    enfoque contemporáneo y elegante, creando espacios que equilibran
                    estética, funcionalidad y una relación armónica con su entorno.
                </p>
                <p class="mt-5 leading-relaxed text-ink-soft">
                    Su proceso de diseño parte del análisis del estilo de vida de los
                    residentes y del contexto natural y urbano — proyectos sofisticados,
                    atemporales y alineados con altos estándares de calidad.
                </p>
                <blockquote class="mt-10 border-l-2 border-terra-400 pl-6">
                    <p class="display text-xl italic leading-snug text-ink">
                        "Creamos espacios que nos reúnen: lugares para compartir la mesa,
                        vivir momentos."
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</section>
