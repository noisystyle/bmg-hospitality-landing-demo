# BMG Hospitality Landing

Landing dedicata alla comunicazione per hotel e dimore, online su [bemarketinggroup.it/hospitality/](https://bemarketinggroup.it/hospitality/).

## Struttura

`index.php` contiene il template e la personalizzazione facoltativa `?hotel=...&nome=...`. I valori sono limitati a 90 caratteri, escapati lato PHP e inseriti con `textContent` lato JavaScript. Le URL personalizzate hanno `noindex, follow`; la canonical rimane `/hospitality/`.

La versione del 24 ottobre 2026 riprende il sistema editoriale del sito principale: Bodoni Moda e DM Sans locali, avorio e salvia, fotografie selezionate dei clienti, loghi e footer con collegamenti social. CSS di base, modulo contatti e gestione del consenso sono condivisi con il sito principale. La versione semplificata conserva una breve presentazione con tre servizi, sei loghi, tre progetti e il modulo con nome, email e messaggio. Header con solo logo e collegamento al contatto; footer compatto. Il layout specifico è in `assets/css/landing-editorial.css` e la personalizzazione in `assets/js/landing-editorial.js`.

Le tre schede fotografiche rimandano direttamente ai progetti Bellevue Syrene, Vetera Matera e Zest. Le immagini e i CSS condivisi provengono da `https://bemarketinggroup.it/assets/`: la landing dipende da quegli asset già pubblicati. I file storici `style.css` e `main.js` sono conservati ma non caricati dal nuovo template.

## Contatti e misurazione

Il modulo richiede soltanto nome, email e messaggio; l’argomento predefinito è Hospitality. Usa l’endpoint condiviso `/contact-api/index.php`, SMTP Keliweb e Cloudflare Turnstile, senza modificare il backend. Credenziali e configurazioni private restano esterne al repository e alla cartella pubblica.

Sul dominio BMG viene caricato il modulo esistente di consenso e misurazione: Analytics si attiva secondo le preferenze del visitatore. La misurazione esclude query string e dati di personalizzazione dalle URL registrate. Le anteprime locali/GitHub Pages non caricano Analytics.

## Verifica locale

Con Node.js:

```sh
node tests/landing.mjs
node --check assets/js/landing-editorial.js
```

Con PHP e mbstring disponibili, il test esegue anche il template con parametri normali, array e contenuto ostile. È possibile imporre questo controllo con `REQUIRE_PHP=1` e usare `php -l index.php`. Il workflow Pages esistente esegue il rendering PHP della versione predefinita.

Per verificare solo il design senza PHP:

```sh
node scripts/preview.mjs
```

Apre `http://127.0.0.1:8102/hospitality/` e richiede il checkout fratello `../bmg-website-live` per gli asset condivisi. La preview sostituisce solo le espressioni note del template e blocca tutte le connessioni esterne tramite CSP: non testa l’invio email o Turnstile. Non sostituisce la verifica reale del PHP sul server.

## Pubblicazione

Ogni push su `main` esegue `.github/workflows/deploy-keliweb.yml`: `git-ftp` su FTPES, limitato alla cartella `/hospitality/`. Usa i segreti già configurati `KELIWEB_FTP_USERNAME`, `KELIWEB_FTP_PASSWORD` e la variabile facoltativa `KELIWEB_WEB_ROOT`. Non modificarli per interventi sul design.

`.git-ftp-ignore` esclude documentazione, test, script locali, file Git e copia locale dell’API contatti. Il workflow GitHub Pages genera separatamente un’anteprima HTML da `index.php` e copia gli asset della landing.
