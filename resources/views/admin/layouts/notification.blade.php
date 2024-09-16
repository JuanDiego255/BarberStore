@if (session()->has('success'))
    <script>
        Notiflix.Notify.Éxito("@lang(session('success'))");
    </script>
@endif

@if (session()->has('error'))
    <script>
        Notiflix.Notify.Failure("@lang(session('error'))");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        Notiflix.Notify.Warning("@lang(session('warning'))");
    </script>
@endif

<script>

    $(document).ready(function () {
        $('.notiflix-confirm').on('click', function () {

        })
    })
</script>
