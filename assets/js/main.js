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
let headerHidden = false;

const updateHeaderContrast = () => {
    if (!header) return;
    const sampleY = Math.min(70, window.innerHeight - 1);
    const surface = document.elementsFromPoint(window.innerWidth / 2, sampleY)
        .map((element) => element.closest?.('[data-header-contrast]'))
        .find(Boolean);
    header.classList.toggle('is-on-light', surface?.dataset.headerContrast === 'dark');
};

const setHeaderHidden = (hidden) => {
    if (!header || hidden === headerHidden) return;
    headerHidden = hidden;

    if (!window.gsap || reduceMotion) {
        header.classList.toggle('is-hidden', hidden);
        return;
    }

    header.classList.remove('is-hidden');
    window.gsap.killTweensOf(header);
    header.style.pointerEvents = hidden ? 'none' : 'auto';
    window.gsap.to(header, {
        yPercent: hidden ? -112 : 0,
        opacity: hidden ? 0 : 1,
        filter: hidden ? 'blur(14px)' : 'blur(0px)',
        duration: hidden ? .52 : .62,
        ease: hidden ? 'power3.in' : 'power4.out',
        overwrite: true
    });
};

const updateHeaderVisibility = () => {
    const currentScrollY = window.scrollY;

    if (currentScrollY <= 36 || currentScrollY < previousScrollY) {
        setHeaderHidden(false);
    } else if (currentScrollY > previousScrollY && currentScrollY > 120) {
        setHeaderHidden(true);
    }

    previousScrollY = currentScrollY;
    updateHeaderContrast();
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

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
