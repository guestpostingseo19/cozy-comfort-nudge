/**
 * The Oven Pizza — vanilla JS animations & interactivity.
 * Ports the React hooks (useReveal, sticky-scroll header, floating actions,
 * menu category filter, FAQ accordion, mobile nav) to plain JS.
 */
(function () {
  'use strict';

  var ready = function (fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  };

  ready(function () {
    // 1) Reveal on scroll ------------------------------------------------
    var revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('in');
            io.unobserve(e.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
      revealEls.forEach(function (el) { io.observe(el); });
    } else {
      revealEls.forEach(function (el) { el.classList.add('in'); });
    }

    // 2) Sticky header scrolled state -----------------------------------
    var header = document.querySelector('[data-site-header]');
    if (header) {
      var onScroll = function () {
        if (window.scrollY > 20) header.classList.add('is-scrolled');
        else header.classList.remove('is-scrolled');
      };
      onScroll();
      window.addEventListener('scroll', onScroll, { passive: true });
    }

    // 3) Mobile nav toggle ----------------------------------------------
    var navBtn = document.querySelector('[data-nav-toggle]');
    var mobilePanel = document.querySelector('[data-mobile-nav]');
    var iconOpen = document.querySelector('[data-nav-icon-open]');
    var iconClose = document.querySelector('[data-nav-icon-close]');
    if (navBtn && mobilePanel) {
      navBtn.addEventListener('click', function () {
        var open = mobilePanel.classList.toggle('is-open');
        navBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        mobilePanel.style.display = open ? 'block' : 'none';
        if (iconOpen && iconClose) {
          iconOpen.style.display = open ? 'none' : 'inline-flex';
          iconClose.style.display = open ? 'inline-flex' : 'none';
        }
      });
      mobilePanel.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () {
          mobilePanel.classList.remove('is-open');
          mobilePanel.style.display = 'none';
          navBtn.setAttribute('aria-expanded', 'false');
          if (iconOpen && iconClose) { iconOpen.style.display = 'inline-flex'; iconClose.style.display = 'none'; }
        });
      });
    }

    // 4) Floating "back to top" ------------------------------------------
    var toTop = document.querySelector('[data-to-top]');
    if (toTop) {
      var toggleTop = function () {
        toTop.style.display = window.scrollY > 400 ? 'grid' : 'none';
      };
      toggleTop();
      window.addEventListener('scroll', toggleTop, { passive: true });
      toTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    // 5) Menu category filter (page-menu.php) ---------------------------
    var filterBar = document.querySelector('[data-menu-filter]');
    if (filterBar) {
      var chips = filterBar.querySelectorAll('[data-cat]');
      var cards = document.querySelectorAll('[data-menu-card]');
      var setActive = function (cat) {
        chips.forEach(function (c) {
          if (c.getAttribute('data-cat') === cat) c.classList.add('is-active');
          else c.classList.remove('is-active');
        });
        cards.forEach(function (card) {
          var cardCat = card.getAttribute('data-cat');
          card.style.display = (cat === 'All' || cardCat === cat) ? '' : 'none';
        });
      };
      chips.forEach(function (c) {
        c.addEventListener('click', function () { setActive(c.getAttribute('data-cat')); });
      });
      setActive('All');
    }

    // 6) FAQ accordion --------------------------------------------------
    document.querySelectorAll('[data-acc-item]').forEach(function (item) {
      var trigger = item.querySelector('.acc-trigger');
      var content = item.querySelector('.acc-content');
      if (!trigger || !content) return;
      trigger.addEventListener('click', function () {
        var open = item.classList.toggle('open');
        if (open) {
          content.style.maxHeight = content.scrollHeight + 32 + 'px';
        } else {
          content.style.maxHeight = '0px';
        }
      });
    });

    // 7) Contact form → intercept submit and show thank-you -------------
    var contactForm = document.querySelector('[data-contact-form]');
    if (contactForm) {
      contactForm.addEventListener('submit', function (e) {
        e.preventDefault();
        var wrap = contactForm.parentElement;
        var thanks = wrap.querySelector('[data-contact-thanks]');
        contactForm.style.display = 'none';
        if (thanks) thanks.style.display = 'block';
      });
    }
  });
})();
