@extends('main/main')

@section('container')
    <br>
    <br>

    <style>
        .category-box {
            padding: 10px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: white;
            transition: 0.2s;
            width: auto !important;
            margin-right: 10px !important;
        }

        .category-box:hover {
            background-color: #fbbf24;
            color: white;
            border-color: #fbbf24;
        }

        .swiper-slide {
            width: auto !important;
        }

        /* animasi load fade */
        .fade {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .fade.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* ==== Fade dari kiri ==== */
        .fade-left {
            opacity: 0;
            transform: translateX(-30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-left.show {
            opacity: 1;
            transform: translateX(0);
        }

        /* ==== Fade dari kanan ==== */
        .fade-right {
            opacity: 0;
            transform: translateX(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-right.show {
            opacity: 1;
            transform: translateX(0);
        }

        /* ==== Zoom In ==== */
        .zoom-in {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .zoom-in.show {
            opacity: 1;
            transform: scale(1);
        }

        /* ==== Zoom Out ==== */
        .zoom-out {
            opacity: 0;
            transform: scale(1.1);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .zoom-out.show {
            opacity: 1;
            transform: scale(1);
        }
    </style>

    <div class=" flex justify-center relative overflow-hidden p-2">
        <h1 class="relative z-10 text-center text-black text-2xl md:text-4xl px-1"
            style="font-family: 'Vast Shadow', cursive;">
            {{ __('packages.jelajahpaket') }}
        </h1>
    </div>

    <div class="w-full flex justify-center px-5 pt-8 md:pt-0">
        <div class="overflow-hidden rounded-xl border border-gray-300 px-6 py-3 max-w-[720px] w-full mx-3 ">

            <div class="swiper categorySwiper">
                <div class="swiper-wrapper text-lg font-medium cursor-pointer select-none">

                    {!! __('packages.negoro') !!}

                </div>
            </div>

        </div>
    </div>

    <h1 class="mt-2 text-sm px-5 flex justify-center items-center text-center">{{ __('packages.geser') }}</h1>

    <br>

    <div id="imgPopup" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center">
        <div class="relative">
            <button onclick="closePopup()"
                class="absolute -top-4 -right-4 bg-white text-black rounded-full 
                                                                    w-15 h-15 flex items-center justify-center shadow-lg text-3xl">
                ×
            </button>
            <img id="popupImage" class="max-w-[90vw] max-h-[90vh] rounded shadow-lg">
        </div>
    </div>


    {{-- jawa tengah --}}
    <div id="jawatengah" class="category-content hidden">

        <div class="relative w-full  h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/semarang.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                {!! __('packages.jatengg') !!}


                {{-- <div
                    class="overflow-hidden flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/semarang.jpg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            ARTIKEL JAWA TENGAH
                        </h1>
                        <p class="text-xl text-shadow-lg/50 text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            ISI ARTIKEL
                        </p>
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- paket --}}
        <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosursemarang.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading"
                            style="font-family: 'Roboto', sans-serif;">{{ __('packages.paketsemarang') }}</h5>
                        {!! __('packages.semaranginfo') !!}

                    </div>
                </div>

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurdieng.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading"
                            style="font-family: 'Roboto', sans-serif;">{{ __('packages.paketkarimunjawa') }}</h5>
                        {!! __('packages.dienginfo') !!}
                    </div>
                </div>

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurkarimun.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading"
                            style="font-family: 'Roboto', sans-serif;">{{ __('packages.paketkarimunjawa') }}</h5>
                        {!! __('packages.karimunjawainfo') !!}

                    </div>
                </div>
                <div
                    class="fade flex flex-col items-start md:items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurmagelang.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 style="font-family: 'Roboto', sans-serif;"
                            class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketmagelang') }}
                        </h5>
                        {!! __('packages.magelanginfo') !!}
                    </div>
                </div>

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurmagelang2.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 style="font-family: 'Roboto', sans-serif;"
                            class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketmagelang2') }}
                        </h5>
                        {!! __('packages.magelanginfo2') !!}
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosursolo.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 style="font-family: 'Roboto', sans-serif;"
                            class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">{{ __('packages.paketsolo') }}
                        </h5>
                        {!! __('packages.soloinfo') !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


    {{-- korea --}}
    <div id="korea" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/korea.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-5xl text-shadow-lg/50 font-bold mb-6 text-center"
                    style="font-family: 'Vast Shadow', cursive;">
                    {{ __('packages.korea') }}
                </h1>

                {{-- <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/korea.jpg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            ARTIKEL KOREA
                        </h1>
                        <p class="text-xl text-shadow-lg/50 text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            ISI ARTIKEL
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
        {{-- paket --}}
        <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurkorea.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading"
                            style="font-family: 'Roboto', sans-serif;">{{ __('packages.paketkorea') }}</h5>
                        {!! __('packages.koreainfo') !!}
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- india --}}
    <div id="india" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/india.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-5xl text-shadow-lg/50 font-bold mb-6 text-center"
                    style="font-family: 'Vast Shadow', cursive;">
                    I N D I A
                </h1>

                {{-- <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/india.jpg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            ARTIKEL INDIA
                        </h1>
                        <p class="text-xl text-shadow-lg/50 text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            ISI ARTIKEL
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
        {{-- paket --}}
        <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurindia.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketqutub') }}
                        </h5>
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurindia2.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketgate') }}
                        </h5>
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurindia3.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.pakethawa') }}
                        </h5>
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurindia4.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketcity') }}
                        </h5>
                    </div>
                </div>

            </div>
        </div>

    </div>


    {{-- vietnam --}}
    <div id="vietnam" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/vietnam2.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-4xl text-shadow-lg/50 font-bold mb-6 text-center block md:hidden"
                    style="font-family: 'Vast Shadow', cursive;">
                    V I E T N A M
                </h1>
                <h1 class="text-7xl text-shadow-lg/50 font-bold mb-6 text-center hidden md:block"
                    style="font-family: 'Vast Shadow', cursive;">
                    V I E T N A M
                </h1>

                {{-- <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/vietnam2.jpg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            ARTIKEL VIETNAM
                        </h1>
                        <p class="text-xl text-shadow-lg/50 text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            ISI ARTIKEL
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
        {{-- paket --}}
        <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurvietnam3.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 style="font-family: 'Roboto', sans-serif;"
                            class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketvietnam') }}
                        </h5>

                        {!! __('packages.vietnam1') !!}

                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurvietnam2.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 style="font-family: 'Roboto', sans-serif;"
                            class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">
                            {{ __('packages.paketvietnam') }}
                        </h5>
                        {!! __('packages.vietnam2') !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


    {{-- jepang --}}
    <div id="jepang" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/jepang.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-4xl text-shadow-lg/50 font-bold mb-6 text-center block md:hidden"
                    style="font-family: 'Vast Shadow', cursive;">
                    {{ __('packages.jepang') }}
                </h1>
                <h1 class="text-7xl text-shadow-lg/50 font-bold mb-6 text-center hidden md:block"
                    style="font-family: 'Vast Shadow', cursive;">
                    {{ __('packages.jepang') }}
                </h1>

                {{-- <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/jepang.jpg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            ARTIKEL JEPANG
                        </h1>
                        <p class="text-xl text-shadow-lg/50 text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            ISI ARTIKEL
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
        {{-- paket --}}
        <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurjepang.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.jepanginfo1') !!}
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurjepang2.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.jepanginfo2') !!}
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurjepang3.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.jepanginfo3') !!}
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurjepang4.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.jepanginfo4') !!}
                    </div>
                </div>

            </div>
        </div>

    </div>



    {{-- china --}}
    <div id="china" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/china.jpg" alt="" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-5xl text-shadow-lg/50 font-bold mb-6 text-center"
                    style="font-family: 'Vast Shadow', cursive;">
                    C H I N A
                </h1>

                {{-- <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/jepang.jpg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            ARTIKEL JEPANG
                        </h1>
                        <p class="text-xl text-shadow-lg/50 text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            ISI ARTIKEL
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
        {{-- paket --}}
        <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurchina.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.chinainfo1') !!}
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurchina2.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.chinainfo2') !!}
                    </div>
                </div>
                <div
                    class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/brosurchina3.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        {!! __('packages.chinainfo3') !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


    {{-- malaysia --}}
    {{-- <div id="malaysia" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/malaysia.webp" alt="Malaysia" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-5xl text-shadow-lg/50 font-bold mb-6 text-center"
                    style="font-family: 'Vast Shadow', cursive;">
                    M A L A Y S I A
                </h1>

                <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/artikelmalaysia.jpeg" alt="Durian Malaysia"
                            class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            {{ __('packages.deskripmalay') }}
                        </h1>
                        <p class="text-2xl text-shadow-lg/50 font-bold text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            {{ __('packages.deskripmalay2') }}
                        </p>
                    </div>
                </div>

            </div>
        </div> --}}
        {{-- paket --}}
        {{-- <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">PAKET MALAYSIA</h5>
                        <ul class="ml-5 mb-6 text-body">
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">PAKET MALAYSIA</h5>
                        <ul class="ml-5 mb-6 text-body">
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div> --}}


    {{-- singapore --}}
    {{-- <div id="singapore" class="category-content hidden">

        <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">

            <img src="image/singapore.jpg" alt="Singapore" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">

                <h1 class="text-5xl text-shadow-lg/50 font-bold mb-6 text-center"
                    style="font-family: 'Vast Shadow', cursive;">
                    S I N G A P O R E
                </h1>

                <div
                    class="flex flex-col md:flex-row items-center md:items-start text-black rounded-lg shadow-md p-4 w-250">

                    <div class="flex-shrink-0">
                        <img src="image/artikelsingapore2.jpeg" alt="" class="w-80 h-80 object-cover rounded-lg">
                    </div>

                    <div class="md:ml-4 mt-4 md:mt-0 text-left">
                        <h1 class="text-4xl text-shadow-lg/50 font-bold text-white mt-20 mb-2"
                            style="font-family: 'Roboto', sans-serif;">
                            {{ __('packages.deskripsinga') }}
                        </h1>
                        <p class="text-2xl text-shadow-lg/50 font-bold text-white leading-relaxed"
                            style="font-family: 'Roboto', sans-serif;">
                            {{ __('packages.deskripsinga2') }}
                        </p>
                    </div>
                </div>

            </div>
        </div> --}}
        {{-- paket --}}
        {{-- <div class="flex justify-center p-10">
            <div class="grid grid-col-1 md:grid-cols-2 gap-15">

                <div
                    class="flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">PAKET SINGAPORE</h5>
                        <ul class="ml-5 mb-6 text-body">
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                    <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                        onclick="openPopup(this.src)" src="image/.jpeg" alt="">
                    <div class="flex flex-col justify-between md:p-4 leading-normal">
                        <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading">PAKET SINGAPORE</h5>
                        <ul class="ml-5 mb-6 text-body">
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                            <li>TESSSSSSSSSSSSSS</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div> --}}

    <script>
        var swiper = new Swiper(".categorySwiper", {
            slidesPerView: "auto",
            spaceBetween: 10,
            freeMode: true,
        });

        function showCategory(category) {
            // Sembunyikan semua konten kategori
            document.querySelectorAll('.category-content')
                .forEach(el => el.classList.add('hidden'));

            // Tampilkan kategori sesuai yang diklik
            document.getElementById(category).classList.remove('hidden');
        }

        // Tambahkan ini agar default-nya Semarang tampil
        document.addEventListener("DOMContentLoaded", function () {
            showCategory('jawatengah');
        });

        function openPopup(src) {
            document.getElementById("popupImage").src = src;
            document.getElementById("imgPopup").classList.remove("hidden");
        }

        function closePopup() {
            document.getElementById("imgPopup").classList.add("hidden");
        }

        // fungsi load fade
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        });

        // animasi scroll
        document.querySelectorAll(".fade, .fade-left, .fade-right, .zoom-in, .zoom-out").forEach(el => observer.observe(
            el));
    </script>
@endsection