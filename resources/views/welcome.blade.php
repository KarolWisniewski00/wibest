<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wibest</title>
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">

    <!-- Header -->
    <header class="flex justify-center items-center p-6 shadow-md bg-gray-100 dark:bg-gray-800 ">
        <div class="max-w-[85rem] flex justify-between items-center w-full">
            <div class="flex items-center space-x-2">
                <a href="#" class="text-2xl font-bold text-green-500 dark:text-green-400" style="font-family: 'Raleway', sans-serif;">WIBEST</a>
            </div>
            <nav class="flex items-center gap-6">
                <a href="{{route('login')}}" id="theme-toggle" class="min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    Logowanie
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="relavie">
        <section id="trianglesContainer">
            <div class="flex flex-col items-center justify-center min-h-screen text-center py-20">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6" style="font-family: 'Raleway', sans-serif;">WIBEST RCP</h1>
                <p class="text-lg md:text-2xl text-gray-600 dark:text-gray-300 mb-8">Aplikacja webowa do mierzenia czasu pracy.</p>
                <div class="flex gap-4">
                    <a href="{{ route('login.google') }}" class="min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                        <i class="fa-brands fa-google mr-2"></i>Logowanie
                    </a>
                </div>
            </div>
        </section>
    </div>

    <!-- Features -->
    <!-- Features - Steps -->
    <section id="features" class="py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-8">
            <h2 class="text-5xl font-bold text-center mb-16">Jak zacząć z <span style="font-family: 'Raleway', sans-serif;">WIBEST RCP</span>?</h2>

            <div class="grid md:grid-cols-3 gap-12 text-center">

                <!-- Krok 1 -->
                <div class="p-8 bg-white dark:bg-gray-700 rounded-3xl shadow-lg hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-6">🔐</div>
                    <h3 class="text-2xl font-bold mb-4">1. Zaloguj się przez Google</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Bez kombinacji. Jedno kliknięcie i jesteś w środku – szybko, bezpiecznie, bez tworzenia kolejnych haseł.
                    </p>
                </div>

                <!-- Krok 2 -->
                <div class="p-8 bg-white dark:bg-gray-700 rounded-3xl shadow-lg hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-6">🏢</div>
                    <h3 class="text-2xl font-bold mb-4">2. Podaj dane firmy</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Uzupełnij podstawowe informacje o swojej firmie, żeby raporty i dokumenty były kompletne i profesjonalne.
                    </p>
                </div>

                <!-- Krok 3 -->
                <div class="p-8 bg-white dark:bg-gray-700 rounded-3xl shadow-lg hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-6">⏱️</div>
                    <h3 class="text-2xl font-bold mb-4">3. Kontroluj czas pracy</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Uruchamiaj start/stop jednym kliknięciem, rejestruj zdarzenia, zarządzaj urlopami. Wszystko masz pod ręką, w jednym miejscu.
                    </p>
                </div>

            </div>
        </div>
    </section>
    <section id="early-access" class="py-28 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 space-y-24">

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-5xl font-bold text-gray-900 dark:text-white mb-6">Dlaczego warto dołączyć teraz?</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Testuj <strong>Wibest</strong> jako pierwszy! Zdobądź ekskluzywny dostęp do naszej platformy i pomóż nam tworzyć najlepsze narzędzie do zarządzania czasem pracy.
                    </p>
                </div>
                <div class="flex justify-center">
                    <i class="fas fa-rocket text-indigo-600 text-8xl"></i>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="flex justify-center order-2 md:order-1">
                    <i class="fas fa-hands-helping text-yellow-500 text-8xl"></i>
                </div>
                <div class="order-1 md:order-2">
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Wpływaj na rozwój produktu</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Twoje opinie jako użytkownika <strong>early access</strong> bezpośrednio kształtują rozwój aplikacji.
                        Masz realny wpływ na funkcje, które pojawią się w finalnej wersji.
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Zgarnij specjalne bonusy</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Dla pierwszych użytkowników przygotowaliśmy <strong>zniżki</strong> i dodatkowe korzyści po oficjalnym starcie Wibest.
                        Im szybciej dołączysz, tym więcej zyskasz.
                    </p>
                </div>
                <div class="flex justify-center">
                    <i class="fas fa-gift text-pink-500 text-8xl"></i>
                </div>
            </div>

        </div>
    </section>


    <section id="faq-rcp" class="py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-5xl font-bold text-center mb-16">FAQ <span style="font-family: 'Raleway', sans-serif;">WIBEST RCP</span></h2>

            <div class="space-y-6">

                <!-- Ile kosztuje -->
                <details class="group bg-white dark:bg-gray-700 rounded-2xl shadow-md p-6">
                    <summary class="flex items-center justify-between cursor-pointer text-xl font-semibold text-gray-900 dark:text-white">
                        <span>Ile kosztuje?</span>
                        <span class="ml-4">
                            <i class="fas fa-plus text-green-500 group-open:hidden"></i>
                            <i class="fas fa-minus text-green-500 hidden group-open:inline"></i>
                        </span>
                    </summary>
                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                        Wibest RCP jest całkowicie darmowe w fazie MVP. Zależy nam na Twoim feedbacku, dlatego early access nie wymaga opłat.
                    </p>
                </details>

                <!-- Jak skonfigurować firmę -->
                <details class="group bg-white dark:bg-gray-700 rounded-2xl shadow-md p-6">
                    <summary class="flex items-center justify-between cursor-pointer text-xl font-semibold text-gray-900 dark:text-white">
                        <span>Jak skonfigurować firmę?</span>
                        <span class="ml-4">
                            <i class="fas fa-plus text-green-500 group-open:hidden"></i>
                            <i class="fas fa-minus text-green-500 hidden group-open:inline"></i>
                        </span>
                    </summary>
                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                        Wprowadź NIP, a system sam znajdzie firmę przez GUS. Jeśli jesteś pierwszym użytkownikiem, utworzysz nowy profil. Jeżeli chcesz dołączyć do istniejącej firmy — administrator musi zatwierdzić Twoje zgłoszenie.
                    </p>
                </details>

                <!-- Jakie są dostępne funkcje -->
                <details class="group bg-white dark:bg-gray-700 rounded-2xl shadow-md p-6">
                    <summary class="flex items-center justify-between cursor-pointer text-xl font-semibold text-gray-900 dark:text-white">
                        <span>Jakie są dostępne funkcje?</span>
                        <span class="ml-4">
                            <i class="fas fa-plus text-green-500 group-open:hidden"></i>
                            <i class="fas fa-minus text-green-500 hidden group-open:inline"></i>
                        </span>
                    </summary>
                    <ul class="mt-4 text-gray-700 dark:text-gray-300 list-disc list-inside space-y-1">
                        <li>Mierzenie czasu pracy: start/stop oraz dodawanie ręczne</li>
                        <li>Eksport raportów do plików Excel</li>
                        <li>Obsługa ról: admin, manager, kierownik, użytkownik</li>
                        <li>Wnioski urlopowe i nieobecności</li>
                        <li>Panel zespołu i uprawnienia</li>
                    </ul>
                </details>

            </div>
        </div>
    </section>


    <!-- About Section -->
    <section class="max-w-[85rem] w-full mx-auto px-4 py-3 grid grid-cols-1 md:grid-cols-2">
        <div class="w-full h-full flex flex-col text-lg justify-center items-center lg:text-xl my-6">
            <div class="my-6 flex flex-col min-w-[20rem] w-full md:w-fit gap-3">
                <a href="mailto:karol.wisniewski2901@gmail.com" class="min-h-[34px] whitespace-nowrap inline-flex items-center justify-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-envelope mr-2"></i>Napisz do mnie
                </a>
                <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 ">LUB</div>
                <a href="tel:451670344" class="min-h-[34px] whitespace-nowrap inline-flex items-center justify-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Zadzwoń do mnie
                </a>
            </div>
        </div>
        <div class="w-full h-full flex flex-col text-lg justify-center items-center lg:text-xl my-6">
            <div class="my-6 flex flex-col min-w-[20rem] w-full md:w-fit gap-3">
                <h2 class="text-3xl" style='font-family: "Raleway", sans-serif;'>Karol Wiśniewski WIBEST</h2>
                <p class="text-lg text-gray-500 mb-12">NIP:8992998536</p>
                <div class="flex flex-row text-5xl">
                    <i class="fa-solid fa-location-dot mr-5"></i>
                    <adress class="text-lg">Partynicka 5,<br> <span class="text-gray-500">53-031, </span>Wrocław</adress>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-8 text-gray-500 text-sm dark:text-gray-400">
        &copy; 2025 WIBEST. Wszelkie prawa zastrzeżone.
    </footer>

    <script>
        const toggle = document.getElementById('theme-toggle');
        toggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
    <!--
    <script>
        // Parameters 
        var
            axe = "X", // values can be "X" or "Y"
            numberOfSquare = 15, // How many square on the axe
            greyMinimum = 210, // Between 0 and 254
            greyMaximum = 245, // Between 1 and 255
            animMin = 2, // Animation durations (in seconds)
            animMax = 8;


        // The container in the HTML page
        var $tc = $("#trianglesContainer");

        function createTriangles() {
            let w = $tc.width(),
                h = $tc.height(),
                dx;
            let $svg = $('<svg width="' + w + '" height="' + h + '" xmlns="http://www.w3.org/2000/svg">');


            // Empty the container (usefull for the page resized calls)
            $tc[0].innerHTML = "";

            if (axe = "X")
                dx = w / numberOfSquare;
            else
                dx = h / numberOfSquare;


            for (let i = 0; i < w / dx; i++) {
                for (let j = 0; j < h / dx; j++) {
                    // Random Colors for animation
                    let c1 = rdmColor(greyMinimum, greyMaximum);
                    let c2 = rdmColor(greyMinimum, greyMaximum);

                    // Path direction for each triangles in a square
                    let d = [];
                    // Middle of the current square, to make triangles from a square
                    let middleX = (i * dx + dx / 2),
                        middleY = (j * dx + dx / 2);

                    // Creating the 4 paths directions
                    d.push('M ' + i * dx + ' ' + j * dx + ' h ' + dx + ' L ' + middleX + ' ' + middleY);
                    d.push('M ' + i * dx + ' ' + (j + 1) * dx + ' h ' + dx + ' L ' + middleX + ' ' + middleY);
                    d.push('M ' + i * dx + ' ' + j * dx + ' v ' + dx + ' L ' + middleX + ' ' + middleY);
                    d.push('M ' + (i + 1) * dx + ' ' + j * dx + ' v ' + dx + ' L ' + middleX + ' ' + middleY);

                    d.forEach(function(val, i) {
                        // Animate tag
                        let a = '<animate attributeName="fill" repeatCount="indefinite" dur="' + rdmInt(animMin, animMax) + 's" values="' + c1 + ';' + c2 + ';' + c1 + '" />';
                        // Adding the animated path to the SVG container
                        $svg[0].innerHTML += ('<path d="' + val + '" fill="' + c1 + '" stroke="' + c1 + '">' + a + '</path>');
                    });

                    // Puttin the SVG container in the HTML page
                    $tc.append($svg);
                }
            }
            // For Loops end
            $tc.append(
                `
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 text-center">
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6" style="font-family: 'Raleway', sans-serif;">WIBEST RCP</h1>
                <p class="text-lg md:text-2xl text-gray-600 dark:text-gray-300 mb-8">Aplikacja webowa do mierzenia czasu pracy.</p>
                <div class="flex gap-4">
                    <a href="#features" class="min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                        <i class="fa-brands fa-google mr-2"></i>Logowanie
                    </a>
                </div>
            </div>
        </div>
`
            );
        }



        // Random int between min and max
        function rdmInt(min, max) {
            return Math.round(Math.random() * (max - min) + min)
        }

        // Generate dark shades of gray from Tailwind's color palette
        function rdmColor(min, max) {
            const tailwindGrays = [
                'rgba(17, 24, 39, 0.1)', // Gray-900 with 50% opacity
                'rgba(31, 41, 55, 0.1)', // Gray-800 with 50% opacity
                'rgba(55, 65, 81, 0.1)', // Gray-700 with 50% opacity
                'rgba(75, 85, 99, 0.1)', // Gray-600 with 50% opacity
            ];
            return tailwindGrays[rdmInt(0, tailwindGrays.length - 1)];
        }

        // Create Triangle when the page is loaded
        window.onload = createTriangles();

        // Recreatee Triangles when the page is resized
        $(window).resize(createTriangles);
    </script>-->
</body>

</html>