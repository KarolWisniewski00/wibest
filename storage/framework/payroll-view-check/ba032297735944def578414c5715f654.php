<!doctype html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="twitter:card" content="summary">

    <meta property="og:locale" content="pl_PL">

    <meta name="author" content="Karol Wiśniewski">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <title>Funkcje WIBEST – RCP, Ewidencja Czasu Pracy i Raporty</title>

    <meta name="description"
        content="Poznaj funkcje WIBEST – systemu RCP i ewidencji czasu pracy. Rejestracja czasu pracy, nadgodziny, wnioski, planowanie pracy i raporty dla firm.">

    <meta name="keywords"
        content="funkcje WIBEST, funkcje RCP, system RCP, RCP online, ewidencja czasu pracy, ewidencja czasu pracy online, rejestracja czasu pracy, rejestracja czasu pracy online, program do ewidencji czasu pracy, nadgodziny pracowników, wnioski urlopowe online, planowanie czasu pracy, raporty czasu pracy">

    <!-- Open Graph -->
    <meta property="og:site_name" content="WIBEST – Ewidencja czasu pracy i RCP">

    <meta property="og:type" content="website">

    <meta property="og:url" content="https://wibest.pl/funkcje">

    <meta property="og:title" content="Funkcje WIBEST – RCP, Ewidencja Czasu Pracy i Raporty">

    <meta property="og:description"
        content="Poznaj funkcje WIBEST – systemu RCP i ewidencji czasu pracy. Rejestracja czasu pracy, nadgodziny, wnioski, planowanie pracy i raporty dla firm.">

    <meta property="og:image" content="<?php echo e(asset('wibest_icon_transparent_bg.png')); ?>">

    <meta property="og:image:alt" content="WIBEST – funkcje systemu RCP i ewidencji czasu pracy">

    <!-- Twitter -->
    <meta name="twitter:title" content="Funkcje WIBEST – RCP, Ewidencja Czasu Pracy i Raporty">

    <meta name="twitter:description"
        content="Poznaj funkcje WIBEST – systemu RCP i ewidencji czasu pracy. Rejestracja czasu pracy, nadgodziny, wnioski, planowanie i raporty.">

    <meta name="twitter:image" content="<?php echo e(asset('wibest_icon_transparent_bg.png')); ?>">

    <meta name="twitter:image:alt" content="WIBEST – funkcje systemu RCP i ewidencji czasu pracy">

    <!-- Canonical -->
    <link rel="canonical" href="https://wibest.pl/funkcje">

    <!-- ICON -->
    <link rel="icon" href="<?php echo e(asset('wibest_icon_transparent_bg.png')); ?>" type="image/png">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Raleway:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>

    <style>
        * {
            font-family: "Lato", sans-serif;
        }

        .system-font {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                "Noto Color Emoji" !important;
        }
    </style>

</head>

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">
    <!-- HEADER -->
    <header x-data="{ open: false }"
        class="flex flex-col justify-center items-center shadow bg-white dark:bg-gray-800 sticky top-0 z-50">
        <div class="max-w-[85rem] flex justify-between items-center w-full px-8 h-20">
            <!-- Logo -->
            <div class="w-1/3 shrink-0 flex items-center justify-start">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <span
                        class="sm:order-1 text-green-300 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-green-300"
                        style='font-family: "Raleway", sans-serif;'>WIBEST</span>
                </a>
            </div>

            <!-- MENU -->
            <nav class="w-1/3 hidden md:flex items-center justify-center gap-6 text-sm font-semibold">
                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-20 text-nowrap','href' => ''.e(route('welcome')).'','active' => request()->routeIs('welcome')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-20 text-nowrap','href' => ''.e(route('welcome')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('welcome'))]); ?>
                    <i class="fa-solid fa-house"></i>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-20 text-nowrap','href' => ''.e(route('function')).'','active' => request()->routeIs('function')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-20 text-nowrap','href' => ''.e(route('function')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('function'))]); ?>
                    <i class="fa-solid fa-rocket mr-2"></i>Funkcje
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-20 text-nowrap','href' => ''.e(route('about')).'','active' => request()->routeIs('about')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-20 text-nowrap','href' => ''.e(route('about')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('about'))]); ?>
                    <i class="fa-solid fa-users mr-2"></i>O nas
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-20 text-nowrap','href' => ''.e(route('blog')).'','active' => request()->routeIs('blog')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-20 text-nowrap','href' => ''.e(route('blog')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('blog'))]); ?>
                    <i class="fa-solid fa-blog mr-2"></i>Blog
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-20 text-nowrap','href' => ''.e(route('contact')).'','active' => request()->routeIs('contact')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-20 text-nowrap','href' => ''.e(route('contact')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('contact'))]); ?>
                    <i class="fa-solid fa-phone mr-2"></i>Kontakt
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
            </nav>

            <!-- CTA -->
            <div class="w-1/3 flex items-center justify-end gap-3">
                <a href="<?php echo e(route('login')); ?>" id="theme-toggle"
                    class="system-font justify-center text-xs lg:text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>Logowanie
                </a>
                <!-- Hamburger -->
                <div class="flex items-center md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>


        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden w-full">
            <div class="pt-2 pb-3 space-y-1">
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('welcome')).'','active' => request()->routeIs('welcome')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('welcome')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('welcome'))]); ?>
                    <i class="fa-solid fa-house mr-2"></i>Strona główna
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('function')).'','active' => request()->routeIs('function')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('function')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('function'))]); ?>
                    <i class="fa-solid fa-rocket mr-2"></i>Funkcje
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('about')).'','active' => request()->routeIs('about')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('about')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('about'))]); ?>
                    <i class="fa-solid fa-users mr-2"></i>O nas
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('blog')).'','active' => request()->routeIs('blog')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('blog')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('blog'))]); ?>
                    <i class="fa-solid fa-blog mr-2"></i>Blog
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('contact')).'','active' => request()->routeIs('contact')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('contact')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('contact'))]); ?>
                    <i class="fa-solid fa-phone mr-2"></i>Kontakt
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
            </div>
        </div>
    </header>
    <section class="px-8 pt-8 lg:pt-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- HEADER -->
            <div class="text-center max-w-3xl mx-auto mb-10">

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Funkcje systemu WIBEST
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Dokumentacja modułów — automatyczne śledzenie sekcji jak w systemach SaaS.
                </p>

            </div>
        </div>
    </section>
    <div id="sticky-section" class="sticky top-[80px] z-40 w-full 
            backdrop-blur-md 
            bg-white/80 dark:bg-gray-900/80">
        <div class="max-w-[85rem] mx-auto relative flex flex-col gap-2 px-12 py-4 my-6">

            <!-- Górna nawigacja -->
            <div class="grid grid-cols-5 gap-4">
                <!-- Krok 1 -->
                <a href="#rcp" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        ⏱️
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        RCP
                    </span>
                </a>

                <!-- Krok 2 -->
                <a href="#e-wnioski" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        🏖️
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        WNIOSKI
                    </span>
                </a>

                <!-- Krok 3 -->
                <a href="#planowanie" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        🌀
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-violet-300 dark:bg-violet-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        PLANING
                    </span>
                </a>

                <!-- Krok 4 -->
                <a href="#raporty" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        📈
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-gray-300 dark:bg-gray-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        RAPORTY
                    </span>
                </a>
                <a href="#obiekty" class="nav-link-2 flex flex-col items-center justify-center"><span class="text-lg md:text-xl">🏗️</span><span class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">Obiekty</span></a>
            </div>

            <!-- Pasek postępu -->
            <div class="relative">

                <!-- Tło -->
                <div
                    class="absolute top-1/2 left-[10%] right-[10%] h-2 -translate-y-1/2 rounded-full bg-gray-300 dark:bg-gray-700">
                </div>

                <!-- Progress -->
                <div id="progress-bar"
                    class="absolute top-1/2 left-[10%] h-2 w-[0%] -translate-y-1/2 rounded-full bg-green-300">
                </div>

                <!-- Punkty -->
                <div class="relative grid grid-cols-5 gap-4">
                    <!-- Krok 1 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-1"
                            class="w-5 h-5 rounded-full bg-green-300 dark:bg-green-300 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <!-- Krok 2 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-2"
                            class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <!-- Krok 3 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-3"
                            class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <!-- Krok 4 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-4"
                            class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <div id="step-5" class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900"></div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <section class="px-8 pb-8 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">
            <!-- GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- LEFT NAV -->
                <aside class="lg:col-span-3">

                    <div id="content-section"
                        class="sticky top-48 appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                            Moduły
                        </p>

                        <nav class="flex flex-col gap-2 text-sm" id="sidebar">

                            <a href="#rcp"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-clock mr-2"></i>RCP
                            </a>

                            <a href="#e-wnioski"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-inbox mr-2"></i>Wnioski
                            </a>

                            <a href="#planowanie"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-calendar-days mr-2"></i>Planing
                            </a>

                            <a href="#raporty"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-chart-line mr-2"></i>Raporty
                            </a>
                            <a href="#obiekty" class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700"><i class="fa-solid fa-cube mr-2"></i>Obiekty</a>
                        </nav>

                    </div>

                </aside>

                <!-- CONTENT -->
                <main class="lg:col-span-9 space-y-10">

                    <!-- 1 RCP -->
                    <div id="rcp"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Rejestracja Czasu Pracy
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-clock text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Rdzeń systemu WIBEST. Umożliwia rejestrację wejść i wyjść pracowników z lokalizacją —
                            zarówno ręcznie przez administratora, jak i samodzielnie przez
                            pracownika. System automatycznie wykrywa nadgodziny, braki normy, pracę nocną oraz
                            wielokrotne odczyty w ciągu dnia.
                        </p>

                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    start/stop
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Zegar
                                </h3>
                            </div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Pracownik samodzielnie rozpoczyna i kończy sesję pracy jednym kliknięciem. Czas liczony
                            jest z dokładnością do sekundy. Pracownik zostaje zapytany przez system czy wyraża zgode
                            na pobranie lokalizacji.
                        </p>

                        <!--START STOP + ZDARZENIA -->

                        <div
                            class="w-full grid gap-4 appearance-none rounded-lg p-2 outline-none shadow border border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-50 mb-4 grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full">
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
                                <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['id' => 'dateWidget','class' => 'dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateWidget','class' => 'dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300']); ?>
                                        <?php echo e(\Carbon\Carbon::now()->locale('pl')->translatedFormat('l d F Y')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>

                                <!-- Timer -->
                                <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['id' => 'timerWidget','class' => ' text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'timerWidget','class' => ' text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']); ?>
                                        00:00:00
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
                                <div id="statusWrapper"
                                    class="md:w-fit md:mx-auto inline-flex items-center px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-500/10 border border-gray-200 dark:border-gray-500/20">
                                    <span class="relative flex size-3">
                                        <span id="statusPing"
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-gray-300 opacity-75 hidden"></span>
                                        <span id="statusDot"
                                            class="relative inline-flex size-3 rounded-full bg-gray-300"></span>
                                    </span>
                                    <span id="statusText"
                                        class="mx-auto pr-3 md:pl-3 text-[0.7rem] uppercase tracking-[0.25em] font-bold text-gray-700 dark:text-gray-300">Jesteś
                                        poza pracą</span>
                                </div>
                                <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <div
                                        class="h-fit flex flex-row items-center justify-center text-center w-fit
                                                                                                                                                                                        rounded-2xl
                                                                                                                                                                                        transition-colors duration-200">

                                        <!-- Ikona i etykieta -->
                                        <div class="flex flex-col items-center justify-center h-full">
                                            <span class="text-2xl">🏢</span>
                                            <span
                                                class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                                                                                                                                                                    bg-blue-300 text-gray-900 uppercase tracking-widest">
                                                Grafik
                                            </span>
                                        </div>
                                        <div>
                                            <!-- Dane szczegółowe -->
                                            <div
                                                class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                                                <div class="font-semibold tracking-widest uppercase">
                                                    08:00
                                                    –
                                                    16:00
                                                </div>
                                            </div>

                                            <!-- Opis -->
                                            <p
                                                class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-100 tracking-wide uppercase">
                                                08:00:00
                                            </p>
                                        </div>
                                    </div>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
                            </div>

                            <!-- Prawa kolumna: Przyciski -->
                            <div class="flex flex-col justify-center items-center space-y-6">
                                <div id="loaderTimerWidget"
                                    class="hidden h-[66px] rounded-lg bg-gray-200 dark:bg-gray-600 w-[179px] mx-auto animate-pulse">
                                </div>
                                <button id="startButtonWidget"
                                    class="w-[179px] text-2xl min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-play mr-2"></i>Start
                                </button>
                                <!-- Przycisk Stop -->
                                <button id="stopButtonWidget"
                                    class="w-[179px] hidden text-2xl  min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-stop mr-2"></i>Stop
                                </button>
                            </div>
                        </div>

                        <script>
                            $(function () {

                                const $timer = $('#timerWidget');
                                const $location = $('#locationWidget');
                                const statusWrapper = $('#statusWrapper');
                                const statusText = $('#statusText');
                                const statusDot = $('#statusDot');
                                const statusPing = $('#statusPing');

                                let seconds = 0;

                                const STATE = {
                                    START: "start",
                                    RUN: "run",
                                    FAST: "fast",
                                    STOP: "stop",
                                    PAUSE: "pause"
                                };

                                let state = STATE.START;

                                function format(sec) {
                                    const h = String(Math.floor(sec / 3600)).padStart(2, '0');
                                    const m = String(Math.floor((sec % 3600) / 60)).padStart(2, '0');
                                    const s = String(sec % 60).padStart(2, '0');
                                    return `${h}:${m}:${s}`;
                                }

                                function render() {
                                    $timer.text(format(seconds));
                                }

                                function setLocation(text) {
                                    $location.fadeOut(200, function () {
                                        $(this).text(text).fadeIn(200);
                                    });
                                }

                                function reset() {
                                    seconds = 0;
                                    render();
                                }

                                function startPhase() {
                                    state = STATE.RUN;
                                    $('#startButtonWidget').addClass('hidden');
                                    $('#stopButtonWidget').removeClass('hidden');

                                    reset();

                                    setLocation("SZEROKOŚĆ: 50.0647 DŁUGOŚĆ: 19.9450 DOKŁADOŚĆ: 35m");
                                    statusWrapper.addClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20')
                                    .removeClass('bg-gray-100 dark:bg-gray-500/10 border border-gray-200 dark:border-gray-500/20');
                                    statusText.addClass('text-green-700 dark:text-green-300');
                                    statusText.addClass('text-gray-700 dark:text-gray-300');
                                    statusText.text('Jesteś w trakcie pracy')
                                    statusDot.addClass('bg-green-300').removeClass('bg-gray-300')
                                    statusPing.addClass('bg-green-300 animate-ping').removeClass('bg-gray-300')

                                    let tick = setInterval(() => {
                                        if (state !== STATE.RUN) {
                                            clearInterval(tick);
                                            return;
                                        }

                                        seconds++;
                                        render();
                                    }, 1000);

                                    // po 3 sekundach przejście do fast forward
                                    setTimeout(() => {
                                        if (state !== STATE.RUN) return;
                                        state = STATE.FAST;
                                        fastPhase();
                                    }, 3000);
                                }

                                function fastPhase() {
                                    let height = $('#locationWidget').height();
                                    $('#loaderLocationWidget').height(height);

                                    $('#stopButtonWidget').addClass('hidden');
                                    $('#loaderTimerWidget').removeClass('hidden');
                                    $('#loaderLocationWidget').removeClass('hidden');
                                    $('#locationWidget').addClass('hidden');

                                    let fastTick = setInterval(() => {

                                        if (state !== STATE.FAST) {
                                            clearInterval(fastTick);
                                            return;
                                        }

                                        seconds += 3600;

                                        $timer
                                            .stop(true, true)
                                            .addClass("text-yellow-300 dark:text-yellow-400 scale-110");

                                        setTimeout(() => {
                                            $timer.removeClass("text-yellow-300 dark:text-yellow-400 scale-110");
                                        }, 150);

                                        render();
                                        if (seconds >= 8 * 3600) {

                                            // pokazujemy stop (ale jeszcze NIE kończymy)
                                            $('#stopButtonWidget').removeClass('hidden');
                                            $('#loaderTimerWidget').addClass('hidden');
                                            $('#loaderLocationWidget').addClass('hidden');
                                            $('#locationWidget').removeClass('hidden');

                                            clearInterval(fastTick);

                                            // 🔥 DODATKOWA FAZA - „dogrywka”
                                            let tailSeconds = 0;

                                            const tailTick = setInterval(() => {

                                                tailSeconds++;
                                                seconds++; // dalej mierzy czas, ale już normalnie
                                                render();

                                                // opcjonalnie: subtelny efekt uspokojenia
                                                $('#timerWidget')
                                                    .removeClass('text-yellow-400 scale-110')
                                                    .addClass('text-gray-900');

                                                // po 3–5 sekundach STOP
                                                if (tailSeconds >= 3) {

                                                    clearInterval(tailTick);

                                                    // tutaj przechodzisz do STOP
                                                    stopPhase(); // albo Twoja funkcja stop

                                                }

                                            }, 1000);
                                        }

                                    }, 180);
                                }

                                function stopPhase() {
                                    state = STATE.STOP;
                                    $('#startButtonWidget').removeClass('hidden');
                                    $('#stopButtonWidget').addClass('hidden');


                                    setLocation("SZEROKOŚĆ: 52.2297 DŁUGOŚĆ: 21.0122 DOKŁADOŚĆ: 12m");
                                    statusWrapper.removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20')
                                    .addClass('bg-gray-100 dark:bg-gray-500/10 border border-gray-200 dark:border-gray-500/20');
                                    statusText.removeClass('text-green-700 dark:text-green-300');
                                    statusText.removeClass('text-gray-700 dark:text-gray-300');
                                    statusText.text('Jesteś poza pracą')
                                    statusDot.removeClass('bg-green-300').addClass('bg-gray-300')
                                    statusPing.removeClass('bg-green-300 animate-ping').addClass('bg-gray-300')

                                    setTimeout(() => {
                                        pausePhase();
                                    }, 2000);
                                }

                                function pausePhase() {
                                    state = STATE.PAUSE;

                                    setTimeout(() => {
                                        startPhase();
                                    }, 2500);
                                }

                                // START LOOP AUTOMATYCZNY
                                startPhase();

                            });
                        </script>
                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Zadania
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Nadgodziny
                                </h3>
                            </div>
                        </div>
                        <div
                            class="mb-4 flex flex-col gap-4 w-full h-full appearance-none rounded-r-lg shadow border-l-4 border-green-300 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <p class="font-bold">Kluczowy scenariusz</p>
                            <p>Nie każde dodatkowe pozostanie w pracy oznacza uzasadnione nadgodziny. WIBEST pozwala
                                wymagać od pracownika uzupełnienia zadania wykonanego w czasie nadliczbowym. Po jego
                                opisaniu nadgodziny mogą zostać uwzględnione w ewidencji. Jeśli zadanie nie zostanie
                                uzupełnione, system może ograniczyć naliczony czas do maksymalnego czasu wynikającego z
                                planingu.
                            </p>
                            <p>
                                Dodatkowo przełożony może zatwierdzić lub odrzucić zadanie, zachowując kontrolę nad tym,
                                które nadgodziny faktycznie powinny zostać uwzględnione.</p>
                        </div>
                        <div
                            class="mb-4 md:col-span-2 grid grid-cols-1 gap-4 w-full p-4 border-2 dark:border-gray-700 rounded-lg">
                            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                🎯 Zadanie
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
                            <!--POWRÓT-->
                            <div id="myForm" class="space-y-4">
                                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css"
                                    rel="stylesheet">
                                <style>
                                    #editor {
                                        border: 0;
                                        height: min-content;
                                    }

                                    .ql-toolbar {
                                        border: 0 !important;
                                        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
                                        border-radius: 0.375rem;
                                        overflow-y: auto;
                                        padding: 8px 12px !important;
                                        margin: 0 !important;
                                    }

                                    .ql-editor {
                                        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
                                        padding: 8px 12px !important;
                                    }

                                    @media (prefers-color-scheme: dark) {
                                        .ql-toolbar {
                                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-editor {
                                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-editor.ql-blank::before {
                                            color: #9ca3af;
                                            /* Tailwind gray-400 */
                                        }

                                        .ql-toolbar {
                                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-italic .ql-stroke {
                                            stroke: white !important;
                                        }

                                        .ql-underline .ql-stroke {
                                            stroke: white !important;
                                        }

                                        .ql-bold .ql-stroke {
                                            stroke: white !important;
                                        }

                                        .ql-fill {
                                            fill: white !important;
                                        }

                                        .ql-italic:hover .ql-stroke {
                                            stroke: #9ca3af !important;
                                        }

                                        .ql-underline:hover .ql-stroke {
                                            stroke: #9ca3af !important;
                                        }

                                        .ql-bold:hover .ql-stroke {
                                            stroke: #9ca3af !important;
                                        }

                                        .ql-underline:hover .ql-fill {
                                            fill: #9ca3af !important;
                                        }
                                    }
                                </style>
                                <div id="editor"
                                    class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-fit overflow-y-auto">

                                </div>

                                <textarea id="editor-content" name="content" style="display:none;"></textarea>
                                <script>
                                    const quill = new Quill('#editor', {
                                        theme: 'snow',
                                        placeholder: '👈 Wpisz tutaj treść...',
                                        modules: {
                                            toolbar: [
                                                ['bold', 'italic', 'underline'],
                                            ]
                                        }
                                    });
                                    // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                                    document.getElementById('myForm').onsubmit = function () {
                                        var editorContent = document.getElementById('editor-content');
                                        editorContent.value = quill.root.innerHTML;
                                    };
                                </script>
                                <div class="flex justify-end mt-4">
                                    <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['id' => 'task-save','type' => 'button','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-save','type' => 'button','class' => 'text-lg']); ?>
                                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 flex justify-center items-center">
                            <div
                                class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-arrow-down-long text-2xl"></i>
                            </div>
                        </div>

                        <div
                            class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50 md:col-span-2 mb-4">
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Zdarzenie
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                    🎯 Zadanie
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Status
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal24bb47aeb85068c803bc2d06015e82e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal24bb47aeb85068c803bc2d06015e82e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yellow','data' => ['id' => 'task-status','class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-yellow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-status','class' => 'text-2xl']); ?>
                                    🟡 oczekujące
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal24bb47aeb85068c803bc2d06015e82e8)): ?>
<?php $attributes = $__attributesOriginal24bb47aeb85068c803bc2d06015e82e8; ?>
<?php unset($__attributesOriginal24bb47aeb85068c803bc2d06015e82e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal24bb47aeb85068c803bc2d06015e82e8)): ?>
<?php $component = $__componentOriginal24bb47aeb85068c803bc2d06015e82e8; ?>
<?php unset($__componentOriginal24bb47aeb85068c803bc2d06015e82e8); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Treść
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <div id="task-content"
                                        class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                        Wpisz treść wyżej
                                    </div>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Czas w pracy-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Kiedy
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2 w-full']); ?>
                                        <span id="task-date"
                                            class="inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            📅
                                            <?php echo e(\Carbon\Carbon::now()->locale('pl')->translatedFormat('d.m.Y H:i:s')); ?>

                                        </span>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Czas w pracy-->

                            <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['id' => 'task-accept','href' => '#','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-accept','href' => '#','class' => 'text-lg']); ?>
                                <i class="fa-solid fa-check mr-2"></i>Akceptuj
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $attributes = $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $component = $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal486fe4e36c8aedb1b11f2f1412e8dab5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal486fe4e36c8aedb1b11f2f1412e8dab5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-red','data' => ['id' => 'task-reject','href' => '#','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-reject','href' => '#','class' => 'text-lg']); ?>
                                <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal486fe4e36c8aedb1b11f2f1412e8dab5)): ?>
<?php $attributes = $__attributesOriginal486fe4e36c8aedb1b11f2f1412e8dab5; ?>
<?php unset($__attributesOriginal486fe4e36c8aedb1b11f2f1412e8dab5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal486fe4e36c8aedb1b11f2f1412e8dab5)): ?>
<?php $component = $__componentOriginal486fe4e36c8aedb1b11f2f1412e8dab5; ?>
<?php unset($__componentOriginal486fe4e36c8aedb1b11f2f1412e8dab5); ?>
<?php endif; ?>
                        </div>
                        <script>
                            $(document).ready(function () {

                                // ZAPISZ
                                $('#task-save').on('click', function (e) {
                                    e.preventDefault();

                                    // Pobierz treść z Quilla
                                    let content = quill.root.innerHTML;

                                    // Sprawdź czy coś wpisano
                                    if (quill.getText().trim().length === 0) {
                                        alert('Wpisz treść zadania.');
                                        return;
                                    }

                                    // Aktualizuj treść
                                    $('#task-content').html(content);

                                    // Aktualna data
                                    let now = new Date();

                                    let day = String(now.getDate()).padStart(2, '0');
                                    let month = String(now.getMonth() + 1).padStart(2, '0');
                                    let year = now.getFullYear();

                                    let hours = String(now.getHours()).padStart(2, '0');
                                    let minutes = String(now.getMinutes()).padStart(2, '0');
                                    let seconds = String(now.getSeconds()).padStart(2, '0');

                                    let currentDate =
                                        day + '.' +
                                        month + '.' +
                                        year + ' ' +
                                        hours + ':' +
                                        minutes + ':' +
                                        seconds;

                                    // Aktualizuj datę
                                    $('#task-date').html('📅 ' + currentDate);

                                    // Status -> oczekujące
                                    $('#task-status')
                                        .removeClass('text-green-300 dark:text-green-300 text-red-300 dark:text-red-300')
                                        .addClass('text-yellow-500 dark:text-yellow-300')
                                        .html('🟡 oczekujące');

                                    // Pokaż oba przyciski
                                    $('#task-accept').show();
                                    $('#task-reject').show();
                                });


                                // AKCEPTUJ
                                $('#task-accept').on('click', function (e) {
                                    e.preventDefault();

                                    $('#task-status')
                                        .removeClass('text-yellow-500 dark:text-yellow-300 text-red-300 dark:text-red-300')
                                        .addClass('text-green-300 dark:text-green-300')
                                        .html('🟢 zaakceptowane');

                                    $(this).hide();
                                    $('#task-reject').show();
                                });


                                // ODRZUĆ
                                $('#task-reject').on('click', function (e) {
                                    e.preventDefault();

                                    $('#task-status')
                                        .removeClass('text-yellow-500 dark:text-yellow-300 text-green-300 dark:text-green-300')
                                        .addClass('text-red-300 dark:text-red-300')
                                        .html('🔴 odrzucone');

                                    $(this).hide();
                                    $('#task-accept').show();
                                });

                            });
                        </script>
                        <div
                            class="flex items-start justify-between gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- TELEFON -->
                            <div class="flex justify-center lg:justify-start overflow-hidden h-[320px] lg:h-[480px]">

                                <div class="relative scale-[0.9] lg:scale-[1.0] mx-auto -translate-y-64">

                                    <!-- PHONE -->
                                    <div
                                        class="relative mx-auto border-[14px] border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 rounded-[2.8rem] h-[620px] w-[310px]">

                                        <!-- BUTTONS -->
                                        <div
                                            class="h-[34px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[78px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[132px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[190px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[68px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -right-[17px] top-[148px] rounded-e-lg">
                                        </div>

                                        <!-- SCREEN -->
                                        <div
                                            class="rounded-[2.1rem] overflow-hidden w-[282px] h-[592px] bg-gray-50 dark:bg-gray-950 flex flex-col relative">

                                            <!-- NOTCH -->
                                            <div
                                                class="absolute top-0 left-1/2 -translate-x-1/2 w-[145px] h-[30px] bg-gray-800 rounded-b-3xl z-10">
                                            </div>

                                            <!-- HEADER -->
                                            <div
                                                class="pt-8 px-4 pb-3 border-b border-gray-200 dark:border-gray-800 text-center text-sm font-bold tracking-wide text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-950">
                                                WIBEST
                                            </div>

                                            <!-- CHAT -->
                                            <div class="flex-1 flex flex-col justify-end p-4 space-y-4">

                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-green-700 dark:text-green-300">
                                                        Start nadgodzin
                                                    </div>

                                                    <div class="mt-2 text-gray-600 dark:text-gray-300">
                                                        Dzisiejsza norma:
                                                        <span class="block font-bold text-gray-900 dark:text-white">
                                                            08:00:00
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>
                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-green-700 dark:text-green-300">
                                                        Koniec pracy
                                                    </div>

                                                    <div class="mt-2 text-gray-600 dark:text-gray-300">
                                                        Dzisiejsza norma:
                                                        <span class="block font-bold text-gray-900 dark:text-white">
                                                            08:00:06
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>
                                            </div>

                                            <!-- INPUT -->
                                            <div
                                                class="p-4 border-t border-gray-200 dark:border-gray-800 flex items-center gap-2 bg-white dark:bg-gray-950">

                                                <div
                                                    class="flex-1 bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-full h-10">
                                                </div>

                                                <div
                                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-500/20 border border-gray-200 dark:border-gray-500/20 rounded-full flex items-center justify-center text-gray-700 dark:text-gray-300">
                                                    →
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            powiadomienia
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            SMS
                                        </h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Pracownik otrzymuje powiadomienie SMS w momencie przekroczenia zaplanowanego
                                    czasu pracy + progu liczenia nadgodzin.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Pracownik otrzymuje powiadomienie SMS z podsumowaniem sesji po zakończeniu pracy
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- 2 E-WNIOSKI -->
                    <section id="e-wnioski"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Wnioski / Nieobecności
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                <i class="fa-solid fa-inbox text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Zarządzaj wnioskami pracowników w jednym miejscu. Urlopy, zwolnienia, wyjścia prywatne i
                            pozostałe sprawy kadrowe mogą być składane bezpośrednio w WIBEST, a osoby odpowiedzialne za
                            ich obsługę otrzymują je gotowe do rozpatrzenia.
                        </p>

                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Przeliczanie pozostałych dni
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Liczenie urlopu
                                </h3>
                            </div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            WIBEST automatycznie kontroluje wykorzystany i pozostały wymiar urlopu. Przy składaniu
                            wniosku system sprawdza dostępny limit, a po jego zaakceptowaniu odpowiednia liczba dni
                            zostaje automatycznie odjęta z puli pracownika. Bez ręcznego liczenia i aktualizowania
                            arkuszy.
                        </p>
                        <div
                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <div class="flex flex-col w-full gap-4">
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start">
                                        <?php if (isset($component)) { $__componentOriginal18a4283746f1d79a8a93378ffe5ce33f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18a4283746f1d79a8a93378ffe5ce33f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-status','data' => ['class' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '']); ?>
                                            zaakceptowane
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18a4283746f1d79a8a93378ffe5ce33f)): ?>
<?php $attributes = $__attributesOriginal18a4283746f1d79a8a93378ffe5ce33f; ?>
<?php unset($__attributesOriginal18a4283746f1d79a8a93378ffe5ce33f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18a4283746f1d79a8a93378ffe5ce33f)): ?>
<?php $component = $__componentOriginal18a4283746f1d79a8a93378ffe5ce33f; ?>
<?php unset($__componentOriginal18a4283746f1d79a8a93378ffe5ce33f); ?>
<?php endif; ?>
                                    </div>
                                </div>
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start text-xs">
                                        <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap']); ?>
                                            <span
                                                class="inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                <?php echo e(\Carbon\Carbon::now()->locale('pl')->translatedFormat('d.m.Y')); ?>

                                            </span>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-start items-start w-fit gap-2">
                                    <div class="flex flex-col items-center justify-center h-full w-full">
                                        <span class="text-lg md:text-xl">
                                            🏖️
                                        </span>
                                        <?php if (isset($component)) { $__componentOriginal003932a43de1bc916b9c819eb0be9a56 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal003932a43de1bc916b9c819eb0be9a56 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-pink','data' => ['class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-pink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-1']); ?>
                                            UW
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal003932a43de1bc916b9c819eb0be9a56)): ?>
<?php $attributes = $__attributesOriginal003932a43de1bc916b9c819eb0be9a56; ?>
<?php unset($__attributesOriginal003932a43de1bc916b9c819eb0be9a56); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal003932a43de1bc916b9c819eb0be9a56)): ?>
<?php $component = $__componentOriginal003932a43de1bc916b9c819eb0be9a56; ?>
<?php unset($__componentOriginal003932a43de1bc916b9c819eb0be9a56); ?>
<?php endif; ?>
                                    </div>
                                    <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                        <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap flex flex-row gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap flex flex-row gap-2']); ?>
                                            <span
                                                class="inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                1 dni
                                            </span>
                                            <?php if (isset($component)) { $__componentOriginalb4839d8cd490d490ca8cf1d098fa7e2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4839d8cd490d490ca8cf1d098fa7e2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-orange','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                1 robocze
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4839d8cd490d490ca8cf1d098fa7e2f)): ?>
<?php $attributes = $__attributesOriginalb4839d8cd490d490ca8cf1d098fa7e2f; ?>
<?php unset($__attributesOriginalb4839d8cd490d490ca8cf1d098fa7e2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4839d8cd490d490ca8cf1d098fa7e2f)): ?>
<?php $component = $__componentOriginalb4839d8cd490d490ca8cf1d098fa7e2f; ?>
<?php unset($__componentOriginalb4839d8cd490d490ca8cf1d098fa7e2f); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                0 wolne
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $attributes = $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $component = $__componentOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap font-semibold w-fit text-start relative']); ?>
                                            urlop wypoczynkowy
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                    </div>
                                </div>
                                <div
                                    class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                </div>
                                <div class="flex space-x-4">
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap flex flex-row gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap flex flex-row gap-2']); ?>
                                        <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Zrealizowano
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                    <label class="inline-flex items-center md:justify-center">
                                        <input type="checkbox" class="sr-only peer toggle-status sync-toggle"
                                            name="leave_status" data-leave-id="" id="leave-demo-toggle">
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                    peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                    peer-checked:after:border-white
                    after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                    after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                    peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer">
                                        </div>
                                    </label>
                                </div>
                                <script>
                                    $(document).ready(function () {

                                        const toggle = $('#leave-demo-toggle');

                                        let usedDays = 0;
                                        let remainingDays = 28;

                                        toggle.on('change', function () {

                                            if ($(this).is(':checked')) {

                                                // Akceptacja / realizacja urlopu
                                                usedDays++;
                                                remainingDays--;

                                            } else {

                                                // Cofnięcie
                                                usedDays--;
                                                remainingDays++;
                                            }

                                            animateNumber('#used-days', usedDays, 'Wykorzystano: ');
                                            animateNumber('#remaining-days', remainingDays, 'w <?php echo e(now()->year); ?> pozostało: ', ' dni');
                                        });


                                        function animateNumber(selector, target, prefix = '', suffix = ' dni') {

                                            const element = $(selector);

                                            const currentText = element.text();

                                            const start = 0;

                                            $({
                                                value: start
                                            }).animate({
                                                value: target
                                            }, {
                                                duration: 500,

                                                easing: 'swing',

                                                step: function () {

                                                    const value = Math.round(this.value);

                                                    element.text(
                                                        prefix + value + suffix
                                                    );
                                                },

                                                complete: function () {

                                                    element.text(
                                                        prefix + target + suffix
                                                    );

                                                    // delikatne podkreślenie zmiany
                                                    element
                                                        .addClass('scale-110')
                                                        .delay(150)
                                                        .queue(function (next) {
                                                            $(this).removeClass('scale-110');
                                                            next();
                                                        });
                                                }
                                            });
                                        }

                                    });
                                </script>
                            </div>
                        </div>
                        <div class="mb-4 flex justify-center items-center">
                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                <i class="fa-solid fa-arrow-down-long text-2xl"></i>
                            </div>
                        </div>
                        <div
                            class="grid md:grid-cols-2 my-4 gap-4 w-full h-full appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <?php
                                $shortcut = 'UW';
                                $icon = '🏖️';
                                $type = 'urlop wypoczynkowy';
                            ?>
                            <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                            <div class="flex flex-col text-end">
                                <span
                                    class="text-xs font-semibold text-gray-900 dark:text-gray-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    Należy Ci się: 26 dni
                                </span>
                                <span
                                    class="text-xs font-semibold text-gray-900 dark:text-gray-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    Pozostało z ubiegłego roku: 2 dni
                                </span>
                                <span id="used-days"
                                    class="text-xs font-semibold text-orange-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    Wykorzystano: 0 dni
                                </span>
                                <span id="remaining-days"
                                    class="text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    w <?php echo e(now()->year); ?> pozostało: 28 dni
                                </span>
                            </div>
                        </div>
                        <div
                            class="mb-4 flex flex-col gap-4 w-full h-full appearance-none rounded-r-lg shadow border-l-4 border-green-300 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <p class="font-bold">Kluczowy scenariusz</p>
                            <p>Pracownik składa wniosek o 3 dni urlopu → przełożony go akceptuje → WIBEST automatycznie
                                zmniejsza pozostały limit urlopowy. Wszystko dzieje się od razu, bez dodatkowych działań
                                po stronie administracji.</p>
                        </div>
                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    23 różnych typów nieobecności
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Rodzaje wniosków
                                </h3>
                            </div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Jeden moduł do obsługi najważniejszych spraw pracowników. WIBEST pozwala obsługiwać aż 23
                            rodzajów wniosków, dzięki czemu nie musisz tworzyć osobnych formularzy, prowadzić
                            dodatkowych arkuszy ani szukać informacji w wiadomościach.
                        </p>
                        <div class="mb-4" id="leave-requests">
                            <div class="relative">

                                <ul class="grid w-full gap-4 lg:grid-cols-2">

                                    <!--[if BLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-prace-w-swieto"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🕊️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne za pracę w święto
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WPS
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="zwolnienie-lekarskie"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🤒
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        zwolnienie lekarskie
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        ZL
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li class="lg:col-span-2">
                                        <label for="urlop-wypoczynkowy"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🏖️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop wypoczynkowy
                                                    </p>
                                                    <span
                                                        class="system-font text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal">
                                                        Pozostało: 17 dni
                                                    </span>
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UW
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-nadgodziny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ⏰
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne za nadgodziny
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WN
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🗓️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne za święto w sobotę
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WSS
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    💸
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop bezpłatny
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UB
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🗓️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne z tytułu 5-dniowego tygodnia pracy
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WT5
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🧑‍⚕️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        zwolnienie lekarsie - opieka
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        ZLO
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    📌
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop okolicznościowy
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UO
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    📢
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop wypoczynkowy "na żądanie"
                                                    </p>
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UWZ
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🩸
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        oddanie krwi
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        OK
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🦾
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        świadczenie rehabilitacyjne
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        SR
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🧑‍🍼
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        opieka
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        OP
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    👨‍👩‍👧
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        opieka nad dzieckiem do 14 lat
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        OD14
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    👨‍👧
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop ojcowski
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UOJC
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🤱
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop macieżyński
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UM
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    👶
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop rodzicielski
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UR
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ⚖️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        świadek w sądzie
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        SWS
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    💻
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        praca zdalna
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        PZ
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🦠
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        kwarantanna
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        KW
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🏠
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        kwarantanna z pracą zdalną
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        KWZPZ
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ✈️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        Delegacja
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        DEL
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ⚡
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        siła wyższa
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        SW
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </div>
                        </div>

                        <div
                            class="flex items-start justify-between gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- TELEFON -->
                            <div class="flex justify-center lg:justify-start overflow-hidden h-[320px] lg:h-[480px]">

                                <div class="relative scale-[0.9] lg:scale-[1.0] mx-auto -translate-y-64">

                                    <!-- PHONE -->
                                    <div
                                        class="relative mx-auto border-[14px] border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 rounded-[2.8rem] h-[620px] w-[310px]">

                                        <!-- BUTTONS -->
                                        <div
                                            class="h-[34px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[78px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[132px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[190px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[68px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -right-[17px] top-[148px] rounded-e-lg">
                                        </div>

                                        <!-- SCREEN -->
                                        <div
                                            class="rounded-[2.1rem] overflow-hidden w-[282px] h-[592px] bg-gray-50 dark:bg-gray-950 flex flex-col relative">

                                            <!-- NOTCH -->
                                            <div
                                                class="absolute top-0 left-1/2 -translate-x-1/2 w-[145px] h-[30px] bg-gray-800 rounded-b-3xl z-10">
                                            </div>

                                            <!-- HEADER -->
                                            <div
                                                class="pt-8 px-4 pb-3 border-b border-gray-200 dark:border-gray-800 text-center text-sm font-bold tracking-wide text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-950">
                                                WIBEST
                                            </div>

                                            <!-- CHAT -->
                                            <div class="flex-1 flex flex-col justify-end p-4 space-y-4">
                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-pink-700 dark:text-pink-300">
                                                        Odrzucono wniosek
                                                    </div>

                                                    <div class="mt-2 text-gray-700 dark:text-gray-300">
                                                        Zwolnienie lekarskie
                                                        <span class="block font-semibold text-gray-900 dark:text-white">
                                                            Karol Wiśniewski
                                                        </span>

                                                        <span class="text-xs">
                                                            28.01.2026 – 29.01.2026
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>
                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-pink-700 dark:text-pink-300">
                                                        Zaakceptowano wniosek
                                                    </div>

                                                    <div class="mt-2 text-gray-700 dark:text-gray-300">
                                                        Zwolnienie lekarskie
                                                        <span class="block font-semibold text-gray-900 dark:text-white">
                                                            Karol Wiśniewski
                                                        </span>

                                                        <span class="text-xs">
                                                            28.01.2026 – 29.01.2026
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>

                                            </div>

                                            <!-- INPUT -->
                                            <div
                                                class="p-4 border-t border-gray-200 dark:border-gray-800 flex items-center gap-2 bg-white dark:bg-gray-950">

                                                <div
                                                    class="flex-1 bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-full h-10">
                                                </div>

                                                <div
                                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-500/20 border border-gray-200 dark:border-gray-500/20 rounded-full flex items-center justify-center text-gray-700 dark:text-gray-300">
                                                    →
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            powiadomienia
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            SMS
                                        </h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Nie musisz regularnie sprawdzać panelu, żeby wiedzieć, że pracownik złożył wniosek.
                                    WIBEST może automatycznie wysłać SMS do osoby odpowiedzialnej za jego rozpatrzenie,
                                    dzięki czemu nowa sprawa nie ginie wśród innych zadań.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Po rozpatrzeniu wniosku pracownik może otrzymać powiadomienie SMS z informacją o
                                    jego decyzji. Dzięki temu nie musi logować się do systemu i sprawdzać statusu —
                                    informacja o akceptacji lub odrzuceniu trafia do niego automatycznie.
                                </p>
                            </div>
                        </div>

                    </section>

                    <!-- 3 PLANOWANIE -->
                    <section id="planowanie"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Planowanie / Grafik pracy
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-blue-200 to-violet-100 dark:from-blue-500/20 dark:to-violet-500/10 text-blue-300 dark:text-blue-300">
                                <i class="fa-solid fa-calendar-days text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Nie każda firma pracuje według jednego schematu. WIBEST pozwala dopasować planowanie czasu
                            pracy do rzeczywistych godzin pracy pracowników — od prostych, stałych godzin po
                            indywidualne grafiki zmienne. Dzięki temu pracownik i przełożony zawsze wiedzą, kiedy
                            zaplanowana jest praca.
                        </p>

                        <div class="grid md:grid-cols-2 gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            Powtarzający się grafik pracy
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            Stały
                                        </h3>
                                    </div>
                                </div>
                                <div
                                    class="w-fit mb-4 bg-transparent sm:bg-gray-50 dark:bg-gray-800 sm:border border-gray-100 dark:border-gray-700 rounded-xl sm:p-4 sm:shadow animate-float delay-200">
                                    <div
                                        class="font-bold grid grid-cols-7 gap-1 text-xs text-gray-700 dark:text-gray-300 text-center text-xs uppercase">
                                        <span class="system-font">Pon</span>
                                        <span class="system-font">Wt</span>
                                        <span class="system-font">Śr</span>
                                        <span class="system-font">Czw</span>
                                        <span class="system-font">Pt</span>
                                        <span class="system-font">Sob</span>
                                        <span class="system-font">Ndz</span>
                                    </div>
                                    <div class="grid grid-cols-7 gap-1 mt-2">
                                        <div class="p-0 col-span-5">
                                            <div
                                                class="w-[190px] h-[68px] flex flex-col items-center justify-center text-center w-full bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-1 transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🏢
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        STA
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Ustal stałe godziny pracy dla pracownika, zespołu lub całej firmy. Przykładowo: od
                                    poniedziałku do piątku, 8:00–16:00. Raz ustawiony plan pozwala automatycznie
                                    określić zaplanowany czas pracy bez ręcznego wprowadzania godzin każdego dnia.
                                </p>
                            </div>
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            Grafik pracy na każdy dzień oddzielnie
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            Zmienny
                                        </h3>
                                    </div>
                                </div>
                                <div
                                    class="w-fit mb-4 bg-transparent sm:bg-gray-50 dark:bg-gray-800 sm:border border-gray-100 dark:border-gray-700 rounded-xl sm:p-4 sm:shadow animate-float delay-200">
                                    <div
                                        class="font-bold grid grid-cols-7 gap-1 text-xs text-gray-700 dark:text-gray-300 text-center text-xs uppercase">
                                        <span class="system-font">Pon</span>
                                        <span class="system-font">Wt</span>
                                        <span class="system-font">Śr</span>
                                        <span class="system-font">Czw</span>
                                        <span class="system-font">Pt</span>
                                        <span class="system-font">Sob</span>
                                        <span class="system-font">Ndz</span>
                                    </div>
                                    <div class="grid grid-cols-7 gap-1 mt-2">
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-300 dark:bg-violet-400 hover:bg-violet-400 dark:hover:bg-violet-500">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌀
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-300 dark:bg-violet-400 hover:bg-violet-400 dark:hover:bg-violet-500">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌀
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 bg-transparent transition-colors duration-200">

                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌙
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌙
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Zaplanuj inne godziny na poszczególne dni, gdy praca nie odbywa się według jednego
                                    schematu. Przykładowy grafik może wyglądać tak: poniedziałek 5:00–15:00, wtorek
                                    5:00–15:00, czwartek 14:00–24:00, piątek 14:00–24:00. WIBEST uwzględnia zaplanowane
                                    godziny przy ewidencji czasu pracy, dzięki czemu łatwiej kontrolować realizację
                                    grafiku.
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- 4 RAPORTY -->
                    <section id="raporty"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Raporty
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-gray-200 to-gray-100 dark:from-gray-500/20 dark:to-gray-500/10 text-gray-300 dark:text-gray-300">
                                <i class="fa-solid fa-chart-line text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            WIBEST automatycznie łączy zaplanowany czas pracy, rzeczywiste zdarzenia RCP oraz informacje
                            o wnioskach. Dzięki temu w jednym raporcie możesz szybko sprawdzić, ile pracownik powinien
                            pracować, ile faktycznie przepracował i czy pojawiły się nadgodziny lub braki w realizacji
                            normy.
                        </p>

                        <!-- SINGLE CARD -->
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">

                            <!-- TOP BAR -->
                            <div
                                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 lg:p-8 border-b border-gray-200 dark:border-gray-700">

                                <div>
                                    <h1
                                        class="system-font text-2xl font-medium text-gray-900 dark:text-gray-50 tracking-widest">
                                        <span>🕜</span> Ewidencja czasu pracy
                                    </h1>
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150 mt-4">
                                        01.12.2025 – 07.12.2025
                                    </span>
                                </div>
                                <!--
                                <div class="flex gap-4">
                                    <button type="button"
                                        class="system-font text-xs min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-download mr-2"></i>Pobierz
                                    </button>
                                </div>
-->
                            </div>

                            <!-- TABLE -->
                            <div class="overflow-x-auto m-4 lg:m-8 rounded-lg relative">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Data</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Zaplanowany czas
                                                pracy</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Zdarzenia</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Wnioski + Czas
                                                Pracy</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Nadgodziny</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Brak normy</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Wnioski</th>
                                        </tr>
                                    </thead>

                                    <tbody
                                        class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        01.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08:13 – 16:45
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 32min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        32min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        02.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08:03 – 15:58
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        07h 55min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        5min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        03.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        07:51 – 16:09
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        04.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        05.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        06.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        07.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="pointer-events-none absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-gray-50 dark:from-gray-800/70 to-transparent">
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mt-4 leading-7">
                            Nie musisz samodzielnie porównywać godzin i szukać różnic. WIBEST pokazuje najważniejsze
                            informacje obok siebie, dzięki czemu łatwo wychwycić nadgodziny, brak realizacji normy czy
                            dni, w których pojawiły się dodatkowe wnioski. </p>
                        <div class="w-full pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        </div>
                        <!-- SINGLE CARD -->
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">

                            <!-- TOP BAR -->
                            <div
                                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 lg:p-8 border-b border-gray-200 dark:border-gray-700">

                                <div>
                                    <h1
                                        class="system-font text-2xl font-medium text-gray-900 dark:text-gray-50 tracking-widest">
                                        <span>🙋🏻‍♂️</span> Lista Obecności
                                    </h1>
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150 mt-4">
                                        01.12.2025 – 07.12.2025
                                    </span>
                                </div>
                                <!--
                                <div class="flex gap-4">
                                    <button type="button"
                                        class="system-font text-xs min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-download mr-2"></i>Pobierz
                                    </button>
                                </div>
-->
                            </div>

                            <!-- TABLE -->
                            <div class="overflow-x-auto m-4 lg:m-8 rounded-lg relative">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Imię i nazwisko
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    01.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    02.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    03.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    04.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    05.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    06.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    07.12.2025
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody
                                        class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Anna Kowalska
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Jan Nowak
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        UW
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        UW
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Piotr Wójcik
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        PZ
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        PZ
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        PZ
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Mateusz Olszewski
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Lucyna Nowakowska
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Marek Dąbrowski
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Arkadiusz Zięba
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Robert Rutkowski
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="pointer-events-none absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-gray-50 dark:from-gray-800/70 to-transparent">
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mt-4 leading-7">
                            WIBEST automatycznie porządkuje informacje o obecności pracowników, pokazując w każdym dniu
                            odpowiednie oznaczenie np. RCP dla zarejestrowanego czasu pracy lub początek typu wniosku
                            zaakceptowanego, Dzięki temu cała
                            lista obecności jest czytelna i dostępna w jednym miejscu.
                        </p>

                    </section>

<style>#obiekty .wibest-object-marker {
    position: absolute;
    width: 36px;
    height: 36px;
    padding: 0;
    border: 0;
    background: transparent;
    transform: translate(-50%, -50%);
    cursor: pointer;
    border-radius: 50%;
}
#obiekty .wibest-object-marker::after, #obiekty .wibest-object-marker-active::before {
    content: '';
    position: absolute;
    inset: 8px;
    border-radius: 50%;
    background: var(--object-marker-color);
    border: 2px solid #fff;
    box-shadow: 0 1px 5px #0006;
}
#obiekty .wibest-object-marker-active::before {
    animation: wibest-object-marker-pulse 2.4s ease-out infinite;
    border: 0;
    box-shadow: none;
}
#obiekty .wibest-object-marker:focus-visible { outline: 3px solid #166534; outline-offset: 3px; }
@keyframes wibest-object-marker-pulse {
    0% { transform: scale(1); opacity: .5; }
    100% { transform: scale(2.2); opacity: 0; }
}
@media (prefers-reduced-motion: reduce) {
    #obiekty .wibest-object-marker-active::before { animation: none; opacity: .25; transform: scale(1.5); }
}
#obiekty .wibest-object-popup { max-width: 260px; color: #111827; text-align: left; padding: 4px; }
#obiekty .wibest-object-popup strong { font-size: 14px; }
#obiekty .wibest-object-popup p { margin: 8px 0 12px; color: #4b5563; }
#obiekty .wibest-object-popup a { display: inline-block; padding: 9px 12px; border-radius: 8px; background: #166534; color: #fff; font-weight: 600; }
</style><script>
(() => {
const statusColors = {
    active: '#86efac', paused: '#facc15', completed: '#6b7280',
    planned: '#93c5fd', cancelled: '#fca5a5',
};

function validPosition(object) {
    const numeric = value => value !== null && value !== undefined && String(value).trim() !== '' && Number.isFinite(Number(value));
    return numeric(object.lat) && numeric(object.lng)
        && Math.abs(Number(object.lat)) <= 90 && Math.abs(Number(object.lng)) <= 180;
}

function loadObjectGoogleMaps(apiKey) {
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

function groupReadings(readings) {
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

function objectMaps({ objects, apiKey, readings = [] }) {
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

window.functionObjectMap = options => {
 const allReadings = options.readings;
 const component = objectMaps(options);
 const init = component.init;
 component.init = function () {
   init.call(this);
   this.employeeListener = event => this.updateReadings(event.detail ? allReadings.filter(reading => reading.employee === event.detail) : allReadings);
   window.addEventListener('function-demo-employee', this.employeeListener);
 };
 const destroy = component.destroy;
 component.destroy = function () { window.removeEventListener('function-demo-employee', this.employeeListener); destroy.call(this); };
 return component;
};
})();
</script>
                    <!-- 5 OBIEKTY -->
                    <section id="obiekty" aria-labelledby="obiekty-title"
                        class="doc-section min-w-0 appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <div class="flex items-start justify-between gap-4 mb-8">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">Moduł</p>
                                <h3 id="obiekty-title" class="text-3xl font-black text-gray-900 dark:text-white leading-tight">Obiekty</h3>
                            </div>
                            <div class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-cube text-2xl" aria-hidden="true"></i>
                            </div>
                        </div>

                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Wiesz, kto, gdzie i jak długo pracował.</h4>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Sprawdź czas pracy w kontekście konkretnej budowy, placówki lub realizacji.
                            Wybierz miesiąc, zobacz przypisanych pracowników i czas zakwalifikowany do obiektu.
                            Właściciel zyskuje obraz zaangażowania zespołu, kierownik może sprawdzić rejestracje,
                            a kadry łatwiej odnajdą dane wymagające wyjaśnienia przed rozliczeniem.
                        </p>

                        <figure class="min-w-0 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">
                            <figcaption class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-4 lg:p-6 border-b border-gray-200 dark:border-gray-700">
                                <span class="system-font text-sm font-semibold text-gray-900 dark:text-gray-50">Podgląd obiektu</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Przykładowe dane · uproszczony widok modułu</span>
                            </figcaption>
                            <div class="min-w-0 p-4 lg:p-6 space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                                    <div class="flex min-w-0 items-center gap-3">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300">
                                            <i class="fa-solid fa-cube text-lg" aria-hidden="true"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="system-font text-lg font-semibold text-gray-900 dark:text-white break-words">Budowa</p>
                                            <span class="inline-flex rounded-lg bg-green-100 px-2 py-1 text-xs font-semibold text-green-800 dark:bg-green-300/10 dark:text-green-300">Aktywny</span>
                                        </div>
                                    </div>
                                    <div class="self-start rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm font-semibold text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                                        <i class="fa-regular fa-calendar mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true"></i>Listopad 2026
                                    </div>
                                </div>

<div class="my-4 grid grid-cols-1 gap-4 sm:grid-cols-2">        <div class="group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex">
                    <i class="fa-solid fa-clock text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">Czas na obiekcie</p>
                    <p class="relative mt-2 text-3xl font-bold text-gray-900 dark:text-white">152:00:00</p>
                    <p class="relative mt-4 text-xs text-gray-600 dark:text-gray-300">19 sesji</p>
                </div>
            </div>
        </div>
        <div class="group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-yellow-200 to-amber-100 text-yellow-800 dark:from-yellow-500/20 dark:to-amber-500/10 dark:text-yellow-300 flex">
                    <i class="fa-solid fa-triangle-exclamation text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">Wymaga uwagi</p>
                    <p class="relative mt-2 text-3xl font-bold text-gray-900 dark:text-white">1</p>
                    <p class="relative mt-4 text-xs text-gray-600 dark:text-gray-300">Sesje bez jednoznacznego przypisania ? 11.2026</p>
                </div>
            </div>
        </div>
</div>
<div class="my-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-100/50 to-emerald-100/30 text-green-700 dark:from-green-500/10 dark:to-emerald-500/5 dark:text-green-300 flex">
                    <i class="fa-solid fa-clock text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">Brak normy</p>
                    <p class="relative mt-2 text-3xl font-bold text-gray-900 dark:text-white">06:00:00</p>
                    <p class="relative mt-4 text-xs text-gray-600 dark:text-gray-300">1 sesja</p>
                </div>
            </div>
        </div>
        <div class="group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex">
                    <i class="fa-solid fa-clock text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">Norma</p>
                    <p class="relative mt-2 text-3xl font-bold text-gray-900 dark:text-white">128:00:00</p>
                    <p class="relative mt-4 text-xs text-gray-600 dark:text-gray-300">16 sesji</p>
                </div>
            </div>
        </div>
        <div class="group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-indigo-200 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-500/10 dark:text-indigo-300 flex">
                    <i class="fa-solid fa-clock text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">Nadgodziny</p>
                    <p class="relative mt-2 text-3xl font-bold text-gray-900 dark:text-white">18:00:00</p>
                    <p class="relative mt-4 text-xs text-gray-600 dark:text-gray-300">2 sesje</p>
                </div>
            </div>
        </div>
</div>
                                <p class="text-xs leading-5 text-gray-500 dark:text-gray-400">
                                    Kafelki pokazują czas sesji według klasyfikacji całego dnia pracownika.
                                    „Nadgodziny” to czas sesji z dni z nadgodzinami, a nie sama liczba godzin ponad normę.
                                </p>

<div class="grid min-w-0 grid-cols-1 items-stretch gap-4 lg:grid-cols-2">                <section data-object-location class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                        <div class="flex items-center gap-3">

                            <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-location-dot text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>

                            <div>
                                <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                    Lokalizacja obiektu
                                </h2>

                                <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                    Adres i położenie obiektu
                                </p>
                            </div>

                        </div>

                    </div>


<div x-data="functionObjectMap({ objects: [{name: 'Budowa', address: 'Lokalizacja demonstracyjna', lat: 52.2297, lng: 21.0122, radius: 100, status: 'active', url: '#obiekty'}], apiKey: <?php echo e(Illuminate\Support\Js::from(config('services.google.maps_key'))); ?>, readings: [
{lat:52.2296,lng:21.0120,type:'START',employee:'Piotr Zieliński',object:'Budowa',time:'03.11.2026 07:00'},
{lat:52.2297,lng:21.0121,type:'STOP',employee:'Piotr Zieliński',object:'Budowa',time:'03.11.2026 15:00'},
{lat:52.2299,lng:21.0124,type:'START',employee:'Jan Kowalski',object:'Budowa',time:'03.11.2026 07:00'},
{lat:52.2298,lng:21.0125,type:'STOP',employee:'Jan Kowalski',object:'Budowa',time:'03.11.2026 15:00'},
{lat:52.2294,lng:21.0118,type:'START',employee:'Anna Nowak',object:'Budowa',time:'03.11.2026 07:00'},
{lat:52.2295,lng:21.0119,type:'STOP',employee:'Anna Nowak',object:'Budowa',time:'03.11.2026 15:00'},
{lat:52.2308,lng:21.0128,type:'START',employee:'Jan Kowalski',object:'Budowa',time:'04.11.2026 07:00'},
{lat:52.2286,lng:21.0116,type:'STOP',employee:'Anna Nowak',object:'Budowa',time:'04.11.2026 15:00'}] })">                            <div class="relative h-[360px] bg-gray-100 dark:bg-gray-700" >

                                <div x-ref="cardMap" class="h-full w-full" wire:ignore aria-label="Lokalizacja obiektu na mapie Google"></div>
                                <div x-show="message" role="status" aria-live="polite" class="absolute inset-0 flex items-center justify-center bg-white/95 p-5 text-center text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-200"><p x-text="message">Ładowanie mapy…</p></div>
                            </div>

                        </div>

                    <div class="flex flex-wrap gap-4 px-5 pt-3 text-xs text-gray-600 dark:text-gray-300"><span>🟢 START</span><span>🔴 STOP</span><span>Przykładowe odczyty START i STOP. Punkty poza zielonym obszarem wymagają weryfikacji.</span></div>
                    <div class="p-5 text-start">
                        <div class="rounded-xl bg-gray-50 text-sm text-gray-500 dark:bg-gray-700 dark:text-gray-400 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:text-gray-600">
                            <div class="break-words font-medium [overflow-wrap:anywhere]">Budowa · lokalizacja demonstracyjna · promień 100 m</div>
                        </div>
                    </div>
                </section>

<section class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300" x-data="{ employeeSearch: '', reportLoading: false, selectedEmployeeId: null, selectEmployee(name) { this.selectedEmployeeId = this.selectedEmployeeId === name ? null : name; window.dispatchEvent(new CustomEvent('function-demo-employee', { detail: this.selectedEmployeeId })); }, clearEmployeeSearch() { this.employeeSearch = ''; }, hasMatchingEmployees() { return ['jan kowalski','anna nowak','piotr zieliński'].some(name => name.includes(this.employeeSearch.toLowerCase())); } }">                    <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">
                        <div class="flex min-w-0 items-center gap-3">
                        <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-users text-lg sm:text-2xl" aria-hidden="true"></i>
                        </div>

                        <div>
                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                Pracownicy
                            </h2>

                            <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                Osoby pracujące na tym obiekcie
                            </p>
                        </div>

                        </div>
                        <div class="relative w-full shrink-0 sm:w-56">
                            <label for="demo-worker-search" class="sr-only">Szukaj pracownika po imieniu i nazwisku</label>
                            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
                            <input id="demo-worker-search" data-employee-search type="search" x-model="employeeSearch" @keydown.escape.stop.prevent="clearEmployeeSearch()" maxlength="255" placeholder="Szukaj pracownika..." aria-label="Szukaj pracownika" aria-controls="demo-object-workers"
                                class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50 [&::-webkit-search-cancel-button]:appearance-none">
                            <button type="button" x-show="employeeSearch.length > 0" x-cloak @click.stop="clearEmployeeSearch()" aria-label="Wyczyść wyszukiwanie pracowników" title="Wyczyść wyszukiwanie" class="absolute right-1 top-1/2 flex h-7 w-7 -translate-y-1/2 items-center justify-center rounded-md text-gray-500 transition-all duration-200 hover:bg-gray-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-300 dark:hover:bg-gray-500 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-xmark text-xs" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="relative overflow-hidden" :aria-busy="reportLoading">
                        <div :class="reportLoading ? 'invisible' : ''" :inert="reportLoading">
<div id="demo-object-workers" class="max-h-[330px] divide-y divide-gray-200 overflow-y-auto pr-1 dark:divide-gray-600">
                            <div role="button" tabindex="0"
                                @click="selectEmployee('Jan Kowalski')" @keydown.enter.prevent="selectEmployee('Jan Kowalski')" @keydown.space.prevent="selectEmployee('Jan Kowalski')"
                                :aria-pressed="selectedEmployeeId === 'Jan Kowalski'"
                                :class="selectedEmployeeId === 'Jan Kowalski' ? 'rounded-xl bg-green-300/20 ring-1 ring-inset ring-green-300' : 'hover:rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600'"
                                x-show="'jan kowalski'.includes(employeeSearch.toLowerCase())"
                                class="flex cursor-pointer items-center gap-2 px-3 py-3 transition-all duration-200 focus-visible:rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300">
                                <div class="min-w-0 flex-1 text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                    <img src="https://ui-avatars.com/api/?name=J+K&amp;color=7F9CF5&amp;background=EBF4FF" alt="Jan Kowalski" class="flex-shrink-0 w-10 h-10 rounded-full">
                                    <div class="flex min-w-0 flex-wrap items-center gap-2 text-start text-xs">
                                        <span class="inline-flex items-center break-words text-gray-900 dark:text-gray-50 font-semibold uppercase tracking-widest transition ease-in-out duration-150">Jan Kowalski</span>
                                        <div class="flex items-center gap-2 text-start">
                                            <span class="px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">Admin</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 flex items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300"><i class="fa-solid fa-clock" aria-hidden="true"></i>80h</div>
                            </div>
                            <div role="button" tabindex="0"
                                @click="selectEmployee('Anna Nowak')" @keydown.enter.prevent="selectEmployee('Anna Nowak')" @keydown.space.prevent="selectEmployee('Anna Nowak')"
                                :aria-pressed="selectedEmployeeId === 'Anna Nowak'"
                                :class="selectedEmployeeId === 'Anna Nowak' ? 'rounded-xl bg-green-300/20 ring-1 ring-inset ring-green-300' : 'hover:rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600'"
                                x-show="'anna nowak'.includes(employeeSearch.toLowerCase())"
                                class="flex cursor-pointer items-center gap-2 px-3 py-3 transition-all duration-200 focus-visible:rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300">
                                <div class="min-w-0 flex-1 text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                    <img src="https://ui-avatars.com/api/?name=A+N&amp;color=7F9CF5&amp;background=EBF4FF" alt="Anna Nowak" class="flex-shrink-0 w-10 h-10 rounded-full">
                                    <div class="flex min-w-0 flex-wrap items-center gap-2 text-start text-xs">
                                        <span class="inline-flex items-center break-words text-gray-900 dark:text-gray-50 font-semibold uppercase tracking-widest transition ease-in-out duration-150">Anna Nowak</span>
                                        <div class="flex items-center gap-2 text-start">
                                            <span class="px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-yellow-300 dark:bg-yellow-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">Kierownik</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 flex items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300"><i class="fa-solid fa-clock" aria-hidden="true"></i>72h</div>
                            </div>
                            <div role="button" tabindex="0"
                                @click="selectEmployee('Piotr Zieliński')" @keydown.enter.prevent="selectEmployee('Piotr Zieliński')" @keydown.space.prevent="selectEmployee('Piotr Zieliński')"
                                :aria-pressed="selectedEmployeeId === 'Piotr Zieliński'"
                                :class="selectedEmployeeId === 'Piotr Zieliński' ? 'rounded-xl bg-green-300/20 ring-1 ring-inset ring-green-300' : 'hover:rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600'"
                                x-show="'piotr zieliński'.includes(employeeSearch.toLowerCase())"
                                class="flex cursor-pointer items-center gap-2 px-3 py-3 transition-all duration-200 focus-visible:rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300">
                                <div class="min-w-0 flex-1 text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                    <img src="https://ui-avatars.com/api/?name=P+Z&amp;color=7F9CF5&amp;background=EBF4FF" alt="Piotr Zieliński" class="flex-shrink-0 w-10 h-10 rounded-full">
                                    <div class="flex min-w-0 flex-wrap items-center gap-2 text-start text-xs">
                                        <span class="inline-flex items-center break-words text-gray-900 dark:text-gray-50 font-semibold uppercase tracking-widest transition ease-in-out duration-150">Piotr Zieliński</span>
                                        <div class="flex items-center gap-2 text-start">
                                            <span class="px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-gray-300 dark:bg-gray-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">Użytkownik</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 flex items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300"><i class="fa-solid fa-clock" aria-hidden="true"></i>24h</div>
                            </div>
</div>
                        <p x-show="employeeSearch.trim().length > 0 && !hasMatchingEmployees()" x-cloak role="status" aria-live="polite" class="py-6 text-center text-sm text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Nie znaleziono pracowników</p>
                        </div>

                        </div>
                        <div class="mt-4 flex min-h-8 flex-wrap items-center justify-between gap-3 border-t border-gray-200 pt-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                <span>Pracownicy przypisani</span>
                                <span class="font-semibold text-green-800 dark:text-green-300">3</span>
                            </div>
                            <button type="button" x-show="selectedEmployeeId !== null" x-cloak @click="selectEmployee(null)" class="ml-auto rounded-lg px-2 py-1 text-xs font-medium text-green-800 transition-all duration-200 hover:bg-green-300/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-green-300">Wyczyść filtry</button>
                        </div>
                    </div>
</section></div>
<section class="min-w-0 overflow-hidden rounded-2xl bg-gray-100 shadow-sm dark:bg-gray-700 my-4" x-data="{ employee: null, category: 'all' }" @function-demo-employee.window="employee = $event.detail; category = 'all'">
<div class="flex items-center gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600"><div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300"><i class="fa-solid fa-clock" aria-hidden="true"></i></div><div><h4 class="text-sm font-semibold text-gray-900 dark:text-white">Czas pracy na obiekcie</h4><p class="text-xs text-gray-600 dark:text-gray-300">Przykładowe sesje czasu pracy · 11.2026</p></div></div>
<div class="flex flex-wrap gap-2 border-b border-gray-200 px-5 py-3 dark:border-gray-600">
<button type="button" @click="category = 'all'" :aria-pressed="category === 'all'" :class="category === 'all' ? 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' : 'text-gray-600 dark:text-gray-300'" class="rounded-lg px-3 py-1.5 text-xs font-medium transition">Wszystkie</button><button type="button" @click="category = 'normal'" :aria-pressed="category === 'normal'" :class="category === 'normal' ? 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' : 'text-gray-600 dark:text-gray-300'" class="rounded-lg px-3 py-1.5 text-xs font-medium transition">Norma</button><button type="button" @click="category = 'overtime'" :aria-pressed="category === 'overtime'" :class="category === 'overtime' ? 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' : 'text-gray-600 dark:text-gray-300'" class="rounded-lg px-3 py-1.5 text-xs font-medium transition">Nadgodziny</button><button type="button" @click="category = 'attention'" :aria-pressed="category === 'attention'" :class="category === 'attention' ? 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' : 'text-gray-600 dark:text-gray-300'" class="rounded-lg px-3 py-1.5 text-xs font-medium transition">Wymaga uwagi</button></div><?php
    $demoObjectRows = collect([
        ['Jan Kowalski', '03', '15:00', '08:00:00', 'normal'],
        ['Anna Nowak', '03', '15:00', '08:00:00', 'normal'],
        ['Piotr Zieliński', '03', '15:00', '08:00:00', 'normal'],
        ['Jan Kowalski', '04', '16:00', '09:00:00', 'attention'],
        ['Anna Nowak', '04', '16:00', '09:00:00', 'attention'],
        ['Piotr Zieliński', '05', '16:00', '09:00:00', 'overtime'],
    ])->map(function ($demo) {
        return (object) [
            'employee' => $demo[0],
            'user' => (object) ['name' => $demo[0], 'role' => match ($demo[0]) { 'Jan Kowalski' => 'admin', 'Anna Nowak' => 'kierownik', default => 'użytkownik' }, 'profile_photo_url' => 'https://ui-avatars.com/api/?name='.urlencode($demo[0]).'&color=7F9CF5&background=EBF4FF'],
            'status' => 'Praca zakończona', 'start_time' => '2026-11-'.$demo[1].' 07:00:00',
            'stop_time' => '2026-11-'.$demo[1].' '.$demo[2].':00', 'time_in_work' => $demo[3],
            'category' => $demo[4] === 'attention' ? null : $demo[4],
            'reason' => $demo[4] === 'attention' ? \App\Services\Objects\AttentionReason::OutsideObjects : null,
            'object' => (object) ['name' => 'Budowa', 'object_type' => null],
            'start_lat' => 52.2297, 'start_lng' => 21.0122, 'stop_lat' => 52.2298, 'stop_lng' => 21.0123,
            'missing_task' => false, 'day_difference' => $demo[4] === 'overtime' ? 3600 : 0, 'planned' => 28800,
        ];
    });
?>
<ul data-object-mobile-work class="block space-y-3 p-3 md:hidden">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $demoObjectRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $start = $row->start_time ? \Carbon\Carbon::parse($row->start_time) : null;
            $stop = $row->stop_time ? \Carbon\Carbon::parse($row->stop_time) : null;
            $night = $start && $stop && !$start->isSameDay($stop);
            $category = ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$row->category] ?? 'Wymaga uwagi';
            $tone = match($row->category) {
                'under' => $night ? 'bg-green-400/20 text-green-800 dark:text-green-400' : 'bg-green-300/20 text-green-800 dark:text-green-300',
                'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
                'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
                default => 'bg-yellow-300 text-yellow-950',
            };
        ?>
        <li x-show="(!employee || employee === <?php echo e(Illuminate\Support\Js::from($row->employee)); ?>) &amp;&amp; (category === 'all' || category === '<?php echo e($row->reason ? 'attention' : $row->category); ?>')">
        <a href="#obiekty" @click.prevent class="group cursor-pointer text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 transition-colors duration-200 h-full block w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">
        <div class="flex min-w-0 w-full flex-col items-start gap-3 text-xs leading-relaxed">
            <div class="flex w-full items-start justify-between gap-3">
                <div class="flex min-w-0 flex-1 flex-col items-start gap-2 [&>*]:m-0">
                <?php if (isset($component)) { $__componentOriginal497d29355870bef565966edfd07bde02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal497d29355870bef565966edfd07bde02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.work-session-status','data' => ['workSession' => $row,'class' => 'text-xs !font-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.work-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['work_session' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'class' => 'text-xs !font-medium']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal497d29355870bef565966edfd07bde02)): ?>
<?php $attributes = $__attributesOriginal497d29355870bef565966edfd07bde02; ?>
<?php unset($__attributesOriginal497d29355870bef565966edfd07bde02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal497d29355870bef565966edfd07bde02)): ?>
<?php $component = $__componentOriginal497d29355870bef565966edfd07bde02; ?>
<?php unset($__componentOriginal497d29355870bef565966edfd07bde02); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['class' => 'text-xs !font-medium break-words !text-blue-600 dark:!text-blue-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs !font-medium break-words !text-blue-600 dark:!text-blue-300']); ?><?php echo e($start?->copy()->locale('pl')->translatedFormat('d.m, l') ?? 'Brak START'); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($night): ?> – <?php echo e($stop->copy()->locale('pl')->translatedFormat('d.m, l')); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $attributes = $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $component = $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
                </div>
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-chevron-right text-xs" aria-hidden="true"></i></div>
            </div>
            <div class="flex w-full flex-wrap items-center gap-x-4 gap-y-2">
                <div class="flex flex-col items-center gap-1">
                    <span aria-label="<?php echo e($night ? 'Zmiana przez północ' : 'Sesja dzienna'); ?>"><?php echo e($night ? '🌙' : '⏱️'); ?></span>
                    <span class="rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($tone); ?>">RCP</span>
                </div>
                <div class="flex flex-col items-center gap-1 [&>*]:m-0">
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5']); ?><?php if (isset($component)) { $__componentOriginaldd68647f67a2255116b2ba7be5781704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd68647f67a2255116b2ba7be5781704 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-dark','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-dark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($start?->format('H:i') ?? '—'); ?> - <?php echo e($stop?->format('H:i') ?? '—'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $attributes = $__attributesOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__attributesOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $component = $__componentOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__componentOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs leading-5 font-medium !text-gray-500 dark:!text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs leading-5 font-medium !text-gray-500 dark:!text-gray-300']); ?><?php echo e($row->time_in_work); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                </div>
                <div class="flex items-center gap-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->start_lat !== null && $row->start_lng !== null): ?><?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => ['title' => 'Lokalizacja START']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Lokalizacja START']); ?><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">START</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $attributes = $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $component = $__componentOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->stop_lat !== null && $row->stop_lng !== null): ?><?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => ['title' => 'Lokalizacja STOP']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Lokalizacja STOP']); ?><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">STOP</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $attributes = $__attributesOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__attributesOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $component = $__componentOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__componentOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->missing_task || $row->time_in_work === '24:00:00'): ?><span title="Sesja wymaga sprawdzenia">⚠️</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->reason): ?>
                <div class="w-full border-t border-gray-200 pt-3 text-left dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300"><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($tone); ?>">Wymaga uwagi</span></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->reason): ?>
                <p class="text-xs leading-5 text-gray-600 dark:text-gray-300"><?php echo e($row->reason->label()); ?></p>
            <?php else: ?>
                <div class="flex w-full min-w-0 items-center justify-start gap-2 border-t border-gray-200 pt-3 text-left dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300"><?php if (isset($component)) { $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.type-icon','data' => ['type' => $row->object->object_type,'compact' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.type-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->object->object_type),'compact' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $attributes = $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $component = $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?><span class="break-words text-xs font-semibold leading-5 [overflow-wrap:anywhere]"><?php echo e($row->object->name); ?></span></div>
                <div class="w-full text-left"><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($tone); ?>"><?php echo e($category); ?></span></div>
                <p class="w-full text-left text-xs leading-5 <?php echo e($row->day_difference === null ? 'text-gray-600 dark:text-gray-300' : ($row->day_difference > 0 ? 'text-indigo-700 dark:text-indigo-200' : 'text-green-800 dark:text-green-200')); ?>" title="Bilans całego dnia pracownika">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->day_difference === null): ?> Brak określonej normy
                    <?php elseif($row->day_difference < 0): ?> Brakuje <?php echo e(\App\Services\Objects\ObjectWorkReport::duration(-$row->day_difference)); ?>

                    <?php elseif($row->day_difference > 0): ?> +<?php echo e(\App\Services\Objects\ObjectWorkReport::duration($row->day_difference)); ?> ponad normę
                    <?php else: ?> Norma zrealizowana
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="flex min-w-0 items-center gap-3 border-t border-gray-200 pt-3 font-semibold dark:border-gray-600 w-full [@media(prefers-color-scheme:light)]:border-gray-300">
                <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $row->user,'class' => '!h-8 !w-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->user),'class' => '!h-8 !w-8']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $attributes = $__attributesOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__attributesOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $component = $__componentOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__componentOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
                <div class="min-w-0 text-xs [overflow-wrap:anywhere]">
                    <p class="break-words text-xs leading-5 dark:text-gray-50"><?php echo e($row->user->name); ?></p>
                    <?php if (isset($component)) { $__componentOriginal511f850cac5424cdc86b87752ce184cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511f850cac5424cdc86b87752ce184cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-role','data' => ['user' => $row->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-role'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511f850cac5424cdc86b87752ce184cb)): ?>
<?php $attributes = $__attributesOriginal511f850cac5424cdc86b87752ce184cb; ?>
<?php unset($__attributesOriginal511f850cac5424cdc86b87752ce184cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511f850cac5424cdc86b87752ce184cb)): ?>
<?php $component = $__componentOriginal511f850cac5424cdc86b87752ce184cb; ?>
<?php unset($__componentOriginal511f850cac5424cdc86b87752ce184cb); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
        </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="p-4 text-center text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Brak sesji dla wybranego miesiąca i kategorii.</li>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</ul>
    <div id="work-list-results" class="hidden overflow-x-auto md:block">
        <table class="w-full text-sm text-gray-700 dark:text-gray-200">
            <thead class="border-b border-gray-200 bg-white text-center text-xs font-semibold text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300"><tr>
                <th class="px-5 py-4 text-left">Pracownik</th><th class="px-5 py-4">Status</th><th class="px-5 py-4">Lokalizacja</th><th class="px-5 py-4">Typ</th><th class="px-5 py-4">Godziny / czas</th><th class="px-5 py-4">Data</th><th class="px-5 py-4">Klasyfikacja / obiekt</th>
            </tr></thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $demoObjectRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $start = $row->start_time ? \Carbon\Carbon::parse($row->start_time) : null;
                        $stop = $row->stop_time ? \Carbon\Carbon::parse($row->stop_time) : null;
                        $url = '#obiekty';
                        $night = $start && $stop && !$start->isSameDay($stop);
                        $badgeStyle = match ($row->category) {
                            'under' => $night ? 'bg-green-400/20 text-green-800 dark:bg-green-400/15 dark:text-green-400' : 'bg-green-300/20 text-green-700 dark:bg-green-300/10 dark:text-green-300',
                            'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
                            'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
                            default => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/15 dark:text-yellow-300',
                        };
                        $badgeClass = 'inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium '.$badgeStyle;
                    ?>
                    <tr x-show="(!employee || employee === <?php echo e(Illuminate\Support\Js::from($row->employee)); ?>) &amp;&amp; (category === 'all' || category === '<?php echo e($row->reason ? 'attention' : $row->category); ?>')" class="group snap-center cursor-pointer border-b border-gray-200 bg-white text-center transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-green-600 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">
                        <td class="px-5 py-4"><div class="flex items-center justify-start gap-2 font-semibold text-gray-700 dark:text-gray-100 [&>img]:!h-8 [&>img]:!w-8"><?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $row->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $attributes = $__attributesOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__attributesOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $component = $__componentOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__componentOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?><a href="#obiekty" @click.prevent class="rounded text-left text-xs [&>div]:!text-xs [&_span]:!text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500"><?php if (isset($component)) { $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => $row->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $attributes = $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $component = $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?></a></div></td>
                        <td class="px-5 py-4"><?php if (isset($component)) { $__componentOriginal497d29355870bef565966edfd07bde02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal497d29355870bef565966edfd07bde02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.work-session-status','data' => ['workSession' => $row,'class' => 'text-xs !font-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.work-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['work_session' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'class' => 'text-xs !font-medium']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal497d29355870bef565966edfd07bde02)): ?>
<?php $attributes = $__attributesOriginal497d29355870bef565966edfd07bde02; ?>
<?php unset($__attributesOriginal497d29355870bef565966edfd07bde02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal497d29355870bef565966edfd07bde02)): ?>
<?php $component = $__componentOriginal497d29355870bef565966edfd07bde02; ?>
<?php unset($__componentOriginal497d29355870bef565966edfd07bde02); ?>
<?php endif; ?></td>
                        <td class="px-5 py-4"><div class="flex justify-center gap-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->start_lat !== null && $row->start_lng !== null): ?><?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => ['title' => 'Lokalizacja START']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Lokalizacja START']); ?><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">START</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $attributes = $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $component = $__componentOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->stop_lat !== null && $row->stop_lng !== null): ?><?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => ['title' => 'Lokalizacja STOP']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Lokalizacja STOP']); ?><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">STOP</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $attributes = $__attributesOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__attributesOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $component = $__componentOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__componentOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div></td>
                        <td class="px-5 py-4"><div class="flex flex-col items-center gap-1"><span class="text-lg" aria-label="<?php echo e($night ? 'Zmiana przez północ' : 'Sesja dzienna'); ?>"><?php echo e($night ? '🌙' : '⏱️'); ?></span><span class="<?php echo e($row->reason ? 'inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium bg-yellow-300 text-yellow-950' : $badgeClass); ?>">RCP</span></div></td>
                        <td class="px-5 py-4 font-semibold text-sm">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->status === 'Praca zakończona' && $start && $stop): ?>
                                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-sm whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-sm whitespace-nowrap font-semibold w-fit text-start relative']); ?><?php if (isset($component)) { $__componentOriginaldd68647f67a2255116b2ba7be5781704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd68647f67a2255116b2ba7be5781704 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-dark','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-dark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($start->format('H:i')); ?> - <?php echo e($stop->format('H:i')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $attributes = $__attributesOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__attributesOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $component = $__componentOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__componentOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => '!text-gray-900 dark:!text-gray-50 hover:!text-gray-900 dark:hover:!text-gray-50 text-sm whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!text-gray-900 dark:!text-gray-50 hover:!text-gray-900 dark:hover:!text-gray-50 text-sm whitespace-nowrap font-semibold w-fit text-start relative']); ?><?php echo e($row->time_in_work); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="flex flex-row items-center justify-center text-center gap-1 my-auto">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!(($row->status === 'W trakcie pracy' && $start && !$stop) || ($row->status === 'Praca zakończona' && $start && $stop))): ?><span title="Niekompletna lub nieprawidłowa sesja">❌</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->missing_task): ?><span title="Brak zadania dla nadgodzin">⚠️</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->time_in_work === '24:00:00'): ?><span title="Automatyczne zakończenie">⚠️</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </td>                        <td class="whitespace-nowrap px-5 py-4"><?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['class' => '!text-blue-600 dark:!text-blue-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!text-blue-600 dark:!text-blue-300']); ?><?php echo e($start?->format('d.m.y') ?? 'Brak START'); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stop && $start && !$start->isSameDay($stop)): ?> – <?php echo e($stop->format('d.m.y')); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $attributes = $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $component = $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?></td>
                        <td class="px-5 py-4"><div class="flex flex-col items-center justify-center gap-y-3 text-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->reason): ?><?php if (isset($component)) { $__componentOriginal7b2a12e15a69bc14925b7a9e27398f66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Wymaga uwagi <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66)): ?>
<?php $attributes = $__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66; ?>
<?php unset($__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b2a12e15a69bc14925b7a9e27398f66)): ?>
<?php $component = $__componentOriginal7b2a12e15a69bc14925b7a9e27398f66; ?>
<?php unset($__componentOriginal7b2a12e15a69bc14925b7a9e27398f66); ?>
<?php endif; ?><p class="text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600"><?php echo e($row->reason->label()); ?></p>
                            <?php else: ?>
                                <div class="flex flex-col items-center justify-center gap-y-3 text-center">
                                    <?php if (isset($component)) { $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.type-icon','data' => ['type' => $row->object->object_type,'compact' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.type-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->object->object_type),'compact' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $attributes = $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $component = $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
                                    <div class="flex min-w-0 flex-col items-center justify-center gap-y-3 text-center">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100"><?php echo e($row->object->name); ?></p>
                                        <span class="<?php echo e($badgeClass); ?>"><?php echo e(['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$row->category]); ?></span>
                                        <p class="text-xs <?php echo e($row->day_difference > 0 ? 'text-indigo-700 dark:text-indigo-200' : 'text-green-800 dark:text-green-200'); ?>" title="Bilans całego dnia pracownika; nie sumuj po sesjach">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->day_difference === null): ?> Brak określonej normy
                                            <?php elseif($row->day_difference < 0): ?> Brakuje <?php echo e(\App\Services\Objects\ObjectWorkReport::duration(-$row->day_difference)); ?>

                                            <?php elseif($row->day_difference > 0): ?> +<?php echo e(\App\Services\Objects\ObjectWorkReport::duration($row->day_difference)); ?> ponad normę
                                            <?php else: ?> Norma zrealizowana
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </p>
                                        <span class="text-[10px] text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Bilans dnia <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->planned > 0): ?> · Norma dnia: <?php echo e(\App\Services\Objects\ObjectWorkReport::duration($row->planned)); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span>
                                    </div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="8" class="px-5 py-4 text-center text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Brak sesji dla wybranego miesiąca i kategorii.</td></tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</section></div></figure>
<p class="mt-6 leading-7 text-gray-600 dark:text-gray-300">Sprawdź, kto i jak długo pracował na konkretnej realizacji. Wybierz pracownika, aby zobaczyć jego odczyty na mapie i sesje czasu pracy. Punkty poza obszarem wskazują rejestracje do dodatkowej weryfikacji.</p>
<div class="mt-6 flex flex-col items-start gap-4 rounded-2xl bg-green-100 p-5 dark:bg-green-500/10"><h4 class="text-xl font-bold text-gray-900 dark:text-white">Uporządkuj czas pracy na swoich obiektach</h4><p class="text-gray-600 dark:text-gray-300">Zyskaj jeden widok zespołu, lokalizacji i godzin pracy przy każdej realizacji.</p><a href="<?php echo e(route('register')); ?>" class="system-font inline-flex items-center rounded-lg bg-green-300 px-4 py-2 text-sm font-semibold uppercase tracking-widest text-gray-900 transition hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Wypróbuj WIBEST<i class="fa-solid fa-arrow-right ml-2" aria-hidden="true"></i></a></div>
</section>
                </main>

            </div>
        </div>
    </section>

    <!-- SCROLL SPY SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function () {
            const stickyHeight = $('#sticky-section').outerHeight();
            if (window.location.hash) {
                const target = $(window.location.hash);

                if (target.length) {
                    setTimeout(function () {
                        $('html, body').animate({
                            scrollTop: target.offset().top - stickyHeight - 80
                        }, 800);
                    }, 100);
                }
            }
            const $sections = $(".doc-section");
            const $links = $(".nav-link");
            const $links2 = $(".nav-link-2");

            function setActive(id) {

                $links.each(function () {

                    const $el = $(this);

                    $el.removeClass("bg-green-300 text-gray-900 dark:text-gray-900 hover:bg-green-200 dark:hover:bg-green-400")
                        .addClass("text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700");
                });

                const $active = $(`.nav-link[href="#${id}"]`);

                $active.addClass("bg-green-300 text-gray-900 dark:text-gray-900 hover:bg-green-200 dark:hover:bg-green-400")
                    .removeClass("text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700");
            }

            function onScroll() {

                let scrollPos = $(window).scrollTop();

                $sections.each(function () {

                    const $section = $(this);
                    const top = $section.offset().top - stickyHeight - 81;
                    const bottom = top + $section.outerHeight();

                    if (scrollPos >= top && scrollPos <= bottom) {
                        setActive($section.attr("id"));
                        const index = ['rcp', 'e-wnioski', 'planowanie', 'raporty', 'obiekty'].indexOf($section.attr('id'));
                        $('#progress-bar').css('width', Math.max(0, index) * 20 + '%');
                        for (let step = 1; step <= 5; step++) {
                            $('#step-' + step).toggleClass('bg-green-300 dark:bg-green-300', index >= step - 1).toggleClass('bg-gray-300 dark:bg-gray-700', index < step - 1);
                        }
                    }
                });
            }

            $(window).on("scroll", onScroll);

            // init
            onScroll();

            // smooth scroll click (jak Flowbite docs)
            $links.on("click", function (e) {

                e.preventDefault();

                const target = $($(this).attr("href"));

                if (target.length) {

                    $("html, body").animate({
                        scrollTop: target.offset().top - stickyHeight - 80
                    }, 500);
                }
            });
            $links2.on("click", function (e) {

                e.preventDefault();

                const target = $($(this).attr("href"));

                if (target.length) {

                    $("html, body").animate({
                        scrollTop: target.offset().top - stickyHeight - 80
                    }, 500);
                }
            });
        });
    </script>

    <!-- RODZAJE WPISÓW - UI 1:1 -->
    <!--
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-12">
                Typy wpisów w systemie
            </h2>

            <div class="grid md:grid-cols-4 gap-6">

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300 dark:bg-green-400">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Praca zgodna z normą
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Standardowy wpis czasu pracy zgodny z zaplanowanym grafikiem. Brak nadgodzin i odchyleń od
                        normy
                        dobowej.
                    </p>
                </div>


                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-300 dark:bg-indigo-400">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            07:30 – 16:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        System automatycznie wykrywa przekroczenie normy czasu pracy i oznacza nadgodziny w raporcie
                        dziennym.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-300 dark:bg-emerald-400">
                        <div class="text-2xl">🎯</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            07:30 – 16:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny + zadanie
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Nadgodziny przypisane do konkretnego zadania lub projektu wraz z widocznością treści
                        wykonanej
                        pracy.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300/60 dark:bg-green-400/60">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:30 – 15:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            07:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Brak normy
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Niewystarczający czas pracy względem zaplanowanej normy lub niepełny dzień pracy.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-400 dark:bg-green-500">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            20:00 – 04:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Praca zgodna z normą
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Praca przechodząca przez północ. Obsługuje nadgodziny, normy, zadania oraz statusy pracy w
                        czasie rzeczywistym.
                    </p>
                </div>


                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-400 dark:bg-indigo-500">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            19:30 – 04:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Nadgodziny naliczane w trybie nocnym zgodnie z harmonogramem i przekroczeniem normy dobowej.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-400 dark:bg-emerald-500">
                        <div class="text-2xl">🎯</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            19:30 – 04:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny + zadanie
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Praca nocna przypisana do konkretnego zadania lub projektu z pełną historią realizacji.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-400/60 dark:bg-green-500/60">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            20:30 – 03:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            07:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Brak normy
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Skrócony czas pracy w trybie nocnym, który nie spełnia wymaganej normy dobowej.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-yellow-300 dark:bg-yellow-400">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Wielokrotny odczyt
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Wielokrotne wejścia i wyjścia w ciągu dnia pracy (np. przerwy, wyjścia służbowe, urzędy).
                        System
                        agreguje wszystkie odczyty w jeden dzień pracy.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center w-full
                        bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-2
                        transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">
                        <div class="text-2xl">🏢</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            STA
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Planing stały
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Stały harmonogram pracy powtarzany cyklicznie (np. poniedziałek–piątek w tych samych
                        godzinach).
                    </p>
                </div>


                <div>
                    <div
                        class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                        <div class="text-2xl">🌀</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            ZMI
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            PLaning zmienny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Elastyczny grafik dzienny z możliwością zmian godzin pracy w zależności od dnia.
                    </p>
                </div>
                <div>
                    <div
                        class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            ZMI
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            20:00 – 04:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            PLaning zmienny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Elastyczny grafik nocny obejmujący zmiany przechodzące przez północ.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-yellow-300 dark:bg-yellow-400">
                        <div class="text-2xl">⚠️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 mt-3 text-sm font-bold">
                            08:00 – 08:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            24:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Automatyczne zakończenie
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Status systemowy informujący o zakończeniu sesji lub sytuacji wymagającej reakcji
                        użytkownika.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-pink-200 dark:bg-pink-400/60">
                        <div class="text-2xl">🏖️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-pink-300 uppercase">
                            UW
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            urlop wypoczynkowy
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Wniosek
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Wszystkie wnioski pracownicze (urlop, L4, inne) z jednolitym statusem i automatycznym
                        obiegiem
                        akceptacji.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-rose-200 dark:bg-rose-400/60">
                        <div class="text-2xl">🎌</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-rose-300 uppercase">
                            ŚUW
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            Święto
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Ustawowo wolne
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Dni ustawowo wolne od pracy automatycznie oznaczone w kalendarzu systemu.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-rose-200 dark:bg-rose-400/60">
                        <div class="text-2xl">❌</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-rose-300 uppercase">
                            RCP
                        </div>
                        <span title="Error"><span
                                class="inline-flex  items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                Error
                            </span>
                        </span>

                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Wpis wymagający korekty danych lub interwencji administratora systemu.
                    </p>
                </div>
            </div>
        </div>
    </section>-->
    <!-- ========== FOOTER ========== -->
    <div class="bg-gray-100 dark:bg-gray-800 mt-8 lg:mt-24">
        <footer class="mt-auto w-full max-w-[85rem] py-12 px-8 mx-auto">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mb-8">
                <div class="col-span-1 sm:col-span-2 lg:col-span-1 text-center sm:text-start">
                    <h2 class="text-3xl" style='font-family: "Raleway", sans-serif;'>Karol Wiśniewski <a
                            href="wibest.pl" style='font-family: "Raleway", sans-serif;'
                            class="text-green-300 hover:text-green-400 transition-colors duration-500">WIBEST</a></h2>
                    <p class="mt-4 text-xs sm:text-sm text-muted-foreground-2 text-gray-500 text-sm dark:text-gray-400">
                        &copy; <?php echo e(date('Y')); ?> Wszelkie prawa zastrzeżone.
                    </p>
                </div>
                <!-- End Col -->

                <div class="col-span-1 lg:col-span-2 text-center sm:text-end">
                    <h4 class="text-xs font-semibold text-foreground uppercase text-green-300">Firma</h4>

                    <div class="mt-4 grid space-y-4 text-sm">
                        <p><a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('about')); ?>">O nas</a></p>
                        <p><a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('blog')); ?>">Blog</a></p>
                        <p><a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('contact')); ?>">Kontakt</a></p>
                    </div>

                </div>
                <!-- End Col -->

                <!-- End Col -->

                <div class="col-span-1 text-center sm:text-end">
                    <h4 class="text-xs font-semibold text-foreground uppercase text-green-300">Moduły</h4>

                    <div class="mt-4 grid space-y-4 text-sm">
                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('function')); ?>#rcp">
                                Rejestracja czasu pracy
                            </a>
                        </p>
                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('function')); ?>#e-wnioski">
                                Elektroniczne wnioski
                            </a>
                        </p>
                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('function')); ?>#planowanie">
                                Planing godzin pracy
                            </a>
                        </p>

                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('function')); ?>#raporty">
                                Raporty
                            </a>
                        </p>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->

            <div class="pt-4 mt-4 border-t border-line-2 border-gray-500 dark:border-gray-400">
                <div class="sm:flex sm:justify-between sm:items-center">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="text-sm mx-auto sm:mx-0 flex flex-col sm:flex-row sm:space-x-4">
                            <a class="inline-flex gap-x-2 text-center justify-center sm:justify-start py-2 sm:py-8 text-gray-500 text-sm dark:text-gray-400 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('blog')); ?>/regulamin">Regulamin</a>
                            <a class="inline-flex gap-x-2 text-center justify-center sm:justify-start py-2 sm:py-8 text-gray-500 text-sm dark:text-gray-400 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('blog')); ?>/polityka-prywatnosci">Polityka prywatności</a>
                            <a class="inline-flex gap-x-2 text-center justify-center sm:justify-start py-2 sm:py-8 text-gray-500 text-sm dark:text-gray-400 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="<?php echo e(route('blog')); ?>/polityka-cookies">Polityka cookies</a>
                        </div>
                    </div>

                    <!-- End Col -->
                </div>
            </div>
        </footer>
    </div>

    <!-- ========== END FOOTER ========== -->
    <!-- Footer -->
    <script>
        const toggle = document.getElementById('theme-toggle');
        toggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\function.blade.php ENDPATH**/ ?>