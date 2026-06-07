<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Real del Mar — Vive frente al Pacífico · Rosarito, Baja California' }}</title>
    <meta name="description" content="{{ $description ?? 'Real del Mar es un desarrollo integral frente al Pacífico en la zona costa de Baja California. Casas y departamentos de alto nivel con vistas al mar y al campo de golf.' }}">

    <meta property="og:title" content="Real del Mar — Vive frente al Pacífico">
    <meta property="og:description" content="Desarrollo integral frente al Pacífico en Rosarito, Baja California. Respaldado por Grupo FRISA, diseñado por Cuaik.">
    <meta property="og:image" content="{{ asset('images/hero.png') }}">
    <meta property="og:type" content="website">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{ navSolid: false, navOpen: false }"
    @scroll.window.passive="navSolid = window.scrollY > 40"
    :class="navOpen ? 'overflow-hidden lg:overflow-auto' : ''"
>

    {{-- ============================== NAV ============================== --}}
    <header
        class="fixed inset-x-0 top-0 z-50 transition-all duration-500"
        :class="navSolid || navOpen ? 'bg-sand-50/95 backdrop-blur-sm shadow-[0_1px_0_0_rgba(35,32,25,0.08)]' : 'bg-transparent'"
    >
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-10">
            {{-- Logo --}}
            <a
                href="#"
                class="group relative z-50 flex items-center gap-3 transition-colors duration-500"
                :class="navSolid || navOpen ? 'text-ink' : 'text-sand-50'"
                aria-label="Real del Mar — inicio"
            >
                @include('partials.logo', ['class' => 'h-12 w-auto lg:h-14'])
                <span
                    class="eyebrow hidden border-l pl-3 text-[0.6rem] sm:inline transition-colors duration-500"
                    :class="navSolid || navOpen ? 'border-ink/15 text-ink-soft' : 'border-sand-50/25 text-sand-200'"
                >Baja California</span>
            </a>

            {{-- Desktop links --}}
            <div class="hidden items-center gap-8 lg:flex">
                @foreach ([
                    'Residencias' => '#residencias',
                    'Amenidades' => '#amenidades',
                    'Masterplan' => '#masterplan',
                    'Ubicación' => '#ubicacion',
                ] as $label => $href)
                    <a
                        href="{{ $href }}"
                        class="eyebrow text-[0.65rem] transition-colors duration-300"
                        :class="navSolid ? 'text-ink-soft hover:text-terra-500' : 'text-sand-100 hover:text-white'"
                    >{{ $label }}</a>
                @endforeach
                <a
                    href="#contacto"
                    class="eyebrow rounded-full px-5 py-2.5 text-[0.65rem] text-sand-50 transition-all duration-300 bg-terra-500 hover:bg-terra-600"
                >Agendar visita</a>
            </div>

            {{-- Mobile hamburger --}}
            <button
                class="relative z-50 flex h-10 w-10 flex-col items-center justify-center gap-1.5 lg:hidden"
                @click="navOpen = !navOpen"
                aria-label="Menú"
            >
                <span class="block h-px w-6 transition-all duration-300"
                    :class="[navOpen ? 'translate-y-[3.5px] rotate-45' : '', navSolid || navOpen ? 'bg-ink' : 'bg-sand-50']"></span>
                <span class="block h-px w-6 transition-all duration-300"
                    :class="[navOpen ? '-translate-y-[3.5px] -rotate-45' : '', navSolid || navOpen ? 'bg-ink' : 'bg-sand-50']"></span>
            </button>
        </nav>

        {{-- Mobile menu --}}
        <div
            x-show="navOpen"
            x-collapse.duration.400ms
            class="lg:hidden"
        >
            <div class="space-y-1 border-t border-ink/5 bg-sand-50 px-6 pb-8 pt-4">
                @foreach ([
                    'Residencias' => '#residencias',
                    'Amenidades' => '#amenidades',
                    'Masterplan' => '#masterplan',
                    'Ubicación' => '#ubicacion',
                ] as $label => $href)
                    <a href="{{ $href }}" @click="navOpen = false"
                        class="display block py-3 text-2xl text-ink transition-colors hover:text-terra-500">{{ $label }}</a>
                @endforeach
                <a href="#contacto" @click="navOpen = false"
                    class="eyebrow mt-4 inline-block rounded-full bg-terra-500 px-6 py-3 text-[0.65rem] text-sand-50">Agendar visita</a>
            </div>
        </div>
    </header>

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- ============================== FOOTER ============================== --}}
    <footer class="bg-ocean-950 text-sand-200">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-10">
            <div class="grid gap-12 md:grid-cols-3">
                <div class="text-sand-50">
                    @include('partials.logo', ['class' => 'h-10 w-auto'])
                    <p class="eyebrow mt-4 text-[0.6rem] text-ocean-300">Rosarito · Baja California · México</p>
                    <p class="mt-6 max-w-xs text-sm leading-relaxed text-sand-200/70">
                        Un desarrollo integral frente al Pacífico. Respaldado por Grupo FRISA,
                        diseñado por Cuaik.
                    </p>
                </div>
                <div>
                    <p class="eyebrow mb-5 text-[0.6rem] text-ocean-300">El desarrollo</p>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#esencia" class="transition-colors hover:text-terra-300">Esencia</a></li>
                        <li><a href="#residencias" class="transition-colors hover:text-terra-300">Casas Candé</a></li>
                        <li><a href="#residencias" class="transition-colors hover:text-terra-300">Departamentos</a></li>
                        <li><a href="#amenidades" class="transition-colors hover:text-terra-300">Amenidades</a></li>
                        <li><a href="#financiamiento" class="transition-colors hover:text-terra-300">Financiamiento</a></li>
                    </ul>
                </div>
                <div>
                    <p class="eyebrow mb-5 text-[0.6rem] text-ocean-300">Contacto</p>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#contacto" class="transition-colors hover:text-terra-300">Agendar visita</a></li>
                        <li><a href="https://wa.me/526610000000" target="_blank" rel="noopener" class="transition-colors hover:text-terra-300">WhatsApp</a></li>
                        <li><a href="https://www.cande.mx/" target="_blank" rel="noopener" class="transition-colors hover:text-terra-300">cande.mx</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-14 border-t border-sand-50/10 pt-8 text-xs leading-relaxed text-sand-200/50">
                <p>© {{ date('Y') }} Real del Mar. Todos los derechos reservados. · Aviso de Privacidad</p>
                <p class="mt-2">Las imágenes mostradas son representaciones ilustrativas del proyecto y pueden variar respecto al producto final. La información de tipologías, acabados y financiamiento está sujeta a cambios sin previo aviso.</p>
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp --}}
    <a
        href="https://wa.me/526610000000?text=Hola%2C%20me%20interesa%20Real%20del%20Mar%2C%20%C2%BFme%20pueden%20enviar%20informaci%C3%B3n%3F"
        target="_blank" rel="noopener"
        aria-label="WhatsApp"
        class="fixed bottom-6 right-6 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] shadow-lg shadow-ink/20 transition-transform duration-300 hover:scale-110"
    >
        <svg viewBox="0 0 24 24" class="h-7 w-7 fill-white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.298.297-.497.1-.198.05-.371-.025-.52-.074-.149-.668-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>

</body>
</html>
