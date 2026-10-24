# Restyling editoriale — 24 ottobre 2026

Richiesta: portare la landing esistente nello stesso stile del sito BMG. Repository originale e indirizzo `/hospitality/` conservati.

## Riferimenti

- Sito di riferimento: `bemarketinggroup-del/bmg-website-live`, versione `7d6d229`.
- Stesso sistema tipografico Bodoni Moda / DM Sans, font locali con licenze OFL conservate.
- Header avorio, ampie intestazioni editoriali, sezioni salvia e crema, footer con griglia unificata e social ufficiali.
- Foto già selezionate e pubblicate nel sito, manifest del sito `docs/photo-selection-20261019.json`.
- Revisione della prosa secondo la skill Humanizer, senza inventare risultati, numeri, amenità o testimonianze.

## Foto

Hero e primo progetto: Bellevue Syrene, terrazza. Seguono Vetera spa, Aminta giardino, Favorita pergolato di limoni, Zest chef in cucina, Europa Palace costa e Artema servizio. Immagini WebP responsive già esistenti; nessuna attribuzione del giardino a Bellevue Syrene. Artema rimanda alla scheda Vetera Matera, come nel sito.

## Funzioni conservate

Personalizzazione `hotel`/`nome`, contatti con protezione antispam, galleria con frecce/tastiera/Escape e ritorno del focus, collegamenti ai progetti. Il form è ridotto ai campi essenziali come sul sito. Non vengono inviate email durante il collaudo.

## Verifiche

Anteprima browser locale: desktop 1280px, mobile 390px e 320px; nessuno scorrimento orizzontale della pagina. Menu mobile e link alle sezioni, galleria con avanti/chiudi/Escape e ritorno del focus, personalizzazione Hotel Prova / Anna. I caricamenti differiti delle fotografie vengono valutati nella viewport della sezione, non dalla sola acquisizione a pagina intera.

Test Node: contratto del modulo, dipendenze condivise, asset font, singolo H1, canonical, sicurezza dei parametri lato JS. Il PHP locale non è installato: il workflow Pages esistente esegue PHP per generare la versione predefinita. I parametri vengono verificati sul server dopo la pubblicazione. Nessuna modifica all’API di contatto, al sito principale o ai segreti.

I workflow esistenti sono conservati: il collegamento OAuth consente il push del codice ma non modifiche ai workflow. Non sono richiesti nuovi permessi per il restyling.
