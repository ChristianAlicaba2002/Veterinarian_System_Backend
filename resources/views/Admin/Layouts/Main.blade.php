<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VetCare Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

    <style>
        :root {
            --primary: #d59bf6;
            --accent: #fae3ff;
            --card-bg: rgba(255, 255, 255, 0.7);
            --glass-blur: blur(16px);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fef6ff, #f6f8ff);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        .top-header {
            padding: 1.5rem 0;
            text-align: center;
        }

        .top-header h1 {
            font-weight: 600;
            font-size: 2.25rem;
            color: #6b21a8;
        }

        .dashboard-row,
        .mini-stats-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stats-card {
            background: var(--card-bg);
            backdrop-filter: var(--glass-blur);
            border-radius: 2rem;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(150, 90, 200, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(150, 90, 200, 0.2);
        }

        .card-icon {
            background: var(--accent);
            width: 64px;
            height: 64px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 1.8rem;
            color: var(--primary);
            margin: 0 auto 1rem;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #4b2b63;
        }

        .card-subtitle {
            font-size: 0.9rem;
            color: #888;
        }

        .card-text i {
            margin-right: 4px;
        }

        .total-pets-card {
            width: 100%;
            max-width: 450px;
            background: linear-gradient(to right, #fce7f3, #f3e8ff);
            border: 2px solid #f6c9ff;
        }

        .mini-card {
            width: 220px;
            min-height: 220px;
            border: 2px solid #f3d1ff;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0;
                padding: 1rem;
            }

            .dashboard-row,
            .mini-stats-row {
                flex-direction: column;
                align-items: center;
            }

            .total-pets-card,
            .mini-card {
                width: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('Admin.Pages.Sidebar')

    <div class="content-wrapper">
        <header class="top-header">
            <h1>VetCare Dashboard</h1>
        </header>

        <div class="container-fluid">
            <div class="dashboard-row">
                <div class="total-pets-card stats-card card">
                    <div class="card-icon"><i class="bi bi-heart"></i></div>
                    <div>
                        <div class="card-subtitle">Total Pets</div>
                        <div class="card-title">{{ $total }}</div>
                        @if( $total > 0)
                            <p class="card-text text-muted mb-0">Check your lovely pets</p>
                        @else
                        <p class="card-text text-muted mb-0">No pets available</p>
                        @endif

                    </div>
                </div>
            </div>

            <div class="mini-stats-row">
                <div class="mini-card stats-card card">
                    <div class="card-icon"><i class="bi bi-person-heart"></i></div>
                    <div>
                        <div class="card-subtitle">Owners</div>
                        <div class="card-title">{{ count($owners) }}</div>
                        @if(count($owners) > 0)
                        @php
                            $percentage = $clients > 0 ? round((count($owners) / $clients) * 100) : 0;
                        @endphp
                        <p class="card-text text-{{ $percentage >= 50 ? 'success' : 'danger' }} mb-0">
                            <i class="bi bi-arrow-{{ $percentage >= 50 ? 'up' : 'down' }}"></i>
                            {{ number_format($percentage, 2) }}% of clients are owners
                        </p>
                        @else
                        <p class="card-text text-muted mb-0">No data available</p>
                        @endif
                    </div>
                </div>

                <div class="mini-card stats-card card">
                    <div class="card-icon"><i class="bi bi-person-check"></i></div>
                    <div>
                        <div class="card-subtitle">Registered</div>
                        <div class="card-title">{{ $clients }}</div>
                        @if($clients > 0 )
                        @php
                            $ownerCount = count($owners);
                            $percentage = $ownerCount > 0 ? round(($clients / $ownerCount) * 100) : 0;
                        @endphp
                        <p class="card-text text-{{ $percentage >= 50 ? 'success' : 'danger' }} mb-0">
                            <i class="bi bi-arrow-{{ $percentage >= 50 ? 'up' : 'down' }}"></i>
                            {{ number_format($percentage, 2) }}% of owners are registered
                        </p>
                        @else
                        <p class="card-text text-muted mb-0">No data available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>