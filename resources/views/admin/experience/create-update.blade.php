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
                        <h4 class="card-title">Deneyim Bilgileri {{ isset($experience) ? "Güncelleme" : "Ekleme" }}</h4>
                        <form class="forms-sample" id="experienceForm"
                              action="{{ isset($experience) ? route('experience.edit', ['experience'=>$experience->id]) : route("experience.create") }}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="companyName">Şirket Adı</label>
                                <input type="text"
                                       class="form-control"
                                       id="companyName"
                                       name="company_name"
                                       placeholder="Şirket adını yazınız"
                                       value="{{ isset($experience) ? $experience->company_name : "" }}"
                                >
                                @error('company_name')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="taskName">Görevi</label>
                                <input type="text"
                                       class="form-control"
                                       id="taskName"
                                       name="task_name"
                                       placeholder="Görev adınızı giriniz"
                                       value="{{ isset($experience) ? $experience->task_name : "" }}"
                                >
                                @error('task_name')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Hakkında</label>
                                <input type="text"
                                       class="form-control"
                                       id="description"
                                       name="description"
                                       placeholder="Şirket görevinizi kısaca tanıtın"
                                       value="{{ isset($experience) ? $experience->description : "" }}"
                                >
                                @error('description')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date">Çalışma Yılları</label>
                                <input type="text"
                                       class="form-control"
                                       id="date"
                                       name="date"
                                       placeholder="Çalışma başlangıç - bitiiş tarihleri"
                                       value="{{ isset($experience) ? $experience->date : "" }}"
                                >
                                @error('date')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1"
                                       id="status" {{ isset($experience) && $experience->status  ? "checked" : "" }}>
                                <label class="form-check-label" for="status">
                                    Çalışma deneyiminiz gösterilsin mi?
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="active" value="1"
                                       id="active" {{ isset($experience) && $experience->active  ? "checked" : "" }}>
                                <label class="form-check-label" for="active">
                                    Bu işte aktif olarak çalışıyor musunuz?
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="order">Sıralama</label>
                                <input type="number"
                                       class="form-control"
                                       id="order"
                                       name="order"
                                       placeholder="Sıralama yazın"
                                       value="{{ isset($experience) ? $experience->order : "" }}"
                                >
                            </div>


                            <button type="button" class="btn btn-success mr-2"
                                    id="btnSave">{{ isset($experience) ? "Güncelle" : "Kaydet" }}</button>
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
        let companyName = $('#companyName');
        let taskName = $('#taskName');
        let description = $('#description');
        let date = $('#date');


        $(document).ready(function () {
            $('#btnSave').click(function () {

                if (companyName.val().trim() === "" || companyName.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Şirket adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (taskName.val().trim() === "" || taskName.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Görev adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (description.val().trim() === "" || description.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Açıklama alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (date.val().trim() === "" || date.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Başlangıç - Bitiş tarihleri boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else {
                    $("#experienceForm").submit();
                }
            });
        });


    </script>

@endsection




