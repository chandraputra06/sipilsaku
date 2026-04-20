document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('ebookTrack');
    const dotsEl = document.getElementById('ebookDots');
    const btnPrev = document.getElementById('ebookPrev');
    const btnNext = document.getElementById('ebookNext');

    if (!track || !dotsEl || !btnPrev || !btnNext) return;

    const slides = Array.from(track.querySelectorAll('.ebook-slide'));
    const total = slides.length;
    if (!total) return;

    let current = 0;
    let autoplay = null;
    let startX = 0;
    let currentTranslate = 0;
    let isDragging = false;

    track.style.display = 'flex';
    track.style.willChange = 'transform';

    slides.forEach((slide) => {
        slide.style.flex = '0 0 100%';
        slide.style.width = '100%';
    });

    dotsEl.innerHTML = '';

    slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.setAttribute('aria-label', `Slide ${i + 1}`);
        dot.className =
            'cursor-pointer h-2 rounded-full transition-all duration-300 ' +
            (i === 0 ? 'w-6 bg-[#D4904A]' : 'w-2 bg-[#D4904A]/30');

        dot.addEventListener('click', () => {
            stopAutoplay();
            goTo(i);
            startAutoplay();
        });

        dotsEl.appendChild(dot);
    });

    function updateDots() {
        dotsEl.querySelectorAll('button').forEach((dot, i) => {
            dot.className =
                'cursor-pointer h-2 rounded-full transition-all duration-300 ' +
                (i === current ? 'w-6 bg-[#D4904A]' : 'w-2 bg-[#D4904A]/30');
        });
    }

    function setTrackTransition(enabled = true) {
        track.style.transition = enabled
            ? 'transform 700ms cubic-bezier(0.22, 1, 0.36, 1)'
            : 'none';
    }

    function goTo(index) {
        current = (index + total) % total;
        setTrackTransition(true);
        track.style.transform = `translateX(-${current * 100}%)`;
        updateDots();
    }

    function nextSlide() {
        goTo(current + 1);
    }

    function prevSlide() {
        goTo(current - 1);
    }

    function stopAutoplay() {
        if (autoplay) {
            clearInterval(autoplay);
            autoplay = null;
        }
    }

    function startAutoplay() {
        stopAutoplay();
        autoplay = setInterval(() => {
            nextSlide();
        }, 4500);
    }

    btnNext.addEventListener('click', () => {
        stopAutoplay();
        nextSlide();
        startAutoplay();
    });

    btnPrev.addEventListener('click', () => {
        stopAutoplay();
        prevSlide();
        startAutoplay();
    });

    track.addEventListener('mouseenter', stopAutoplay);
    track.addEventListener('mouseleave', startAutoplay);

    track.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].clientX;
        currentTranslate = -current * track.parentElement.offsetWidth;
        setTrackTransition(false);
        stopAutoplay();
    }, { passive: true });

    track.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const dx = e.touches[0].clientX - startX;
        track.style.transform = `translateX(${currentTranslate + dx}px)`;
    }, { passive: true });

    track.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        isDragging = false;

        const endX = e.changedTouches[0].clientX;
        const diff = endX - startX;

        if (Math.abs(diff) > 50) {
            if (diff < 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        } else {
            goTo(current);
        }

        startAutoplay();
    });

    goTo(0);
    startAutoplay();
});