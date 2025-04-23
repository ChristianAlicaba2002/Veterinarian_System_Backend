<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet History</title>
</head>
<body>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>
        <h1>Pet History</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Neatured Spay</th>
                    <th>Color</th>
                    <th>Weight</th>
                    <th>Special Markings</th>
                    <th>Microchip Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if( count($allPetHistory) > 0)
                    @foreach($allPetHistory as $PetHistory)
                    <tr>
                        <td>{{ $PetHistory->pet_id }}</td>
                        <td>
                            <img src="{{asset('/images/' . $PetHistory->image)}}" alt="{{ $PetHistory->Pet_Name }}" srcset="">
                        </td>
                        <td>{{ $PetHistory->Pet_Name }}</td>
                        <td>{{ $PetHistory->Species }}</td>
                        <td>{{ $PetHistory->Breed }}</td>
                        <td>{{ $PetHistory->Age }}</td>
                        <td>{{ $PetHistory->Sex }}</td>
                        <td>{{ $PetHistory->Neatured_Spay }}</td>
                        <td>{{ $PetHistory->Color }}</td>
                        <td>{{ $PetHistory->Weight }}</td>
                        <td>{{ $PetHistory->Special_Markings }}</td>
                        <td>{{ $PetHistory->Microchip_Number }}</td>
                        <td>{{ $PetHistory->Status }}</td>
                    </tr>
                    @endforeach
                @else
                <h1>No Pet History</h1>
                @endif
            </tbody>
        </table>
</body>
</html>