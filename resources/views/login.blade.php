<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- FORM LOGIN -->
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="p-5 w-100">
                                    <div class="d-flex align-items-center mb-4">

                                        <h1 class="h4" style="color: #0505ed; font-weight: bold;">Today</h1>
                                    </div>

                                    <form action="" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="text" name="email"
                                                value="{{ old('email') }}" placeholder="Email"
                                                style="background-color: #bac0e1; border: 1px solid #f7f7f8;">
                                            @error('email')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="Password"
                                                style="background-color: #bac0e1; border: 1px solid #f7f7f8;">
                                            @error('password')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn w-100"
                                                style="background-color: #3c00ff;  border-radius: 15px; padding: 10px; color: white;">
                                                login
                                            </button>
                                        </div>
                                        <div>
                                            <p style="text-align: center; margin-top: 10px;">dont have account? <a
                                                    href="">register</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- GAMBAR SAMPING -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{ asset('img/Logo.png') }}" class="login-image">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
