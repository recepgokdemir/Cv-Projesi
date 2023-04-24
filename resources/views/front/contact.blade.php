@extends("layouts.front.front")
@section("style")
    <link rel="stylesheet" href="{{ asset("assets/admin/font-awesome/css/font-awesome.min.css") }}" />

@endsection
@section("title")
    Cv Özgeçmiş
@endsection

@section("content")
        <section class="contact-section">
            @foreach($list as $item)
            <h3>İLETİŞİM</h3>
            <p class="mb-4">Benimle iletişime geçmek için aşağıdaki formu doldurabilir ya da email, telefon üzerinden ulaşabilirsiniz.</p>
            <div class="contact-cards-wrapper">
                <div class="contact-card">
                    <h6 class="contact-card-title">Telefon</h6>
                    <p class="contact-card-content">{{ $item->phone_number }}</p>
                </div>
                <div class="contact-card">
                    <h6 class="contact-card-title">Email</h6>
                    <p class="contact-card-content">{{ $item->email }}</p>
                </div>
            </div>
            <form action="" class="contact-form" method="POST" id="contactForm">
                @csrf
                <div class="form-group form-group-name">
                    <label for="name" class="sr-only">Ad/Soyad</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="AD/SOYAD">
                </div>
                <div class="form-group form-group-email">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="EMAIL">
                </div>
                <div class="form-group">
                    <label for="message" class="sr-only">Mesaj</label>
                    <textarea name="message" id="message" class="form-control" placeholder="MESAJ" rows="5"></textarea>
                </div>
                    <div class="form-group">
                        @error('g-recaptcha-response')
                        <div class="alert alert-danger">{!! "Lütfen google doğrulamasını yapınız!" !!}</div>
                        @enderror
                        {!! htmlFormSnippet() !!}
                    </div>
                    <button type="button" class="btn btn-primary" id="btnSave">GÖNDER</button>


            </form>
        </section>
            @endforeach
@endsection

@section("js")
    <script>
        let name = $('#name');
        let email = $('#email');
        let message = $('#message');


        $(document).ready(function () {
            $('#btnSave').click(function () {

                if (name.val().trim() === "" || name.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Ad soyad boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (email.val().trim() === "" || email.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Email boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (message.val().trim() === "" || message.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Mesaj boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else {
                    $("#contactForm").submit();
                }
            });

        });


    </script>


@endsection

