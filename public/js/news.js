// Optimized news.js
(function() {
    let resizeTimer;
    
    function handleNewsMenuScroll() {
        const menuNews = document.getElementById('menu-news');
        const newsContent = document.getElementById('news-content');

        if (!menuNews || !newsContent) return;

        // Reset styles to get accurate natural height
        menuNews.style.maxHeight = '';
        menuNews.style.overflowY = '';

        if (window.innerWidth > 992) {
            // Temporarily set align-self to start to measure natural height without grid stretch
            const originalMenuAlign = menuNews.style.alignSelf;
            const originalContentAlign = newsContent.style.alignSelf;

            menuNews.style.alignSelf = 'start';
            newsContent.style.alignSelf = 'start';

            const menuHeight = menuNews.offsetHeight;
            const contentHeight = newsContent.offsetHeight;

            // Restore align-self
            menuNews.style.alignSelf = originalMenuAlign;
            newsContent.style.alignSelf = originalContentAlign;

            if (menuHeight > contentHeight) {
                menuNews.style.maxHeight = contentHeight + 'px';
                menuNews.style.overflowY = 'auto';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', handleNewsMenuScroll);
    window.addEventListener('load', handleNewsMenuScroll);
    
    // Throttled resize to prevent layout thrashing
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(handleNewsMenuScroll, 100);
    });
})();
