<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    // Show all clients
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::latest()->filter(request(['search']))->paginate(5),
        ]);
    }

    // Show a single client
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client,
        ]);
    }

    // Show the edit form
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client,
        ]);
    }

    // Update the client
    public function update(Request $request, Client $client) {
        // dd($request->all());
        $formFields = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'ICE' => ['required'],
            'IF' => ['required'],
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => ['required', 'email'],
            'ville' => 'required',
            'pays' => 'required',
            'code_postal' => 'required'
        ]);

        try {
            // dd($formFields);
            $client->update($formFields);
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
        }

        return back()->with('message', 'Client updated successfully!');
    }

    // Delete the client
    public function destroy(Client $client) {
        $client->is_active = false;
        $client->save();
        return back()->with('message', 'Client deleted successfully!');
    }

    // Show the create form
    public function create() {
        return view('clients.create');
    }

    // Store the client
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
            // $address1['client_id'] = Client::create($formFields)->id;
            // begin the transaction
            DB::beginTransaction();

            $client = Client::create($formFields);
            $address1['client_id'] = $client->id;
            $address1['type'] = 'facturation';
            Address::create($address1);
            // if the second address exists then create it
            if ($address2['email2'] ?? false) {
                $address2['client_id'] = $address1['client_id'];
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

        return redirect('/clients')->with('message', 'Client created successfully!');
    }
}
