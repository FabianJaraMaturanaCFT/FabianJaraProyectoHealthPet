<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return response()->json([
            'data' => $pets,
            'code' => 200,
            'message' => 'Las Mascotas se recuperaron con éxito'
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'especie' => 'required|string|max:20',
            'raza' => 'string|max:20|nullable',
            'sexo' => 'required|string|max:1',
            'fechaNacimiento' => 'required|date',
            'numeroAtenciones' => 'required|integer',
            'enTratamiento' => 'boolean'
        ]);

        $pet = Pet::create($request->all());
        return response()->json([
            'data' => $pet,
            'code' => 201,
            'message' => 'Mascota creada con éxito'
        ], 201);
    }

    public function show(Pet $pet)
    {
        return response()->json([
            'data' => $pet,
            'code' => 200,
            'message' => 'Mascota recuperada con éxito'
        ], 200);
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'especie' => 'required|string|max:20',
            'raza' => 'nullable|string|max:20',
            'sexo' => 'required|string|max:1',
            'fechaNacimiento' => 'required|date',
            'numeroAtenciones' => 'required|integer',
            'enTratamiento' => 'boolean'
        ]);

        $pet->update($request->all());

        return response()->json([
            'data' => $pet,
            'code' => 200,
            'message' => 'Mascota actualizada con éxito'
        ], 200);
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return response()->json([
            'data' => [],
            'code' => 200,
            'message' => 'Mascota eliminada con éxito'
        ], 200);
    }

    public function filtrarPorEspecie($especie)
    {
        $pets = Pet::where('especie', $especie)->get();
        return response()->json([
            'data' => $pets,
            'code' => 200,
            'message' => 'Mascotas filtradas por especie recuperadas con éxito'
        ], 200);
    }
}

