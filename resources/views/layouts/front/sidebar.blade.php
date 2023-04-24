<aside>
    @foreach($list as $item)
    <div class="profile-img-wrapper">
        <img src="{{ $item->profile_image }}" alt="profile">
    </div>
    @endforeach
    @foreach($list as $item)
        <h1 class="profile-name">{{ $item->name }}</h1>
        <div class="text-center">
            <span class="badge badge-white badge-pill profile-designation">{{ $item->job }}</span>
        </div>
    @endforeach
        <div class="d-flex justify-content-center">
            @foreach($social as $media)
            <span class="social-links">
                <a href="{{ $media->link }}" class="social-link bg-transparent ">{!! $media->icons->icon_class !!}</a>
            </span>
    @endforeach
        </div>
    <div class="widget">
        @foreach($list as $item)
        <h5 class="widget-title">Kişisel Bilgiler</h5>
        <div class="widget-content">

            <p>Doğum Günü : {{ \Carbon\Carbon::parse($item->birthday)->translatedFormat("d-m-Y") }}</p>
            <a href="http://{{ $item->website }}" style="text-decoration: none">Web Site : {{ $item->website }}</a>
            <p>Telefon : {{ $item->phone_number }}</p>
            <a href="mailto:{{ $item->email }}" style="text-decoration: none">E-mail : {{ $item->email }} </a>
            <p>Adres : {{ $item->adress }}</p>
            @endforeach
            <a class="btn btn-download-cv btn-primary rounded-pill" href="{{ $item->cv }}" target="_blank" download="recep_gokdemir_cv.pdf">
                <img src="{{ asset("assets/front/images/download.svg")}}" alt="download" class="btn-img">CV İNDİR
            </a>
        </div>
    </div>
</aside>
