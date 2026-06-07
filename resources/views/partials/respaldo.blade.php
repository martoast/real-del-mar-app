{{-- ============================== RESPALDO (FRISA + CUAIK) ============================== --}}
<section class="py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500"><x-t><x-slot:es>Respaldo</x-slot:es><x-slot:en>Backing</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>Trayectoria que <em>da confianza</em></x-slot:es>
                    <x-slot:en>A track record you <em>can trust</em></x-slot:en>
                </x-t>
            </h2>
        </div>

        <div class="mt-16 grid gap-6 lg:grid-cols-2">
            {{-- Grupo FRISA --}}
            <div class="reveal-group rounded-2xl bg-ocean-900 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ocean-300"><x-t><x-slot:es>El desarrollador</x-slot:es><x-slot:en>The developer</x-slot:en></x-t></p>
                <h3 class="display mt-4 text-3xl text-sand-50">Grupo <em>FRISA</em></h3>
                <p class="mt-6 leading-relaxed text-sand-100/75">
                    <x-t>
                        <x-slot:es>Desarrollador inmobiliario con sólida trayectoria en México. Fundado en 1957, cuenta con más de seis décadas de experiencia en la creación de comunidades integrales y proyectos de alto valor, distinguiéndose por su calidad, cumplimiento y visión de largo plazo.</x-slot:es>
                        <x-slot:en>A real estate developer with a solid track record in Mexico. Founded in 1957, it brings more than six decades of experience creating integrated communities and high-value projects, distinguished by its quality, reliability, and long-term vision.</x-slot:en>
                    </x-t>
                </p>
                <div class="mt-10 grid grid-cols-2 gap-x-6 gap-y-8">
                    @foreach ([
                        ['n' => '1957', 'es' => 'Fundación · 65+ años', 'en' => 'Founded · 65+ years'],
                        ['n' => '377,000+', 'es' => 'Viviendas construidas', 'en' => 'Homes built'],
                        ['n' => '210,000+', 'es' => 'Lotes comercializados', 'en' => 'Lots sold'],
                        ['n' => '16+', 'es' => 'Ciudades en México', 'en' => 'Cities in Mexico'],
                    ] as $stat)
                        <div>
                            <p class="display text-3xl font-light text-terra-300">{{ $stat['n'] }}</p>
                            <p class="eyebrow mt-2 text-[0.55rem] text-sand-200/60"><span class="lang-es">{{ $stat['es'] }}</span><span class="lang-en">{{ $stat['en'] }}</span></p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-10 border-t border-sand-50/10 pt-6 text-xs leading-relaxed text-sand-200/50">
                    <x-t>
                        <x-slot:es>Experiencia en desarrollos inmobiliarios, parques industriales, centros comerciales y desarrollos turísticos.</x-slot:es>
                        <x-slot:en>Experience across real estate developments, industrial parks, shopping centers, and tourism projects.</x-slot:en>
                    </x-t>
                </p>
            </div>

            {{-- Cuaik --}}
            <div class="reveal-group rounded-2xl border border-ink/8 bg-sand-100 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ink-soft"><x-t><x-slot:es>La arquitectura</x-slot:es><x-slot:en>The architecture</x-slot:en></x-t></p>
                <h3 class="display mt-4 text-3xl text-ink">Cuaik <em>CDS</em></h3>
                <p class="mt-6 leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>Fundada por el arquitecto Santiago Cuaik, la firma es reconocida por su enfoque contemporáneo y elegante, creando espacios que equilibran estética, funcionalidad y una relación armónica con su entorno.</x-slot:es>
                        <x-slot:en>Founded by architect Santiago Cuaik, the firm is known for its contemporary, elegant approach, creating spaces that balance aesthetics, function, and a harmonious relationship with their surroundings.</x-slot:en>
                    </x-t>
                </p>
                <p class="mt-5 leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>Su proceso de diseño parte del análisis del estilo de vida de los residentes y del contexto natural y urbano — proyectos sofisticados, atemporales y alineados con altos estándares de calidad.</x-slot:es>
                        <x-slot:en>Their design process begins with an analysis of residents' lifestyle and the natural and urban context — sophisticated, timeless projects aligned with high standards of quality.</x-slot:en>
                    </x-t>
                </p>
                <blockquote class="mt-10 border-l-2 border-terra-400 pl-6">
                    <p class="display text-xl italic leading-snug text-ink">
                        <x-t>
                            <x-slot:es>"Creamos espacios que nos reúnen: lugares para compartir la mesa, vivir momentos."</x-slot:es>
                            <x-slot:en>"We create spaces that bring us together: places to share the table and live moments."</x-slot:en>
                        </x-t>
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</section>
