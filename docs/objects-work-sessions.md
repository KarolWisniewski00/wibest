# Obiekty — odczyt czasu pracy

## Ustalona struktura

- `WorkObject` → `objects`: `company_id`, `location_id`, `allowed_distance` (metry), `starts_at`, `ends_at`, `status`.
- Lokalizacje obiektów i zdarzeń: `locations.latitude` / `longitude`; współdzielone rekordy bez `company_id`.
- `work_sessions`: `company_id`, `user_id`, `event_start_id`, `event_stop_id`, `status`, `time_in_work`.
- START/STOP: `events.time`, `events.location_id`, `events.company_id`, `events.user_id`.
- Pracownicy obiektu: `object_user`; brak historii odłączenia pracownika. Dashboard uwzględnia tylko osoby aktualnie przypisane do co najmniej jednego obiektu tej samej firmy. Przy rozstrzyganiu remisu konkretne przypisanie pozostaje kryterium pomocniczym i nie działa przed `pivot.created_at`. Podgląd pojedynczego obiektu dodatkowo wymaga bieżącego formalnego przypisania pracownika.
- Istniejące statusy: planned, active, paused, cancelled, completed. Edytor wcześniej pozwalał przejść między wszystkimi tymi statusami; szybkie przyciski zachowują tę zasadę.
- Autoryzacja: dotychczasowe middleware i `WorkObjectPolicy`, kontrola firmy również dla zmiany statusu.
- W zastanym dashboardzie wartości czasu były placeholderami; nie istniały rzeczywiste agregacje czasu ani historia statusów.

## Odczyt i kwalifikacja

`WorkSessionReadQuery` czyta przez Query Builder. To celowe: `WorkSession::retrieved` uruchamia `isBlocked()` i może zmieniać sesje oraz zdarzenia. Obiekty nigdy nie hydratyzują tego modelu, nie zapisują powiązania `object_id` i nie kopiują ewidencji.

1. Każda sesja, jej użytkownik oraz powiązane zdarzenia muszą należeć do firmy raportu. Błędne powiązania między firmami są pomijane i nie wpływają na normę.
2. Brak poprawnych współrzędnych → `missing_location`. Wymagane są prawidłowe punkty START i STOP; oba muszą znajdować się w promieniu tego samego obiektu. Odległość jest liczona po sferze; punkt `(0, 0)` jest poprawny.
3. Brak dopasowania geograficznego → `outside_objects`; nie wybieramy najbliższego obiektu.
4. Cała sesja musi mieścić się między istniejącymi granicami realizacji. Każda z granic może być pusta. Przekroczenie → `outside_period`.
5. Data utworzenia obiektu nie ogranicza analizy. Pierwszy zapisany status jest stanem początkowym również dla wcześniejszej historii; jeśli jest aktywny, wcześniejsze sesje mogą zostać zaliczone. Terminy realizacji nadal obowiązują, a rzeczywiste późniejsze zmiany statusów zachowują swoje daty. Cała sesja musi mieścić się w jednym okresie aktywności (z tak rozszerzonym okresem początkowym). Początek okresu jest włączony; koniec wyłączony dla START, dozwolony dla STOP. Sesje przecinające wstrzymanie nie są automatycznie dzielone → `inactive_object`.
6. Wśród nadal pasujących obiektów unikalne przypisanie pracownika rozstrzyga remis. W przeciwnym razie → `ambiguous_object`.
7. Sesje niezakończone → `in_progress`; niepoprawny czas, brak STOP lub status inny niż zakończony → `invalid_session`. Nie naliczamy im prowizorycznego czasu.

Powody są enumem `AttentionReason`. Dashboard pokazuje wszystkie sesje miesiąca; parametr `work_category` filtruje wyłącznie paginowaną tabelę (all / under / normal / overtime / attention). Sesje wymagające uwagi mają żółte oznaczenie i opis przyczyny.

## Norma i prezentacja

Jedyna zmiana w kodzie poza Obiektami to wydzielenie **bez zmiany algorytmu** `WorkSessionRepository::plannedSecondsForData()`. Dotychczasowa metoda `getTotalOfDayPlannedNew()` deleguje do niej. Obiekty przekazują zbiorczo pobranych użytkowników i bloki planingu, bez dodatkowych zapytań na rekord.

Norma jest dzienna, jak w istniejącym RCP. Dzienny czas obejmuje zakończone sesje pracownika z tej samej firmy, również na innych obiektach i bez przypisania. Źródłem czasu jest zapisane `time_in_work`, nie różnica START/STOP. Respektujemy planing stały/zmienny, dni tygodnia, włączenie nadgodzin i ścisłe przekroczenie progu tolerancji. Wymaganie zadania lub jego akceptacji zmienia w RCP rozliczenie nadgodzin, ale nie sam fakt przekroczenia normy — tutaj nie powstaje nowe rozliczenie płacowe.

Kafelki Brak normy / Norma / Nadgodziny pokazują **sumę czasu tych sesji dużą typografią oraz liczbę sesji jako informację drugorzędną**, sklasyfikowanych według całego dnia pracownika. Tabela podaje normę i odchylenie całego dnia; tych powtarzających się wartości nie sumujemy po sesjach. „Czas spędzony na obiektach” sumuje wyłącznie jednoznacznie zakwalifikowane sesje.

Miesiąc dotyczy daty START, również dla pracy nocnej. Dla braku START używamy `work_sessions.created_at` wyłącznie do umieszczenia problematycznej sesji w okresie. Domyślny miesiąc podglądu to bieżący miesiąc ograniczony do terminów obiektu; można przechodzić między miesiącami. Daty realizacji i historia nadal ograniczają wyniki niezależnie od wyboru miesiąca. Dashboard przedstawia czas całej firmy za wybrany miesiąc; dotychczasowe filtry statusu/nazwy nadal dotyczą listy obiektów.

## Historia i wdrożenie

Migracja `2026_11_13_120000_create_object_status_periods_table.php` tworzy osobną tabelę z `object_id`, `status`, `starts_at`, `ends_at`, `initial_snapshot` i złożonym indeksem. Nie modyfikuje `work_sessions`.

**Stan początkowy służy również do klasyfikacji wcześniejszych sesji.** Brak terminu realizacji pozwala analizować dowolny wybrany miesiąc, również sprzed utworzenia obiektu. Jest to przyjęta reguła klasyfikacji; nie zmieniamy dat zapisanych zmian statusu ani danych RCP.

Nowe obiekty rejestrują pierwszy status przy utworzeniu. `WorkObject::save()` zapisuje model i historię w transakcji z blokadą rekordu; szybka zmiana i edycja formularza dodatkowo pobierają aktualny obiekt pod blokadą. Powtórzenie tego samego statusu nie tworzy okresu. Zakończenie/odwołanie nie usuwa dawnych okresów. Usunięcie obiektu usuwa jego historię poprzez FK, zgodnie z dotychczasowym trwałym usuwaniem obiektów.

Zmiany statusu należy wykonywać przez model lub kontroler. Masowe `WorkObject::where(...)->update(...)` i ręczny SQL omijają zapis historii. Lokalizacja, promień, terminy oraz przypisania pracowników nie mają wersjonowania — ich świadoma edycja ponownie kwalifikuje dane historyczne. Historia statusów pozostaje zachowana.

Na docelowej bazie trzeba uruchomić migrację, np. po przeglądzie pozostałych oczekujących migracji:

```sh
php artisan migrate --path=database/migrations/2026_11_13_120000_create_object_status_periods_table.php
```

Poprzednie migracje modułu Obiekty muszą być już zastosowane. Implementacja nie uruchamia migracji na bieżącej bazie roboczej. Testy migracji działają na SQLite `:memory:`.

## Wydajność i weryfikacja

Zapytania ograniczają firmę i miesiąc w SQL. Sesje są przetwarzane porcjami po 250, tabela zatrzymuje tylko 25 wyświetlanych rekordów, podsumowanie obejmuje wszystkie porcje. Podgląd ogranicza firmę, miesiąc i aktualne przypisania w SQL. W raporcie obejmującym uwagę pomija się wstępne ograniczenie geograficzne, aby sesje bez GPS mogły trafić do wspólnego resolvera. Terminy, aktywność i geografia nadal decydują o kwalifikacji do czasu obiektu. Kandydaci są ograniczeni do firmy i geograficznego pasa porcji; relacje lokalizacji, historii i przypisań są pobierane zbiorczo. Sumy dzienne są agregowane w SQL, bez pobierania całej historii sesji. Wykorzystywane są istniejące indeksy `events.time`, `work_sessions.company_id`, `user_id`, `event_start_id` i nowy indeks historii. Koszt nadal zależy od liczby sesji wybranego miesiąca i liczby pobliskich obiektów — nie ma trwałego cache ani zapisanej klasyfikacji.

Weryfikacja: `php vendor/phpunit/phpunit/phpunit tests/Feature/ObjectsTest.php` oraz `npm.cmd run build`.

Testy obejmują brak/błędne GPS, STOP bez GPS START, różne miejsca START/STOP, granicę promienia i zerowe współrzędne, aktywność/wstrzymanie/wznowienie/zakończenie/odwołanie, przecięcie granic statusów, terminów i miesięcy, stary obiekt bez historii, stały i zmienny planing, normę wspólną dla kilku sesji i obiektów, próg nadgodzin, izolację firm i uszkodzone powiązania, autoryzację, rollback historii, paginację, wiele porcji, stałą liczbę zapytań w porcji i brak zapisów podczas raportowania. Zachowane są też wcześniejsze testy CRUD i widoków Obiektów.

## Dashboard — tabela i podsumowania miesięczne

Raport zwraca `object_seconds` (sekundy według ID obiektu), liczone w tym samym przebiegu co kafelki. Suma przy obiekcie nie zależy od filtra kategorii tabeli i jest dostępna również w odpowiedzi AJAX listy obiektów. Format czasu to HH:MM:SS, bez zawijania po 24 godzinach.

Tabela korzysta z komponentów WIBEST: zdjęcia i nazwy pracownika, statusu RCP oraz oznaczeń lokalizacji. Dane użytkownika przekazywane są jako obiekt prezentacyjny, aby komponent nazwy nie wywoływał `User::getToday()` w każdym wierszu. Renderowanie nie pobiera zdarzeń ani sesji z bazy; wspólny composer aplikacji może jednorazowo pobrać firmę zalogowanego użytkownika. Celowo nie dodano operacji zbiorczych ani checkboxów bez odpowiadających im akcji.

Wiersz obsługuje kliknięcie i Enter przez Alpine, a link w nazwie pracownika zapewnia natywną nawigację i otwieranie w nowej karcie. Interaktywne elementy wewnątrz wiersza są wyłączone z nawigacji wiersza. Nie ma osobnej kolumny Podgląd.
## Czytelność rekordów

Wiersze mają tło `bg-white dark:bg-gray-700`, bez widocznego ID sesji. Nazwa pracownika pozostaje natywnym linkiem do sesji. Przypisany obiekt wykorzystuje istniejący `x-object.type-icon` w wariancie `compact`; wariant standardowy zachowuje dotychczasowy rozmiar.

Wspólna klasa koloru w wierszu obsługuje etykietę RCP i klasyfikację: delikatny zielony dla niedoboru, zielony dla normy, indigo dla nadgodzin. Przejście między datami START i STOP daje księżyc i ciemniejszą paletę. Sama godzina startu nie oznacza pracy przez północ. Uwaga zachowuje żółte oznaczenie.

`day_difference` jest informacją prezentacyjną: zapisany łączny czas dnia minus istniejąca norma dnia, pobrane już zbiorczo w raporcie. Nie zmienia kategorii, tolerancji ani zatwierdzania nadgodzin. Widok podpisuje ją „Bilans dnia”, aby nie sugerować sumowania odchyleń powtarzanych przy kilku sesjach tego samego dnia. Gdy norma jest zerowa/nieokreślona, różnica pozostaje null; przy sesji wymagającej uwagi również nie wyliczamy bilansu.
## Ograniczenie podglądu do przypisanych pracowników

Gdy `ObjectWorkReport::build()` otrzymuje obiekt, zapytanie sesji zawiera `whereIn(s.user_id, ...)` z podzapytaniem istniejącej relacji `WorkObject::users()` przez `object_user`. Podzapytanie dodatkowo ogranicza `users.company_id` do firmy raportu. Nie korzysta z wcześniej załadowanej kolekcji pracowników, więc usunięcie przypisania obowiązuje również przy ponownym użyciu tego samego modelu w pamięci.

Ograniczenie działa przed pobieraniem porcji i kwalifikowaniem sesji. Kafelki, uwaga, tabela, czas pracownika i odczyty mapy korzystają z tego samego ograniczonego raportu — zarówno w pełnym podglądzie, jak i odpowiedziach AJAX miesiąca oraz tabeli. Parametry URL nie mogą włączyć nieprzypisanych pracowników. Brak przypisań daje pusty raport; przypisany pracownik bez kwalifikujących się sesji nadal ma 0h na liście.

Dashboard wywołuje raport bez konkretnego obiektu; wspólny serwis ogranicza użytkowników podzapytaniem relacji `User::objects()` do osób przypisanych do dowolnego obiektu tej samej firmy. Dotychczasowa kwalifikacja geograficzna pozostaje zachowana. Przypisanie nie zastępuje GPS, terminów, historii statusów ani rozstrzygania niejednoznaczności. Norma nadal dotyczy całego dnia pracownika według istniejących zasad — nie jest naliczana ponownie dla każdego obiektu. Odłączenie pracownika usuwa jego dane z bieżącego podglądu. Po odłączeniu od ostatniego obiektu tej firmy jego sesje nie są też uwzględniane na dashboardzie Obiektów. Nie usuwa to sesji ani lokalizacji.
## Sesje bez wymaganej lokalizacji

Resolver nadal nadaje `missing_location`, gdy brakuje prawidłowych współrzędnych START lub STOP. Podgląd obejmujący uwagę nie odrzuca takich sesji geograficznym prefiltrem: bierze je pod uwagę dla przypisanych pracowników, niezależnie od tego, czy pozostały punkt leży w promieniu. Brak obu lokalizacji także jest widoczny w uwadze. Sesje nie zwiększają czasu obiektu, normy, niedoboru ani nadgodzin i nie tworzą znaczników mapy; nie powstaje trwałe przypisanie do obiektu.

Gdy pracownik jest przypisany do kilku obiektów, sesja bez GPS pojawia się jako uwaga w ich podglądach. Dashboard liczy ją jednokrotnie — filtr użytkowników jest podzapytaniem IN, a nie zwielokrotniającym sesje złączeniem z przypisaniami. Sesje osób bez jakiegokolwiek przypisania do obiektu tej firmy są pomijane przed klasyfikacją, także w uwadze i odpowiedziach AJAX. Pozostałe przyczyny uwagi zachowują dotychczasowy zakres przestrzenny podglądu.
## Filtr pracownika w podglądzie

Parametr `employee_id` jest obsługiwany wyłącznie w raporcie konkretnego obiektu. Wspólny serwis waliduje liczbę oraz sprawdza aktualne przypisanie przez `WorkObject::users()` z ograniczeniem firmy. Osoba nieprzypisana, odłączona lub z innej firmy otrzymuje 403; błędny format parametru jest odrzucany przez walidację. Dashboard nie zmienia zakresu wskutek tego parametru.

Raport w jednym przebiegu porcji sesji wylicza miesięczne czasy wszystkich przypisanych pracowników, aby prawa lista nadal pokazywała prawdziwe wartości przy każdej osobie. Po wybraniu pracownika tylko jego zakwalifikowane dane zwiększają kafelki i trafiają do tabeli oraz odczytów mapy. Filtrowanie odbywa się na backendzie; przeglądarka otrzymuje tylko wybraną stronę tabeli i właściwe odczyty. Nie wykonujemy drugiego raportu dla listy pracowników. Norma i nadgodziny nadal korzystają z dotychczasowych zasad dziennych. Sesje bez wymaganego GPS pozostają uwagą, bez sztucznych znaczników.

`object-preview.js` utrzymuje `selectedEmployeeId` i miesiąc. Kliknięcie osoby lub wyczyszczenie filtra pobiera jedną odpowiedź istniejącego endpointu, aktualizując razem kafelki, pracowników, tabelę i warstwę odczytów. Ponowne kliknięcie tej samej osoby usuwa filtr. Parametr jest zachowywany w URL, paginacji, wyszukiwaniu i zmianie miesiąca. AbortController i wersjonowanie żądań chronią szybkie przełączanie osoby oraz miesiąca; błąd zachowuje poprzednie dane i cofa zaznaczenie. Google Maps zachowuje instancję, lokalizację obiektu i promień, a brak odczytów pokazuje komunikat. Lista ma obsługę Enter/Spacji, aria-pressed i przywracanie fokusu bez przewijania.
## Zakres tabeli a kwalifikacja do czasu obiektu

Tabela podglądu (raport `includeAttention = true`) pokazuje sesje bieżących przypisanych pracowników z wybranego miesiąca, opcjonalnie zawężone do wskazanego pracownika, frazy i świadomie wybranej kategorii. Wynik resolvera nie jest już warunkiem dopuszczenia wiersza do tabeli. Sesja zakwalifikowana do innego obiektu zachowuje jego nazwę i rzeczywistą kategorię; sesje bez GPS, poza obiektami, niekompletne lub zablokowane zachowują dotychczasową klasyfikację i status.

Kafelki, czas pracowników na konkretnym obiekcie i mapa nadal wykorzystują dotychczasowy zakres kwalifikacji. Pokazanie dodatkowej sesji w tabeli nie przypisuje jej do oglądanego obiektu i nie zwiększa jego czasu ani znaczników. Z tego powodu suma wszystkich czasów tabeli podglądu może różnić się od kafelka czasu na obiekcie. Dashboard i dotychczasowe obliczenia normy pozostają bez zmian.

Wybranie, przełączenie lub wyczyszczenie pracownika ustawia `work_category=all` i resetuje paginację, aby poprzednio aktywna zakładka uwagi nie ukrywała pozostałych kategorii. Przełączniki kategorii nadal działają po świadomym wybraniu zakładki. Zmiana miesiąca zachowuje pracownika i bieżące filtry. Wszystkie ścieżki AJAX korzystają ze wspólnego serwisu raportu.