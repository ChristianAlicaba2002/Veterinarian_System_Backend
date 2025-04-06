<?php

namespace App\Application\Client;

use App\Domain\Client\Client;
use App\Domain\Client\ClientRepository;

class RegisterClient
{
    public function __construct(private ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function createClient(string $client_id, string $first_name, string $last_name, string $email, string $password, string $phone_number, string $address, string $notes): Client
    {
        $client = new Client($client_id, $first_name, $last_name, $email,$password, $phone_number, $address, $notes);
        return $this->clientRepository->createClient($client);
    }

    public function getAllClients(): array
    {
        $clients = Client::all();
        return $this->clientRepository->getAllClients($clients);
    }

    public function getClientById(int $client_id): Client
    {
        return $this->clientRepository->getClientById($client_id);
    }

    public function updateClient(int $client_id, string $first_name, string $last_name, string $email,string $password, string $phone_number, string $address, string $notes): Client
    {
        $client = new Client($client_id, $first_name, $last_name, $email,$password, $phone_number, $address, $notes);
        return $this->clientRepository->updateClient($client);
    }

    public function deleteClient(int $client_id): void
    {
        $this->clientRepository->deleteClient($client_id);
    }
}


