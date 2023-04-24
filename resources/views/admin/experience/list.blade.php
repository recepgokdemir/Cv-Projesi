@extends("layouts.admin.admin-panel")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">

@endsection
@section("content")
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card table-responsive">
                    <div class="card-body">
                        <h4 class="card-title">Deneyim Bilgileri</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th> Company Name </th>
                                <th> Task Name </th>
                                <th> Description </th>
                                <th> Date </th>
                                <th> Status </th>
                                <th> Active </th>
                                <th> Order </th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr id="{{ $item->id }}">
                                    <td> {{ $item->company_name }} </td>
                                    <td> {{ $item->task_name }} </td>
                                    <td>
                                <span data-container="body" data-toggle="tooltip" data-placement="top" title="{{ substr( $item->description , 0, 200) }}">
                                    {{substr( $item->description , 0 , 20)}}
                                </span>
                                    </td>
                                    <td> {{ $item->date }} </td>
                                    <td>
                                        @if($item->status)
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-success btnChangeStatus">Aktif</a>
                                        @else
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-danger btnChangeStatus">Pasif</a>

                                        @endif
                                    </td>
                                    <td>
                                        @if($item->active)
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-success btnChangeActive">Evet</a>
                                        @else
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-danger btnChangeActive">Hayır</a>

                                        @endif
                                    </td>
                                    <td> {{ $item->order }} </td>
                                    <td>
                                        <div class="d-flex">
                                            <a data-id="{{ $item->id }}" href="{{ route("experience.edit", ['experience' => $item->id]) }}"
                                               class="btn btn-warning btn-sm btnEdit">
                                                <i class="fa fa-pencil ms-0"></i>
                                            </a>
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)"
                                               class="btn btn-danger btn-sm btnDelete "
                                               data-name="{{ $item->company_name }}"
                                               data-id="{{ $item->id }}">
                                                <i class="fa fa-trash ms-0"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>@endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset("/vendor/laravel-filemanager/js/stand-alone-button.js") }}"></script>

    <script>
        $("#date").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    <script>


        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            });

            $('.btnChangeStatus').click(function () {
                let experienceID = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: 'Status değiştirmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('experience.changeStatus') }}",
                            data: {
                                experienceID : experienceID
                            },
                            headers:{
                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                            },
                            async:false,
                            success: function (data) {
                                if(data.experience_status)
                                {
                                    self.removeClass("btn-danger");
                                    self.addClass("btn-success");
                                    self.text("Aktif");
                                }
                                else
                                {
                                    self.removeClass("btn-success");
                                    self.addClass("btn-danger");
                                    self.text("Pasif");
                                }

                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Status Güncellendi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function (){

                            }
                        })
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });
            $('.btnChangeActive').click(function () {
                let experienceID = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: 'Active değiştirmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('experience.changeActive') }}",
                            data: {
                                experienceID : experienceID
                            },
                            headers:{
                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                            },
                            async:false,
                            success: function (data) {
                                if(data.experience_active)
                                {
                                    self.removeClass("btn-danger");
                                    self.addClass("btn-success");
                                    self.text("Aktif");
                                }
                                else
                                {
                                    self.removeClass("btn-success");
                                    self.addClass("btn-danger");
                                    self.text("Pasif");
                                }

                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Active Güncellendi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function (){

                            }
                        })
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });

            $('.btnDelete').click(function () {
                let educationID = $(this).data('id');

                Swal.fire({
                    title: 'Bu eğitim bilgilerini silmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) =>
                {
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            url: "{{ route('education.delete') }}",
                            // method: "POST"
                            type: "POST",
                            async: false,
                            data: {
                                educationID: educationID
                            },
                            success: function (response)
                            {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı !',
                                    text: "Silme işlemi başarılı.",
                                    confirmButtonText: "Tamam"
                                });
                                $("tr#" + educationID).remove();
                            },
                            error: function ()
                            {
                            }
                        });
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });


        });

        $('#profileImage').filemanager('image');
        $('#thumbnail').change(function () {
            $('#image').attr("src", $(this).val());
        });

    </script>

@endsection
