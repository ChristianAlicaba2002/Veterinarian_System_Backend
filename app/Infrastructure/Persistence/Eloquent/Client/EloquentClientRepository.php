<?php

namespace App\Infrastructure\Persistence\Eloquent\Client;

use App\Domain\Client\Client;
use App\Domain\Client\ClientRepository;
use App\Models\Client as ModelClient;

class EloquentClientRepository implements ClientRepository
{
    
    public function createClient(Client $client): Client
    {
        $modelClient = ModelClient::find($client->getClientId()) ?? new ModelClient();
        $modelClient->client_id = $client->getClientId();
        $modelClient->first_name = $client->getFirstName();
        $modelClient->last_name = $client->getLastName();
        $modelClient->email = $client->getEmail();
        $modelClient->password = $client->getPassword(); // Assuming password is handled securely
        $modelClient->password = bcrypt($client->getPassword()); // Hash the password before saving     
        $modelClient->phone_number = $client->getPhoneNumber();
        $modelClient->address = $client->getAddress();
        $modelClient->notes = $client->getNotes();
        $modelClient->save();
        return $client;
    }
    
    public function getAllClients(): array
    {
        $clients = ModelClient::all();
        return $clients->toArray();
    }

    public function getClientById(int $client_id): Client
    {
        $modelClient = ModelClient::find($client_id);
        return new Client($modelClient->id, $modelClient->first_name, $modelClient->last_name, $modelClient->email,$modelClient->password, $modelClient->phone_number, $modelClient->address, $modelClient->notes);
    }

    public function updateClient(Client $client): Client
    {
        $modelClient = ModelClient::find($client->getClientId()) ?? new ModelClient();
        $modelClient->first_name = $client->getFirstName();
        $modelClient->last_name = $client->getLastName();
        $modelClient->email = $client->getEmail();
        $modelClient->phone_number = $client->getPhoneNumber();
        $modelClient->address = $client->getAddress();
        $modelClient->notes = $client->getNotes();
        $modelClient->save();
        return new Client($modelClient->id, $modelClient->first_name, $modelClient->last_name, $modelClient->email, $modelClient->password,$modelClient->phone_number, $modelClient->address, $modelClient->notes);
    }
    
    public function deleteClient(int $client_id): void
    {
        $modelClient = ModelClient::find($client_id);
        $modelClient->delete();
    }
    
    
    
    
    
}