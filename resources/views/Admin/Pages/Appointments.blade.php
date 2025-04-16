<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            background-color: #f9f9f9;
        }

        .main-container {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        .cards {
            display: flex;
            gap: 30px;
            margin-top: 20px;
            justify-content: center;
        }

        .card {
            width: 250px;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background-color: #fff;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card h6 {
            margin: 0;
            color: #888;
            font-size: 18px;
        }

        .card h3 {
            margin: 10px 0;
            color: #333;
            font-size: 24px;
        }

        .card p {
            margin: 0;
            color: #e74c3c;
            font-size: 14px;
        }

        .card-icon {
            font-size: 28px;
            margin-top: 10px;
            color: #f39c12;
        }

        .table-container {
            display: none;
            margin-top: 40px;
            width: 80%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: .80rem;
        }

        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    @include('Admin.Pages.Sidebar')

    <div class="main-container">

        <div class="cards">
            <div class="card" onclick="showTable('groomingTable')">
                <h6>Grooming</h6>
                <h3>{{ count($grooming) }}</h3>
                @if (count($grooming) < 5)
                    <p style="color: red;"><i class="bi bi-arrow-down"></i> {{ count($grooming) }} grooming appointments</p>
                    @else
                    <p style="color: green;"><i class="bi bi-arrow-up"></i> {{ count($grooming) }} grooming appointments</p>
                    @endif
                    <div class="card-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
            </div>
            <div class="card" onclick="showTable('checkUpTable')">
                <h6>Check Ups</h6>
                <h3>{{ count($checkUp) }}</h3>
                @if (count($checkUp) < 5)
                    <p><i class="bi bi-arrow-down" style="color: red;"></i> {{ count($checkUp) }} check up appointments</p>
                    @else
                    <p><i class="bi bi-arrow-up" style="color: green;"></i> {{ count($checkUp) }} check up appointments</p>
                    @endif
                    <div class="card-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
            </div>
            <div class="card" onclick="showTable('adoptionTable')">
                <h6>Adoption</h6>
                <h3>{{ count($adoption) }}</h3>
                @if (count($adoption) < 5)
                    <p><i class="bi bi-arrow-down" style="color: red;"></i> {{ count($adoption) }} adoption appointments</p>
                    @else
                    <p><i class="bi bi-arrow-up" style="color: green;"></i> {{ count($adoption) }} adoption appointments</p>
                    @endif
                    <div class="card-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
            </div>
        </div>

        <div id="groomingTable" class="table-container">
            <h3>Grooming Appointments</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Client ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Address</td>
                        <td>Phone Number</td>
                        <td>Pet Name</td>
                        <td>Breed</td>
                        <td>Service Type</td>
                        <td>Appointment Date</td>
                        <td>Appointment Time</td>
                        <td>Groomer Name</td>
                        <td>Notes</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grooming as $appointment)
                    <tr>
                        <td>{{$appointment->client_id}}</td>
                        <td>{{$appointment->first_name}}</td>
                        <td>{{$appointment->last_name}}</td>
                        <td>{{$appointment->address}}</td>
                        <td>{{$appointment->phone_number}}</td>
                        <td>{{$appointment->pet_name}}</td>
                        <td>{{$appointment->breed}}</td>
                        <td>{{$appointment->service_type}}</td>
                        <td>{{$appointment->appointment_date}}</td>
                        <td>{{$appointment->appointment_time}}</td>
                        <td>{{$appointment->groomer_name}}</td>
                        <td>{{$appointment->notes}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="checkUpTable" class="table-container">
            <h3>Check Up Appointments</h3>
            <table>
                <thead>
                    <tr>
                        <td>Owner ID</td>
                        <td>Owner Fullname</td>
                        <td>Owner Address</td>
                        <td>Owner Email</td>
                        <td>Pet Name</td>
                        <td>Breed</td>
                        <td>Weight</td>
                        <td>Species</td>
                        <td>Age</td>
                        <td>Sex</td>
                        <td>Appointment Aate</td>
                        <td>Checkup Type</td>
                        <td>Symptoms</td>
                        <td>Preferred Vet</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkUp as $appointment)
                    <tr>
                        <td>{{ $appointment->owner_id }}</td>
                        <td>{{ $appointment->owner_fullname }}</td>
                        <td>{{ $appointment->owner_address }}</td>
                        <td>{{ $appointment->owner_email }}</td>
                        <td>{{ $appointment->pet_name }}</td>
                        <td>{{ $appointment->breed }}</td>
                        <td>{{$appointment->weight}}</td>
                        <td>{{$appointment->species}}</td>
                        <td>{{$appointment->age}}</td>
                        <td>{{$appointment->sex}}</td>
                        <td>{{$appointment->appointment_date}}</td>
                        <td>{{ $appointment->checkup_type }}</td>
                        <td>{{ $appointment->symptoms }}</td>
                        <td>{{ $appointment->preferred_vet }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="adoptionTable" class="table-container">
            <h3>Adoption Appointments</h3>
            <table>
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Pet Name</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Add adoption data here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function showTable(tableId) {
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.style.display = 'none');
            document.getElementById(tableId).style.display = 'block';
        }
    </script>
</body>

</html>