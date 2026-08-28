<!doctype html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funkcje – WIBEST RCP</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Raleway:wght@500;700;900&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --green:    #86efac;
      --green-dk: #4ade80;
      --bg:       #ffffff;
      --bg2:      #f9fafb;
      --bg3:      #f3f4f6;
      --card:     #ffffff;
      --border:   #e5e7eb;
      --text:     #111827;
      --muted:    #6b7280;
      --violet:   #c4b5fd;
      --pink:     #f9a8d4;
      --indigo:   #a5b4fc;
      --yellow:   #fde68a;
      --emerald:  #6ee7b7;
    }
    html.dark {
      --bg:    #111827;
      --bg2:   #1f2937;
      --bg3:   #374151;
      --card:  #1f2937;
      --border:#374151;
      --text:  #f9fafb;
      --muted: #9ca3af;
    }

    body {
      font-family: "Lato", sans-serif;
      background: var(--bg);
      color: var(--text);
      transition: background .3s, color .3s;
    }

    /* ── HEADER ── */
    header {
      position: sticky; top: 0; z-index: 50;
      background: var(--card);
      border-bottom: 1px solid var(--border);
      box-shadow: 0 1px 4px rgba(0,0,0,.06);
      display: flex; justify-content: center; align-items: center;
      height: 72px;
      transition: background .3s;
    }
    .header-inner {
      max-width: 1280px; width: 100%;
      display: flex; justify-content: space-between; align-items: center;
      padding: 0 2rem;
    }
    .logo { font-family: "Raleway", sans-serif; font-size: 1.35rem; font-weight: 700; color: var(--green); text-decoration: none; }
    nav a {
      font-size: .85rem; font-weight: 600; text-decoration: none;
      color: var(--muted); padding: .25rem .5rem; border-radius: 6px;
      transition: color .2s, background .2s;
    }
    nav a:hover, nav a.active { color: var(--text); }
    nav a.active { border-bottom: 2px solid var(--green); }
    .nav-links { display: flex; gap: 1.5rem; }
    .btn-login {
      background: var(--green); color: #111827; font-size: .82rem; font-weight: 700;
      letter-spacing: .08em; text-transform: uppercase;
      padding: .55rem 1.1rem; border-radius: 8px; text-decoration: none;
      transition: background .2s;
    }
    .btn-login:hover { background: var(--green-dk); }
    #dark-btn {
      background: none; border: 1.5px solid var(--border); color: var(--muted);
      border-radius: 8px; padding: .45rem .75rem; cursor: pointer; font-size: .9rem;
      transition: background .2s, color .2s;
    }
    #dark-btn:hover { background: var(--bg3); color: var(--text); }

    /* ── HERO ── */
    .hero {
      background: var(--bg2);
      border-bottom: 1px solid var(--border);
      padding: 5rem 2rem 4rem;
      text-align: center;
    }
    .hero-label {
      display: inline-block;
      font-size: .7rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
      background: var(--green); color: #111827;
      padding: .3rem .85rem; border-radius: 99px; margin-bottom: 1.4rem;
    }
    .hero h1 {
      font-family: "Raleway", sans-serif;
      font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900;
      line-height: 1.1; color: var(--text); margin-bottom: 1.2rem;
    }
    .hero h1 span { color: var(--green); }
    .hero p { max-width: 560px; margin: 0 auto; color: var(--muted); font-size: 1.05rem; line-height: 1.7; }

    /* ── MODULE TABS ── */
    .tab-bar {
      background: var(--card);
      border-bottom: 1px solid var(--border);
      display: flex; justify-content: center; gap: .5rem;
      padding: 0 1rem; overflow-x: auto;
    }
    .tab-btn {
      background: none; border: none; cursor: pointer;
      font-family: "Lato", sans-serif; font-size: .82rem; font-weight: 700;
      letter-spacing: .06em; text-transform: uppercase;
      color: var(--muted); padding: 1rem 1.2rem;
      border-bottom: 2.5px solid transparent;
      white-space: nowrap;
      transition: color .2s, border-color .2s;
    }
    .tab-btn:hover { color: var(--text); }
    .tab-btn.active { color: var(--text); border-bottom-color: var(--green); }

    /* ── MAIN LAYOUT ── */
    .page-wrap {
      max-width: 1280px; margin: 0 auto; padding: 4rem 2rem;
      display: grid; grid-template-columns: 260px 1fr; gap: 3rem;
      align-items: start;
    }
    @media(max-width:900px) { .page-wrap { grid-template-columns: 1fr; } }

    /* ── STICKY SIDEBAR ── */
    .sidebar {
      position: sticky; top: 88px;
    }
    .sidebar-card {
      background: var(--card); border: 1px solid var(--border);
      border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 24px rgba(0,0,0,.05);
    }
    .sidebar-label {
      font-size: .65rem; letter-spacing: .2em; text-transform: uppercase;
      color: var(--muted); margin-bottom: 1rem; display: block;
    }
    .side-link {
      display: flex; align-items: center; gap: .75rem;
      padding: .65rem 1rem; border-radius: 10px;
      font-size: .88rem; font-weight: 600; text-decoration: none;
      color: var(--muted); margin-bottom: .25rem;
      transition: background .2s, color .2s;
    }
    .side-link:hover { background: var(--bg3); color: var(--text); }
    .side-link.active { background: var(--green); color: #111827; }
    .side-link .dot {
      width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0;
    }
    .divider { height: 1px; background: var(--border); margin: 1rem 0; }
    .sidebar-note {
      font-size: .75rem; color: var(--muted); line-height: 1.5;
    }

    /* ── CONTENT SECTIONS ── */
    .module-section {
      margin-bottom: 5rem;
    }
    /* accent bar */
    .module-header {
      display: flex; align-items: center; gap: 1rem; margin-bottom: 2.5rem;
    }
    .module-icon-wrap {
      width: 52px; height: 52px; border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem; flex-shrink: 0;
    }
    .module-meta { flex: 1; }
    .module-tag {
      font-size: .62rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
      padding: .2rem .65rem; border-radius: 99px; display: inline-block; margin-bottom: .35rem;
    }
    .module-meta h2 {
      font-family: "Raleway", sans-serif;
      font-size: 1.65rem; font-weight: 900; color: var(--text); line-height: 1.2;
    }
    .module-desc {
      color: var(--muted); font-size: .95rem; line-height: 1.7; margin-bottom: 2rem;
      max-width: 680px;
    }

    /* feature grid */
    .feature-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .feature-card {
      background: var(--card); border: 1px solid var(--border);
      border-radius: 14px; padding: 1.25rem 1.4rem;
      transition: box-shadow .2s, transform .2s;
    }
    .feature-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,.08); transform: translateY(-2px); }
    .fc-top { display: flex; align-items: center; gap: .65rem; margin-bottom: .5rem; }
    .fc-icon { font-size: 1.1rem; }
    .fc-title { font-size: .9rem; font-weight: 700; color: var(--text); }
    .fc-desc { font-size: .8rem; color: var(--muted); line-height: 1.5; }

    /* entry types strip */
    .entries-title {
      font-size: .85rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
      color: var(--muted); margin: 2.5rem 0 1rem;
    }
    .entries-row {
      display: flex; gap: .75rem; flex-wrap: wrap;
    }
    .entry-chip {
      display: flex; align-items: center; gap: .5rem;
      background: var(--bg2); border: 1px solid var(--border);
      border-radius: 10px; padding: .55rem 1rem;
      font-size: .78rem; font-weight: 600; color: var(--text);
    }
    .entry-chip-dot { width: 10px; height: 10px; border-radius: 50%; }

    /* highlight box */
    .highlight-box {
      background: var(--bg2); border-left: 4px solid var(--green);
      border-radius: 0 12px 12px 0; padding: 1.1rem 1.4rem;
      margin-bottom: 2rem; font-size: .88rem; color: var(--text); line-height: 1.6;
    }
    .highlight-box strong { color: var(--text); }

    /* table */
    .feat-table { width: 100%; border-collapse: collapse; font-size: .85rem; margin-bottom: 2rem; }
    .feat-table th {
      text-align: left; padding: .7rem 1rem;
      font-size: .7rem; letter-spacing: .12em; text-transform: uppercase;
      color: var(--muted); border-bottom: 2px solid var(--border);
    }
    .feat-table td { padding: .75rem 1rem; border-bottom: 1px solid var(--border); color: var(--text); vertical-align: top; }
    .feat-table tr:last-child td { border-bottom: none; }
    .feat-table td:first-child { font-weight: 700; white-space: nowrap; }
    .check { color: var(--green-dk); font-size: 1rem; }

    /* ── COLORS PER MODULE ── */
    .c-green   { background: #dcfce7; color: #14532d; }
    .c-violet  { background: #ede9fe; color: #4c1d95; }
    .c-pink    { background: #fce7f3; color: #831843; }
    .c-blue    { background: #dbeafe; color: #1e3a5f; }
    .c-yellow  { background: #fef9c3; color: #713f12; }
    html.dark .c-green  { background: #14532d; color: #86efac; }
    html.dark .c-violet { background: #2e1065; color: #c4b5fd; }
    html.dark .c-pink   { background: #500724; color: #f9a8d4; }
    html.dark .c-blue   { background: #1e3a5f; color: #93c5fd; }
    html.dark .c-yellow { background: #451a03; color: #fde68a; }

    /* separator */
    .sec-sep { border: none; border-top: 1px solid var(--border); margin: 4rem 0; }

    /* ── FOOTER ── */
    footer {
      background: var(--bg2); border-top: 1px solid var(--border);
      padding: 3rem 2rem 2rem; text-align: center; color: var(--muted); font-size: .82rem;
    }
    footer a { color: var(--muted); text-decoration: none; }
    footer a:hover { color: var(--text); }
    .footer-brand { font-family: "Raleway", sans-serif; font-size: 1.5rem; font-weight: 900; color: var(--text); margin-bottom: .5rem; }
    .footer-brand span { color: var(--green); }
    .footer-links { display: flex; justify-content: center; gap: 2rem; margin: 1rem 0 1.5rem; flex-wrap: wrap; }

    @media(max-width:600px) {
      .nav-links { display: none; }
      .feature-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- HEADER -->
<header>
  <div class="header-inner">
    <a href="#" class="logo">WIBEST</a>
    <nav class="nav-links">
      <a href="#">🏠</a>
      <a href="#" class="active">Funkcje</a>
      <a href="#">O nas</a>
      <a href="#">Blog</a>
      <a href="#">Kontakt</a>
    </nav>
    <div style="display:flex;gap:.75rem;align-items:center;">
      <button id="dark-btn" title="Tryb ciemny">🌙</button>
      <a href="#" class="btn-login">→ Logowanie</a>
    </div>
  </div>
</header>

<!-- HERO -->
<section class="hero">
  <div class="hero-label">Dokumentacja modułów</div>
  <h1>Wszystko, czego potrzebujesz<br>do <span>zarządzania czasem pracy</span></h1>
  <p>WIBEST to kompletny system RCP online — od rejestracji wejść i wyjść, przez planowanie grafiku, aż po automatyczne raporty i powiadomienia SMS.</p>
</section>

<!-- TAB BAR (decorative, można rozbudować JS) -->
<div class="tab-bar">
  <button class="tab-btn active" onclick="scrollTo('rcp',this)">⏱️ RCP</button>
  <button class="tab-btn" onclick="scrollTo('ewnioski',this)">🏖️ E-wnioski</button>
  <button class="tab-btn" onclick="scrollTo('planowanie',this)">📅 Planowanie</button>
  <button class="tab-btn" onclick="scrollTo('raporty',this)">📊 Raporty</button>
  <button class="tab-btn" onclick="scrollTo('sms',this)">📱 SMS</button>
</div>

<!-- MAIN -->
<div class="page-wrap">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-card">
      <span class="sidebar-label">Moduły systemu</span>

      <a href="#rcp" class="side-link active">
        <span class="dot" style="background:#86efac"></span> RCP
      </a>
      <a href="#ewnioski" class="side-link">
        <span class="dot" style="background:#f9a8d4"></span> E-wnioski
      </a>
      <a href="#planowanie" class="side-link">
        <span class="dot" style="background:#93c5fd"></span> Planowanie
      </a>
      <a href="#raporty" class="side-link">
        <span class="dot" style="background:#fde68a"></span> Raporty
      </a>
      <a href="#sms" class="side-link">
        <span class="dot" style="background:#c4b5fd"></span> SMS
      </a>

      <div class="divider"></div>
      <p class="sidebar-note">
        Masz pytanie dotyczące konkretnego modułu?<br>
        <a href="#" style="color:var(--green);font-weight:700;">Napisz do nas →</a>
      </p>
    </div>
  </aside>

  <!-- CONTENT -->
  <main>

    <!-- 1. RCP ─────────────────────────────────── -->
    <section class="module-section" id="rcp">
      <div class="module-header">
        <div class="module-icon-wrap c-green" style="font-size:1.7rem;">⏱️</div>
        <div class="module-meta">
          <span class="module-tag c-green">Moduł 1</span>
          <h2>Rejestracja czasu pracy (RCP)</h2>
        </div>
      </div>

      <p class="module-desc">
        Rdzeń systemu WIBEST. Umożliwia rejestrację wejść i wyjść pracowników w czasie rzeczywistym
        — zarówno ręcznie przez administratora, jak i samodzielnie przez pracownika.
        System automatycznie wykrywa nadgodziny, braki normy, pracę nocną oraz wielokrotne odczyty w ciągu dnia.
      </p>

      <div class="highlight-box">
        <strong>Kluczowy scenariusz:</strong> Pracownik loguje się o 7:30 zamiast o 8:00 i kończy o 16:30. WIBEST
        automatycznie oznacza wpis jako <em>nadgodziny</em>, wyróżnia go kolorem i czeka na akceptację przełożonego —
        bez żadnej ręcznej interwencji.
      </div>

      <div class="feature-grid">
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">▶️</span><span class="fc-title">Zegar start / stop</span></div>
          <p class="fc-desc">Pracownik samodzielnie rozpoczyna i kończy sesję pracy jednym kliknięciem. Czas liczony jest z dokładnością do sekundy.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">📋</span><span class="fc-title">Dodawanie masowe</span></div>
          <p class="fc-desc">Administrator może jednorazowo wprowadzić wpisy dla wielu pracowników — idealnie do uzupełnienia danych wstecznych.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">✏️</span><span class="fc-title">Dodawanie pojedyncze</span></div>
          <p class="fc-desc">Ręczne wprowadzenie godziny wejścia i wyjścia dla konkretnego pracownika i dnia.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🚪</span><span class="fc-title">Tylko rozpoczęcie pracy</span></div>
          <p class="fc-desc">Tryb, w którym rejestrujemy wyłącznie moment przyjścia — koniec pracy uzupełniany jest przez system lub administratora.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🔄</span><span class="fc-title">Edycja rozpoczęcia</span></div>
          <p class="fc-desc">Możliwość korekty godziny wejścia przez uprawnionego administratora — z zachowaniem historii zmian.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">📝</span><span class="fc-title">Notatki do wpisu</span></div>
          <p class="fc-desc">Do każdego wpisu można dodać komentarz — np. powód wyjścia służbowego lub opis realizowanego zadania.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">⚡</span><span class="fc-title">Nadgodziny + akceptacja</span></div>
          <p class="fc-desc">System automatycznie wykrywa przekroczenie normy i oznacza nadgodziny. Przełożony akceptuje lub odrzuca wpis z poziomu panelu.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🔒</span><span class="fc-title">Blokada powielonych odczytów</span></div>
          <p class="fc-desc">Zabezpieczenie przed przypadkowym zdublowaniem wpisu tego samego pracownika w tym samym przedziale czasu.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🗂️</span><span class="fc-title">Sesja / zdarzenia / lokalizacje</span></div>
          <p class="fc-desc">Każdy odczyt powiązany jest z sesją, zdarzeniem i opcjonalnie lokalizacją geograficzną pracownika.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🔁</span><span class="fc-title">Wielokrotny odczyt</span></div>
          <p class="fc-desc">Obsługa wielu wejść/wyjść w ciągu jednego dnia (przerwy, wyjścia służbowe). System agreguje czas pracy w jeden dzień.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">📍</span><span class="fc-title">Lokalizacja GPS</span></div>
          <p class="fc-desc">Opcjonalne rejestrowanie współrzędnych w momencie wejścia/wyjścia — przydatne dla pracowników mobilnych i terenowych.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🚫</span><span class="fc-title">Brak normy</span></div>
          <p class="fc-desc">Wpisy poniżej wymaganego czasu pracy są automatycznie oznaczane i widoczne w raportach bez ręcznej interwencji.</p>
        </div>
      </div>

      <p class="entries-title">Obsługiwane typy wpisów</p>
      <div class="entries-row">
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#86efac"></span> Praca zgodna z normą</div>
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#a5b4fc"></span> Nadgodziny</div>
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#6ee7b7"></span> Nadgodziny + zadanie</div>
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#86efac;opacity:.55"></span> Brak normy</div>
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#4ade80"></span> Praca nocna</div>
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#fde68a"></span> Wielokrotny odczyt</div>
        <div class="entry-chip"><span class="entry-chip-dot" style="background:#fca5a5"></span> Error / korekta</div>
      </div>
    </section>

    <hr class="sec-sep">

    <!-- 2. E-WNIOSKI ──────────────────────────── -->
    <section class="module-section" id="ewnioski">
      <div class="module-header">
        <div class="module-icon-wrap c-pink" style="font-size:1.7rem;">🏖️</div>
        <div class="module-meta">
          <span class="module-tag c-pink">Moduł 2</span>
          <h2>E-wnioski (EWN)</h2>
        </div>
      </div>

      <p class="module-desc">
        Elektroniczny obieg wniosków pracowniczych — od urlopu wypoczynkowego po zwolnienia lekarskie i wyjścia prywatne.
        System liczy dni, pilnuje limitów i automatycznie informuje przełożonych przez SMS.
      </p>

      <div class="highlight-box">
        <strong>Dlaczego to ważne:</strong> Pracownik składa wniosek urlopowy z telefonu. System sprawdza dostępny limit,
        przelicza dni robocze, wysyła SMS do przełożonego i od razu wpisuje nieobecność do planingu oraz raportów.
        Zero papierologii.
      </div>

      <table class="feat-table">
        <thead>
          <tr>
            <th>Funkcja</th>
            <th>Opis</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>24 rodzaje wniosków</td><td>Urlop wypoczynkowy, L4, opieka nad dzieckiem, wyjście prywatne, delegacja i wiele innych — każdy z własnym kolorem i skrótem.</td></tr>
          <tr><td>Licznik dni</td><td>Automatyczne obliczanie wykorzystanych i pozostałych dni urlopu na każdego pracownika.</td></tr>
          <tr><td>Poziomy uprawnień</td><td>Pracownik składa wniosek, administrator zatwierdza lub odrzuca z komentarzem.</td></tr>
          <tr><td>Widoczność w raportach</td><td>Zaakceptowany wniosek automatycznie pojawia się w ewidencji czasu pracy i planingu.</td></tr>
          <tr><td>SMS powiadomienia</td><td>Przełożony dostaje SMS w chwili złożenia wniosku. Pracownik — po zatwierdzeniu lub odrzuceniu.</td></tr>
          <tr><td>Dni robocze / kalendarzowe</td><td>Przeliczanie urlopów zarówno w dniach roboczych, jak i kalendarzowych — zgodnie z Kodeksem pracy.</td></tr>
          <tr><td>Szybkie tworzenie planingu</td><td>Zaakceptowany wniosek urlopowy jednym kliknięciem generuje wpis w grafiku pracownika.</td></tr>
          <tr><td>Blokada powielania</td><td>System nie pozwala na złożenie dwóch wniosków zachodzących na te same daty.</td></tr>
        </tbody>
      </table>
    </section>

    <hr class="sec-sep">

    <!-- 3. PLANOWANIE ─────────────────────────── -->
    <section class="module-section" id="planowanie">
      <div class="module-header">
        <div class="module-icon-wrap c-blue" style="font-size:1.7rem;">📅</div>
        <div class="module-meta">
          <span class="module-tag c-blue">Moduł 3</span>
          <h2>Planowanie grafiku (ZMI / STA)</h2>
        </div>
      </div>

      <p class="module-desc">
        Tworzenie harmonogramów pracy w dwóch trybach — stałym (powtarzalnym tygodniowo) i zmiennym
        (różne godziny każdego dnia). Grafik stanowi punkt odniesienia dla całego systemu:
        RCP porównuje wpisy z planingiem, raporty pokazują odchylenia, a wnioski automatycznie
        modyfikują harmonogram.
      </p>

      <div class="feature-grid">
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🏢</span><span class="fc-title">Planing stały (STA)</span></div>
          <p class="fc-desc">Harmonogram powtarzający się cyklicznie — np. pon.–pt. 8:00–16:00. Definiujesz raz, system stosuje automatycznie przez cały okres zatrudnienia.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🌀</span><span class="fc-title">Planing zmienny (ZMI)</span></div>
          <p class="fc-desc">Elastyczny grafik z indywidualnymi godzinami na każdy dzień. Obsługuje zmiany dzienne, nocne i przez północ.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🔒</span><span class="fc-title">Blokada powielania</span></div>
          <p class="fc-desc">Zabezpieczenie przed przypadkowym wprowadzeniem dwóch wpisów grafiku dla tego samego pracownika i daty.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🗓️</span><span class="fc-title">2 widoki kalendarza</span></div>
          <p class="fc-desc">Widok tygodniowy (przegląd całego zespołu) oraz miesięczny (planowanie długoterminowe i kontrola nadgodzin).</p>
        </div>
      </div>

      <div class="highlight-box">
        <strong>Zmiana nocna przez północ:</strong> System poprawnie obsługuje zmiany zaczynające się np. o 20:00
        i kończące o 4:00 następnego dnia — zarówno w planingach, jak i w odczytach RCP.
        Norma dobowa jest liczona prawidłowo bez ręcznych korekt.
      </div>
    </section>

    <hr class="sec-sep">

    <!-- 4. RAPORTY ────────────────────────────── -->
    <section class="module-section" id="raporty">
      <div class="module-header">
        <div class="module-icon-wrap c-yellow" style="font-size:1.7rem;">📊</div>
        <div class="module-meta">
          <span class="module-tag c-yellow">Moduł 4</span>
          <h2>Raporty i ewidencja</h2>
        </div>
      </div>

      <p class="module-desc">
        Centrum analityczne systemu. Raporty łączą dane z RCP, planingu i wniosków w jednym miejscu —
        gotowe do wydruku i eksportu. Administrator widzi każdą nieobecność, nadgodzinę i brak normy
        bez ręcznego sumowania.
      </p>

      <div class="feature-grid">
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">📆</span><span class="fc-title">2 widoki kalendarza</span></div>
          <p class="fc-desc">Podgląd danych w układzie tygodniowym i miesięcznym — z kolorowymi oznaczeniami typów wpisów.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">👥</span><span class="fc-title">Lista obecności</span></div>
          <p class="fc-desc">Zbiorczy widok dzienny lub tygodniowy pokazujący, którzy pracownicy są w pracy, na urlopie lub nieobecni.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">📄</span><span class="fc-title">Ewidencja czasu pracy</span></div>
          <p class="fc-desc">Pełna historia wejść, wyjść, łącznego czasu pracy i odchyleń od normy — dla każdego pracownika osobno.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">✏️</span><span class="fc-title">Edycja ewidencji</span></div>
          <p class="fc-desc">Administrator może korygować wpisy bezpośrednio w widoku raportu — bez przechodzenia do oddzielnego modułu.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">📑</span><span class="fc-title">Szczegółowe wnioski</span></div>
          <p class="fc-desc">Raport wszystkich złożonych wniosków z podziałem na typ, status i pracownika — z możliwością filtrowania.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">⏰</span><span class="fc-title">Nadgodziny / brak normy</span></div>
          <p class="fc-desc">Dedykowany widok odchyleń od harmonogramu — nadgodziny czekające na akceptację i dni z niewystarczającym czasem pracy.</p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">⚡</span><span class="fc-title">Szybka edycja RCP i wniosków</span></div>
          <p class="fc-desc">Bezpośrednia edycja wpisu lub wniosku z poziomu raportu — jedno kliknięcie zamiast przechodzenia między modułami.</p>
        </div>
      </div>
    </section>

    <hr class="sec-sep">

    <!-- 5. SMS ───────────────────────────────── -->
    <section class="module-section" id="sms">
      <div class="module-header">
        <div class="module-icon-wrap c-violet" style="font-size:1.7rem;">📱</div>
        <div class="module-meta">
          <span class="module-tag c-violet">Moduł 5</span>
          <h2>Powiadomienia SMS</h2>
        </div>
      </div>

      <p class="module-desc">
        WIBEST wysyła automatyczne powiadomienia SMS w kluczowych momentach systemu.
        Dzięki temu przełożeni i pracownicy są informowani na bieżąco — nawet gdy nie mają
        otwartej aplikacji.
      </p>

      <div class="feature-grid">
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">⏱️</span><span class="fc-title">SMS – moduł RCP</span></div>
          <p class="fc-desc">
            Powiadomienie o zarejestrowaniu wejścia lub wyjścia pracownika.
            Opcjonalne alerty przy nadgodzinach lub braku rejestracji o określonej godzinie.
          </p>
        </div>
        <div class="feature-card">
          <div class="fc-top"><span class="fc-icon">🏖️</span><span class="fc-title">SMS – moduł E-wnioski</span></div>
          <p class="fc-desc">
            Automatyczny SMS do przełożonego po złożeniu wniosku przez pracownika.
            Potwierdzenie dla pracownika po zatwierdzeniu lub odrzuceniu wniosku.
          </p>
        </div>
      </div>

      <div class="highlight-box">
        Powiadomienia SMS działają niezależnie od tego, czy użytkownik ma zainstalowaną aplikację mobilną.
        Wystarczy numer telefonu w profilu pracownika.
      </div>
    </section>

  </main>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-brand">Karol Wiśniewski <span>WIBEST</span></div>
  <div class="footer-links">
    <a href="#">O nas</a>
    <a href="#">Blog</a>
    <a href="#">Kontakt</a>
    <a href="#">Regulamin</a>
    <a href="#">Polityka prywatności</a>
  </div>
  <p>&copy; 2025 Wszelkie prawa zastrzeżone.</p>
</footer>

<script>
  /* Dark mode toggle */
  document.getElementById('dark-btn').addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    document.getElementById('dark-btn').textContent =
      document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
  });

  /* Scroll-spy sidebar + tabs */
  const sections = document.querySelectorAll('.module-section');
  const sideLinks = document.querySelectorAll('.side-link');
  const tabBtns  = document.querySelectorAll('.tab-btn');

  function setActive(id) {
    sideLinks.forEach(l => {
      l.classList.toggle('active', l.getAttribute('href') === '#' + id);
    });
    tabBtns.forEach(b => {
      b.classList.toggle('active', b.getAttribute('onclick')?.includes("'" + id + "'"));
    });
  }

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) setActive(e.target.id); });
  }, { rootMargin: '-30% 0px -60% 0px' });

  sections.forEach(s => obs.observe(s));

  /* Tab scroll */
  window.scrollTo = function(id, btn) {
    const el = document.getElementById(id);
    if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    tabBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  };

  /* Smooth anchor scroll from sidebar */
  document.querySelectorAll('.side-link').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const id = link.getAttribute('href').slice(1);
      document.getElementById(id)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
</script>
</body>
</html>