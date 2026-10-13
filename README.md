# BMG Hospitality Landing — demo

Demo statica della landing page Be Marketing Group dedicata all’hospitality di lusso.

La versione pubblica viene generata automaticamente da `index.php` e distribuita tramite GitHub Pages. I parametri `hotel` e `nome` nell’URL permettono di personalizzare la presentazione senza dipendere da un server PHP.


## Pubblicazione Keliweb — 13 ottobre 2026

Online: https://bemarketinggroup.it/hospitality/

HTTPS automatico. Il sito principale include BeViral e le pagine progetto; la landing si trova in `/hospitality/`. I moduli usano l’endpoint condiviso `/contact-api/index.php`, SMTP Keliweb e Cloudflare Turnstile. Configurazioni e chiavi restano nella cartella privata esterna a public_html. Pubblicazione effettuata dal gestore file DirectAdmin; repository GitHub non aggiornati.

### Pubblicazione automatica

Il workflow `.github/workflows/deploy-keliweb.yml` pubblica la landing dopo ogni push sul branch `main` e può essere avviato manualmente dalla scheda **Actions** di GitHub.

Configurare una sola volta in **Settings → Secrets and variables → Actions**:

- secret `KELIWEB_FTP_USERNAME`
- secret `KELIWEB_FTP_PASSWORD`
- variabile facoltativa `KELIWEB_WEB_ROOT` se l’account FTP non è confinato direttamente a `public_html`

Il deploy usa `git-ftp` su FTPES cifrato: dopo il primo avvio trasferisce soltanto i file cambiati e rimuove dal server quelli eliminati dal repository. I file Git, le immagini di anteprima e la copia locale dell’API contatti non vengono caricati nella cartella della landing.
