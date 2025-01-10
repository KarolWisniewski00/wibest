<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        padding-right: 48px;
    }

    @media (min-width: 640px) {
        .sticky {
            padding-right: 96px;
        }
    }

    @media (min-width: 1024px) {
        .sticky {
            padding-right: 128px;
        }
    }

    @media (min-width: 1280px) {
        .sticky {
            position: relative;
            padding-right: 0px;
        }
    }
</style>
<div id="space" class="xl:hidden"></div>
<!-- Napis z przyciskiem tworzenia -->
<div id="fixed" class="pb-4 flex flex-col justify-between items-center">
    <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
        <x-h1-display class="my-8">
            {{$slot}}
        </x-h1-display>
        @if ($company)
        @if($role == 'admin')
        <x-button-link-green {{ $attributes }}>
            <i class="fa-solid fa-plus mr-2"></i>Utwórz
        </x-button-link-green>
        @endif
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
        var element = $('#fixed');
        var space = $('#space');
        var elementOffset = element.offset().top;
        var elementHeight = element.outerHeight(); // Pobieranie wysokości elementu

        $(window).scroll(function() {
            if ($(window).scrollTop() > elementOffset) {
                element.addClass('sticky');
                space.height(elementHeight); // Dodawanie wysokości do space
            } else {
                element.removeClass('sticky');
                space.height(0); // Usuwanie wysokości z space
            }
        });
    });
</script>