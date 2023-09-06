<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //affiche liste contacts
    public function index(){
    $contacts = Contact::all();
    return view('contact.index', compact('contacts'));
    }

    //return formular created contact
    public function create(){
        
        return view('contact.create');
        }
        //enregistrer un new contact
        public function store(Request $request){
            $request->validate([
                'nomComplet'=>'required',
                'email'=> 'required',
                'telephone' => 'required',
                'salaire' => 'required'
            ]);

            Contact::create($request->all());

            return back()->with('success','Étudiant ajouté avec succès');
            }
            public function show($id)
            {

                $contact = Contact::findOrFail($id);
                return view('contact.show', compact('contact'));

            }

            //edition de contact
            public function edit($id)
            {
                $contact = Contact::findOrFail($id);

            return view('contact.edit', compact('contact'));
            }
                /**
         * Enregistre la modification dans la base de données
         */
        public function update(Request $request, $id)
        {

            $request->validate([

                'nomComplet'=>'required',
                'email'=> 'required',
                'telephone' => 'required',
                'salaire' => 'required']);
            $contact = Contact::findOrFail($id);
            $contact->update([
                "nomComplet" => $request->input('nomComplet'),
                     "email" => $request->input('email'),
                 'telephone' => $request->input('telephone'),
                   'salaire' => $request->input('salaire')]);

            return redirect('/')->with('success', 'contact Modifié avec succès');
        }
                /**
         * Supprime le contact dans la base de données
         */
        public function destroy($id)
        {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            return redirect('/')->with('success', 'contact Supprime avec succès');

        }
            
    
}
