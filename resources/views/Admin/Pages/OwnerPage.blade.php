<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Page</title>
</head>

<body>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>
    <main>
        <h1>Owner Page</h1>
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
                @if( count($owners) > 0)
                @foreach($owners as $owner)
                <tr>
                    <td>{{$owner->client_id}}</td>
                    <td>{{$owner->first_name}} {{ $owner->last_name }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->phone_number }}</td>
                    <td>{{ $owner->address }}</td>
                    <td>{{ $owner->pet_id}}</td>
                    <td>
                        <img src="{{asset('/images/' . $owner->image)}}" alt="{{$owner->Pet_Name}}" style="width:50px;">
                    </td>
                    <td>{{ $owner->Pet_Name }}</td>
                    <td>{{ $owner->Age}}</td>
                    <td>{{ $owner->Species }}</td>
                    <td>{{ $owner->Sex }}</td>
                    <td>{{ $owner->Breed }}</td>
                    <td>{{ $owner->Weight }}</td>
                    <td>{{ $owner->Special_Markings}}</td>
                    <td>{{ $owner->Microchip_Number}}</td>
                    <td style="color: {{ $owner->Status == 'Available' ? 'green' : 'reed' }} ">
                        {{ $owner->Status }}
                    </td>
                    <td>{{ $owner->adoption_date}}</td>
                </tr>
                @endforeach
                @else
                <td colspan="21" style="text-align: center;font-size:1.1rem;">No Owners yet</td>
                @endif
            </tbody>
        </table>
    </main>
</body>

</html>