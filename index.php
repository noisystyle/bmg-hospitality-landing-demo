<?php
declare(strict_types=1);

function clean_query(string $key, string $fallback = ''): string
{
    $value = trim((string) ($_GET[$key] ?? $fallback));
    return htmlspecialchars(mb_substr($value, 0, 90), ENT_QUOTES, 'UTF-8');
}

$hotel = clean_query('hotel');
$contactName = clean_query('nome');
$personalized = $hotel !== '';
$mailSubject = rawurlencode(
    $personalized
        ? "Un confronto su {$hotel}"
        : 'Un confronto con Be Marketing Group'
);
$year = date('Y');
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Be Marketing Group: strategia, identità e comunicazione per hotel e strutture dell’hospitality di lusso.">
    <meta name="theme-color" content="#17130f">
    <title>Be Marketing Group — Hospitality di lusso</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wdth,wght@12..96,75..100,300..700&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/regular/style.css">
    <link rel="stylesheet" href="assets/css/style.css?v=20261001-1">
</head>
<body>
    <a class="skip-link" href="#contenuto">Vai al contenuto</a>

    <header class="site-header" data-header>
        <a class="brand" href="#inizio" aria-label="Be Marketing Group, torna all’inizio">
            <img src="assets/images/bmg-logo-dark.png" alt="BMG" width="112" height="56">
        </a>
        <a class="nav-cta header-cta" href="#contatti">Parliamone</a>
    </header>

    <main id="contenuto">
        <section id="inizio" class="hero" data-header-contrast="dark">
            <div class="hero-kicker">
                <span>Be Marketing Group</span>
            </div>
            <h1>
                Diamo forma al modo in cui un hotel viene
                <span class="accent word-cycle" data-words="scelto.,ricordato.,desiderato.">scelto.</span>
            </h1>
            <div class="hero-bottom">
                <p>
                    Strategia, identità e comunicazione per strutture che vogliono occupare
                    un posto riconoscibile nell’hospitality di lusso.
                </p>
                <a class="round-link" href="#visione" aria-label="Continua verso la nostra visione">
                    <span>Continua</span><i class="ph ph-arrow-down" aria-hidden="true"></i>
                </a>
            </div>
        </section>

        <section class="visual-intro" aria-label="Il nostro sguardo sull’ospitalità" data-header-contrast="light">
            <article class="visual-card visual-card--wide reveal">
                <img src="assets/images/clients/bellevue-syrene/photo-05-1600.webp" srcset="assets/images/clients/bellevue-syrene/photo-05-480.webp 480w, assets/images/clients/bellevue-syrene/photo-05-960.webp 960w, assets/images/clients/bellevue-syrene/photo-05-1600.webp 1600w" sizes="(max-width: 640px) 100vw, 62vw" alt="Bellevue Syrene — Un tavolo tra le colonne, di fronte al Vesuvio" width="1600" height="1067" loading="lazy" decoding="async">
                <span>Luoghi che restano</span>
            </article>
            <article class="visual-card visual-card--portrait reveal">
                <img src="assets/images/clients/vetera-matera/photo-18-1600.webp" srcset="assets/images/clients/vetera-matera/photo-18-480.webp 480w, assets/images/clients/vetera-matera/photo-18-960.webp 960w, assets/images/clients/vetera-matera/photo-18-1600.webp 1600w" sizes="(max-width: 640px) 100vw, 38vw" alt="Vetera Matera — I tavoli della terrazza affacciati su Matera" width="1600" height="2400" loading="lazy" decoding="async">
                <span>Identità che si riconoscono</span>
            </article>
            <div class="visual-note reveal">
                <span class="mono">BMG / 01</span>
                <p>Ogni struttura ha già una storia. Il nostro lavoro è renderla chiara, coerente e rilevante.</p>
            </div>
        </section>

        <section id="visione" class="statement section-pad" data-header-contrast="dark">
            <div class="section-label reveal"><span>01.</span> Visione</div>
            <div class="statement-grid">
                <h2 class="reveal">
                    Il lusso non ha bisogno di alzare la voce.
                    Ha bisogno di una voce <em>propria.</em>
                </h2>
                <div class="statement-copy reveal">
                    <p>
                        Be Marketing Group è un’agenzia di comunicazione specializzata nel marketing
                        per l’hospitality di lusso. Affianchiamo hotel e strutture d’eccellenza quando
                        serve mettere ordine, definire una direzione e trasformarla in comunicazione.
                    </p>
                    <p>
                        Non partiamo dai canali. Partiamo dal luogo, dalle persone e dal tipo di
                        relazione che la struttura vuole costruire con i propri ospiti.
                    </p>
                </div>
            </div>
        </section>

        <section class="marquee" aria-label="Ambiti di lavoro" data-header-contrast="light">
            <div class="marquee-track">
                <span>STRATEGIA</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>BRANDING</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>WEBSITE</span><i class="ph ph-sparkle" aria-hidden="true"></i>
                <span>SOCIAL MEDIA</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>CONTENT</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>CAMPAGNE</span><i class="ph ph-sparkle" aria-hidden="true"></i>
                <span>STRATEGIA</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>BRANDING</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>WEBSITE</span><i class="ph ph-sparkle" aria-hidden="true"></i>
                <span>SOCIAL MEDIA</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>CONTENT</span><i class="ph ph-sparkle" aria-hidden="true"></i><span>CAMPAGNE</span><i class="ph ph-sparkle" aria-hidden="true"></i>
            </div>
        </section>

        <section class="showcase" aria-labelledby="showcase-title" data-header-contrast="light">
            <div class="showcase-heading">
                <div>
                    <span class="mono">Uno sguardo</span>
                    <h2 id="showcase-title">Spazi, dettagli e atmosfere.</h2>
                </div>
                <div class="gallery-controls" aria-label="Controlli della galleria">
                    <button type="button" data-gallery-prev aria-label="Fotografia precedente"><i class="ph ph-arrow-left" aria-hidden="true"></i></button>
                    <button type="button" data-gallery-next aria-label="Fotografia successiva"><i class="ph ph-arrow-right" aria-hidden="true"></i></button>
                </div>
            </div>

            <div class="gallery-track" data-gallery-track>
                <button class="gallery-card gallery-card--landscape" style="--photo-ratio: 1.499531" type="button" data-full="assets/images/clients/bellevue-syrene/photo-09-full.webp" data-caption="Bellevue Syrene — L&#x27;ingresso nel giardino mediterraneo" aria-label="Apri la fotografia di Bellevue Syrene"><img src="assets/images/clients/bellevue-syrene/photo-09-1600.webp" srcset="assets/images/clients/bellevue-syrene/photo-09-480.webp 480w, assets/images/clients/bellevue-syrene/photo-09-960.webp 960w, assets/images/clients/bellevue-syrene/photo-09-1600.webp 1600w" sizes="(max-width: 640px) 90vw, 54vw" alt="Bellevue Syrene — L&#x27;ingresso nel giardino mediterraneo" width="1600" height="1067" loading="lazy" decoding="async"><span>Bellevue Syrene · L&#x27;ingresso nel giardino mediterraneo</span></button>
                <button class="gallery-card gallery-card--portrait" style="--photo-ratio: 0.666667" type="button" data-full="assets/images/clients/vetera-matera/photo-14-full.webp" data-caption="Vetera Matera — Un passaggio nella pietra" aria-label="Apri la fotografia di Vetera Matera"><img src="assets/images/clients/vetera-matera/photo-14-1600.webp" srcset="assets/images/clients/vetera-matera/photo-14-480.webp 480w, assets/images/clients/vetera-matera/photo-14-960.webp 960w, assets/images/clients/vetera-matera/photo-14-1600.webp 1600w" sizes="(max-width: 640px) 72vw, 30vw" alt="Vetera Matera — Un passaggio nella pietra" width="1600" height="2400" loading="lazy" decoding="async"><span>Vetera Matera · Un passaggio nella pietra</span></button>
                <button class="gallery-card gallery-card--portrait" style="--photo-ratio: 0.666667" type="button" data-full="assets/images/clients/grand-hotel-aminta/photo-19-full.webp" data-caption="Grand Hotel Aminta — La terrazza nell&#x27;ora blu" aria-label="Apri la fotografia di Grand Hotel Aminta"><img src="assets/images/clients/grand-hotel-aminta/photo-19-1600.webp" srcset="assets/images/clients/grand-hotel-aminta/photo-19-480.webp 480w, assets/images/clients/grand-hotel-aminta/photo-19-960.webp 960w, assets/images/clients/grand-hotel-aminta/photo-19-1600.webp 1600w" sizes="(max-width: 640px) 72vw, 30vw" alt="Grand Hotel Aminta — La terrazza nell&#x27;ora blu" width="1600" height="2400" loading="lazy" decoding="async"><span>Grand Hotel Aminta · La terrazza nell&#x27;ora blu</span></button>
                <button class="gallery-card gallery-card--portrait" style="--photo-ratio: 0.666667" type="button" data-full="assets/images/clients/grand-hotel-la-favorita/photo-07-full.webp" data-caption="Grand Hotel La Favorita — La tavola sotto il pergolato di limoni" aria-label="Apri la fotografia di Grand Hotel La Favorita"><img src="assets/images/clients/grand-hotel-la-favorita/photo-07-1600.webp" srcset="assets/images/clients/grand-hotel-la-favorita/photo-07-480.webp 480w, assets/images/clients/grand-hotel-la-favorita/photo-07-960.webp 960w, assets/images/clients/grand-hotel-la-favorita/photo-07-1600.webp 1600w" sizes="(max-width: 640px) 72vw, 30vw" alt="Grand Hotel La Favorita — La tavola sotto il pergolato di limoni" width="1600" height="2400" loading="lazy" decoding="async"><span>Grand Hotel La Favorita · La tavola sotto il pergolato di limoni</span></button>
                <button class="gallery-card gallery-card--portrait" style="--photo-ratio: 0.666667" type="button" data-full="assets/images/clients/zest-restaurant/photo-11-full.webp" data-caption="Zest Sorrento — Un dettaglio del risotto" aria-label="Apri la fotografia di Zest Sorrento"><img src="assets/images/clients/zest-restaurant/photo-11-1600.webp" srcset="assets/images/clients/zest-restaurant/photo-11-480.webp 480w, assets/images/clients/zest-restaurant/photo-11-960.webp 960w, assets/images/clients/zest-restaurant/photo-11-1600.webp 1600w" sizes="(max-width: 640px) 72vw, 30vw" alt="Zest Sorrento — Un dettaglio del risotto" width="1600" height="2400" loading="lazy" decoding="async"><span>Zest Sorrento · Un dettaglio del risotto</span></button>
                <button class="gallery-card gallery-card--portrait" style="--photo-ratio: 0.750117" type="button" data-full="assets/images/clients/europa-palace/photo-04-full.webp" data-caption="Grand Hotel Europa Palace — Il pontile e la piscina affacciati sul mare" aria-label="Apri la fotografia di Grand Hotel Europa Palace"><img src="assets/images/clients/europa-palace/photo-04-1600.webp" srcset="assets/images/clients/europa-palace/photo-04-480.webp 480w, assets/images/clients/europa-palace/photo-04-960.webp 960w, assets/images/clients/europa-palace/photo-04-1600.webp 1600w" sizes="(max-width: 640px) 72vw, 30vw" alt="Grand Hotel Europa Palace — Il pontile e la piscina affacciati sul mare" width="1600" height="2133" loading="lazy" decoding="async"><span>Grand Hotel Europa Palace · Il pontile e la piscina affacciati sul mare</span></button>
                <button class="gallery-card gallery-card--portrait" style="--photo-ratio: 0.666667" type="button" data-full="assets/images/clients/artema-matera/photo-18-full.webp" data-caption="Artema Matera — La cura del piatto, al momento del servizio" aria-label="Apri la fotografia di Artema Matera"><img src="assets/images/clients/artema-matera/photo-18-1600.webp" srcset="assets/images/clients/artema-matera/photo-18-480.webp 480w, assets/images/clients/artema-matera/photo-18-960.webp 960w, assets/images/clients/artema-matera/photo-18-1600.webp 1600w" sizes="(max-width: 640px) 72vw, 30vw" alt="Artema Matera — La cura del piatto, al momento del servizio" width="1600" height="2400" loading="lazy" decoding="async"><span>Artema Matera · La cura del piatto, al momento del servizio</span></button>
            </div>

            <div class="gallery-progress" aria-hidden="true"><span data-gallery-progress></span></div>
        </section>

        <section id="competenze" class="services section-pad" data-header-contrast="light">
            <div class="section-label section-label--light reveal"><span>02.</span> Competenze</div>
            <div class="services-heading">
                <h2 class="reveal">Una direzione chiara, prima di ogni contenuto.</h2>
                <p class="reveal">
                    Uniamo pensiero strategico e cura dell’esecuzione per costruire sistemi di
                    comunicazione che funzionano nel tempo, non soltanto al lancio.
                </p>
            </div>
            <div class="service-list">
                <article class="service-row reveal">
                    <span class="service-num">01</span>
                    <h3>Posizionamento e strategia</h3>
                    <p>Analisi, proposta di valore, pubblico, tono di voce e piano di comunicazione.</p>
                </article>
                <article class="service-row reveal">
                    <span class="service-num">02</span>
                    <h3>Brand identity</h3>
                    <p>Identità visiva e verbale, linee guida e strumenti per mantenere coerenza.</p>
                </article>
                <article class="service-row reveal">
                    <span class="service-num">03</span>
                    <h3>Website e presenza digitale</h3>
                    <p>Esperienza, contenuti e design per accompagnare dalla scoperta alla prenotazione.</p>
                </article>
                <article class="service-row reveal">
                    <span class="service-num">04</span>
                    <h3>Social, contenuti e campagne</h3>
                    <p>Direzione creativa, produzione editoriale e distribuzione sui canali rilevanti.</p>
                </article>
            </div>
        </section>

        <section class="clients section-pad" data-header-contrast="dark">
            <div class="section-label reveal"><span>03.</span> Relazioni</div>
            <div class="clients-heading reveal">
                <h2>Hanno scelto di lavorare con noi.</h2>
                <p>Strutture e marchi diversi, una stessa attenzione per identità e qualità.</p>
            </div>
            <div class="logo-grid reveal" aria-label="Alcuni clienti di Be Marketing Group">
                <div><img class="logo-wide" src="assets/images/client-logos/vetera.svg" alt="Vetera Matera"></div>
                <div><img src="assets/images/client-logos/bellevue.svg" alt="Bellevue Syrene"></div>
                <div><img class="logo-tall" src="assets/images/client-logos/favorita.png" alt="Grand Hotel La Favorita"></div>
                <div><img class="logo-zest" src="assets/images/client-logos/zest.svg?v=2" alt="Zest Sorrento"></div>
                <div><img class="logo-tall" src="assets/images/client-logos/europa-palace.svg" alt="Grand Hotel Europa Palace"></div>
                <div><img class="logo-wide" src="assets/images/client-logos/assouline.png" alt="Assouline"></div>
            </div>
        </section>

        <section id="contatti" class="contact" data-header-contrast="light">
            <div class="contact-top">
                <span class="mono">04. CONTATTI</span>
                <span class="personal-note" data-personal-note <?= $personalized ? '' : 'hidden' ?>><?= $personalized ? "Un’idea per {$hotel}" : '' ?></span>
            </div>
            <h2 data-contact-heading>
                <?= $contactName !== '' ? $contactName . ', ne parliamo?' : 'Iniziamo da una conversazione?' ?>
            </h2>
            <div class="contact-layout">
                <div class="contact-copy">
                    <p>Raccontaci la struttura, il punto da cui parti e ciò che vorresti migliorare. Ti risponderemo con un primo punto di vista, senza presentazioni infinite.</p>
                    <a class="contact-mail" data-contact-link href="mailto:info@bemarketinggroup.it?subject=<?= $mailSubject ?>">info@bemarketinggroup.it <i class="ph ph-arrow-up-right" aria-hidden="true"></i></a>
                </div>
                <form class="contact-form" data-contact-form>
                    <label><span class="mono">Nome e cognome</span><input type="text" name="name" autocomplete="name" required placeholder="Come ti chiami?"></label>
                    <label><span class="mono">Email</span><input type="email" name="email" autocomplete="email" required placeholder="nome@dominio.com"></label>
                    <fieldset class="choice-field">
                        <legend class="mono">Su cosa vuoi lavorare?</legend>
                        <div class="choice-grid choice-grid--6">
                            <label class="choice-option"><input type="radio" name="service" value="Posizionamento e strategia"><span>Posizionamento e strategia</span></label>
                            <label class="choice-option"><input type="radio" name="service" value="Brand identity"><span>Brand identity</span></label>
                            <label class="choice-option"><input type="radio" name="service" value="Sito e presenza digitale"><span>Sito e presenza digitale</span></label>
                            <label class="choice-option"><input type="radio" name="service" value="Social media e contenuti"><span>Social media e contenuti</span></label>
                            <label class="choice-option"><input type="radio" name="service" value="Campagne"><span>Campagne</span></label>
                            <label class="choice-option"><input type="radio" name="service" value="Altro"><span>Altro</span></label>
                        </div>
                    </fieldset>
                    <label><span class="mono">La struttura e il progetto</span><textarea name="message" rows="3" required placeholder="Da dove partiamo?"></textarea></label>
                    <div class="contact-form-bottom"><small>Usiamo questi dati soltanto per rispondere alla tua richiesta.</small><button type="submit">Richiedi un confronto <i class="ph ph-arrow-up-right" aria-hidden="true"></i></button></div>
                    <p class="form-status" data-form-status role="status" aria-live="polite"></p>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer" data-header-contrast="light">
        <div>
            <img src="assets/images/bmg-logo-dark.png" alt="BMG" width="112" height="56">
            <p>Strategia e comunicazione per l’hospitality di lusso.</p>
        </div>
        <div class="footer-links">
            <a href="mailto:info@bemarketinggroup.it">info@bemarketinggroup.it</a>
            <span>Napoli, Italia</span>
        </div>
        <div class="footer-bottom">
            <span>© <?= $year ?> BMG srls</span>
            <a href="#inizio">Torna su <i class="ph ph-arrow-up" aria-hidden="true"></i></a>
        </div>
    </footer>

    <dialog class="lightbox" data-lightbox aria-label="Galleria fotografica a schermo intero">
        <div class="lightbox-top">
            <span class="lightbox-counter" data-lightbox-counter></span>
            <button class="lightbox-close" type="button" data-lightbox-close aria-label="Chiudi la galleria"><i class="ph ph-x" aria-hidden="true"></i></button>
        </div>
        <button class="lightbox-arrow lightbox-arrow--prev" type="button" data-lightbox-prev aria-label="Fotografia precedente"><i class="ph ph-arrow-left" aria-hidden="true"></i></button>
        <figure class="lightbox-stage" data-lightbox-stage>
            <img src="" alt="" data-lightbox-image>
            <figcaption data-lightbox-caption></figcaption>
        </figure>
        <button class="lightbox-arrow lightbox-arrow--next" type="button" data-lightbox-next aria-label="Fotografia successiva"><i class="ph ph-arrow-right" aria-hidden="true"></i></button>
    </dialog>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js" defer></script>
    <script src="assets/js/main.js?v=20260930-5" defer></script>
</body>
</html>
