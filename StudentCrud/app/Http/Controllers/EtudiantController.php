<?php
namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(5);
        return view('student', compact('etudiants'));
    }

    public function create()
    {
        $classes = Classe::all();
        return view('studentCreate', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe_id' => 'required',
        ]);
    
        Etudiant::create($request->all());
    
        return back()->with("success", "Étudiant ajouté avec succès");
    }
    
    public function edit(Etudiant $etudiant)
    {
        
        $classes = Classe::all();

        return view('editer', compact('etudiant', 'classes'));
    }
    
    public function update(Request $request, Etudiant $etudiant)
    {

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe_id' => 'required',
        ]);
        $etudiant->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'classe_id' => $request->input('classe_id'),
        ]);
    
        return redirect()->route('etudiant')->with('success', 'Étudiant mis à jour avec succès.');
    }
    public function confirmationSuppression(Etudiant $etudiant)
    {
        return view('supprimer', compact('etudiant'));
    }
    
    public function supprimer(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant')->with('success', 'Étudiant supprimé avec succès.');
    }
}
