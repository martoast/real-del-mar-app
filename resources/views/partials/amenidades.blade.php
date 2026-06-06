{{-- ============================== AMENIDADES ============================== --}}
<section id="amenidades" class="bg-sand-100 py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-terra-500">Amenidades</p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                Eleva tu <em>día a día</em>
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-ink-soft">
                Una comunidad completa pensada para compartir la mesa, moverte,
                descansar y vivir momentos — todo a unos pasos de casa.
            </p>
        </div>

        {{-- Featured amenity cards --}}
        <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['img' => 'amenidad-alberca.png', 'titulo' => 'Alberca & Casa Club', 'desc' => 'Borde infinito hacia el Pacífico, junto a la casa club y el gimnasio.'],
                ['img' => 'amenidad-padel.png', 'titulo' => 'Pádel & Tenis', 'desc' => 'Canchas de pádel y tenis rodeadas de paisaje costero.'],
                ['img' => 'amenidad-firepit.png', 'titulo' => 'Fire pits & Asadores', 'desc' => 'Tardes alrededor del fuego con el atardecer de fondo.'],
            ] as $i => $amenidad)
                <div class="reveal group relative overflow-hidden rounded-2xl {{ $i === 0 ? 'md:col-span-2 lg:col-span-1' : '' }}">
                    <img src="{{ asset('images/' . $amenidad['img']) }}" alt="{{ $amenidad['titulo'] }}"
                        class="aspect-[4/5] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/85 via-ocean-950/10 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-7">
                        <h3 class="display text-2xl text-sand-50">{{ $amenidad['titulo'] }}</h3>
                        <p class="mt-2 max-w-xs text-sm leading-relaxed text-sand-100/80">{{ $amenidad['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Full amenity list --}}
        <div class="reveal-group mt-12 grid grid-cols-2 gap-x-8 gap-y-4 rounded-2xl border border-ink/8 bg-sand-50 p-8 sm:grid-cols-3 lg:p-10">
            @foreach ([
                'Casa Club',
                'Gimnasio',
                'Alberca',
                'Cancha de tenis',
                'Cancha de pádel',
                'Fire pits',
                'Asadores',
                'Juegos infantiles',
                'Área de usos mixtos',
            ] as $amenidad)
                <p class="flex items-center gap-3 text-sm text-ink-soft">
                    <span class="h-1.5 w-1.5 rounded-full bg-terra-400"></span>{{ $amenidad }}
                </p>
            @endforeach
        </div>
    </div>
</section>
