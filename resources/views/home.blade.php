@extends('main/main')

@section('container')
    <div class="h-150 relative block md:hidden">
        <img id="bigImage1" class="bigImage w-full h-full object-cover absolute top-0 left-0">

        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>

        <!-- MAIN WRAPPER -->
        <div class="relative z-10 w-full h-full flex flex-col md:flex-row">

            <!-- TEXT -->
            <div class="w-full md:w-auto h-full flex flex-col justify-center items-center
                                                                                           md:items-start md:justify-center text-center md:text-left
                                                                                           px-6 md:ml-20"
                style="font-family: 'ZCOOL XiaoWei', serif;">
                <h1 class="text-white text-6xl md:text-6xl leading-tight">THE SUN</h1>
                <h1 class="text-white text-6xl md:text-6xl leading-tight">TOUR</h1>
                <h1 class="text-white text-5xl md:text-5xl leading-tight">EN TRAVEL</h1>
            </div>

        </div>
    </div>

    <div class="h-150 relative hidden md:block">
        <img id="bigImage2" class="bigImage w-full h-full object-cover absolute top-0 left-0">

        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>

        <div id="thumbContainer" class="flex flex-row justify-start gap-10 p-10 relative z-10">

            <div class="flex gap-24 ">

                <div class="text-center pt-40 pr-14 w-full md:ml-20 inline-block min-w-sm"
                    style="font-family: 'ZCOOL XiaoWei', serif;">
                    <h1 class="text-white text-6xl leading-tight">THE SUN</h1>
                    <h1 class="text-white text-6xl leading-tight">TOUR</h1>
                    <h1 class="text-white text-5xl leading-tight">EN TRAVEL</h1>
                </div>

                <div class=" ">

                    <div class=" p-1"></div>

                    <div class="w-65 h-65 thumb relative cursor-pointer rounded-xl">
                        <img onclick="selectImage(this, 'image/semarang2.jpg')" src="image/semarang2.jpg"
                            class="w-full h-full object-cover absolute top-0 left-0 rounded-xl">
                    </div>

                    <div class="w-65 h-65 thumb relative cursor-pointer rounded-xl">
                        <img onclick="selectImage(this, 'image/borobudur.jpg')" src="image/borobudur.jpg"
                            class="w-full h-full object-cover absolute top-0 left-0 rounded-xl">
                    </div>

                    <div class="w-65 h-65 thumb relative cursor-pointer rounded-xl">
                        <img onclick="selectImage(this, 'image/karimun.jpg')" src="image/karimun.jpg"
                            class="w-full h-full object-cover absolute top-0 left-0 rounded-xl">
                    </div>

                    <div class="w-65 h-65 thumb relative cursor-pointer">
                        <img onclick="selectImage(this, 'image/solo1.jpg')" src="image/solo1.jpg"
                            class="w-full h-full object-cover absolute top-0 left-0 rounded-xl">
                    </div>

                    <div class=" w-65 h-65 thumb relative cursor-pointer">
                        <img onclick="selectImage(this, 'image/dieng.jpeg')" src="image/dieng.jpeg"
                            class="w-full h-full object-cover absolute top-0 left-0 rounded-xl">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .slider-container {
            overflow: hidden;
            background: #f1f1f1;
            padding: 20px;
        }

        .slider-track {
            display: flex;
            width: max-content;
            animation: scroll 30s linear infinite;
        }

        .slider-track img {
            width: 350px;
            /* atur sesuai kebutuhan */
            height: 300px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 8px;
        }

        /* Animasi scroll */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }


        #bigImage {
            transition: opacity 1.2s cubic-bezier(0.4, 0.0, 0.2, 1),
                filter 1.2s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .fade-out {
            opacity: 0;
            filter: blur(6px);
        }

        .thumb div {
            transition: opacity 0.3s ease;
        }

        .swiper-button-next,
        .swiper-button-prev {
            z-index: 9999 !important;
        }

        /* animasi loading */
        .fade {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .fade.show {
            opacity: 1;
            transform: translateY(0);
        }

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

        ..slider {
            position: relative;
        }

        /* gambar dibuat absolute agar menutupi slider */
        .slide-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* full cover */
            opacity: 0;
            transition: opacity 1s ease;
        }

        .slide-image.active {
            opacity: 1;
        }
    </style>


    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const images = [
                "image/semarang2.jpg",
                "image/borobudur.jpg",
                "image/karimun.jpg",
                "image/solo1.jpg",
                "image/dieng.jpeg",
            ];

            const imageTitles = [
                "Semarang",
                "Magelang",
                "Karimun Jawa",
                "Solo",
                "Dieng",
            ];

            let currentIndex = 0;
            const thumbContainer = document.getElementById("thumbContainer");
            // const bigImage = document.getElementById("bigImage");
            const bigImages = document.querySelectorAll(".bigImage");

            function renderThumbnails() {
                document.querySelectorAll(".thumb").forEach(el => el.remove());

                for (let i = 0; i < 3; i++) {
                    let imgIndex = (currentIndex + i) % images.length;

                    let thumbDiv = document.createElement("div");
                    thumbDiv.classList.add(
                        "mt-40", "w-65", "h-65",
                        "thumb", "relative", "cursor-pointer", "rounded-xl", "overflow-hidden"
                    );

                    let thumbImg = document.createElement("img");
                    thumbImg.src = images[imgIndex];
                    thumbImg.className = "w-full h-full object-cover absolute top-0 left-0 rounded-xl";
                    thumbImg.onclick = () => selectImage(imgIndex);

                    let overlay = document.createElement("div");
                    overlay.className =
                        "rounded-xl absolute top-23 bottom-23 left-0 right-0 flex flex-col items-center justify-center text-white text-center bg-black/50 translate-y-24";

                    let title1 = document.createElement("div");
                    title1.className = "text-lg font-semibold tracking-widest";
                    title1.innerText = "EXPLORE";

                    let title2 = document.createElement("div");
                    title2.className = "text-2xl font-bold";
                    title2.innerText = imageTitles[imgIndex];

                    overlay.appendChild(title1);
                    overlay.appendChild(title2);
                    thumbDiv.appendChild(thumbImg);
                    thumbDiv.appendChild(overlay);
                    thumbContainer.appendChild(thumbDiv);
                }
            }

            function selectImage(index) {
                currentIndex = index;
                updateBigImage();
                renderThumbnails();
            }

            // function updateBigImage() {
            //     bigImage.classList.add("fade-out");

            //     setTimeout(() => {
            //         bigImage.src = images[currentIndex];
            //         bigImage.classList.remove("fade-out");
            //     }, 300);
            // }
            
            function updateBigImage() {
                bigImages.forEach(img => img.classList.add("fade-out"));
            
                setTimeout(() => {
                    bigImages.forEach(img => {
                        img.src = images[currentIndex];
                        img.classList.remove("fade-out");
                    });
                }, 300);
            }


            setInterval(() => {
                currentIndex = (currentIndex + 1) % images.length;
                updateBigImage();
                renderThumbnails();
            }, 5000);

            renderThumbnails();
            updateBigImage();

            // ====== FUNGSI LOADING FADE ======
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                    }
                });
            });

            // animasi saat scroll
            document.querySelectorAll(".fade, .fade-left, .fade-right").forEach(el => observer
                .observe(el));

            // animasi halaman dibuka
            setTimeout(() => {
                document.querySelectorAll(".zoom-in, .zoom-out").forEach(
                    el => {
                        el.classList.add("show");
                    });
            }, 50);

            // slider layanan
            let index = 0;
            const slides = document.querySelectorAll(".slide-image");

            function showSlide() {
                slides.forEach(img => img.classList.remove("active"));
                slides[index].classList.add("active");

                index = (index + 1) % slides.length;
            }

            showSlide();
            setInterval(showSlide, 3000);

        });

        function showSection(id) {
            const sections = ['kontenawal', 'mobil', 'kapal', 'mice', 'ziarah'];

            sections.forEach(sec => document.getElementById(sec).classList.add('hidden'));

            document.getElementById(id).classList.remove('hidden');
        }


        function openPopup(src) {
            document.getElementById("popupImage").src = src;
            document.getElementById("imgPopup").classList.remove("hidden");
        }

        function closePopup() {
            document.getElementById("imgPopup").classList.add("hidden");
        }

        document.getElementById("imgPopup").onclick = function () {
            this.classList.add("hidden");
        };
    </script>


    <div class="py-5 max-w-7xl flex flex-col relative overflow-hidden p-1 justify-center mx-auto">
        <h1 class="fade relative z-10 text-center text-black text-xl md:text-3xl"
            style="font-family: 'Vast Shadow', cursive;">
            {{ __('home.jelajahdunia') }}
        </h1>
        <p class="fade md:px-12 text-center text-black mt-4 px-4 text-base md:text-2xl"
            style="font-family: 'ZCOOL XiaoWei', cursive;">
            {{ __('home.jelajahdunia2') }}
        </p>
    </div>


    {{-- setting close pop up --}}
    <div id="imgPopup" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center">
        <div class="relative">
            <button onclick="closePopup()"
                class="absolute -top-4 -right-4 bg-white text-black rounded-full w-15 h-15 flex items-center justify-center shadow-lg text-3xl">
                ×
            </button>
            <img id="popupImage" class="max-w-[90vw] max-h-[90vh] rounded shadow-lg">
        </div>
    </div>

    <div id="default-carousel" class=" fade relative w-full md:hidden" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[500px] overflow-hidden rounded-base md:h-96">
            @foreach($heroSliders as $index => $slider)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" 
                     src="{{ str_starts_with($slider->image_path, 'image/') ? asset($slider->image_path) : asset('storage/' . $slider->image_path) }}" 
                     class="block w-full h-full object-cover"
                     alt="{{ $slider->title }}">
            </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach($heroSliders as $index => $slider)
            <button type="button" class="w-3 h-3 rounded-xl" 
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $index + 1 }}"
                    data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m9 5 7 7-7 7" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- brosur 1 besar 4 kecil --}}
    @php
        $featuredSlider = $heroSliders->where('is_featured', true)->first();
        $regularSliders = $heroSliders->where('is_featured', false)->take(4);
    @endphp
    
    <div class="h-160 desktop-brosur hidden md:block">
        <div class=" flex justify-center gap-10 brosur-container">

            @if($featuredSlider)
            <div class="fade-left flex items-center justify-center h-200 w-[630px] relative overflow-hidden">
                <img onclick="openPopup(this.src)" 
                     src="{{ str_starts_with($featuredSlider->image_path, 'image/') ? asset($featuredSlider->image_path) : asset('storage/' . $featuredSlider->image_path) }}"
                     alt="{{ $featuredSlider->title }}"
                     class="absolute top-0 left-0 w-full h-full object-cover">
            </div>
            @endif

            <div class="grid grid-cols-2 gap-5 brosur-grid">
                @foreach($regularSliders as $slider)
                <div
                    class="fade-right mobile-img-size h-97 w-[290px] flex items-center justify-center relative overflow-hidden">
                    <img onclick="openPopup(this.src)" 
                         src="{{ str_starts_with($slider->image_path, 'image/') ? asset($slider->image_path) : asset('storage/' . $slider->image_path) }}"
                         alt="{{ $slider->title }}"
                         class="absolute top-0 left-0 w-full h-full object-cover">
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <br>

    <div class="md:mt-60 py-5 flex justify-center relative overflow-hidden px-10">
        <h1 class="fade relative z-10 text-center text-black text-xl md:text-4xl"
            style="font-family: 'Vast Shadow', cursive;">
            {{ __('home.mengapakami') }}
        </h1>
    </div>

    <div class="flex flex-col md:flex-row justify-center gap-10 px-10 ">
        <div class="fade bg-white h-auto w-auto md:w-100 p-5 text-center border border-gray-300 shadow-lg rounded-lg">
            <img src="image/medal.png" class="w-28 h-28 mx-auto object-contain">
            <h1 class="text-3xl mt-3" style="font-family: 'Abhaya Libre', serif; font-weight:600;">
                {{ __('home.pengalamansejak') }}
            </h1>
            <p class="text-xl mt-2 leading-snug" style="font-family: 'Abhaya Libre', serif;">
                {{ __('home.deskrip1') }}
            </p>
        </div>

        <div class="fade bg-white h-auto w-auto md:w-100 p-5 text-center border border-gray-300 shadow-lg rounded-lg">
            <img src="image/admin.png" class="w-28 h-28 mx-auto object-contain">
            <h1 class="text-3xl mt-3" style="font-family: 'Abhaya Libre', serif; font-weight:600;">
                {{ __('home.timahli') }}
            </h1>
            <p class="text-xl mt-2 leading-snug" style="font-family: 'Abhaya Libre', serif;">
                {{ __('home.deskrip2') }}
            </p>
        </div>

        <div class="fade bg-white h-auto w-auto md:w-100 p-5 text-center border border-gray-300 shadow-lg rounded-lg">
            <img src="image/star.png" class="w-28 h-28 mx-auto object-contain">
            <h1 class="text-3xl mt-3" style="font-family: 'Abhaya Libre', serif; font-weight:600;">
                {{ __('home.layanan') }}
            </h1>
            <p class="text-xl mt-2 leading-snug" style="font-family: 'Abhaya Libre', serif;">
                {{ __('home.deskrip3') }}
            </p>
        </div>
    </div>

    <br>
    <br>

    <div class="h-50 flex flex-col relative overflow-hidden p-1">
        <h1 class="fade relative z-10 text-center text-black text-xl md:text-3xl"
            style="font-family: 'Vast Shadow', cursive;">
            {{ __('home.slogan1') }}
        </h1>
        <p class="fade md:px-60 text-center text-black mt-4 px-4 text-base md:text-2xl"
            style="font-family: 'ZCOOL XiaoWei'  , cursive;">
            {{ __('home.slogan2') }}
        </p>
    </div>

    <br>

    <div class="flex justify-center relative overflow-hidden pt-10 md:p-10">
        <h1 class="fade relative z-10 text-center text-black text-xl md:text-4xl"
            style="font-family: 'Vast Shadow', cursive;">
            {{ __('home.paketdomestik') }}
        </h1>
    </div>

    <div class="flex justify-center w-full mb-5 px-10">
        <hr class="fade mt-2 h-2 bg-white border-2 border-amber-400 w-full max-w-5xl rounded-xl ">
    </div>
    <div id="default-carousel" class=" fade relative w-full md:hidden" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[500px] overflow-hidden rounded-base md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurdieng.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurlasem.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurkarimun.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurmagelang.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>

        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m9 5 7 7-7 7" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="flex justify-center hidden md:block">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 p-10">

            @foreach($domesticPackages as $index => $package)
                @php
                    $translation = $package->translations->first();
                @endphp
                <!-- Item -->
                <div class="{{ $index < 2 ? 'fade-left' : 'fade-right' }} relative overflow-hidden group">
                    <img onclick="openPopup(this.src)" 
                         src="{{ str_starts_with($package->thumbnail, 'image/') ? asset($package->thumbnail) : asset('storage/' . $package->thumbnail) }}"
                         class="w-80 h-100 object-cover rounded-lg shadow-md">
                    <h1 class="mt-3 text-center text-lg font-semibold text-black opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                        {{ $translation->title ?? 'Package' }}
                    </h1>
                </div>
            @endforeach

        </div>
    </div>




    <div class="flex justify-center relative overflow-hidden pt-15 md:p-10 ">
        <h1 class="relative z-10 text-center text-black text-xl md:text-4xl" style="font-family: 'Vast Shadow', cursive;">
            {{ __('home.paketinternasional') }}
        </h1>
    </div>
    <div class="flex justify-center w-full mb-5 px-10">

        <hr class="fade mt-2 h-2 bg-white border-2 border-amber-400 w-full max-w-5xl rounded-xl ">
    </div>


    <div id="default-carousel" class=" fade relative w-full md:hidden " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[500px] overflow-hidden rounded-base md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurjepang.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurjepang2.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurvietnam.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img onclick="openPopup(this.src)" src="image/brosurvietnam2.jpeg" class="block w-full h-full object-cover"
                    alt="...">
            </div>

        </div>


        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-xl" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m9 5 7 7-7 7" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>


    <div class="flex justify-center hidden md:block">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 p-10">

            @foreach($internationalPackages as $index => $package)
                @php
                    $translation = $package->translations->first();
                @endphp
                <!-- Item -->
                <div class="{{ $index < 2 ? 'fade-left' : 'fade-right' }} relative overflow-hidden group">
                    <img onclick="openPopup(this.src)" 
                         src="{{ str_starts_with($package->thumbnail, 'image/') ? asset($package->thumbnail) : asset('storage/' . $package->thumbnail) }}"
                         class="fade w-80 h-100 object-cover rounded-lg shadow-md">
                    <h1 class="mt-3 text-center text-lg font-semibold text-black opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                        {{ $translation->title ?? 'Package' }}
                    </h1>
                </div>
            @endforeach

        </div>
    </div>

    <div class="p-5 border border-amber-400">

        <!-- Tombol Navigasi -->
        <div class="fade flex justify-center gap-4 mb-6 sm:justify-start ">
            <button onclick="showSection('mobil')"
                class="font-bold px-4 py-2 border-b-4 border-amber-400 text-amber-400 rounded-lg hover:bg-gray-100 text-xs md:text-xl"
                style="font-family: 'Roboto', sans-serif;">{{ __('layanan.button.mobil') }}</button>
            <button onclick="showSection('kapal')"
                class="font-bold px-4 py-2 border-b-4 border-amber-400 text-amber-400 rounded-lg hover:bg-gray-100 text-xs md:text-xl"
                style="font-family: 'Roboto', sans-serif;">{{ __('layanan.button.kapal') }}</button>
            <button onclick="showSection('mice')"
                class="font-bold px-4 py-2 border-b-4 border-amber-400 text-amber-400 rounded-lg hover:bg-gray-100 text-xs md:text-xl"
                style="font-family: 'Roboto', sans-serif;">{{ __('layanan.button.mice') }}</button>
            <button onclick="showSection('ziarah')"
                class="font-bold px-4 py-2 border-b-4 border-amber-400 text-amber-400 rounded-lg hover:bg-gray-100 text-xs md:text-xl"
                style="font-family: 'Roboto', sans-serif;">{{ __('layanan.button.ziarah') }}</button>
        </div>

        <!-- Konten -->
        <div id="kontenawal" class="fade text-black p-6 rounded-xl text-center">
            <h1 class="mb-4 text-xl md:text-3xl" style="font-family: 'Vast Shadow', cursive;">
                {{ __('layanan.layananunggulan') }}
            </h1>
            <p class="mb-4 text-xl md:text-2xl" style="font-family: 'ZCOOL XiaoWei', serif;">
                {{ __('layanan.deskripsi') }}
            </p>
            <h1 class="mt-20 text-base md:text-xl mb-4 text-center" style="font-family: 'ZCOOL XiaoWei', serif;">
                {{ __('layanan.deskripsi2') }}
            </h1>

        </div>

        <div id="mobil" class="hidden text-black p-6 rounded-xl">
            {!! __('layanan.mobilinfo') !!}
            <div class="md:px-120 md:py-2">
                <div class="slider w-full px-5 py-50 flex justify-center overflow-hidden relative md:py-70 ">
                    <img src="image/car1.jpeg" class="slide-image object-cover active">
                    <img src="image/car2.jpeg" class="slide-image object-cover">
                    <img src="image/car3.jpeg" class="slide-image object-cover">
                </div>
            </div>

        </div>

        <div id="kapal" class="hidden text-black p-6 rounded-xl">
            {!! __('layanan.kapalinfo') !!}
        </div>

        <div id="mice" class="hidden text-black p-6 rounded-xl">
            {!! __('layanan.miceinfo') !!}
        </div>

        <div id="ziarah" class="hidden text-black p-6 rounded-xl">
            {!! __('layanan.ziarahinfo') !!}

            <div class="md:px-120 md:py-2">
                <div class="slider w-full px-5 py-50 flex justify-center overflow-hidden relative md:py-70 ">
                    <img src="image/ziarah1.jpg" class="slide-image object-cover active">
                    <img src="image/ziarah2.jpg" class="slide-image object-cover">
                    <img src="image/ziarah3.jpg" class="slide-image object-cover">
                </div>
            </div>

        </div>

    </div>


    <div class="fade slider-container">
        <div class="slider-track">
            @foreach($galleryImages as $gallery)
                <img src="{{ str_starts_with($gallery->image_path, 'image/') ? asset($gallery->image_path) : asset('storage/' . $gallery->image_path) }}" 
                     alt="{{ $gallery->title }}">
            @endforeach

            <!-- Duplikasi untuk efek infinite -->
            @foreach($galleryImages as $gallery)
                <img src="{{ str_starts_with($gallery->image_path, 'image/') ? asset($gallery->image_path) : asset('storage/' . $gallery->image_path) }}" 
                     alt="{{ $gallery->title }}">
            @endforeach
        </div>
    </div>

    <br>
    <br>

    {{-- MOBILE CONTACT --}}
    <div class="flex flex-col p-5 md:hidden w-full gap-5">

        <h1 class="fade text-center text-black text-4xl" style="font-family: 'ZCOOL XiaoWei', serif;">
            THE SUN TOUR EN TRAVEL
        </h1>

        <p class="fade text-center text-black text-2xl px-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
            #Your Trusted Partner
        </p>

        <p class="fade text-center text-black text-xl px-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
            {{-- Jl. Jangli Tlawah V No.39a, Jatingaleh, Kec. Candisari, Kota Semarang, Jawa Tengah 50255 --}}
                        {{ __('home.jalan') }}

        </p>

        <!-- WhatsApp -->
        <a href="https://wa.me/6287832434933" target="_blank" class="fade-left">
            <div class="bg-white flex items-center border border-gray-300 shadow-lg rounded-lg px-5 py-4">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="image/whatsapp.png" class="w-full h-full object-contain">
                </div>
                <p class="text-black text-xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                    +62 878 3243 4933
                </p>
            </div>
        </a>

        <!-- Email -->
        <a href="mailto:sun2indonesia@gmail.com" class="fade-left">
            <div class="bg-white flex items-center border border-gray-300 shadow-lg rounded-lg px-5 py-4">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="image/email.png" class="w-full h-full object-contain">
                </div>
                <p class="text-black text-xl ml-4 break-all" style="font-family: 'ZCOOL XiaoWei', cursive;">
                    sun2indonesia@gmail.com
                </p>
            </div>
        </a>

        <!-- Instagram -->
        <a href="https://instagram.com/thesuntourentravel" target="_blank" class="fade-left">
            <div class="bg-white flex items-center border border-gray-300 shadow-lg rounded-lg px-5 py-4">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="image/instagram.png" class="w-full h-full object-contain">
                </div>
                <p class="text-black text-xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                    thesuntourentravel
                </p>
            </div>
        </a>

        <!-- Facebook -->
        <a href="https://facebook.com/thesuntour" target="_blank" class="fade-left">
            <div class="bg-white flex items-center border border-gray-300 shadow-lg rounded-lg px-5 py-4">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="image/facebook.png" class="w-full h-full object-contain">
                </div>
                <p class="text-black text-xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                    thesuntour
                </p>
            </div>
        </a>

    </div>




    {{-- DESKTOP CONTACT --}}
    <div class="h-35 flex flex-col  p-5 hidden md:block">
        <h1 class="fade relative z-10 text-center text-black text-5xl" style="font-family: 'ZCOOL XiaoWei', serif;">
            THE SUN TOUR EN TRAVEL
        </h1>
        <p class="fade relative z-10 text-center text-black mt-4 px-4 text-2xl"
            style="font-family: 'ZCOOL XiaoWei'  , cursive;">
            #Your Trusted Partner
        </p>

        <br>
        <p class="fade relative z-10 text-center text-black mt-4 px-4 text-2xl"
            style="font-family: 'ZCOOL XiaoWei'  , cursive;">
            {{-- Jl. Jangli Tlawah V No.39a, Jatingaleh, Kec. Candisari, Kota Semarang, Jawa Tengah 50255 --}}
            {{ __('home.jalan') }}
        </p>'

        <br>

        <div class="flex justify-center items-center gap-5">
            <a href="https://wa.me/6287832434933" target="_blank" class="fade-left block">
                <div class="fade bg-white flex flex-row items-center border border-gray-300 shadow-lg rounded-lg px-5 py-5">
                    <img src="image/whatsapp.png" class="w-14 h-14 object-contain">
                    <p class="text-black text-2xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        +62 878 3243 4933
                    </p>
                </div>
            </a>

            <a href="mailto:sun2indonesia@gmail.com" class="fade-right block">
                <div class="fade bg-white flex flex-row items-center border border-gray-300 shadow-lg rounded-lg px-5 py-7">
                    <img src="image/email.png" class="w-10 h-10 object-contain">
                    <p class="text-black text-2xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        sun2indonesia@gmail.com
                    </p>
                </div>
            </a>

        </div>

        <br>

        <div class="fade flex justify-center items-center gap-5">

            <a href="https://instagram.com/thesuntourentravel" target="_blank" class="fade-left block">
                <div class="fade bg-white flex flex-row items-center border border-gray-300 shadow-lg rounded-lg px-5 py-5">
                    <img src="image/instagram.png" class="w-10 h-10 object-contain">
                    <p class="text-black text-2xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        thesuntourentravel
                    </p>
                </div>
            </a>

            <a href="https://facebook.com/thesuntour" target="_blank" class="fade-right block">
                <div
                    class="fade bg-white flex flex-row items-center border border-gray-300 shadow-lg rounded-lg px-20 py-3">
                    <img src="image/facebook.png" class="w-14 h-14 object-contain">
                    <p class="text-black text-2xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        thesuntour
                    </p>
                </div>
            </a>

        </div>

        <br>
        <br>

    </div>
@endsection