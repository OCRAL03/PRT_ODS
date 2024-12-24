<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    // Mostrar formulario para crear una propuesta
    public function create()
    {
        return view('proposals.create');
    }

    // Guardar una nueva propuesta
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Proposal::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('proposals.my')->with('success', 'Propuesta enviada con éxito.');
    }

    // Listar las propuestas del usuario autenticado
    public function myProposals()
    {
        $proposals = Proposal::where('user_id', auth()->id())->get();
        return view('proposals.myproposals', compact('proposals'));
    }

    // Listar todas las propuestas (solo para usuarios autenticados)
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }
}