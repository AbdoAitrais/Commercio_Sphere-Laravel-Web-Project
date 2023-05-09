<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Fournisseur;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    // Show all fournisseurs
    public function index()
    {
        return view('fournisseurs.index', [
            'fournisseurs' => Fournisseur::latest()->filter(request(['search']))->paginate(5),
        ]);
    }

    // Show a single fournisseur
    public function show(Fournisseur $fournisseur)
    {
        return view('fournisseurs.show', [
            'fournisseur' => $fournisseur,
        ]);
    }

    // Show the edit form
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', [
            'fournisseur' => $fournisseur,
        ]);
    }

    // Update the fournisseur
    public function update(Request $request, Fournisseur $fournisseur) {
        //dd($request->all() );

        $formFields = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'ICE' => ['required'],
            'IF' => ['required'],
        ]);

        $address1 = $request->validate([
            'titre' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => ['required', 'email', 'unique:addresses'],
        ]);

        

        $address2 = $request->validate([
            'email2' => 'email',
        ]);



        try {
            // $address1['fournisseur_id'] = Fournisseur::create($formFields)->id;
            // begin the transaction
            DB::beginTransaction();
            $person = $fournisseur->person;
            $person->update($formFields);
            
            $addressFacturation = Address::where('person_id', $person->id)->where('type', 'facturation')->first();
            //dd($addressFacturation);
            $addressFacturation->update($address1);

            // if the second address exists then create it
            if ($address2['email2'] ?? false) {
                
                $addressLivraison = Address::where('person_id', $person->id)->where('type', 'livraison')->first();
                $address2['titre'] = $request->titre2;
                $address2['adresse'] = $request->adresse2;
                $address2['telephone'] = $request->telephone2;
                $address2['email'] = $request->email2;
                $address2['type'] = 'livraison';
                //dd($address2);
                // delete email2 from the array
                unset($address2['email2']);
                $addressLivraison->update($address2);
            }
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }


        return back()->with('message', 'Fournisseur updated successfully!');
    }

    // Delete the fournisseur
    public function destroy(Fournisseur $fournisseur) {
        $fournisseur->person->is_active = false;
        $fournisseur->person->save();
        return back()->with('message', 'Fournisseur deleted successfully!');
    }

    // Show the create form
    public function create() {
        return view('fournisseurs.create');
    }

    // Store the fournisseur
    public function store(Request $request) {

        //dd($request->all() );

        $formFields = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'ICE' => ['required'],
            'IF' => ['required'],
        ]);

        $address1 = $request->validate([
            'titre' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => ['required', 'email'],
        ]);

        

        $address2 = $request->validate([
            'email2' => 'email',
        ]);



        try {
            // $address1['fournisseur_id'] = Fournisseur::create($formFields)->id;
            // begin the transaction
            DB::beginTransaction();
            $person = Person::create($formFields);
            $fournisseur = new Fournisseur();
            $fournisseur->person()->associate($person);
            $fournisseur->save();
            $address1['person_id'] = $person->id;
            $address1['type'] = 'facturation';
            Address::create($address1);
            // if the second address exists then create it
            if ($address2['email2'] ?? false) {
                $address2['person_id'] = $address1['person_id'];
                $address2['titre'] = $request->titre2;
                $address2['adresse'] = $request->adresse2;
                $address2['telephone'] = $request->telephone2;
                $address2['email'] = $request->email2;
                // delete email2 from the array
                unset($address2['email2']);
                $address2['type'] = 'livraison';

                //dd($address1);
                //dd($address2);
                Address::create($address2);
            }
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }

        return redirect('/fournisseurs')->with('message', 'Fournisseur created successfully!');
    }
}
