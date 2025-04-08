<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    .sidebar {
        height: 100vh;
        position: fixed;
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        z-index: 100;
    }

    .sidebar-link {
        border-radius: 0.5rem;
        margin: 0.3rem 0.8rem;
        color: white;
        transition: all 0.3s;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
        background-color: rgba(255, 255, 255, 0.15);
        color: white;
        transform: translateX(5px);
    }

    .sidebar-brand {
        font-size: 1.5rem;
        font-weight: 700;
        padding: 1.15rem 1.5rem;
    }
</style>

<body>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="sidebar d-flex flex-column flex-shrink-0 text-white" style="width: 250px;">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none sidebar-brand">
            <i class="bi bi-hospital me-2"></i>
            <span>VetCare Admin</span>
        </a>
        <hr class="border-light opacity-25 mx-3">
        <ul class="nav nav-pills flex-column mb-auto px-0">
            <li class="nav-item">
                <a href="{{route('admin.main')}}" class="nav-link sidebar-link  text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/allpets" class="nav-link sidebar-link text-white" id="allPetsLink">
                    <i class="bi bi-heart me-2"></i>
                    Pets
                </a>
            </li>
            <li>
                <a href="" class="nav-link sidebar-link  text-white {{ request()->routeIs('admin.owners') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i>
                    Owners
                </a>
            </li>
            <li>
                <a href="" class="nav-link sidebar-link  text-white {{ request()->routeIs('admin.appointments') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i>
                    Appointments
                </a>
            </li>
            <li>
                <a href="" class="nav-link sidebar-link  text-white{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="bi bi-gear me-2"></i>
                    Settings
                </a>
            </li>
            <li>
                <a href="/addpets" class="nav-link sidebar-link text-white" id="addPetLink">
                    <i class="bi bi-plus-circle me-2"></i>
                    Add Pet
                </a>
            </li>
        </ul>
        <hr class="border-light opacity-25 mx-3">
        <div class="px-3 mb-3">
            <form action="{{route('admin.logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </div>
    </div>

</body>

</html>