{{-- ============================== CONTACTO ============================== --}}
<section id="contacto" class="relative overflow-hidden py-24 lg:py-36">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-16 lg:grid-cols-2">
            {{-- Copy --}}
            <div class="reveal-group">
                <p class="eyebrow text-terra-500">Agendar visita</p>
                <h2 class="display mt-6 text-4xl font-light text-ink sm:text-5xl">
                    El mar está más cerca<br>de lo que <em>imaginas</em>
                </h2>
                <p class="mt-8 max-w-md text-lg leading-relaxed text-ink-soft">
                    Agenda una visita al desarrollo o recibe la información completa
                    de tipologías, disponibilidad y financiamiento.
                </p>
                <div class="mt-10 space-y-4 text-sm text-ink-soft">
                    <a href="https://wa.me/526610000000" target="_blank" rel="noopener" class="flex items-center gap-3 transition-colors hover:text-terra-500">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-sand-200 text-ink">✆</span>
                        WhatsApp · +52 661 000 0000
                    </a>
                    <p class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-sand-200 text-ink">✉</span>
                        ventas@realdelmar.mx
                    </p>
                </div>
            </div>

            {{-- Multi-step form --}}
            <div class="reveal rounded-2xl border border-ink/8 bg-sand-100 p-8 lg:p-12" x-data="visitForm">
                {{-- Success state --}}
                <template x-if="sent">
                    <div class="py-12 text-center">
                        <p class="display text-3xl text-ink">Gracias por tu interés<em>.</em></p>
                        <p class="mt-4 text-ink-soft">Un asesor te contactará muy pronto por tu medio preferido.</p>
                    </div>
                </template>

                <form x-show="!sent" @submit.prevent="submit" novalidate>
                    {{-- Progress --}}
                    <div class="mb-8 flex items-center gap-3">
                        <span class="eyebrow text-[0.55rem]" :class="step === 1 ? 'text-terra-500' : 'text-ink-soft/50'">01 · Tus datos</span>
                        <span class="h-px flex-1 bg-ink/10"></span>
                        <span class="eyebrow text-[0.55rem]" :class="step === 2 ? 'text-terra-500' : 'text-ink-soft/50'">02 · Tu interés</span>
                    </div>

                    {{-- Step 1 --}}
                    <div x-show="step === 1" class="space-y-5">
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="nombre">Nombre completo</label>
                            <input id="nombre" type="text" x-model="form.nombre" required
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400"
                                placeholder="Tu nombre">
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="email">Correo electrónico</label>
                            <input id="email" type="email" x-model="form.email" required
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400"
                                placeholder="tu@correo.com">
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="telefono">Teléfono / WhatsApp</label>
                            <input id="telefono" type="tel" x-model="form.telefono" required
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400"
                                placeholder="+52 / +1">
                        </div>
                        <button type="button" @click="next" :disabled="!stepOneValid"
                            class="eyebrow w-full rounded-full bg-ink px-8 py-4 text-[0.65rem] text-sand-50 transition-all duration-300 enabled:hover:bg-terra-500 disabled:cursor-not-allowed disabled:opacity-40">
                            Siguiente
                        </button>
                    </div>

                    {{-- Step 2 --}}
                    <div x-show="step === 2" x-cloak class="space-y-5">
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="interes">Me interesa</label>
                            <select id="interes" x-model="form.interes"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink focus:border-terra-400 focus:ring-terra-400">
                                <option value="">Selecciona una opción</option>
                                <option>Casas Candé</option>
                                <option>Departamentos — Modelo A</option>
                                <option>Departamentos — Modelo B</option>
                                <option>Soy broker / asesor inmobiliario</option>
                            </select>
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft">Prefiero que me contacten por</label>
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                @foreach (['WhatsApp', 'Llamada', 'SMS', 'Correo'] as $medio)
                                    <button type="button" @click="form.contacto = '{{ $medio }}'"
                                        class="rounded-xl border px-3 py-3 text-xs font-medium transition-all duration-200"
                                        :class="form.contacto === '{{ $medio }}' ? 'border-terra-400 bg-terra-400/10 text-terra-600' : 'border-ink/10 bg-sand-50 text-ink-soft hover:border-ink/25'">
                                        {{ $medio }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label class="eyebrow mb-2 block text-[0.55rem] text-ink-soft" for="mensaje">Mensaje <span class="normal-case opacity-60">(opcional)</span></label>
                            <textarea id="mensaje" x-model="form.mensaje" rows="3"
                                class="w-full rounded-xl border-ink/10 bg-sand-50 px-5 py-4 text-ink placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400"
                                placeholder="Cuéntanos qué estás buscando..."></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="button" @click="back"
                                class="eyebrow rounded-full border border-ink/15 px-8 py-4 text-[0.65rem] text-ink-soft transition-colors hover:border-ink/40">
                                Volver
                            </button>
                            <button type="submit"
                                class="eyebrow flex-1 rounded-full bg-terra-500 px-8 py-4 text-[0.65rem] text-sand-50 transition-all duration-300 hover:bg-terra-600">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
