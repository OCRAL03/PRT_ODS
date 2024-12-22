<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'menu_proposal' => 'required|string',
        ]);

        Proposal::create([
            'user_id' => Auth::id(),
            'menu_proposal' => $request->menu_proposal,
        ]);

        return back()->with('success', 'Propuesta enviada correctamente');
    }
}