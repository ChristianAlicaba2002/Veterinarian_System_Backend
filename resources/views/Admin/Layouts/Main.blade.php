<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <title>VetCare Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
        }


        .content-wrapper {
            margin-left: 250px;
            transition: all 0.3s;
        }

        .top-header {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 0.5rem 1rem;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .stats-card {
            margin-top: 5rem;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .content-wrapper {
                margin-left: 0;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .content-wrapper.pushed {
                margin-left: 250px;
            }
        }

        
    </style>
</head>

<body>
    <!-- Sidebar -->
    @include('Admin.Pages.Sidebar')

    <!-- Main Content -->
    <div class="content-wrapper">
        <header class="top-header py-3 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-light d-md-none me-2" id="menu-toggle">
                    <i class="bi bi-list"></i>
                </button>
                <span class="h4 mb-0">Dashboard</span>
            </div>
        </header>

        <div class="container-fluid p-4">
            <!-- Dashboard Stats -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle text-muted">Total Pets</h6>
                                    <h3 class="card-title">{{ $total }}</h3>
                                    <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 12.5% increase</p>
                                </div>
                                <div class="card-icon bg-primary bg-opacity-10 text-primary">
                                    <i class="bi bi-heart fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle text-muted">Owners</h6>
                                    <h3 class="card-title">{{$clients}}</h3>
                                    <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 8.3% increase</p>
                                </div>
                                <div class="card-icon bg-success bg-opacity-10 text-success">
                                    <i class="bi bi-people fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle text-muted">Registered</h6>
                                    <h3 class="card-title">{{$clients}}</h3>
                                    <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 8.3% increase</p>
                                </div>
                                <div class="card-icon bg-success bg-opacity-10 text-success">
                                    <i class="bi bi-people fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle text-muted">Appointments</h6>
                                    <h3 class="card-title">45</h3>
                                    <p class="card-text text-danger mb-0"><i class="bi bi-arrow-down"></i> 3.2% decrease</p>
                                </div>
                                <div class="card-icon bg-warning bg-opacity-10 text-warning">
                                    <i class="bi bi-calendar-check fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle text-muted">Revenue</h6>
                                    <h3 class="card-title">$5,240</h3>
                                    <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 18.7% increase</p>
                                </div>
                                <div class="card-icon bg-info bg-opacity-10 text-info">
                                    <i class="bi bi-currency-dollar fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menu toggle for mobile
            document.getElementById('menu-toggle')?.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('show');
                document.querySelector('.content-wrapper').classList.toggle('pushed');
            });

            // Add Pet sidebar link
            const addPetLink = document.querySelector('.sidebar a[href="#addPetSection"]');
            const addPetSection = document.getElementById('addPetSection');

            if (addPetLink && addPetSection) {
                // Set initial state to hidden
                addPetSection.hidden = true;

                // Add click event
                addPetLink.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Toggle visibility
                    addPetSection.hidden = !addPetSection.hidden;

                    // If visible, scroll to it
                    if (!addPetSection.hidden) {
                        addPetSection.scrollIntoView({
                            behavior: 'smooth'
                        });

                        // Add active class to sidebar link
                        document.querySelectorAll('.sidebar-link').forEach(link => {
                            link.classList.remove('active');
                        });
                        addPetLink.classList.add('active');
                    }
                });
            }


            // Form validation
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })()

            // Image preview
            const petImageInput = document.getElementById('petImage');
            if (petImageInput) {
                petImageInput.addEventListener('change', function(e) {
                    const preview = document.getElementById('preview');
                    const previewContainer = document.getElementById('imagePreview');

                    if (this.files && this.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            previewContainer.classList.remove('d-none');
                        }

                        reader.readAsDataURL(this.files[0]);
                    }
                });
            }
        });
    </script>
</body>

</html>

</html>