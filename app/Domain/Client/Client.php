<?php

namespace App\Domain\Client;

class Client
{
    public function __construct(
        public int $client_id,
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $password,
        public string $phone_number,
        public string $address,
        public string $notes
    )
    {
        $this->client_id = $client_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->address = $address;
        $this->notes = $notes;
    }

    public function toArray(): array
    {
        return [
            'client_id' => $this->client_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'notes' => $this->notes
        ];
    }


    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }
}

