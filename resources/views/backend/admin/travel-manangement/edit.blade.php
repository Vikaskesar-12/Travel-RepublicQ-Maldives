@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Travel Package </h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Travel Package / Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Success and Error Alerts -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-body mt-3">
                            <div class="container mt-4">
                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Edit Travel Package</h5>

                                        <ul class="nav nav-tabs nav-tabs-bordered" id="tabMenu">
                                            <li class="nav-item">
                                                <button class="nav-link active" data-bs-toggle="tab"
                                                    data-bs-target="#tab1">Basic Info</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#tab2">Location</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">Package
                                                    Details</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4">SEO
                                                    Details</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab5">Gallery
                                                    & Images</button>
                                            </li>
                                        </ul>




                                        <form action="{{ route('admin.travel.update', $travel->id) }}" method="POST"
                                            enctype="multipart/form-data" id="addtours">
                                            @csrf
                                            <div class="tab-content mt-3">

                                                <!-- Basic Info Tab -->
                                                <div class="tab-pane fade show active" id="tab1">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tour Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $travel->name }}" placeholder="Enter tour name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Tour Duration</label>
                                                        <input type="text" name="duration" class="form-control"
                                                            value="{{ $travel->duration }}" placeholder="Enter duration">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Tour Price</label>
                                                        <input type="number" name="price" class="form-control"
                                                            value="{{ $travel->price }}" placeholder="Enter price">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Departure Date</label>
                                                        <input type="date" name="departure_date" class="form-control"
                                                            value="{{ $travel->departure_date }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Return Date</label>
                                                        <input type="date" name="return_date" class="form-control"
                                                            value="{{ $travel->return_date }}">
                                                    </div>

                                                    <!-- Category Dropdown -->
                                                    <div class="mb-3">
                                                        <label for="category" class="col-form-label">Select
                                                            Category:</label>
                                                        <select id="category" class="form-control" name="category_id">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $travel->category_id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Subcategory Dropdown -->
                                                    <div class="mb-3">
                                                        <label for="subcategory" class="col-form-label">Select
                                                            Subcategory:</label>
                                                        <select id="subcategory" class="form-control"
                                                            name="subcategory_id">
                                                            <option value="">Select Subcategory</option>
                                                            @foreach ($subcategories as $subcategory)
                                                                <option value="{{ $subcategory->id }}"
                                                                    {{ $travel->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                                                    {{ $subcategory->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="description"> Tour
                                                            Description</label>
                                                        <!-- Quill editor div -->
                                                        <div id="description" style="height:200px;">
                                                            {!! $travel->description !!}</div>
                                                        <!-- Hidden textarea to store Quill content -->
                                                        <textarea name="description" id="hiddenDescription" style="display: none;">{!! $travel->description !!}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Location Tab -->
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Country</label>
                                                        <select id="country" class="form-control" name="country_id">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}"
                                                                    {{ $travel->country_id == $country->id ? 'selected' : '' }}>
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- State Dropdown -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Select State</label>
                                                        <select id="state" class="form-control" name="state_id">
                                                            <option value="">Select State</option>
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ $travel->state_id == $state->id ? 'selected' : '' }}>
                                                                    {{ $state->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- City Dropdown -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Select City</label>
                                                        <select id="city" class="form-control" name="city_id">
                                                            <option value="">Select City</option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->id }}"
                                                                    {{ $travel->city_id == $city->id ? 'selected' : '' }}>
                                                                    {{ $city->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Package Details Tab -->
                                                <div class="tab-pane fade" id="tab3">
                                                    <!-- Tour Type -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Tour Type</label>
                                                        <select class="form-control" name="tour_type">
                                                            <option value="">Select Tour Type</option>
                                                            <option value="honeymoon"
                                                                {{ $travel->tour_type == 'honeymoon' ? 'selected' : '' }}>
                                                                Honeymoon</option>
                                                            <option value="adventure"
                                                                {{ $travel->tour_type == 'adventure' ? 'selected' : '' }}>
                                                                Adventure</option>
                                                            <option value="family"
                                                                {{ $travel->tour_type == 'family' ? 'selected' : '' }}>
                                                                Family</option>
                                                            <option value="wildlife"
                                                                {{ $travel->tour_type == 'wildlife' ? 'selected' : '' }}>
                                                                Wildlife</option>
                                                            <option value="beach"
                                                                {{ $travel->tour_type == 'beach' ? 'selected' : '' }}>
                                                                Beach</option>
                                                            <option value="luxury"
                                                                {{ $travel->tour_type == 'luxury' ? 'selected' : '' }}>
                                                                Luxury</option>
                                                        </select>
                                                    </div>

                                                    <!-- Accommodation Type -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Accommodation Type</label>
                                                        <select class="form-control" name="accommodation_type">
                                                            <option value="">Select Accommodation</option>
                                                            <option value="hotel"
                                                                {{ $travel->accommodation_type == 'hotel' ? 'selected' : '' }}>
                                                                Hotel</option>
                                                            <option value="resort"
                                                                {{ $travel->accommodation_type == 'resort' ? 'selected' : '' }}>
                                                                Resort</option>
                                                            <option value="hostel"
                                                                {{ $travel->accommodation_type == 'hostel' ? 'selected' : '' }}>
                                                                Hostel</option>
                                                            <option value="apartment"
                                                                {{ $travel->accommodation_type == 'apartment' ? 'selected' : '' }}>
                                                                Apartment</option>
                                                            <option value="camping"
                                                                {{ $travel->accommodation_type == 'camping' ? 'selected' : '' }}>
                                                                Camping</option>
                                                            <option value="villa"
                                                                {{ $travel->accommodation_type == 'villa' ? 'selected' : '' }}>
                                                                Villa</option>
                                                        </select>
                                                    </div>

                                                    <!-- Transport Included -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Transport Included?</label><br>
                                                        <input type="radio" name="transport_included" value="yes"
                                                            {{ $travel->transport_included == 'yes' ? 'checked' : '' }}>
                                                        Yes
                                                        <input type="radio" name="transport_included" value="no"
                                                            {{ $travel->transport_included == 'no' ? 'checked' : '' }}>
                                                        No
                                                    </div>

                                                    <!-- Meals Included -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Meals Included?</label><br>
                                                        <input type="radio" name="meals_included" value="yes"
                                                            {{ $travel->meals_included == 'yes' ? 'checked' : '' }}>
                                                        Yes
                                                        <input type="radio" name="meals_included" value="no"
                                                            {{ $travel->meals_included == 'no' ? 'checked' : '' }}>
                                                        No
                                                    </div>

                                                </div>


                                                <!-- SEO Details Tab -->
                                                <div class="tab-pane fade" id="tab4">

                                                    <div class="mb-3">
                                                        <label for="seoKeywords" class="form-label">Meta Keywords</label>
                                                        <input id="seoKeywords" name="seo_keywords"
                                                            placeholder="Type and press enter" class="form-control"
                                                            value="{{ $travel->seo_keywords }}">
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label">Meta Title</label>
                                                        <input type="text" class="form-control" name="meta_title"
                                                            value="{{ $travel->meta_title }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Meta Description</label>
                                                        <textarea class="form-control" rows="2" name="meta_description">{{ $travel->meta_description }}</textarea>
                                                    </div>

                                                </div>

                                                <!-- Gallery & Images Tab -->
                                                <div class="tab-pane fade" id="tab5">
                                                    <!-- Featured Image -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Featured Image</label>
                                                        <input type="file" class="form-control"
                                                            id="featuredImageInput" name="featured_image">
                                                        <div id="featuredImagePreview" class="mt-2">
                                                            @if ($travel->featured_image)
                                                                <div class="position-relative d-inline-block">
                                                                    <img src="{{ asset($travel->featured_image) }}"
                                                                        width="100" class="img-thumbnail">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                                        onclick="removeFeaturedImage()">×</button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- Gallery Images -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Gallery Images</label>
                                                        <input type="file" class="form-control" multiple
                                                            id="galleryImagesInput" name="gallery_images[]">
                                                        <div id="galleryImagesPreview"
                                                            class="mt-2 d-flex flex-wrap gap-2">
                                                            @if (!empty($travel->gallery_images))
                                                                @foreach (json_decode($travel->gallery_images) as $image)
                                                                    <div class="image-preview position-relative d-inline-block"
                                                                        data-image="{{ $image }}">
                                                                        <img src="{{ asset($image) }}" width="100"
                                                                            class="img-thumbnail">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image"
                                                                            data-image="{{ $image }}">×</button>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>



                                                    <button type="submit" class="btn btn-success">Submit</button>

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
    </main>
@endsection


@push('scripts')
    <!-- jQuery & Quill JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Tagify JS -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.css">

    <script>
        // Tagify Initialization
        var input = document.querySelector('#seoKeywords');
        new Tagify(input, {
            enforceWhitelist: false,
            delimiters: ", ",
            dropdown: {
                enabled: 0
            },
            maxTags: Infinity
        });

        document.querySelector('.tagify').style.cssText += `
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            min-height: 50px;
            padding: 8px 12px;
            box-sizing: border-box;
        `;

        document.querySelector('.tagify__input').style.cssText += `margin-top: 0;`;
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fetch States
            $('#country').on('change', function() {
                let country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: "{{ route('get.states', '') }}/" + country_id,
                        type: "GET",
                        success: function(data) {
                            $('#state').html('<option value="">Select State</option>');
                            $.each(data, function(key, value) {
                                $('#state').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            // Fetch Cities
            $('#state').on('change', function() {
                let state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        url: "{{ route('get.cities', '') }}/" + state_id,
                        type: "GET",
                        success: function(data) {
                            $('#city').html('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            $(document).ready(function() {
                function loadSubcategories(categoryId, selectedSubcategoryId = null) {
                    if (categoryId) {
                        $.ajax({
                            url: "{{ route('getSubcategories') }}",
                            type: "GET",
                            data: {
                                category_id: categoryId
                            },
                            success: function(data) {
                                $('#subcategory').empty().append(
                                    '<option value="">Select Subcategory</option>');
                                $.each(data, function(key, value) {
                                    let selected = (selectedSubcategoryId == value.id) ?
                                        'selected' : '';
                                    $('#subcategory').append('<option value="' + value
                                        .id + '" ' + selected + '>' + value.name +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                    }
                }

                // Page Load - Load Subcategories for selected category
                let selectedCategory = $('#category').val();
                let selectedSubcategory = "{{ $travel->subcategory_id }}";
                if (selectedCategory) {
                    loadSubcategories(selectedCategory, selectedSubcategory);
                }

                // On Category Change
                $('#category').change(function() {
                    var categoryId = $(this).val();
                    loadSubcategories(categoryId);
                });
            });
        });
    </script>

    <script>
        // Quill Editor
        var quill = new Quill('#description', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'font': []
                    }, {
                        'size': ['small', false, 'large', 'huge']
                    }],
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'align': []
                    }],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Enter description here...',
        });

        $(document).ready(function() {
            $(document).on('submit', '#addtours', function() {
                var descriptionContent = quill.root.innerHTML;
                $('#hiddenDescription').val(descriptionContent);
            });
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let galleryFiles = [];

            // Featured Image Upload & Preview
            document.getElementById('featuredImageInput').addEventListener('change', function(event) {
                let file = event.target.files[0];
                let previewDiv = document.getElementById('featuredImagePreview');

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        previewDiv.innerHTML = `
                    <div class="position-relative d-inline-block">
                        <img src="${e.target.result}" alt="Featured Image" class="img-thumbnail" style="max-width: 100px;">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" onclick="removeFeaturedImage()">×</button>
                    </div>`;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove Featured Image
            window.removeFeaturedImage = function() {
                document.getElementById('featuredImagePreview').innerHTML = "";
                document.getElementById('featuredImageInput').value = "";
            };

            // Gallery Images Upload & Preview
            document.getElementById('galleryImagesInput').addEventListener('change', function(event) {
                let files = Array.from(event.target.files);
                let galleryPreviewDiv = document.getElementById('galleryImagesPreview');

                files.forEach((file) => {
                    galleryFiles.push(file);
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let imageContainer = document.createElement('div');
                        imageContainer.classList.add('position-relative', 'd-inline-block');

                        imageContainer.innerHTML = `
                    <img src="${e.target.result}" alt="Gallery Image" class="img-thumbnail" style="max-width: 100px;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" onclick="removeGalleryImage(this)">×</button>
                `;

                        galleryPreviewDiv.appendChild(imageContainer);
                    };
                    reader.readAsDataURL(file);
                });
            });

            // Remove Gallery Image via AJAX
            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("remove-image")) {
                    let imageElement = event.target.parentElement;
                    let imagePath = event.target.getAttribute("data-image");

                    if (confirm("Are you sure you want to delete this image?")) {
                        fetch("{{ route('admin.travel.deleteGalleryImage') }}", {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    image: imagePath
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    imageElement.remove();
                                } else {
                                    alert("Failed to delete image.");
                                }
                            })
                            .catch(error => console.error("Error:", error));
                    }
                }
            });
        });
    </script>
@endpush
