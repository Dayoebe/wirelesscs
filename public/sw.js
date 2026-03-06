const CACHE_NAME = 'wireless-pwa-v1';
const OFFLINE_URL = '/offline.html';
const CORE_ASSETS = [
  OFFLINE_URL,
  '/manifest.webmanifest',
  '/favicon.png',
  '/icon-192.png'
];

self.addEventListener('install', (event) => {
  event.waitUntil((async () => {
    const cache = await caches.open(CACHE_NAME);
    await cache.addAll(CORE_ASSETS);

    // Cache compiled Vite assets when available.
    try {
      const response = await fetch('/build/manifest.json', { cache: 'no-store' });
      if (!response.ok) return;

      const manifest = await response.json();
      const buildAssets = Object.values(manifest)
        .flatMap((entry) => {
          const files = [entry.file];
          if (Array.isArray(entry.css)) files.push(...entry.css);
          if (Array.isArray(entry.assets)) files.push(...entry.assets);
          return files;
        })
        .filter(Boolean)
        .map((file) => (file.startsWith('/') ? file : `/build/${file}`));

      if (buildAssets.length) {
        await cache.addAll([...new Set(buildAssets)]);
      }
    } catch (error) {
      // Ignore: app still works with core offline fallback.
    }
  })());

  self.skipWaiting();
});

self.addEventListener('activate', (event) => {
  event.waitUntil((async () => {
    const keys = await caches.keys();
    await Promise.all(
      keys
        .filter((key) => key !== CACHE_NAME)
        .map((key) => caches.delete(key))
    );
    await self.clients.claim();
  })());
});

self.addEventListener('fetch', (event) => {
  const { request } = event;

  if (request.method !== 'GET') return;

  const url = new URL(request.url);

  if (request.mode === 'navigate') {
    event.respondWith((async () => {
      try {
        const networkResponse = await fetch(request);
        const cache = await caches.open(CACHE_NAME);
        if (networkResponse.ok) {
          cache.put(request, networkResponse.clone());
        }
        return networkResponse;
      } catch (error) {
        const cache = await caches.open(CACHE_NAME);
        return (await cache.match(request)) || (await cache.match(OFFLINE_URL));
      }
    })());
    return;
  }

  if (url.origin !== self.location.origin) return;

  event.respondWith((async () => {
    const cachedResponse = await caches.match(request);
    if (cachedResponse) return cachedResponse;

    try {
      const networkResponse = await fetch(request);
      const cache = await caches.open(CACHE_NAME);
      if (networkResponse.ok) {
        cache.put(request, networkResponse.clone());
      }
      return networkResponse;
    } catch (error) {
      return caches.match(OFFLINE_URL);
    }
  })());
});
