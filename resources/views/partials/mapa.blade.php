{{-- ============================== MAPA (location map) ============================== --}}
<section id="mapa" class="bg-sand-100 py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto mb-14 max-w-2xl text-center">
            <p class="eyebrow text-terra-500"><x-t><x-slot:es>En el mapa</x-slot:es><x-slot:en>On the map</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>Encuentra tu lugar <em>en la costa</em></x-slot:es>
                    <x-slot:en>Find your place <em>on the coast</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mt-6 text-lg leading-relaxed text-ink-soft">
                <x-t>
                    <x-slot:es>Real del Mar se ubica sobre la zona costa de Baja California, a minutos de Rosarito, Tijuana y la frontera con San Diego.</x-slot:es>
                    <x-slot:en>Real del Mar sits along the Baja California coast, minutes from Rosarito, Tijuana, and the San Diego border.</x-slot:en>
                </x-t>
            </p>
        </div>

        <div class="reveal mx-auto max-w-3xl overflow-hidden rounded-2xl border border-ink/8 bg-sand-50 p-4 sm:p-8">
            <img
                src="{{ asset('images/mapa.svg') }}"
                alt="Mapa de ubicación de Real del Mar en la zona costa de Baja California"
                loading="lazy"
                class="mx-auto h-auto w-full"
            >
        </div>
    </div>
</section>
