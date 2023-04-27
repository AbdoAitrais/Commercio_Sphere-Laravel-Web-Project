<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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
}
