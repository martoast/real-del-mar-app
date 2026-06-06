{{-- ============================== HERO ============================== --}}
<section class="grain relative flex min-h-svh items-end overflow-hidden bg-ocean-950">
    {{-- Backdrop --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/hero.png') }}"
            alt="Vista aérea de Real del Mar frente al Océano Pacífico"
            class="kenburns h-full w-full object-cover"
        >
        {{-- Readability gradients --}}
        <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/90 via-ocean-950/20 to-ocean-950/30"></div>
    </div>

    {{-- Copy --}}
    <div class="relative mx-auto w-full max-w-7xl px-6 pb-20 pt-40 lg:px-10 lg:pb-28">
        <div class="reveal-group is-revealed max-w-3xl">
            <p class="eyebrow mb-6 text-sand-200">Rosarito · Baja California</p>
            <h1 class="display text-5xl font-light text-sand-50 sm:text-6xl lg:text-[5.5rem]">
                Donde el Pacífico<br>
                <em>se convierte</em> en hogar
            </h1>
            <p class="mt-8 max-w-xl text-lg leading-relaxed text-sand-100/85">
                Un desarrollo integral frente al mar: arquitectura contemporánea,
                comunidad completa y un entorno natural privilegiado, a minutos
                de la frontera con San Diego.
            </p>
            <div class="mt-10 flex flex-wrap items-center gap-5">
                <a href="#residencias"
                    class="eyebrow rounded-full bg-terra-500 px-8 py-4 text-[0.65rem] text-sand-50 transition-all duration-300 hover:bg-terra-600 hover:shadow-lg hover:shadow-terra-500/25">
                    Conocer las residencias
                </a>
                <a href="#esencia"
                    class="eyebrow group flex items-center gap-3 text-[0.65rem] text-sand-100">
                    Descubrir más
                    <span class="block h-px w-10 bg-sand-100/60 transition-all duration-300 group-hover:w-16 group-hover:bg-terra-300"></span>
                </a>
            </div>
        </div>

        {{-- Stats strip --}}
        <div class="reveal mt-16 grid max-w-2xl grid-cols-3 gap-px overflow-hidden rounded-2xl border border-sand-50/15 bg-sand-50/10 backdrop-blur-md">
            @foreach ([
                ['n' => '37', 'l' => 'Casas frente al mar'],
                ['n' => '54', 'l' => 'Departamentos'],
                ['n' => '3', 'l' => 'Etapas de desarrollo'],
            ] as $stat)
                <div class="bg-ocean-950/30 px-5 py-5 text-center sm:px-8">
                    <p class="display text-3xl text-sand-50 sm:text-4xl">{{ $stat['n'] }}</p>
                    <p class="eyebrow mt-1.5 text-[0.55rem] text-sand-200/80">{{ $stat['l'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
