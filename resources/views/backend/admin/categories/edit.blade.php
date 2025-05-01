@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1><i class="bi bi-list-ul"></i> Categories</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i>
                                Home</a></li>
                        <li class="breadcrumb-item active">Categories / Create</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- ✅ Success and Error Alerts -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-x-circle-fill"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card shadow">

                        <div class="card-body mt-3">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"> Category Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active" selected>✅ Active</option>
                                        <option value="inactive">❌ Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save
                                    Category</button>
                                <a href="{{ route('admin.categories') }}" class="btn btn-secondary"><i
                                        class="bi bi-arrow-left"></i> Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ✅ Slug Auto-Generate Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoryNameInput = document.getElementById("category_name");
            const categorySlugInput = document.getElementById("category_slug");

            categoryNameInput.addEventListener("keyup", function() {
                let slug = categoryNameInput.value.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Remove duplicate hyphens
                categorySlugInput.value = slug;
            });
        });
    </script>
@endsection
