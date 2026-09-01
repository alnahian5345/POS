@extends('main.master')

@section('content')

    <div class="container-fluid px-4 py-4">

        <!-- Page Header -->
        <div class="rounded-4 p-4 p-md-5 mb-4 text-white shadow-sm"
             style="background: linear-gradient(135deg, #0D9488, #0F766E);">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h2 class="fw-bold mb-1">
                        <i class="bi bi-grid-fill me-2"></i> Category Management
                    </h2>
                    <p class="mb-0 opacity-75">Manage your product categories easily and efficiently</p>
                </div>
                <button type="button" class="btn btn-light fw-semibold px-4 py-2 rounded-pill shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#categoryModal"
                        onclick="openCreateModal()">
                    <i class="bi bi-plus-lg me-1"></i> Add Category
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3" style="background-color: #CCFBF1; color: #0F766E;">
                            <i class="bi bi-folder2-open fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ count($category) }}</h4>
                            <small class="text-muted">Total Categories</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3" style="background-color: #D1FAE5; color: #059669;">
                            <i class="bi bi-check-circle fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ collect($category)->where('status', 'Y')->count() }}</h4>
                            <small class="text-muted">Active</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3" style="background-color: #FEE2E2; color: #DC2626;">
                            <i class="bi bi-x-circle fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">{{ collect($category)->where('status', 'N')->count() }}</h4>
                            <small class="text-muted">Inactive</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Table Card -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <h5 class="fw-bold mb-0">All Categories</h5>
                    <input type="text" class="form-control form-control-sm" placeholder="Search categories..." style="max-width: 250px;">
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3" style="width: 70px;">#</th>
                            <th class="py-3">Category Name</th>
                            <th class="py-3" style="width: 140px;">Status</th>
                            <th class="text-end pe-4 py-3" style="width: 130px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($category as $key => $cat)
                            <tr>
                                <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-3 p-2" style="background-color: #CCFBF1; color: #0F766E;">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <span class="fw-medium">{{ $cat->category_name }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($cat->status == 'Y')
                                        <span class="badge rounded-pill px-3 py-2"
                                              style="background-color: #D1FAE5; color: #059669;">
                                            <i class="bi bi-check-circle me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-2"
                                              style="background-color: #FEE2E2; color: #DC2626;">
                                            <i class="bi bi-x-circle me-1"></i> Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button"
                                                class="btn btn-sm rounded-3"
                                                style="border: 1px solid #0D9488; color: #0D9488;"
                                                title="Edit"
                                                onclick="openEditModal({{ $cat->category_id }}, '{{ $cat->category_name }}', '{{ $cat->status }}')">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <form action="{{ route('setup.category.delete', $cat->category_id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                                <td colspan="4" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="bi bi-folder-x text-muted display-4"></i>
                                        <h5 class="mt-3 text-muted">No Categories Found</h5>
                                        <p class="text-muted mb-4">Get started by creating your first category</p>
                                        <button type="button" class="btn rounded-pill px-4 text-white"
                                                style="background-color: #0D9488;"
                                                data-bs-toggle="modal" data-bs-target="#categoryModal"
                                                onclick="openCreateModal()">
                                            <i class="bi bi-plus-lg me-1"></i> Add Category
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

    <!--==================== Category Modal ====================-->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4">

                <div class="modal-header text-white" style="background: linear-gradient(135deg, #0D9488, #0F766E);">
                    <h5 class="modal-title">
                        <i class="bi bi-folder-plus me-2"></i>
                        <span id="modalTitleText">Create Category</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form id="categoryForm" method="POST">
                    @csrf
                    <input type="hidden" id="formMethod" name="_method" value="POST">

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Category Name</label>
                            <input type="text" name="category_name" id="category_name"
                                   class="form-control form-control-lg rounded-3"
                                   placeholder="e.g. Electronics, Clothing..." required>
                            @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" id="status" class="form-select form-select-lg rounded-3">
                                <option value="Y">Active</option>
                                <option value="N">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn rounded-pill px-4 text-white" id="submitBtn"
                                style="background-color: #0D9488;">
                            <i class="bi bi-check2 me-1"></i>
                            <span id="submitBtnText">Save Category</span>
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
                confirmButtonColor: '#0D9488'
            });
        </script>
    @endif

    @if(session('update'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: '{{ session('update') }}',
                confirmButtonColor: '#0D9488'
            });
        </script>
    @endif

    @if(session('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: '{{ session('delete') }}',
                confirmButtonColor: '#0D9488'
            });
        </script>
    @endif

    <script>
        function openCreateModal() {
            document.getElementById('modalTitleText').innerText = 'Create Category';
            document.getElementById('submitBtnText').innerText = 'Save Category';
            document.getElementById('categoryForm').action = "{{ route('setup.category.create') }}";
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('category_name').value = '';
            document.getElementById('status').value = 'Y';
        }

        function openEditModal(id, name, status) {
            document.getElementById('modalTitleText').innerText = 'Update Category';
            document.getElementById('submitBtnText').innerText = 'Update Category';
            document.getElementById('categoryForm').action = "{{ url('/category/update') }}/" + id;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('category_name').value = name;
            document.getElementById('status').value = status;

            var modal = new bootstrap.Modal(document.getElementById('categoryModal'));
            modal.show();
        }
    </script>

@endsection
