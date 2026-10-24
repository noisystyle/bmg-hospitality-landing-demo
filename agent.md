# Registro attività

## 24 ottobre 2026 — Landing nello stile del sito

Implementato restyling di `index.php` con sistema editoriale condiviso del sito BMG: hero fotografica, approccio, sei loghi, galleria sette progetti, servizi, metodo, modulo essenziale e footer con social ufficiali. Dettagli in `docs/editorial-redesign.md`.

Conservati PHP e personalizzazione hotel/nome, normalizzazione e escaping dei parametri, invio tramite backend condiviso e Turnstile. Aggiunti noindex per URL personalizzate e canonical pulita. Analytics caricato soltanto sul dominio di produzione attraverso il modulo di consenso già esistente.

Verifica locale Node e browser responsive; rendering PHP della versione predefinita nel workflow Pages esistente e verifica dei parametri sul server dopo il deploy. Non inviare richieste email reali come semplice prova del layout. Non modificare i segreti FTP o il backend per modifiche grafiche.

## 24 ottobre 2026 — Semplificazione della landing

Su approvazione dell’utente ridotta la struttura: titolo e hero più contenuti, presentazione breve con tre servizi, sei loghi compatti, tre schede progetto e modulo con soli nome/email/messaggio. Eliminati menu e relativo script, visualizzatore galleria, sezioni metodo/servizi estese e footer completo. Conservati font e palette BMG, personalizzazione PHP/JS, consenso statistiche e backend contatti con Turnstile e argomento predefinito Hospitality. Nessun invio email di prova.

Controlli: test Node esistenti aggiornati per il nuovo contratto del modulo, verifica browser desktop 1280px e mobile 390/320px, CTA verso il modulo e personalizzazione. Non modificare i workflow: il token non dispone dello scope workflow e quelli esistenti pubblicano già correttamente.

### Leggibilità

Su richiesta dell’utente aumentati i testi principali a 18px su desktop e 17px su mobile, testi servizi a 17px, etichette del modulo a 13px, campi a 18px, CTA a 16px. Peso 500 per i titoli Bodoni, maggiore contrasto sopra la foto, didascalie e footer più grandi e linee dei campi più visibili. Struttura compatta invariata. CSS v3 per evitare cache della versione precedente.
