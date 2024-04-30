<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\commandesdutil;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $commandes = Commande::where('user_id', $user->id)->get(); // Récupérer tous les commands disponibles
        $commandesdutil = commandesdutil::where('user_id', $user->id)->get();

        return view('commande.index', compact('commandes', 'commandesdutil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $user = auth()->user();

        // Fetch your commandes data, assuming you have a method like getAllCommandes()
        $commandes = $this->getAllCommandes();

        // Fetch the specific Commande by ID
        $commande = Commande::findOrFail($id);

        // Fetch only the commandesdutil for the specified command ID
        $commandesdutil = Commandesdutil::where('user_id', $user->id)->where('commande_id', $id)->get();
           
            

        return view('commande.show', compact('commandes', 'commande', 'commandesdutil'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        $commande=commande::find($id) ;
        $commande->delete();
       
    
            return redirect('/commandes')->with('success', 'commandes deleted successfully!') ;
        
    }

    public function showutili($id)
    {
        $user = auth()->user();

        

        // Fetch only the commandesdutil for the specified command ID
        $commandesdutil = Commandesdutil::where('user_id', $user->id)->where('cammandes_id', $id)->get();
           
            

        return view('commande.show', compact('commandesdutil'));
    }


    

}

