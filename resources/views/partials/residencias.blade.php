{{-- ============================== RESIDENCIAS ============================== --}}
@php
    $casasGallery = ['cande-casa-terraza-alberca.jpg', 'cande-casa-doble-altura.jpg', 'cande-casa-sala-chimenea.jpg', 'cande-casa-cocina-comedor.jpg', 'cande-casa-cocina-isla.jpg', 'cande-casa-sala-comedor.jpg', 'cande-casa-bar.jpg', 'cande-casa-cocina.jpg', 'cande-casa-estancia.jpg', 'cande-casa-sala-tv.jpg', 'cande-casa-recamara.jpg', 'cande-casa-rooftop.jpg', 'cande-casa-bano.jpg', 'cande-casa-vestibulo.jpg'];
    $depasGallery = ['cande-depa-sala-esquina.jpg', 'cande-depa-sala-vista.jpg', 'cande-depa-recamara-vista.jpg', 'cande-depa-comedor.jpg', 'cande-depa-cocina-sala.jpg', 'cande-depa-terraza.jpg', 'cande-depa-exterior.jpg', 'cande-depa-sala.jpg', 'cande-depa-cocina-barra.jpg', 'cande-depa-cocina.jpg', 'cande-depa-recamara.jpg', 'cande-depa-recamara-b.jpg'];

    $casas = [
        [
            'nombre_es' => 'Tipología Ascendente', 'nombre_en' => 'Ascending Typology',
            'm2' => '277 m²', 'img' => 'cande-casa-doble-altura.jpg',
            'specs' => [
                ['es' => '3 recámaras + Flex', 'en' => '3 bedrooms + Flex'],
                ['es' => '3.5 baños', 'en' => '3.5 baths'],
                ['es' => '2 y 3 estacionamientos', 'en' => '2 and 3 parking spaces'],
                ['es' => 'Vista al mar', 'en' => 'Sea view'],
            ],
        ],
        [
            'nombre_es' => 'Tipología Descendente', 'nombre_en' => 'Descending Typology',
            'm2' => '275 m²', 'img' => 'cande-casa-sala-comedor.jpg',
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
            'nombre' => 'Modelo A', 'm2' => '144 m²', 'img' => 'cande-depa-sala-vista.jpg',
            'specs' => [
                ['es' => '2 recámaras + Flex', 'en' => '2 bedrooms + Flex'],
                ['es' => '3 baños', 'en' => '3 baths'],
                ['es' => '2 estacionamientos', 'en' => '2 parking spaces'],
                ['es' => 'Terrazas de 23 m² hasta 184 m²', 'en' => 'Terraces from 23 m² to 184 m²'],
                ['es' => 'Vistas panorámicas al mar y al campo de golf', 'en' => 'Panoramic sea and golf course views'],
            ],
        ],
        [
            'nombre' => 'Modelo B', 'm2' => '102 m²', 'img' => 'cande-depa-recamara-vista.jpg',
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

<section id="residencias" class="bg-sand-100 py-24 lg:py-36">
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
                <button @click="$store.product.tab = 'casas'"
                    class="eyebrow whitespace-nowrap rounded-full px-5 py-3 text-[0.65rem] transition-all duration-300 sm:px-7"
                    :class="$store.product.tab === 'casas' ? 'bg-ink text-sand-50' : 'text-ink-soft hover:text-ink'"
                >Casas Candé</button>
                <button @click="$store.product.tab = 'depas'"
                    class="eyebrow whitespace-nowrap rounded-full px-5 py-3 text-[0.65rem] transition-all duration-300 sm:px-7"
                    :class="$store.product.tab === 'depas' ? 'bg-ink text-sand-50' : 'text-ink-soft hover:text-ink'"
                ><span class="lang-es">Departamentos</span><span class="lang-en">Apartments</span></button>
            </div>
        </div>

        {{-- ============ CASAS CANDÉ ============ --}}
        <div x-show="$store.product.tab === 'casas'"
             x-transition:enter="transition duration-700" x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
             class="mt-16"
             x-data="{ active: '{{ asset('images/' . $casasGallery[0]) }}', loading: false, show(i){ if(i===this.active) return; this.loading=true; setTimeout(()=>this.active=i, 180); } }">

            {{-- Cinematic showcase --}}
            <div class="group relative overflow-hidden rounded-3xl bg-ocean-950 shadow-2xl shadow-ink/10">
                <img :src="active" @load="loading=false" alt="Casas Candé"
                    class="aspect-[4/3] w-full object-cover transition-opacity duration-300 sm:aspect-video"
                    :class="loading ? 'opacity-0' : 'opacity-100'">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ocean-950/85 via-ocean-950/10 to-transparent"></div>

                {{-- Glass info panel --}}
                <div class="relative z-10 -mt-16 p-4 sm:absolute sm:inset-x-0 sm:bottom-0 sm:z-auto sm:mt-0 sm:max-w-lg sm:p-6 lg:p-10">
                    <div class="rounded-2xl border border-sand-50/15 bg-ocean-950/40 p-5 backdrop-blur-md sm:p-6 lg:p-8">
                        <p class="eyebrow text-[0.6rem] text-terra-300"><x-t><x-slot:es>Solo 37 residencias · 3 etapas</x-slot:es><x-slot:en>Only 37 residences · 3 phases</x-slot:en></x-t></p>
                        <h3 class="display mt-3 text-3xl font-light text-sand-50 sm:text-4xl">Casas <em>Candé</em></h3>
                        <p class="mt-4 text-sm leading-relaxed text-sand-100/85">
                            <x-t>
                                <x-slot:es>Un proyecto residencial exclusivo frente al mar, compuesto por solo 37 residencias diseñadas para privacidad, amplitud y una fuerte conexión con el entorno natural.</x-slot:es>
                                <x-slot:en>An exclusive beachfront residential project of just 37 homes, designed for privacy, spaciousness, and a strong connection to the natural surroundings.</x-slot:en>
                            </x-t>
                        </p>
                        <a href="#contacto" class="eyebrow mt-6 inline-flex items-center gap-3 text-[0.6rem] text-sand-50">
                            <x-t><x-slot:es>Agendar visita</x-slot:es><x-slot:en>Schedule a visit</x-slot:en></x-t>
                            <span class="block h-px w-8 bg-terra-300 transition-all duration-300 group-hover:w-12"></span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Thumbnail gallery --}}
            <div class="-mx-6 mt-4 flex snap-x gap-3 overflow-x-auto px-6 pb-1 lg:mx-0 lg:px-0 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                @foreach ($casasGallery as $img)
                    <button type="button" @click="show('{{ asset('images/' . $img) }}')"
                        class="relative h-16 w-24 shrink-0 snap-start overflow-hidden rounded-lg transition-all duration-300 sm:h-20 sm:w-32"
                        :class="active === '{{ asset('images/' . $img) }}' ? 'ring-2 ring-terra-400 ring-offset-2 ring-offset-sand-100' : 'opacity-55 hover:opacity-100'">
                        <img src="{{ asset('images/' . $img) }}" alt="" loading="lazy" class="h-full w-full object-cover">
                    </button>
                @endforeach
            </div>

            {{-- Typology cards --}}
            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach ($casas as $tipo)
                    <div class="group overflow-hidden rounded-2xl border border-ink/8 bg-sand-50 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink/5">
                        <div class="overflow-hidden">
                            <img src="{{ asset('images/' . $tipo['img']) }}" alt="{{ $tipo['nombre_es'] }}" loading="lazy"
                                class="aspect-[16/10] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="p-8 lg:p-10">
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
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ============ DEPARTAMENTOS ============ --}}
        <div x-show="$store.product.tab === 'depas'" x-cloak
             x-transition:enter="transition duration-700" x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
             class="mt-16"
             x-data="{ active: '{{ asset('images/' . $depasGallery[0]) }}', loading: false, show(i){ if(i===this.active) return; this.loading=true; setTimeout(()=>this.active=i, 180); } }">

            {{-- Cinematic showcase --}}
            <div class="group relative overflow-hidden rounded-3xl bg-ocean-950 shadow-2xl shadow-ink/10">
                <img :src="active" @load="loading=false" alt="Departamentos Real del Mar"
                    class="aspect-[4/3] w-full object-cover transition-opacity duration-300 sm:aspect-video"
                    :class="loading ? 'opacity-0' : 'opacity-100'">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ocean-950/85 via-ocean-950/10 to-transparent"></div>

                <div class="relative z-10 -mt-16 p-4 sm:absolute sm:inset-x-0 sm:bottom-0 sm:z-auto sm:mt-0 sm:max-w-lg sm:p-6 lg:p-10">
                    <div class="rounded-2xl border border-sand-50/15 bg-ocean-950/40 p-5 backdrop-blur-md sm:p-6 lg:p-8">
                        <p class="eyebrow text-[0.6rem] text-terra-300"><x-t><x-slot:es>3 torres · 18 unidades por torre</x-slot:es><x-slot:en>3 towers · 18 units per tower</x-slot:en></x-t></p>
                        <h3 class="display mt-3 text-3xl font-light text-sand-50 sm:text-4xl"><span class="lang-es">Departamentos</span><span class="lang-en">Apartments</span> <em>Real del Mar</em></h3>
                        <p class="mt-4 text-sm leading-relaxed text-sand-100/85">
                            <x-t>
                                <x-slot:es>54 departamentos en tres torres íntimas, con terrazas generosas y vistas panorámicas al mar y al campo de golf.</x-slot:es>
                                <x-slot:en>54 apartments across three intimate towers, with generous terraces and panoramic views of the sea and the golf course.</x-slot:en>
                            </x-t>
                        </p>
                        <a href="#contacto" class="eyebrow mt-6 inline-flex items-center gap-3 text-[0.6rem] text-sand-50">
                            <x-t><x-slot:es>Agendar visita</x-slot:es><x-slot:en>Schedule a visit</x-slot:en></x-t>
                            <span class="block h-px w-8 bg-terra-300 transition-all duration-300 group-hover:w-12"></span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Thumbnail gallery --}}
            <div class="-mx-6 mt-4 flex snap-x gap-3 overflow-x-auto px-6 pb-1 lg:mx-0 lg:px-0 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                @foreach ($depasGallery as $img)
                    <button type="button" @click="show('{{ asset('images/' . $img) }}')"
                        class="relative h-16 w-24 shrink-0 snap-start overflow-hidden rounded-lg transition-all duration-300 sm:h-20 sm:w-32"
                        :class="active === '{{ asset('images/' . $img) }}' ? 'ring-2 ring-terra-400 ring-offset-2 ring-offset-sand-100' : 'opacity-55 hover:opacity-100'">
                        <img src="{{ asset('images/' . $img) }}" alt="" loading="lazy" class="h-full w-full object-cover">
                    </button>
                @endforeach
            </div>

            {{-- Typology cards --}}
            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach ($depas as $modelo)
                    <div class="group overflow-hidden rounded-2xl border border-ink/8 bg-sand-50 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink/5">
                        <div class="overflow-hidden">
                            <img src="{{ asset('images/' . $modelo['img']) }}" alt="{{ $modelo['nombre'] }}" loading="lazy"
                                class="aspect-[16/10] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="p-8 lg:p-10">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
