const header = document.querySelector('[data-header]');
const cycle = document.querySelector('.word-cycle');
const galleryTrack = document.querySelector('[data-gallery-track]');
const galleryItems = Array.from(document.querySelectorAll('.gallery-card'));
const galleryProgress = document.querySelector('[data-gallery-progress]');
const galleryPrevious = document.querySelector('[data-gallery-prev]');
const galleryNext = document.querySelector('[data-gallery-next]');
const lightbox = document.querySelector('[data-lightbox]');
const lightboxImage = document.querySelector('[data-lightbox-image]');
const lightboxCaption = document.querySelector('[data-lightbox-caption]');
const lightboxCounter = document.querySelector('[data-lightbox-counter]');
const lightboxStage = document.querySelector('[data-lightbox-stage]');
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

let pageScrollTween = null;
const scrollToSection = (target) => {
    const scrollMargin = parseFloat(window.getComputedStyle(target).scrollMarginTop) || 0;
    const destination = Math.max(0, target.getBoundingClientRect().top + window.scrollY - scrollMargin);

    if (reduceMotion || !window.gsap) {
        window.scrollTo({ top: destination, behavior: reduceMotion ? 'auto' : 'smooth' });
        return;
    }

    pageScrollTween?.kill();
    const position = { y: window.scrollY };
    const distance = Math.abs(destination - position.y);
    pageScrollTween = window.gsap.to(position, {
        y: destination,
        duration: Math.min(1.15, Math.max(.65, distance / 1600)),
        ease: 'power3.inOut',
        onUpdate: () => window.scrollTo(0, position.y),
        onComplete: () => { pageScrollTween = null; }
    });
};

document.querySelectorAll('a[href^="#"]:not([href="#"]):not(.skip-link)').forEach((link) => {
    link.addEventListener('click', (event) => {
        if (event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
        const hash = link.getAttribute('href');
        const target = document.getElementById(decodeURIComponent(hash.slice(1)));
        if (!target) return;

        event.preventDefault();
        scrollToSection(target);
        if (window.location.hash !== hash) window.history.pushState(null, '', hash);
    });
});

const cancelPageScroll = () => {
    pageScrollTween?.kill();
    pageScrollTween = null;
};
window.addEventListener('wheel', cancelPageScroll, { passive: true });
window.addEventListener('touchstart', cancelPageScroll, { passive: true });

const query = new URLSearchParams(window.location.search);
const cleanQueryValue = (key) => (query.get(key) || '').trim().slice(0, 90);
const queryHotel = cleanQueryValue('hotel');
const queryName = cleanQueryValue('nome');
const personalNote = document.querySelector('[data-personal-note]');
const contactHeading = document.querySelector('[data-contact-heading]');
const contactLink = document.querySelector('[data-contact-link]');

if (personalNote && queryHotel) {
    personalNote.textContent = `Un’idea per ${queryHotel}`;
    personalNote.hidden = false;
}
if (contactHeading && queryName) contactHeading.textContent = `${queryName}, ne parliamo?`;
if (contactLink) {
    const subject = queryHotel ? `Un confronto su ${queryHotel}` : 'Un confronto con Be Marketing Group';
    contactLink.href = `mailto:info@bemarketinggroup.it?subject=${encodeURIComponent(subject)}`;
}

let previousScrollY = window.scrollY;
let headerFramePending = false;

const updateHeaderContrast = () => {
    if (!header) return;
    const sampleY = Math.min(70, window.innerHeight - 1);
    const surface = document.elementsFromPoint(window.innerWidth / 2, sampleY)
        .map((element) => element.closest?.('[data-header-contrast]'))
        .find(Boolean);
    header.classList.toggle('is-on-light', surface?.dataset.headerContrast === 'dark');
};

const updateHeaderVisibility = () => {
    const currentScrollY = window.scrollY;
    const goingDown = currentScrollY > previousScrollY + 6;
    const goingUp = currentScrollY < previousScrollY - 6;

    if (header) {
        if (goingDown && currentScrollY > 120) header.classList.add('is-hidden');
        if (goingUp || currentScrollY < 80) header.classList.remove('is-hidden');
        updateHeaderContrast();
    }

    previousScrollY = Math.max(currentScrollY, 0);
    headerFramePending = false;
};

window.addEventListener('scroll', () => {
    if (headerFramePending) return;
    headerFramePending = true;
    window.requestAnimationFrame(updateHeaderVisibility);
}, { passive: true });

window.addEventListener('resize', updateHeaderContrast);
updateHeaderContrast();

if (cycle && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const words = cycle.dataset.words.split(',').filter(Boolean);
    let current = 0;
    window.setInterval(() => {
        cycle.classList.add('is-changing');
        window.setTimeout(() => {
            current = (current + 1) % words.length;
            cycle.textContent = words[current];
            cycle.classList.remove('is-changing');
        }, 260);
    }, 2600);
}

if (galleryTrack && galleryItems.length) {
    const updateGalleryState = () => {
        const maximum = galleryTrack.scrollWidth - galleryTrack.clientWidth;
        const progress = maximum > 0 ? galleryTrack.scrollLeft / maximum : 1;
        const visibleShare = Math.min(1, galleryTrack.clientWidth / galleryTrack.scrollWidth);
        if (galleryProgress) {
            galleryProgress.style.width = `${Math.max(visibleShare, progress * (1 - visibleShare) + visibleShare) * 100}%`;
        }
        if (galleryPrevious) galleryPrevious.disabled = galleryTrack.scrollLeft < 4;
        if (galleryNext) galleryNext.disabled = galleryTrack.scrollLeft > maximum - 4;
    };

    const moveGallery = (direction) => {
        const firstCard = galleryItems[0];
        const gap = parseFloat(getComputedStyle(galleryTrack).gap) || 0;
        galleryTrack.scrollBy({
            left: direction * (firstCard.getBoundingClientRect().width + gap),
            behavior: 'smooth'
        });
    };

    galleryPrevious?.addEventListener('click', () => moveGallery(-1));
    galleryNext?.addEventListener('click', () => moveGallery(1));
    galleryTrack.addEventListener('scroll', updateGalleryState, { passive: true });
    window.addEventListener('resize', updateGalleryState);
    updateGalleryState();
}

if (lightbox && lightboxImage && galleryItems.length) {
    let lightboxIndex = 0;
    let touchStartX = 0;
    let lightboxAnimating = false;
    let lightboxTimeline = null;
    const lightboxChrome = Array.from(lightbox.querySelectorAll('.lightbox-top, .lightbox-arrow'));
    const canAnimateLightbox = Boolean(window.gsap) && !reduceMotion;

    const updateLightbox = (index, animate = true) => {
        lightboxIndex = (index + galleryItems.length) % galleryItems.length;
        const item = galleryItems[lightboxIndex];
        const source = item.dataset.full;
        const caption = item.dataset.caption ?? '';
        const preview = item.querySelector('img');

        if (animate) lightboxImage.classList.add('is-changing');
        window.setTimeout(() => {
            lightboxImage.src = source;
            lightboxImage.alt = preview?.alt ?? caption;
            lightboxCaption.textContent = caption;
            lightboxCounter.textContent = `${String(lightboxIndex + 1).padStart(2, '0')} / ${String(galleryItems.length).padStart(2, '0')}`;
            lightboxImage.classList.remove('is-changing');
        }, animate ? 150 : 0);

        [1, -1].forEach((offset) => {
            const nearby = galleryItems[(lightboxIndex + offset + galleryItems.length) % galleryItems.length];
            const preload = new Image();
            preload.src = nearby.dataset.full;
        });
    };

    const openLightbox = (index) => {
        updateLightbox(index, false);
        lightbox.showModal();
        document.body.classList.add('lightbox-open');
        lightboxAnimating = false;

        if (!canAnimateLightbox) return;

        lightboxTimeline?.kill();
        window.gsap.set(lightbox, { opacity: 0 });
        window.gsap.set(lightboxStage, { yPercent: 18, opacity: 0 });
        window.gsap.set(lightboxChrome, { y: 18, opacity: 0 });
        lightboxTimeline = window.gsap.timeline()
            .to(lightbox, { opacity: 1, duration: .32, ease: 'power2.out' }, 0)
            .to(lightboxStage, { yPercent: 0, opacity: 1, duration: .72, ease: 'power4.out' }, .04)
            .to(lightboxChrome, { y: 0, opacity: 1, duration: .38, stagger: .045, ease: 'power2.out' }, .2);
    };

    const closeLightbox = () => {
        if (!lightbox.open || lightboxAnimating) return;

        const finishClose = () => {
            lightbox.close();
            document.body.classList.remove('lightbox-open');
            lightboxAnimating = false;
        };

        if (!canAnimateLightbox) {
            finishClose();
            return;
        }

        lightboxAnimating = true;
        lightboxTimeline?.kill();
        lightboxTimeline = window.gsap.timeline({ onComplete: finishClose })
            .to(lightboxChrome, { y: 18, opacity: 0, duration: .22, ease: 'power2.in' }, 0)
            .to(lightboxStage, { yPercent: 18, opacity: 0, duration: .48, ease: 'power3.in' }, 0)
            .to(lightbox, { opacity: 0, duration: .34, ease: 'power2.in' }, .12);
    };

    galleryItems.forEach((item, index) => item.addEventListener('click', () => openLightbox(index)));
    document.querySelector('[data-lightbox-close]')?.addEventListener('click', closeLightbox);
    document.querySelector('[data-lightbox-prev]')?.addEventListener('click', () => updateLightbox(lightboxIndex - 1));
    document.querySelector('[data-lightbox-next]')?.addEventListener('click', () => updateLightbox(lightboxIndex + 1));

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) closeLightbox();
    });
    lightbox.addEventListener('close', () => document.body.classList.remove('lightbox-open'));
    lightbox.addEventListener('cancel', (event) => {
        event.preventDefault();
        closeLightbox();
    });
    lightbox.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowLeft') updateLightbox(lightboxIndex - 1);
        if (event.key === 'ArrowRight') updateLightbox(lightboxIndex + 1);
    });
    lightboxStage?.addEventListener('touchstart', (event) => {
        touchStartX = event.changedTouches[0].clientX;
    }, { passive: true });
    lightboxStage?.addEventListener('touchend', (event) => {
        const distance = event.changedTouches[0].clientX - touchStartX;
        if (Math.abs(distance) < 45) return;
        updateLightbox(lightboxIndex + (distance < 0 ? 1 : -1));
    }, { passive: true });
}

const contactForm = document.querySelector('[data-contact-form]');
const formStatus = document.querySelector('[data-form-status]');

if (contactForm && formStatus) {
    contactForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const submitButton = contactForm.querySelector('button[type="submit"]');
        const formData = new FormData(contactForm);
        const payload = {
            name: String(formData.get('name') || '').trim(),
            email: String(formData.get('email') || '').trim(),
            service: String(formData.get('service') || 'Hospitality').trim(),
            message: String(formData.get('message') || '').trim(),
            metadata: {
                page: window.location.href,
                form: 'bmg_hospitality_landing',
            },
        };

        submitButton.disabled = true;
        formStatus.textContent = 'Invio in corso…';

        try {
            const response = await fetch('https://bmg-hub.vercel.app/api/leads', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload),
            });

            if (!response.ok) throw new Error('Lead endpoint unavailable');

            contactForm.reset();
            formStatus.textContent = 'Richiesta inviata. Ti risponderemo appena possibile.';
        } catch (error) {
            formStatus.innerHTML = "Non siamo riusciti a inviare la richiesta. Puoi scriverci a <a href='mailto:info@bemarketinggroup.it'>info@bemarketinggroup.it</a>.";
        } finally {
            submitButton.disabled = false;
        }
    });
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
