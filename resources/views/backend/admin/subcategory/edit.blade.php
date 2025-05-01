@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle-container">
            <div class="pagetitle float-left">
                <h1>Edit Subcategory</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Subcategories / Edit</li>
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
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subcategory Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $subcategory->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active" {{ $subcategory->status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive" {{ $subcategory->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update Subcategory</button>
                                <a href="{{ route('admin.subcategories') }}" class="btn btn-secondary">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
