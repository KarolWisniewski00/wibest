<style>
    .a4-paper {
        width: 794px;
        /* Szerokość A4 w pikselach */
        height: 1123px;
        /* Wysokość A4 w pikselach */
        background-color: white;
        /* Białe tło, jak kartka papieru */
        margin: 20px auto;
        /* Środek strony z marginesem */
        padding: 40px;
        /* Wewnętrzny margines (odstęp od krawędzi) */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        /* Delikatny cień, aby wyglądało jak kartka */
        border: 1px solid #e5e7eb;
        /* Opcjonalna, delikatna ramka */
        overflow: hidden;
        /* Ukrycie nadmiaru treści */
    }
</style>
<div class="bg-white a4-paper hidden md:block">
    <!-- Tutaj wstawiamy zawartość podglądu faktury -->
    <iframe {{ $attributes->merge(['class' => '']) }} width="100%" height="100%" style="border:none;"></iframe>
</div>