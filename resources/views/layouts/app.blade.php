<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>



    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script> --}}

    @stack('styles')

</head>
<body class="min-h-screen bg-gray-200 font-base">
<div id="app">

    <div class="flex flex-col md:flex-row">

        @include('includes.sidebar')

        <div class="w-full md:flex-1">
            <nav class="items-center justify-between hidden h-16 p-4 bg-white shadow-md md:flex">
                <div>
                    <form action="{{route('parking.search')}}" method="GET">

                        <input class="px-4 py-2 bg-gray-200 border border-gray-300 rounded focus:outline-none"
                                type="text"
                                name="consignmentno"
                                placeholder="Search..."/>
                    </form>
                </div>
                <div>
                    <button class="mx-2 text-gray-700 focus:outline-none"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </div>
            </nav>
            <main>
                <!-- Replace with your content -->
                <div class="px-8 py-6">
                    @yield('content')
                </div>
                <!-- /End replace -->
            </main>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" ></script>

@stack('scripts')
</body>
</html>
