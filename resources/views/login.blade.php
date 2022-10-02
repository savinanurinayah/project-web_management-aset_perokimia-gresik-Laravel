<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('backend/') }}/img/logo/logo2.png" rel="icon">
    <title>Login Manajemen Aset | PT.Petrokimia Gresik</title>
    <link href="{{ asset('backend/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/') }}/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-4">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><b>Login</b></h1>
                                    </div>
                                    <form action="{{ url('login') }}" method="POST" class="user">
                                        @csrf
                                        <div class="mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('backend/img/logo/management-aset-login.png') }}"
                                                alt="" width="360px" height="160px">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="{{ old('username') }}" name="username" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password">
                                        </div>
                                            <button class ="btn btn-warning btn-block" type="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{ asset('backend/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('backend/') }}/js/ruang-admin.min.js"></script>
</body>

</html>
