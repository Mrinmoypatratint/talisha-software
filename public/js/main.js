/**
 * Talisha Software — Primary Frontend Interactivity
 * Manages sticky navigation, card 3D tilt, counter animations, tabs, and micro-interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Header
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // 2. Mobile Menu Toggle
    const toggleBtn = document.getElementById('menuToggleBtn') || document.querySelector('.menu-toggle');
    const navMenu = document.getElementById('primaryNavMenu') || document.querySelector('.nav-menu');
    const backdrop = document.getElementById('mobileNavBackdrop');

    function closeMobileMenu() {
        if (!navMenu) return;
        navMenu.classList.remove('open');
        if (toggleBtn) {
            toggleBtn.classList.remove('active');
            toggleBtn.setAttribute('aria-expanded', 'false');
        }
        if (backdrop) backdrop.classList.remove('active');
        document.body.classList.remove('body-scroll-lock');
    }

    function openMobileMenu() {
        if (!navMenu) return;
        navMenu.classList.add('open');
        if (toggleBtn) {
            toggleBtn.classList.add('active');
            toggleBtn.setAttribute('aria-expanded', 'true');
        }
        if (backdrop) backdrop.classList.add('active');
        document.body.classList.add('body-scroll-lock');
    }

    if (toggleBtn && navMenu) {
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (navMenu.classList.contains('open')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        if (backdrop) {
            backdrop.addEventListener('click', closeMobileMenu);
        }

        // Close on link click
        navMenu.querySelectorAll('.nav-link, .nav-mobile-cta a').forEach(link => {
            link.addEventListener('click', () => {
                closeMobileMenu();
            });
        });

        // Close on ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navMenu.classList.contains('open')) {
                closeMobileMenu();
            }
        });

        // Close on resize above mobile breakpoint
        window.addEventListener('resize', () => {
            if (window.innerWidth > 992 && navMenu.classList.contains('open')) {
                closeMobileMenu();
            }
        });
    }

    // 3. Interactive Solution Tabs
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-content');
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.tab;
            tabBtns.forEach(b => b.classList.remove('active'));
            tabPanes.forEach(p => p.classList.remove('active'));

            btn.classList.add('active');
            const targetPane = document.getElementById(target);
            if (targetPane) {
                targetPane.classList.add('active');
            }
        });
    });

    // 4. 3D Tilt Effect on Glass Cards
    const tiltCards = document.querySelectorAll('.tilt-card');
    tiltCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = ((y - centerY) / centerY) * -7;
            const rotateY = ((x - centerX) / centerX) * 7;

            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-6px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
        });
    });

    // 5. Stat Counter Intersection Observer
    const statCounters = document.querySelectorAll('.stat-number[data-target]');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target, 10);
                    const suffix = el.dataset.suffix || '+';
                    let current = 0;
                    const increment = Math.max(1, Math.floor(target / 40));
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        el.textContent = current + suffix;
                    }, 35);
                    obs.unobserve(el);
                }
            });
        }, { threshold: 0.3 });

        statCounters.forEach(c => observer.observe(c));
    }

    // 6. Voice Recognition Demo for Search Bar
    const micBtn = document.getElementById('voice-search-btn');
    const searchInput = document.getElementById('hero-search-input');
    if (micBtn && searchInput) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (SpeechRecognition) {
            const recognition = new SpeechRecognition();
            recognition.continuous = false;
            recognition.lang = 'en-US';

            micBtn.addEventListener('click', () => {
                micBtn.style.color = '#ff3b30';
                recognition.start();
            });

            recognition.onresult = (e) => {
                const transcript = e.results[0][0].transcript;
                searchInput.value = transcript;
                micBtn.style.color = '';
            };

            recognition.onerror = () => {
                micBtn.style.color = '';
            };
            recognition.onend = () => {
                micBtn.style.color = '';
            };
        } else {
            micBtn.style.display = 'none';
        }
    }
});
