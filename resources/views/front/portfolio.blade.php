@extends("layouts.front.front")
@section("style")
    <link rel="stylesheet" href="{{ asset("assets/admin/font-awesome/css/font-awesome.min.css") }}" />

@endsection
@section("title")
    Cv Özgeçmiş
@endsection

@section("content")
    <section class="portfolio-section">
        <h2 class="section-title">PORTFOLIO</h2>

        <div class="portfolio-wrapper">
            @foreach($portfolio as $item)
                <figure class="portfolio-item hover-box">
                    <img src="{{ $item->image }}" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 01</h5>

                        <div class="float-left">
                            <p class="portfolio-item-description ">{{ $item->title }}</p>
                        </div>
                        <div class="float-right">
                            <p class="portfolio-item-description">{{ $item->website }}</p>
                        </div>
                        <div class="fixed-bottom text-center mb-5">
                            <p class="portfolio-item-description">{{ $item->about }}</p>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>


    </section>
@endsection

@section("js")

@endsection

