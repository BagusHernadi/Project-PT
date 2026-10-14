/**
 * PT. Jafindo Innovatech Permai
 * Main JavaScript - Vanilla JS
 *
 * Fitur:
 * - Mobile Navigation (hamburger menu)
 * - Sticky Navbar dengan efek scroll
 * - Active nav link berdasarkan posisi scroll
 * - Scroll to top button
 * - Scroll reveal animations
 * - CTA form handler
 * - Floating chat button
 * - Smooth anchor scrolling
 * - Experience modal handler
 */

document.addEventListener('DOMContentLoaded', function () {

    // ===== Mobile Navigation =====
    var mobileToggle = document.getElementById('mobileToggle');
    var navbarNav = document.getElementById('navbarNav');
    var navClose = document.getElementById('navClose');
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    function openNav() {
        navbarNav.classList.add('active');
        document.body.style.overflow = 'hidden';
        mobileToggle.innerHTML = '<i class="fa-solid fa-xmark"></i>';
    }

    function closeNav() {
        navbarNav.classList.remove('active');
        document.body.style.overflow = '';
        mobileToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
    }

    // Expose closeNav globally for inline onclick
    window.closeNav = closeNav;

    if (mobileToggle) {
        mobileToggle.addEventListener('click', function () {
            if (navbarNav.classList.contains('active')) {
                closeNav();
            } else {
                openNav();
            }
        });
    }

    if (navClose) {
        navClose.addEventListener('click', closeNav);
    }

    // Close mobile nav when clicking a nav link
    navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            closeNav();
        });
    });

    // ===== Sticky Navbar with Scroll Effect =====
    var navbar = document.getElementById('navbar');

    function handleScroll() {
        if (window.scrollY > 80) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();

    // ===== Active Nav Link on Scroll =====
    var sections = document.querySelectorAll('section[id]');

    function setActiveNav() {
        var scrollPos = window.scrollY + 200;

        sections.forEach(function (section) {
            var sectionTop = section.offsetTop;
            var sectionHeight = section.offsetHeight;
            var sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                navLinks.forEach(function (link) {
                    link.classList.remove('active');
                    var href = link.getAttribute('href');
                    if (href && href === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', setActiveNav);

    // ===== Scroll to Top Button =====
    var scrollTopBtn = document.getElementById('scrollTopBtn');

    function toggleScrollTop() {
        if (window.scrollY > 400) {
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.classList.remove('show');
        }
    }

    window.addEventListener('scroll', toggleScrollTop);

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ===== Scroll Reveal Animations =====
    var fadeElements = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right');

    function revealOnScroll() {
        var windowHeight = window.innerHeight;

        fadeElements.forEach(function (el) {
            var elementTop = el.getBoundingClientRect().top;
            var revealPoint = 100;

            if (elementTop < windowHeight - revealPoint) {
                el.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', revealOnScroll);
    // Trigger once on load
    revealOnScroll();

    // ===== CTA Form Handler =====
    window.handleCta = function (e) {
        e.preventDefault();
        var form = document.getElementById('ctaForm');
        var input = form.querySelector('input[type="email"]');
        var button = form.querySelector('button');
        var originalText = button.textContent;

        // Simulasi pengiriman - buka mailto jika email perusahaan sudah dikonfigurasi
        var email = input.value;
        if (email) {
            // Feedback visual
            button.textContent = 'Terkirim! ✓';
            button.style.background = '#28a745';
            button.style.color = '#fff';
            button.style.borderColor = '#28a745';
            input.value = '';

            setTimeout(function () {
                button.textContent = originalText;
                button.style.background = '';
                button.style.color = '';
                button.style.borderColor = '';
            }, 3000);
        }

        return false;
    };

    // ===== Floating Chat Button =====
    var chatFloatBtn = document.getElementById('chatFloatBtn');
    var chatFloatPanel = document.getElementById('chatFloatPanel');
    var chatPanelClose = document.getElementById('chatPanelClose');

    if (chatFloatBtn && chatFloatPanel) {
        chatFloatBtn.addEventListener('click', function () {
            chatFloatPanel.classList.toggle('active');
        });
    }

    if (chatPanelClose) {
        chatPanelClose.addEventListener('click', function () {
            chatFloatPanel.classList.remove('active');
        });
    }

    // Close chat panel globally
    window.closeChatPanel = function () {
        if (chatFloatPanel) {
            chatFloatPanel.classList.remove('active');
        }
    };

    // Close chat panel when clicking outside
    document.addEventListener('click', function (e) {
        var chatFloat = document.getElementById('chatFloat');
        if (chatFloat && !chatFloat.contains(e.target)) {
            chatFloatPanel.classList.remove('active');
        }
    });

    // ===== Smooth Anchor Scroll for All Hash Links =====
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            if (targetId === '#') return;

            var targetEl = document.querySelector(targetId);
            if (targetEl) {
                e.preventDefault();
                targetEl.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // ===== Experience Modal Handler =====
    var showExperienceBtn = document.getElementById('showExperienceBtn');
    var experienceModal = document.getElementById('experienceModal');
    var closeModalBtn = document.getElementById('closeModalBtn');

    function openModal() {
        experienceModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        experienceModal.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (showExperienceBtn) {
        showExperienceBtn.addEventListener('click', openModal);
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    // Close modal when clicking overlay
    if (experienceModal) {
        experienceModal.addEventListener('click', function (e) {
            if (e.target === experienceModal) {
                closeModal();
            }
        });
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && experienceModal.classList.contains('active')) {
            closeModal();
        }
    });

});
