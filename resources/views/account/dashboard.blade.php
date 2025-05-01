@extends('frontend.layouts.layout')

@section('title', 'User Panel')

@section('content')
    <div class="container-fluid">
        <div class="row" style="min-height: 70vh;">

            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-dark sidebar text-white pt-3">
                <!-- Profile Image -->
                <img src="https://via.placeholder.com/100" alt="Profile Image" class="profile-img mx-auto d-block">

                <!-- Sidebar Navigation Links -->
                <a href="#profile" onclick="showSection(event, 'profile')" class="d-block py-2 px-3 text-white">Edit
                    Profile</a>
                <a href="#password" onclick="showSection(event, 'password')" class="d-block py-2 px-3 text-white">Forgot
                    Password</a>
                <a href="#settings" onclick="showSection(event, 'settings')"
                    class="d-block py-2 px-3 text-white">Settings</a>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 main-content py-4">
                <!-- Profile Edit Section -->
                <div id="profile" class="content-section">
                    <h2>Edit Profile</h2>
                    <form>
                        <div class="form-group">
                            <label for="profileImage">Profile Image</label>
                            <input type="file" class="form-control-file" id="profileImage">
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <!-- Forgot Password Section -->
                <div id="password" class="content-section" style="display: none;">
                    <h2>Forgot Password</h2>
                    <form>
                        <div class="form-group">
                            <label for="resetEmail">Email</label>
                            <input type="email" class="form-control" id="resetEmail"
                                placeholder="Enter your email for password reset">
                        </div>
                        <button type="button" class="btn btn-warning">Reset Password</button>
                    </form>
                </div>

                <!-- Settings Section -->
                <div id="settings" class="content-section" style="display: none;">
                    <h2>Settings</h2>
                    <p>Settings content goes here...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle section switching without page scrolling
        function showSection(event, sectionId) {
            event.preventDefault(); // Prevents scrolling to top
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>

    <style>
        .sidebar {
            position: sticky;
            top: 0;
            height: 70vh;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .main-content {
            background-color: #f8f9fa;
        }
    </style>
@endsection
