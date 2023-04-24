<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recep Gökdemir Cv</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/iconfonts/ionicons/dist/css/ionicons.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/css/vendor.bundle.addons.css") }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset("assets/admin/css/shared/style.css") }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset("assets/admin/images/favicon.ico") }}" />
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="signInEmail" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                    <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="signInPassword" class="orm-label">Parola</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="*********" name="password">
                                    <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block" type="submit">Giriş</button>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked> Beni Hatırla </label>
                                </div>
                                <a href="#" class="text-small forgot-password text-black">Parolamı Unuttum</a>
                            </div>

                    </div>

                    <p class="footer-text text-center mt-3">copyright © {{ date("Y") }} Recep GÖKDEMİR</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset("assets/admin/vendors/js/vendor.bundle.base.js") }}"></script>
<script src="{{ asset("assets/admin/vendors/js/vendor.bundle.addons.js") }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset("assets/admin/js/shared/off-canvas.js") }}"></script>
<script src="{{ asset("assets/admin/js/shared/misc.js") }}"></script>
<!-- endinject -->
<script src="{{ asset("assets/admin/js/shared/jquery.cookie.js") }}" type="text/javascript"></script>
</body>
</html>
