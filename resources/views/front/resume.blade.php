@extends("layouts.front.front")
@section("style")
    <link rel="stylesheet" href="{{ asset("assets/admin/font-awesome/css/font-awesome.min.css") }}" />

@endsection
@section("title")
    Cv Özgeçmiş
@endsection

@section("content")
    @foreach($list as $item)
    <section class="intro-section">
        <h2 class="section-title">Merhaba ben {{ $item->name }}</h2>
        <p>{{ $item->resume }}</p>
        <a href="#!" class="btn btn-primary btn-hire-me">Özgeçmiş İncele</a>
    </section>
    <section class="services-section">
        <h6 class="section-subtitle">UZMANLIK ALANI</h6>
        <h2 class="section-title">Yetenekler</h2>
        <div class="row">
            @foreach($ability as $info)
                <div class="media service-card col-lg-6">
                    <div class="service-icon">
                        <img src="{{ asset("assets/front/images/001-target.svg")}}" alt="target">
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">{{ $info->title }}</h5>
                        <p class="service-description">{{ $info->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @endforeach
@endsection

@section("js")

@endsection

