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
    }

    .cards {
      display: flex;
      gap: 25px;
      flex-wrap: nowrap;
      justify-content: center;
      margin-bottom: 40px;
    }

    .card {
      width: 240px;
      padding: 25px;
      background: linear-gradient(145deg, rgb(242, 218, 255), rgba(255, 177, 232, 0.4));
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 8px 10px rgba(250, 185, 230, 0.6);
      transition: 0.3s ease;
      border: 2px solid rgb(182, 89, 140);
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(241, 144, 241, 0.15);
    }

    .card h6 {
      color: rgb(200, 143, 223);
      font-size: 1.5em;
      margin-bottom: 6px;
    }

    .card h3 {
      color: #9b59b6;
      font-size: 26px;
      margin-bottom: 8px;
    }

    .card p {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .card-icon {
      font-size: 28px;
      color: #9b59b6;
    }

    .table-container {
      display: none;
      width: auto;
      max-width: auto;
      border: rgb(243, 211, 255) 1px solid;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(255, 166, 243, 0.57);
      padding: 25px;
    }

    .table-container h3 {
      text-align: center;
      color: rgb(213, 93, 218);
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.70rem;
    }

    @media (max-width: 768px) {
      .cards {
        flex-direction: column;
        align-items: center;
      }

      .table-container {
        width: auto;
        padding: 15px;
      }

      table {
        font-size: 0.75rem;
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if( count($adoptions) > 0)
          @foreach($adoptions as $adoption)
          <tr>
            <td>{{$adoption->client_id}}</td>
            <td>{{$adoption->first_name}} {{ $adoption->last_name }}</td>
            <td>{{ $adoption->email }}</td>
            <td>{{ $adoption->phone_number }}</td>
            <td>{{ $adoption->address }}</td>
            <td>{{ $adoption->pet_id}}</td>
            <td>
              <img src="{{asset('/images/' . $adoption->image)}}" alt="{{$adoption->Pet_Name}}" style="width:50px;">  
            </td>
            <td>{{ $adoption->Pet_Name }}</td>
            <td>{{ $adoption->Age}}</td>
            <td>{{ $adoption->Species }}</td>
            <td>{{ $adoption->Sex }}</td>
            <td>{{ $adoption->Breed }}</td>
            <td>{{ $adoption->Weight }}</td>
            <td>{{ $adoption->Special_Markings}}</td>
            <td>{{ $adoption->Microchip_Number}}</td>
            <td style="color: {{ $adoption->Status == 'Available' ? 'green' : 'red' }} ">
              {{ $adoption->Status }}
            </td>
            <td>{{ $adoption->adoption_date}}</td>
            <td>
              <form action="/rehomed.pets/{{$adoption->client_id}}" method="post">
                @csrf
                <button type="submit">Re homed</button>
              </form>
            </td>
          </tr>
          @endforeach
          @else
          <td colspan="21" style="text-align: center;font-size:1.1rem;">No Adoption yet</td>
          @endif
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