{{-- ============================== ESENCIA ============================== --}}
<section id="esencia" class="relative overflow-hidden py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-16 lg:grid-cols-12">
            {{-- Editorial copy --}}
            <div class="reveal-group lg:col-span-7">
                <p class="eyebrow text-terra-500"><x-t><x-slot:es>La esencia</x-slot:es><x-slot:en>The essence</x-slot:en></x-t></p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl lg:text-6xl">
                    <x-t>
                        <x-slot:es>Arquitectura emocional,<br><em>frente al mar</em></x-slot:es>
                        <x-slot:en>Emotional architecture,<br><em>facing the sea</em></x-slot:en>
                    </x-t>
                </h2>
                <p class="mt-8 max-w-xl text-lg leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>Candé by FRISA es una nueva etapa residencial de lujo dentro de Real del Mar, en Tijuana. Es un desarrollo que combina 37 casas y 54 departamentos diseñados para vivir o invertir en una zona privada, con vistas al mar y acceso a un estilo de vida tipo resort.</x-slot:es>
                        <x-slot:en>Candé by FRISA is a new luxury residential phase within Real del Mar, in Tijuana. The development combines 37 homes and 54 apartments designed for living or investing in a private enclave with ocean views and access to a resort-style way of life.</x-slot:en>
                    </x-t>
                </p>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>El proyecto cuenta con residencias modernas, amenidades y una ubicación privilegiada dentro de Real del Mar, donde los residentes pueden disfrutar de espacios como campo de golf, áreas deportivas, restaurantes, casa club y seguridad.</x-slot:es>
                        <x-slot:en>The project features modern residences, amenities, and a privileged location within Real del Mar, where residents enjoy a golf course, sports areas, restaurants, a clubhouse, and round-the-clock security.</x-slot:en>
                    </x-t>
                </p>

                {{-- Key numbers (blueprint: proyecto stat row) --}}
                <dl class="mt-10 grid grid-cols-2 gap-x-6 gap-y-5 sm:grid-cols-4">
                    @foreach ([
                        ['n' => '37', 'es' => 'Casas', 'en' => 'Homes'],
                        ['n' => '54', 'es' => 'Departamentos', 'en' => 'Apartments'],
                        ['n' => '3', 'es' => 'Torres', 'en' => 'Towers'],
                        ['n' => '3', 'es' => 'Etapas', 'en' => 'Phases'],
                    ] as $stat)
                        <div>
                            <dt class="display text-4xl font-light text-ink">{{ $stat['n'] }}</dt>
                            <dd class="eyebrow mt-1 text-[0.55rem] text-ink-soft"><span class="lang-es">{{ $stat['es'] }}</span><span class="lang-en">{{ $stat['en'] }}</span></dd>
                        </div>
                    @endforeach
                </dl>
            </div>

            {{-- Exterior Candé (the video lives in its own framed section below) --}}
            <div class="reveal relative lg:col-span-5">
                <div class="overflow-hidden rounded-2xl bg-ocean-950 shadow-xl shadow-ink/10">
                    <img
                        src="{{ asset('images/cande-contraportada.jpg') }}"
                        alt="Residencia Candé frente al mar al atardecer en Real del Mar"
                        loading="lazy"
                        class="aspect-[4/5] w-full object-cover"
                    >
                </div>
            </div>
        </div>
    </div>
</section>
