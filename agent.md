# Registro attività

## 24 ottobre 2026 — Landing nello stile del sito

Implementato restyling di `index.php` con sistema editoriale condiviso del sito BMG: hero fotografica, approccio, sei loghi, galleria sette progetti, servizi, metodo, modulo essenziale e footer con social ufficiali. Dettagli in `docs/editorial-redesign.md`.

Conservati PHP e personalizzazione hotel/nome, normalizzazione e escaping dei parametri, invio tramite backend condiviso e Turnstile. Aggiunti noindex per URL personalizzate e canonical pulita. Analytics caricato soltanto sul dominio di produzione attraverso il modulo di consenso già esistente.

Verifica locale Node e browser responsive; rendering PHP della versione predefinita nel workflow Pages esistente e verifica dei parametri sul server dopo il deploy. Non inviare richieste email reali come semplice prova del layout. Non modificare i segreti FTP o il backend per modifiche grafiche.
