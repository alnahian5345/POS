@extends('main.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Add Customer</h5>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label for="customer_name" class="form-label">
                                        Customer Name
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="customer_name"
                                           name="customer_name"
                                           placeholder="Enter Customer Name">
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">
                                        Phone Number
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="phone"
                                           name="phone"
                                           placeholder="01XXXXXXXXX">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">
                                        Email (Optional)
                                    </label>
                                    <input type="email"
                                           class="form-control"
                                           id="email"
                                           name="email"
                                           placeholder="example@email.com">
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">
                                        Address
                                    </label>
                                    <textarea class="form-control"
                                              id="address"
                                              name="address"
                                              rows="3"
                                              placeholder="Enter customer address"></textarea>
                                </div>

                            </div>

                            <div class="mt-4 text-end">
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    Save Customer
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-------------------- Customer List--------------------}}


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
                                Customer List
                            </h4>
                            <p class="text-muted mb-0 small">
                                Manage your existing Customer.
                            </p>
                        </div>
                        <span class="badge bg-primary rounded-pill px-3 py-2 small">
                                Total : {{ count($customer) }}
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
                                <th class="py-2 fw-bold">Customer Name</th>
                                <th class="py-2 fw-bold">Phone</th>
                                <th class="py-2 fw-bold">Email</th>
                                <th class="py-2 fw-bold">Address</th>
                                <th class="py-2 fw-bold text-end pe-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($customer as $key => $cust)
                                <tr>
                                    <td class="ps-4 py-2 fw-semibold">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $cust->customer_name}}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $cust->phone}}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $cust->email}}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="fw-semibold text-dark">
                                            {{ $cust->address}}
                                        </div>
                                    </td>
                                    <td class="text-end pe-4 py-2">
                                        <div class="d-flex justify-content-end gap-2">

                                            <!-- Edit -->
                                            <a href=""
                                               class="btn btn-sm btn-light border text-primary rounded-3">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <!-- Delete -->

                                            <form action=""
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
                                        No customer found.
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
@endsection
