<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pets Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Quicksand:wght@500;700&display=swap" rel="stylesheet" />
  <style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        color: #444;
        display: flex;
    }

    .container {
        padding: 2rem 1.2rem;
        flex-grow: 1;
        max-width: 1000px;
    }

    .bibiicon{
        color:rgb(195, 54, 255);
        font-size: 1.5rem;
    }
    .pet-hero-card {
        margin-bottom: 2.5rem;
        display: flex;
        align-items: flex-start;
        border-radius: 2rem;
        padding: 1.5rem;
        border: #cbb4f7 solid 1px;
        box-shadow: 0 0  8px 2px rgba(246, 190, 255, 0.55);
        transition: transform 0.3s ease;
    }

    .pet-hero-card:hover {
        transform: translateY(-4px);
    }

    .pet-img-container {
        width: 150px;
        height: 150px;
        margin-right: 1.2rem;
        position: relative;
    }

    .pet-hero-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 1rem;
        border: 2px dashed rgb(253, 191, 248);
    }

    .pet-name-tag {
        background: linear-gradient(to right, #d49ee3, #cbb4f7);
        padding: 0.5rem 0;
        border-radius: 1rem;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        margin-top: 0.5rem;
        text-align: center;
        box-shadow: 0 3px 8px rgba(225, 189, 255, 0.6);
    }

    .pet-info-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
        margin-top: 0.5rem;
    }

    .pet-info-grid div {
        flex: 1 1 180px;
        background: linear-gradient(135deg, #f8e1f4, #dcd3ff);
        padding: 0.8rem;
        border-radius: 1rem;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
        font-size: 0.85rem;
        text-align: center;
    }

    .pet-info-grid div span {
        font-weight: 600;
        color: #b388eb;
        display: block;
        margin-bottom: 0.25rem;
        font-size: 0.85rem;
    }

    .pet-info-grid div textarea {
        width: 100%;
        border: none;
        background: #f7f7f7;
        padding: 0.5rem;
        resize: none;
        font-size: 0.8rem;
        border-radius: 0.5rem;
        margin-top: 0.3rem;
    }

    .text-container {
        background: #fff;
        border-radius: 1.5rem;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }

    .text-container h1 {
        font-size: 1.8rem;
        color: #ae6bcb;
    }

    .text-container span {
        font-size: 2rem;
        display: inline-block;
        margin-top: 0.5rem;
    }

    @media screen and (max-width: 768px) {
        .pet-hero-card {
            flex-direction: column;
            align-items: center;
        }

        .pet-img-container {
            margin-bottom: 1rem;
        }

        .pet-info-grid {
            justify-content: center;
        }
    }
</style>

  </style>
</head>

<body>
@include('Admin.Pages.Sidebar')

  <div class="container">
    @if(count($pet) > 0)
    @foreach($pet as $pets)
    <div class="pet-hero-card">
      <div class="pet-img-container">
        <img src="{{ asset('/images/' . $pets->image) }}" alt="{{ $pets->Pet_Name }}" class="pet-hero-img" />
        <div class="pet-name-tag">{{ $pets->Pet_Name }}</div>
      </div>
      <div class="pet-info-grid">
        <div><i class="bibiicon bi-hearts"></i><span>Species:</span>{{ $pets->Species }}</div>
        <div><i class="bibiicon bi-flower1"></i><span>Breed:</span>{{ $pets->Breed }}</div>
        <div><i class="bibiicon bi-gender-ambiguous "></i><span>Sex:</span>{{ $pets->Sex }}</div>
        <div><i class="bibiicon bi-scissors"></i><span>Neutered:</span>{{ $pets->Neutered_Spay }}</div>
        <div><i class="bibiicon bi-palette"></i><span>Color:</span>{{ $pets->Color }}</div>
        <div><i class="bibiicon bi-archive"></i><span>Weight:</span>{{ $pets->Weight }} Lbs</div>
        <div><i class="bibiicon bi-cpu"></i><span>Microchip:</span>{{ $pets->Microchip_Number }}</div>
        <div><i class="bibiicon bi-heart-pulse"></i><span>Status:</span>{{ $pets->Status }}</div>
        <div><span>Markings:</span><textarea readonly>{{ $pets->Special_Markings }}</textarea></div>
      </div>
    </div>
    @endforeach
    @else
    <div class="text-container">
      <h1>No Available Pets</h1>
      <span>🐾 🐕 🐈 🐾</span>
    </div>
    @endif
  </div>
</body>

</html>
