// Optimized theme.js
document.addEventListener('DOMContentLoaded', function () {
   const html = document.documentElement;
   const toggles = document.querySelectorAll('.theme-toggle');
   
   // Cache DOM elements that need theme updates
   const themeImages = document.querySelectorAll('.theme-image');
   const carouselInverts = document.querySelectorAll('.carousel-invert');

   /* =========================
      THEME CORE
   ========================== */

   function detectThemeOnce() {
      return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
   }

   function getTheme() {
      return localStorage.getItem('theme') || detectThemeOnce();
   }

   function setTheme(theme, save = false) {
      if (html.getAttribute('data-bs-theme') === theme && !save) return; // avoid redundant writes
      
      html.setAttribute('data-bs-theme', theme);
      if (save) localStorage.setItem('theme', theme);
      
      updateThemeImages(theme);
      syncInvertedCarousels(theme);
   }

   /* =========================
      CAROUSEL SWITCHER
   ========================== */
   function syncInvertedCarousels(theme) {
      if (!carouselInverts.length) return;
      
      const inverted = theme === 'dark' ? 'light' : 'dark';
      carouselInverts.forEach(el => {
         // avoid reflow if already set
         if (el.getAttribute('data-bs-theme') !== inverted) {
             el.setAttribute('data-bs-theme', inverted);
         }
      });
   }


   /* =========================
      IMAGE SWITCHER
   ========================== */

   function updateThemeImages(theme) {
      if (!themeImages.length) return;
      
      themeImages.forEach(img => {
         const src = img.dataset[theme];
         // Only assign if it actually changes to avoid layout recalculation
         if (src && img.getAttribute('src') !== src) {
            img.setAttribute('src', src);
         }
      });
   }

   /* =========================
      INIT
   ========================== */

   setTheme(getTheme());

   /* =========================
      TOGGLE HANDLERS (MULTI)
   ========================== */

   if (toggles.length) {
      toggles.forEach(toggle => {
         toggle.addEventListener('click', function (e) {
            e.preventDefault();
            setTheme(
               html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark',
               true
            );
         });
      });
   }
});