<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetCare Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f9f8fc;
            color: #333;
            overflow-x: hidden;
        }

        .content-wrapper {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            padding-top: 1rem;
            box-sizing: border-box;
        }

        .top-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1.5rem 2rem;
            color: rgb(200, 141, 248);
            margin-left: 20%;
        }

        .top-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .stats-card {
            border: 2px solid #e0c3fc;
            border-radius: 2rem;
            padding: 2rem;
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1.5rem 2.5rem rgba(220, 136, 228, 0.35);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.75rem;
            background-color: #f3e8ff;
            color: #a855f7;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #4c3c88;
        }

        .card-subtitle {
            font-style: italic;
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .card-text i {
            margin-right: 5px;
        }

        .total-pets-card {
            background: linear-gradient(to right, rgba(215, 180, 250, 0.61), #e879f9);
            border: 3px solid rgb(255, 186, 238);
            border-radius: 80px;
            height: 480px;
            width: 420px;
            margin-top: 2rem;
        }

        .mini-card {
            width: 200px;
            height: 200px;
            background: #fff;
            border-radius: 40px;
            border: 2px solid rgb(255, 162, 232);
            transition: all 0.3s ease-in-out;
        }

        .mini-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0.5rem 1rem rgba(255, 198, 245, 0.2);
        }

        .mini-card .card-title {
            font-size: 1.5rem;
        }

        .dashboard-row {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .mini-stats-row {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .content-wrapper,
            .top-header {
                margin-left: 0;
                width: 100%;
            }

            .dashboard-row,
            .mini-stats-row {
                flex-direction: column;
                align-items: center;
            }

            .total-pets-card,
            .mini-card {
                width: 100%;
                height: auto;
            }

            .top-header {
                padding: 1rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    @include('Admin.Pages.Sidebar')

    <div class="content-wrapper">
        <header class="top-header">
            <h1 class="mb-0">Dashboard</h1>
        </header>

        <div class="container-fluid p-4">
            <div class="row mb-4 dashboard-row">
                <div class="col-md-5 total-pets-card stats-card card ">
                    <div class="card-body d-flex flex-column justify-content-between">
                    <div class="card-icon ">
                            <i class="bi bi-heart bg-opacity-10"></i>
                    </div>
                        <div>
                            <h6 class="card-subtitle text-muted">Total Pets</h6>
                            <h3 class="card-title">{{ $total }}</h3>
                            <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 12.5% increase</p>
                        </div>
                    </div>
                </div>

                <div class="mini-stats-row">
                    <div class="mini-card stats-card card d-flex flex-column align-items-center justify-content-center">
                        <div class="card-icon">
                            <i class="bi bi-person-heart"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted">Owners</h6>
                            <h3 class="card-title">{{ $clients }}</h3>
                            <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 9.2% increase</p>
                        </div>
                    </div>

                    <div class="mini-card stats-card card d-flex flex-column align-items-center justify-content-center">
                        <div class="card-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div>
                            <h6 class="card-subtitle text-muted">Registered</h6>
                            <h3 class="card-title">{{ $clients }}</h3>
                            <p class="card-text text-success mb-0"><i class="bi bi-arrow-up"></i> 6.7% increase</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('menu-toggle')?.addEventListener('click', function () {
                document.querySelector('.sidebar').classList.toggle('show');
                document.querySelector('.content-wrapper').classList.toggle('pushed');
                document.querySelector('.top-header').classList.toggle('pushed');
            });
        });
    </script>
</body>

</html>
