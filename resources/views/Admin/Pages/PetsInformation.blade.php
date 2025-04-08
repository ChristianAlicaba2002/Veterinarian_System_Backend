<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Information</title>
</head>

<body>


    <style>
        .pet-hero-card {
            width: 90%;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            perspective: 1000px;
            margin-left: 14%;
            margin-top: 5%;
        }

        .pet-hero-card:hover {
            transform: scale(1.02);
        }

        .pet-img-container {
            position: absolute;
            top: -40px;
            left: 40px;
            width: 180px;
            height: 180px;
            z-index: 2;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border-radius: 1rem;
            overflow: hidden;
            border: 4px solid #fff;
            background: #fff;
        }

        .pet-hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pet-glass-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(255, 239, 226, 0.85));
            border-radius: 1.5rem;
            padding-left: 240px;
            box-shadow: 0 0 25px rgba(253, 126, 20, 0.1);
            border: 1px solid rgba(253, 126, 20, 0.1);
            position: relative;
            overflow: hidden;
        }

        .pet-name-tag {
            position: absolute;
            top: 5%;
            left: 240px;
            background: linear-gradient(to right, #fd7e14, #ffc107);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            color: white;
            font-size: 1.4rem;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(253, 126, 20, 0.3);
            z-index: 3;
        }

        .pet-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.2rem;
            margin-top: 12%;
        }

        .pet-info-grid div textarea {
            width: 100%;
            height: auto;
            border: none;
            outline: none;
            padding: 10px;
            resize: none;
            background-color: #f9f9f9;
            color: #333;
            font-size: 1rem;
            font-weight: 400;
            border-radius: 0.75rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.04);
        }

        .pet-info-grid div {
            font-size: 1rem;
            font-weight: 500;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: center;
            padding: 0.5rem 0.75rem;
            background: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
        }


        .pet-info-grid div:hover {
            background: #fff4ea;
            transform: scale(1.02);
        }

        .pet-info-grid span {
            color: #fd7e14;
            font-weight: 600;
        }

        .text-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 80vh;
            margin-left: 5%;
            justify-content: center;
            align-items: center;
        }
    </style>

    <body>
        @include('Admin.Pages.Sidebar')

        <div class="container py-5">
            @if(count($pet) > 0)
            @foreach($pet as $pets)
            <div class="pet-hero-card position-relative mb-5">
                <!-- Image -->
                <div class="pet-img-container">
                    <img src="{{ asset('/images/' . $pets->image) }}" alt="{{ $pets->Pet_Name }}" class="pet-hero-img">
                </div>

                <!-- Glass card content -->
                <div class="pet-glass-card p-4">
                    <!-- Floating name badge -->
                    <div class="pet-name-tag">{{ $pets->Pet_Name }}</div>
                    <div class="pet-info-grid">
                        <div><i class="bi bi-paw"></i> <span>Species:</span> {{ $pets->Species }}</div>
                        <div><i class="bi bi-flower3"></i> <span>Breed:</span> {{ $pets->Breed }}</div>
                        <div><i class="bi bi-calendar-heart"></i> <span>Age:</span> {{ $pets->Age }} year's old</div>
                        <div><i class="bi bi-gender-ambiguous"></i> <span>Sex:</span> {{ $pets->Sex }}</div>
                        <div><i class="bi bi-scissors"></i> <span>Neutered:</span> {{ $pets->Neutered_Spay }}</div>
                        <div><i class="bi bi-palette"></i> <span>Color:</span> {{ $pets->Color }}</div>
                        <div><i class="bi bi-scale"></i> <span>Weight:</span> {{ $pets->Weight }} Lbs</div>
                        <div><i class="bi bi-cpu"></i> <span>Microchip:</span> {{ $pets->Microchip_Number }}</div>
                        <div>
                            <i class="bi bi-eye"></i>
                            <span>Markings:</span>
                            <textarea name="Special_Markings" class="form-control" readonly>{{ $pets->Special_Markings }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="text-container">
                <h1>No Available Pets</h1>
                <span style="font-size:3rem; margin-top: -1rem;">🐕🐈</span>
            </div>
            @endif
        </div>
    </body>

</body>

</html>