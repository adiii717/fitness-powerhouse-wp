/**
 * Fitness Power House Theme JavaScript
 */

(function() {
    'use strict';

    // Hero Slider
    const heroSlider = {
        slides: document.querySelectorAll('.hero-slide'),
        dots: document.querySelectorAll('.slider-dots .dot'),
        prevBtn: document.querySelector('.hero-section .slider-btn.prev'),
        nextBtn: document.querySelector('.hero-section .slider-btn.next'),
        currentSlide: 0,
        autoPlayInterval: null,

        init() {
            if (this.slides.length === 0) return;

            // Event listeners
            if (this.prevBtn) {
                this.prevBtn.addEventListener('click', () => this.prevSlide());
            }
            if (this.nextBtn) {
                this.nextBtn.addEventListener('click', () => this.nextSlide());
            }

            this.dots.forEach((dot, index) => {
                dot.addEventListener('click', () => this.goToSlide(index));
            });

            // Auto play
            this.startAutoPlay();

            // Pause on hover
            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                heroSection.addEventListener('mouseenter', () => this.stopAutoPlay());
                heroSection.addEventListener('mouseleave', () => this.startAutoPlay());
            }
        },

        goToSlide(index) {
            this.slides[this.currentSlide].classList.remove('active');
            if (this.dots[this.currentSlide]) {
                this.dots[this.currentSlide].classList.remove('active');
            }

            this.currentSlide = index;

            this.slides[this.currentSlide].classList.add('active');
            if (this.dots[this.currentSlide]) {
                this.dots[this.currentSlide].classList.add('active');
            }
        },

        nextSlide() {
            const next = (this.currentSlide + 1) % this.slides.length;
            this.goToSlide(next);
        },

        prevSlide() {
            const prev = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            this.goToSlide(prev);
        },

        startAutoPlay() {
            this.autoPlayInterval = setInterval(() => this.nextSlide(), 4000);
        },

        stopAutoPlay() {
            clearInterval(this.autoPlayInterval);
        }
    };

    // Product Slider Navigation
    function initProductSliders() {
        const sections = document.querySelectorAll('.products-section');

        sections.forEach(section => {
            const slider = section.querySelector('.products-slider');
            const prevBtn = section.querySelector('.slider-nav.prev');
            const nextBtn = section.querySelector('.slider-nav.next');

            if (!slider) return;

            const scrollAmount = 300;

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                });
            }
        });
    }

    // Mega Menu Overlay
    function initMegaMenu() {
        const navItems = document.querySelectorAll('.nav-item.has-mega-menu');
        const overlay = document.querySelector('.desktop-overlay');

        navItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                if (overlay) overlay.classList.add('active');
            });

            item.addEventListener('mouseleave', () => {
                if (overlay) overlay.classList.remove('active');
            });
        });
    }

    // Mobile Menu Toggle
    function initMobileMenu() {
        const toggle = document.querySelector('.mobile-menu-toggle');
        const nav = document.querySelector('.secondary-nav');

        if (toggle && nav) {
            toggle.addEventListener('click', () => {
                nav.classList.toggle('mobile-open');
                toggle.classList.toggle('active');
            });
        }
    }

    // Product Card Interactions
    function initProductCards() {
        // Wishlist buttons
        const wishlistBtns = document.querySelectorAll('.product-action-btn');
        wishlistBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                btn.classList.toggle('active');
            });
        });
    }

    // Scroll reveal animation
    function initScrollReveal() {
        const elements = document.querySelectorAll('.products-section, .promo-section, .brands-section, .category-shortcuts');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }

    // Sticky Header
    function initStickyHeader() {
        let lastScroll = 0;
        const header = document.querySelector('.primary-header');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll <= 0) {
                header.classList.remove('scroll-up', 'scroll-down');
                return;
            }

            if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
                header.classList.remove('scroll-up');
                header.classList.add('scroll-down');
            } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
                header.classList.remove('scroll-down');
                header.classList.add('scroll-up');
            }

            lastScroll = currentScroll;
        });
    }

    // Initialize everything when DOM is ready
    document.addEventListener('DOMContentLoaded', () => {
        heroSlider.init();
        initProductSliders();
        initMegaMenu();
        initMobileMenu();
        initProductCards();
        initScrollReveal();
        initStickyHeader();
    });

})();
