{{-- ============================== FINANCIAMIENTO ============================== --}}
<section id="financiamiento" class="bg-sand-100 py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500"><x-t><x-slot:es>Financiamiento</x-slot:es><x-slot:en>Financing</x-slot:en></x-t></p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>Opciones flexibles para <em>llegar al mar</em></x-slot:es>
                    <x-slot:en>Flexible ways to <em>reach the sea</em></x-slot:en>
                </x-t>
            </h2>
        </div>

        <div class="mt-16 grid gap-6 lg:grid-cols-2">
            {{-- Hipotecario MX --}}
            <div class="reveal-group flex flex-col rounded-2xl border border-ink/8 bg-sand-50 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ink-soft"><x-t><x-slot:es>Crédito hipotecario · Santander</x-slot:es><x-slot:en>Mortgage · Santander</x-slot:en></x-t></p>
                <h3 class="display mt-4 text-2xl text-ink"><x-t><x-slot:es>Financiamiento <em>en México</em></x-slot:es><x-slot:en>Financing <em>in Mexico</em></x-slot:en></x-t></h3>
                <div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-8">
                    @foreach ([
                        ['n' => '8.95%', 'es' => 'Tasas desde', 'en' => 'Rates from'],
                        ['n' => '7–20', 'es' => 'Años de plazo', 'en' => 'Year terms'],
                        ['n' => '90%', 'es' => 'Hasta — de financiamiento', 'en' => 'Up to — financing'],
                        ['n' => '21+', 'es' => 'Acreditados desde', 'en' => 'Applicants from'],
                    ] as $stat)
                        <div>
                            <p class="display text-3xl font-light text-ocean-600">{{ $stat['n'] }}</p>
                            <p class="eyebrow mt-2 text-[0.55rem] text-ink-soft"><span class="lang-es">{{ $stat['es'] }}</span><span class="lang-en">{{ $stat['en'] }}</span></p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-8 border-t border-ink/8 pt-6 text-xs leading-relaxed text-ink-soft/80">
                    <x-t>
                        <x-slot:es>Hasta 60% de endeudamiento · Edad + plazo del crédito hasta 80 años.</x-slot:es>
                        <x-slot:en>Up to 60% debt ratio · Age + loan term up to 80 years.</x-slot:en>
                    </x-t>
                </p>
            </div>

            {{-- US Citizens --}}
            <div class="reveal-group flex flex-col rounded-2xl bg-ocean-900 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ocean-300">Cross-border financing</p>
                <h3 class="display mt-4 text-2xl text-sand-50">Financing for <em>U.S. citizens</em></h3>
                <div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-8">
                    @foreach ([
                        ['n' => '65%', 'es' => 'Hasta — de financiamiento', 'en' => 'Up to — financing'],
                        ['n' => '7–9%', 'es' => 'Tasas desde', 'en' => 'Rates from'],
                        ['n' => '30', 'es' => 'Años de plazo, hasta', 'en' => 'Year terms up to'],
                        ['n' => 'USD', 'es' => 'Proceso tipo EE.UU.', 'en' => 'U.S.-style process'],
                    ] as $stat)
                        <div>
                            <p class="display text-3xl font-light text-terra-300">{{ $stat['n'] }}</p>
                            <p class="eyebrow mt-2 text-[0.55rem] text-sand-200/60"><span class="lang-es">{{ $stat['es'] }}</span><span class="lang-en">{{ $stat['en'] }}</span></p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-8 border-t border-sand-50/10 pt-6 text-xs leading-relaxed text-sand-200/50">
                    <x-t>
                        <x-slot:es>Sin necesidad de estar en México · Sin pagar todo en efectivo · Proceso de financiamiento tipo EE.UU.</x-slot:es>
                        <x-slot:en>No need to be in Mexico · No need to pay all cash · U.S.-style financing process.</x-slot:en>
                    </x-t>
                </p>
            </div>
        </div>
    </div>
</section>
