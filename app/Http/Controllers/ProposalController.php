<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    // Asegurar que todas las rutas manejadas por este controlador requieran autenticación
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar formulario para crear una propuesta
    public function create()
    {
        return view('proposals.create');
    }

    // Guardar una nueva propuesta
    public function store(Request $request)
    {
        $request->validate([
            'proposal_text' => 'required|string',
        ]);

        Proposal::create([
            'user_id' => auth()->id(),
            'proposal_text' => $request->proposal_text,
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
        $proposals = Proposal::all(); // Dependiendo del caso de uso, puedes filtrar las propuestas
        return view('proposals.index', compact('proposals'));
    }
}