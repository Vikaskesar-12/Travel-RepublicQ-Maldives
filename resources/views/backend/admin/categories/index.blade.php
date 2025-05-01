@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Categories</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </nav>
            </div>
            <div class="button-container d-flex justify-content-end mb-3">
                <a href="{{ route('admin.categories.create') }}" class="btn-add-category">
                    <button type="button" class="btn btn-success">Add Category</button>
                </a>
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
                        <div class="card-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr id="category-row-{{ $category->id }}">
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <input class="input-switch status-toggle" type="checkbox"
                                                    id="status_{{ $category->id }}" data-id="{{ $category->id }}"
                                                    data-status="{{ $category->status }}"
                                                    {{ $category->status == 'active' ? 'checked' : '' }} />
                                                <label class="label-switch" for="status_{{ $category->id }}"></label>
                                                {{-- <span
                                                    class="info-text">{{ $category->status == 'active' ? '✅ Active' : '❌ Inactive' }}</span> --}}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                    class="btn btn-sm">
                                                    <img src="{{ asset('backend/assets/img/edit.png') }}" alt="Edit"
                                                        width="25">
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn  btn-sm"
                                                        onclick="return confirm('Are you sure?')">
                                                        <img src="{{ asset('backend/assets/img/delete.png') }}"
                                                            alt="Delete" width="25">
                                                    </button>
                                                </form>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Status Toggle AJAX
            $(".status-toggle").change(function() {
                var categoryId = $(this).data("id");
                var newStatus = $(this).prop("checked") ? "active" : "inactive";
                var infoText = $(this).siblings(".info-text");

                $.ajax({
                    url: '{{ route('admin.categories.updateStatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: categoryId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            infoText.text(newStatus === "active" ? "✅ Active" : "❌ Inactive");
                        }
                    }
                });
            });

            // Delete Category AJAX
            $(".delete-category").click(function() {
                var categoryId = $(this).data("id");

                if (!confirm("Are you sure you want to delete this category?")) {
                    return;
                }

                $.ajax({
                    url: '{{ route('admin.categories.destroy', '') }}/' + categoryId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#category-row-" + categoryId).fadeOut(500, function() {
                                $(this).remove();
                            });
                        } else {
                            alert("Failed to delete category.");
                        }
                    }
                });
            });
        });
    </script>
@endsection
