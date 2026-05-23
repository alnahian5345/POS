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

                        <form action="" method="POST">

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

                                    <option value="1">
                                        Electronics
                                    </option>

                                    <option value="2">
                                        Groceries
                                    </option>

                                    <option value="3">
                                        Stationery
                                    </option>

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

@endsection
