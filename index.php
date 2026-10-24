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
  <link rel="stylesheet" href="https://bemarketinggroup.it/assets/css/editorial-projects.css?v=5">
  <link rel="stylesheet" href="https://bemarketinggroup.it/assets/css/editorial-design.css?v=9">
  <link rel="stylesheet" href="assets/css/landing-editorial.css?v=1">
  <link rel="stylesheet" href="https://bemarketinggroup.it/assets/css/site-measurement.css?v=1">
  <script src="https://bemarketinggroup.it/assets/js/editorial-navigation.js?v=1" defer></script>
  <script src="https://bemarketinggroup.it/assets/js/editorial-gallery.js?v=3" defer></script>
  <script src="https://bemarketinggroup.it/assets/js/contact-mail.js?v=20261013-2" defer></script>
  <script src="assets/js/landing-editorial.js?v=1" defer></script>
  <script type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://bemarketinggroup.it/#organization","name":"Be Marketing Group","alternateName":"BMG","legalName":"BMG S.R.L. Semplificata","url":"https://bemarketinggroup.it/","email":"info@bemarketinggroup.it","logo":{"@type":"ImageObject","url":"https://bemarketinggroup.it/assets/images/ui/bmg-logo-dark.png"},"sameAs":["https://www.instagram.com/bemarketinggroup/","https://www.facebook.com/p/Be-Marketing-Group-61567097246880/","https://it.linkedin.com/company/bmgsrls"]},{"@type":"WebPage","@id":"https://bemarketinggroup.it/hospitality/#webpage","url":"https://bemarketinggroup.it/hospitality/","name":"Comunicazione e marketing per hotel | Be Marketing Group","inLanguage":"it-IT","isPartOf":{"@id":"https://bemarketinggroup.it/#website"},"about":{"@id":"https://bemarketinggroup.it/#organization"}}]}</script>
</head>
<body id="top" class="editorial-landing">
  <a class="skip-link" href="#contenuto">Vai al contenuto</a>
  <header class="site-header is-paper"><div class="masthead page-width">
    <a class="brand" href="https://bemarketinggroup.it/" aria-label="BMG, vai al sito"><img src="https://bemarketinggroup.it/assets/images/ui/bmg-logo-dark.png" width="184" height="92" alt="BMG"></a>
    <p class="brand-name">Be Marketing Group</p>
    <nav aria-label="Navigazione principale"><a href="#visione">Approccio</a><a href="#progetti">Progetti</a><a href="#contatti">Parliamone</a></nav>
    <button class="menu-toggle" type="button" aria-controls="mobile-navigation" aria-expanded="false" data-menu-open hidden><span>Menu</span><svg viewBox="0 0 28 16" width="28" height="16" aria-hidden="true"><path d="M0 4h28M0 12h28"></path></svg></button>
  </div></header>
  <dialog class="mobile-menu" id="mobile-navigation" aria-label="Menu principale" data-mobile-menu>
    <div class="mobile-menu-top"><img src="https://bemarketinggroup.it/assets/images/ui/bmg-logo-dark.png" width="72" height="36" alt="BMG"><button type="button" data-menu-close autofocus>Chiudi <span aria-hidden="true">×</span></button></div>
    <nav aria-label="Navigazione mobile"><a href="#visione">Approccio</a><a href="#progetti">Progetti</a><a href="#contatti">Parliamone</a><a href="https://bemarketinggroup.it/">Il sito BMG</a></nav>
    <div class="mobile-menu-bottom"><p>Comunicazione e marketing<br>per l’ospitalità.</p><a href="mailto:info@bemarketinggroup.it">info@bemarketinggroup.it</a></div>
  </dialog>
  <main id="contenuto">
    <section class="landing-hero" id="inizio" aria-labelledby="landing-title">
      <div class="landing-hero-image"><img src="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-1600.webp 1600w" sizes="(max-width: 700px) 1100px, 100vw" width="1600" height="1073" alt="La terrazza di Bellevue Syrene tra colonne, mare e luce del tramonto" loading="eager" decoding="async" fetchpriority="high"></div>
      <div class="landing-hero-copy page-width"><p class="eyebrow">Be Marketing Group · Hospitality</p>
        <h1 id="landing-title">Diamo forma al modo<br>in cui un hotel<br>viene scelto.</h1>
        <div class="landing-hero-bottom"><p>Strategia e comunicazione per hotel e dimore.<br>Vicini a chi li guida, dalla prima idea al lavoro di ogni giorno.</p><a class="text-link" href="#contatti">Parliamo della tua struttura</a></div>
      </div><p class="landing-photo-label">Bellevue Syrene · Sorrento</p>
    </section>
    <section class="landing-intro page-width" id="visione" aria-labelledby="intro-title">
      <div><p class="eyebrow">Il nostro approccio</p><h2 id="intro-title">Un partner per<br>la tua struttura.</h2></div>
      <div class="landing-intro-copy"><p>Siamo un’agenzia di comunicazione e marketing per hotel, dimore e ristoranti. Ci confrontiamo con proprietà e direzione per definire come presentarsi e seguire la comunicazione nel tempo.</p><p>Conoscere il luogo e le persone che lo fanno vivere ci aiuta a scegliere cosa raccontare, con quale tono e attraverso quali canali.</p><a class="text-link" href="#contatti">Conosciamoci</a></div>
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
      <div class="landing-section-heading"><div><p class="eyebrow">Progetti selezionati</p><h2 id="projects-title">Il lavoro prende<br>forma nei luoghi.</h2></div><p>Fotografie e progetti degli hotel e dei ristoranti con cui lavoriamo.</p></div>
      <div class="landing-project-track" role="region" aria-label="Fotografie dei progetti BMG, scorri per esplorare" tabindex="0"><figure class="landing-project landing-project--wide">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Bellevue Syrene"><img src="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/bellevue-syrene/selection-20261019-bellevue-terrace-1600.webp 1600w" sizes="(max-width: 700px) 78vw, 520px" width="1600" height="1073" alt="La terrazza di Bellevue Syrene tra colonne, mare e luce del tramonto" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/bellevue-syrene/">Bellevue Syrene</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Vetera Matera"><img src="https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/vetera-matera/selection-20261019-vetera-spa-1600.webp 1600w" sizes="(max-width: 700px) 78vw, 520px" width="1600" height="2400" alt="La vasca tra le pareti di pietra di Vetera Matera" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Matera · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/vetera-matera/">Vetera Matera</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/grand-hotel-aminta/selection-20261019-aminta-garden-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Grand Hotel Aminta"><img src="https://bemarketinggroup.it/assets/images/clients/grand-hotel-aminta/selection-20261019-aminta-garden-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/grand-hotel-aminta/selection-20261019-aminta-garden-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/grand-hotel-aminta/selection-20261019-aminta-garden-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/grand-hotel-aminta/selection-20261019-aminta-garden-1600.webp 1600w" sizes="(max-width: 700px) 78vw, 520px" width="1600" height="2400" alt="Il giardino del Grand Hotel Aminta tra arredi bianchi e cielo azzurro" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/grand-hotel-aminta/">Grand Hotel Aminta</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/grand-hotel-la-favorita/selection-20261019-favorita-lemons-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Grand Hotel La Favorita"><img src="https://bemarketinggroup.it/assets/images/clients/grand-hotel-la-favorita/selection-20261019-favorita-lemons-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/grand-hotel-la-favorita/selection-20261019-favorita-lemons-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/grand-hotel-la-favorita/selection-20261019-favorita-lemons-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/grand-hotel-la-favorita/selection-20261019-favorita-lemons-1600.webp 1600w" sizes="(max-width: 700px) 78vw, 520px" width="1600" height="2400" alt="La tavola della Favorita sotto il pergolato di limoni" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/grand-hotel-la-favorita/">Grand Hotel La Favorita</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Zest Sorrento"><img src="https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/zest-restaurant/selection-20261019-zest-chef-wide-1600.webp 1600w" sizes="(max-width: 700px) 78vw, 520px" width="1600" height="1067" alt="Domenico Iavarone con gli ingredienti nella cucina di Zest" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/zest-restaurant/">Zest Sorrento</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/europa-palace/selection-20261019-europa-coast-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Europa Palace"><img src="https://bemarketinggroup.it/assets/images/clients/europa-palace/selection-20261019-europa-coast-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/europa-palace/selection-20261019-europa-coast-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/europa-palace/selection-20261019-europa-coast-960.webp 960w" sizes="(max-width: 700px) 78vw, 520px" width="960" height="1200" alt="Europa Palace, la piscina e il pontile lungo la costa di Sorrento" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Sorrento · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/grand-hotel-europa-palace/">Europa Palace</a></h3></figcaption>
      </figure>
<figure class="landing-project">
        <a class="landing-project-photo" href="https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-full.webp" data-case-photo aria-label="Ingrandisci la fotografia di Artema"><img src="https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-1600.webp 1600w" sizes="(max-width: 700px) 78vw, 520px" width="1600" height="2400" alt="Il servizio di un piatto di Artema, tra fiori e verdure" loading="lazy" decoding="async"></a>
        <figcaption><p class="eyebrow">Matera · Hospitality</p><h3><a href="https://bemarketinggroup.it/progetti/vetera-matera/">Artema</a></h3></figcaption>
      </figure></div>
      <a class="text-link landing-projects-link" href="https://bemarketinggroup.it/#lavori">Scopri i progetti sul sito</a>
    </section>
    <section class="landing-services" id="competenze" aria-labelledby="services-title"><div class="page-width">
      <div class="landing-section-heading"><div><p class="eyebrow">Di cosa ci occupiamo</p><h2 id="services-title">Una direzione comune,<br>in ogni contenuto.</h2></div><p>Definiamo il lavoro in base alle esigenze della struttura. Possiamo affiancarti su un progetto o seguire la comunicazione nel tempo.</p></div>
      <div class="landing-service-layout"><figure><img src="https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-960.webp" srcset="https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-480.webp 480w, https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-960.webp 960w, https://bemarketinggroup.it/assets/images/clients/artema-matera/selection-20261019-artema-service-1600.webp 1600w" sizes="(max-width: 700px) 70vw, 420px" width="1600" height="2400" alt="Il servizio di un piatto di Artema, tra fiori e verdure" loading="lazy" decoding="async"><figcaption class="eyebrow">Artema · Matera</figcaption></figure><div class="landing-service-list">
        <article><span class="eyebrow">01</span><div><h3>Strategia e identità</h3><p>Mettiamo a fuoco a chi si rivolge la struttura e come vuole presentarsi. Definiamo l’immagine, il tono e le priorità della comunicazione.</p></div></article>
        <article><span class="eyebrow">02</span><div><h3>Fotografia e contenuti</h3><p>Fotografiamo gli ambienti e il lavoro di chi accoglie. Prepariamo video, testi e materiali grafici per raccontarli.</p></div></article>
        <article><span class="eyebrow">03</span><div><h3>Marketing e relazione</h3><p>Seguiamo social e campagne su un calendario condiviso. Discutiamo l’andamento delle attività con chi gestisce la struttura.</p></div></article>
        <article><span class="eyebrow">04</span><div><h3>Siti e presenza digitale</h3><p>Progettiamo siti in cui sia facile conoscere l’hotel, trovare le informazioni e contattarlo o prenotare.</p></div></article>
      </div></div>
    </div></section>
    <section class="landing-method page-width" aria-labelledby="method-title"><div><p class="eyebrow">Come lavoriamo</p><h2 id="method-title">Si comincia<br>da un confronto.</h2></div><div class="landing-method-copy"><p>Ci racconti la struttura, le esigenze e i tempi che hai in mente. Valutiamo insieme da dove partire e definiamo le attività da seguire.</p><p>Il confronto continua durante il lavoro, per rivedere le scelte quando cambiano le priorità dell’hotel.</p><a class="text-link" href="#contatti">Parliamone</a></div></section>
    <div class="landing-contact-surface"><section class="contact page-width" id="contatti" aria-labelledby="contact-title">
      <div class="section-line"><p>Contatti</p><span>Scrivi a BMG</span></div>
      <p class="landing-personal-note eyebrow" data-personal-note <?= $personalized ? '' : 'hidden' ?>><?= $personalized ? "Un’idea per {$hotel}" : '' ?></p>
      <div class="contact-layout"><div class="contact-heading"><h2 id="contact-title" data-contact-heading><?= $contactName !== '' ? $contactName . ', ne parliamo?' : 'Parliamo<br>del tuo progetto.' ?></h2><p>Raccontaci la tua struttura e ciò su cui vorresti lavorare. Ti risponderemo via email per un primo confronto.</p><a class="text-link" data-contact-link href="mailto:info@bemarketinggroup.it?subject=<?= $mailSubject ?>">info@bemarketinggroup.it</a></div>
        <form class="contact-form" data-contact-form="bmg_hospitality_landing" data-default-service="Hospitality" aria-labelledby="contact-title">
          <label><span class="field-label">Nome e cognome</span><input type="text" name="name" maxlength="100" autocomplete="name" required placeholder="Nome e cognome"></label>
          <label><span class="field-label">Email</span><input type="email" name="email" maxlength="254" autocomplete="email" required placeholder="nome@dominio.com"></label>
          <label><span class="field-label">Di cosa vorresti parlare?</span><select name="service"><option value="Hospitality">Un primo confronto</option><option>Posizionamento e strategia</option><option>Brand identity</option><option>Sito e presenza digitale</option><option>Social media e contenuti</option><option>Campagne</option><option>Altro</option></select></label>
          <label><span class="field-label">Il progetto, in breve</span><textarea name="message" maxlength="3000" rows="4" required placeholder="La struttura, le esigenze, i tempi che hai in mente."></textarea></label>
          <div data-turnstile class="turnstile"></div>
          <label hidden aria-hidden="true">Lascia vuoto questo campo<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <div class="form-bottom"><small>Usiamo questi dati per rispondere alla tua richiesta. <a href="https://bemarketinggroup.it/informazioni/privacy/" target="_blank" rel="noopener">Leggi l’informativa privacy</a>.</small><button type="submit">Invia richiesta</button></div>
          <p class="form-status" data-form-status role="status" aria-live="polite"></p>
          <noscript><p>Per contattarci scrivi a <a href="mailto:info@bemarketinggroup.it">info@bemarketinggroup.it</a>.</p></noscript>
        </form>
      </div>
    </section></div>
  </main>
    <footer class="footer page-width">
    <div class="footer-top"><a class="brand" href="https://bemarketinggroup.it/" aria-label="BMG, torna alla homepage"><img src="https://bemarketinggroup.it/assets/images/ui/bmg-logo-dark.png" width="184" height="92" alt="BMG"></a><p>Be Marketing Group<br>Comunicazione per l’ospitalità.</p><a href="mailto:info@bemarketinggroup.it" class="footer-email">info@bemarketinggroup.it</a><a href="#top">Torna su</a></div>
    <div class="footer-directory"><p class="footer-signature">Comunicazione<br>per chi fa ospitalità.</p><nav class="footer-navigation" aria-label="Esplora BMG"><a href="https://bemarketinggroup.it/#lavori">Progetti</a><a href="https://bemarketinggroup.it/#studio">Studio</a><a href="https://bemarketinggroup.it/#competenze">Servizi</a><a href="https://bemarketinggroup.it/#metodo">Come lavoriamo</a><a href="https://bemarketinggroup.it/#clienti">Clienti</a><a href="#contatti">Contatti</a><a href="https://bemarketinggroup.it/journal/">Journal</a><a href="https://www.instagram.com/bemarketinggroup/" target="_blank" rel="noopener">Instagram</a><a href="https://www.facebook.com/p/Be-Marketing-Group-61567097246880/" target="_blank" rel="noopener">Facebook</a><a href="https://it.linkedin.com/company/bmgsrls" target="_blank" rel="noopener">LinkedIn</a><a href="https://bemarketinggroup.it/informazioni/privacy/">Privacy e cookie</a></nav></div>
    <div class="footer-legal"><p>BMG S.R.L. Semplificata · Sede legale: Via Vicinale S. Maria del Pianto SNC, Torre 5, 80143 Napoli (NA) · C.F. e P.IVA 10631751210 · Registro Imprese di Napoli n. 10631751210 · Capitale sociale € 4.500,00 i.v.</p><span>© <?= $year ?> BMG</span></div>
  </footer>
  <dialog class="case-lightbox" aria-label="Galleria fotografica" data-case-dialog>
    <div class="case-lightbox-shell">
      <header class="case-lightbox-bar"><p class="sr-only" data-case-announcement aria-live="polite" aria-atomic="true"></p><button type="button" data-case-close autofocus aria-label="Chiudi la fotografia">Chiudi <span aria-hidden="true">×</span></button></header>
      <div class="case-lightbox-view">
        <button type="button" data-case-prev aria-label="Fotografia precedente">←</button>
        <figure><img data-case-full-image alt=""><p data-case-error hidden>Impossibile caricare la fotografia. <a data-case-original target="_blank" rel="noopener">Apri il file originale</a></p></figure>
        <button type="button" data-case-next aria-label="Fotografia successiva">→</button>
      </div>
    </div>
  </dialog>
</body></html>
