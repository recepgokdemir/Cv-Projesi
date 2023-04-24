@extends("layouts.admin.admin-panel")
@section("title")
    Sosyal Medya {{ isset($user) ? "Güncelleme" : "Ekleme" }}
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
                        <h4 class="card-title">Sosyal Medya Bilgileri {{ isset($socialMedia) ? "Güncelleme" : "Ekleme" }}</h4>
                        <form class="forms-sample" id="socialMediaForm"
                              action="{{ isset($socialMedia) ? route('social-media.edit', ['socialMedia'=>$socialMedia->id]) : route("social-media.create") }}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Sosyal Medya Adı</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Sosyal medya adını yazınız"
                                       value="{{ isset($socialMedia) ? $socialMedia->name : "" }}"
                                >
                                @error('name')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">link</label>
                                <input type="text"
                                       class="form-control"
                                       id="link"
                                       name="link"
                                       placeholder="Sosyal medya linkiniz"
                                       value="{{ isset($socialMedia) ? $socialMedia->link : "" }}"
                                >
                                @error('link')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="icon">İkon</label>
                               <select class="form-select form-control form-control-solid-bordered m-b-sm"
                               aria-label="Icon Seçimi"
                               name="icon_id"
                               >
                                   <option value="{{ null }}">Icon Seçimi</option>
                                   @foreach($icons as $item)
                                       <option value="{{ $item->id }}"{{ isset($socialMedia) && isset($item->icon_name) ? "selected": "" }}>
                                           {{ $item->icon_name }}
                                       </option>
                                   @endforeach
                               </select>
                                @error('icon_id')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="order">Sıralama</label>
                                <input type="number"
                                       class="form-control"
                                       id="order"
                                       name="order"
                                       placeholder="Sıralama yazın"
                                       value="{{ isset($socialMedia) ? $socialMedia->order : "" }}"
                                >
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1"
                                       id="status" {{ isset($socialMedia) && $socialMedia->status  ? "checked" : "" }}>
                                <label class="form-check-label" for="status">
                                    Sosyal Medya Durumu Aktif Olsun mu?
                                </label>
                            </div>

                            <button type="submit" class="btn btn-success mr-2"
                                    id="btnSocialSave">{{ isset($socialMedia) ? "Güncelle" : "Kaydet" }}</button>
                        </form>
                    </div>
                </div>
    </div>
    </div>
    </div>
@endsection
@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>

{{--    <script src="{{ asset("/vendor/laravel-filemanager/js/stand-alone-button.js") }}"></script>--}}

    <script>
        let name = $('#name');
        let link = $('#link');
        let icon = $('#icon');

        $(document).ready(function () {
            $('#btnSocialSave').click(function () {

                if (name.val().trim() === "" || name.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Sosyal medya adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (link.val().trim() === "" || link.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Link boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (icon.val().trim() === "" || icon.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "İkon boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else {
                    $("#socialMediaForm").submit();
                }
            });

        });

    </script>

@endsection




