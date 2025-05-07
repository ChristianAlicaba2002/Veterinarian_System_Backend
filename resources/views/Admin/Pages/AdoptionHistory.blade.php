<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption History</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f5f5f5;
        }

        aside {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 1rem;
            height: 100vh;
        }

        main {
            flex: 1;
            padding: 2rem;
        }

        h1 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            padding: 1rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .card-header {
            font-weight: bold;
            font-size: 1.1rem;
            color: #444;
        }

        .card-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0.5rem;
        }

        .field {
            display: flex;
            flex-direction: column;
        }

        .field label {
            font-weight: bold;
            font-size: 0.85rem;
            color: #ed64a6;
        }

        .field span {
            color: #333;
        }

        .pet-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .status {
            font-weight: bold;
        }

        .status.available {
            color: green;
        }

        .status.adopted {
            color: red;
        }

        .empty-message {
            text-align: center;
            font-size: 1.1rem;
            margin-top: 2rem;
            color: #888;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            text-align: center;
            margin-top: 15%;
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
    <main>
        @if(count($alladoptionHistory) > 0)
            <h1>Adoption History</h1>
        @endif

        @if(count($alladoptionHistory) > 0)
            @foreach($alladoptionHistory as $adoptionHistory)
                <div class="card">
                    <div class="card-header">
                        Client #{{$adoptionHistory->client_id}} – {{ $adoptionHistory->first_name }} {{ $adoptionHistory->last_name }}
                    </div>
                    <div class="card-content">
                        <div class="field">
                            <label>Email</label>
                            <span>{{ $adoptionHistory->email }}</span>
                        </div>
                        <div class="field">
                            <label>Phone</label>
                            <span>{{ $adoptionHistory->phone_number }}</span>
                        </div>
                        <div class="field">
                            <label>Address</label>
                            <span>{{ $adoptionHistory->address }}</span>
                        </div>
                        <div class="field">
                            <label>Pet ID</label>
                            <span>{{ $adoptionHistory->pet_id }}</span>
                        </div>
                        <div class="field">
                            <label>Image</label>
                            <img class="pet-image" src="{{ asset('/images/' . $adoptionHistory->image) }}" alt="{{ $adoptionHistory->Pet_Name }}">
                        </div>
                        <div class="field">
                            <label>Pet Name</label>
                            <span>{{ $adoptionHistory->Pet_Name }}</span>
                        </div>
                        <div class="field">
                            <label>Age</label>
                            <span>{{ $adoptionHistory->Age }}</span>
                        </div>
                        <div class="field">
                            <label>Species</label>
                            <span>{{ $adoptionHistory->Species }}</span>
                        </div>
                        <div class="field">
                            <label>Sex</label>
                            <span>{{ $adoptionHistory->Sex }}</span>
                        </div>
                        <div class="field">
                            <label>Breed</label>
                            <span>{{ $adoptionHistory->Breed }}</span>
                        </div>
                        <div class="field">
                            <label>Weight</label>
                            <span>{{ $adoptionHistory->Weight }}</span>
                        </div>
                        <div class="field">
                            <label>Special Markings</label>
                            <span>{{ $adoptionHistory->Special_Markings }}</span>
                        </div>
                        <div class="field">
                            <label>Microchip #</label>
                            <span>{{ $adoptionHistory->Microchip_Number }}</span>
                        </div>
                        <div class="field">
                            <label>Status</label>
                            <span class="status {{ strtolower($adoptionHistory->Status) == 'available' ? 'available' : 'adopted' }}">
                                {{ $adoptionHistory->Status }}
                            </span>
                        </div>
                        <div class="field">
                            <label>Adoption Date</label>
                            <span>{{ $adoptionHistory->adoption_date }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="empty-state">
                <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="empty-state-title">No Adoption History yet</h2>
            </div>
        @endif
    </main>
</body>

</html>
