@extends('layouts.welcome')
@section('content')
    <div class="banner">
        @include('components.banner')
    </div>
    <section class="features-overview" id="features-section">
        <div class="content-header">
            <h2>Cara Kerja Aplikasi</h2>
            <h6 class="section-subtitle text-muted">
                Aplikasi ini berfungsi sebagai alat operasional yang mudah digunakan<br />untuk memenuhi kebutuhan pengguna
                dalam mengelola stres kerja.
            </h6>
        </div>
        <div class="d-md-flex justify-content-between">
            <div class="grid-margin d-flex justify-content-start">
                <div class="features-width">
                    <img src="{{ asset('frontend/images/Group12.svg') }}" alt="" class="img-icons" />
                    <h5 class="py-3">Identifikasi<br />Tingkat Stres</h5>
                    <p class="text-muted">
                        Aplikasi ini menggunakan metode tanya jawab untuk mengidentifikasi tingkat stres kerja Anda.
                    </p>
                    <a href="{{ route('assessment') }}">
                        <p class="readmore-link">Selengkapnya</p>
                    </a>
                </div>
            </div>
            <div class="grid-margin d-flex justify-content-center">
                <div class="features-width">
                    <img src="{{ asset('frontend/images/Group7.svg') }}" alt="" class="img-icons" />
                    <h5 class="py-3">Rekomendasi<br />Penanganan</h5>
                    <p class="text-muted">
                        Berdasarkan hasil identifikasi, aplikasi memberikan rekomendasi penanganan stres yang sesuai.
                    </p>
                    <a href="{{ route('assessment') }}">
                        <p class="readmore-link">Selengkapnya</p>
                    </a>
                </div>
            </div>
            <div class="grid-margin d-flex justify-content-end">
                <div class="features-width">
                    <img src="{{ asset('frontend/images/Group5.svg') }}" alt="" class="img-icons" />
                    <h5 class="py-3">Pemantauan<br />Berkala</h5>
                    <p class="text-muted">
                        Aplikasi ini memungkinkan pemantauan tingkat stres secara berkala untuk memastikan efektivitas
                        penanganan.
                    </p>
                    <a href="{{ route('assessment') }}">
                        <p class="readmore-link">Selengkapnya</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="digital-marketing-service" id="digital-marketing-section">
        <div class="row align-items-center">
            <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                <h3 class="m-0">
                    Kami Menyediakan Berbagai Layanan<br />Untuk Mengelola Stres Kerja!
                </h3>
                <div class="col-lg-7 col-xl-6 p-0">
                    <p class="py-4 m-0 text-muted">
                        Aplikasi ini menawarkan berbagai fitur untuk membantu Anda mengidentifikasi, menangani, dan memantau
                        tingkat stres kerja.
                    </p>
                    <p class="font-weight-medium text-muted">
                        Dengan fitur-fitur pintar, aplikasi ini menjadi alat yang kuat untuk mengelola stres kerja secara
                        efektif.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                <img src="images/Group1.png" alt="" class="img-fluid" />
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                <img src="{{ asset('frontend/images/Group2.png') }}" alt="" class="img-fluid" />
            </div>
            <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                <h3 class="m-0">
                    Agensi Digital Terdepan<br />Untuk Solusi Bisnis Anda.
                </h3>
                <div class="col-lg-9 col-xl-8 p-0">
                    <p class="py-4 m-0 text-muted">
                        Dilengkapi dengan fitur-fitur mengesankan dan dioptimalkan dengan baik, aplikasi ini dirancang untuk
                        memberikan kinerja terbaik dalam segala situasi.
                    </p>
                    <p class="pb-2 font-weight-medium text-muted">
                        Fitur-fitur pintarnya membuatnya menjadi alat yang berdiri sendiri dalam membangun situs web.
                    </p>
                </div>
                <a href="{{ route('assessment') }}" class="btn btn-info">Selengkapnya</a>
            </div>
        </div>
    </section>
    <section class="case-studies" id="case-studies-section">
        <div class="row grid-margin">
            <div class="col-12 text-center pb-5">
                <h2>Studi Kasus Kami</h2>
                <h6 class="section-subtitle text-muted">
                    Beberapa contoh penerapan aplikasi sistem pakar dalam mengelola stres kerja.
                </h6>
            </div>
            @foreach ($educations as $education)
                <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
                    <div class="card color-cards">
                        <div class="card-body p-0">
                            <div class="bg-primary text-center card-contents">
                                <div class="card-image">
                                    {{-- <img src="{{ asset($education->image) }}" class="case-studies-card-img"
                                        alt="{{ $education->title }}" /> --}}

                                    @php
                                        $imagePath = asset($education->image);
                                        if (!file_exists(public_path($education->image))) {
                                            $imagePath = asset('storage/' . $education->image);
                                        }
                                    @endphp
                                    <img src="{{ $imagePath }}" class="case-studies-card-img" alt="">
                                </div>
                                <div class="card-desc-box d-flex align-items-center justify-content-around">
                                    <div>
                                        <h6 class="text-white pb-2 px-3">
                                            {{ $education->title }}
                                        </h6>
                                        <a href="{{ route('blog-detail', $education->slug) }}" class="btn btn-white">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-details text-center pt-4">
                                <p>{{ Str::limit($education->title, 50) }}</p>
                                {{-- <h6 class="m-0 pb-1">{{ $education->author }}</h6> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="border-top">
        @include('components.footer')
    </footer>
@endsection
