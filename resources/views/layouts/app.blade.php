<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Set language before paint so there's no flash of the wrong language --}}
    <script>
        (function () {
            try {
                var l = localStorage.getItem('rdm_lang') || 'es';
                document.documentElement.setAttribute('data-lang', l);
                document.documentElement.setAttribute('lang', l);
            } catch (e) {
                document.documentElement.setAttribute('data-lang', 'es');
            }
        })();
    </script>

    {{-- Lock scroll during the first-load preloader (safety-unlocks after 14s) --}}
    <script>
        document.documentElement.classList.add('is-loading');
        setTimeout(function () { document.documentElement.classList.remove('is-loading'); }, 14000);
    </script>

    @php $siteUrl = rtrim(config('app.url'), '/'); @endphp
    <title>{{ $title ?? 'Candé by FRISA · Real del Mar — Casas y departamentos frente al Pacífico' }}</title>
    <meta name="description" content="{{ $description ?? 'Candé by FRISA es una etapa residencial de lujo dentro de Real del Mar: 37 casas y 54 departamentos con vistas al mar, campo de golf y un estilo de vida tipo resort en Baja California.' }}">
    <link rel="canonical" href="{{ $siteUrl }}/">

    {{-- Open Graph (WhatsApp, Facebook, iMessage, LinkedIn) — URLs must be absolute --}}
    <meta property="og:site_name" content="Candé · Real del Mar">
    <meta property="og:title" content="Candé by FRISA · Real del Mar — Vive frente al Pacífico">
    <meta property="og:description" content="Casas y departamentos de lujo con vistas al mar, campo de golf y estilo de vida tipo resort en Real del Mar, Baja California.">
    <meta property="og:image" content="{{ $siteUrl }}/images/og-cande.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:url" content="{{ $siteUrl }}/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_MX">

    {{-- Twitter / X card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Candé by FRISA · Real del Mar — Vive frente al Pacífico">
    <meta name="twitter:description" content="Casas y departamentos de lujo con vistas al mar, campo de golf y estilo de vida tipo resort en Real del Mar, Baja California.">
    <meta name="twitter:image" content="{{ $siteUrl }}/images/og-cande.jpg">

    {{-- Display serif — Cormorant Garamond --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{ navSolid: false, navOpen: false }"
    @scroll.window.passive="navSolid = window.scrollY > 40"
    :class="navOpen ? 'overflow-hidden lg:overflow-auto' : ''"
>

    {{-- ============================== PRELOADER ============================== --}}
    <div id="preloader" class="fixed inset-0 z-[100] flex items-center justify-center bg-ocean-950">
        <div class="preloader-mark flex flex-col items-center">
            @include('partials.logo', ['class' => 'h-14 w-auto text-sand-50'])
            <div class="mt-10 h-px w-44 overflow-hidden rounded-full bg-sand-50/15">
                <div id="preloader-bar" class="h-full w-0 rounded-full bg-terra-400 transition-[width] duration-300 ease-out"></div>
            </div>
            <p id="preloader-pct" class="eyebrow mt-4 text-[0.55rem] text-sand-200/50">0%</p>
        </div>
    </div>

    @php
        $navLinks = [
            ['es' => 'Residencias', 'en' => 'Residences', 'href' => '#residencias'],
            ['es' => 'Amenidades', 'en' => 'Amenities', 'href' => '#amenidades'],
            ['es' => 'Galería', 'en' => 'Gallery', 'href' => '#galeria'],
            ['es' => 'Ubicación', 'en' => 'Location', 'href' => '#ubicacion'],
        ];
    @endphp

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
                @foreach ($navLinks as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="eyebrow text-[0.65rem] transition-colors duration-300"
                        :class="navSolid ? 'text-ink-soft hover:text-terra-500' : 'text-sand-100 hover:text-white'"
                    ><span class="lang-es">{{ $item['es'] }}</span><span class="lang-en">{{ $item['en'] }}</span></a>
                @endforeach

                {{-- Language toggle (segmented) --}}
                <div class="flex items-center gap-1.5">
                    <button @click="$store.lang.set('es')"
                        class="eyebrow text-[0.65rem] transition-colors"
                        :class="$store.lang.current === 'es' ? (navSolid ? 'text-terra-500' : 'text-white') : (navSolid ? 'text-ink-soft/40 hover:text-ink-soft' : 'text-sand-100/50 hover:text-sand-100')"
                    >ES</button>
                    <span class="text-[0.65rem]" :class="navSolid ? 'text-ink/20' : 'text-sand-100/30'">/</span>
                    <button @click="$store.lang.set('en')"
                        class="eyebrow text-[0.65rem] transition-colors"
                        :class="$store.lang.current === 'en' ? (navSolid ? 'text-terra-500' : 'text-white') : (navSolid ? 'text-ink-soft/40 hover:text-ink-soft' : 'text-sand-100/50 hover:text-sand-100')"
                    >EN</button>
                </div>

                <a
                    href="#contacto"
                    class="eyebrow rounded-full px-5 py-2.5 text-[0.65rem] text-sand-50 transition-all duration-300 bg-terra-500 hover:bg-terra-600"
                ><span class="lang-es">Agendar visita</span><span class="lang-en">Schedule a visit</span></a>
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
                @foreach ($navLinks as $item)
                    <a href="{{ $item['href'] }}" @click="navOpen = false"
                        class="display block py-3 text-2xl text-ink transition-colors hover:text-terra-500"><span class="lang-es">{{ $item['es'] }}</span><span class="lang-en">{{ $item['en'] }}</span></a>
                @endforeach
                <div class="mt-4 flex items-center gap-4">
                    <a href="#contacto" @click="navOpen = false"
                        class="eyebrow inline-block rounded-full bg-terra-500 px-6 py-3 text-[0.65rem] text-sand-50"><span class="lang-es">Agendar visita</span><span class="lang-en">Schedule a visit</span></a>
                    {{-- Single-tap language switch — shows the language you'll switch to --}}
                    <button @click="$store.lang.toggle()" class="eyebrow text-[0.65rem] text-ink-soft underline-offset-4 hover:underline">
                        <span class="lang-es">English</span><span class="lang-en">Español</span>
                    </button>
                </div>
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
                    <p class="mt-6 max-w-xs text-sm leading-relaxed text-sand-200/70">
                        <x-t>
                            <x-slot:es>Un desarrollo integral frente al Pacífico. Respaldado por Grupo FRISA, diseñado por Cuaik.</x-slot:es>
                            <x-slot:en>An integrated development facing the Pacific. Backed by Grupo FRISA, designed by Cuaik.</x-slot:en>
                        </x-t>
                    </p>
                </div>
                <div>
                    <p class="eyebrow mb-5 text-[0.6rem] text-ocean-300"><x-t><x-slot:es>El desarrollo</x-slot:es><x-slot:en>The development</x-slot:en></x-t></p>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#esencia" class="transition-colors hover:text-terra-300"><x-t><x-slot:es>Esencia</x-slot:es><x-slot:en>Essence</x-slot:en></x-t></a></li>
                        <li><a href="#residencias" class="transition-colors hover:text-terra-300">Casas Candé</a></li>
                        <li><a href="#residencias" class="transition-colors hover:text-terra-300"><x-t><x-slot:es>Departamentos</x-slot:es><x-slot:en>Apartments</x-slot:en></x-t></a></li>
                        <li><a href="#amenidades" class="transition-colors hover:text-terra-300"><x-t><x-slot:es>Amenidades</x-slot:es><x-slot:en>Amenities</x-slot:en></x-t></a></li>
                        <li><a href="#ubicacion" class="transition-colors hover:text-terra-300"><x-t><x-slot:es>Ubicación</x-slot:es><x-slot:en>Location</x-slot:en></x-t></a></li>
                    </ul>
                </div>
                <div>
                    <p class="eyebrow mb-5 text-[0.6rem] text-ocean-300"><x-t><x-slot:es>Contacto</x-slot:es><x-slot:en>Contact</x-slot:en></x-t></p>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#contacto" class="transition-colors hover:text-terra-300"><x-t><x-slot:es>Agendar visita</x-slot:es><x-slot:en>Schedule a visit</x-slot:en></x-t></a></li>
                        <li><a href="https://wa.me/526641158106" target="_blank" rel="noopener" class="transition-colors hover:text-terra-300">WhatsApp · +52 664 115 8106</a></li>
                        <li><a href="mailto:ventas@cityinmobiliaria.mx" class="transition-colors hover:text-terra-300">ventas@cityinmobiliaria.mx</a></li>
                        <li><a href="https://www.cande.mx/" target="_blank" rel="noopener" class="transition-colors hover:text-terra-300">cande.mx</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-14 border-t border-sand-50/10 pt-8 text-xs leading-relaxed text-sand-200/50">
                <p>
                    <x-t>
                        <x-slot:es>© {{ date('Y') }} Real del Mar. Todos los derechos reservados. · Aviso de Privacidad</x-slot:es>
                        <x-slot:en>© {{ date('Y') }} Real del Mar. All rights reserved. · Privacy Notice</x-slot:en>
                    </x-t>
                    <span class="text-sand-200/30">· v1.0.3</span>
                </p>
                <p class="mt-2">
                    <x-t>
                        <x-slot:es>Las imágenes mostradas son representaciones ilustrativas del proyecto y pueden variar respecto al producto final. La información de tipologías, acabados y financiamiento está sujeta a cambios sin previo aviso.</x-slot:es>
                        <x-slot:en>The images shown are illustrative representations of the project and may differ from the final product. Information on layouts, finishes, and financing is subject to change without notice.</x-slot:en>
                    </x-t>
                </p>
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp (message switches with language) --}}
    <a
        :href="$store.lang.current === 'en'
            ? 'https://wa.me/526641158106?text=Hi%2C%20I%27m%20interested%20in%20Real%20del%20Mar.%20Could%20you%20send%20me%20more%20information%3F'
            : 'https://wa.me/526641158106?text=Hola%2C%20me%20interesa%20Real%20del%20Mar%2C%20%C2%BFme%20pueden%20enviar%20informaci%C3%B3n%3F'"
        href="https://wa.me/526641158106?text=Hola%2C%20me%20interesa%20Real%20del%20Mar%2C%20%C2%BFme%20pueden%20enviar%20informaci%C3%B3n%3F"
        target="_blank" rel="noopener"
        aria-label="WhatsApp"
        class="fixed bottom-6 right-6 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] shadow-lg shadow-ink/20 transition-transform duration-300 hover:scale-110"
    >
        <svg viewBox="0 0 24 24" class="h-7 w-7 fill-white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.298.297-.497.1-.198.05-.371-.025-.52-.074-.149-.668-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>

</body>
</html>
