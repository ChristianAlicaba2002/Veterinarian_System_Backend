<?php

namespace App\Application\Pet;
use App\Domain\Pet\Pet;
use App\Domain\Pet\PetRepository;

class RegisterPet
{

    public function __construct(private PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function CreatePet(
        string $pet_id,
        string $Pet_Name,
        string $Species,
        string $Breed,
        string $Age,
        string $Sex,
        string $Neutered_Spay,
        string $Color,
        string $Weight,
        string $Special_Markings,
        string $Microchip_Number,
        string $Image
    )
    {
        $pet = new Pet(
            $pet_id,
            $Pet_Name,
            $Species,
            $Breed,
            $Age,
            $Sex,
            $Neutered_Spay,
            $Color,
            $Weight,
            $Special_Markings,
            $Microchip_Number,
            $Image
        );
        return $this->petRepository->create($pet);
    }

    public function update(
        string $pet_id,
        string $Pet_Name,
        string $Species,
        string $Breed,
        string $Age,
        string $Sex,
        string $Neutered_Spay,
        string $Color,
        string $Weight,
        string $Special_Markings,
        string $Microchip_Number,
        string $Image
    )
    {
        $pet = new Pet(
            $pet_id,
            $Pet_Name,
            $Species,
            $Breed,
            $Age,
            $Sex,
            $Neutered_Spay,
            $Color,
            $Weight,
            $Special_Markings,
            $Microchip_Number,
            $Image
        );
        return $this->petRepository->update($pet);
    }

    public function delete(string $pet_id)
    {
        return $this->petRepository->delete($pet_id);
    }   

    public function getPetById(string $pet_id)
    {
        return $this->petRepository->getPetById($pet_id);
    }
    
    public function getAllPets()
    {
        return $this->petRepository->getAllPets();
    }
}