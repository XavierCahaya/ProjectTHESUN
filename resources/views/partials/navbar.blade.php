<nav class="bg-white p-2 shadow-xl sticky top-0 z-50">
    <div class="flex justify-between items-center">
        <div class="w-40 -ml-16">
            <a href="{{ route('home') }}">
                <img src="{{ asset('image/logo.png') }}" class="h-16 ml-20" />
            </a>
        </div>

        <button id="menu-btn" class="md:hidden text-black focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <ul class="hidden md:flex border-b-2 border-amber-400 ml-5 p-3 flex-row font-medium space-x-8 text-lg"
            style="font-family: 'Roboto', sans-serif;">
            <li><a href="{{ route('home') }}"
                    class=" text-amber-400 hover:text-amber-600 transition">{{ __('navbar.home') }}</a>
            </li>
            <li><a href="{{ route('packages') }}"
                    class=" text-amber-400 hover:text-amber-600 transition">{{ __('navbar.packages') }}</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class=" text-amber-400 hover:text-amber-600 transition">{{ __('navbar.about') }}</a>
            </li>
        </ul>

        <div class="hidden md:flex flex-row items-center space-x-4 mr-20">
            <!-- Language Switcher -->
            <div class="relative">
                <button id="lang-btn"
                    class="px-3 py-1 border border-amber-400 rounded-lg text-sm hover:bg-gray-100 transition">
                    {{ strtoupper(app()->getLocale()) }}
                </button>

                <div id="lang-menu" class="hidden absolute right-0 mt-2 bg-white border rounded-lg shadow-lg w-24">
                    <a href="{{ route('set.locale', 'id') }}"
                        class="block px-3 py-2 text-black text-sm hover:bg-amber-400">🇮🇩
                        Indonesia</a>
                    <a href="{{ route('set.locale', 'en') }}"
                        class="block px-3 py-2 text-black text-sm hover:bg-amber-400">🇺🇸
                        English</a>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden mt-4 rounded-lg p-4 space-y-2">
        <a href="{{ route('home') }}"
            class="text-shadow-lg/10 text-amber-500 hover:text-amber-600 transition">{{ __('navbar.home') }}</a>
        <hr class="w-full h-[2px] bg-white shadow-lg shadow-black ">
        <a href="{{ route('packages') }}"
            class="text-shadow-lg/10 text-amber-500 hover:text-amber-600 transition">{{ __('navbar.packages') }}</a>
        <hr class="w-full h-[2px] bg-white shadow-lg shadow-black ">
        <a href="{{ route('about') }}"
            class="text-shadow-lg/10 text-amber-500 hover:text-amber-600 transition">{{ __('navbar.about') }}</a>
        <hr class="w-full h-[2px] bg-white shadow-lg shadow-black mb-8">


        <p class="text-shadow-lg/10 text-amber-800 hover:text-amber-600 transition">{{ __('home.bahasa') }}</p>
        <a href="{{ route('set.locale', 'id') }}"
            class="text-shadow-lg/10 text-amber-500 hover:text-amber-600 transition">🇮🇩
            Indonesia</a>
        <hr class="w-full h-[2px] bg-white shadow-lg shadow-black ">

        <a href="{{ route('set.locale', 'en') }}"
            class="text-shadow-lg/10 text-amber-500 hover:text-amber-600 transition">🇺🇸
            English</a>
    </div>
</nav>

<script>
    document.getElementById('lang-btn').addEventListener('click', function () {
        const menu = document.getElementById('lang-menu');
        menu.classList.toggle('hidden');
    });

    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>