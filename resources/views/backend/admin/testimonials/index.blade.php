@extends('backend.layouts.adminlayouts')

@section('content')
    <style>
        .status-select {
            width: 140px;
            padding: 6px 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .status-pending {
            background-color: #ffcc00;
            color: #000;
        }

        .status-approved {
            background-color: #28a745;
            color: #fff;
        }

        .status-rejected {
            background-color: #dc3545;
            color: #fff;
        }

        .status-select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Testimonial</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
                    </ol>
                </nav>
            </div>
            <div class="button-container d-flex justify-content-end mb-3">
                <a href="{{ route('admin.testimonials.create') }}" class="btn-add-university">
                    <button type="button" class="btn btn-success">Add Testimonial</button>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Message</th>
                                        {{-- <th>Rating</th> --}}
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->designation }}</td>
                                            <td>{{ Str::limit($testimonial->message, 50) }}</td>
                                            {{-- <td>{{ $testimonial->rating }} ⭐</td> --}}
                                            <td>
                                                <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}"
                                                    width="50" alt="Testimonial Image">
                                            </td>
                                            <td>
                                                <select
                                                    class="form-control status-select 
                                                    {{ $testimonial->status == 'pending' ? 'status-pending' : '' }}
                                                    {{ $testimonial->status == 'approved' ? 'status-approved' : '' }}
                                                    {{ $testimonial->status == 'rejected' ? 'status-rejected' : '' }}"
                                                    data-id="{{ $testimonial->id }}">

                                                    <option value="pending"
                                                        {{ $testimonial->status == 'pending' ? 'selected' : '' }}>
                                                        ⏳ Pending
                                                    </option>
                                                    <option value="approved"
                                                        {{ $testimonial->status == 'approved' ? 'selected' : '' }}>
                                                        ✅ Approved
                                                    </option>
                                                    <option value="rejected"
                                                        {{ $testimonial->status == 'rejected' ? 'selected' : '' }}>
                                                        ❌ Rejected
                                                    </option>
                                                </select>
                                            </td>



                                            <td>
                                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                                    class="btn btn-sm">
                                                    <img src="{{ asset('backend/assets/img/edit.png') }}" alt="Edit"
                                                        width="25">
                                                </a>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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

    <!-- AJAX Script -->
    <script>
        $(document).ready(function() {
            $('.status-select').on('change', function() {
                let testimonialId = $(this).data('id');
                let newStatus = $(this).val();

                $.ajax({
                    url: "{{ route('admin.testimonials.updateStatus') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: testimonialId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            alert("Status updated successfully!");
                        } else {
                            alert("Failed to update status.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
@endsection
