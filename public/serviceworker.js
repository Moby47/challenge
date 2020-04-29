var staticCacheName = "pwa-CA" + new Date().getTime();
var filesToCache = [
    '/',
    '/offline',

    'https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css',
    'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons',
    'https://unpkg.com/nprogress@0.2.0/nprogress.css',
    '/css/custom.css',
    '/css/wicked.min.css',
    '/css/home.css',

    '/images/fav/apple-touch-icon.png',
    '/images/fav/favicon-32x32.png',
    '/images/fav/favicon-16x16.png',
    
    '/images/icons/icon-48x48.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-256x256.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
   

    '/images/play.png',
    '/images/bg-dare.jpg',

    'https://unpkg.com/nprogress@0.2.0/nprogress.js',
    'https://code.jquery.com/jquery-3.3.1.slim.min.js',
    'https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js',
    '/js/home.js',
   
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});