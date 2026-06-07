{{-- ============================== MASTERPLAN ============================== --}}
<section id="masterplan" class="py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500">Masterplan</p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>Un plan maestro <em>pensado para el mar</em></x-slot:es>
                    <x-slot:en>A master plan <em>made for the sea</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-ink-soft">
                <x-t>
                    <x-slot:es>37 casas, 3 torres de departamentos, campo de golf y una comunidad completa — organizados en 3 etapas que armonizan con el paisaje.</x-slot:es>
                    <x-slot:en>37 houses, 3 apartment towers, a golf course, and a complete community — organized into 3 phases that harmonize with the landscape.</x-slot:en>
                </x-t>
            </p>
        </div>

        <div class="reveal relative mt-14 overflow-hidden rounded-2xl">
            <img src="{{ asset('images/masterplan.png') }}" alt="Masterplan aéreo de Real del Mar"
                class="w-full object-cover">
            <div class="absolute inset-0 ring-1 ring-inset ring-ink/10"></div>
        </div>

        <div class="reveal-group mt-10 grid gap-px overflow-hidden rounded-2xl border border-ink/8 bg-ink/8 sm:grid-cols-4">
            @foreach ([
                ['n' => '37', 'es' => 'Casas Candé', 'en' => 'Candé houses'],
                ['n' => '3', 'es' => 'Torres · 54 departamentos', 'en' => 'Towers · 54 apartments'],
                ['n' => '3', 'es' => 'Etapas de desarrollo', 'en' => 'Development phases'],
                ['n' => '9', 'es' => 'Amenidades de comunidad', 'en' => 'Community amenities'],
            ] as $dato)
                <div class="bg-sand-50 px-6 py-8 text-center">
                    <p class="display text-4xl font-light text-ink">{{ $dato['n'] }}</p>
                    <p class="eyebrow mt-2 text-[0.55rem] text-ink-soft"><span class="lang-es">{{ $dato['es'] }}</span><span class="lang-en">{{ $dato['en'] }}</span></p>
                </div>
            @endforeach
        </div>
    </div>
</section>
