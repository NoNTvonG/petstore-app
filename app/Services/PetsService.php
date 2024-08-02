<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class PetsService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('PETSTORE_API_URL');
    }

    public function getPets()
    {
        $response = Http::get("{$this->apiUrl}/pet/findByStatus", [
            'status' => 'available'
        ]);
        return $response->json();
    }

    public function getPetById($id){
        $response = Http::get("{$this->apiUrl}/pet/{$id}");
        return $response->json();
    }

    public function deletePetById($id){
        $response = Http::delete("{$this->apiUrl}/pet/{$id}");
        return $response->json();
    }
    public function updatePet($id, $data)
    {
        $data['id'] = $id;
        $response = Http::put("{$this->apiUrl}/pet", $data);

        return $response->json();
    }

    public function addPet($data)
    {
        $response = Http::post("{$this->apiUrl}/pet", $data);
        return $response->json();
    }
}