@extends('layouts.welcome')
@section('content')
    <section class="case-studies" id="case-studies-section">
        <div class="row grid-margin">
            <div class="col-12 text-center pb-5">
                <h2>Studi Kasus Kami</h2>
                <h6 class="section-subtitle text-muted">
                    Beberapa contoh penerapan aplikasi sistem pakar dalam mengelola stres kerja.
                </h6>
            </div>
            @forelse ($educations as $education)
                <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
                    <div class="card color-cards">
                        <div class="card-body p-0">
                            <div class="bg-primary text-center card-contents">
                                <div class="card-image">
                                    <img src="{{ asset('frontend/images/Group95.svg') }}" class="case-studies-card-img"
                                        alt="" />
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
                                <h6 class="m-0 pb-1">Studi Kasus 1</h6>
                                <p>{{ $education->slug }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p style="text-decoration-color: red">Tidak ada data edukasi</p>
            @endforelse
        </div>
    </section>
@endsection
