@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Create Blog</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blogs / Create</li>
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
                            <form action="{{ route('blogs.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data" id="addblogs">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="blog_title"
                                            value="{{ $blog->title }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="blog_slug"
                                            value="{{ $blog->slug }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="description"> Description</label>
                                    <div id="description" style="height:200px;">{!! $blog->description !!}</div>
                                    <textarea name="description" id="hiddenDescription" style="display: none;">{{ $blog->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Featured Image</label>
                                    <input type="file" class="form-control" name="featured_image"
                                        id="featuredImageInput">

                                    <!-- Image Preview -->
                                    <img id="featuredImagePreview"
                                        src="{{ $blog->featured_image ? asset($blog->featured_image) : '' }}"
                                        alt="Featured Image" class="mt-2"
                                        style="max-width: 200px; margin-top: 10px; {{ $blog->featured_image ? 'display: block;' : 'display: none;' }}">
                                </div>




                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Publish Date</label>
                                        <input type="date" class="form-control" name="publish_date"
                                            value="{{ $blog->publish_date }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Author Name</label>
                                        <input type="text" class="form-control" name="author_name"
                                            value="{{ $blog->author_name }}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            value="{{ $blog->meta_title }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" rows="2" name="meta_description">{{ $blog->meta_description }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="seoKeywords" class="form-label">Meta Keywords</label>
                                        <input id="seoKeywords" name="meta_keywords" class="form-control"
                                            value="{{ $blog->meta_keywords }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="active" {{ $blog->status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive" {{ $blog->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update Blog</button>
                                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.css">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const blogTitleInput = document.getElementById("blog_title");
            const blogSlugInput = document.getElementById("blog_slug");

            blogTitleInput.addEventListener("keyup", function() {
                let slug = blogTitleInput.value.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                blogSlugInput.value = slug;
            });
        });
    </script>
    {{-- img previes here --}}

    <script>
        document.getElementById('featuredImageInput').addEventListener('change', function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let previewImage = document.getElementById('featuredImagePreview');
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                }
                reader.readAsDataURL(file);
            }
        });
    </script>


    <script>
        var input = document.querySelector('#seoKeywords');
        new Tagify(input, {
            enforceWhitelist: false,
            delimiters: ", ",
            dropdown: {
                enabled: 0
            },
            maxTags: Infinity
        });
    </script>

    {{-- editor here  --}}
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
            $(document).on('submit', '#addblogs', function() {
                var descriptionContent = quill.root.innerHTML;
                $('#hiddenDescription').val(descriptionContent);
            });
        });
    </script>
@endpush
