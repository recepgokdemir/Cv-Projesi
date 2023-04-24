@extends("layouts.admin.admin-panel")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">

@endsection
@section("content")
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card table-responsive">
                    <div class="card-body">
                        <h4 class="card-title">Portföy Bilgileri</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th> Title </th>
                                <th> Tags </th>
                                <th> About </th>
                                <th> Description </th>
                                <th> Web Site </th>
                                <th> Keywords </th>
                                <th> Status </th>
                                <th> Order </th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr id="{{ $item->id }}">
                                    <td> {{ $item->title }} </td>
                                    <td> {{ $item->tags }} </td>
                                    <td> {{ $item->about }} </td>
                                    <td>
                                <span data-container="body" data-toggle="tooltip" data-placement="top" title="{{ substr( $item->description , 0, 200) }}">
                                    {{substr( $item->description , 0 , 20)}}
                                </span>
                                    </td>
                                    <td> {{ $item->website }} </td>
                                    <td> {{ $item->keywords }} </td>
                                    <td>
                                        @if($item->status)
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-success btnChangeStatus">Aktif</a>
                                        @else
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-danger btnChangeStatus">Pasif</a>

                                        @endif
                                    </td>
                                    <td> {{ $item->order }} </td>
                                    <td>
                                        <div class="d-flex">
                                            <a data-id="{{ $item->id }}" href="{{ route("portfolio.edit", ['portfolio' => $item->id]) }}"
                                               class="btn btn-warning btn-sm btnEdit">
                                                <i class="fa fa-pencil ms-0"></i>
                                            </a>
                                            <a data-id="{{ $item->id }}" href="javascript:void(0)"
                                               class="btn btn-danger btn-sm btnDelete "
                                               data-name="{{ $item->title }}"
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

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            });

            $('.btnChangeStatus').click(function () {
                let portfolioID = $(this).data('id');
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
                            url: "{{ route('portfolio.changeStatus') }}",
                            data: {
                                portfolioID : portfolioID
                            },
                            headers:{
                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                            },
                            async:false,
                            success: function (data) {
                                if(data.portfolio_status)
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

            $('.btnDelete').click(function () {
                let portfolioID = $(this).data('id');

                Swal.fire({
                    title: 'Bu portföy bilgilerini silmek istediğinize emin misiniz?',
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
                            url: "{{ route('portfolio.delete') }}",
                            // method: "POST"
                            type: "POST",
                            async: false,
                            data: {
                                portfolioID: portfolioID
                            },
                            success: function (response)
                            {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı !',
                                    text: "Silme işlemi başarılı.",
                                    confirmButtonText: "Tamam"
                                });
                                $("tr#" + portfolioID).remove();
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

    </script>

@endsection
