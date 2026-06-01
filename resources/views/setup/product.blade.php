@extends('main.master')

@section('content')

    <div class="container-fluid py-4">

        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <!-- Header -->
                    <div class="card-header border-0 py-3 px-4"
                         style="background: linear-gradient(135deg,#0d6efd,#4f8cff);">

                        <h4 class="text-white fw-bold mb-1 fs-5">
                            <i class="bi bi-box-seam me-2"></i>
                            Product Entry Form
                        </h4>

                        <p class="text-white-50 mb-0 small">
                            Add your product information.
                        </p>

                    </div>

                    <!-- Body -->
                    <div class="card-body p-4 bg-white">

                        <form action="{{Route('setup.product.create')}}" method="POST">

                        @csrf

                        <!-- Category -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold small">
                                    Category
                                </label>

                                <select name="category_id"
                                        class="form-select form-select-sm rounded-3">

                                    <option value="">
                                        Select Category
                                    </option>

                                    @foreach($category as $cat)
                                        <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <!-- Product Name -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold small">
                                    Product Name
                                </label>

                                <div class="input-group input-group-sm">

                                <span class="input-group-text bg-light">
                                    <i class="bi bi-bag"></i>
                                </span>

                                    <input type="text"
                                           name="product_name"
                                           class="form-control"
                                           placeholder="Enter Product Name">

                                </div>

                            </div>

                            <!-- Purchase Price -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold small">
                                    Purchase Price
                                </label>

                                <div class="input-group input-group-sm">

                                <span class="input-group-text bg-light">
                                    ৳
                                </span>

                                    <input type="number"
                                           step="0.01"
                                           name="purchase_price"
                                           class="form-control"
                                           placeholder="Enter Purchase Price">

                                </div>

                            </div>

                            <!-- Sale Price -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold small">
                                    Sale Price
                                </label>

                                <div class="input-group input-group-sm">

                                <span class="input-group-text bg-light">
                                    ৳
                                </span>

                                    <input type="number"
                                           step="0.01"
                                           name="sale_price"
                                           class="form-control"
                                           placeholder="Enter Sale Price">

                                </div>

                            </div>

                            <!-- Button -->
                            <div class="d-flex gap-2">

                                <button type="submit"
                                        class="btn btn-primary btn-sm px-4 rounded-3 fw-semibold">

                                    <i class="bi bi-check-circle me-1"></i>
                                    Save Product

                                </button>

                                <a href=""
                                   class="btn btn-light btn-sm border px-4 rounded-3 fw-semibold">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

{{----------------------------------------}}
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
                                Product List
                            </h4>

                            <p class="text-muted mb-0 small">
                                Manage your existing Product.
                            </p>

                        </div>

                        <span class="badge bg-primary rounded-pill px-3 py-2 small">
                                Total : {{ count($product) }}
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
                                <th class="py-2 fw-bold">Product Name</th>
                                <th class="py-2 fw-bold">Category</th>
                                <th class="py-2 fw-bold">Purchase Price</th>
                                <th class="py-2 fw-bold">Sales Price</th>
                                <th class="py-2 fw-bold text-end pe-4">Actions</th>
                            </tr>

                            </thead>

                            <tbody>

                            @forelse($product as $key => $prod)

                                <tr>

                                    <td class="ps-4 py-2 fw-semibold">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $prod->product_name }}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $prod->category->category_name}}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $prod->purchase_price }}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $prod->sale_price }}
                                        </div>
                                    </td>
                                    <td class="text-end pe-4 py-2">
                                        <div class="d-flex justify-content-end gap-2">
                                            <!-- Edit -->
                                            <a href=" "
                                               class="btn btn-sm btn-light border text-primary rounded-3">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <!-- Delete -->
                                            <form action="{{Route('setup.product.delete',$prod->product_id)}}"
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
