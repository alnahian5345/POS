<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: linear-gradient(to right, #eef2ff, #fdf2f8);
            min-height: 100vh;
        }

        .product-card{
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .card-header{
            background: linear-gradient(to right, #6366f1, #ec4899);
            padding: 20px;
            border: none;
        }

        .card-header h3{
            color: white;
            font-weight: 700;
            margin: 0;
        }

        .form-control,
        .form-select{
            height: 50px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
        }

        .form-control:focus,
        .form-select:focus{
            box-shadow: 0 0 0 0.20rem rgba(99,102,241,.25);
            border-color: #6366f1;
        }

        .input-group-text{
            border-radius: 12px 0 0 12px;
            background: #f3f4f6;
        }

        .btn-save{
            background: linear-gradient(to right, #6366f1, #ec4899);
            border: none;
            height: 50px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-save:hover{
            transform: translateY(-2px);
            opacity: .95;
        }

        label{
            font-weight: 600;
            margin-bottom: 8px;
        }

    </style>

</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-lg product-card">

                <div class="card-header">
                    <h3><i class="bi bi-box-seam"></i> Product Entry Form</h3>
                </div>

                <div class="card-body p-4">

                    <form action="" method="POST">

                        <!-- Category -->
                        <div class="mb-4">
                            <label>Category</label>

                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                <option value="1">Electronics</option>
                                <option value="2">Groceries</option>
                                <option value="3">Stationery</option>
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label>Product Name</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-bag"></i>
                                </span>

                                <input
                                    type="text"
                                    name="product_name"
                                    class="form-control"
                                    placeholder="Enter Product Name"
                                >
                            </div>
                        </div>

                        <!-- Purchase Price -->
                        <div class="mb-4">
                            <label>Purchase Price</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    ৳
                                </span>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="purchase_price"
                                    class="form-control"
                                    placeholder="Enter Purchase Price"
                                >
                            </div>
                        </div>

                        <!-- Sale Price -->
                        <div class="mb-4">
                            <label>Sale Price</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    ৳
                                </span>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="sale_price"
                                    class="form-control"
                                    placeholder="Enter Sale Price"
                                >
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-save text-white">
                                <i class="bi bi-check-circle"></i>
                                Save Product
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
