@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Blogs</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                </nav>
            </div>
            <div class="button-container d-flex justify-content-end mb-3">
                <a href="{{ route('blogs.create') }}" class="btn-add-blog">
                    <button type="button" class="btn btn-success">Add Blog</button>
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
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Publish Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr id="blog-row-{{ $blog->id }}">
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->slug }}</td>
                                            <td>{{ $blog->category->name }}</td>
                                            <td>{{ $blog->author_name }}</td>
                                            <td>{{ $blog->publish_date ? date('d M Y', strtotime($blog->publish_date)) : 'N/A' }}
                                            </td>
                                            <td>
                                                <input class="input-switch status-toggle" type="checkbox"
                                                    id="status_{{ $blog->id }}" data-id="{{ $blog->id }}"
                                                    data-status="{{ $blog->status }}"
                                                    {{ $blog->status == 'active' ? 'checked' : '' }} />
                                                <label class="label-switch" for="status_{{ $blog->id }}"></label>
                                            </td>
                                            <td>
                                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm">
                                                    <img src="{{ asset('backend/assets/img/edit.png') }}" alt="Edit"
                                                        width="25">
                                                </a>
                                                <button type="button" class="btn btn-sm delete-blog"
                                                    data-id="{{ $blog->id }}">
                                                    <img src="{{ asset('backend/assets/img/delete.png') }}" alt="Delete"
                                                        width="25">
                                                </button>
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
                var blogId = $(this).data("id");
                var newStatus = $(this).prop("checked") ? "active" : "inactive";

                $.ajax({
                    url: '{{ route('blogs.updateStatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: blogId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            alert("Status updated successfully!");
                        }
                    }
                });
            });

            // Delete Blog AJAX
            $(".delete-blog").click(function() {
                var blogId = $(this).data("id");

                if (!confirm("Are you sure you want to delete this blog?")) {
                    return;
                }

                $.ajax({
                    url: '{{ route('blogs.destroy', '') }}/' + blogId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#blog-row-" + blogId).fadeOut(500, function() {
                                $(this).remove();
                            });
                        } else {
                            alert("Failed to delete blog.");
                        }
                    }
                });
            });
        });
    </script>
@endsection
