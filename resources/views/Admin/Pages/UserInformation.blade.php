<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
        <aside>
            @include('Admin.Pages.Sidebar')
        </aside>

        <h1>USER INFORMATION TABLE</h1>
        <table>
            <thead>
                <th>Client ID</th>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Password</th>
            </thead>
            <tbody>
                @if(count($userregister) > 0)

                    @foreach($userregister as $user)
                    <tr>
                        <td>{{$user->client_id}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->email}}</td>
                        <td>**********</td>
                    </tr>
                    @endforeach

                @endif

            </tbody>
        </table>

</body>
</html>