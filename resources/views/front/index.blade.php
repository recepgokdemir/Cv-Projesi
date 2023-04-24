@extends("layouts.front.front")
{{--@section('title')--}}
{{--    --}}
{{--@endsection    --}}
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
        <a href="{{ route("resume") }}" class="btn btn-primary btn-hire-me">Özgeçmiş İncele</a>
    </section>
    <section class="resume-section">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="section-subtitle">ÖZGEÇMİŞ</h6>
                <h2 class="section-title">EĞİTİM</h2>
                <ul class="time-line">
                    @foreach($education as $value)
                    <li class="time-line-item">
                        <span class="badge badge-primary">{{ $value->education_year }}</span>
                        <h6 class="time-line-item-title">{{ $value->school_name }}</h6>
                        <p class="time-line-item-subtitle">{{ $value->department }}</p>
                        <p class="time-line-item-content">{{ $value->description }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <h6 class="section-subtitle">ÖZGEÇMİŞ</h6>
                <h2 class="section-title">DENEYİMLER</h2>
                <ul class="time-line">
                    @foreach($experience as $info )
                    <li class="time-line-item">
                        <span class="badge badge-primary">{{ $info->date }}</span>
                        <h6 class="time-line-item-title">{{ $info->company_name }}</h6>
                        <p class="time-line-item-subtitle">{{ $info->task_name }}</p>
                        <p class="time-line-item-content">{{ $info->description }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
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

