@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Testimonial</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial / Create</li>
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
                <div class="col-lg-12 mx-auto"> {{-- Center the form --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Edit Testimonial</h5>

                            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $testimonial->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        value="{{ $testimonial->designation }}" required>
                                </div>

                                {{-- <div class="mb-3">
                                    <label class="form-label">Rating (1-5)</label>
                                    <input type="number" name="rating" class="form-control" min="1" max="5"
                                        value="{{ $testimonial->rating }}" required>
                                </div> --}}

                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="3" required>{{ $testimonial->message }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Current Image</label><br>
                                    @if ($testimonial->image)
                                        <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" width="100"
                                            class="mb-2">
                                    @endif
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="pending" {{ $testimonial->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="approved" {{ $testimonial->status == 'approved' ? 'selected' : '' }}>
                                            Approved</option>
                                        <option value="rejected"
                                            {{ $testimonial->status == 'rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Update</button> {{-- Full width button --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
