importScripts('cache-polyfill.js');

// Кэширование файлов для оффлайн режима
self.addEventListener('install', function(e) {
 e.waitUntil(
   caches.open('title').then(function(cache) {
     return cache.addAll([
       '/',
       '/index.php',
       '/public/img/miniLogo.png',
       '/public/img/logo.png',
       '/public/scripts/main.js',
       '/public/styles/style.css',
       '/public/styles/mobileStyle.css',
       '/room.php',
       'chat.php' 
     ]);
   })
 );
});

 // Кэширование запросов с родительской страницы
self.addEventListener('fetch', function(event) {

  console.log(event.request.url);
  
  event.respondWith(
  
    caches.match(event.request).then(function(response) {
      
      return response || fetch(event.request);
      
    })
  );
});