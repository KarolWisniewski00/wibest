<input type="hidden" value="{{Session::get('success')}}" id="success">
<input type="hidden" value="{{Session::get('fail')}}" id="fail">
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