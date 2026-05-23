@extends('main.master')

@section('content')

    <div class="container-fluid py-3">

        <!-- Page Heading -->
        <div class="row mb-3">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <div>
                        <h2 class="fw-bold mb-1 text-dark fs-4">
                            <i class="bi bi-grid-fill text-primary me-2"></i>
                            Category Management
                        </h2>

                        <p class="text-muted mb-0 small">
                            Manage your inventory product categories easily.
                        </p>
                    </div>

                </div>

            </div>
        </div>

        <!-- Form Section -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <!-- Card Header -->
                    <div class="card-header border-0 py-3 px-4"
                         style="background: linear-gradient(135deg,#0d6efd,#4f8cff);">

                        <h4 class="text-white fw-bold mb-1 fs-5">
                            <i class="bi bi-folder-plus me-2"></i>

                            {{ isset($editCategory)
                                ? 'Update Category'
                                : 'Create Category' }}
                        </h4>

                        <p class="text-white-50 mb-0 small">
                            Add or manage your inventory categories.
                        </p>

                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-3 bg-white">

                        <form action="{{ isset($editCategory)
                                ? route('setup.category.update',$editCategory->category_id)
                                : route('setup.category.create') }}"
                              method="POST">

                        @csrf

                        @if(isset($editCategory))
                            @method('PUT')
                        @endif

                        <!-- Category Name -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold text-dark small">
                                    Category Name
                                </label>

                                <div class="input-group input-group-sm">

                                    <span class="input-group-text bg-light border-0 rounded-start-4">
                                        <i class="bi bi-tag-fill text-primary"></i>
                                    </span>

                                    <input type="text"
                                           name="category_name"
                                           value="{{ old('category_name', isset($editCategory) ? $editCategory->category_name : '') }}"
                                           class="form-control border-0 bg-light rounded-end-4 py-2 small"
                                           placeholder="Enter category name">

                                </div>

                                @error('category_name')

                                <small class="text-danger d-block mt-1">
                                    {{ $message }}
                                </small>

                                @enderror

                            </div>

                            <!-- Status -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold text-dark small">
                                    Status
                                </label>

                                <div class="input-group input-group-sm">

                                    <span class="input-group-text bg-light border-0 rounded-start-4">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    </span>

                                    <select name="status"
                                            class="form-select border-0 bg-light rounded-end-4 py-2 small">

                                        <option value="N">Inactive</option>
                                        <option value="Y">Active</option>

                                    </select>

                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2 mt-3">

                                <button type="submit"
                                        class="btn btn-primary px-3 py-2 rounded-4 fw-semibold shadow-sm small">

                                    <i class="bi bi-save2 me-1"></i>

                                    {{ isset($editCategory)
                                        ? 'Update'
                                        : 'Save' }}

                                </button>

                                <a href=""
                                   class="btn btn-light border px-3 py-2 rounded-4 fw-semibold small">

                                    <i class="bi bi-arrow-left me-1"></i>
                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Category List -->
        <div class="row justify-content-center mt-4">

            <div class="col-xl-9">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <!-- Table Header -->
                    <div class="card-header border-0 py-3 px-4"
                         style="background: linear-gradient(135deg,#f8f9fa,#eef2ff);">

                        <div class="d-flex justify-content-between align-items-center flex-wrap">

                            <div>

                                <h4 class="fw-bold mb-1 text-dark fs-5">
                                    <i class="bi bi-table me-2 text-primary"></i>
                                    Category List
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Manage your existing inventory categories.
                                </p>

                            </div>

                            <span class="badge bg-primary rounded-pill px-3 py-2 small">
                                Total : {{ count($category) }}
                            </span>

                        </div>

                    </div>

                    <!-- Table -->
                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0 small">

                                <thead class="bg-light">

                                <tr>
                                    <th class="ps-4 py-2 fw-bold">#</th>
                                    <th class="py-2 fw-bold">Category Name</th>
                                    <th class="py-2 fw-bold">Status</th>
                                    <th class="py-2 fw-bold text-end pe-4">Actions</th>
                                </tr>

                                </thead>

                                <tbody>

                                @forelse($category as $key => $cat)

                                    <tr>

                                        <td class="ps-4 py-2 fw-semibold">
                                            {{ $key + 1 }}
                                        </td>

                                        <td class="py-2">
                                            <div class="fw-semibold text-dark">
                                                {{ $cat->category_name }}
                                            </div>
                                        </td>

                                        <td class="py-2">

                                            @if($cat->status == 'Y')

                                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1">
                                                    <i class="bi bi-check-circle-fill me-1"></i>
                                                    Active
                                                </span>

                                            @else

                                                <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1">
                                                    <i class="bi bi-x-circle-fill me-1"></i>
                                                    Inactive
                                                </span>

                                            @endif

                                        </td>

                                        <td class="text-end pe-4 py-2">

                                            <div class="d-flex justify-content-end gap-2">

                                                <!-- Edit -->
                                                <a href="{{ route('setup.category.editCategory',$cat->category_id) }}"
                                                   class="btn btn-sm btn-light border text-primary rounded-3">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ Route('setup.category.delete',$cat->category_id) }}"
                                                      method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-sm btn-light border text-danger rounded-3">

                                                        <i class="bi bi-trash"></i>

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center py-4 text-muted small">

                                            <i class="bi bi-inbox fs-4 d-block mb-2"></i>

                                            No categories found.

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
                confirmButtonColor: '#0d6efd'
            });

        </script>

    @endif

    @if(session('updated'))

        <script>

            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: '{{ session('updated') }}',
                confirmButtonColor: '#0d6efd'
            });

        </script>

    @endif

    @if(session('delete'))

        <script>

            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: '{{ session('delete') }}',
                confirmButtonColor: '#0d6efd'
            });

        </script>

    @endif

@endsection
