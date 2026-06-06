{{-- ============================== RESIDENCIAS ============================== --}}
<section id="residencias" class="bg-sand-100 py-24 lg:py-36" x-data="{ tab: 'casas' }">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        {{-- Header + tabs --}}
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500">Residencias</p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                Dos maneras de <em>vivir el mar</em>
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
                >Departamentos</button>
            </div>
        </div>

        {{-- ---------- Casas Candé ---------- --}}
        <div x-show="tab === 'casas'" x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mt-16">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/cande-exterior.png') }}" alt="Casa Candé al atardecer"
                        class="aspect-[4/3] w-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div>
                    <p class="eyebrow text-[0.6rem] text-ink-soft">Solo 37 residencias · 3 etapas</p>
                    <h3 class="display mt-4 text-3xl font-light text-ink sm:text-4xl">Casas <em>Candé</em></h3>
                    <p class="mt-6 leading-relaxed text-ink-soft">
                        Un proyecto residencial exclusivo frente al mar, compuesto por solo 37
                        residencias diseñadas para ofrecer privacidad, amplitud y una fuerte
                        conexión con el entorno natural. Espacios luminosos, ventanales de piso
                        a techo y vistas abiertas al mar — una experiencia de vida íntima y
                        distinguida, enfocada en el diseño, la calma y un estilo de vida auténtico.
                    </p>
                </div>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach ([
                    [
                        'nombre' => 'Tipología Ascendente',
                        'm2' => '277 m²',
                        'specs' => ['3 recámaras + Flex', '3.5 baños', '2 y 3 estacionamientos', 'Vista al mar'],
                    ],
                    [
                        'nombre' => 'Tipología Descendente',
                        'm2' => '275 m²',
                        'specs' => ['3 recámaras + Flex', '3.5 baños', '2 estacionamientos', 'Vista al mar'],
                    ],
                ] as $tipo)
                    <div class="group rounded-2xl border border-ink/8 bg-sand-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink/5 lg:p-10">
                        <div class="flex items-baseline justify-between gap-4">
                            <h4 class="display text-2xl text-ink">{{ $tipo['nombre'] }}</h4>
                            <p class="display text-3xl font-light text-terra-500">{{ $tipo['m2'] }}</p>
                        </div>
                        <p class="eyebrow mt-1 text-[0.55rem] text-ink-soft">de construcción</p>
                        <ul class="mt-7 space-y-3">
                            @foreach ($tipo['specs'] as $spec)
                                <li class="flex items-center gap-3 text-sm text-ink-soft">
                                    <span class="h-1 w-1 rounded-full bg-terra-400"></span>{{ $spec }}
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
                    <img src="{{ asset('images/torres-exterior.png') }}" alt="Torres de departamentos con vista al mar"
                        class="aspect-[4/3] w-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div>
                    <p class="eyebrow text-[0.6rem] text-ink-soft">3 torres · 18 unidades por torre</p>
                    <h3 class="display mt-4 text-3xl font-light text-ink sm:text-4xl">Departamentos <em>Real del Mar</em></h3>
                    <p class="mt-6 leading-relaxed text-ink-soft">
                        54 departamentos distribuidos en tres torres íntimas, con terrazas
                        generosas y vistas panorámicas al mar y al campo de golf. Dos
                        tipologías pensadas para distintos momentos de vida — todas con la
                        misma vocación: abrir el horizonte.
                    </p>
                </div>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach ([
                    [
                        'nombre' => 'Modelo A',
                        'm2' => '144 m²',
                        'specs' => ['2 recámaras + Flex', '3 baños', '2 estacionamientos', 'Terrazas de 23 m² hasta 184 m²', 'Vistas panorámicas al mar y al campo de golf'],
                    ],
                    [
                        'nombre' => 'Modelo B',
                        'm2' => '102 m²',
                        'specs' => ['1 recámara', '1.5 baños', '1 estacionamiento', 'Terrazas de 18 m² hasta 38 m²', 'Vistas panorámicas al mar y al campo de golf'],
                    ],
                ] as $modelo)
                    <div class="group rounded-2xl border border-ink/8 bg-sand-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink/5 lg:p-10">
                        <div class="flex items-baseline justify-between gap-4">
                            <h4 class="display text-2xl text-ink">{{ $modelo['nombre'] }}</h4>
                            <p class="display text-3xl font-light text-terra-500">{{ $modelo['m2'] }}</p>
                        </div>
                        <p class="eyebrow mt-1 text-[0.55rem] text-ink-soft">+ terrazas variables</p>
                        <ul class="mt-7 space-y-3">
                            @foreach ($modelo['specs'] as $spec)
                                <li class="flex items-center gap-3 text-sm text-ink-soft">
                                    <span class="h-1 w-1 rounded-full bg-terra-400"></span>{{ $spec }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
