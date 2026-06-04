@extends('main.master')
@section('content')
    <div class="container-fluid py-4">

        <div class="card shadow border-0 rounded-4">

            <!-- Page Heading -->
            <div class="row mb-3">
                <div class="col-12">

                    <h2 class="fw-bold mb-1 text-dark">
                        <i class="bi bi-truck me-2"
                           style="color: rgb(0 150 136);"></i>
                        Supplier Management
                    </h2>

                    <p class="text-muted mb-0">
                        Manage Supplier information and records.
                    </p>

                </div>
            </div>
            <!-- Header -->
            <div class="card-header text-white"
                 style="background: rgb(0 150 136);">
                <h4 class="mb-0">Supplier Entry Form</h4>
            </div>

            <div class="card-body">

                <form action="{{route('setup.supplier.create')}}" method="POST">
                    @csrf
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
                                      rows="1"
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


    <!-- ----------------------Customer List--------------- -->
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
                                Supplier List

                            </h4>

                            <p class="text-muted mb-0 small">
                                Manage your existing Suppliers.
                            </p>

                        </div>

                        <span class="badge bg-success rounded-pill px-3 py-2 small">
                            Total : {{ count($supplier ?? []) }}
                        </span>

                    </div>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                            <tr>
                                <th class="ps-4">#</th>
                                <th>Supplier Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>

                            </thead>

                            <tbody>

                            @forelse($supplier as $key => $sup)

                                <tr>

                                    <td class="ps-4">
                                        {{ $key + 1 }}
                                    </td>

                                    <td>{{ $sup->supplier_name }}</td>
                                    <td>{{ $sup->phone }}</td>
                                    <td>{{ $sup->email }}</td>
                                    <td>{{ $sup->address }}</td>

                                    <td class="text-end pe-4">

                                        <div class="d-flex justify-content-end gap-2">

                                            <!-- Edit -->
                                            <a href=""
                                               class="btn btn-sm btn-outline-primary">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <!-- Delete -->
                                            <form action="{{Route('setup.supplier.delete',$sup->supplier_id)}}"
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


    <!-- ----------------------------------Sweet Alert ------------------------------------------>
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

