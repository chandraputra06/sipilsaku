document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('keunggulanTrack');
    const outer = document.getElementById('keunggulanOuter');

    if (!track || !outer) return;

    const items  = track.querySelectorAll('.keunggulan-item');
    const GAP    = 20;
    const speed  = 0.6;
    let offset   = 0;
    let setWidth = 0;
    let paused   = false;

    function calcSetWidth() {
        if (!items[0]) return;
        const itemW = items[0].getBoundingClientRect().width + GAP;
        setWidth = itemW * 4;
    }

    function animate() {
        if (!paused) {
            offset += speed;
            if (offset >= setWidth) {
                offset -= setWidth;
            }
            track.style.transform = 'translateX(-' + offset + 'px)';
        }
        requestAnimationFrame(animate);
    }

    outer.addEventListener('mouseenter', function () { paused = true; });
    outer.addEventListener('mouseleave', function () { paused = false; });

    calcSetWidth();
    window.addEventListener('resize', calcSetWidth);
    requestAnimationFrame(animate);
});