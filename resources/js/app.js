import './ebook-carousel';
import './keunggulan-carousel';
import './course-carousel';

document.addEventListener('DOMContentLoaded', () => {
// Animate on scroll
const animatedElements = document.querySelectorAll('[data-animate]');

if (animatedElements.length) {
const observer = new IntersectionObserver(
(entries, obs) => {
entries.forEach((entry) => {
if (!entry.isIntersecting) return;

const el = entry.target;
el.style.transitionDelay = el.dataset.animateDelay || '0ms';

requestAnimationFrame(() => {
requestAnimationFrame(() => {
el.classList.add('is-visible');
});
});

obs.unobserve(el);
});
},
{ threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
);

animatedElements.forEach((el) => observer.observe(el));
}

// Mobile navbar
const toggleButton = document.getElementById('mobileMenuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const mobileOverlay = document.getElementById('mobileMenuOverlay');
const openIcon = document.getElementById('mobileMenuOpenIcon');
const closeIcon = document.getElementById('mobileMenuCloseIcon');
const mobileLinks = document.querySelectorAll('.mobile-menu-link');

if (toggleButton && mobileMenu && mobileOverlay) {
let isOpen = false;

const openMenu = () => {
isOpen = true;
mobileMenu.classList.remove('hidden');
mobileOverlay.classList.remove('hidden');
openIcon?.classList.add('hidden');
closeIcon?.classList.remove('hidden');
document.body.classList.add('overflow-hidden');
};

const closeMenu = () => {
isOpen = false;
mobileMenu.classList.add('hidden');
mobileOverlay.classList.add('hidden');
openIcon?.classList.remove('hidden');
closeIcon?.classList.add('hidden');
document.body.classList.remove('overflow-hidden');
};

const toggleMenu = (e) => {
e.stopPropagation();
isOpen ? closeMenu() : openMenu();
};

toggleButton.addEventListener('click', toggleMenu);

mobileOverlay.addEventListener('click', closeMenu);

mobileLinks.forEach((link) => {
link.addEventListener('click', closeMenu);
});

document.addEventListener('click', (e) => {
if (!isOpen) return;

const clickedInsideMenu = mobileMenu.contains(e.target);
const clickedToggle = toggleButton.contains(e.target);

if (!clickedInsideMenu && !clickedToggle) {
closeMenu();
}
});

document.addEventListener('keydown', (e) => {
if (e.key === 'Escape' && isOpen) {
closeMenu();
}
});

window.addEventListener('resize', () => {
if (window.innerWidth >= 1024 && isOpen) {
closeMenu();
}
});

closeMenu();
}
});

// Admin sidebar
const adminSidebar = document.getElementById('adminSidebar');
const adminSidebarToggle = document.getElementById('adminSidebarToggle');
const adminSidebarOverlay = document.getElementById('adminSidebarOverlay');
const adminSidebarOpenIcon = document.getElementById('adminSidebarOpenIcon');
const adminSidebarCloseIcon = document.getElementById('adminSidebarCloseIcon');
const adminSidebarLinks = document.querySelectorAll('.admin-sidebar-link');

if (adminSidebar && adminSidebarToggle && adminSidebarOverlay) {
let isAdminSidebarOpen = false;

const openAdminSidebar = () => {
isAdminSidebarOpen = true;
adminSidebar.classList.remove('-translate-x-full');
adminSidebarOverlay.classList.remove('hidden');
adminSidebarOpenIcon?.classList.add('hidden');
adminSidebarCloseIcon?.classList.remove('hidden');
document.documentElement.classList.add('overflow-hidden');
document.body.classList.add('overflow-hidden');
};

const closeAdminSidebar = () => {
isAdminSidebarOpen = false;
adminSidebar.classList.add('-translate-x-full');
adminSidebarOverlay.classList.add('hidden');
adminSidebarOpenIcon?.classList.remove('hidden');
adminSidebarCloseIcon?.classList.add('hidden');
document.documentElement.classList.remove('overflow-hidden');
document.body.classList.remove('overflow-hidden');
};

const syncAdminSidebarWithViewport = () => {
if (window.innerWidth >= 1024) {
isAdminSidebarOpen = false;
adminSidebar.classList.remove('-translate-x-full');
adminSidebarOverlay.classList.add('hidden');
adminSidebarOpenIcon?.classList.remove('hidden');
adminSidebarCloseIcon?.classList.add('hidden');
document.documentElement.classList.remove('overflow-hidden');
document.body.classList.remove('overflow-hidden');
} else {
if (!isAdminSidebarOpen) {
adminSidebar.classList.add('-translate-x-full');
adminSidebarOverlay.classList.add('hidden');
adminSidebarOpenIcon?.classList.remove('hidden');
adminSidebarCloseIcon?.classList.add('hidden');
}
}
};

adminSidebarToggle.addEventListener('click', (e) => {
e.stopPropagation();
isAdminSidebarOpen ? closeAdminSidebar() : openAdminSidebar();
});

adminSidebarOverlay.addEventListener('click', closeAdminSidebar);

adminSidebarLinks.forEach((link) => {
link.addEventListener('click', () => {
if (window.innerWidth < 1024) { closeAdminSidebar(); } }); }); document.addEventListener('keydown', (e)=> {
    if (e.key === 'Escape' && isAdminSidebarOpen) {
    closeAdminSidebar();
    }
    });

    window.addEventListener('resize', syncAdminSidebarWithViewport);

    syncAdminSidebarWithViewport();
    }

// Auto submit admin search
document.addEventListener('DOMContentLoaded', () => {
    const autoSearchConfigs = [
        {
            form: document.getElementById('adminCourseSearchForm'),
            input: document.getElementById('adminCourseSearchInput'),
        },
        {
            form: document.getElementById('adminEbookSearchForm'),
            input: document.getElementById('adminEbookSearchInput'),
        },
        {
            form: document.getElementById('adminUserSearchForm'),
            input: document.getElementById('adminUserSearchInput'),
        },
    ];

    autoSearchConfigs.forEach(({ form, input }) => {
        if (!form || !input) return;

        let debounceTimer = null;

        input.addEventListener('input', () => {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(() => {
                form.submit();
            }, 400);
        });
    });
});