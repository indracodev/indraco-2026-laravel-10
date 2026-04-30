// Optimized frontend.js
document.addEventListener('DOMContentLoaded', function () {

   // 1. Auto-select text on hover for inputs and textareas
   document.querySelectorAll('input, textarea').forEach(el => {
      el.addEventListener('mouseenter', function () {
         this.select();
      });
   });

   // 2. Header slide up/down animation on scroll
   const header = document.querySelector('body>header');
   if (header) {
      let lastScrollY = window.scrollY;
      let ticking = false;

      header.classList.add('header-scroll-anim');

      const onScroll = () => {
         const currentScrollY = window.scrollY;
         const isDesktop = window.innerWidth >= 992;
         const isDropdownLinkHovered = isDesktop && !!document.querySelector('.dropdown .dropdown-link:hover, .dropdown .dropdown-menu:hover');

         if (currentScrollY > lastScrollY && currentScrollY > 80 && !isDropdownLinkHovered) {
            header.classList.add('is-hidden');
         } else if (currentScrollY < lastScrollY || currentScrollY <= 80) {
            header.classList.remove('is-hidden');
         }
         lastScrollY = currentScrollY;
         ticking = false;
      };

      window.addEventListener('scroll', function () {
         if (!ticking) {
            window.requestAnimationFrame(() => {
               onScroll();
               
               // Detect sticky elements "is-stuck" state
               document.querySelectorAll('.sticky-top').forEach(el => {
                  const rect = el.getBoundingClientRect();
                  const computedTop = parseInt(window.getComputedStyle(el).top);
                  // Check if it's hitting its sticky top threshold
                  // Use a small buffer for subpixel accuracy
                  el.classList.toggle('is-stuck', rect.top <= computedTop + 1);
               });
            });
            ticking = true;
         }
      }, { passive: true });
   }

   // 3. Static active page highlighting
   const currentPage = window.location.pathname.split("/").pop();
   const activeLinkOverride = document.body.getAttribute("data-active-link");

   document.querySelectorAll("ul a, .navbar a, .nav-link, a[data-i18n]").forEach(link => {
      const linkPage = link.getAttribute("href");
      const dataI18n = link.getAttribute("data-i18n");
      let isActive = false;

      if (linkPage && linkPage !== "#" && !linkPage.startsWith("javascript:")) {
         if (linkPage === currentPage || linkPage === activeLinkOverride) {
            isActive = true;
         }
      }

      if (dataI18n === "nav_news" && currentPage.startsWith("news")) isActive = true;
      if (dataI18n === "nav_product" && ["product.html", "brand.html", "foodservice.html", "equipment.html"].includes(currentPage)) isActive = true;

      if (isActive) {
         link.classList.add("active");
         link.setAttribute("aria-current", "page");
      }
   });

   // 4. Update Carousel Controls
   document.querySelectorAll('.carousel').forEach(carousel => {
      const showControls = carousel.querySelectorAll('.carousel-item').length > 1;
      carousel.querySelector('.carousel-control-prev')?.classList.toggle('d-none', !showControls);
      carousel.querySelector('.carousel-control-next')?.classList.toggle('d-none', !showControls);
   });

   // 5. Apply Text Line 2
   window.applyTextLine2 = function () {
      document.querySelectorAll(".text-line-2").forEach(el => {
         const text = el.textContent.trim();
         if (!text) return;
         const words = text.split(/\s+/);
         const middle = Math.ceil(words.length / 2);
         el.innerHTML = `${words.slice(0, middle).join(" ")}<br>${words.slice(middle).join(" ")}`;
      });
   };
   window.applyTextLine2();

   // 6. Split Paragraph
   window.applySplitParagraph = function () {
      document.querySelectorAll(".split-paragraph").forEach(el => {
         const text = el.textContent.trim();
         if (!text) return;

         const sentences = text.match(/[^\.!\?]+[\.!\?]+/g);
         if (sentences && sentences.length > 1) {
            const middle = Math.ceil(sentences.length / 2);
            el.innerHTML = `<p class="mb-3">${sentences.slice(0, middle).join(" ").trim()}</p><p class="mb-0">${sentences.slice(middle).join(" ").trim()}</p>`;
         } else {
            const words = text.split(/\s+/);
            const middle = Math.ceil(words.length / 2);
            el.innerHTML = `<p class="mb-3">${words.slice(0, middle).join(" ")}</p><p class="mb-0">${words.slice(middle).join(" ")}</p>`;
         }
      });
   };
   window.applySplitParagraph();

   // 7. Desktop hover actions for products/official store submenus
   document.querySelectorAll('.dropdown-menu .nav-pills .nav-link[data-bs-toggle="pill"]').forEach(pill => {
      const onclickAttr = pill.getAttribute('onclick');
      if (onclickAttr && !onclickAttr.includes('(') && !onclickAttr.includes('window.') && !onclickAttr.includes('location.')) {
         pill.setAttribute('data-target-url', onclickAttr.trim());
         pill.removeAttribute('onclick');
      }

      pill.addEventListener('mouseenter', function () {
         const tab = new bootstrap.Tab(this);
         tab.show();
      });

      pill.addEventListener('click', function (e) {
         e.preventDefault();
         const targetUrl = this.getAttribute('data-target-url') || this.getAttribute('href');

         if (targetUrl && targetUrl !== '#' && !targetUrl.startsWith('javascript:')) {
            if (this.getAttribute('target') === "_blank") {
               window.open(targetUrl, '_blank');
            } else {
               window.location.href = targetUrl;
            }
         }
      });
   });

   // 8. Copyright Year
   const copyrightElement = document.getElementById("copyright-year");
   if (copyrightElement) {
      copyrightElement.textContent = new Date().getFullYear();
   }

   // 9. Language Switcher
   const langTogglers = document.querySelectorAll('.lang-toggler');
   if (langTogglers.length) {
      let activeLang = localStorage.getItem('site_lang') || 'id';

      const updateLangUI = () => {
         langTogglers.forEach(toggler => {
            const lang = toggler.getAttribute('data-lang');
            const target = toggler.classList.contains('nav-link') ? toggler : toggler.querySelector('span');
            if (target) {
               target.classList.toggle('active', lang === activeLang);
            }
         });
      };

      window.updateKamusUI = function () {
         if (typeof translations === 'undefined') return;
         document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.getAttribute('data-i18n');
            if (translations[activeLang] && translations[activeLang][key]) {
               element.innerHTML = translations[activeLang][key];
            }
         });
         document.querySelectorAll('[data-i18n-html]').forEach(element => {
            const key = element.getAttribute('data-i18n-html');
            if (translations[activeLang] && translations[activeLang][key]) {
               element.innerHTML = translations[activeLang][key];
            }
         });
         const titleEl = document.querySelector('title[data-i18n-title]');
         if (titleEl) {
            const key = titleEl.getAttribute('data-i18n-title');
            if (translations[activeLang] && translations[activeLang][key]) {
               document.title = translations[activeLang][key].replace(/&ndash;/g, '–').replace(/&amp;/g, '&');
            }
         }
         if (typeof window.applyTextLine2 === 'function') window.applyTextLine2();
         if (typeof window.applySplitParagraph === 'function') window.applySplitParagraph();
         // toggle section penuh berbahasa (privasi.php, terms.php)
         document.querySelectorAll('[data-lang-section]').forEach(function (section) {
            section.style.display = section.getAttribute('data-lang-section') === activeLang ? '' : 'none';
         });
      };

      updateLangUI();
      if (typeof window.updateKamusUI === 'function') window.updateKamusUI();

      langTogglers.forEach(toggler => {
         toggler.addEventListener('click', function (e) {
            e.preventDefault();
            const selectedLang = this.getAttribute('data-lang');
            if (selectedLang !== activeLang) {
               activeLang = selectedLang;
               localStorage.setItem('site_lang', activeLang);
               // Set cookie for PHP to read
               document.cookie = "site_lang=" + activeLang + ";path=/;max-age=" + (365 * 24 * 60 * 60);
               updateLangUI();
               if (typeof window.updateKamusUI === 'function') window.updateKamusUI();
               // Reload page to update server-side content if needed
               window.location.reload();
            }
         });
      });
   }
});
