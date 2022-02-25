@include('layouts.plantilla')

<main>
    <h1 class="text-2xl text-center mt-5">Uep!
        @if (Route::has('login'))
            @auth
                <span>{{ ucfirst(Auth::user()->name) }}</span>
            @endauth
        @endif
    </h1>
</main>
