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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/regular/style.css">
    <link rel="stylesheet" href="assets/css/style.css?v=20260930-3">
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
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1500&q=88" alt="Piscina di un hotel affacciata sul mare" loading="eager">
                <span>Luoghi che restano</span>
            </article>
            <article class="visual-card visual-card--portrait reveal">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1000&q=88" alt="Interno contemporaneo di una struttura ricettiva" loading="eager">
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
                <button class="gallery-card gallery-card--landscape" type="button"
                    data-full="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=max&w=2400&q=92"
                    data-caption="Ingresso e accoglienza"
                    aria-label="Apri Ingresso e accoglienza a schermo intero">
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1600&h=1000&q=88" alt="Ingresso contemporaneo di una struttura ricettiva" loading="lazy">
                    <span>Ingresso e accoglienza</span>
                </button>
                <button class="gallery-card gallery-card--portrait" type="button"
                    data-full="https://images.unsplash.com/photo-1560185127-6ed189bf02f4?auto=format&fit=max&w=2400&q=92"
                    data-caption="Suite e interni"
                    aria-label="Apri Suite e interni a schermo intero">
                    <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4?auto=format&fit=crop&w=900&h=1200&q=88" alt="Camera luminosa dai toni neutri" loading="lazy">
                    <span>Suite e interni</span>
                </button>
                <button class="gallery-card gallery-card--landscape" type="button"
                    data-full="https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=max&w=2400&q=92"
                    data-caption="Piscina e paesaggio"
                    aria-label="Apri Piscina e paesaggio a schermo intero">
                    <img src="https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=crop&w=1600&h=1000&q=88" alt="Piscina di una villa immersa nel paesaggio" loading="lazy">
                    <span>Piscina e paesaggio</span>
                </button>
                <button class="gallery-card gallery-card--square" type="button"
                    data-full="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=max&w=2400&q=92"
                    data-caption="Dettagli di camera"
                    aria-label="Apri Dettagli di camera a schermo intero">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1200&h=1200&q=88" alt="Dettagli curati di una camera d’hotel" loading="lazy">
                    <span>Dettagli di camera</span>
                </button>
                <button class="gallery-card gallery-card--portrait" type="button"
                    data-full="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=max&w=2400&q=92"
                    data-caption="Spazi comuni"
                    aria-label="Apri Spazi comuni a schermo intero">
                    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&h=1200&q=88" alt="Salotto elegante con arredi contemporanei" loading="lazy">
                    <span>Spazi comuni</span>
                </button>
                <button class="gallery-card gallery-card--landscape" type="button"
                    data-full="https://images.unsplash.com/photo-1615874694520-474822394e73?auto=format&fit=max&w=2400&q=92"
                    data-caption="Materia e luce"
                    aria-label="Apri Materia e luce a schermo intero">
                    <img src="https://images.unsplash.com/photo-1615874694520-474822394e73?auto=format&fit=crop&w=1600&h=1000&q=88" alt="Interno caratterizzato da luce naturale e materiali caldi" loading="lazy">
                    <span>Materia e luce</span>
                </button>
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
            <p>
                Un primo confronto serve a capire se c’è una direzione interessante da percorrere insieme.
                Senza presentazioni infinite e senza formule già pronte.
            </p>
            <a class="contact-link" data-contact-link href="mailto:info@bemarketinggroup.it?subject=<?= $mailSubject ?>">
                <span>Scrivi a Be Marketing Group</span><i class="ph ph-arrow-up-right" aria-hidden="true"></i>
            </a>
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
    <script src="assets/js/main.js?v=20260930-2" defer></script>
</body>
</html>
