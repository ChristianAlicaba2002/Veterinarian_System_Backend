<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <title>Appointments</title>
  <style>
    .main-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      padding: 30px 15px;
      min-height: 100vh;
      background-color: #f8f9fa;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      width: 100%;
      max-width: 1200px;
      margin-bottom: 40px;
    }

    .card {
      background: white;
      padding: 25px;
      border-radius: 16px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .card h6 {
      color: #6c5ce7;
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .card h3 {
      color: #2d3436;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .card p {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 10px;
    }

    .card-icon {
      font-size: 2rem;
      color: #6c5ce7;
      margin-top: 1rem;
    }

    .table-container {
      display: none;
      width: 100%;
      max-width: 1200px;
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 25px;
      margin-top: 1rem;
    }

    .table-container h3 {
      text-align: center;
      color: #6c5ce7;
      margin-bottom: 20px;
      font-weight: 600;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 0.9rem;
    }

    th {
      background-color: #f8f9fa;
      padding: 1rem;
      font-weight: 600;
      text-align: left;
    }

    td {
      padding: 1rem;
      border-bottom: 1px solid #eee;
    }

    tr:hover {
      background-color: #f8f9fa;
    }

    .adoption-cards {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 20px;
      padding: 20px;
    }

    .adoption-card {
      background: white;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .adoption-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .adoption-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 15px;
    }

    .adoption-card h4 {
      color: #6c5ce7;
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .adoption-card p {
      margin: 5px 0;
      font-size: 0.9rem;
      color: #666;
    }

    .adoption-card .status {
      display: inline-block;
      padding: 5px 15px;
      border-radius: 20px;
      font-weight: 500;
      margin: 10px 0;
      background-color: #f8f9fa;
    }

    .rehome-btn {
      background: #6c5ce7;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 500;
      width: 100%;
      margin-top: 15px;
    }

    .rehome-btn:hover {
      background: #5c4cd7;
      transform: translateY(-2px);
    }

    @media (max-width: 768px) {
      .main-container {
        padding: 15px;
      }

      .cards {
        grid-template-columns: 1fr;
      }

      .table-container {
        padding: 15px;
      }

      .adoption-cards {
        grid-template-columns: 1fr;
      }
    }
  </style>

</head>

<body>
  <aside>
    @include('Admin.Pages.Sidebar')
  </aside>

  <div class="main-container">
    <div class="cards">
      <div class="card" onclick="showTable('groomingTable')">
        <h6>Grooming</h6>
        <h3>{{ count($grooming) }}</h3>
        @if (count($grooming) < 5)
          <p style="color: #e17055;"><i class="bi bi-arrow-down"></i> {{ count($grooming) }} grooming appointments</p>
          @else
          <p style="color: #00b894;"><i class="bi bi-arrow-up"></i> {{ count($grooming) }} grooming appointments</p>
          @endif
          <div class="card-icon"><i class="bi bi-calendar-check"></i></div>
      </div>

      <div class="card" onclick="showTable('checkUpTable')">
        <h6>Check Ups</h6>
        <h3>{{ count($checkUp) }}</h3>
        @if (count($checkUp) < 5)
          <p style="color: #e17055;"><i class="bi bi-arrow-down"></i> {{ count($checkUp) }} check up appointments</p>
          @else
          <p style="color: #00b894;"><i class="bi bi-arrow-up"></i> {{ count($checkUp) }} check up appointments</p>
          @endif
          <div class="card-icon"><i class="bi bi-calendar-check"></i></div>
      </div>

      <div class="card" onclick="showTable('adoptionTable')">
        <h6>Adoption</h6>
        <h3>{{ count($adoptions) }}</h3>
        @if (count($adoptions) < 5)
          <p style="color: #e17055;"><i class="bi bi-arrow-down"></i> {{ count($adoptions) }} adoption appointments</p>
          @else
          <p style="color: #00b894;"><i class="bi bi-arrow-up"></i> {{ count($adoptions) }} adoption appointments</p>
          @endif
          <div class="card-icon"><i class="bi bi-calendar-check"></i></div>
      </div>
    </div>

    <div id="groomingTable" class="table-container">
      <h3>Grooming Appointments</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Client ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Pet Name</th>
            <th>Breed</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Groomer</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          @if(count($grooming) > 0)
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
          @else
          <td colspan="12" style="text-align: center; font-size: 1.1rem;">No Grooming yet</td>
          @endif
        </tbody>
      </table>
    </div>

    <div id="checkUpTable" class="table-container">
      <h3>Check Up Appointments</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Owner ID</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Email</th>
            <th>Pet Name</th>
            <th>Breed</th>
            <th>Weight</th>
            <th>Species</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Date</th>
            <th>Type</th>
            <th>Symptoms</th>
            <th>Vet</th>
          </tr>
        </thead>
        <tbody>
          @if(count($checkUp) > 0)
          @foreach ($checkUp as $appointment)
          <tr>
            <td>{{ $appointment->owner_id }}</td>
            <td>{{ $appointment->owner_fullname }}</td>
            <td>{{ $appointment->owner_address }}</td>
            <td>{{ $appointment->owner_email }}</td>
            <td>{{ $appointment->pet_name }}</td>
            <td>{{ $appointment->breed }}</td>
            <td>{{ $appointment->weight}}</td>
            <td>{{ $appointment->species}}</td>
            <td>{{ $appointment->age}}</td>
            <td>{{ $appointment->sex}}</td>
            <td>{{ $appointment->appointment_date}}</td>
            <td>{{ $appointment->checkup_type }}</td>
            <td>{{ $appointment->symptoms }}</td>
            <td>{{ $appointment->preferred_vet }}</td>
          </tr>
          @endforeach
          @else
          <td colspan="14" style="text-align: center; font-size:1.1rem;">No Check up yet</td>
          @endif

        </tbody>
      </table>
    </div>

    <div id="adoptionTable" class="table-container">
      <h3>Adoption Appointments</h3>
      <div class="adoption-cards">
        @if(count($adoptions) > 0)
          @foreach($adoptions as $adoption)
            <div class="adoption-card">
              <img src="{{asset('/images/' . $adoption->image)}}" alt="{{$adoption->Pet_Name}}">
              <h4>{{ $adoption->Pet_Name }}</h4>
              <p><strong>Client:</strong> {{$adoption->first_name}} {{ $adoption->last_name }}</p>
              <p><strong>Contact:</strong> {{ $adoption->email }} | {{ $adoption->phone_number }}</p>
              <p><strong>Address:</strong> {{ $adoption->address }}</p>
              <p><strong>Pet Details:</strong></p>
              <p>Breed: {{ $adoption->Breed }}</p>
              <p>Age: {{ $adoption->Age }}</p>
              <p>Species: {{ $adoption->Species }}</p>
              <p>Weight: {{ $adoption->Weight }}</p>
              <p>Special Markings: {{ $adoption->Special_Markings}}</p>
              <p>Microchip: {{ $adoption->Microchip_Number}}</p>
              <div class="status" style="color: {{ $adoption->Status == 'Available' ? '#00b894' : '#e17055' }}">
                Status: {{ $adoption->Status }}
              </div>
              <p><strong>Adoption Date:</strong> {{ $adoption->adoption_date}}</p>
              <form action="/rehomed.pets/{{$adoption->client_id}}" method="post">
                @csrf
                <button type="submit" class="rehome-btn">Mark as Rehomed</button>
              </form>
            </div>
          @endforeach
        @else
          <div class="adoption-card" style="text-align: center; grid-column: 1 / -1;">
            <h4>No Adoption Appointments Yet</h4>
          </div>
        @endif
      </div>
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