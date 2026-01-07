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
                    <img src="{{ str_starts_with($background->image_path, 'image/') ? asset($background->image_path) : asset('storage/' . $background->image_path) }}"
                        alt="{{ $translation->name ?? $category->slug }}" class="category-bg {{ $bgIndex === 0 ? 'active' : '' }}"
                        data-category="{{ $category->slug }}" data-bg-index="{{ $bgIndex }}">
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

                        <div class="fade flex gap-6 rounded-xl p-6 shadow-lg border border-gray-200 bg-white">
                            <!-- Package Image -->
                            <img class="rounded-lg object-cover w-[375px] h-full mb-4 cursor-pointer hover:opacity-90 transition"
                                onclick="openPopup(this.src)"
                                src="{{ str_starts_with($package->thumbnail, 'image/') ? asset($package->thumbnail) : asset('storage/' . $package->thumbnail) }}"
                                alt="{{ $packageTranslation->title ?? 'Package' }}">

                            <!-- Package Info -->
                            <div class="flex flex-col space-y-3">
                                <!-- Title -->
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900"
                                    style="font-family: 'Roboto', sans-serif;">
                                    {{ $packageTranslation->title ?? 'Untitled Package' }}
                                </h5>

                                <!-- Duration & Price -->
                                <div class="flex items-center justify-between">
                                    @if($package->duration_days)
                                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold">
                                            {{ $package->duration_days }}{{ __('packages.hari') }}{{ $package->duration_nights ? $package->duration_nights . __('packages.malam') : '' }}
                                        </span>
                                    @endif

                                    @if($package->price)
                                        <span class="text-xl font-bold text-green-600">
                                            Rp {{ number_format($package->price, 0, ',', '.') }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Description -->
                                @if($packageTranslation && $packageTranslation->description)
                                    <p class="text-gray-700 text-base leading-relaxed">
                                        {{ $packageTranslation->description }}
                                    </p>
                                @endif

                                <!-- Itinerary -->
                                @if($packageTranslation && $packageTranslation->itinerary)
                                    <div class="border-t pt-3">
                                        <h6 class="font-semibold text-gray-900 mb-2 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                            {{ $locale === 'id' ? 'Itinerary' : 'Itinerary' }}
                                        </h6>
                                        <div class="text-gray-600 text-sm prose prose-sm max-w-none">
                                            {!! nl2br(e($packageTranslation->itinerary)) !!}
                                        </div>
                                    </div>
                                @endif

                                <!-- Services Included -->
                                @if($package->services && $package->services->count() > 0)
                                    <div class="border-t pt-3">
                                        <h6 class="font-semibold text-gray-900 mb-2 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $locale === 'id' ? 'Layanan Termasuk' : 'Services Included' }}
                                        </h6>
                                        <div class="grid grid-cols-2 gap-2">
                                            @foreach($package->services as $service)
                                                @php
                                                    $serviceTranslation = $service->translations->first();
                                                @endphp
                                                <div class="flex items-center text-sm text-gray-700">
                                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $serviceTranslation->name ?? $service->slug }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Terms & Conditions -->
                                @if($packageTranslation && $packageTranslation->terms_conditions)
                                    <div class="border-t pt-3">
                                        <h6 class="font-semibold text-gray-900 mb-2 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $locale === 'id' ? 'Syarat & Ketentuan' : 'Terms & Conditions' }}
                                        </h6>
                                        <div class="text-gray-600 text-xs">
                                            {!! nl2br(e($packageTranslation->terms_conditions)) !!}
                                        </div>
                                    </div>
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