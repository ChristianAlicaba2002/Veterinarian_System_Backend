<?php

namespace App\Domain\Client;

interface ClientRepository
{
    public function createClient(Client $client): Client;
    public function getAllClients(): array;
    public function getClientById(int $id): Client;
    public function updateClient(Client $client): Client;
    public function deleteClient(int $id): void;
}


