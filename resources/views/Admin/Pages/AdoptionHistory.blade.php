<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption History</title>
</head>

<body>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>
    <main>
        <h1>Adoption History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Client ID</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Pet ID</th>
                    <th>Image</th>
                    <th>Pet Name</th>
                    <th>Age</th>
                    <th>Species</th>
                    <th>Sex</th>
                    <th>Breed</th>
                    <th>Weight</th>
                    <th>Special Markings</th>
                    <th>Microchip Number</th>
                    <th>Status</th>
                    <th>Adoption Date</th>
                </tr>
            </thead>
            <tbody>
                @if( count($alladoptionHistory) > 0)
                @foreach($alladoptionHistory as $adoptionHistory)
                <tr>
                    <td>{{$adoptionHistory->client_id}}</td>
                    <td>{{$adoptionHistory->first_name}} {{ $adoptionHistory->last_name }}</td>
                    <td>{{ $adoptionHistory->email }}</td>
                    <td>{{ $adoptionHistory->phone_number }}</td>
                    <td>{{ $adoptionHistory->address }}</td>
                    <td>{{ $adoptionHistory->pet_id}}</td>
                    <td>
                        <img src="{{asset('/images/' . $adoptionHistory->image)}}" alt="{{$adoptionHistory->Pet_Name}}" style="width:50px;">
                    </td>
                    <td>{{ $adoptionHistory->Pet_Name }}</td>
                    <td>{{ $adoptionHistory->Age}}</td>
                    <td>{{ $adoptionHistory->Species }}</td>
                    <td>{{ $adoptionHistory->Sex }}</td>
                    <td>{{ $adoptionHistory->Breed }}</td>
                    <td>{{ $adoptionHistory->Weight }}</td>
                    <td>{{ $adoptionHistory->Special_Markings}}</td>
                    <td>{{ $adoptionHistory->Microchip_Number}}</td>
                    <td style="color: {{ $adoptionHistory->Status == 'Available' ? 'green' : 'reed' }} ">
                        {{ $adoptionHistory->Status }}
                    </td>
                    <td>{{ $adoptionHistory->adoption_date}}</td>
                </tr>
                @endforeach
                @else
                <td colspan="21" style="text-align: center;font-size:1.1rem;">No adoptionHistory yet</td>
                @endif
            </tbody>
        </table>
    </main>
</body>

</html>