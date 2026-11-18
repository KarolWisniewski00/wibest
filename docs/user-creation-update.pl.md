# Tworzenie użytkowników — Zespół i Klienci

## Zakres i wykryte problemy

Oba moduły korzystają z `UserWizard` oraz kroków `PrimaryStep`, `RoleStep`, `SupervisorStep`. Klienci mają dodatkowy formularz HTTP dla roli CRM. W kreatorze e-mail miał wyłącznie regułę `required`; zapis CRM nie miał walidacji i zastępował brak e-maila losowym ciągiem. Otwarcie formularza klienta bez pracowników tworzyło automatycznie konto Administrator z losowym ciągiem zamiast adresu. Usunięto ten zapis podczas GET — pierwszy użytkownik jest teraz tworzony przez zwykły formularz z wyborem roli.

Zapis użytkownika i historii przypisania nie był atomowy. Publiczny identyfikator firmy i stan Livewire nie stanowiły wiarygodnego źródła uprawnień. Dostęp do modułu Klienci był widoczny w nawigacji dla roli `właściciel`, ale ścieżki tworzenia nie egzekwowały tego po stronie serwera.

## Zabezpieczenia i zachowanie formularzy

- Wspólne reguły Laravel: wymagany e-mail, string, limit długości, `email:rfc`, poprawna domena z końcówką, `unique:users,email` i dodatkowe porównanie `LOWER(TRIM(email))` bez globalnych zakresów modelu, również dla CRM.
- Normalizacja imienia: usunięcie skrajnych i wielokrotnych białych znaków, bez ograniczania polskich liter, łączników czy apostrofów. Jedno słowo jest dozwolone.
- Normalizacja e-maila: trim i małe litery. Istniejące konta nie są masowo modyfikowane.
- Firma, kontekst Klientów oraz definicja kroków są zablokowane atrybutami Livewire `Locked`. Serwer ponownie sprawdza uprawnienia przy zapisie i sprawdzaniu dostępności. W Zespole zapis jest do własnej firmy przez `admin` lub `właściciel`; Klienci wymagają `właściciel` zgodnie z dotychczasową nawigacją.
- Firma w przesłanym stanie nie decyduje o przypisaniu. Przełożony musi należeć do właściwej firmy i mieć rolę oferowaną w dotychczasowym wyborze. Dozwolone role nowego konta odpowiadają formularzowi: admin, kierownik, użytkownik; CRM jest ustawiane przez ścieżkę CRM.
- Konto i historia przypisania zapisują się w jednej transakcji. Konflikt unikalności przy zapisie otrzymuje zwykły komunikat walidacji, bez szczegółów SQL. Ponowny zapis tego samego kreatora nie tworzy kolejnego konta.
- E-mail CRM jest opcjonalny. Brak adresu (również same spacje) zastępuje techniczny `crm-<UUID>@users.wibest.invalid`; podany adres przechodzi pełną walidację i sprawdzenie unikalności. Imię i telefon CRM zachowują opcjonalność. E-mail i telefon zwykłego kreatora pozostają wymagane.

### Poprawki po aktualizacji

Przywrócono `session()->flash('success', ...)` po udanym zapisie kreatora, przed przekierowaniem. Istniejący Toastr w `admin.elements.alerts` odczytuje ten wpis i zachowuje dotychczasowe style, animację oraz czas wyświetlania. Brak wpisu flash w nowym przekierowaniu Livewire powodował zniknięcie komunikatu w Zespole i Klientach. Ścieżka HTTP CRM nadal korzysta z istniejącego `with('success', ...)`.

Usunięto niewdrożoną migrację `2026_11_11_130000_make_users_email_nullable.php`. Rozwiązanie działa z oryginalną kolumną NOT NULL i nie wymaga zmiany struktury bazy. W historii HEAD, w `UserController::storeForCrm`, istniał fallback `$request->email ?? Str::random(12)` — losowy ciąg, nie poprawny adres techniczny. Przywrócono jego funkcję w `CreateUser` za pomocą `CrmTechnicalEmail::generate()`: UUID, domena `.invalid`, sprawdzenie całej tabeli bez zakresów modelu oraz ponowienie transakcji przy kolizji indeksu UNIQUE (maksymalnie trzy próby zapisu). Nie znaleziono wcześniejszej konwencji domeny technicznej w analizowanych ścieżkach.

Pole CRM pokazuje: „Opcjonalnie – jeśli nie podasz adresu e-mail, system wygeneruje go automatycznie”. Nie odpytuje serwera dla pustej wartości. Generowanie hasła nie zależy od e-maila; CRM nadal nie wysyła wiadomości powitalnej ani powiadomienia do biura. `contact_email` w modelu i wierszu CRM ukrywa adres techniczny jako kontakt. Widoki administracyjne mogą nadal pokazywać surowy adres.

## Walidacja dynamiczna i telefon

Istniejące formularze korzystają ze wspólnego fragmentu Blade i niewielkiego modułu Alpine. Komunikaty znajdują się pod polami, mają warianty jasne/ciemne, kolory, oznaczenia statusu, `aria-describedby`, `aria-live` oraz stan `aria-invalid` dla e-maila i telefonu.

Imię i telefon aktualizują status lokalnie. E-mail wysyła zapytanie po 500 ms bezczynności. Zmiana wartości natychmiast usuwa wcześniejsze zielone potwierdzenie; odpowiedzi dotyczące poprzedniej wartości są ignorowane. Błąd sieci nigdy nie daje zielonego statusu. W kreatorze działa autoryzowana metoda Livewire, w CRM autoryzowany endpoint POST z CSRF. Limit wynosi 60 sprawdzeń na minutę na konto, a endpoint HTTP ma dodatkowy middleware throttle. Wynik dostępności nie zastępuje walidacji przy zapisie.

Telefon rozpoznaje wszystkie wskazane formaty, prefiksy +48, 48 i 0048, spacje i myślniki. Dziewięć cyfr krajowych zapisuje jako `+48 XXX XXX XXX`. Nie usuwa liter ani nadmiarowych cyfr w celu pozornego uzyskania poprawnego numeru. Formatowanie podczas wpisywania zachowuje pozycję kursora względem cyfr. Błędy backendowe zachowują stan Livewire albo `old()` formularza HTTP.

## Powiadomienie do biura

Ścieżka zapisu: `Team\UserController::create` → widok `admin.team.create` → `UserWizard` → `SupervisorStep::save` → `CreateUser::create`. Kontroler wyświetla formularz; konto i historię przypisania zapisuje serwis w transakcji. Nie zmieniono formularzy, walidacji, ról ani przypisywania do firmy.

Wyłącznie zapis w Zespole (`clients=false`, `crm=false`) uruchamia `TeamUserCreated` na `biuro@wibest.pl`, z tematem „WIBEST – Nowy użytkownik w firmie [NAZWA FIRMY]”. Każda firma i każda rola dopuszczona przez istniejący formularz są obsługiwane. Responsywny szablon HTML ma nagłówek WIBEST i zielony akcent; zawiera firmę, imię i nazwisko, e-mail (jeśli podano), rolę oraz datę w Europe/Warsaw w formacie `d.m.Y H`, zgodnie z wymaganiem `dd.mm.rrrr HH`. Dane są escapowane przez Blade. Payload wiadomości zawiera tylko te pola i identyfikator użytkownika; nie zawiera modelu użytkownika, hasła, tokenów, telefonu ani danych twórcy konta.

Zakolejkowanie następuje przez `DB::afterCommit`, a Mailable również ma `afterCommit()` i implementuje `ShouldQueue`. Korzysta z istniejącej asynchronicznej kolejki i konfiguracji poczty. Gdy domyślny sterownik to `sync` lub `null`, tylko to powiadomienie wybiera istniejące połączenie `database`; nie zmienia globalnej konfiguracji. Edycja, walidacja zakończona błędem, rollback, Klienci, CRM i bezpośredni zapis modelu poza Zespołem nie uruchamiają powiadomienia. Błąd zakolejkowania jest przechwytywany po commit i logowany jako `Team user notification failed.`. Awaria w workerze uruchamia `TeamUserCreated::failed` z logiem `Team user notification delivery failed.`. Oba wpisy zawierają ID użytkownika i klasę wyjątku, bez treści wyjątku i danych SMTP. Konto pozostaje zapisane. Dotychczasowy `UserMail` pozostaje bez zmian.

Middleware `SendTeamUserNotificationOnce` przed SMTP atomowo zajmuje rekord w `team_user_notifications` z kluczem głównym `user_id`. Duplikat zadania, równoległy worker i ponowne odtworzenie już wykonanego zadania nie wysyłają kolejnego e-maila. Rejestr zawiera `started_at`, `sent_at` i `failed_at`, bez danych osobowych poza ID. Nie usuwa się go wraz z kontem.

Przyjęto najwyżej jedną próbę wysyłki (`tries=1`), również po ręcznym `queue:retry`. SMTP nie zapewnia atomowej operacji wspólnej z bazą: po zerwaniu połączenia nie zawsze wiadomo, czy serwer przyjął wiadomość. Dlatego po błędzie lub przerwaniu workera blokada pozostaje, aby nie wysłać duplikatu. Brak `sent_at` wymaga sprawdzenia logów workera i dostawcy poczty. Nie należy automatycznie usuwać blokady ani ponawiać takich wiadomości. Awaria kolejki przy dodawaniu zadania jest logowana i nie ma automatycznego ponowienia; konto pozostaje utworzone.

### Uruchomienie powiadomień i test ręczny

1. Uruchom wyłącznie nową migrację: `php artisan migrate --path=database/migrations/2026_11_15_120000_create_team_user_notifications_table.php`. Tabela `jobs` powinna już istnieć z migracji `2025_01_06_123956_create_jobs_table.php`; jeśli jej nie ma, uruchom także tę migrację. Standardowy mechanizm błędnych zadań korzysta z istniejącej tabeli `failed_jobs`.
2. Dla kolejki `database` uruchom `php artisan queue:work database --queue=default --tries=1`. Dla innego skonfigurowanego asynchronicznego połączenia uruchom jego worker i właściwą kolejkę. Worker musi działać stale; samo zakolejkowanie nie dostarcza e-maila. Po wdrożeniu zrestartuj istniejące workery (`php artisan queue:restart`).
3. Na środowisku testowym użyj `MAIL_MAILER=log` lub testowego SMTP, odśwież cache konfiguracji, a następnie utwórz konta w Zespole w firmach A i B oraz z różnymi dostępnymi rolami. Sprawdź temat, odbiorcę, treść, datę i zielony nagłówek. Edycja konta i odrzucony formularz nie mogą dodać nowego zadania.
4. Przy właściwej konfiguracji SMTP utwórz konto w Zespole i potwierdź odbiór na `biuro@wibest.pl`. W tabeli `team_user_notifications` powinno pojawić się `sent_at`. SMTP przetestuj dopiero w środowisku przeznaczonym do rzeczywistej wysyłki.
5. Symulację awarii SMTP, rollback i duplikaty bez wysyłania prawdziwych wiadomości uruchamia zestaw: `php vendor/phpunit/phpunit/phpunit tests/Feature/UserCreationTest.php`. Testy używają osobnego SQLite `:memory:`, rzeczywistego workera i kolejki bazodanowej, transportu `array` oraz mocka transportu rzucającego wyjątek. Nie korzystają z bazy aplikacji ani serwera SMTP.

Migracji nie uruchomiono na bazie aplikacji; rzeczywistych e-maili podczas implementacji nie wysyłano. Mechanizm kolejkowania oparto na [dokumentacji Laravel 10](https://laravel.com/docs/10.x/mail#queueing-mail) i kodzie frameworka zainstalowanego w repozytorium.

## Baza i konfiguracja

Odczyt lokalnej konfiguracji wykazał mailer `smtp`, ustawioną konfigurację SMTP oraz kolejkę `database`. Nie wykonywano próbnego połączenia SMTP ani wysyłki. Odczyt indeksów potwierdził istniejący `users_email_unique`; liczba grup kolizji `LOWER(TRIM(email))` wynosiła 0.

Nowa migracja dodaje unikalność kanonicznego e-maila: w MySQL/MariaDB przez generowaną kolumnę i indeks, w SQLite/PostgreSQL przez indeks wyrażenia. Przed zmianą sprawdza kolizje i w razie ich wykrycia zatrzymuje się z ogólnym komunikatem. Nie usuwa, nie scala ani nie poprawia automatycznie kont. Migracja nie została uruchomiona na istniejącej bazie.

## Weryfikacja

- `php vendor/phpunit/phpunit/phpunit tests/Feature/UserCreationTest.php`: zestaw obejmuje również CRM bez adresu z kolumną NOT NULL, różne adresy techniczne, kolizję generatora i brak wysyłki.
- `node --test tests/user-identity.test.cjs`: 5 testów — poprawne.
- Testy PHP używają odrębnego SQLite `:memory:` i `Mail::fake()`; test awarii SMTP używa mocka. Nie uruchamiają historycznych migracji projektu i nie korzystają z bazy z `.env`.
- Sprawdzono formaty e-maili, zajęte adresy również ukryte przez zakres CRM, różnice wielkości liter, wymuszenie unikalności w bazie po dwóch wstępnych sprawdzeniach dostępności, wszystkie podane telefony, dane niepoprawne, bezpośrednie HTTP i Livewire, role, firmy, przełożonych, blokadę manipulacji kontekstem, limit zapytań, zapis CRM, rollback, awarię historii i SMTP, commit, wybór kolejki, brak biurowych wiadomości w Klientach, ponowny zapis kreatora i escapowanie HTML.
- Testy JS obejmują wklejanie, edycję i kursor, nadmiarowe cyfry, błędne znaki, imię, debounce i spóźnione odpowiedzi.
- Nie przeprowadzono pełnego testu przeglądarkowego, rzeczywistych równoległych zapisów na MySQL ani uruchomienia produkcyjnego workera. Test indeksu w SQLite odtwarza konflikt po wcześniejszym sprawdzeniu dostępności; nie zastępuje testu współbieżności na docelowej bazie.

## Pliki zmienione lub dodane

1. `app/Http/Controllers/Team/UserController.php`
2. `app/Http/Controllers/UserController.php`
3. `app/Http/Controllers/UserEmailAvailabilityController.php`
4. `app/Livewire/UserWizard.php`
5. `app/Steps/PrimaryStep.php`
6. `app/Steps/RoleStep.php`
7. `app/Steps/SupervisorStep.php`
8. `app/Support/UserInput.php`
9. `app/Support/UserCreationAccess.php`
10. `app/Services/CreateUser.php`
11. `app/Services/UserEmailAvailability.php`
12. `app/Mail/TeamUserCreated.php`
13. `database/migrations/2026_11_11_120000_add_canonical_email_unique_to_users.php`
14. `public/js/user-identity.js`
15. `resources/views/components/user-identity-fields.blade.php`
16. `resources/views/livewire/steps/primary-step.blade.php`
17. `resources/views/admin/user/create.blade.php`
18. `resources/views/admin/user/create-for-crm.blade.php`
19. `resources/views/emails/team-user-created.blade.php`
20. `routes/web.php`
21. `tests/Feature/UserCreationTest.php`
22. `tests/user-identity.test.cjs`
23. `docs/user-creation-update.pl.md`
24. `app/Support/CrmTechnicalEmail.php`
25. `app/Models/User.php`
26. `resources/views/components/row-crm.blade.php`

## Przed wdrożeniem

1. Zweryfikować na stagingu MySQL/MariaDB migrację i równoległe tworzenie tego samego adresu; przejrzeć ewentualne istniejące duplikaty bez automatycznego kasowania.
2. Poprawka technicznych e-maili nie wymaga migracji. Wcześniejszą migrację indeksu kanonicznego, jeśli nadal oczekuje, wdrożyć osobno po kopii bazy; tworzenie indeksu może blokować dużą tabelę. Kolumna e-mail w testach SQLite pozostaje NOT NULL. Nie przeprowadzono rzeczywistych równoległych zapisów MySQL.
3. Wykonać standardowy build `npm run build` dla nowych klas Tailwind i wdrożyć również `public/js/user-identity.js`.
4. Odświeżyć cache widoków/tras według dotychczasowego procesu wdrożenia i zrestartować workery (`php artisan queue:restart`). Potwierdzić, że worker kolejki `database` działa i monitorować failed jobs. Samo ustawienie sterownika nie potwierdza działania workera.
5. Sprawdzić formularze na telefonie i desktopie, w obu motywach, oraz faktyczne dostarczenie powiadomienia na stagingu przy kontrolowanej konfiguracji poczty. Testy automatyczne nie wysyłają prawdziwych wiadomości.

Nie zmieniano `.env`, zależności ani niezwiązanych funkcji RCP. Nie wykonano migracji na istniejącej bazie ani operacji usuwających dane.
