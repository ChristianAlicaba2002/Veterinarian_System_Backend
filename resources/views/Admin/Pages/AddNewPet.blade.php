<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url("images/paw.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .card-con {
            border-top: 3px dashed #ce93d8;
        }

        .main-content {
            margin-left: 200px;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: calc(100% - 200px);
        }

        .form-container {
            width: 90%;
            max-width: 550px;
            padding: 20px;
            animation: fadeInUp 0.7s ease;
        }

        .form-container img {
            height: 120px;
            width: auto;
            display: block;
            margin: 0 auto -8px;
            transition: transform 0.3s ease;
        }

        .form-container img:hover {
            transform: scale(1.05);
        }

        .card-body {
            background-color: transparent;
        }

        .card-header {
            background-color: transparent;
            border: none;
            text-align: center;
            padding-bottom: 10px;
        }

        .card-header h2 {
            font-size: 1.75rem;
            font-weight: bold;
            color: #7b1fa2;
            margin-bottom: 0.5rem;
        }

        .card-header span {
            background: linear-gradient(to right, #4fc3f7, #ab47bc);
            color: white;
            padding: 1rem 1rem;
            border-radius: 12px;
            font-size: xx-large;
        }

        label {
            font-weight: 600;
            color: #4a148c;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 0.25rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        .form-check-input,
        .form-control-sm,
        .form-floating {
            margin-bottom: 0.75rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 2px solid #ce93d8;
            background-color: #f3f0ff;
            width: 100%;
            transition: box-shadow 0.3s ease;
            font-size: 1rem;
        }

        input:focus,
        select:focus {
            outline: none;
            box-shadow: 0 0 7px #ba68c8;
            border-color: #ab47bc;
        }

        .btn-primary {
            background: linear-gradient(to right, #81d4fa, #ba68c8);
            color: white;
            padding: 0.75rem 1.25rem;
            border: white 1px solid;
            border-radius: 20px;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            font-size: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(255, 95, 207, 0.35);
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #4fc3f7, #ab47bc);
            border: white 1px solid;
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(248, 118, 209, 0.57);
        }

        .badge.bg-primary {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 14px;
            font-weight: 500;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (orientation: landscape) {
            .form-container {
                max-width: 65%;
                padding: 1.5rem;
            }

            .card-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    @include('Admin.Pages.Sidebar')

    <div class="main-content">
        <div class="form-container">
            <img src="/images/adopt.gif" alt="" class="img-fluid">
            <div class="card-con" id="addPetSection">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h2>Add Pet</h2>
                    <span class="badge bg-primary">New</span>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.registerpet')}}" method="post" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="petName" placeholder="Enter Name"
                                        name="Pet_Name" required>
                                    <label for="petName">Pet Name</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="breed" placeholder="Enter Breed"
                                        name="Breed" required>
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
                                    <input type="text" class="form-control" id="color" placeholder="Enter Color"
                                        name="Color" required>
                                    <label for="color">Color</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="markings"
                                        placeholder="Enter Special Markings" name="Special_Markings" required>
                                    <label for="markings">Special Markings</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
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
                                    <select class="form-select" id="species" name="Status" required>
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Adopted">Adopted</option>
                                    </select>
                                    <label for="species">Status</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control" id="age" placeholder="Enter Age"
                                        name="Age" required min="0" oninput="this.value = Math.abs(this.value)">
                                    <label for="age">Age (years)</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                <div class="mb-2 p-2">
                                    <label class="form-label mb-1">Neutered/Spayed</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Neutered_Spay"
                                                id="neuteredYes" value="Yes" required>
                                            <label class="form-check-label" for="neuteredYes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Neutered_Spay"
                                                id="neuteredNo" value="No">
                                            <label class="form-check-label" for="neuteredNo">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="number" step="0.01" class="form-control" id="weight"
                                        placeholder="Enter Weight" name="Weight" required min="0" oninput="this.value = Math.abs(this.value)">
                                    <label for="weight">Weight (kg)</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="microchip"
                                        placeholder="Enter Microchip Number" name="Microchip_Number" maxlength="11" placeholder="000-000-0000">
                                    <label for="microchip">Microchip Number</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label for="petImage" class="form-label">Pet Image</label>
                                            <input class="form-control form-control-sm" type="file" id="petImage"
                                                name="Image" required>
                                        </div>
                                        <div id="imagePreview" class="rounded border p-2 text-center d-none"
                                            style="max-height: 80px; overflow: hidden;">
                                            <img id="preview" src="#" alt="Preview" class="img-fluid rounded"
                                                style="max-height: 60px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end justify-content-end">
                                        <button type="submit" class="btn btn-primary w-100 b-w">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

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
