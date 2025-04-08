<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Full page layout with a fixed sidebar */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            width: 100%;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            padding-left: 10px;
            padding-right: 10px;
        }

        /* Sidebar links (optional) */
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
        }

        .sidebar a:hover {
            background-color: blue;
        }

        /* Main content (form container) */
        .main-content {
            margin-left: 250px; /* Offset for sidebar */
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            background-color: #f8f9fa;
        }

        /* Form container */
        .form-container {
            width: 500px; /* Adjust width */
            width: 100%;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Ensure the image preview is not too big */
        #imagePreview {
            max-height: 100px;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Add Sidebar content here, e.g., links -->
        @include('Admin.Pages.Sidebar')
    </div>

    <!-- Main Content (Form) -->
    <div class="main-content">
        <div class="form-container">
            <div class="card" id="addPetSection">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Pet</h5>
                    <span class="badge bg-primary">New</span>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.registerpet')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-3">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="petName" placeholder="Enter Name" name="Pet_Name" required>
                                    <label for="petName">Pet Name</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="breed" placeholder="Enter Breed" name="Breed" required>
                                    <label for="breed">Breed</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="form-floating mb-2">
                                    <select class="form-select" id="gender" name="Sex" required>
                                        <option value="" selected disabled>Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="gender">Gender</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="color" placeholder="Enter Color" name="Color" required>
                                    <label for="color">Color</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="markings" placeholder="Enter Special Markings" name="Special_Markings" required>
                                    <label for="markings">Special Markings</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <select class="form-select" id="species" name="Species" required>
                                        <option value="" selected disabled>Select species</option>
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>
                                    </select>
                                    <label for="species">Species</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control" id="age" placeholder="Enter Age" name="Age" required>
                                    <label for="age">Age (years)</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="mb-2 border rounded p-2">
                                    <label class="form-label mb-1">Neutered/Spayed</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Neutered_Spay" id="neuteredYes" value="Yes" required>
                                            <label class="form-check-label" for="neuteredYes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Neutered_Spay" id="neuteredNo" value="No">
                                            <label class="form-check-label" for="neuteredNo">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="number" step="0.01" class="form-control" id="weight" placeholder="Enter Weight" name="Weight" required>
                                    <label for="weight">Weight (kg)</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="microchip" placeholder="Enter Microchip Number" name="Microchip_Number" required>
                                    <label for="microchip">Microchip Number</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>

                            <!-- Bottom row - Image upload -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label for="petImage" class="form-label">Pet Image</label>
                                            <input class="form-control form-control-sm" type="file" id="petImage" name="Image" required>
                                        </div>
                                        <div id="imagePreview" class="rounded border p-2 text-center d-none" style="max-height: 120px; overflow: hidden;">
                                            <img id="preview" src="#" alt="Preview" class="img-fluid rounded" style="max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end justify-content-end">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-plus-circle me-2"></i>Add Pet
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('petImage').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <!-- Form Validation Script -->
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>
