@extends("layouts.admin.admin-panel")
@section("title")
    Eğitim {{ isset($user) ? "Güncelleme" : "Ekleme" }}
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
                        <h4 class="card-title">Eğitim Bilgileri {{ isset($education) ? "Güncelleme" : "Ekleme" }}</h4>
                        <form class="forms-sample" id="educationForm"
                              action="{{ isset($education) ? route('education.edit', ['education'=>$education->id]) : route("education.create") }}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="schoolName">Eğitim Kurumu</label>
                                <input type="text"
                                       class="form-control"
                                       id="schoolName"
                                       name="school_name"
                                       placeholder="Eğitim aldığınız okul adını yazınız"
                                       value="{{ isset($education) ? $education->school_name : "" }}"
                                >
                                @error('school_name')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="department">Bölümü</label>
                                <input type="text"
                                       class="form-control"
                                       id="department"
                                       name="department"
                                       placeholder="Öğrenim Gördüğünüz bölümünüz"
                                       value="{{ isset($education) ? $education->department : "" }}"
                                >
                                @error('department')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Hakkında</label>
                                <input type="text"
                                       class="form-control"
                                       id="description"
                                       name="description"
                                       placeholder="Kendinizi kısaca tanıtın"
                                       value="{{ isset($education) ? $education->description : "" }}"
                                >
                                @error('department')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="educationYear">Eğitim Yılları</label>
                                <input type="text"
                                       class="form-control"
                                       id="educationYear"
                                       name="education_year"
                                       placeholder="Okula Başladığınız Yıl"
                                       value="{{ isset($education) ? $education->education_year : "" }}"
                                >
                                @error('education_year')
                                <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="degree">Mezuniyet Puanı</label>
                                <input type="number"
                                       class="form-control"
                                       id="degree"
                                       name="degree"
                                       placeholder="Diploma Puanınız"
                                       value="{{ isset($education) ? $education->degree : "" }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="order">Sıralama</label>
                                <input type="number"
                                       class="form-control"
                                       id="order"
                                       name="order"
                                       placeholder="Sıralama yazın"
                                       value="{{ isset($education) ? $education->order : "" }}"
                                >
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1"
                                       id="status" {{ isset($education) && $education->status  ? "checked" : "" }}>
                                <label class="form-check-label" for="status">
                                    Eğitim Durumu Aktif Olsun mu?
                                </label>
                            </div>

                            <button type="submit" class="btn btn-success mr-2"
                                    id="btnEducationSave">{{ isset($education) ? "Güncelle" : "Kaydet" }}</button>
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
        $("#startedYear").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        $("#graduatedYear").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    <script>
        let schoolName = $('#schoolName');
        let department = $('#department');
        let startedYear = $('#startedYear');
        let graduatedYear = $('#graduatedYear');
        let degree = $('#degree');


        $(document).ready(function () {
            $('#btnSave').click(function () {

                if (schoolName.val().trim() === "" || schoolName.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Okul adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (department.val().trim() === "" || department.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Bölüm boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (startedYear.val().trim() === "" || startedYear.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Başlangıç yılı geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (graduatedYear.val().trim() === "" || graduatedYear.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Mezuniyet yılı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (degree.val().trim() === "" || degree.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Mezuniyet puanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else {
                    $("#userForm").submit();
                }
            });


            // $('#lfm').filemanager('image');
            // $('#thumbnail').change(function () {
            //     $('#image').attr("src", $(this).val());
            // })
        });


    </script>

@endsection




