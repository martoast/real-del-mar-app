{{-- ============================== CONTACTO (blueprint: narrow conversion form, Bolt CRM webhook) ============================== --}}
<section id="contacto" class="bg-sand-100 py-24 lg:py-32"
    x-data="{
        sending: false,
        sent: false,
        error: false,
        async submitForm(ev) {
            const form = ev.target;
            const data = Object.fromEntries(new FormData(form));
            if (data['bot-field']) { this.sent = true; return; } // honeypot: silently 'succeed'
            delete data['bot-field'];
            delete data['form-name'];
            data.form = 'contacto';
            data.sitio = location.host;
            data.pagina = location.href;
            data.idioma = $store.lang.current;
            this.sending = true;
            this.error = false;
            try {
                const r = await fetch('{{ config('services.forms_webhook') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                });
                if (!r.ok) throw new Error('HTTP ' + r.status);
                this.sent = true;
                form.reset();
                if (window.fbq) fbq('track', 'Lead');
            } catch (e) {
                this.error = true;
            } finally {
                this.sending = false;
            }
        },
    }">
    <div class="mx-auto max-w-xl px-6 lg:px-10">
        <div class="reveal-group text-center">
            <p class="eyebrow text-terra-500"><x-t><x-slot:es>Agendar visita</x-slot:es><x-slot:en>Schedule a visit</x-slot:en></x-t></p>
            <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">
                <x-t>
                    <x-slot:es>El mar está más cerca de lo que <em>imaginas</em></x-slot:es>
                    <x-slot:en>The sea is closer than you <em>think</em></x-slot:en>
                </x-t>
            </h2>
            <p class="mx-auto mt-5 max-w-lg text-lg leading-relaxed text-ink-soft">
                <x-t>
                    <x-slot:es>Déjanos tus datos y un asesor te contactará con tipologías, disponibilidad y financiamiento.</x-slot:es>
                    <x-slot:en>Leave us your details and an advisor will contact you with layouts, availability, and financing.</x-slot:en>
                </x-t>
            </p>
        </div>

        <form name="contacto" @submit.prevent="submitForm"
            class="reveal mt-12 space-y-4 rounded-3xl bg-white p-8 shadow-xl shadow-ink/10 ring-1 ring-ink/5 lg:p-10">
            <p class="hidden" aria-hidden="true"><label>No llenar: <input name="bot-field" tabindex="-1" autocomplete="off"></label></p>

            <input type="text" name="nombre" required autocomplete="name" placeholder="Nombre"
                :placeholder="$store.lang.current === 'en' ? 'Name' : 'Nombre'"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400">
            <input type="email" name="email" required autocomplete="email" placeholder="Correo electrónico"
                :placeholder="$store.lang.current === 'en' ? 'Email address' : 'Correo electrónico'"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400">
            <input type="tel" name="telefono" required autocomplete="tel" placeholder="Teléfono"
                :placeholder="$store.lang.current === 'en' ? 'Phone' : 'Teléfono'"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm placeholder:text-ink-soft/40 focus:border-terra-400 focus:ring-terra-400">

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <button type="submit" :disabled="sending"
                    class="eyebrow flex-1 rounded-full bg-terra-500 px-8 py-4 text-[0.7rem] text-sand-50 transition-colors hover:bg-terra-600 disabled:cursor-wait disabled:opacity-60">
                    <span x-show="!sending"><x-t><x-slot:es>Enviar</x-slot:es><x-slot:en>Send</x-slot:en></x-t></span>
                    <span x-show="sending" x-cloak><x-t><x-slot:es>Enviando…</x-slot:es><x-slot:en>Sending…</x-slot:en></x-t></span>
                </button>
                <a href="https://wa.me/526641158106" target="_blank" rel="noopener" onclick="if(window.fbq)fbq('track','Contact',{method:'whatsapp'})"
                    class="eyebrow flex flex-1 items-center justify-center gap-2 rounded-full border border-ink/20 px-8 py-4 text-[0.7rem] text-ink transition-colors hover:border-ink hover:bg-ink hover:text-sand-50">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm5.2 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.4-.7-2.9-1.1-4.7-4-4.9-4.2-.1-.2-1.1-1.5-1.1-2.9s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.4l.9 2.1c.1.2.1.4 0 .6l-.4.6-.5.5c-.1.2-.3.3-.1.6.2.3.8 1.4 1.8 2.2 1.2 1.1 2.3 1.4 2.6 1.6.3.1.5.1.7-.1l1-1.2c.2-.3.4-.2.7-.1l2 1c.3.1.5.2.6.4 0 .1 0 .8-.2 1.4z"/></svg>
                    WhatsApp
                </a>
            </div>
            <p x-show="error" x-cloak class="pt-1 text-center text-xs text-red-600">
                <x-t>
                    <x-slot:es>No pudimos enviar tu solicitud. Intenta de nuevo o escríbenos por WhatsApp.</x-slot:es>
                    <x-slot:en>We couldn't send your request. Please try again or message us on WhatsApp.</x-slot:en>
                </x-t>
            </p>
        </form>

        <p class="reveal mt-6 text-center text-sm text-ink-soft">
            <a href="mailto:ventas@cityinmobiliaria.mx" class="transition-colors hover:text-terra-500">ventas@cityinmobiliaria.mx</a>
            <span class="mx-2 text-ink-soft/40">·</span>
            <a href="https://wa.me/526641158106" target="_blank" rel="noopener" class="transition-colors hover:text-terra-500">+52 664 115 8106</a>
        </p>
    </div>

    {{-- ============================== POPUP DE CONFIRMACIÓN ============================== --}}
    <div x-show="sent" x-cloak
        class="fixed inset-0 z-[96] flex items-center justify-center p-6"
        @keydown.escape.window="sent = false" role="dialog" aria-modal="true" aria-label="Solicitud enviada">
        <div x-show="sent" x-transition.opacity class="absolute inset-0 bg-ink/80 backdrop-blur-sm" @click="sent = false"></div>
        <div x-show="sent"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            class="relative w-full max-w-md rounded-3xl bg-white p-10 text-center shadow-2xl">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500/15 text-emerald-600">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            </span>
            <h3 class="display mt-6 text-3xl font-light text-ink">
                <x-t><x-slot:es>¡Solicitud enviada!</x-slot:es><x-slot:en>Request sent!</x-slot:en></x-t>
            </h3>
            <p class="mt-3 text-sm leading-relaxed text-ink-soft">
                <x-t>
                    <x-slot:es>Gracias por tu interés en Candé. Un asesor te contactará muy pronto con tipologías, disponibilidad y financiamiento.</x-slot:es>
                    <x-slot:en>Thank you for your interest in Candé. An advisor will contact you shortly with layouts, availability, and financing.</x-slot:en>
                </x-t>
            </p>
            <button type="button" @click="sent = false"
                class="eyebrow mt-7 inline-flex items-center justify-center rounded-full bg-terra-500 px-8 py-3.5 text-[0.65rem] text-sand-50 transition-colors hover:bg-terra-600">
                <x-t><x-slot:es>Entendido</x-slot:es><x-slot:en>Got it</x-slot:en></x-t>
            </button>
        </div>
    </div>
</section>
