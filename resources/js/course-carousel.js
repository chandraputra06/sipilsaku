document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('courseTrack');
    const dotsEl = document.getElementById('courseDots');
    const btnPrev = document.getElementById('coursePrev');
    const btnNext = document.getElementById('courseNext');

    if (!track || !dotsEl || !btnPrev || !btnNext) return;

    const slides = Array.from(track.querySelectorAll('.course-slide'));
    const total = slides.length;
    if (!total) return;

    let current = 0;
    let slidesPerView = getSlidesPerView();

    function getSlidesPerView() {
        if (window.innerWidth >= 1280) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
    }

    function getTotalPages() {
        slidesPerView = getSlidesPerView();
        return Math.max(1, total - slidesPerView + 1);
    }

    function getSlideWidth() {
        if (!slides.length) return 0;
        const slide = slides[0];
        const trackStyle = window.getComputedStyle(track);
        const gap = parseFloat(trackStyle.gap || trackStyle.columnGap || 0);
        return slide.offsetWidth + gap;
    }

    function renderDots() {
        const totalPages = getTotalPages();
        dotsEl.innerHTML = '';

        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.setAttribute('aria-label', `Slide ${i + 1}`);
            dot.className =
                'cursor-pointer h-2 rounded-full transition-all duration-300 ' +
                (i === current ? 'w-6 bg-[#D4904A]' : 'w-2 bg-[#D4904A]/30');

            dot.addEventListener('click', () => {
                current = i;
                updateSlider();
            });

            dotsEl.appendChild(dot);
        }
    }

    function updateDots() {
        dotsEl.querySelectorAll('button').forEach((dot, i) => {
            dot.className =
                'cursor-pointer h-2 rounded-full transition-all duration-300 ' +
                (i === current ? 'w-6 bg-[#D4904A]' : 'w-2 bg-[#D4904A]/30');
        });
    }

    function updateButtons() {
        const totalPages = getTotalPages();

        const atStart = current === 0;
        const atEnd = current >= totalPages - 1;

        btnPrev.disabled = atStart;
        btnNext.disabled = atEnd;

        btnPrev.classList.toggle('opacity-40', atStart);
        btnPrev.classList.toggle('cursor-not-allowed', atStart);

        btnNext.classList.toggle('opacity-40', atEnd);
        btnNext.classList.toggle('cursor-not-allowed', atEnd);
    }

    function updateSlider() {
        const totalPages = getTotalPages();

        if (current < 0) current = 0;
        if (current > totalPages - 1) current = totalPages - 1;

        const moveX = getSlideWidth() * current;
        track.style.transform = `translateX(-${moveX}px)`;

        updateDots();
        updateButtons();
    }

    btnNext.addEventListener('click', () => {
        const totalPages = getTotalPages();
        if (current < totalPages - 1) {
            current++;
            updateSlider();
        }
    });

    btnPrev.addEventListener('click', () => {
        if (current > 0) {
            current--;
            updateSlider();
        }
    });

    window.addEventListener('resize', () => {
        updateSlider();
        renderDots();
    });

    track.style.transition = 'transform 500ms ease-in-out';

    renderDots();
    updateSlider();
});