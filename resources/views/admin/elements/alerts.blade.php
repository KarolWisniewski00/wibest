<input type="hidden" value="{{Session::get('success')}}" id="success">
<input type="hidden" value="{{Session::get('fail')}}" id="fail">
<input type="hidden" value="{{ Session::get('warning') }}" id="warning">
<script>
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-center", // Wyświetl na środku u góry
            "timeOut": "5000", // Czas trwania (5 sekund)
            "closeButton": true, // Dodanie przycisku zamknięcia
            "progressBar": true // Pokaż pasek postępu
        };
    });
</script>
<style>
    /* PRZYCISK ZAMKNIĘCIA (X) */
    #toast-container .toast-close-button {
        color: rgb(17, 24, 39);
        opacity: 1;
        text-shadow: none;
    }

    #toast-container .toast-close-button:hover {
        color: rgb(17, 24, 39);
        opacity: 0.8;
    }

    #toast-container>.toast-success,
    #toast-container>.toast-error,
    #toast-container>.toast-info,
    #toast-container>.toast-warning {
        background-image: none !important;
        padding-left: 52px;
        /* miejsce na ikonę */
    }

    /* =========================================================
   TOASTR – WSPÓLNE USTAWIENIA (dla wszystkich alertów)
   ========================================================= */

    #toast-container>div {
        position: relative;
        /* wymagane dla ::before */
        background-image: none !important;
        /* wyłączenie PNG toastr */
        padding-left: 52px;
        /* miejsce na ikonę */
        color: rgb(17 24 39);
        /* gray-900 */
        box-shadow: 0 10px 30px rgba(17, 24, 39, 0.35);
    }

    /* Tekst wiadomości */
    #toast-container>div .toast-message {
        color: rgb(17 24 39);
    }

    /* =========================================================
   SUCCESS – green-300 + ikona check
   ========================================================= */

    #toast-container>.toast-success {
        background-color: rgb(134 239 172);
        /* green-300 */
    }

    #toast-container>.toast-success::before {
        content: "\f00c";
        /* Font Awesome: fa-check */
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: rgb(17 24 39);
    }

    /* =========================================================
   ERROR – red-300 + ikona ostrzeżenia
   ========================================================= */

    #toast-container>.toast-error {
        background-color: rgb(252 165 165);
        /* red-300 */
    }

    #toast-container>.toast-error::before {
        content: "\f071";
        /* Font Awesome: fa-triangle-exclamation */
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: rgb(17 24 39);
    }

    /* =========================================================
   WARNING – amber-300 + ikona ostrzeżenia
   ========================================================= */

    #toast-container>.toast-warning {
        background-color: rgb(252 211 77);
        /* amber-300 */
    }

    #toast-container>.toast-warning::before {
        content: "\f06a";
        /* Font Awesome: fa-circle-exclamation */
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: rgb(17 24 39);
    }
</style>
<!--SUCCESS-->
@if(Session::has('success'))
<script>
    $(document).ready(function() {
        var success = $('#success').val();
        toastr.success(success);
    });
</script>
@endif
<!--DANGER-->
@if(Session::has('fail'))
<script>
    $(document).ready(function() {
        var fail = $('#fail').val();
        toastr.error(fail);
    });
</script>
@endif
@if(Session::has('warning'))
<script>
    $(document).ready(function() {
        var warning = $('#warning').val();
        toastr.warning(warning);
    });
</script>
@endif