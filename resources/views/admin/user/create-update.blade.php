@extends("layouts.admin.admin-panel")
@section("title")
    Kullanıcı {{ isset($user) ? "Güncelleme" : "Ekleme" }}
@endsection
@section("style")
    <link rel="stylesheet" href="{{ asset("assets/plugins/flatpickr/flatpickr.min.css") }}">

@endsection

@section("content")
    <div class="container">
        <div class="content-wrapper">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title my-4">Kullanıcı {{ isset($user) ? "Güncelleme" : "Ekleme" }}</h4>
                        <form class="forms-sample" method="POST" id="userForm"
                              action="{{ isset($user) ? route('user.edit', ['user' => $user->id]) : route('user.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Ad Soyad</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad"
                                       value="{{ isset($user) ? $user->name : old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email Adresi</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Email Adresi"
                                       value="{{ isset($user) ? $user->email : old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Parola</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Parola" value="">
                            </div>
                            <div class="form-group">
                                <label for="settingsPhoneNumber" class="form-label">Telefon Numarası</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phone_number"
                                       placeholder="Telefon Numarası"
                                       value="{{ isset($user) ? $user->phone_number : old('phone_number') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Web Sitesi</label>
                                <input type="text" class="form-control" id="website" name="website"
                                       placeholder="Web Sitesi"
                                       value="{{ isset($user) ? $user->website : old('website') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Meslek</label>
                                <input type="text" class="form-control" id="job" name="job" placeholder="Meslek"
                                       value="{{ isset($user) ? $user->job : old('job') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea2">Adres Bilgileri</label>
                                <textarea class="form-control" id="resume" rows="2" name="resume">
                                        {!! isset($user) ? $user->resume : old('resume') !!}
                                    </textarea>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Doğum Günü Tarihi</label>
                                <input type="text" class="form-control flatpickr2" name="birthday" id="birthday"
                                       placeholder="GG/AA/Y"
                                       value="{{ isset($user) ? $user->birthday : old('birthday') }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3">Profil Resmi</label>
                            <div class="row">
                                <div class="col-8 input-group-append d-block">
                                    <div class="d-flex mt-4">
                                    <button id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Yükle
                                    </button>
                                    <input type="text" id="thumbnail" class="form-control" type="text" name="profile_image"
                                           value="{{ isset($user) ? $user->profile_image : old('profile_image') }}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="col-4">
                                    <img class="img-md rounded-circle" id="image" src="{{ auth()->user()->profile_image }}" alt="Profile image">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Adres Bilgileri</label>
                                <textarea class="form-control" id="adress" rows="2" name="adress">
                                        {!! isset($user) ? $user->adress : old('adress') !!}
                                    </textarea>
                            </div>
                            <div class="form-group">
                                <label class="mt-3">CV Yükle</label>
                                <div class="row">
                                    <div class="col-8 input-group-append d-block">
                                        <div class="d-flex mt-4">
                                            <button id="cv" data-input="cvPdf" data-preview="holder" class="btn btn-primary" type="button">
                                                <i class="fa fa-picture-o"></i> Yükle
                                            </button>
                                            <input type="text" id="cvPdf" class="form-control" type="text" name="cv"
                                                   value="{{ isset($user) ? $user->cv : "" }}">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                    <div class="col-4">
                                        <iframe height="200px" width="100%" id="cvResume" src="{{ auth()->user()->cv }}" alt="CV">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check-label ml-4">
                                <input class="form-check-input" type="checkbox" name="status" value="1" id="status"
                                    {{ isset($user) && $user->status  ? "checked" : (old('status') ? 'checked' : "") }}>
                                <label class="form-check-label" for="status">
                                    Kullanıcı Aktif Olsun mu?
                                </label>
                            </div>
                            <button type="button" class="btn btn-success mr-2 mt-3"
                                    id="btnSave">{{ isset($user) ? "Güncelle" : "Kaydet" }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>

    <script src="{{ asset("/vendor/laravel-filemanager/js/stand-alone-button.js") }}"></script>

    <script>
        $("#birthday").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    <script>
        let name = $('#name');
        let email = $('#email');
        let phoneNumber = $('#phoneNumber');
        let job = $('#job');
        let password = $('#password');


        $(document).ready(function () {
            $('#btnSave').click(function () {

                if (name.val().trim() === "" || name.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı adı soyadı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (email.val().trim() === "" || email.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı email boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (phoneNumber.val().trim() === "" || phoneNumber.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı telefon numarası geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (job.val().trim() === "" || job.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı mesleği boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                @if(!isset($user))
                else if (password.val().trim() === "" || password.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı parola boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                @endif
                else {
                    $("#userForm").submit();
                }
            });


            $('#lfm').filemanager('image');
            $('#cv').filemanager('cv');
            $('#thumbnail').change(function () {
                $('#image').attr("src", $(this).val());
            })
            $('#cvPdf').change(function () {
                $('#cvResume').attr("src", $(this).val());
            })
        });


    </script>

@endsection




