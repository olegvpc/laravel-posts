<footer class="py-3 border-top text-center">
    {{-- <i class="fa fa-copyright">@</i> {{config('app.name')}} {{date('Y')}} --}}
    {{-- $date - указана как глобальная переменная и определена в app/Prividers/AppServeceProvider.php --}}
    <i class="fa fa-copyright">@</i> {{config('app.name')}} {{ $date }}
</footer>