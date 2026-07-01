@extends('main.master')
@section('content')
    <div class="container-fluid py-4">

        <div class="card shadow-sm border-0 rounded-3">
            <!---------------------------------------------------- Page Heading -->
            <div class="row mb-3">
                <div class="col-12">

                    <h2 class="fw-bold mb-1 text-dark">
                        <i class="bi bi-people-fill me-2"
                           style="color: rgb(0 150 136);"></i>
                        Purchase
                    </h2>

                    <p class="text-muted mb-0">
                        Purchase information and records.
                    </p>

                </div>
            </div>
            <!-- Header -->
            <div class="card-header text-white"
                 style="background:#009688;">
                <h5 class="mb-0">
                    <i class="fas fa-shopping-cart me-2"></i>
                    Purchase Entry
                </h5>
            </div>

            <div class="card-body">

                <form action="{{Route('purchase.purchase.create')}}" method="POST">

                    @csrf

                    <div class="row g-3 mb-4">

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">
                                Purchase No
                            </label>
                            <input type="text"
                                   class="form-control"
                                   value="PUR-00001"
                                   readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">
                                Purchase Date
                            </label>
                            <input type="date"
                                   name="purchase_date"
                                   class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">
                                Supplier
                            </label>

                            <select class="form-select"
                                    id="supplier_id"
                                    name="supplier_id">
                                <option>Select Supplier</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">
                                Invoice No
                            </label>
                            <input type="text"
                                   class="form-control"
                                   name="invoice_no">
                        </div>

                    </div>

                    <!----------------------------------------- Product Table------------------------------------------ -->
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead class="table-light">

                            <tr>
                                <th width="30%">Product</th>
                                <th width="15%">Qty</th>
                                <th width="20%">Unit Price</th>
                                <th width="20%">Amount</th>
                                <th width="15%">Action</th>
                            </tr>

                            </thead>

                            <tbody id="productTable">

                            <tr>

                                <td>
                                    <select class="form-select  product_id "
                                            class=""
                                            name="product_id[]">

                                        <option>Select Product</option>
                                    </select>

                                </td>

                                <td>
                                    <input type="number"
                                           class="form-control qty"
                                           name="qty[]">
                                </td>

                                <td>
                                    <input type="number"
                                           class="form-control price"
                                           name="price[]">
                                </td>

                                <td>
                                    <input type="text"
                                           class="form-control amount"
                                           readonly>
                                </td>

                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-danger btn-sm">
                                        Remove
                                    </button>
                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                    <!-------------------------------------- Add Row---------------- -->
                    <div class="mb-3">
                        <button type="button"
                                id="addRow"
                                class="btn btn-success">
                            + Add Product
                        </button>
                    </div>

                    <!---------------------------------------------- Summary ----------------------------->
                    <div class="row">

                        <div class="col-md-4 ms-auto">

                            <table class="table table-bordered">

                                <tr>
                                    <th>Subtotal</th>
                                    <td>
                                        <input type="text"
                                               class="form-control text-end"
                                               readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Discount</th>
                                    <td>
                                        <input type="number"
                                               class="form-control text-end">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Grand Total</th>
                                    <td>
                                        <input type="text"
                                               class="form-control text-end fw-bold"
                                               readonly>
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <!------------------------------------------------ Buttons ---------------------------->
                    <div class="text-end">

                        <button type="reset"
                                class="btn btn-secondary">
                            Reset
                        </button>

                        <button type="submit"
                                class="btn text-white"
                                style="background:#009688;">
                            Save Purchase
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>

        let productOption = '';

        $(document).ready(function () {

            loadSupplierList();
            loadProductList();

            // ================= Add Product Row =================
            $('#addRow').on('click', function () {

                let row = `
                <tr>

                    <td>
                        <select class="form-select product_id" name="product_id[]">
                            ${productOption}
                        </select>
                    </td>

                    <td>
                        <input type="number"
                               class="form-control qty"
                               name="qty[]">
                    </td>

                    <td>
                        <input type="number"
                               class="form-control price"
                               name="price[]">
                    </td>

                    <td>
                        <input type="text"
                               class="form-control amount"
                               readonly>
                    </td>

                    <td class="text-center">
                        <button type="button"
                                class="btn btn-danger btn-sm removeRow">
                            Remove
                        </button>
                    </td>

                </tr>
            `;

                $('#productTable').append(row);

                // Initialize Select2 for new row
                $('#productTable tr:last .product_id').select2({
                    placeholder: "Select Product",
                    allowClear: true,
                    width: "100%"
                });

            });

            // ================= Remove Row =================
            $(document).on('click', '.removeRow', function () {

                if ($('#productTable tr').length > 1) {
                    $(this).closest('tr').remove();
                } else {
                    alert('At least one product is required.');
                }

            });

        });

        // ================= Supplier =================
        function loadSupplierList() {

            $.ajax({
                url: "{{ route('purchase.purchase.supplier-list') }}",
                type: "GET",
                dataType: "json",

                success: function (response) {

                    let option = '<option value="">Select Supplier</option>';

                    $.each(response, function (i, sup) {

                        option += `
                        <option value="${sup.supplier_id}">
                            ${sup.supplier_name}
                        </option>
                    `;

                    });

                    $('#supplier_id').html(option);

                    $('#supplier_id').select2({
                        placeholder: "Select Supplier",
                        allowClear: true,
                        width: "100%"
                    });

                },

                error: function (xhr) {
                    console.log(xhr.responseText);
                }

            });

        }

        // ================= Product =================
        function loadProductList() {

            $.ajax({

                url: "{{ route('purchase.purchase.product-list') }}",
                type: "GET",
                dataType: "json",

                success: function (response) {

                    productOption = '<option value="">Select Product</option>';

                    $.each(response, function (i, prod) {

                        productOption += `
                        <option value="${prod.product_id}">
                            ${prod.product_name}
                        </option>
                    `;

                    });

                    // First Row
                    $('.product_id').html(productOption);

                    $('.product_id').select2({
                        placeholder: "Select Product",
                        allowClear: true,
                        width: "100%"
                    });

                },

                error: function (xhr) {
                    console.log(xhr.responseText);
                }

            });

        }

    </script>

@endsection
