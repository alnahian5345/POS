<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Category Form</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: linear-gradient(to right, #eef2ff, #fdf2f8);
            min-height: 100vh;
        }

        .category-card{
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .card-header{
            background: linear-gradient(to right, #4f46e5, #ec4899);
            padding: 20px;
            border: none;
        }

        .card-header h3{
            color: white;
            font-weight: 700;
            margin: 0;
        }

        .form-control{
            height: 50px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
        }

        .form-control:focus{
            box-shadow: 0 0 0 0.20rem rgba(79,70,229,.25);
            border-color: #4f46e5;
        }

        .input-group-text{
            border-radius: 12px 0 0 12px;
            background: #f3f4f6;
        }

        .btn-save{
            background: linear-gradient(to right, #4f46e5, #ec4899);
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

        <div class="col-lg-6">

            <div class="card shadow-lg category-card">

                <div class="card-header">
                    <h3>
                        <i class="bi bi-tags-fill"></i>
                        Category Entry Form
                    </h3>
                </div>

                <div class="card-body p-4">

                    <form action="" method="POST">

                        <!-- Category Name -->
                        <div class="mb-4">

                            <label>Category Name</label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-tag"></i>
                                </span>

                                <input
                                    type="text"
                                    name="category_name"
                                    class="form-control"
                                    placeholder="Enter Category Name"
                                    required
                                >

                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">

                            <button type="submit" class="btn btn-save text-white">

                                <i class="bi bi-check-circle-fill"></i>
                                Save Category

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
