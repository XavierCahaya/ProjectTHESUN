@extends('main/main')

@section('container')
    <div class="max-w-6xl mx-auto my-12 px-6">

        <div class="fade flex flex-col items-center">
            <img src="image/logo.png" class="zoom-in w-150  ">

            <!-- Teks di bawah gambar -->
            <div class="md:px-3 justify-center text-center">
                {!! __('about.description') !!}
            </div>

        </div>
    </div>

    <div class="fade flex justify-center">
        <div class="max-w-3xl grid grid-cols-1 md:grid-cols-2 gap-6 px-10">
            <div class="fade p-6 justify-center text-center md:col-span-2">

                <h1 class="text-xl md:text-2xl leading-relaxed" style="font-family: 'ZCOOL XiaoWei', cursive;">
                    <!-- Silakan isi sendiri -->
                    {{ __('home.jalan') }}
                </h1>

                <a href="https://maps.app.goo.gl/URPm5AH87jwWhWP58" target="_blank"
                    class="mt-4 inline-block text-blue-600 underline">
                    {{ __('about.cta_maps') }} →
                </a>
            </div>
            <!-- WhatsApp -->
            <a href="https://wa.me/6287832434933" target="_blank" class="fade-left">
                <div class="flex items-center">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="image/whatsapp.png" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        +62 878 3243 4933
                    </p>
                </div>
            </a>

            <!-- Email -->
            <a href="mailto:sun2indonesia@gmail.com" class="fade-right">
                <div class="flex items-center">
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
                <div class="flex items-center">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="image/instagram.png" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        thesuntourentravel
                    </p>
                </div>
            </a>

            <!-- Facebook -->
            <a href="https://facebook.com/thesuntour" target="_blank" class="fade-right">
                <div class="flex items-center">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="image/facebook.png" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-xl ml-4" style="font-family: 'ZCOOL XiaoWei', cursive;">
                        thesuntour
                    </p>
                </div>
            </a>

        </div>
    </div>



    <style>
        .fade {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
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
    </style>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        });

        // ---- animasi saat halaman dibuka ----
        setTimeout(() => {
            document.querySelectorAll(".fade, .fade-left, .fade-right, .zoom-in, .zoom-out").forEach(el => {
                el.classList.add("show");
            });
        }, 50);
    </script>

    <br>
    <br>
@endsection