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
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body>
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-3">
        <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between">
            <a class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80" href="#" style='font-family: "Raleway", sans-serif;'>WIBEST</a>
            <div class="sm:order-3 flex items-center gap-x-2">
                <!--Button-->
                <a href="{{route('login.google')}}" class="py-2 px-8 inline-flex items-center gap-x-2 text-sm font-medium border border-gray-800 bg-black text-white hover:bg-gray-800 focus:outline-none focus:bg-gray-800 disabled:opacity-50 disabled:pointer-events-none">
                    <i class="fa-solid fa-arrow-right-to-bracket mr-1"></i>Logowanie
                </a>
                <!--Button-->
            </div>
            <div id="hs-navbar-alignment" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2" aria-labelledby="hs-navbar-alignment-collapse">
                <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                    <!--Link
                    <a class="font-bold hover:text-gray-800 focus:outline-none" href="#" aria-current="page">Strona w budowie</a>
                    Link-->
                    <!--<a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400" href="#">Account</a>-->
                </div>
            </div>
        </nav>
    </header>
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h1 class="mb-4 text-4xl tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl" style='font-family: "Raleway", sans-serif;'>WIBEST</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48">Aplikacje, które tworzą przyszłość.</p>
        </div>
    </section>
    <section>
        <!-- Hero -->
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
                <div class="text-center py-8">
                    <img src="{{ asset('hero.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                </div>
                <div>
                    <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight"><span class="text-indigo-600 " style='font-family: "Raleway", sans-serif;'>SDF</span></h1>
                    <p class="mt-3 text-lg text-gray-800 ">System do fakturowania.</p>

                    <!-- Buttons -->
                    <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                        <a href="{{route('login.google')}}" class="mb-6 py-2 px-8 inline-flex items-center justify-center gap-x-2 text-sm font-medium border border-gray-800 bg-black text-white hover:bg-gray-800 focus:outline-none focus:bg-gray-800 disabled:opacity-50 disabled:pointer-events-none">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-1"></i>Logowanie
                        </a>
                    </div>
                    <!-- End Buttons -->

                </div>
                <!-- End Col -->

                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Hero -->
    </section>
    <div class="mb-6 py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 "></div>
    <section>
        <!-- Hero -->
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
                <div class="text-center py-8">
                    <img src="{{ asset('website.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                </div>
                <div>
                    <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight"><span class="text-green-600 " style='font-family: "Raleway", sans-serif;'>TSI</span></h1>
                    <p class="mt-3 text-lg text-gray-800 ">Tworzenie stron internetowych</p>

                    <!-- Buttons -->
                    <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                        <a href="tel:451670344" class="mb-6 py-2 px-8 inline-flex items-center justify-center gap-x-2 text-sm font-medium border border-green-600 bg-green-600 text-white hover:border-green-700 hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none hidden md:inline-flex">
                            <i class="fa-solid fa-phone mr-1"></i>Zadzwoń do mnie
                        </a>
                    </div>
                    <!-- End Buttons -->


                </div>
                <!-- End Col -->
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Hero -->
    </section>
    <section class="bg-white max-w-[85rem] w-full mx-auto px-4 py-3 grid grid-cols-1 md:grid-cols-2">
        <div class="w-full h-full flex flex-col text-lg justify-center lg:text-xl">
            <div class="mb-6 flex flex-col min-w-[20rem] w-full md:w-fit">
                <a href="mailto:karol.wisniewski2901@gmail.com" class="mb-6 py-2 px-8 inline-flex items-center justify-center gap-x-2 text-sm font-medium border border-gray-800 bg-black text-white hover:bg-gray-800 focus:outline-none focus:bg-gray-800 disabled:opacity-50 disabled:pointer-events-none">
                    <i class="fa-solid fa-envelope mr-1"></i>Napisz do mnie
                </a>
                <div class="mb-6 py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 ">LUB</div>
                <a href="tel:451670344" class="mb-6 py-2 px-8 inline-flex items-center justify-center gap-x-2 text-sm font-medium border border-green-600 bg-green-600 text-white hover:border-green-700 hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    <i class="fa-solid fa-phone mr-1"></i>Zadzwoń do mnie
                </a>
            </div>
            <div class="flex flex-col">
                <h2 class="text-3xl" style='font-family: "Raleway", sans-serif;'>Karol Wiśniewski WIBEST</h2>
                <p class="text-lg text-gray-500 mb-12">NIP:8992998536 REGON:8992998536</p>
                <div class="flex flex-row text-5xl">
                    <i class="fa-solid fa-location-dot mr-5"></i>
                    <adress class="text-lg">Partynicka 5,<br> <span class="text-gray-500">53-031, </span>Wrocław</adress>
                </div>
            </div>
        </div>
        <div class="">
            <iframe class="w-full min-h-[40em]" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d156.71981977718542!2d16.991064561448766!3d51.06200351925786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fc3c6671ad7f5%3A0xa270a86ed171b2d3!2sPartynicka%205%2C%2053-031%20Wroc%C5%82aw!5e0!3m2!1spl!2spl!4v1721152411241!5m2!1spl!2spl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</body>

</html>