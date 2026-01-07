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

        .category-box.active {
            background-color: #fbbf24;
            color: white;
            border-color: #fbbf24;
        }

        .swiper-slide {
            width: auto !important;
        }

        .fade {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .fade.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Background fade transition */
        .category-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .category-bg.active {
            opacity: 1;
        }
    </style>

    <div class="flex justify-center relative overflow-hidden p-2">
        <h1 class="relative z-10 text-center text-black text-2xl md:text-4xl px-1"
            style="font-family: 'Vast Shadow', cursive;">
            {{ __('packages.jelajahpaket') }}
        </h1>
    </div>

    <div class="w-full flex justify-center px-5 pt-8 md:pt-0">
        <div class="overflow-hidden rounded-xl border border-gray-300 px-6 py-3 max-w-[720px] w-full mx-3">
            <div class="swiper categorySwiper">
                <div class="swiper-wrapper text-lg font-medium cursor-pointer select-none">
                    @foreach($categories as $index => $category)
                        @php
                            $translation = $category->translations->first();
                        @endphp
                        <div class="swiper-slide">
                            <div class="category-box {{ $index === 0 ? 'active' : '' }}" data-category="{{ $category->slug }}">
                                {{ $translation->name ?? $category->slug }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <h1 class="mt-2 text-sm px-5 flex justify-center items-center text-center">{{ __('packages.geser') }}</h1>

    <br>

    <div id="imgPopup" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center">
        <div class="relative">
            <button onclick="closePopup()"
                class="absolute -top-4 -right-4 bg-white text-black rounded-full w-15 h-15 flex items-center justify-center shadow-lg text-3xl">
                ×
            </button>
            <img id="popupImage" class="max-w-[90vw] max-h-[90vh] rounded shadow-lg">
        </div>
    </div>

    @foreach($categories as $catIndex => $category)
        @php
            $translation = $category->translations->first();
        @endphp

        <div id="{{ $category->slug }}" class="category-content {{ $catIndex === 0 ? '' : 'hidden' }}">
            <!-- Background section with rotating images -->
            <div class="relative w-full h-[800px] overflow-hidden shadow-md mb-10">
                @foreach($category->backgrounds as $bgIndex => $background)
                    <img src="{{ asset('storage/' . $background->image_path) }}" alt="{{ $translation->name ?? $category->slug }}"
                        class="category-bg {{ $bgIndex === 0 ? 'active' : '' }}" data-category="{{ $category->slug }}"
                        data-bg-index="{{ $bgIndex }}">
                @endforeach

                <div class="absolute inset-0 bg-black/30"></div>

                <div class="relative z-10 flex flex-col items-center justify-center h-full p-6 text-white">
                    <h1 class="text-5xl text-shadow-lg/50 font-bold mb-6 text-center"
                        style="font-family: 'Vast Shadow', cursive;">
                        {{ $translation->name ?? $category->slug }}
                    </h1>
                    @if($translation && $translation->description)
                        <p class="text-xl text-center max-w-3xl">
                            {{ $translation->description }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Packages grid -->
            <div class="flex justify-center p-10">
                <div class="grid grid-col-1 md:grid-cols-2 gap-15">
                    @foreach($category->packages as $package)
                        @php
                            $packageTranslation = $package->translations->first();
                        @endphp

                        <div
                            class="fade flex flex-col items-center rounded-xl p-6 rounded-base shadow-xs md:flex-row w-full border-b-4 border-amber-400">
                            <img class="rounded-lg object-cover w-full rounded-base h-80 md:h-auto md:w-[400px] mb-4 md:mb-0"
                                onclick="openPopup(this.src)" src="{{ asset('storage/' . $package->thumbnail) }}"
                                alt="{{ $packageTranslation->title ?? 'Package' }}">

                            <div class="flex flex-col justify-between md:p-4 leading-normal">
                                <h5 class="ml-5 mb-2 text-2xl font-bold tracking-tight text-heading"
                                    style="font-family: 'Roboto', sans-serif;">
                                    {{ $packageTranslation->title ?? 'Untitled Package' }}
                                </h5>

                                @if($packageTranslation && $packageTranslation->description)
                                    <p class="ml-5 text-base text-gray-700">
                                        {{ $packageTranslation->description }}
                                    </p>
                                @endif

                                @if($package->duration_days)
                                    <p class="ml-5 mt-2 text-sm font-semibold text-amber-600">
                                        {{ $package->duration_days }}D{{ $package->duration_nights ? $package->duration_nights . 'N' : '' }}
                                    </p>
                                @endif

                                @if($package->price)
                                    <p class="ml-5 mt-1 text-lg font-bold text-green-600">
                                        Rp {{ number_format($package->price, 0, ',', '.') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Background rotation data
        const backgroundRotation = {};

        @foreach($categories as $category)
            backgroundRotation['{{ $category->slug }}'] = {
                current: 0,
                total: {{ $category->backgrounds->count() }},
                interval: null
            };
        @endforeach

            function rotateBackground(categorySlug) {
                const data = backgroundRotation[categorySlug];
                if (!data || data.total <= 1) return;

                const backgrounds = document.querySelectorAll(`.category-bg[data-category="${categorySlug}"]`);

                backgrounds[data.current].classList.remove('active');
                data.current = (data.current + 1) % data.total;
                backgrounds[data.current].classList.add('active');
            }

        function startBackgroundRotation(categorySlug) {
            stopAllBackgroundRotations();

            const data = backgroundRotation[categorySlug];
            if (data && data.total > 1) {
                data.interval = setInterval(() => rotateBackground(categorySlug), 5000);
            }
        }

        function stopAllBackgroundRotations() {
            Object.keys(backgroundRotation).forEach(slug => {
                if (backgroundRotation[slug].interval) {
                    clearInterval(backgroundRotation[slug].interval);
                    backgroundRotation[slug].interval = null;
                }
            });
        }

        // Category switching
        document.querySelectorAll('.category-box').forEach(box => {
            box.addEventListener('click', function () {
                const categorySlug = this.getAttribute('data-category');

                // Update active category box
                document.querySelectorAll('.category-box').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Hide all category content
                document.querySelectorAll('.category-content').forEach(content => {
                    content.classList.add('hidden');
                });

                // Show selected category
                const targetContent = document.getElementById(categorySlug);
                if (targetContent) {
                    targetContent.classList.remove('hidden');

                    // Start background rotation for this category
                    startBackgroundRotation(categorySlug);

                    // Trigger fade animation for packages
                    setTimeout(() => {
                        targetContent.querySelectorAll('.fade').forEach((el, index) => {
                            setTimeout(() => el.classList.add('show'), index * 100);
                        });
                    }, 100);
                }
            });
        });

        // Image popup functions
        function openPopup(src) {
            document.getElementById('imgPopup').classList.remove('hidden');
            document.getElementById('popupImage').src = src;
        }

        function closePopup() {
            document.getElementById('imgPopup').classList.add('hidden');
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Start rotation for first category
            const firstCategory = document.querySelector('.category-box.active');
            if (firstCategory) {
                const categorySlug = firstCategory.getAttribute('data-category');
                startBackgroundRotation(categorySlug);
            }

            // Show first category packages with fade
            setTimeout(() => {
                document.querySelectorAll('.category-content:not(.hidden) .fade').forEach((el, index) => {
                    setTimeout(() => el.classList.add('show'), index * 100);
                });
            }, 100);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const categorySwiper = new Swiper('.categorySwiper', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            freeMode: true,
        });
    </script>
@endsection