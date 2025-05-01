@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Edit Vedio Banner</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> Vedio-Banner / Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-body mt-3">
                            <form action="{{ route('admin.vedio-banner.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Heading</label>
                                    <input type="text" name="heading" class="form-control shadow-sm"
                                        value="{{ $slider->heading ?? '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Current Video</label>
                                    <div class="border p-2 rounded bg-light text-center">
                                        @if ($slider && $slider->video)
                                            <video width="70%" height="250" controls class="rounded">
                                                <source src="{{ asset('' . $slider->video) }}" type="video/mp4">
                                            </video>
                                        @else
                                            <p class="text-muted">No video available</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Upload New Video</label>
                                    <p><i><b>Please upload a video no longer than 3 minutes</b></i></p>
                                    <input type="file" name="video" class="form-control shadow-sm">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-4">Update Slider</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary px-4">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
