<?php

namespace App\Domain\Pet;

interface PetRepository
{
    public function create(Pet $pet);
    public function getPetById(string $pet_id);
    public function update(Pet $pet);
    public function delete(string $pet_id);
    public function getAllPets();
}