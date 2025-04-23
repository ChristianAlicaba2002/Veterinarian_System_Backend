<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurEver Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <style>
        .sidebar {
            margin-bottom: 2rem;
            height:100%;
            position: fixed;
            background: linear-gradient(to right, #c084fc, #e879f9);
            box-shadow: 0 8px 16px rgba(217, 214, 255, 0.45);
            z-index: 100;
            width: 65px;
            flex-direction: column;
            color: white;
            font-family: 'Poppins', sans-serif;
            padding: 1rem 0.3rem;
            box-sizing: border-box;
            transition: width 0.8s ease, padding 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            margin-left: 0.5rem;
            border:rgb(255, 255, 255) 1px solid;
            border-radius: 50px;
        }

        .sidebar:hover {
            width: 250px;
            padding: 1rem;
        }

        .sidebar-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            font-family: 'Fredoka One', cursive;
            letter-spacing: 8px;
            font-size: 1.5em;
            font-weight: bold;
            padding-top: 0.5rem;
            justify-content: center;

        }

        .sidebar-brand span {
            opacity: 0;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            text-align: center;
            margin-top: 5px;
            color: white;
        }

        .sidebar:hover .sidebar-brand span {
            opacity: 1;
            transform: translateY(0);
        }

        .sidebar-brand img {
            height: 45px;
            object-fit: contain;
            background-color: none;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-link {
    display: flex;
    align-items: center;
    padding: 0.70rem 1rem;
    margin-bottom: 0.5rem;
    color: white;
    text-decoration: none;
    border-radius: 50px;
    transition: background 0.8s ease, padding 0.4s, transform 0.3s ease;
    white-space: nowrap;
    gap: 1rem;
    opacity: 0.8;
}

    .sidebar-link:hover,
    .sidebar-link.active {
        border: white 1px solid;
        text-shadow: 0 18px 20px rgb(224, 208, 255);
        background: linear-gradient(to right, rgba(186, 85, 211, 0.71), rgba(136, 146, 235, 0.45));
        opacity: 1;
        font-size: medium;
        transform: scale(1.1);
    }

    .sidebar-link i {
        font-size: 1.2rem;
    }

    .sidebar-link span {
        opacity: 0;
        transition: opacity 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        font-size: small;

    }

    .sidebar:hover .sidebar-link span {
        opacity: 1;

    }
            .sidebar-divider {
            border-color: rgba(255, 255, 255, 0.86);
            margin: 0.5rem;
            white-space: nowrap;
        }

        .sidebar-logout {
            margin-top: auto;
            white-space: nowrap;
        }

        .sidebar-logout button {
            background-color: transparent;
            color: white;
            border: none;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 3.2rem;
        }

        .sidebar-logout i {
            font-size: 1.8rem;
        }

        .sidebar-logout span {
            opacity: 0;
        }

        .sidebar:hover .sidebar-logout span {
            opacity: 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                margin-top: 0;
                margin-left: 0;
                border-radius: 0;
                padding: 1rem;
            }

            .sidebar:hover {
                width: 100%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column flex-shrink-0 text-white">
        <a href="#" class="sidebar-brand">
            <img src="/images/logoicon.png" alt="FurEver Logo">
            <span>ADMIN</span>
        </a>
        <hr class="sidebar-divider">
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a href="{{route('admin.main')}}" class="nav-link sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('allpets')}}" class="nav-link sidebar-link" id="allPetsLink">
                    <i class="bi bi-heart"></i>
                    <span>Pets</span>
                </a>
            </li>
            <li>
                <a href="{{route('petshistory')}}" class="nav-link sidebar-link" id="allPetsLink">
                    <i class="bi bi-heart"></i>
                    <span>Pet History</span>
                </a>
            </li>
            <li>
                <a href="{{ route('owner') }}" class="nav-link sidebar-link" id="allPetsLink">
                    <i class="bi bi-people"></i>
                    <span>Owners</span>
                </a>
            </li>
            <li>
                <a href="{{route('userinformation')}}" class="nav-link sidebar-link">
                    <i class="bi bi-people"></i>
                    <span>User Information</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adoptonhistory') }}" class="nav-link sidebar-link" id="allPetsLink">
                    <i class="bi bi-people"></i>
                    <span>Adoption History</span>
                </a>
            </li>
            <li>
                <a href="{{ route('appointments') }}" class="nav-link sidebar-link {{ request()->routeIs('appointments') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>
            <li>
                <a href="" class="nav-link sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="{{route('addpets')}}" class="nav-link sidebar-link" id="addPetLink">
                    <i class="bi bi-plus-circle"></i>
                    <span>Adoption</span>
                </a>
            </li>
        </ul>
        <hr class="sidebar-divider">
        <div class="sidebar-logout">
            <form action="{{route('admin.logout')}}" method="post">
                @csrf
                <button type="submit">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</body>
</html>
