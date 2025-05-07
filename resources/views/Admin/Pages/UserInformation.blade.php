<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #818CF8;
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
            --bg-primary: #F9FAFB;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }

        .page-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .user-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .user-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .user-info {
            display: grid;
            gap: 1rem;
        }

        .info-group {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .info-label {
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
        }

        .info-value {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            text-align: center;
            margin-top: 10%;
        }

        .empty-state-icon {
            width: 64px;
            height: 64px;
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        .empty-state-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .empty-state-message {
            color: var(--text-secondary);
            max-width: 400px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .user-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>

    <div class="container">
        <div class="header">
            @if(count($userregister) > 0)
                <h1 class="page-title">User Information</h1>
            @endif
        </div>

        @if(count($userregister) > 0)
            <div class="user-grid">
                @foreach($userregister as $register)
                    <div class="user-card">
                        <div class="user-info">
                            <div class="info-group">
                                <span class="info-label">ID</span>
                                <span class="info-value">{{ $register->client_id }}</span>
                            </div>
                            <div class="info-group">
                                <span class="info-label">Full Name</span>
                                <span class="info-value">{{ $register->first_name }} {{ $register->last_name }}</span>
                            </div>
                            <div class="info-group">
                                <span class="info-label">Phone Number</span>
                                <span class="info-value">{{ $register->phone_number }}</span>
                            </div>
                            <div class="info-group">
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ $register->email }}</span>
                            </div>
                            <div class="info-group">
                                <span class="info-label">Password</span>
                                <span class="info-value">•••••••••••</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="empty-state-title">No Users Found</h2>
                <p class="empty-state-message">There are currently no registered users in the system.</p>
            </div>
        @endif
    </div>
</body>
</html>
