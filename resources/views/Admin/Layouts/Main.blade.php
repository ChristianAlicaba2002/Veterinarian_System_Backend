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
            font-family: 'Montserrat', sans-serif;
        }

        .content-wrapper {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        .top-header {
            position: fixed;
            width: 100%;
            z-index: 1000;
            padding: 0.5rem 1rem;
            color: #512da8;
            border-bottom: 2px solid #b39ddb;
        }

        .top-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin: 0;
        }

        .stats-card {
            margin-top: 10rem;
            border: 1px solid #d1c4e9;
            border-radius: 1.5rem;
            box-shadow: 0 0.75rem 1.5rem rgba(136, 153, 228, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(135deg, #f3e5f5, #ffffff);
            padding: 2rem;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stats-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 1rem 2rem rgba(136, 153, 228, 0.35);
        }

        .card-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1.25rem;
            background: rgba(224, 191, 228, 0.2);
            font-size: 2rem;
        }

        .card-title {
            font-weight: 600;
            color: #333;
            font-size: 1.5rem;
        }

        .card-subtitle {
            font-style: italic;
            color: #666;
            font-size: 1.1rem;
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    @include('Admin.Pages.Sidebar')

    <div class="content-wrapper">
        <header class="top-header py-3 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-light d-md-none me-2" id="menu-toggle">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="mb-0">Dashboard</h1>
            </div>
        </header>

        <div class="container-fluid p-4">
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="card-subtitle text-muted">Total Pets</h6>
                                <h3 class="card-title">{{ $total }}</h3>
                                <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 12.5% increase</p>
                            </div>
                            <div class="card-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="card-subtitle text-muted">Owners</h6>
                                <h3 class="card-title">{{$clients}}</h3>
                                <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 8.3% increase</p>
                            </div>
                            <div class="card-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stats-card card">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="card-subtitle text-muted">Registered</h6>
                                <h3 class="card-title">{{$clients}}</h3>
                                <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 8.3% increase</p>
                            </div>
                            <div class="card-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('menu-toggle')?.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('show');
                document.querySelector('.content-wrapper').classList.toggle('pushed');
            });
        });
    </script>
</body>

</html>
