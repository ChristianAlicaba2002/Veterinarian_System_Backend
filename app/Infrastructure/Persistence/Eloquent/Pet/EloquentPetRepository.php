<?php

namespace App\Infrastructure\Persistence\Eloquent\Pet;

use App\Domain\Pet\PetRepository;
use App\Domain\Pet\Pet;
use App\Models\Pets as PetsModel;

class EloquentPetRepository implements PetRepository
{

    public function create(Pet $pet)
    {
        $PetsModel = PetsModel::find($pet->getPetId()) ?? new PetsModel();
        $PetsModel->pet_id = $pet->getPetId();
        $PetsModel->Pet_Name = $pet->getPetName();
        $PetsModel->Species = $pet->getSpecies();
        $PetsModel->Breed = $pet->getBreed();
        $PetsModel->Age = $pet->getAge();
        $PetsModel->Sex = $pet->getSex();
        $PetsModel->Neutered_Spay = $pet->getNeuteredSpay();
        $PetsModel->Color = $pet->getColor();
        $PetsModel->Weight = $pet->getWeight();
        $PetsModel->Special_Markings = $pet->getSpecialMarkings();
        $PetsModel->Microchip_Number = $pet->getMicrochipNumber();
        $PetsModel->image = $pet->getImage(); // Assuming you have an image field in your Pet model
        $PetsModel->save(); // Save the pet to the database
    }

    public function getPetById(string $pet_id)
    {
        $pet = PetsModel::find($pet_id);
        if ($pet) {
            return $pet; // Return the pet if found
        } else {
            throw new \Exception("Pet not found"); // Handle the case where the pet is not found
        }
    }

    public function update(Pet $pet)
    {
        $PetsModel = PetsModel::find($pet->getPetId()) ?? new PetsModel();
        $PetsModel->pet_id = $pet->getPetId();
        $PetsModel->Pet_Name = $pet->getPetName();
        $PetsModel->Species = $pet->getSpecies();
        $PetsModel->Breed = $pet->getBreed();
        $PetsModel->Age = $pet->getAge();
        $PetsModel->Sex = $pet->getSex();
        $PetsModel->Neutered_Spay = $pet->getNeuteredSpay();
        $PetsModel->Color = $pet->getColor();
        $PetsModel->Weight = $pet->getWeight();
        $PetsModel->Special_Markings = $pet->getSpecialMarkings();
        $PetsModel->Microchip_Number = $pet->getMicrochipNumber();
        $PetsModel->Image = $pet->getImage(); // Assuming you have an image field in your Pet model
        $PetsModel->save(); // Save the pet to the database
    }

    public function delete(string $pet_id)
    {
        $pet = PetsModel::find($pet_id);
        if ($pet) {
            $pet->delete(); // Delete the pet from the database
        } else {
            throw new \Exception("Pet not found"); // Handle the case where the pet is not found
        }
    }

    public function getAllPets()
    {
        $pet = PetsModel::all();
        if ($pet->isEmpty()) {
            return null; // or throw an exception, or return an empty array, etc.
        }
        return $pet;
    }
}
