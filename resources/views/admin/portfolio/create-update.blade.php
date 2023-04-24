@extends("layouts.admin.admin-panel")
@section("title")
    Deneyim {{ isset($user) ? "Güncelleme" : "Ekleme" }}
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
                        <h4 class="card-title">Portföy Bilgileri {{ isset($portfolio) ? "Güncelleme" : "Ekleme" }}</h4>
                        <form class="forms-sample" id="portfolioForm"
                              action="{{ isset($portfolio) ? route('portfolio.edit', ['portfolio'=>$portfolio->id]) : route("portfolio.create") }}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Portföy Adı</label>
                                <input type="text"
                                       class="form-control"
                                       id="title"
                                       name="title"
                                       placeholder="Portföy adını yazınız"
                                       value="{{ isset($portfolio) ? $portfolio->title : "" }}"
                                >
                                @error('title')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags">Etiketler</label>
                                <input type="text"
                                       class="form-control"
                                       id="tags"
                                       name="tags"
                                       placeholder="Etiket giriniz"
                                       value="{{ isset($portfolio) ? $portfolio->task_name : "" }}"
                                >
                                @error('tags')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about">Hakkında</label>
                                <input type="text"
                                       class="form-control"
                                       id="about"
                                       name="about"
                                       placeholder="Portföt hakkında bilgi veriniz"
                                       value="{{ isset($portfolio) ? $portfolio->about : "" }}"
                                >
                                @error('about')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Tanımı</label>
                                <input type="text"
                                       class="form-control"
                                       id="description"
                                       name="description"
                                       placeholder="Tanım bilgisini giriniz"
                                       value="{{ isset($portfolio) ? $portfolio->description : "" }}"
                                >
                                @error('description')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">Web Site</label>
                                <input type="text"
                                       class="form-control"
                                       id="website"
                                       name="website"
                                       placeholder="Web sitesi giriniz"
                                       value="{{ isset($portfolio) ? $portfolio->website : "" }}"
                                >
                                @error('website')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keywords">Anahtar Kelimeler</label>
                                <input type="text"
                                       class="form-control"
                                       id="keywords"
                                       name="keywords"
                                       placeholder="Anahtar kelimeleri giriniz"
                                       value="{{ isset($portfolio) ? $portfolio->keywords : "" }}"
                                >
                                @error('keywords')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mt-3">Portfolyo Resmi</label>
                                <div class="row">
                                    <div class="col-8 input-group-append d-block">
                                        <div class="d-flex mt-4">
                                            <button type="button" id="portfolioImage" data-input="thumbnail" data-preview="holder"
                                                    class="file-upload-browse btn btn-info">
                                                 Yükle
                                            </button>
                                            <input type="text" id="thumbnail" class="form-control file-upload-info" name="image"
                                                   value="{{ isset($portfolio) ? $portfolio->image : "" }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <img class="img-md" id="image" src="{{ isset($portfolio) ? $portfolio->image : "" }}" alt="Portfolio image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1"
                                       id="status" {{ isset($portfolio) && $portfolio->status  ? "checked" : "" }}>
                                <label class="form-check-label" for="status">
                                    Portföyünüz gösterilsin mi?
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="order">Sıralama</label>
                                <input type="number"
                                       class="form-control"
                                       id="order"
                                       name="order"
                                       placeholder="Sıralama yazın"
                                       value="{{ isset($portfolio) ? $portfolio->order : "" }}"
                                >
                            </div>


                            <button type="button" class="btn btn-success mr-2"
                                    id="btnSave">{{ isset($portfolio) ? "Güncelle" : "Kaydet" }}</button>
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
        let title = $('#title');
        let tags = $('#tags');
        let about = $('#about');
        let description = $('#description');
        let website = $('#website');
        let keywords = $('#keywords');


        $(document).ready(function () {
            $('#btnSave').click(function () {

                if (title.val().trim() === "" || title.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Portföy adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (tags.val().trim() === "" || tags.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Etiketler boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (about.val().trim() === "" || about.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "About alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (description.val().trim() === "" || description.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Tanım boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if (website.val().trim() === "" || website.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Web site boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if (keywords.val().trim() === "" || keywords.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Anahtar kelimeler boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else {
                    $("#portfolioForm").submit();
                }
            });
            $('#portfolioImage').filemanager('image');
            $('#thumbnail').change(function () {
                $('#image').attr("src", $(this).val());
            });
        });


    </script>

@endsection




