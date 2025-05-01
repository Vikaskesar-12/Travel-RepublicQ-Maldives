@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Sub-Categories</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sub-Categories</li>
                    </ol>
                </nav>
            </div>
            <div class="button-container d-flex justify-content-end mb-3">
                <a href="{{ route('admin.subcategories.create') }}" class="btn-add-category">
                    <button type="button" class="btn btn-success">Add Sub-Category</button>
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <td>{{ $subcategory->id }}</td>
                                            <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                            <td>{{ $subcategory->name }}</td>
                                            <td>{{ $subcategory->slug }}</td>
                                            <td>
                                                <input class="input-switch status-toggle" type="checkbox"
                                                    id="status_{{ $subcategory->id }}" data-id="{{ $subcategory->id }}"
                                                    data-status="{{ $subcategory->status }}"
                                                    {{ $subcategory->status == 'active' ? 'checked' : '' }} />
                                                <label class="label-switch" for="status_{{ $subcategory->id }}"></label>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}"
                                                    class="btn btn-sm">
                                                    <img src="{{ asset('backend/assets/img/edit.png') }}" alt="Edit"
                                                        width="25">
                                                </a>
                                                <form action="{{ route('admin.subcategories.delete', $subcategory->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm"
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".status-toggle").forEach(function(toggle) {
                toggle.addEventListener("change", function() {
                    let subcategoryId = this.getAttribute("data-id");
                    let newStatus = this.checked ? "active" : "inactive";

                    fetch("{{ route('admin.subcategories.toggleStatus') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                id: subcategoryId,
                                status: newStatus
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Status updated successfully!");
                            } else {
                                alert("Error updating status!");
                            }
                        });
                });
            });
        });
    </script>
@endsection
