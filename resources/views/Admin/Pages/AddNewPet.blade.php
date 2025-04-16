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

        .main-content {
            margin-left: 200px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .form-container {
            width: 100%;
            max-width: 600px;
            animation: fadeInUp 0.7s ease;
            display: flex;
        }

        .form-container img {
            height: 90px;
            width: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .form-container img:hover {
            transform: scale(1.05);
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
            color: #6a1b9a;
            margin-bottom: 0.5rem;
        }

        .card-header span {
            background: linear-gradient(to right, #4fc3f7, #ba68c8);
            color: white;
            padding: 1rem;
            border-radius: 20px;
            font-size: 1.2rem;
        }

        label {
            font-weight: 600;
            color: #5e35b1;
            font-size: 1rem;
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
            margin-bottom: 1rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #ce93d8;
            background-color: #f9f5ff;
            width: 100%;
            transition: box-shadow 0.3s ease;
            font-size: 1rem;
        }

        input:focus,
        select:focus {
            outline: none;
            box-shadow: 0 0 8px #ba68c8;
            border-color: #ba68c8;
        }

        .btn-primary {
            background: linear-gradient(to right, #81d4fa, #ba68c8);
            color: white;
            border: 1px plum solid;
            border-radius: 25px;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            font-size: 1rem;
            font-weight: 500;
            width: 20%;
            height: 50px;
            margin-top: -6px;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #4fc3f7, #ab47bc);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(248, 118, 209, 0.57);
        }

        .badge.bg-primary {
            font-size: 0.9rem;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
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

        .form-check {
            margin-bottom: 0.75rem;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
        }

        .form-check-label {
            font-size: 1rem;
            font-weight: 500;
        }

        @media (orientation: landscape) {
            .form-container {
                max-width: 65%;
                padding: 2rem;
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
                                                id="neuteredNo" value="No" required>
                                            <label class="form-check-label" for="neuteredNo">No</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control" name="Image" required>
                                    <label for="image">Pet Image</label>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                        </div>

                        <img src="/images/adopt.gif" alt="" class="img-fluid">
                        <button class="btn-primary">Add Pet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>

</html>
