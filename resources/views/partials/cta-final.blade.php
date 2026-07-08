{{-- ============================== CTA FINAL (blueprint: last emotional push back to the form) ============================== --}}
<section class="grain relative flex min-h-[80svh] items-center overflow-hidden bg-ocean-950">
    <div class="absolute inset-0">
        <img src="{{ asset('images/rdm-casa-fachada.jpg') }}" alt="Casa Candé al atardecer" loading="lazy"
            class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/90 via-ocean-950/45 to-ocean-950/55"></div>
    </div>
    <div class="relative mx-auto max-w-3xl px-6 text-center lg:px-10">
        <div class="reveal-group">
            <h2 class="display text-4xl font-light text-sand-50 drop-shadow-[0_2px_24px_rgba(10,26,38,0.6)] sm:text-5xl lg:text-6xl">
                <x-t>
                    <x-slot:es>Haz de Candé tu <em>próximo hogar</em></x-slot:es>
                    <x-slot:en>Make Candé your <em>next home</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-sand-100/90 drop-shadow-[0_2px_18px_rgba(10,26,38,0.6)]">
                <x-t>
                    <x-slot:es>Solicita disponibilidad, conoce las casas y departamentos, y agenda una visita a Candé dentro de Real del Mar.</x-slot:es>
                    <x-slot:en>Request availability, explore the homes and apartments, and schedule a visit to Candé within Real del Mar.</x-slot:en>
                </x-t>
            </p>
            <div class="mt-9 flex flex-col justify-center gap-3 sm:flex-row sm:items-center">
                <a href="#contacto" class="eyebrow inline-flex items-center justify-center rounded-full bg-terra-500 px-8 py-4 text-[0.7rem] text-sand-50 transition-colors hover:bg-terra-600">
                    <x-t><x-slot:es>Solicitar disponibilidad</x-slot:es><x-slot:en>Request availability</x-slot:en></x-t>
                </a>
                <a href="#contacto" class="eyebrow inline-flex items-center justify-center rounded-full border border-sand-50/40 px-8 py-4 text-[0.7rem] text-sand-50 transition-colors hover:bg-sand-50/10">
                    <x-t><x-slot:es>Agendar visita</x-slot:es><x-slot:en>Schedule a visit</x-slot:en></x-t>
                </a>
            </div>
        </div>
    </div>
</section>
