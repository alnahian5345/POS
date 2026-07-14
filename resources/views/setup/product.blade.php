@extends('main.master')

@section('content')

    <div class="container-fluid px-3 py-3">

        <!-- Page Heading -->
        <div class="row mb-3">
            <div class="col-12">

                <h2 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-box-seam me-2"
                       style="color: rgb(0 150 136);"></i>
                    Product Management
                </h2>

                <p class="text-muted mb-0">
                    Manage product information and inventory.
                </p>

            </div>
        </div>

        <!-- Product Form -->
        <div class="row">
            <div class="col-12">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <div class="card-header text-white py-3 px-4"
                         style="background: rgb(0 150 136);">

                        <h4 class="mb-1 fw-bold">
                            <i class="bi bi-box-seam me-2"></i>

                            {{ isset($editProduct)
                                ? 'Update Product'
                                : 'Create Product' }}
                        </h4>

                        <p class="mb-0 text-white-50 small">
                            Add and manage product information.
                        </p>

                    </div>

                    <div class="card-body p-4">

                        <form action="{{ isset($editProduct)
                        ? route('setup.product.update',$editProduct->product_id)
                        : route('setup.product.create') }}"
                              method="POST">

                            @csrf

                            @if(isset($editProduct))
                                @method('PUT')
                            @endif

                            <div class="row g-4">

                                <!-- Category -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Category

                                    </label>

                                    <select
                                        id="category_id"
                                        name="category_id"
                                        class="form-select">

                                        <option value="">
                                            Select Category
                                        </option>

                                        {{--                                        @foreach($category as $cat)--}}

                                        {{--                                            <option value="{{ $cat->category_id }}"--}}
                                        {{--                                                {{ old('category_id', $editProduct->category_id ?? '') == $cat->category_id ? 'selected' : '' }}>--}}

                                        {{--                                                {{ $cat->category_name }}--}}

                                        {{--                                            </option>--}}

                                        {{--                                        @endforeach--}}
                                    </select>

                                </div>

                                <!-- Product Name -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Product Name

                                    </label>

                                    <input type="text"
                                           name="product_name"
                                           value="{{ old('product_name', isset($editProduct) ? $editProduct->product_name : '') }}"
                                           class="form-control"
                                           placeholder="Enter Product Name">

                                </div>
                                <!-- Purchase Price -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Purchase Price

                                    </label>

                                    <input type="number"
                                           step="0.01"
                                           name="purchase_price"
                                           value="{{ old('purchase_price', isset($editProduct) ? $editProduct->purchase_price : '') }}"
                                           class="form-control"
                                           placeholder="Enter Purchase Price">

                                </div>

                                <!-- Sale Price -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Sale Price

                                    </label>

                                    <input type="number"
                                           step="0.01"
                                           name="sale_price"
                                           value="{{ old('sale_price', isset($editProduct) ? $editProduct->sale_price : '') }}"
                                           class="form-control"
                                           placeholder="Enter Sale Price">

                                </div>

                            </div>

                            <div class="mt-4 text-end">

                                <button type="submit"
                                        class="btn text-white px-4"
                                        style="background: rgb(0 150 136);">

                                    <i class="bi bi-save me-1"></i>

                                    {{ isset($editProduct)
                                        ? 'Update Product'
                                        : 'Save Product' }}

                                </button>

                                <a href="{{ route('setup.product') }}"
                                   class="btn btn-secondary">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        <!-- Product List -->
        <div class="row mt-4">

            <div class="col-12">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <div class="card-header py-3 px-4"
                         style="background: rgb(0 150 136 / 10%);">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h4 class="fw-bold mb-1"
                                    style="color: rgb(0 150 136);">

                                    <i class="bi bi-table me-2"></i>

                                    Product List

                                </h4>

                                <p class="text-muted mb-0 small">
                                    Manage existing products.
                                </p>

                            </div>

                            <span class="badge bg-success rounded-pill px-3 py-2">

                            Total : {{ count($product) }}

                        </span>

                        </div>

                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th class="text-end pe-4">Action</th>
                                </tr>

                                </thead>

                                <tbody>
                                @forelse($product as $key => $prod)

                                    <tr>

                                        <td class="ps-4">
                                            {{ $key + 1 }}
                                        </td>

                                        <td>{{ $prod->product_name }}</td>

                                        <td>
                                            {{ $prod->category?->category_name ?? 'No Category' }}
                                        </td>

                                        <td>{{ $prod->purchase_price }}</td>

                                        <td>{{ $prod->sale_price }}</td>

                                        <td class="text-end pe-4">

                                            <div class="d-flex justify-content-end gap-2">

                                                <a href="{{ route('setup.product.edit',$prod->product_id) }}"
                                                   class="btn btn-sm btn-outline-primary">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <form action="{{ route('setup.product.delete',$prod->product_id) }}"
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

                                        <td colspan="6"
                                            class="text-center py-5 text-muted">

                                            No Product Found

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

    @if(session('updated'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: '{{ session('updated') }}',
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
    <script>
        $(document).ready(function () {
            loadProductList();


            function loadProductList() {
                $.ajax({
                    url: "{{route('setup.product.category_list')}}",
                    type: "get",
                    dataType: "json",
                    success: function (response) {

                        let selectedCategoryId = "{{ $editProduct->category_id ?? '' }}";

                        let option = '<option value="" >Select Category</option>';

                        $.each(response, function (i, cat) {
                            let selected=selectedCategoryId==cat.category_id?'selected':" ";

                            option += `<option value="${cat.category_id} " ${selected}>
                               ${cat.category_name}
                            </option>`;
                        });

                        $('#category_id').html(option);

                        $('#category_id').select2({
                            placeholder:'Select supplier',
                            allowClear: true,
                            width: '100%'
                        })
                    }
                });
            }
        });

    </script>

@endsection
