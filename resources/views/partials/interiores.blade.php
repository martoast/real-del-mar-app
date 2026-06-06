{{-- ============================== INTERIORES / ACABADOS ============================== --}}
<section class="py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-start gap-16 lg:grid-cols-12">
            {{-- Sticky copy column --}}
            <div class="reveal-group lg:sticky lg:top-32 lg:col-span-5">
                <p class="eyebrow text-terra-500">Interiores</p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                    Materiales que <em>elevan</em> el habitar
                </h2>
                <p class="mt-8 leading-relaxed text-ink-soft">
                    Los interiores combinan materiales elegantes y naturales para crear
                    espacios equilibrados y sofisticados. Muros claros y texturizados
                    generan profundidad visual, mientras los pisos de madera aportan
                    calidez y atemporalidad. Los techos con vigas refuerzan el carácter
                    arquitectónico del diseño.
                </p>

                {{-- Material chips --}}
                <div class="mt-10 flex flex-wrap gap-2.5">
                    @foreach ([
                        'Piedra Galarza',
                        'Madera de roble natural',
                        'Teja San Cristóbal',
                        'Travertino en espiga',
                        'Cancelería negra',
                        'Porcelana 60×60',
                        'Grifería negro mate',
                        'Vigas de madera',
                    ] as $material)
                        <span class="rounded-full border border-ink/10 bg-sand-100 px-4 py-2 text-xs font-medium text-ink-soft">{{ $material }}</span>
                    @endforeach
                </div>

                <ul class="mt-10 space-y-4 border-t border-ink/8 pt-8 text-sm text-ink-soft">
                    <li class="flex gap-3"><span class="text-terra-500">—</span> Incluye mueble de cocina, gabinetes y closets de madera acabado roble</li>
                    <li class="flex gap-3"><span class="text-terra-500">—</span> Preparación y ductos para aire acondicionado mini split</li>
                    <li class="flex gap-3"><span class="text-terra-500">—</span> Cisterna incluida en cada residencia</li>
                </ul>
            </div>

            {{-- Image column --}}
            <div class="space-y-8 lg:col-span-7">
                <div class="reveal overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/interior-living.png') }}" alt="Sala con pisos de roble, vigas de madera y vista al mar"
                        class="aspect-[16/11] w-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div class="reveal grid gap-8 sm:grid-cols-5">
                    <div class="overflow-hidden rounded-2xl sm:col-span-3">
                        <img src="{{ asset('images/interior-bano.png') }}" alt="Baño con acabados beige y grifería negro mate"
                            class="aspect-[4/3] h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                    <div class="flex flex-col justify-center rounded-2xl bg-ocean-900 p-8 sm:col-span-2">
                        <p class="display text-xl leading-snug text-sand-50">
                            "Los acabados no solo embellecen — <em>elevan la experiencia de habitar</em>."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
