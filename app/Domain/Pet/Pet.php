<?php

namespace App\Domain\Pet;

class Pet
{
    
    public function __construct(
        private string $pet_id,
        private string $Pet_Name,
        private string $Species,
        private string $Breed,
        private string $Age,
        private string $Sex,
        private string $Neutered_Spay,
        private string $Color,
        private string $Weight,
        private string $Special_Markings,
        private string $Microchip_Number,
        private string $Image,
        private string $Status
    )
    {
        $this->pet_id = $pet_id;
        $this->Pet_Name = $Pet_Name;
        $this->Species = $Species;
        $this->Breed = $Breed;
        $this->Age = $Age;
        $this->Sex = $Sex;
        $this->Neutered_Spay = $Neutered_Spay;
        $this->Color = $Color;
        $this->Weight = $Weight;
        $this->Special_Markings = $Special_Markings;
        $this->Microchip_Number = $Microchip_Number;
        $this->Image = $Image;
        $this->Status = $Status;
    }

    public function getPetId(): string
    {
        return $this->pet_id;
    }
    public function getPetName(): string
    {
        return $this->Pet_Name;
    }
    public function getSpecies(): string
    {
        return $this->Species;
    }
    public function getBreed(): string
    {
        return $this->Breed;
    }
    public function getAge(): string
    {
        return $this->Age;
    }
    public function getSex(): string
    {
        return $this->Sex;
    }
    public function getNeuteredSpay(): string
    {
        return $this->Neutered_Spay;
    }
    public function getColor(): string
    {
        return $this->Color;
    }
    public function getWeight(): string
    {
        return $this->Weight;
    }
    public function getSpecialMarkings(): string
    {
        return $this->Special_Markings;
    }
    public function getMicrochipNumber(): string
    {
        return $this->Microchip_Number;
    }
    public function getImage(): string
    {
        return $this->Image;
    }
    public function getStatus(): string
    {
        return $this->Status;
    }

}