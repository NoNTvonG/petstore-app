<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PetsService;

class PetsController extends Controller
{
    protected $petsService;

    public function __construct(PetsService $petsService)
    {
        $this->petsService = $petsService;
    }

    public function index()
    {
        $pets = $this->petsService->getPets();
        return view('pets/list', ['pets' => $pets]);
    }
    public function deletePetById($id) {
        $pet = $this->petsService->deletePetById($id);

        if (is_null($pet) || isset($pet['code'])) {
            return redirect()->route('pets.index')->with('error', 'Pet not found or an error occurred.');
        }

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }

    public function showPetById($id) {
        $pet = $this->petsService->getPetById($id);

        if (is_null($pet) || isset($pet['code'])) {
            return redirect()->route('pets.index')->with('error', 'Pet not found or an error occurred.');
        }

        return view('pets/pet', ['pet' => $pet]);
    }
    public function editPetById($id) {
        $pet = $this->petsService->getPetById($id);

        if (is_null($pet) || isset($pet['code'])) {
            return redirect()->route('pets.index')->with('error', 'Pet not found or an error occurred.');
        }

        return view('pets/edit', ['pet' => $pet]);
    }
    public function updatePet(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category.name' => 'required|string',
            'status' => 'required|string|in:available,pending,sold',
            'photoUrls' => 'nullable|array',
        ]);

        $data = $request->only(['name', 'category', 'status', 'photoUrls']);

        $result = $this->petsService->updatePet($id, $data);

        if (isset($result['error'])) {
            return redirect()->route('pets.index')->with('error', 'Failed to update the pet.');
        }

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }
    public function createNewPet()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category.name' => 'required|string',
            'status' => 'required|string|in:available,pending,sold',
            'photoUrls' => 'nullable|array',
        ]);

        $data = $request->only(['name', 'category', 'status', 'photoUrls']);

        $result = $this->petsService->addPet($data);

        if (isset($result['error'])) {
            return redirect()->route('pets.index')->with('error', 'Failed to add the pet.');
        }

        return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
    }

    public function findPetsById(Request $request) {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->back()->with('error', 'Please enter a pet ID.');
        }

        $pet = $this->petsService->getPetById($id);

        if (isset($pet['code']) && $pet['code'] === 404) {
            return redirect()->back()->with('error', 'Pet not found.');
        }

        return view('pets/pet', ['pet' => $pet]);
    }
}
