{{-- ============================== RESIDENCIAS ============================== --}}
@php
    $casas = [
        [
            'nombre_es' => 'Tipología Ascendente', 'nombre_en' => 'Ascending Typology',
            'm2' => '277 m²',
            'specs' => [
                ['es' => '3 recámaras + Flex', 'en' => '3 bedrooms + Flex'],
                ['es' => '3.5 baños', 'en' => '3.5 baths'],
                ['es' => '2 y 3 estacionamientos', 'en' => '2 and 3 parking spaces'],
                ['es' => 'Vista al mar', 'en' => 'Sea view'],
            ],
        ],
        [
            'nombre_es' => 'Tipología Descendente', 'nombre_en' => 'Descending Typology',
            'm2' => '275 m²',
            'specs' => [
                ['es' => '3 recámaras + Flex', 'en' => '3 bedrooms + Flex'],
                ['es' => '3.5 baños', 'en' => '3.5 baths'],
                ['es' => '2 estacionamientos', 'en' => '2 parking spaces'],
                ['es' => 'Vista al mar', 'en' => 'Sea view'],
            ],
        ],
    ];
    $depas = [
        [
            'nombre' => 'Modelo A', 'm2' => '144 m²',
            'specs' => [
                ['es' => '2 recámaras + Flex', 'en' => '2 bedrooms + Flex'],
                ['es' => '3 baños', 'en' => '3 baths'],
                ['es' => '2 estacionamientos', 'en' => '2 parking spaces'],
                ['es' => 'Terrazas de 23 m² hasta 184 m²', 'en' => 'Terraces from 23 m² to 184 m²'],
                ['es' => 'Vistas panorámicas al mar y al campo de golf', 'en' => 'Panoramic sea and golf course views'],
            ],
        ],
        [
            'nombre' => 'Modelo B', 'm2' => '102 m²',
            'specs' => [
                ['es' => '1 recámara', 'en' => '1 bedroom'],
                ['es' => '1.5 baños', 'en' => '1.5 baths'],
                ['es' => '1 estacionamiento', 'en' => '1 parking space'],
                ['es' => 'Terrazas de 18 m² hasta 38 m²', 'en' => 'Terraces from 18 m² to 38 m²'],
                ['es' => 'Vistas panorámicas al mar y al campo de golf', 'en' => 'Panoramic sea and golf course views'],
            ],
        ],
    ];
@endphp

<section id="residencias" class="bg-sand-100 py-24 lg:py-36" x-data="{ tab: 'casas' }">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        {{-- Header + tabs --}}
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500"><x-t><x-slot:es>Residencias</x-slot:es><x-slot:en>Residences</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>Dos maneras de <em>vivir el mar</em></x-slot:es>
                    <x-slot:en>Two ways to <em>live the sea</em></x-slot:en>
                </x-t>
            </h2>
            <div class="mt-10 inline-flex rounded-full border border-ink/10 bg-sand-50 p-1.5">
                <button
                    @click="tab = 'casas'"
                    class="eyebrow rounded-full px-7 py-3 text-[0.65rem] transition-all duration-300"
                    :class="tab === 'casas' ? 'bg-ink text-sand-50' : 'text-ink-soft hover:text-ink'"
                >Casas Candé</button>
                <button
                    @click="tab = 'depas'"
                    class="eyebrow rounded-full px-7 py-3 text-[0.65rem] transition-all duration-300"
                    :class="tab === 'depas' ? 'bg-ink text-sand-50' : 'text-ink-soft hover:text-ink'"
                ><span class="lang-es">Departamentos</span><span class="lang-en">Apartments</span></button>
            </div>
        </div>

        {{-- ---------- Casas Candé ---------- --}}
        <div x-show="tab === 'casas'" x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mt-16">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/rdm-casa-fachada.jpg') }}" alt="Casa Candé"
                        class="aspect-[4/3] w-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div>
                    <p class="eyebrow text-[0.6rem] text-ink-soft"><x-t><x-slot:es>Solo 37 residencias · 3 etapas</x-slot:es><x-slot:en>Only 37 residences · 3 phases</x-slot:en></x-t></p>
                    <h3 class="display mt-4 text-3xl font-light text-ink sm:text-4xl">Casas <em>Candé</em></h3>
                    <p class="mt-6 leading-relaxed text-ink-soft">
                        <x-t>
                            <x-slot:es>Un proyecto residencial exclusivo frente al mar, compuesto por solo 37 residencias diseñadas para ofrecer privacidad, amplitud y una fuerte conexión con el entorno natural. Espacios luminosos, ventanales de piso a techo y vistas abiertas al mar — una experiencia de vida íntima y distinguida, enfocada en el diseño, la calma y un estilo de vida auténtico.</x-slot:es>
                            <x-slot:en>An exclusive beachfront residential project of just 37 homes designed for privacy, spaciousness, and a strong connection to the natural surroundings. Light-filled spaces, floor-to-ceiling windows, and open sea views — an intimate, distinguished way of living focused on design, calm, and an authentic lifestyle.</x-slot:en>
                        </x-t>
                    </p>
                </div>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach ($casas as $tipo)
                    <div class="group rounded-2xl border border-ink/8 bg-sand-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink/5 lg:p-10">
                        <div class="flex items-baseline justify-between gap-4">
                            <h4 class="display text-2xl text-ink"><span class="lang-es">{{ $tipo['nombre_es'] }}</span><span class="lang-en">{{ $tipo['nombre_en'] }}</span></h4>
                            <p class="display text-3xl font-light text-terra-500">{{ $tipo['m2'] }}</p>
                        </div>
                        <p class="eyebrow mt-1 text-[0.55rem] text-ink-soft"><x-t><x-slot:es>de construcción</x-slot:es><x-slot:en>of construction</x-slot:en></x-t></p>
                        <ul class="mt-7 space-y-3">
                            @foreach ($tipo['specs'] as $spec)
                                <li class="flex items-center gap-3 text-sm text-ink-soft">
                                    <span class="h-1 w-1 rounded-full bg-terra-400"></span><span><span class="lang-es">{{ $spec['es'] }}</span><span class="lang-en">{{ $spec['en'] }}</span></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ---------- Departamentos ---------- --}}
        <div x-show="tab === 'depas'" x-cloak x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mt-16">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/rdm-torres-sunset.jpg') }}" alt="Torres de departamentos con vista al mar"
                        class="aspect-[4/3] w-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div>
                    <p class="eyebrow text-[0.6rem] text-ink-soft"><x-t><x-slot:es>3 torres · 18 unidades por torre</x-slot:es><x-slot:en>3 towers · 18 units per tower</x-slot:en></x-t></p>
                    <h3 class="display mt-4 text-3xl font-light text-ink sm:text-4xl"><span class="lang-es">Departamentos</span><span class="lang-en">Apartments</span> <em>Real del Mar</em></h3>
                    <p class="mt-6 leading-relaxed text-ink-soft">
                        <x-t>
                            <x-slot:es>54 departamentos distribuidos en tres torres íntimas, con terrazas generosas y vistas panorámicas al mar y al campo de golf. Dos tipologías pensadas para distintos momentos de vida — todas con la misma vocación: abrir el horizonte.</x-slot:es>
                            <x-slot:en>54 apartments across three intimate towers, with generous terraces and panoramic views of the sea and the golf course. Two layouts for different stages of life — all with the same purpose: to open up the horizon.</x-slot:en>
                        </x-t>
                    </p>
                </div>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach ($depas as $modelo)
                    <div class="group rounded-2xl border border-ink/8 bg-sand-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink/5 lg:p-10">
                        <div class="flex items-baseline justify-between gap-4">
                            <h4 class="display text-2xl text-ink">{{ $modelo['nombre'] }}</h4>
                            <p class="display text-3xl font-light text-terra-500">{{ $modelo['m2'] }}</p>
                        </div>
                        <p class="eyebrow mt-1 text-[0.55rem] text-ink-soft"><x-t><x-slot:es>+ terrazas variables</x-slot:es><x-slot:en>+ variable terraces</x-slot:en></x-t></p>
                        <ul class="mt-7 space-y-3">
                            @foreach ($modelo['specs'] as $spec)
                                <li class="flex items-center gap-3 text-sm text-ink-soft">
                                    <span class="h-1 w-1 rounded-full bg-terra-400"></span><span><span class="lang-es">{{ $spec['es'] }}</span><span class="lang-en">{{ $spec['en'] }}</span></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
