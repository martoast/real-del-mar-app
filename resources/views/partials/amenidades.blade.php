{{-- ============================== AMENIDADES ============================== --}}
<section id="amenidades" class="bg-sand-100 py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-terra-500"><x-t><x-slot:es>Amenidades</x-slot:es><x-slot:en>Amenities</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>Eleva tu <em>día a día</em></x-slot:es>
                    <x-slot:en>Elevate your <em>everyday</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-ink-soft">
                <x-t>
                    <x-slot:es>Una comunidad completa pensada para compartir la mesa, moverte, descansar y vivir momentos — todo a unos pasos de casa.</x-slot:es>
                    <x-slot:en>A complete community made for sharing the table, staying active, resting, and living moments — all a few steps from home.</x-slot:en>
                </x-t>
            </p>
        </div>

        {{-- Featured amenity cards --}}
        <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['img' => 'amenidad-alberca.png', 'titulo_es' => 'Alberca & Casa Club', 'titulo_en' => 'Pool & Clubhouse', 'desc_es' => 'Borde infinito hacia el Pacífico, junto a la casa club y el gimnasio.', 'desc_en' => 'Infinity edge toward the Pacific, beside the clubhouse and gym.'],
                ['img' => 'amenidad-padel.png', 'titulo_es' => 'Pádel & Tenis', 'titulo_en' => 'Padel & Tennis', 'desc_es' => 'Canchas de pádel y tenis rodeadas de paisaje costero.', 'desc_en' => 'Padel and tennis courts surrounded by coastal landscape.'],
                ['img' => 'amenidad-firepit.png', 'titulo_es' => 'Fire pits & Asadores', 'titulo_en' => 'Fire pits & Grills', 'desc_es' => 'Tardes alrededor del fuego con el atardecer de fondo.', 'desc_en' => 'Evenings around the fire with the sunset as a backdrop.'],
            ] as $i => $amenidad)
                <div class="reveal group relative overflow-hidden rounded-2xl {{ $i === 0 ? 'md:col-span-2 lg:col-span-1' : '' }}">
                    <img src="{{ asset('images/' . $amenidad['img']) }}" alt="{{ $amenidad['titulo_es'] }}"
                        class="aspect-[4/5] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/85 via-ocean-950/10 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-7">
                        <h3 class="display text-2xl text-sand-50"><span class="lang-es">{{ $amenidad['titulo_es'] }}</span><span class="lang-en">{{ $amenidad['titulo_en'] }}</span></h3>
                        <p class="mt-2 max-w-xs text-sm leading-relaxed text-sand-100/80"><span class="lang-es">{{ $amenidad['desc_es'] }}</span><span class="lang-en">{{ $amenidad['desc_en'] }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Full amenity list --}}
        <div class="reveal-group mt-12 grid grid-cols-2 gap-x-8 gap-y-4 rounded-2xl border border-ink/8 bg-sand-50 p-8 sm:grid-cols-3 lg:p-10">
            @foreach ([
                ['es' => 'Casa Club', 'en' => 'Clubhouse'],
                ['es' => 'Gimnasio', 'en' => 'Gym'],
                ['es' => 'Alberca', 'en' => 'Pool'],
                ['es' => 'Cancha de tenis', 'en' => 'Tennis court'],
                ['es' => 'Cancha de pádel', 'en' => 'Padel court'],
                ['es' => 'Fire pits', 'en' => 'Fire pits'],
                ['es' => 'Asadores', 'en' => 'Grills'],
                ['es' => 'Juegos infantiles', 'en' => "Children's playground"],
                ['es' => 'Área de usos mixtos', 'en' => 'Mixed-use area'],
            ] as $amenidad)
                <p class="flex items-center gap-3 text-sm text-ink-soft">
                    <span class="h-1.5 w-1.5 rounded-full bg-terra-400"></span><span class="lang-es">{{ $amenidad['es'] }}</span><span class="lang-en">{{ $amenidad['en'] }}</span>
                </p>
            @endforeach
        </div>
    </div>
</section>
