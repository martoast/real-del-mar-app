import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import './preloader.js';
import './reveal.js';
import './ocean-bg.js';

Alpine.plugin(collapse);

/**
 * Global language store (ES / EN).
 * The active language is reflected as `data-lang` on <html>; CSS in app.css
 * shows the matching `.lang-es` / `.lang-en` spans. Persisted to localStorage.
 * An inline script in the <head> sets data-lang before paint to avoid a flash.
 */
document.addEventListener('alpine:init', () => {
    Alpine.store('lang', {
        current: document.documentElement.getAttribute('data-lang') || 'es',
        set(l) {
            this.current = l;
            document.documentElement.setAttribute('data-lang', l);
            try { localStorage.setItem('rdm_lang', l); } catch (e) {}
        },
        toggle() {
            this.set(this.current === 'es' ? 'en' : 'es');
        },
    });

    // Shared product selector (casas / depas) — links Residencias and Disponibilidad.
    Alpine.store('product', {
        tab: 'casas',
        set(t) { this.tab = t; },
    });
});

/**
 * Multi-step "Agendar visita" form.
 * Step 1: who you are (3 fields). Step 2: what interests you.
 * Template-only for now — submission just shows the success state.
 */
Alpine.data('visitForm', () => ({
    step: 1,
    sent: false,
    form: {
        nombre: '',
        email: '',
        telefono: '',
        interes: '',
        contacto: 'WhatsApp',
        mensaje: '',
    },
    get stepOneValid() {
        return (
            this.form.nombre.trim() !== '' &&
            /^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(this.form.email) &&
            this.form.telefono.trim().length >= 7
        );
    },
    next() {
        if (this.stepOneValid) this.step = 2;
    },
    back() {
        this.step = 1;
    },
    submit() {
        // TODO: wire to backend (Mailgun / CRM) once sales contact is defined.
        this.sent = true;
    },
}));

window.Alpine = Alpine;
Alpine.start();
