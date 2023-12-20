{{--

<header class="text-white body-font bg-black" id="app">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">

            <div class="relative">
                <img src="{{ url('storage/images/logo.webp') }}" alt="" class="w-14 h-12 rounded-full">
                <img src="{{ url('storage/images/logo.webp') }}" alt=""
                    class="w-16 h-14 rounded-full absolute top-full transform scale-y-[-1] opacity-50">
            </div>

            <span class="ml-3 text-xl font-inter font-bold">
                QUIMM<span class="text-lime-400 font-inter">ICA</span>
              </span>

        </a>
        <nav
            class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a class="mr-10 hover-effect">Hasiera</a>
            <a class="mr-10 hover-effect">Jolasak</a>
            <a class="mr-10 hover-effect">Guri Buruz</a>

        </nav>
        <nav class="inline-flex items-center py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0">
            <a class="mr-5 underline-spacing">Hasi saioa</a>
            <a class="mr-5 underline-spacing">Itxi saioa</a>

        </nav>
    </div>
</header>
 --}}

<header class="relative text-white body-font bg-black z-50">
    <div id="header-app"></div>
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center z-50">

        <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">

            <div class="relative">
                <img src="{{ url('storage/images/logo.webp') }}" alt="" class="w-14 h-12 rounded-full">
                <img src="{{ url('storage/images/logo.webp') }}" alt=""
                    class="w-16 h-14 rounded-full absolute top-full transform scale-y-[-1] opacity-50">
            </div>

            <span class="ml-3 text-xl font-inter font-bold z-50">
                QUIMM<span class="text-lime-400 font-inter">ICA</span>
            </span>

        </a>
        <nav
            class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center z-50" >
            <a class="mr-10 hover-effect">Hasiera</a>
            <a class="mr-10 hover-effect">Jolasak</a>
            <a class="mr-10 hover-effect">Guri Buruz</a>
            <a class="mr-10 hover-effect">Guri Buruz</a>

        </nav>
      {{--   <nav class="inline-flex items-center py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0 z-50">
            <a class="mr-5 underline-spacing">Hasi saioa</a>
            <a class="mr-5 underline-spacing">Itxi saioa</a>

        </nav> --}}

        <nav class="inline-flex items-center py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0 z-50">
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="mr-5 underline-spacing">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mr-5 underline-spacing">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="mr-5 underline-spacing">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
    </div>

</header>
