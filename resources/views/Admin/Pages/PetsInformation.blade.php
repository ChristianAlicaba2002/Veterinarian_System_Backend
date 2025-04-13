<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right,rgba(28, 58, 156, 0.71),rgb(224, 138, 224));
            min-height: 100vh;
            color: #333;
            display: flex;
        }

        .container {
            padding: 4rem 2rem;
            flex-grow: 1;
            max-width: 1200px;
            transition: margin-left 0.3s ease;
        }

        .sidebar:hover + .container {
            margin-left: 100px;
        }

        .pet-hero-card {
            padding-top: 5rem;
            margin-bottom: 4rem;
            display: flex;
            align-items: flex-start;
            border-radius: 3rem;
            transition: transform 0.3s ease, margin-left 0.3s ease;
            background-color: white;
            padding: 2rem;
            margin-left: 100px;
            width: calc(100% - 200px);
        }

        .sidebar:hover + .container .pet-hero-card {
            margin-left: 200px;
            width: calc(100% - 300px);
        }

        .pet-hero-card:hover {
            transform: translateY(-5px);
        }

        .pet-img-container {
            width: 200px;
            height: 195px;
            margin-right: 2rem;
            position: relative;
        }

        .pet-hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            border: 1px dashed #87CEEB;
        }

        .pet-name-tag {
            background: linear-gradient(to right, #7f7fd5, #86a8e7, #91eae4);
            padding: 1rem 0;
            border-radius: 2rem;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 1rem;
            text-align: center;
        }

        .pet-info-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .pet-info-grid div {
            flex: 1 1 220px;
            background: #fff;
            padding: 1.2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.4s ease, background 0.3s ease;
            text-align: center;
            animation: float 4s ease-in-out infinite;
        }

        .pet-info-grid div:hover {
            transform: translateY(-4px);
            background: rgba(138, 161, 240, 0.2);
        }

        .pet-info-grid div span {
            color: #7f7fd5;
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        .pet-info-grid div textarea {
            width: 100%;
            border: none;
            outline: none;
            background: #f5f5f5;
            padding: 10px;
            resize: none;
            font-size: 0.95rem;
            border-radius: 0.75rem;
            margin-top: 0.5rem;
        }

        .text-container {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 2rem;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .text-container h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #6a1b9a;
        }

        .text-container span {
            font-size: 3rem;
            color: #87CEEB;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
        @include('Admin.Pages.Sidebar')

    <div class="container">
        @if(count($pet) > 0)
        @foreach($pet as $pets)
        <div class="pet-hero-card">
            <div class="pet-img-container">
                <img src="{{ asset('/images/' . $pets->image) }}" alt="{{ $pets->Pet_Name }}" class="pet-hero-img">
                <div class="pet-name-tag">{{ $pets->Pet_Name }}</div>
            </div>
            <div>
                <div class="pet-info-grid">
                    <div><i class="bi bi-paw"></i><span>Species:</span>{{ $pets->Species }}</div>
                    <div><i class="bi bi-flower3"></i><span>Breed:</span>{{ $pets->Breed }}</div>
                    <div><i class="bi bi-calendar-heart"></i><span>Age:</span>{{ $pets->Age }} year's old</div>
                    <div><i class="bi bi-gender-ambiguous"></i><span>Sex:</span>{{ $pets->Sex }}</div>
                    <div><i class="bi bi-scissors"></i><span>Neutered:</span>{{ $pets->Neutered_Spay }}</div>
                    <div><i class="bi bi-palette"></i><span>Color:</span>{{ $pets->Color }}</div>
                    <div><i class="bi bi-scale"></i><span>Weight:</span>{{ $pets->Weight }} Lbs</div>
                    <div><i class="bi bi-cpu"></i><span>Microchip:</span>{{ $pets->Microchip_Number }}</div>
                    <div><span>Markings:</span><textarea readonly>{{ $pets->Special_Markings }}</textarea></div>
                    <div><i class="bi bi-cpu"></i><span>Status:</span>{{ $pets->Status }}</div>

                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-container">
            <h1>No Available Pets</h1>
            <span>🐕🐈</span>
        </div>
        @endif
    </div>
</body>

</html>
