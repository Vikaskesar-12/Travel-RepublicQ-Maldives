@extends('backend.layouts.adminlayouts')
@section('content')



    <main id="main" class="main">
        <!-- Success and Error Alerts -->

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Settings</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert"
                    style="max-width: 400px; margin: 0 auto; background-color: #f8d7da; color: #721c24;">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                    // Automatically close the error message after 5 seconds
                    setTimeout(function() {
                        document.getElementById('errorAlert').style.display = 'none';
                    }, 5000); // 5000ms = 5 seconds

                    // Function to close the alert manually
                    function closeAlert() {
                        document.getElementById('errorAlert').style.display = 'none';
                    }
                </script>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert"
                    style="max-width: 400px; margin: 0 auto; background-color: #d4edda; color: #155724;">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                    // Automatically close the success message after 5 seconds
                    setTimeout(function() {
                        document.getElementById('successAlert').style.display = 'none';
                    }, 5000); // 5000ms = 5 seconds

                    // Function to close the alert manually
                    function closeAlert() {
                        document.getElementById('successAlert').style.display = 'none';
                    }
                </script>
            @endif
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Manage Settings</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="settingsTab" role="tablist" style=" background: #c0daff;">
                                        <li class="nav-item mb-3">
                                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general"
                                                role="tab" aria-controls="general" aria-selected="true">General</a>
                                        </li>
                                        <li class="nav-item mb-3">
                                            <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social"
                                                role="tab" aria-controls="social" aria-selected="false">Social Media</a>
                                        </li>
                                        <li class="nav-item mb-3">
                                            <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                                role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                                        </li>
                                        <li class="nav-item mb-3">
                                            <a class="nav-link" id="logo-tab" data-bs-toggle="tab" href="#logos"
                                                role="tab" aria-controls="logos" aria-selected="false">Logos</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="settingsTabContent">
                                        <!-- General Tab -->
                                        <div class="tab-pane fade show active" id="general" role="tabpanel"
                                            aria-labelledby="general-tab">
                                            <form method="POST"
                                                action="{{ route('admin.updateGeneralSettings', $settings->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label for="site_name">Site Name</label>
                                                    <input type="text" class="form-control" id="site_name"
                                                        name="site_name"
                                                        value="{{ old('site_name', $settings->site_name) }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="site_description">Site Description</label>
                                                    <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ old('site_description', $settings->site_description) }}</textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="contact_email">Contact Email</label>
                                                    <input type="email" class="form-control" id="contact_email"
                                                        name="contact_email"
                                                        value="{{ old('contact_email', $settings->contact_email) }}"
                                                        required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone_number"
                                                        name="phone_number"
                                                        value="{{ old('phone_number', $settings->phone_number) }}"
                                                        required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="contact_address">Contact Address</label>
                                                    <textarea class="form-control" id="contact_address" name="contact_address" rows="3">{{ old('contact_address', $settings->contact_address) }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update General
                                                    Settings</button>
                                            </form>
                                        </div>
                                        <!-- Social Media Tab -->
                                        <div class="tab-pane fade" id="social" role="tabpanel"
                                            aria-labelledby="social-tab">
                                            <form method="POST"
                                                action="{{ route('admin.updateGeneralSettings', $settings->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label for="facebook_link">Facebook Link</label>
                                                    <input type="url" class="form-control" id="facebook_link"
                                                        name="facebook_link"
                                                        value="{{ old('facebook_link', $settings->facebook_link) }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="twitter_link">Twitter Link</label>
                                                    <input type="url" class="form-control" id="twitter_link"
                                                        name="twitter_link"
                                                        value="{{ old('twitter_link', $settings->twitter_link) }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="instagram_link">Instagram Link</label>
                                                    <input type="url" class="form-control" id="instagram_link"
                                                        name="instagram_link"
                                                        value="{{ old('instagram_link', $settings->instagram_link) }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="linkedin_link">LinkedIn Link</label>
                                                    <input type="url" class="form-control" id="linkedin_link"
                                                        name="linkedin_link"
                                                        value="{{ old('linkedin_link', $settings->linkedin_link) }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Social
                                                    Media</button>
                                            </form>
                                        </div>
                                        <!-- SEO Tab -->
                                        <div class="tab-pane fade" id="seo" role="tabpanel"
                                            aria-labelledby="seo-tab">
                                            <form method="POST"
                                                action="{{ route('admin.updateGeneralSettings', $settings->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" class="form-control" id="meta_title"
                                                        name="meta_title"
                                                        value="{{ old('meta_title', $settings->meta_title) }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="meta_description">Meta Description</label>
                                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $settings->meta_description) }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update SEO</button>
                                            </form>
                                        </div>
                                        <!-- Logos Tab -->
                                        <div class="tab-pane fade" id="logos" role="tabpanel"
                                            aria-labelledby="logo-tab">
                                            <form method="POST"
                                                action="{{ route('admin.updateGeneralSettings', $settings->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <!-- Header Logo -->
                                                <!-- Header Logo -->
                                                <div class="form-group mb-3">
                                                    <label for="header_logo">Header Logo</label>
                                                    <input type="file" class="form-control-file" id="header_logo"
                                                        name="header_logo"
                                                        onchange="previewAndEnableRemove('header_logo', 'headerLogoPreview')">
                                                    <div class="position-relative mt-2" id="headerLogoContainer"
                                                        style="display: {{ $settings->header_logo ? 'block' : 'none' }}; width: 150px;">
                                                        <img src="{{ asset('storage/' . $settings->header_logo) }}"
                                                            id="headerLogoPreview" class="img-thumbnail" width="150">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm position-absolute"
                                                            style="top: 5px; right: 5px; border-radius: 50%;"
                                                            onclick="removePreview('header_logo', 'headerLogoPreview', 'headerLogoContainer')">X</button>
                                                    </div>
                                                </div>
                                                <!-- Footer Logo -->
                                                <div class="form-group mb-3">
                                                    <label for="footer_logo">Footer Logo</label>
                                                    <input type="file" class="form-control-file" id="footer_logo"
                                                        name="footer_logo"
                                                        onchange="previewAndEnableRemove('footer_logo', 'footerLogoPreview')">
                                                    <div class="position-relative mt-2" id="footerLogoContainer"
                                                        style="display: {{ $settings->footer_logo ? 'block' : 'none' }}; width: 150px;">
                                                        <img src="{{ asset('storage/' . $settings->footer_logo) }}"
                                                            id="footerLogoPreview" class="img-thumbnail" width="150">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm position-absolute"
                                                            style="top: 5px; right: 5px; border-radius: 50%;"
                                                            onclick="removePreview('footer_logo', 'footerLogoPreview', 'footerLogoContainer')">X</button>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Logos</button>
                                            </form>
                                        </div>
                                        <!--  Tab -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>


    <script>
        /**
         * Show image preview and enable remove option.
         * @param {string} inputId - ID of the input element.
         * @param {string} previewId - ID of the image preview element.
         */
        function previewAndEnableRemove(inputId, previewId) {
            const input = document.getElementById(inputId);
            const file = input.files[0];
            const previewContainer = document.getElementById(previewId).parentNode;

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        /**
         * Remove the image preview and clear input value.
         * @param {string} inputId - ID of the input element.
         * @param {string} previewId - ID of the image preview element.
         * @param {string} containerId - ID of the container element.
         */
        function removePreview(inputId, previewId, containerId) {
            document.getElementById(inputId).value = '';
            document.getElementById(previewId).src = '';
            document.getElementById(containerId).style.display = 'none';
        }
    </script>
@endsection
