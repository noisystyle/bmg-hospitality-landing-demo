<?php
declare(strict_types=1);
function clean_query(string $key): string
{
    $value = $_GET[$key] ?? '';
    if (!is_string($value)) return '';
    return htmlspecialchars(mb_substr(trim($value), 0, 90, 'UTF-8'), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
$hotel = clean_query('hotel');
$contactName = clean_query('nome');
$personalized = $hotel !== '';
$mailSubject = rawurlencode($personalized ? "Un confronto su " . html_entity_decode($hotel, ENT_QUOTES, 'UTF-8') : 'Un confronto con Be Marketing Group');
$robots = ($personalized || $contactName !== '') ? 'noindex, follow' : 'index, follow, max-image-preview:large';
$year = date('Y');
?>
<!doctype html>
<html lang="it"><head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Comunicazione e marketing per hotel | Be Marketing Group</title>
  <meta name="description" content="Strategia, identità, fotografia e comunicazione per hotel e dimore. Conosci i progetti di Be Marketing Group e parliamo della tua struttura.">
  <meta name="theme-color" content="#f3f0e7"><meta name="robots" content="<?= $robots ?>">
  <link rel="canonical" href="https://bemarketinggroup.it/hospitality/">
  <meta property="og:type" content="website"><meta property="og:locale" content="it_IT"><meta property="og:site_name" content="Be Marketing Group">
  <meta property="og:title" content="Comunicazione e marketing per hotel | Be Marketing Group">
  <meta property="og:description" content="Un partner per la tua struttura. Strategia e comunicazione per l’ospitalità, in dialogo con proprietà e direzione.">
  <meta property="og:url" content="https://bemarketinggroup.it/hospitality/">
  <meta property="og:image" content="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-1600.webp">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="icon" href="favicon.ico">
  <link rel="preload" href="assets/fonts/bodoni-moda-latin.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="assets/fonts/dm-sans-latin.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="https://bemarketinggroup.it/assets/css/editorial-preview.css?v=16">
  <link rel="stylesheet" href="assets/css/editorial-fonts.css?v=1">
  <link rel="stylesheet" href="https://bemarketinggroup.it/assets/css/editorial-design.css?v=9">
  <link rel="stylesheet" href="assets/css/landing-editorial.css?v=2">
  <link rel="stylesheet" href="https://bemarketinggroup.it/assets/css/site-measurement.css?v=1">
  <script src="https://bemarketinggroup.it/assets/js/contact-mail.js?v=20261013-2" defer></script>
  <script src="assets/js/landing-editorial.js?v=1" defer></script>
  <script type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://bemarketinggroup.it/#organization","name":"Be Marketing Group","alternateName":"BMG","legalName":"BMG S.R.L. Semplificata","url":"https://bemarketinggroup.it/","email":"info@bemarketinggroup.it","logo":{"@type":"ImageObject","url":"https://bemarketinggroup.it/assets/images/ui/bmg-logo-dark.png"},"sameAs":["https://www.instagram.com/bemarketinggroup/","https://www.facebook.com/p/Be-Marketing-Group-61567097246880/","https://it.linkedin.com/company/bmgsrls"]},{"@type":"WebPage","@id":"https://bemarketinggroup.it/hospitality/#webpage","url":"https://bemarketinggroup.it/hospitality/","name":"Comunicazione e marketing per hotel | Be Marketing Group","inLanguage":"it-IT","isPartOf":{"@id":"https://bemarketinggroup.it/#website"},"about":{"@id":"https://bemarketinggroup.it/#organization"}}]}</script>
</head>
<body id="top" class="editorial-landing">
  <a class="skip-link" href="#contenuto">Vai al contenuto</a>
  <header class="landing-header page-width">
    <a class="brand" href="https://bemarketinggroup.it/" aria-label="BMG, vai al sito"><img src="https://bemarketinggroup.it/assets/images/ui/bmg-logo-dark.png" width="184" height="92" alt="BMG"></a>
    <p class="brand-name">Be Marketing Group</p>
    <a class="text-link" href="#contatti">Parliamone</a>
  </header>
  <main id="contenuto">
    <section class="landing-hero" id="inizio" aria-labelledby="landing-title">
      <div class="landing-hero-image"><img src="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-1600.webp 1600w" sizes="(max-width: 700px) 1100px, 100vw" width="1600" height="1073" alt="La terrazza di Bellevue Syrene tra colonne, mare e luce del tramonto" loading="eager" decoding="async" fetchpriority="high"></div>
      <div class="landing-hero-copy page-width"><p class="eyebrow">Be Marketing Group · Hospitality</p>
        <h1 id="landing-title">Comunicazione per<br>hotel e dimore.</h1>
        <div class="landing-hero-bottom"><p>Strategia, fotografie e contenuti per raccontare la tua struttura e seguirne la comunicazione.</p><a class="text-link" href="#contatti">Parliamone</a></div>
      </div><p class="landing-photo-label">Bellevue Syrene · Sorrento</p>
    </section>
    <section class="landing-offer page-width" id="visione" aria-labelledby="offer-title">
      <div class="landing-offer-heading"><h2 id="offer-title">Un partner per<br>la tua struttura.</h2><p>Siamo BMG, un’agenzia di comunicazione e marketing per l’ospitalità. Affianchiamo proprietà e direzione, da un singolo progetto alla gestione della comunicazione nel tempo.</p></div>
      <div class="landing-services">
        <article><h3>Strategia e identità</h3><p>Definiamo l’immagine, il tono e le priorità della comunicazione.</p></article>
        <article><h3>Fotografia e contenuti</h3><p>Realizziamo fotografie, video e testi per raccontare gli ambienti e chi li fa vivere.</p></article>
        <article><h3>Marketing digitale</h3><p>Seguiamo social, campagne e siti, in base alle esigenze della struttura.</p></article>
      </div>
    </section>
        <section class="client-section page-width" id="clienti" aria-labelledby="clients-title">
      <h2 id="clients-title">I nostri clienti</h2>
      <ul class="client-logos" role="list">
        <li><a href="https://bemarketinggroup.it/progetti/bellevue-syrene/" aria-label="Scopri il progetto Bellevue Syrene"><img class="client-logo--bellevue" src="https://bemarketinggroup.it/assets/images/client-logos/bellevue.svg" width="306" height="115" alt="Bellevue Syrene" loading="lazy" decoding="async"></a></li>
        <li><a href="https://bemarketinggroup.it/progetti/vetera-matera/" aria-label="Scopri il progetto Vetera Matera"><img class="client-logo--vetera" src="https://bemarketinggroup.it/assets/images/client-logos/vetera.svg" width="420" height="81" alt="Vetera Matera" loading="lazy" decoding="async"></a></li>
        <li><a href="https://bemarketinggroup.it/progetti/grand-hotel-la-favorita/" aria-label="Scopri il progetto Grand Hotel La Favorita"><img class="client-logo--favorita" src="https://bemarketinggroup.it/assets/images/client-logos/favorita.png" width="600" height="515" alt="Grand Hotel La Favorita" loading="lazy" decoding="async"></a></li>
        <li><a href="https://bemarketinggroup.it/progetti/grand-hotel-aminta/" aria-label="Scopri il progetto Grand Hotel Aminta"><img class="client-logo--aminta" src="https://bemarketinggroup.it/assets/images/client-logos/aminta.png" width="291" height="200" alt="Grand Hotel Aminta" loading="lazy" decoding="async"></a></li>
        <li><a href="https://bemarketinggroup.it/progetti/grand-hotel-europa-palace/" aria-label="Scopri il progetto Grand Hotel Europa Palace"><img class="client-logo--europa" src="https://bemarketinggroup.it/assets/images/client-logos/europa-palace.svg" width="498" height="322" alt="Grand Hotel Europa Palace" loading="lazy" decoding="async"></a></li>
        <li><a href="https://bemarketinggroup.it/progetti/zest-restaurant/" aria-label="Scopri il progetto Zest Sorrento"><img class="client-logo--zest" src="https://bemarketinggroup.it/assets/images/client-logos/zest.svg" width="460" height="165" alt="Zest Sorrento" loading="lazy" decoding="async"></a></li>
      </ul>
    </section>
    <section class="landing-projects page-width" id="progetti" aria-labelledby="projects-title">
      <div class="landing-section-heading"><h2 id="projects-title">Alcuni dei nostri progetti.</h2></div>
      <div class="landing-project-grid">
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/progetti/bellevue-syrene/" aria-label="Scopri il progetto Bellevue Syrene"><img src="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-1600.webp 1600w" sizes="(max-width: 700px) 90vw, 33vw" width="1600" height="1073" alt="La terrazza di Bellevue Syrene tra colonne, mare e luce del tramonto" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/bellevue-syrene/">Bellevue Syrene</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/progetti/vetera-matera/" aria-label="Scopri il progetto Vetera Matera"><img src="https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-1600.webp 1600w" sizes="(max-width: 700px) 90vw, 33vw" width="1600" height="2400" alt="La vasca tra le pareti di pietra di Vetera Matera" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Matera · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/vetera-matera/">Vetera Matera</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/progetti/zest-restaurant/" aria-label="Scopri il progetto Zest Sorrento"><img src="https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-1600.webp 1600w" sizes="(max-width: 700px) 90vw, 33vw" width="1600" height="1067" alt="Domenico Iavarone con gli ingredienti nella cucina di Zest" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/zest-restaurant/">Zest Sorrento</a></h3></figcaption>
      </figure>
      </div>
    </section>
    <div class="landing-contact-surface"><section class="contact page-width" id="contatti" aria-labelledby="contact-title">
      <div class="section-line"><p>Contatti</p><span>Scrivi a BMG</span></div>
      <p class="landing-personal-note eyebrow" data-personal-note <?= $personalized ? '' : 'hidden' ?>><?= $personalized ? "Un’idea per {$hotel}" : '' ?></p>
      <div class="contact-layout"><div class="contact-heading"><h2 id="contact-title" data-contact-heading><?= $contactName !== '' ? $contactName . ', ne parliamo?' : 'Parliamo<br>del tuo progetto.' ?></h2><p>Raccontaci di cosa hai bisogno. Ti risponderemo via email per un primo confronto.</p><a class="text-link" data-contact-link href="mailto:info@bemarketinggroup.it?subject=<?= $mailSubject ?>">info@bemarketinggroup.it</a></div>
        <form class="contact-form" data-contact-form="bmg_hospitality_landing" data-default-service="Hospitality" aria-labelledby="contact-title">
          <label><span class="field-label">Nome e cognome</span><input type="text" name="name" maxlength="100" autocomplete="name" required placeholder="Nome e cognome"></label>
          <label><span class="field-label">Email</span><input type="email" name="email" maxlength="254" autocomplete="email" required placeholder="nome@dominio.com"></label>
          <label><span class="field-label">Messaggio</span><textarea name="message" maxlength="3000" rows="4" required placeholder="Raccontaci di cosa hai bisogno."></textarea></label>
          <div data-turnstile class="turnstile"></div>
          <label hidden aria-hidden="true">Lascia vuoto questo campo<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <div class="form-bottom"><small>Usiamo questi dati per rispondere alla tua richiesta. <a href="https://bemarketinggroup.it/informazioni/privacy/" target="_blank" rel="noopener">Leggi l’informativa privacy</a>.</small><button type="submit">Invia richiesta</button></div>
          <p class="form-status" data-form-status role="status" aria-live="polite"></p>
          <noscript><p>Per contattarci scrivi a <a href="mailto:info@bemarketinggroup.it">info@bemarketinggroup.it</a>.</p></noscript>
        </form>
      </div>
    </section></div>
  </main>
  <footer class="landing-footer page-width">
    <div class="landing-footer-top"><p>Be Marketing Group</p><nav aria-label="BMG e social"><a href="https://bemarketinggroup.it/">Il sito BMG</a><a href="https://www.instagram.com/bemarketinggroup/" target="_blank" rel="noopener">Instagram</a><a href="https://www.facebook.com/p/Be-Marketing-Group-61567097246880/" target="_blank" rel="noopener">Facebook</a><a href="https://it.linkedin.com/company/bmgsrls" target="_blank" rel="noopener">LinkedIn</a><a href="https://bemarketinggroup.it/informazioni/privacy/">Privacy e cookie</a></nav></div>
    <div class="footer-legal"><p>BMG S.R.L. Semplificata · Sede legale: Via Vicinale S. Maria del Pianto SNC, Torre 5, 80143 Napoli (NA) · C.F. e P.IVA 10631751210 · Registro Imprese di Napoli n. 10631751210 · Capitale sociale € 4.500,00 i.v.</p><span>© <?= $year ?> BMG</span></div>
  </footer>
</body></html>
