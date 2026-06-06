{{-- ============================== ESENCIA ============================== --}}
<section id="esencia" class="relative overflow-hidden py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-16 lg:grid-cols-12">
            {{-- Editorial copy --}}
            <div class="reveal-group lg:col-span-7">
                <p class="eyebrow text-terra-500">La esencia</p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl lg:text-6xl">
                    Arquitectura emocional,<br><em>frente al mar</em>
                </h2>
                <p class="mt-8 max-w-xl text-lg leading-relaxed text-ink-soft">
                    Real del Mar es un desarrollo integral frente al Pacífico que ofrece un
                    estilo de vida exclusivo en un entorno natural privilegiado. Combina
                    arquitectura contemporánea, planeación urbana de calidad y una comunidad
                    completa con residencias de alto nivel, áreas verdes y servicios
                    educativos, deportivos y de hospitalidad.
                </p>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-ink-soft">
                    Diseñado para armonizar con el paisaje, brinda seguridad, conectividad
                    y alto valor — tanto para vivir como para invertir.
                </p>
            </div>

            {{-- Offset image stack --}}
            <div class="reveal relative lg:col-span-5">
                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/terraza.png') }}" alt="Terraza con vista al Pacífico"
                        class="aspect-[4/5] w-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div class="absolute -bottom-8 -left-8 hidden w-48 overflow-hidden rounded-2xl border-4 border-sand-50 shadow-xl sm:block">
                    <img src="{{ asset('images/amenidad-firepit.png') }}" alt="Fire pit al atardecer"
                        class="aspect-square w-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
