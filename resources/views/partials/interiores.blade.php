{{-- ============================== INTERIORES / ACABADOS ============================== --}}
<section class="py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-start gap-16 lg:grid-cols-12">
            {{-- Sticky copy column --}}
            <div class="reveal-group lg:sticky lg:top-32 lg:col-span-5">
                <p class="eyebrow text-terra-500"><x-t><x-slot:es>Interiores</x-slot:es><x-slot:en>Interiors</x-slot:en></x-t></p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                    <x-t>
                        <x-slot:es>Materiales que <em>elevan</em> el habitar</x-slot:es>
                        <x-slot:en>Materials that <em>elevate</em> living</x-slot:en>
                    </x-t>
                </h2>
                <p class="mt-8 leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>Los interiores combinan materiales elegantes y naturales para crear espacios equilibrados y sofisticados. Muros claros y texturizados generan profundidad visual, mientras los pisos de madera aportan calidez y atemporalidad. Los techos con vigas refuerzan el carácter arquitectónico del diseño.</x-slot:es>
                        <x-slot:en>The interiors combine elegant, natural materials to create balanced, sophisticated spaces. Light, textured walls add visual depth, while wood floors bring warmth and timelessness. Beamed ceilings reinforce the architectural character of the design.</x-slot:en>
                    </x-t>
                </p>

                {{-- Material chips --}}
                <div class="mt-10 flex flex-wrap gap-2.5">
                    @foreach ([
                        ['es' => 'Piedra Galarza', 'en' => 'Galarza stone'],
                        ['es' => 'Madera de roble natural', 'en' => 'Natural oak wood'],
                        ['es' => 'Teja San Cristóbal', 'en' => 'San Cristóbal roof tile'],
                        ['es' => 'Travertino en espiga', 'en' => 'Herringbone travertine'],
                        ['es' => 'Cancelería negra', 'en' => 'Black window frames'],
                        ['es' => 'Porcelana 60×60', 'en' => '60×60 porcelain'],
                        ['es' => 'Grifería negro mate', 'en' => 'Matte black fixtures'],
                        ['es' => 'Vigas de madera', 'en' => 'Wood beams'],
                    ] as $material)
                        <span class="rounded-full border border-ink/10 bg-sand-100 px-4 py-2 text-xs font-medium text-ink-soft"><span class="lang-es">{{ $material['es'] }}</span><span class="lang-en">{{ $material['en'] }}</span></span>
                    @endforeach
                </div>

                <ul class="mt-10 space-y-4 border-t border-ink/8 pt-8 text-sm text-ink-soft">
                    <li class="flex gap-3"><span class="text-terra-500">—</span> <span><x-t><x-slot:es>Incluye mueble de cocina, gabinetes y closets de madera acabado roble</x-slot:es><x-slot:en>Includes kitchen cabinetry, cupboards, and oak-finish wood closets</x-slot:en></x-t></span></li>
                    <li class="flex gap-3"><span class="text-terra-500">—</span> <span><x-t><x-slot:es>Preparación y ductos para aire acondicionado mini split</x-slot:es><x-slot:en>Prep work and ducting for mini-split air conditioning</x-slot:en></x-t></span></li>
                    <li class="flex gap-3"><span class="text-terra-500">—</span> <span><x-t><x-slot:es>Cisterna incluida en cada residencia</x-slot:es><x-slot:en>Water cistern included in every residence</x-slot:en></x-t></span></li>
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
                            <x-t>
                                <x-slot:es>"Los acabados no solo embellecen — <em>elevan la experiencia de habitar</em>."</x-slot:es>
                                <x-slot:en>"The finishes don't just beautify — <em>they elevate the experience of living</em>."</x-slot:en>
                            </x-t>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
