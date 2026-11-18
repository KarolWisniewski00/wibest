const statusColors = {
    active: '#86efac', paused: '#facc15', completed: '#6b7280',
    planned: '#93c5fd', cancelled: '#fca5a5',
};

export function validPosition(object) {
    const numeric = value => value !== null && value !== undefined && String(value).trim() !== '' && Number.isFinite(Number(value));
    return numeric(object.lat) && numeric(object.lng)
        && Math.abs(Number(object.lat)) <= 90 && Math.abs(Number(object.lng)) <= 180;
}

export function loadObjectGoogleMaps(apiKey) {
    if (window.__wibestMapsAuthFailed) return Promise.reject(new Error('auth'));
    if (window.google?.maps?.Map) return Promise.resolve(window.google.maps);
    if (window.__wibestObjectMapsLoading) return window.__wibestObjectMapsLoading;

    window.__wibestObjectMapsLoading = new Promise((resolve, reject) => {
        let script = document.querySelector('script[data-wibest-google-maps], script[src*="maps.googleapis.com/maps/api/js"]');
        if (!script && !apiKey) { reject(new Error('missing-key')); return; }
        const existing = Boolean(script);
        script ??= document.createElement('script');
        const cleanup = () => {
            clearTimeout(timeout);
            clearInterval(poll);
            script.removeEventListener('load', ready);
            script.removeEventListener('error', failed);
            window.removeEventListener('wibest:maps-auth-error', failed);
        };
        const ready = () => {
            if (!window.google?.maps?.Map) return;
            cleanup();
            resolve(window.google.maps);
        };
        const failed = () => { cleanup(); reject(new Error('load')); };
        const timeout = setTimeout(failed, 20000);
        // Also handle a script that was loaded by the existing create form or another view.
        const poll = setInterval(ready, 100);
        script.addEventListener('load', ready);
        script.addEventListener('error', failed);
        window.addEventListener('wibest:maps-auth-error', failed);
        if (!existing) {
            const url = new URL('https://maps.googleapis.com/maps/api/js');
            url.search = new URLSearchParams({ key: apiKey, libraries: 'places,marker', language: 'pl' }).toString();
            script.src = url.toString();
            script.async = true;
            script.defer = true;
            script.dataset.wibestGoogleMaps = 'true';
            const nonce = document.querySelector('script[nonce]')?.nonce;
            if (nonce) script.nonce = nonce;
            document.head.appendChild(script);
        }
        ready();
    });
    return window.__wibestObjectMapsLoading;
}

function installAuthHandler() {
    if (window.__wibestMapsAuthHandler) return;
    window.__wibestMapsAuthHandler = true;
    const previous = window.gm_authFailure;
    window.gm_authFailure = () => {
        window.__wibestMapsAuthFailed = true;
        window.dispatchEvent(new Event('wibest:maps-auth-error'));
        if (typeof previous === 'function') previous();
    };
}

function popupContent(object) {
    const popup = document.createElement('div');
    popup.className = 'wibest-object-popup';
    const name = document.createElement('strong');
    name.textContent = object.name;
    const address = document.createElement('p');
    address.textContent = object.address || 'Brak adresu';
    const link = document.createElement('a');
    // Only accept the same-origin route supplied by the company-scoped controller.
    const url = new URL(object.url, window.location.href);
    if (url.origin === window.location.origin && ['http:', 'https:'].includes(url.protocol)) link.href = url.href;
    link.textContent = 'Zobacz obiekt';
    popup.append(name, address, link);
    return popup;
}

export function groupReadings(readings) {
    const groups = new Map();
    for (const reading of readings) {
        if (!validPosition(reading) || !['START', 'STOP'].includes(reading.type)) continue;
        const key = `${Number(reading.lat)}|${Number(reading.lng)}|${reading.type}`;
        if (!groups.has(key)) groups.set(key, []);
        groups.get(key).push(reading);
    }
    return [...groups.values()];
}

function readingPopup(readings) {
    const container = document.createElement('div');
    container.className = 'wibest-object-popup';
    container.style.maxHeight = '240px';
    container.style.overflowY = 'auto';
    for (const reading of readings) {
        const employee = document.createElement('strong');
        employee.textContent = reading.employee;
        const details = document.createElement('p');
        details.textContent = `${reading.type} · ${reading.time} · ${reading.object}`;
        container.append(employee, details);
    }
    return container;
}

function createMap(element, objects) {
    const maps = window.google.maps;
    const map = new maps.Map(element, {
        center: { lat: 52.0693, lng: 19.4803 }, zoom: 6,
        mapTypeControl: false, streetViewControl: false, fullscreenControl: false,
        gestureHandling: 'cooperative',
    });
    const info = new maps.InfoWindow();

    // OverlayView provides custom, keyboard-accessible markers without requiring a new map ID.
    class ObjectMarker extends maps.OverlayView {
        constructor(object) {
            super();
            this.object = object;
            this.position = new maps.LatLng(Number(object.lat), Number(object.lng));
            this.setMap(map);
        }
        onAdd() {
            this.button = document.createElement('button');
            this.button.type = 'button';
            this.button.className = 'wibest-object-marker';
            this.button.setAttribute('aria-label', this.object.name);
            this.button.style.setProperty('--object-marker-color', statusColors[this.object.status] || '#6b7280');
            if (this.object.radius) this.button.style.zIndex = '2';
            if (this.object.status === 'active') this.button.classList.add('wibest-object-marker-active');
            this.click = () => {
                info.setContent(popupContent(this.object));
                info.setPosition(this.position);
                info.setOptions({ pixelOffset: new maps.Size(0, -18) });
                info.open({ map, shouldFocus: true });
            };
            this.button.addEventListener('click', this.click);
            maps.OverlayView.preventMapHitsAndGesturesFrom(this.button);
            this.getPanes().overlayMouseTarget.appendChild(this.button);
        }
        draw() {
            const point = this.getProjection()?.fromLatLngToDivPixel(this.position);
            if (!point || !this.button) return;
            this.button.style.left = `${point.x}px`;
            this.button.style.top = `${point.y}px`;
        }
        onRemove() {
            this.button?.removeEventListener('click', this.click);
            this.button?.remove();
            this.button = null;
        }
    }

    const markers = objects.map(object => new ObjectMarker(object));
    let readingMarkers = [];
    class ReadingMarker extends maps.OverlayView {
        constructor(readings) {
            super();
            this.readings = readings;
            this.position = new maps.LatLng(Number(readings[0].lat), Number(readings[0].lng));
            this.setMap(map);
        }
        onAdd() {
            const start = this.readings[0].type === 'START';
            this.button = document.createElement('button');
            this.button.type = 'button';
            this.button.setAttribute('aria-label', `${this.readings[0].type}: ${this.readings.length} odczytów`);
            Object.assign(this.button.style, {
                position: 'absolute', width: '18px', height: '18px', borderRadius: '50%',
                border: '2px solid white', background: start ? '#16a34a' : '#dc2626',
                transform: start ? 'translate(-150%, -50%)' : 'translate(50%, -50%)',
                cursor: 'pointer', boxShadow: '0 1px 4px #0006', zIndex: '1',
            });
            this.click = () => {
                info.setContent(readingPopup(this.readings));
                info.setPosition(this.position);
                info.setOptions({ pixelOffset: new maps.Size(0, -10) });
                info.open({ map, shouldFocus: true });
            };
            this.button.addEventListener('click', this.click);
            maps.OverlayView.preventMapHitsAndGesturesFrom(this.button);
            this.getPanes().overlayMouseTarget.appendChild(this.button);
        }
        draw() {
            const point = this.getProjection()?.fromLatLngToDivPixel(this.position);
            if (point && this.button) Object.assign(this.button.style, { left: `${point.x}px`, top: `${point.y}px` });
        }
        onRemove() {
            this.button?.removeEventListener('click', this.click);
            this.button?.remove();
            this.button = null;
        }
    }
    // Only the object preview supplies a radius. Stored allowed_distance values are already in metres.
    const circles = objects.filter(object => Number.isFinite(Number(object.radius)) && Number(object.radius) > 0)
        .map(object => new maps.Circle({
            map,
            center: { lat: Number(object.lat), lng: Number(object.lng) },
            radius: Number(object.radius),
            fillColor: '#86efac', fillOpacity: 0.15,
            strokeColor: '#16a34a', strokeOpacity: 0.85, strokeWeight: 2,
            clickable: false,
        }));
    const fit = () => {
        maps.event.trigger(map, 'resize');
        if (!objects.length) return;
        if (circles.length) {
            const bounds = new maps.LatLngBounds();
            objects.forEach(object => bounds.extend({ lat: Number(object.lat), lng: Number(object.lng) }));
            circles.forEach(circle => { if (circle.getBounds()) bounds.union(circle.getBounds()); });
            map.fitBounds(bounds, 40);
        } else if (objects.length === 1) {
            map.setCenter({ lat: Number(objects[0].lat), lng: Number(objects[0].lng) });
            map.setZoom(15);
        } else {
            const bounds = new maps.LatLngBounds();
            objects.forEach(object => bounds.extend({ lat: Number(object.lat), lng: Number(object.lng) }));
            map.fitBounds(bounds, { top: 45, left: 45, right: 45, bottom: 120 });
        }
    };
    // Clamp fitBounds even when several objects share exactly the same coordinates.
    const zoomListener = map.addListener('zoom_changed', () => {
        if (map.getZoom() > 18) map.setZoom(18);
    });
    const resizeObserver = new ResizeObserver(() => {
        if (element.clientWidth && element.clientHeight) fit();
    });
    resizeObserver.observe(element);
    fit();
    return {
        fit,
        setReadings(readings) {
            info.close();
            readingMarkers.forEach(marker => marker.setMap(null));
            readingMarkers = groupReadings(readings).map(group => new ReadingMarker(group));
        },
        close: () => info.close(),
        destroy() {
            info.close();
            markers.forEach(marker => marker.setMap(null));
            readingMarkers.forEach(marker => marker.setMap(null));
            circles.forEach(circle => circle.setMap(null));
            resizeObserver.disconnect();
            zoomListener.remove();
            maps.event.clearInstanceListeners(map);
            maps.event.clearInstanceListeners(info);
            element.replaceChildren();
        },
    };
}

export function objectMaps({ objects, apiKey, readings = [] }) {
    // Keep Google Maps instances outside Alpine's reactive proxies.
    const instances = new Map();
    let disposed = false;
    let ready;
    let currentReadings = readings;
    const validObjects = objects.filter(validPosition);
    const emptyMessage = objects.length
        ? 'Brak obiektów z prawidłowymi współrzędnymi.'
        : 'Brak obiektów z lokalizacją dla wybranych filtrów.';
    return {
        fullMapOpen: false,
        message: 'Ładowanie mapy…',
        readingsMessage: objects.some(object => object.radius) && !readings.length ? 'Brak odczytów START/STOP z lokalizacją dla aktywnych filtrów.' : '',
        init() {
            installAuthHandler();
            this.authFailed = () => {
                this.message = 'Nie udało się autoryzować Google Maps. Sprawdź konfigurację usługi.';
            };
            window.addEventListener('wibest:maps-auth-error', this.authFailed);
            this.$watch('fullMapOpen', open => {
                if (open) this.$nextTick(() => {
                    document.getElementById('objects-full-map-dialog')?.focus();
                    this.showFullMap();
                });
                else {
                    instances.get('full')?.close();
                    this.$nextTick(() => this.$refs.openButton?.focus());
                }
            });
            if (!validObjects.length) {
                this.message = emptyMessage;
                return;
            }
            ready = loadObjectGoogleMaps(apiKey).then(() => {
                if (disposed || window.__wibestMapsAuthFailed) return;
                instances.set('card', createMap(this.$refs.cardMap, validObjects));
                instances.get('card').setReadings(currentReadings);
                this.message = '';
            }).catch(error => {
                if (disposed) return;
                this.message = error.message === 'missing-key'
                    ? 'Mapa jest niedostępna. Nie skonfigurowano Google Maps.'
                    : 'Nie udało się załadować mapy. Sprawdź połączenie lub konfigurację Google Maps.';
            });
        },
        updateReadings(readings) {
            currentReadings = readings;
            this.readingsMessage = readings.length ? '' : 'Brak odczytów START/STOP z lokalizacją dla aktywnych filtrów.';
            instances.forEach(instance => instance.setReadings(currentReadings));
        },
        async showFullMap() {
            await ready;
            if (disposed || !this.fullMapOpen || this.message) return;
            requestAnimationFrame(() => {
                if (disposed || !this.fullMapOpen) return;
                try {
                    if (!instances.has('full')) instances.set('full', createMap(document.getElementById('objects-full-map'), validObjects));
                    instances.get('full').setReadings(currentReadings);
                    instances.get('full').fit();
                } catch {
                    this.message = 'Nie udało się wyświetlić mapy. Odśwież stronę i spróbuj ponownie.';
                }
            });
        },
        destroy() {
            disposed = true;
            window.removeEventListener('wibest:maps-auth-error', this.authFailed);
            instances.forEach(instance => instance.destroy());
            instances.clear();
        },
    };
}
