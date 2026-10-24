(() => {
  'use strict';
  const query = new URLSearchParams(location.search);
  const value = key => (query.get(key) || '').trim().slice(0, 90);
  const hotel = value('hotel'), name = value('nome');
  const note = document.querySelector('[data-personal-note]');
  const heading = document.querySelector('[data-contact-heading]');
  const link = document.querySelector('[data-contact-link]');
  if (hotel && note) { note.textContent = `Un’idea per ${hotel}`; note.hidden = false; }
  if (name && heading) heading.textContent = `${name}, ne parliamo?`;
  if (link) link.href = `mailto:info@bemarketinggroup.it?subject=${encodeURIComponent(hotel ? `Un confronto su ${hotel}` : 'Un confronto con Be Marketing Group')}`;
  // Share the site's consent preferences and analytics only on the real domain.
  if (['bemarketinggroup.it', 'www.bemarketinggroup.it'].includes(location.hostname)) {
    const script = document.createElement('script');
    script.type = 'module';
    script.src = 'https://bemarketinggroup.it/assets/js/site-measurement.js?v=1';
    document.head.append(script);
  }
})();
