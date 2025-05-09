<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner & Pet Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff5f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #d53f8c;
            text-align: left;
            margin-bottom: 30px;
            margin-left: 10rem;
        }

        aside {
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            gap: 20px;
            margin: 0 auto;
            width: 90%;
        }

        .owner-section,
        .pet-section {
            flex: 1;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .section-title {
            color: #d53f8c;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ed64a6;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-header {
            font-size: 1.1rem;
            font-weight: bold;
            color: #d53f8c;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card-header img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ed64a6;
        }

        .card-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .field {
            display: flex;
            flex-direction: column;
            font-size: 0.9rem;
        }

        .field label {
            font-weight: bold;
            color: #ed64a6;
            font-size: 0.8rem;
            margin-bottom: 5px;
        }

        .field span {
            color: #333;
            padding: 5px;
            background-color: #fce4ec;
            border-radius: 4px;
        }

        .no-history {
            text-align: center;
            color: #d53f8c;
            font-size: 1.2rem;
            margin-top: 50px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
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
    </style>
</head>

<body>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>

    @if(count( $owners ) > 0)
        <h1>Owners</h1>
    @endif

    @if(count($owners) > 0)
    <div class="container">
        <div class="owner-section">
            <h2 class="section-title">Owner Information</h2>
            @foreach($owners as $owner)
            <div class="card">
                <div class="card-content">
                    <div class="field">
                        <label>First Name</label>
                        <span>{{ $owner->first_name }}</span>
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <span>{{ $owner->last_name }}</span>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <span>{{ $owner->email }}</span>
                    </div>
                    <div class="field">
                        <label>Phone</label>
                        <span>{{ $owner->phone_number }}</span>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <span>{{ $owner->address }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pet-section">
            <h2 class="section-title">Pet Information</h2>
            @foreach($owners as $owner)
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('/images/' . $owner->image)}}" alt="{{ $owner->Pet_Name }}">
                    {{ $owner->Pet_Name }} (ID: {{ $owner->pet_id }})
                </div>
                <div class="card-content">
                    <div class="field">
                        <label>Species</label>
                        <span>{{ $owner->Species }}</span>
                    </div>
                    <div class="field">
                        <label>Breed</label>
                        <span>{{ $owner->Breed }}</span>
                    </div>
                    <div class="field">
                        <label>Age</label>
                        <span>{{ $owner->Age }}</span>
                    </div>
                    <div class="field">
                        <label>Sex</label>
                        <span>{{ $owner->Sex }}</span>
                    </div>
                    <div class="field">
                        <label>Neutered/Spay</label>
                        <span>{{ $owner->Neutered_Spay }}</span>
                    </div>
                    <div class="field">
                        <label>Color</label>
                        <span>{{ $owner->Color }}</span>
                    </div>
                    <div class="field">
                        <label>Weight</label>
                        <span>{{ $owner->Weight }}</span>
                    </div>
                    <div class="field">
                        <label>Special Markings</label>
                        <span>{{ $owner->Special_Markings }}</span>
                    </div>
                    <div class="field">
                        <label>Microchip #</label>
                        <span>{{ $owner->Microchip_Number }}</span>
                    </div>
                    <div class="field">
                        <label>Status</label>
                        <span class="status-badge {{ $owner->Status ? 'status-inactive' : 'status-active' }}">
                            {{ $owner->Status ? 'Rehomed' : '' }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="empty-state">
        <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h2 class="empty-state-title">No Owners</h2>
    </div>
    @endif
</body>

</html>