import '@fontsource-variable/fraunces';
import '@fontsource/hanken-grotesk/400.css';
import '@fontsource/hanken-grotesk/500.css';
import '@fontsource/hanken-grotesk/600.css';
import '@fontsource/hanken-grotesk/700.css';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import './reveal.js';
import './ocean-bg.js';

Alpine.plugin(collapse);

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
