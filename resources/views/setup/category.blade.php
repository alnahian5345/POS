@extends('main.master')

@section('content')

    <div class="container-fluid px-3 py-3">

        <!-- Page Heading -->
        <div class="row mb-3">
            <div class="col-12">

                <h2 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-grid-fill text-primary me-2"></i>
                    Category Management
                </h2>

                <p class="text-muted mb-0">
                    Manage your inventory product categories easily.
                </p>

            </div>
        </div>

        <!-- Form Section -->
        <div class="row">

            <div class="col-12">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <div class="card-header text-white py-3 px-4"
                         style="background:#009688;">

                        <h4 class="mb-1">

                            <i class="bi bi-folder-plus me-2"></i>

                            {{ isset($editCategory)
                                ? 'Update Category'
                                : 'Create Category' }}

                        </h4>

                        <p class="mb-0 text-white-50">
                            Add or manage your inventory categories.
                        </p>

                    </div>

                    <div class="card-body p-4">

                        <form action="{{ isset($editCategory)
                        ? route('setup.category.update',$editCategory->category_id)
                        : route('setup.category.create') }}"
                              method="POST">

                            @csrf

                            @if(isset($editCategory))
                                @method('PUT')
                            @endif

                            <div class="row g-4">

                                <!-- Category Name -->
                                <div class="col-md-8">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background:rgb(0 150 136 / 10%);">

                                        Category Name

                                    </label>

                                    <input type="text"
                                           name="category_name"
                                           value="{{ old('category_name', isset($editCategory) ? $editCategory->category_name : '') }}"
                                           class="form-control"
                                           placeholder="Enter Category Name">

                                    @error('category_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror

                                </div>

                                <!-- Status -->
                                <div class="col-md-4">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background:rgb(0 150 136 / 10%);">

                                        Status

                                    </label>

                                    <select name="status"
                                            class="form-select">

                                        <option value="Y"
                                            {{ old('status', isset($editCategory)?$editCategory->status:'Y')=='Y' ? 'selected':'' }}>
                                            Active
                                        </option>

                                        <option value="N"
                                            {{ old('status', isset($editCategory)?$editCategory->status:'Y')=='N' ? 'selected':'' }}>
                                            Inactive
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="mt-4     text-end ">

                                <button type="submit"
                                        class="btn text-white px-4"
                                        style="background:#009688;">

                                    <i class="bi bi-save me-1"></i>

                                    {{ isset($editCategory)
                                        ? 'Update Category'
                                        : 'Save Category' }}

                                </button>

                                <a href="{{ route('setup.category') }}"
                                   class="btn btn-secondary">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Category List -->
        <div class="row mt-4">

            <div class="col-12">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <div class="card-header py-3 px-4"
                         style="background:rgb(0 150 136 / 10%);">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h4 class="mb-1 fw-bold"
                                    style="color:#009688;">

                                    <i class="bi bi-table me-2"></i>
                                    Category List

                                </h4>

                                <p class="text-muted mb-0">
                                    Manage existing categories.
                                </p>

                            </div>

                            <span class="badge bg-success rounded-pill px-3 py-2">
                            Total : {{ count($category) }}
                        </span>

                        </div>

                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>

                                </thead>

                                <tbody>

                                @forelse($category as $key => $cat)

                                    <tr>

                                        <td class="ps-4">
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cat->category_name }}
                                        </td>

                                        <td>

                                            @if($cat->status == 'Y')

                                                <span class="badge bg-success">
                                                Active
                                            </span>

                                            @else

                                                <span class="badge bg-danger">
                                                Inactive
                                            </span>

                                            @endif

                                        </td>

                                        <td class="text-end pe-4">

                                            <div class="d-flex justify-content-end gap-2">

                                                <a href="{{ route('setup.category.editCategory',$cat->category_id) }}"
                                                   class="btn btn-sm btn-outline-primary">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <form action="{{ route('setup.category.delete',$cat->category_id) }}"
                                                      method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-sm btn-outline-danger">

                                                        <i class="bi bi-trash"></i>

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center py-4">

                                            No Categories Found

                                        </td>

                                    </tr>

                                @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#009688'
            });
        </script>
    @endif

    @if(session('update'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: '{{ session('update') }}',
                confirmButtonColor: '#009688'
            });
        </script>
    @endif

    @if(session('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: '{{ session('delete') }}',
                confirmButtonColor: '#009688'
            });
        </script>
    @endif

@endsection
