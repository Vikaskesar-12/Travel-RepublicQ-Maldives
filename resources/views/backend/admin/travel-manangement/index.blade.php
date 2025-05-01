@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Tour Packages</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tour Packages</li>
                    </ol>
                </nav>
            </div>
            <div class="button-container d-flex justify-content-end mb-3">
                <a href="{{ route('admin.travel.create') }}" class="btn-add-category">
                    <button type="button" class="btn btn-success">Add Tour Packages</button>
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
                                        <th>#</th>
                                        <th>Tour Name</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($travels as $travel)
                                        <tr>
                                            <td>{{ $travel->id }}</td>
                                            <td>{{ $travel->name }}</td>
                                            <td>{{ $travel->category->name }}</td>
                                            <td>{{ $travel->subcategory->name }}</td>
                                            <td>{{ $travel->country->name }}</td>
                                            <td>{{ $travel->state->name }}</td>
                                            <td>{{ $travel->city->name }}</td>

                                            <td>
                                                <input class="input-switch status-toggle" type="checkbox"
                                                    id="status_{{ $travel->id }}" data-id="{{ $travel->id }}"
                                                    data-status="{{ $travel->status }}"
                                                    {{ $travel->status == 'Active' ? 'checked' : '' }} />
                                                <label class="label-switch" for="status_{{ $travel->id }}"></label>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.travel.edit', $travel->id) }}" class="btn btn-sm">
                                                    <img src="{{ asset('backend/assets/img/edit.png') }}" alt="Edit"
                                                        width="25">
                                                </a>
                                                <form action="{{ route('admin.travel.delete', $travel->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).on('change', '.status-toggle', function() {
                var id = $(this).data('id');
                var status = $(this).prop('checked') ? 'Active' : 'Inactive';

                $.ajax({
                    url: "{{ route('admin.travel.updateStatus') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        alert(response.success);
                    }
                });
            });
        </script>
    @endsection
