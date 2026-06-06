{{-- ============================== FINANCIAMIENTO ============================== --}}
<section id="financiamiento" class="bg-sand-100 py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group mx-auto max-w-2xl text-center">
            <p class="eyebrow text-terra-500">Financiamiento</p>
            <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                Opciones flexibles para <em>llegar al mar</em>
            </h2>
        </div>

        <div class="mt-16 grid gap-6 lg:grid-cols-2">
            {{-- Hipotecario MX --}}
            <div class="reveal-group flex flex-col rounded-2xl border border-ink/8 bg-sand-50 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ink-soft">Crédito hipotecario · Santander</p>
                <h3 class="display mt-4 text-2xl text-ink">Financiamiento <em>en México</em></h3>
                <div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-8">
                    @foreach ([
                        ['n' => '8.95%', 'l' => 'Tasas desde'],
                        ['n' => '7–20', 'l' => 'Años de plazo'],
                        ['n' => '90%', 'l' => 'Hasta — de financiamiento'],
                        ['n' => '21+', 'l' => 'Acreditados desde'],
                    ] as $stat)
                        <div>
                            <p class="display text-3xl font-light text-ocean-600">{{ $stat['n'] }}</p>
                            <p class="eyebrow mt-2 text-[0.55rem] text-ink-soft">{{ $stat['l'] }}</p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-8 border-t border-ink/8 pt-6 text-xs leading-relaxed text-ink-soft/80">
                    Hasta 60% de endeudamiento · Edad + plazo del crédito hasta 80 años.
                </p>
            </div>

            {{-- US Citizens --}}
            <div class="reveal-group flex flex-col rounded-2xl bg-ocean-900 p-10 lg:p-14">
                <p class="eyebrow text-[0.6rem] text-ocean-300">Cross-border financing</p>
                <h3 class="display mt-4 text-2xl text-sand-50">Financing for <em>U.S. citizens</em></h3>
                <div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-8">
                    @foreach ([
                        ['n' => '65%', 'l' => 'Up to — financing'],
                        ['n' => '7–9%', 'l' => 'Rates from'],
                        ['n' => '30', 'l' => 'Year terms up to'],
                        ['n' => 'USD', 'l' => 'U.S.-style process'],
                    ] as $stat)
                        <div>
                            <p class="display text-3xl font-light text-terra-300">{{ $stat['n'] }}</p>
                            <p class="eyebrow mt-2 text-[0.55rem] text-sand-200/60">{{ $stat['l'] }}</p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-8 border-t border-sand-50/10 pt-6 text-xs leading-relaxed text-sand-200/50">
                    No need to be in Mexico · No need to pay all cash · U.S.-style financing process.
                </p>
            </div>
        </div>
    </div>
</section>
