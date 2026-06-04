@extends('main.master')
@section('content')
    <div class="container-fluid py-4">

        <div class="card shadow border-0 rounded-4">

            <!-- Header -->
            <div class="card-header text-white"
                 style="background: rgb(0 150 136);">
                <h4 class="mb-0">Supplier Entry Form</h4>
            </div>

            <div class="card-body">

                <form action="" method="POST">

                    <div class="row g-4">

                        <!-- Supplier Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold px-2 py-1 rounded"
                                   style="background: rgb(0 150 136 / 10%);">
                                Supplier Name
                            </label>

                            <input type="text"
                                   name="supplier_name"
                                   class="form-control form-control-lg"
                                   placeholder="Enter Supplier Name">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold px-2 py-1 rounded"
                                   style="background: rgb(0 150 136 / 10%);">
                                Phone Number
                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control form-control-lg"
                                   placeholder="Enter Phone Number">
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <label class="form-label fw-semibold px-2 py-1 rounded"
                                   style="background: rgb(0 150 136 / 10%);">
                                Address
                            </label>

                            <textarea name="address"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Enter Supplier Address"></textarea>
                        </div>

                    </div>

                    <!-- Supplier Information Card -->
                    <div class="card border-0 shadow-sm mt-4">

                        <div class="card-header fw-bold"
                             style="background: rgb(0 150 136 / 10%);
                                color: rgb(0 150 136);">
                            Supplier Information
                        </div>

                        <div class="card-body">

                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label">Contact Person</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Optional">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           class="form-control"
                                           placeholder="Optional">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="text-end mt-4">

                        <button type="reset"
                                class="btn btn-secondary px-4">
                            Reset
                        </button>

                        <button type="submit"
                                class="btn px-4 text-white"
                                style="background: rgb(0 150 136);">
                            Save Supplier
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection

