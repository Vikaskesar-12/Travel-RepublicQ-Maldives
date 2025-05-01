<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Responsive layout */
        @media (min-width: 768px) {
            .img-container {
                order: 1;
            }

            .form-container {
                order: 2;
            }
        }

        /* Style adjustments for smaller screens */
        @media (max-width: 767px) {
            .img-container img {
                max-width: 100%;
                height: auto;
            }
        }

        .form-outline input,
        .form-outline label {
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-lg {
            padding: 1rem;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .social-btn {
            margin-top: 20px;
        }

        .social-btn a {
            display: block;
            margin-bottom: 10px;
            padding: 1rem;
            text-align: center;
            color: white;
            border-radius: 5px;
        }

        .facebook-btn {
            background-color: #3b5998;
        }

        .twitter-btn {
            background-color: #55acee;
        }

        .form-outline input {
            padding: 1rem;
        }

        a {
            text-decoration: none
        }
    </style>
</head>


<!-- Success and Error Alerts -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <h4 class="text-center">Admin Login</h4>
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6 img-container">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 form-container">
                    <form action="{{ route('admin.authenticate') }}" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                                placeholder="name@example.com">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>

                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                id="password" placeholder="Password">
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-flex mb-4">
                            <!-- Remember me Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember"
                                    name="remember" />
                                <label class="form-check-label" for="remember"> Remember me </label>
                            </div>


                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>



                        {{-- <div class="social-btn">
                <a class="facebook-btn" href="#!">
                  <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                </a>
                <a class="twitter-btn" href="#!">
                  <i class="fab fa-twitter me-2"></i>Continue with Twitter
                </a>
              </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
