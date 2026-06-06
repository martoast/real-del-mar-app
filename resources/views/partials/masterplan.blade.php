{{-- ============================== MASTERPLAN ============================== --}}
<section id="masterplan" class="py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500">Masterplan</p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                Un plan maestro <em>pensado para el mar</em>
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-ink-soft">
                37 casas, 3 torres de departamentos, campo de golf y una comunidad
                completa — organizados en 3 etapas que armonizan con el paisaje.
            </p>
        </div>

        <div class="reveal relative mt-14 overflow-hidden rounded-2xl">
            <img src="{{ asset('images/masterplan.png') }}" alt="Masterplan aéreo de Real del Mar"
                class="w-full object-cover">
            <div class="absolute inset-0 ring-1 ring-inset ring-ink/10"></div>
        </div>

        <div class="reveal-group mt-10 grid gap-px overflow-hidden rounded-2xl border border-ink/8 bg-ink/8 sm:grid-cols-4">
            @foreach ([
                ['n' => '37', 'l' => 'Casas Candé'],
                ['n' => '3', 'l' => 'Torres · 54 departamentos'],
                ['n' => '3', 'l' => 'Etapas de desarrollo'],
                ['n' => '9', 'l' => 'Amenidades de comunidad'],
            ] as $dato)
                <div class="bg-sand-50 px-6 py-8 text-center">
                    <p class="display text-4xl font-light text-ink">{{ $dato['n'] }}</p>
                    <p class="eyebrow mt-2 text-[0.55rem] text-ink-soft">{{ $dato['l'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
