<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet History</title>
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

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin: 0 auto 20px;
            width: 80%;
        }

        .card-header {
            font-size: 1.1rem;
            font-weight: bold;
            color: #d53f8c;
            margin-bottom: 10px;
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
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 10px;
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
        }

        .field span {
            color: #333;
        }

        .no-history {
            text-align: center;
            color: #d53f8c;
            font-size: 1.2rem;
            margin-top: 50px;
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

    @if(count($allPetHistory) > 0)
        <h1>Pet History</h1>
    @endif

    @if(count($allPetHistory) > 0)
        @foreach($allPetHistory as $PetHistory)
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('/images/' . $PetHistory->image)}}" alt="{{ $PetHistory->Pet_Name }}">
                    {{ $PetHistory->Pet_Name }} (ID: {{ $PetHistory->pet_id }})
                </div>
                <div class="card-content">
                    <div class="field">
                        <label>Species</label>
                        <span>{{ $PetHistory->Species }}</span>
                    </div>
                    <div class="field">
                        <label>Breed</label>
                        <span>{{ $PetHistory->Breed }}</span>
                    </div>
                    <div class="field">
                        <label>Age</label>
                        <span>{{ $PetHistory->Age }}</span>
                    </div>
                    <div class="field">
                        <label>Sex</label>
                        <span>{{ $PetHistory->Sex }}</span>
                    </div>
                    <div class="field">
                        <label>Neutered/Spay</label>
                        <span>{{ $PetHistory->Neutered_Spay }}</span>
                    </div>
                    <div class="field">
                        <label>Color</label>
                        <span>{{ $PetHistory->Color }}</span>
                    </div>
                    <div class="field">
                        <label>Weight</label>
                        <span>{{ $PetHistory->Weight }}</span>
                    </div>
                    <div class="field">
                        <label>Special Markings</label>
                        <span>{{ $PetHistory->Special_Markings }}</span>
                    </div>
                    <div class="field">
                        <label>Microchip #</label>
                        <span>{{ $PetHistory->Microchip_Number }}</span>
                    </div>
                    <div class="field">
                        <label>Status</label>
                        <span>{{ $PetHistory->Status }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @else
    <div class="empty-state">
        <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h2 class="empty-state-title">No Pets History</h2>
    </div>
    @endif
</body>
</html>
