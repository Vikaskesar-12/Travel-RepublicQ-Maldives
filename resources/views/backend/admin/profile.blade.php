@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
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
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <!-- Profile picture display with preview -->
                                        <img id="profile-preview" class="profile-user-img img-fluid img-circle"
                                            style="border-radius: 50%"
                                            src="{{ asset('' . ($user && $user->profile_picture ? $user->profile_picture : 'default_image.jpg')) }}"
                                            alt="User profile picture">
                                    </div>



                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                    <p class="text-muted text-center">{{ $user->email }}</p>
                                    <p class="text-muted text-center">{{ $user->about ?? 'No about information provided.' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Update Form -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings"
                                                data-bs-toggle="tab">Update Profile</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#change-password"
                                                data-bs-toggle="tab">Change Password</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- Profile Update Tab -->
                                        <div class="tab-pane active" id="settings">
                                            <!-- Form for updating profile -->
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('admin.updateProfile') }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <!-- Name Input -->
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                </div>

                                                <!-- Email Input -->
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                </div>

                                                <!-- About Input -->
                                                <div class="form-group row">
                                                    <label for="about" class="col-sm-2 col-form-label">About</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="about" name="about">{{ $user->about }}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Profile Picture Input -->
                                                <div class="form-group row">
                                                    <label for="profile_picture" class="col-sm-2 col-form-label">Profile
                                                        Picture</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control-file" id="profile_picture"
                                                            name="profile_picture" onchange="previewImage(event)">
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Change Password Tab -->
                                        <div class="tab-pane" id="change-password">
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('admin.updatePassword') }}">
                                                @csrf
                                                @method('PATCH')

                                                <div class="form-group row">
                                                    <label for="current_password" class="col-sm-2 col-form-label">Current
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="current_password"
                                                            name="current_password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="new_password" class="col-sm-2 col-form-label">New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="new_password"
                                                            name="new_password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="new_password_confirmation"
                                                        class="col-sm-2 col-form-label">Confirm New Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            id="new_password_confirmation"
                                                            name="new_password_confirmation" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Change
                                                            Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        // JavaScript function to preview the selected profile picture
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('profile-preview');
                preview.src = e.target.result; // Set the new image source
            }

            if (file) {
                reader.readAsDataURL(file); // Read the selected file
            }
        }
    </script>
@endsection
