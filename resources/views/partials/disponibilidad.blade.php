{{-- ============================== DISPONIBILIDAD (interactive site plan) ============================== --}}
@php
    $lots = json_decode(file_get_contents(resource_path('data/lots.json')), true) ?: [];
    $avail = collect($lots)->where('status', 'available')->count();
    $sold = collect($lots)->where('status', 'sold')->count();

    $apts = json_decode(file_get_contents(resource_path('data/apartments.json')), true) ?: [];
    $aAvail = collect($apts)->where('status', 'available')->count();
    $aSold = collect($apts)->where('status', 'sold')->count();
@endphp

<section id="disponibilidad" class="bg-ocean-950 py-24 lg:py-32"
    x-data="{
        filter: 'all',
        active: null,
        shown(s) { return this.filter === 'all' || this.filter === s; },
        pick(l) { this.active = l; },
    }">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        {{-- Header --}}
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-300"><x-t><x-slot:es>Disponibilidad</x-slot:es><x-slot:en>Availability</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-sand-50 sm:text-5xl">
                <span x-show="$store.product.tab === 'casas'">
                    <x-t><x-slot:es>Encuentra tu casa <em>en el plano</em></x-slot:es><x-slot:en>Find your home <em>on the plan</em></x-slot:en></x-t>
                </span>
                <span x-show="$store.product.tab === 'depas'">
                    <x-t><x-slot:es>Encuentra tu departamento <em>en las torres</em></x-slot:es><x-slot:en>Find your apartment <em>in the towers</em></x-slot:en></x-t>
                </span>
            </h2>
            <p class="mt-6 text-lg leading-relaxed text-sand-100/70">
                <x-t>
                    <x-slot:es>Pasa el cursor o toca cada unidad para ver su estado y superficie.</x-slot:es>
                    <x-slot:en>Hover or tap any unit to see its status and area.</x-slot:en>
                </x-t>
            </p>
        </div>

        {{-- Product toggle (mirrors Residencias via the shared store) --}}
        <div class="reveal mt-8 flex justify-center">
            <div class="inline-flex rounded-full border border-sand-50/15 bg-ocean-900/60 p-1.5">
                <button @click="$store.product.tab = 'casas'; active = null"
                    class="eyebrow rounded-full px-6 py-2.5 text-[0.6rem] transition-all duration-300"
                    :class="$store.product.tab === 'casas' ? 'bg-sand-50 text-ink' : 'text-sand-200/70 hover:text-sand-50'"
                >Casas Candé</button>
                <button @click="$store.product.tab = 'depas'; active = null"
                    class="eyebrow rounded-full px-6 py-2.5 text-[0.6rem] transition-all duration-300"
                    :class="$store.product.tab === 'depas' ? 'bg-sand-50 text-ink' : 'text-sand-200/70 hover:text-sand-50'"
                ><span class="lang-es">Departamentos</span><span class="lang-en">Apartments</span></button>
            </div>
        </div>

        {{-- ============ CASAS PLAN ============ --}}
        <div x-show="$store.product.tab === 'casas'"
             x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">

            {{-- Filter chips + live counts --}}
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                @foreach ([
                    ['k' => 'all', 'es' => 'Todas', 'en' => 'All', 'n' => count($lots)],
                    ['k' => 'available', 'es' => 'Disponibles', 'en' => 'Available', 'n' => $avail],
                    ['k' => 'sold', 'es' => 'Vendidas', 'en' => 'Sold', 'n' => $sold],
                ] as $chip)
                    <button @click="filter = '{{ $chip['k'] }}'"
                        class="eyebrow flex items-center gap-2 rounded-full border px-5 py-2.5 text-[0.6rem] transition-colors duration-300"
                        :class="filter === '{{ $chip['k'] }}' ? 'border-terra-400 bg-terra-400/15 text-sand-50' : 'border-sand-50/15 text-sand-200/70 hover:border-sand-50/40'">
                        <span class="lang-es">{{ $chip['es'] }}</span><span class="lang-en">{{ $chip['en'] }}</span>
                        <span class="text-sand-200/50">{{ $chip['n'] }}</span>
                    </button>
                @endforeach
            </div>

            <div class="mt-12 grid items-center gap-10 lg:grid-cols-5 lg:gap-12">
                {{-- The plan (3D tilt) --}}
                <div class="lg:col-span-3">
                    <div class="relative mx-auto w-full max-w-xl">
                        {{-- Line-art background --}}
                        <img src="{{ asset('images/casas-plan.svg') }}" alt=""
                            class="pointer-events-none absolute inset-0 h-full w-full opacity-60 invert">
                        {{-- Interactive lots --}}
                        <svg viewBox="0 0 892.4 866.64" class="plan-svg relative w-full" xmlns="http://www.w3.org/2000/svg">
                            @foreach ($lots as $lot)
                                <path d="{{ $lot['d'] }}"
                                    class="plan-lot plan-lot--{{ $lot['status'] }}"
                                    :class="{ 'is-dim': !shown('{{ $lot['status'] }}') }"
                                    @mouseenter="pick({ n: '{{ $lot['n'] }}', m2: {{ $lot['m2'] ?? 'null' }}, status: '{{ $lot['status'] }}' })"
                                    @click="pick({ n: '{{ $lot['n'] }}', m2: {{ $lot['m2'] ?? 'null' }}, status: '{{ $lot['status'] }}' })"
                                ></path>
                            @endforeach
                        </svg>
                    </div>
                </div>

                {{-- Detail panel --}}
                <div class="lg:col-span-2">
                    <div class="rounded-2xl border border-sand-50/15 bg-ocean-900/60 p-8 backdrop-blur-sm lg:p-10">
                        <template x-if="!active">
                            <div class="py-6">
                                <p class="eyebrow text-[0.6rem] text-ocean-300">Casas Candé</p>
                                <p class="display mt-3 text-2xl font-light text-sand-50">
                                    <x-t><x-slot:es>Selecciona un lote para ver los detalles</x-slot:es><x-slot:en>Select a lot to see the details</x-slot:en></x-t>
                                </p>
                                <div class="mt-8 space-y-3 border-t border-sand-50/10 pt-6">
                                    <p class="flex items-center gap-3 text-sm text-sand-100/80"><span class="h-3 w-3 rounded-sm" style="background: var(--color-terra-400)"></span><x-t><x-slot:es>Disponible</x-slot:es><x-slot:en>Available</x-slot:en></x-t></p>
                                    <p class="flex items-center gap-3 text-sm text-sand-100/80"><span class="h-3 w-3 rounded-sm" style="background: var(--color-stone-warm)"></span><x-t><x-slot:es>Vendida</x-slot:es><x-slot:en>Sold</x-slot:en></x-t></p>
                                </div>
                            </div>
                        </template>
                        <template x-if="active">
                            <div class="py-2">
                                <div class="flex items-center justify-between">
                                    <p class="eyebrow text-[0.6rem] text-ocean-300">Casas Candé</p>
                                    <span class="eyebrow rounded-full px-3 py-1 text-[0.5rem]"
                                        :class="active && active.status === 'available' ? 'bg-terra-400/20 text-terra-300' : 'bg-sand-50/10 text-sand-200/60'">
                                        <span x-show="active && active.status === 'available'"><span class="lang-es">Disponible</span><span class="lang-en">Available</span></span>
                                        <span x-show="active && active.status === 'sold'"><span class="lang-es">Vendida</span><span class="lang-en">Sold</span></span>
                                    </span>
                                </div>
                                <p class="display mt-3 text-5xl font-light text-sand-50">
                                    <span class="lang-es">Casa</span><span class="lang-en">House</span> <span x-text="active && active.n"></span>
                                </p>
                                <div class="mt-6 border-t border-sand-50/10 pt-6" x-show="active && active.m2">
                                    <p class="display text-3xl font-light text-terra-300"><span x-text="active && active.m2"></span> m²</p>
                                    <p class="eyebrow mt-1 text-[0.55rem] text-sand-200/60"><x-t><x-slot:es>de terreno</x-slot:es><x-slot:en>of land</x-slot:en></x-t></p>
                                </div>
                                <a href="#contacto"
                                    class="eyebrow mt-8 inline-flex w-full items-center justify-center rounded-full px-6 py-4 text-[0.65rem] transition-all duration-300"
                                    :class="active && active.status === 'available' ? 'bg-terra-500 text-sand-50 hover:bg-terra-600' : 'border border-sand-50/20 text-sand-200/70 hover:border-sand-50/40'">
                                    <span x-show="active && active.status === 'available'"><span class="lang-es">Solicitar información</span><span class="lang-en">Request information</span></span>
                                    <span x-show="active && active.status !== 'available'"><span class="lang-es">Ver otras opciones</span><span class="lang-en">See other options</span></span>
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============ DEPARTAMENTOS PLAN ============ --}}
        <div x-show="$store.product.tab === 'depas'" x-cloak
             x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">

            {{-- Filter chips + live counts --}}
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                @foreach ([
                    ['k' => 'all', 'es' => 'Todos', 'en' => 'All', 'n' => count($apts)],
                    ['k' => 'available', 'es' => 'Disponibles', 'en' => 'Available', 'n' => $aAvail],
                    ['k' => 'sold', 'es' => 'Vendidos', 'en' => 'Sold', 'n' => $aSold],
                ] as $chip)
                    <button @click="filter = '{{ $chip['k'] }}'"
                        class="eyebrow flex items-center gap-2 rounded-full border px-5 py-2.5 text-[0.6rem] transition-colors duration-300"
                        :class="filter === '{{ $chip['k'] }}' ? 'border-terra-400 bg-terra-400/15 text-sand-50' : 'border-sand-50/15 text-sand-200/70 hover:border-sand-50/40'">
                        <span class="lang-es">{{ $chip['es'] }}</span><span class="lang-en">{{ $chip['en'] }}</span>
                        <span class="text-sand-200/50">{{ $chip['n'] }}</span>
                    </button>
                @endforeach
            </div>

            <div class="mt-12 grid items-center gap-10 lg:grid-cols-5 lg:gap-12">
                {{-- The elevation plan (directly on the band, like the houses plan) --}}
                <div class="lg:col-span-3">
                    <div class="relative mx-auto w-full max-w-2xl">
                        <img src="{{ asset('images/departamentos-plan.svg') }}" alt="Plano de elevación de las torres de Real del Mar"
                            class="pointer-events-none absolute inset-0 h-full w-full opacity-60 invert">
                        <svg viewBox="0 0 1580.7 800.6" class="relative w-full" xmlns="http://www.w3.org/2000/svg">
                            @foreach ($apts as $apt)
                                <path d="{{ $apt['d'] }}"
                                    class="plan-unit plan-unit--{{ $apt['status'] }}"
                                    :class="{ 'is-dim': !shown('{{ $apt['status'] }}') }"
                                    @mouseenter="pick({ n: '{{ $apt['n'] }}', m2: {{ $apt['m2'] ?? 'null' }}, status: '{{ $apt['status'] }}' })"
                                    @click="pick({ n: '{{ $apt['n'] }}', m2: {{ $apt['m2'] ?? 'null' }}, status: '{{ $apt['status'] }}' })"
                                ></path>
                            @endforeach
                        </svg>
                    </div>
                </div>

                {{-- Detail panel --}}
                <div class="lg:col-span-2">
                    <div class="rounded-2xl border border-sand-50/15 bg-ocean-900/60 p-8 backdrop-blur-sm lg:p-10">
                        <template x-if="!active">
                            <div class="py-6">
                                <p class="eyebrow text-[0.6rem] text-ocean-300"><x-t><x-slot:es>Departamentos · 3 torres</x-slot:es><x-slot:en>Apartments · 3 towers</x-slot:en></x-t></p>
                                <p class="display mt-3 text-2xl font-light text-sand-50">
                                    <x-t><x-slot:es>Selecciona un departamento para ver los detalles</x-slot:es><x-slot:en>Select an apartment to see the details</x-slot:en></x-t>
                                </p>
                                <div class="mt-8 space-y-3 border-t border-sand-50/10 pt-6">
                                    <p class="flex items-center gap-3 text-sm text-sand-100/80"><span class="h-3 w-3 rounded-sm" style="background: var(--color-terra-400)"></span><x-t><x-slot:es>Disponible</x-slot:es><x-slot:en>Available</x-slot:en></x-t></p>
                                    <p class="flex items-center gap-3 text-sm text-sand-100/80"><span class="h-3 w-3 rounded-sm" style="background: var(--color-stone-warm)"></span><x-t><x-slot:es>Vendido</x-slot:es><x-slot:en>Sold</x-slot:en></x-t></p>
                                </div>
                            </div>
                        </template>
                        <template x-if="active">
                            <div class="py-2">
                                <div class="flex items-center justify-between">
                                    <p class="eyebrow text-[0.6rem] text-ocean-300"><x-t><x-slot:es>Departamentos</x-slot:es><x-slot:en>Apartments</x-slot:en></x-t></p>
                                    <span class="eyebrow rounded-full px-3 py-1 text-[0.5rem]"
                                        :class="active && active.status === 'available' ? 'bg-terra-400/20 text-terra-300' : 'bg-sand-50/10 text-sand-200/60'">
                                        <span x-show="active && active.status === 'available'"><span class="lang-es">Disponible</span><span class="lang-en">Available</span></span>
                                        <span x-show="active && active.status === 'sold'"><span class="lang-es">Vendido</span><span class="lang-en">Sold</span></span>
                                    </span>
                                </div>
                                <p class="display mt-3 text-5xl font-light text-sand-50">
                                    <span class="lang-es">Depto.</span><span class="lang-en">Apt.</span> <span x-text="active && active.n"></span>
                                </p>
                                <div class="mt-6 border-t border-sand-50/10 pt-6" x-show="active && active.m2">
                                    <p class="display text-3xl font-light text-terra-300"><span x-text="active && active.m2"></span> m²</p>
                                </div>
                                <a href="#contacto"
                                    class="eyebrow mt-8 inline-flex w-full items-center justify-center rounded-full px-6 py-4 text-[0.65rem] transition-all duration-300"
                                    :class="active && active.status === 'available' ? 'bg-terra-500 text-sand-50 hover:bg-terra-600' : 'border border-sand-50/20 text-sand-200/70 hover:border-sand-50/40'">
                                    <span x-show="active && active.status === 'available'"><span class="lang-es">Solicitar información</span><span class="lang-en">Request information</span></span>
                                    <span x-show="active && active.status !== 'available'"><span class="lang-es">Ver otras opciones</span><span class="lang-en">See other options</span></span>
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
