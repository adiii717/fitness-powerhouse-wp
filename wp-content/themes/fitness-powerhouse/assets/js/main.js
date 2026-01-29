/**
 * Fitness Power House Theme JavaScript
 */

(function() {
    'use strict';

    // Bulma Mobile Menu Toggle
    function initBulmaNavbar() {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {
                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }

    // Mega Menu Overlay
    function initMegaMenu() {
        const navItems = document.querySelectorAll('.navbar-heading.has-dropdown.is-mega');
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

    // Search form functionality
    function initSearch() {
        const searchInput = document.querySelector('.header-search');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('is-focused');
            });
            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('is-focused');
            });
        }
    }

    // Product slider with Flickity
    function initProductSliders() {
        const sliders = document.querySelectorAll('.products-slider');
        sliders.forEach(slider => {
            if (typeof Flickity !== 'undefined') {
                new Flickity(slider, {
                    cellAlign: 'left',
                    contain: true,
                    groupCells: true,
                    pageDots: false,
                    prevNextButtons: true,
                    wrapAround: false
                });
            }
        });
    }

    // Initialize everything when DOM is ready
    document.addEventListener('DOMContentLoaded', () => {
        initBulmaNavbar();
        initMegaMenu();
        initProductCards();
        initScrollReveal();
        initSearch();
        initProductSliders();
    });

})();
