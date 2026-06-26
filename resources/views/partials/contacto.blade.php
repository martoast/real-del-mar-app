{{-- ============================== CONTACTO ============================== --}}
<section id="contacto" class="relative overflow-hidden py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-16 lg:grid-cols-2">
            {{-- Copy --}}
            <div class="reveal-group">
                <p class="eyebrow text-terra-500"><x-t><x-slot:es>Agendar visita</x-slot:es><x-slot:en>Schedule a visit</x-slot:en></x-t></p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                    <x-t>
                        <x-slot:es>El mar está más cerca<br>de lo que <em>imaginas</em></x-slot:es>
                        <x-slot:en>The sea is closer<br>than you <em>think</em></x-slot:en>
                    </x-t>
                </h2>
                <p class="mt-8 max-w-md text-lg leading-relaxed text-ink-soft">
                    <x-t>
                        <x-slot:es>Agenda una visita al desarrollo o recibe la información completa de tipologías, disponibilidad y financiamiento.</x-slot:es>
                        <x-slot:en>Book a visit to the development or receive complete information on layouts, availability, and financing.</x-slot:en>
                    </x-t>
                </p>
                <div class="mt-10 space-y-4 text-sm text-ink-soft">
                    <a href="https://wa.me/526641158106" target="_blank" rel="noopener" class="flex items-center gap-3 transition-colors hover:text-terra-500">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-sand-200 text-ink">✆</span>
                        WhatsApp · +52 664 115 8106
                    </a>
                    <a href="mailto:ventas@cityinmobiliaria.mx" class="flex items-center gap-3 transition-colors hover:text-terra-500">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-sand-200 text-ink">✉</span>
                        ventas@cityinmobiliaria.mx
                    </a>
                </div>
            </div>

            {{-- Multi-step form --}}
            <div class="reveal rounded-2xl border border-ink/8 bg-sand-100 p-8 lg:p-12" x-data="visitForm">
                {{-- Success state --}}
                <template x-if="sent">
                    <div class="py-12 text-center">
                        <p class="display text-3xl text-ink"><x-t><x-slot:es>Gracias por tu interés<em>.</em></x-slot:es><x-slot:en>Thank you for your interest<em>.</em></x-slot:en></x-t></p>
                        <p class="mt-4 text-ink-soft"><x-t><x-slot:es>Un asesor te contactará muy pronto por tu medio preferido.</x-slot:es><x-slot:en>An advisor will contact you shortly through your preferred channel.</x-slot:en></x-t></p>
                    </div>
                </template>

                <form x-show="!sent" @submit.prevent="submit" novalidate>
                    {{-- Progress --}}
                    <div class="mb-8 flex items-center gap-3">
                        <span class="eyebrow text-[0.55rem]" :class="step === 1 ? 'text-terra-500' : 'text-ink-soft/50'">01 · <span class="lang-es">Tus datos</span><span class="lang-en">Your details</span></span>
                        <span class="h-px flex-1 bg-ink/10"></span>
                        <span class="eyebrow text-[0.55rem]" :class="step === 2 ? 'text-terra-500' : 'text-ink-soft/50'">02 · <span class="lang-es">Tu interés</span><span class="lang-en">Your interest</span></span>
                    </div>

                    {{-- Step 1 --}}
                    <div x-show="step === 1" class="space-y-5">
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="nombre"><x-t><x-slot:es>Nombre completo</x-slot:es><x-slot:en>Full name</x-slot:en></x-t></label>
                            <input id="nombre" type="text" x-model="form.nombre" required
                                :placeholder="$store.lang.current === 'en' ? 'Your name' : 'Tu nombre'"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400">
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="email"><x-t><x-slot:es>Correo electrónico</x-slot:es><x-slot:en>Email address</x-slot:en></x-t></label>
                            <input id="email" type="email" x-model="form.email" required
                                :placeholder="$store.lang.current === 'en' ? 'you@email.com' : 'tu@correo.com'"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400">
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="telefono"><x-t><x-slot:es>Teléfono / WhatsApp</x-slot:es><x-slot:en>Phone / WhatsApp</x-slot:en></x-t></label>
                            <input id="telefono" type="tel" x-model="form.telefono" required placeholder="+52 / +1"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400">
                        </div>
                        <button type="button" @click="next" :disabled="!stepOneValid"
                            class="eyebrow w-full rounded-full bg-ink px-8 py-4 text-[0.65rem] text-sand-50 transition-all duration-300 enabled:hover:bg-terra-500 disabled:cursor-not-allowed disabled:opacity-40">
                            <span class="lang-es">Siguiente</span><span class="lang-en">Next</span>
                        </button>
                    </div>

                    {{-- Step 2 --}}
                    <div x-show="step === 2" x-cloak class="space-y-5">
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="interes"><x-t><x-slot:es>Me interesa</x-slot:es><x-slot:en>I'm interested in</x-slot:en></x-t></label>
                            <select id="interes" x-model="form.interes"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink focus:border-terra-400 focus:ring-terra-400">
                                <option value="" x-text="$store.lang.current === 'en' ? 'Select an option' : 'Selecciona una opción'"></option>
                                <option value="Casas Candé">Casas Candé</option>
                                <option value="Modelo A" x-text="$store.lang.current === 'en' ? 'Apartments — Model A' : 'Departamentos — Modelo A'"></option>
                                <option value="Modelo B" x-text="$store.lang.current === 'en' ? 'Apartments — Model B' : 'Departamentos — Modelo B'"></option>
                                <option value="Broker" x-text="$store.lang.current === 'en' ? 'I am a broker / real estate agent' : 'Soy broker / asesor inmobiliario'"></option>
                            </select>
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft"><x-t><x-slot:es>Prefiero que me contacten por</x-slot:es><x-slot:en>Preferred contact method</x-slot:en></x-t></label>
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                @foreach ([
                                    ['key' => 'WhatsApp', 'es' => 'WhatsApp', 'en' => 'WhatsApp'],
                                    ['key' => 'Llamada', 'es' => 'Llamada', 'en' => 'Call'],
                                    ['key' => 'SMS', 'es' => 'SMS', 'en' => 'SMS'],
                                    ['key' => 'Correo', 'es' => 'Correo', 'en' => 'Email'],
                                ] as $medio)
                                    <button type="button" @click="form.contacto = '{{ $medio['key'] }}'"
                                        class="rounded-xl border px-3 py-3 text-xs font-medium transition-all duration-200"
                                        :class="form.contacto === '{{ $medio['key'] }}' ? 'border-terra-400 bg-terra-400/10 text-terra-600' : 'border-ink/10 bg-sand-50 text-ink-soft hover:border-ink/25'">
                                        <span class="lang-es">{{ $medio['es'] }}</span><span class="lang-en">{{ $medio['en'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="mensaje"><x-t><x-slot:es>Mensaje <span class="normal-case opacity-60">(opcional)</span></x-slot:es><x-slot:en>Message <span class="normal-case opacity-60">(optional)</span></x-slot:en></x-t></label>
                            <textarea id="mensaje" x-model="form.mensaje" rows="3"
                                :placeholder="$store.lang.current === 'en' ? 'Tell us what you are looking for...' : 'Cuéntanos qué estás buscando...'"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400"></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="button" @click="back"
                                class="eyebrow rounded-full border border-ink/15 px-8 py-4 text-[0.65rem] text-ink-soft transition-colors hover:border-ink/40">
                                <span class="lang-es">Volver</span><span class="lang-en">Back</span>
                            </button>
                            <button type="submit"
                                class="eyebrow flex-1 rounded-full bg-terra-500 px-8 py-4 text-[0.65rem] text-sand-50 transition-all duration-300 hover:bg-terra-600">
                                <span class="lang-es">Enviar</span><span class="lang-en">Send</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
