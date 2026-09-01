@extends('main.master')

@section('content')

    <div class="container-fluid px-4 py-4">

        <!-- Page Header -->
        <div class="bg-success bg-gradient rounded-4 p-4 p-md-5 mb-4 text-white shadow-sm">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h2 class="fw-bold mb-1">
                        <i class="bi bi-box-seam me-2"></i> Product Management
                    </h2>
                    <p class="mb-0 opacity-75">Manage product information and inventory easily</p>
                </div>
                <button type="button" class="btn btn-light fw-semibold px-4 py-2 rounded-pill shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#productModal"
                        onclick="openCreateModal()">
                    <i class="bi bi-plus-lg me-1"></i> Add Product
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="bi bi-box-seam fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ count($product) }}</h4>
                            <small class="text-muted">Total Products</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                            <i class="bi bi-tags fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ collect($product)->unique('category_id')->count() }}</h4>
                            <small class="text-muted">Categories Used</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="bi bi-currency-dollar fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ number_format(collect($product)->sum('purchase_price'), 0) }}</h4>
                            <small class="text-muted">Total Purchase Value</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="bi bi-currency-dollar fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ number_format(collect($product)->sum('sale_price'), 0) }}</h4>
                            <small class="text-muted">Total Sale Value</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Product List -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-0">All Products</h5>
                            {{-- <small class="text-muted">List of all products</small> --}}
                        </div>
                        <div class="d-flex ">
                            <input type="text" class="form-control form-control-sm" placeholder="Search products..." style="min-width: 200px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3" style="width: 70px;">#</th>
                            <th class="py-3">Product Name</th>
                            <th class="py-3">Category</th>
                            <th class="py-3">Purchase Price</th>
                            <th class="py-3">Sale Price</th>
                            <th class="text-end pe-4 py-3" style="width: 130px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($product as $key => $prod)
                            <tr>
                                <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-2">
                                            <i class="bi bi-box"></i>
                                        </div>
                                        <span class="fw-medium">{{ $prod->product_name }}</span>
                                    </div>
                                </td>
                                <td>{{ $prod->category?->category_name ?? 'No Category' }}</td>
                                <td>{{ number_format($prod->purchase_price, 2) }}</td>
                                <td class="fw-semibold text-success">{{ number_format($prod->sale_price, 2) }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button"
                                                class="btn btn-sm btn-outline-primary rounded-3"
                                                title="Edit"
                                                onclick="openEditModal(
                                                {{ $prod->product_id }},
                                                    '{{ $prod->product_name }}',
                                                    '{{ $prod->category_id }}',
                                                    '{{ $prod->purchase_price }}',
                                                    '{{ $prod->sale_price }}'
                                                    )">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <form action="{{ route('setup.product.delete', $prod->product_id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="bi bi-box text-muted display-4"></i>
                                        <h5 class="mt-3 text-muted">No Product Found</h5>
                                        <p class="text-muted mb-3">Get started by creating your first product</p>
                                        <button type="button" class="btn btn-success rounded-pill px-4"
                                                data-bs-toggle="modal" data-bs-target="#productModal"
                                                onclick="openCreateModal()">
                                            <i class="bi bi-plus-lg me-1"></i> Add Product
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--==================== Product Modal ====================-->
    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow rounded-4">

                <div class="modal-header bg-success bg-gradient text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-box-seam me-2"></i>
                        <span id="modalTitleText">Create Product</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form id="productForm" method="POST">
                    @csrf
                    <input type="hidden" id="formMethod" name="_method" value="POST">

                    <div class="modal-body p-4">
                        <div class="row g-3">

                            <!-- Category -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Category</label>
                                <select id="category_id" name="category_id" class="form-select form-select-lg rounded-3" required>
                                    <option value="">Select Category</option>
                                </select>
                            </div>

                            <!-- Product Name -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Product Name</label>
                                <input type="text" name="product_name" id="product_name"
                                       class="form-control form-control-lg rounded-3"
                                       placeholder="Enter Product Name" required>
                            </div>

                            <!-- Purchase Price -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Purchase Price</label>
                                <input type="number" step="0.01" name="purchase_price" id="purchase_price"
                                       class="form-control form-control-lg rounded-3"
                                       placeholder="Enter Purchase Price" required>
                            </div>

                            <!-- Sale Price -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sale Price</label>
                                <input type="number" step="0.01" name="sale_price" id="sale_price"
                                       class="form-control form-control-lg rounded-3"
                                       placeholder="Enter Sale Price" required>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success rounded-pill px-4" id="submitBtn">
                            <i class="bi bi-check2 me-1"></i>
                            <span id="submitBtnText">Save Product</span>
                        </button>
                    </div>
                </form>

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
                confirmButtonColor: '#198754'
            });
        </script>
    @endif

    @if(session('updated'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: '{{ session('updated') }}',
                confirmButtonColor: '#198754'
            });
        </script>
    @endif

    @if(session('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: '{{ session('delete') }}',
                confirmButtonColor: '#198754'
            });
        </script>
    @endif

    <script>
        $(document).ready(function () {
            loadCategoryList();
        });

        function loadCategoryList(selectedId = null) {
            $.ajax({
                url: "{{ route('setup.product.category_list') }}",
                type: "get",
                dataType: "json",
                success: function (response) {
                    let option = '<option value="">Select Category</option>';

                    $.each(response, function (i, cat) {
                        let selected = (selectedId == cat.category_id) ? 'selected' : '';
                        option += `<option value="${cat.category_id}" ${selected}>${cat.category_name}</option>`;
                    });

                    $('#category_id').html(option);

                    // Select2 re-init
                    if ($.fn.select2) {
                        $('#category_id').select2({
                            placeholder: 'Select Category',
                            allowClear: true,
                            width: '100%',
                            dropdownParent: $('#productModal')
                        });
                    }
                }
            });
        }

        // Create Modal
        function openCreateModal() {
            document.getElementById('modalTitleText').innerText = 'Create Product';
            document.getElementById('submitBtnText').innerText = 'Save Product';
            document.getElementById('productForm').action = "{{ route('setup.product.create') }}";
            document.getElementById('formMethod').value = 'POST';

            document.getElementById('product_name').value = '';
            document.getElementById('purchase_price').value = '';
            document.getElementById('sale_price').value = '';

            loadCategoryList();
        }

        // Edit Modal
        function openEditModal(id, name, categoryId, purchasePrice, salePrice) {
            document.getElementById('modalTitleText').innerText = 'Update Product';
            document.getElementById('submitBtnText').innerText = 'Update Product';
            document.getElementById('productForm').action = "{{ url('/product/update') }}/" + id;
            document.getElementById('formMethod').value = 'PUT';

            document.getElementById('product_name').value = name;
            document.getElementById('purchase_price').value = purchasePrice;
            document.getElementById('sale_price').value = salePrice;

            loadCategoryList(categoryId);

            var modal = new bootstrap.Modal(document.getElementById('productModal'));
            modal.show();
        }
    </script>

@endsection
