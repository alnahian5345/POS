@extends('main.master')

@section('content')

    <div class="container-fluid px-3 py-3">

        <!-- Page Heading -->
        <div class="row mb-3">
            <div class="col-12">

                <h2 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-people-fill me-2"
                       style="color: rgb(0 150 136);"></i>
                    Customer Management
                </h2>

                <p class="text-muted mb-0">
                    Manage customer information and records.
                </p>

            </div>
        </div>

        <!-- Customer Form -->
        <div class="row">

            <div class="col-12">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <div class="card-header text-white py-3 px-4"
                         style="background: rgb(0 150 136);">

                        <h4 class="mb-1 fw-bold">

                            <i class="bi bi-person-plus-fill me-2"></i>

                            {{ isset($editCustomer)
                                ? 'Update Customer'
                                : 'Create Customer' }}

                        </h4>

                        <p class="mb-0 text-white-50 small">
                            Add and manage customer information.
                        </p>

                    </div>

                    <div class="card-body p-4">

                        <form action="{{ isset($editCustomer)
                        ? route('setup.customer.update',$editCustomer->customer_id)
                        : route('setup.customer.create') }}"
                              method="POST">

                            @csrf

                            @if(isset($editCustomer))
                                @method('PUT')
                            @endif

                            <div class="row g-4">

                                <!-- Customer Name -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Customer Name

                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           name="customer_name"
                                           value="{{ old('customer_name', isset($editCustomer) ? $editCustomer->customer_name : '') }}"
                                           placeholder="Enter Customer Name">

                                    @error('customer_name')
                                    <small class="text-danger d-block mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror

                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Phone Number

                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           name="phone"
                                           value="{{ old('phone', isset($editCustomer) ? $editCustomer->phone : '') }}"
                                           placeholder="01XXXXXXXXX">

                                    @error('phone')
                                    <small class="text-danger d-block mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror

                                </div>

                                <!-- Email -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Email

                                    </label>

                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           value="{{ old('email', isset($editCustomer) ? $editCustomer->email : '') }}"
                                           placeholder="example@email.com">

                                    @error('email')
                                    <small class="text-danger d-block mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror

                                </div>

                                <!-- Address -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold px-2 py-1 rounded"
                                           style="background: rgb(0 150 136 / 10%);">

                                        Address

                                    </label>

                                    <textarea class="form-control"
                                              name="address"
                                              rows="1"
                                              placeholder="Enter Customer Address">{{ old('address', isset($editCustomer) ? $editCustomer->address : '') }}</textarea>

                                    @error('address')
                                    <small class="text-danger d-block mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror

                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="mt-4  text-end">

                                <button type="submit"
                                        class="btn text-white px-4"
                                        style="background: rgb(0 150 136);">

                                    <i class="bi bi-save me-1"></i>

                                    {{ isset($editCustomer)
                                        ? 'Update Customer'
                                        : 'Save Customer' }}

                                </button>

                                <button type="reset"
                                        class="btn btn-secondary">

                                    Reset

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Customer List -->
        <div class="row mt-4">

            <div class="col-12">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    <div class="card-header py-3 px-4"
                         style="background: rgb(0 150 136 / 10%);">

                        <div class="d-flex justify-content-between align-items-center flex-wrap">

                            <div>

                                <h4 class="fw-bold mb-1 fs-5"
                                    style="color: rgb(0 150 136);">

                                    <i class="bi bi-table me-2"></i>
                                    Customer List

                                </h4>

                                <p class="text-muted mb-0 small">
                                    Manage your existing customers.
                                </p>

                            </div>

                            <span class="badge bg-success rounded-pill px-3 py-2 small">
                            Total : {{ count($customer ?? []) }}
                        </span>

                        </div>

                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>

                                </thead>

                                <tbody>

                                @forelse($customer as $key => $cust)

                                    <tr>

                                        <td class="ps-4">
                                            {{ $key + 1 }}
                                        </td>

                                        <td>{{ $cust->customer_name }}</td>
                                        <td>{{ $cust->phone }}</td>
                                        <td>{{ $cust->email }}</td>
                                        <td>{{ $cust->address }}</td>

                                        <td class="text-end pe-4">

                                            <div class="d-flex justify-content-end gap-2">

                                                <!-- Edit -->
                                                <a href="{{ route('setup.customer.edit',$cust->customer_id) }}"
                                                   class="btn btn-sm btn-outline-primary">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('setup.customer.destroy',$cust->customer_id) }}"
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

                                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>

                                            No Customer Found

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
                confirmButtonColor: '#009688'
            });
        </script>
    @endif

    @if(session('update'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: '{{ session('update') }}',
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

@endsection
