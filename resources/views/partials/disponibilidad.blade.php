{{-- ============================== DISPONIBILIDAD (interactive site plan) ============================== --}}
@php
    $lots = json_decode(file_get_contents(resource_path('data/lots.json')), true) ?: [];
    $avail = collect($lots)->where('status', 'available')->count();
    $sold = collect($lots)->where('status', 'sold')->count();
    $reserved = collect($lots)->where('status', 'reserved')->count();
@endphp

<section id="disponibilidad" class="bg-ocean-950 py-24 lg:py-32"
    x-data="{
        filter: 'all',
        active: null,
        tiltX: 0, tiltY: 0,
        shown(s) { return this.filter === 'all' || this.filter === s; },
        pick(l) { this.active = l; },
        tilt(e) {
            const r = this.$refs.stage.getBoundingClientRect();
            this.tiltY = (((e.clientX - r.left) / r.width) - 0.5) * 6;
            this.tiltX = -(((e.clientY - r.top) / r.height) - 0.5) * 6;
        },
        reset() { this.tiltX = 0; this.tiltY = 0; },
    }">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        {{-- Header --}}
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-300"><x-t><x-slot:es>Disponibilidad</x-slot:es><x-slot:en>Availability</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-sand-50 sm:text-5xl">
                <x-t>
                    <x-slot:es>Encuentra tu casa <em>en el plano</em></x-slot:es>
                    <x-slot:en>Find your home <em>on the plan</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mt-6 text-lg leading-relaxed text-sand-100/70">
                <x-t>
                    <x-slot:es>Explora las 37 residencias de Casas Candé. Pasa el cursor o toca cada lote para ver su estado y superficie.</x-slot:es>
                    <x-slot:en>Explore the 37 Casas Candé residences. Hover or tap any lot to see its status and area.</x-slot:en>
                </x-t>
            </p>
        </div>

        {{-- Filter chips + live counts --}}
        <div class="reveal mt-10 flex flex-wrap items-center justify-center gap-3">
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
                <div x-ref="stage"
                    @mousemove="tilt($event)" @mouseleave="reset()"
                    class="plan-tilt relative mx-auto w-full max-w-xl"
                    :style="`transform: perspective(1200px) rotateX(${tiltX}deg) rotateY(${tiltY}deg)`">
                    {{-- Line-art background --}}
                    <img src="{{ asset('images/casas-plan.svg') }}" alt=""
                        class="pointer-events-none absolute inset-0 h-full w-full opacity-30 invert">
                    {{-- Interactive lots --}}
                    <svg viewBox="0 0 892.4 866.64" class="relative w-full" xmlns="http://www.w3.org/2000/svg">
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
                    {{-- Empty state --}}
                    <template x-if="!active">
                        <div class="py-6">
                            <p class="eyebrow text-[0.6rem] text-ocean-300"><x-t><x-slot:es>Casas Candé</x-slot:es><x-slot:en>Casas Candé</x-slot:en></x-t></p>
                            <p class="display mt-3 text-2xl font-light text-sand-50">
                                <x-t>
                                    <x-slot:es>Selecciona un lote para ver los detalles</x-slot:es>
                                    <x-slot:en>Select a lot to see the details</x-slot:en>
                                </x-t>
                            </p>
                            <div class="mt-8 space-y-3 border-t border-sand-50/10 pt-6">
                                <p class="flex items-center gap-3 text-sm text-sand-100/80"><span class="h-3 w-3 rounded-sm" style="background: var(--color-terra-400)"></span><x-t><x-slot:es>Disponible</x-slot:es><x-slot:en>Available</x-slot:en></x-t></p>
                                <p class="flex items-center gap-3 text-sm text-sand-100/80"><span class="h-3 w-3 rounded-sm" style="background: var(--color-stone-warm)"></span><x-t><x-slot:es>Vendida</x-slot:es><x-slot:en>Sold</x-slot:en></x-t></p>
                            </div>
                        </div>
                    </template>

                    {{-- Selected lot --}}
                    <template x-if="active">
                        <div class="py-2">
                            <div class="flex items-center justify-between">
                                <p class="eyebrow text-[0.6rem] text-ocean-300">Casas Candé</p>
                                <span class="eyebrow rounded-full px-3 py-1 text-[0.5rem]"
                                    :class="active && active.status === 'available' ? 'bg-terra-400/20 text-terra-300' : 'bg-sand-50/10 text-sand-200/60'">
                                    <span x-show="active && active.status === 'available'"><span class="lang-es">Disponible</span><span class="lang-en">Available</span></span>
                                    <span x-show="active && active.status === 'sold'"><span class="lang-es">Vendida</span><span class="lang-en">Sold</span></span>
                                    <span x-show="active && active.status === 'reserved'"><span class="lang-es">Reservada</span><span class="lang-en">Reserved</span></span>
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
</section>
