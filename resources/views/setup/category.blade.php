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
