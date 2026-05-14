@extends('main.master')

@section('content')
    <div class="container-fluid py-4">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <!-- Card -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <!-- Header -->
                    <div class="card-header border-0 py-4"
                         style="background:#e6fff9;">

                        <h3 class="fw-bold mb-1">
                            Create Category
                        </h3>

                        <p class="text-muted mb-0">
                            Add a new category for your inventory products.
                        </p>

                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <form action="{{ route('setup.category.create') }}" method="POST">

                        @csrf

                        <!-- Category Name -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Category Name
                                </label>

                                <input type="text"
                                       name="category_name"
                                       value="{{ old('category_name') }}"
                                       class="form-control rounded-4"
                                       placeholder="Enter category name"
                                       style="height:52px;">

                                @error('category_name')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                                @enderror

                            </div>

                            <!-- Status -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Status
                                </label>

                                <select name="status"
                                        class="form-select rounded-4"
                                        style="height:52px;">

                                    <option value="N">Inactive</option>
                                    <option value="Y">Active</option>

                                </select>

                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2">

                                <button type="submit"
                                        class="btn px-4 py-3 text-dark fw-semibold rounded-4"
                                        style="background:#e6fff9;">

                                    <i class="bi bi-check-circle me-1"></i>
                                    Save Category

                                </button>

                                <a href=""
                                   class="btn btn-light px-4 py-3 rounded-4 fw-semibold">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

{{--    ------------------------}}
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header border-0 py-4" style="background:#e6fff9;">
                    <h3 class="fw-bold mb-1">Category List</h3>
                    <p class="text-muted mb-0">Manage your existing inventory categories.</p>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3">#</th>
                                <th class="py-3">Category Name</th>
                                <th class="py-3">Status</th>
                                <th class="py-3 text-end pe-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($category as $cat)
                                <tr>
                                    <td class="ps-4">id</td>
                                    <td class="fw-semibold">{{ $cat->category_name }}</td>
                                    <td>

{{--                                        @if($category->status == 'Y')--}}
{{--                                            <span class="badge rounded-pill bg-success-subtle text-success px-3">Active</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Inactive</span>--}}
{{--                                        @endif--}}
                                    </td>
{{--                                    <td class="text-end pe-4">--}}
{{--                                        <div class="btn-group">--}}
{{--                                            <a href="{{ route('setup.category.edit', $category->id) }}"--}}
{{--                                               class="btn btn-sm btn-light rounded-3 me-2">--}}
{{--                                                <i class="bi bi-pencil-square"></i>--}}
{{--                                            </a>--}}
{{--                                            <form action="{{ route('setup.category.delete', $category->id) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-sm btn-light text-danger rounded-3">--}}
{{--                                                    <i class="bi bi-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))

        <script>

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });

        </script>

    @endif

@endsection
