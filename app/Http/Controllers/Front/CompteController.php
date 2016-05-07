<?php

namespace App\Http\Controllers\Front;

use App\Models\Client;
use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class CompteController extends Controller
{
    public function updateCompteClient(Request $request) {
        $client = Client::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'civilite' => 'required|in:1,2',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email|max:255|unique:clients,email,'.$client->id,
            'date-naissance' => 'date_format:Y-m-d',
            'new-password' => 'confirmed|min:6',
            'password' => 'required'
        ]);

        $validator->after(function($validator) use($request, $client) {
            if (!Hash::check($request->input('password'), $client->password)) {
                $validator->errors()->add('actual_password', 'Le mot de passe saisit ne correspond pas au mot de passe du compte.');
            }
        });

        if ($validator->fails()) {
            return redirect('/compte/accueil#infos')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $client->civilite_id = $request->input('civilite');
            $client->prenom = $request->input('prenom');
            $client->nom = $request->input('nom');
            $client->email = $request->input('email');
            $client->date_naissance = $request->has('date-naissance') ? $request->input('date-naissance') : null;
            $client->password = $request->has('new-password') ? bcrypt($request->input('new-password')) : Auth::user()->password;

            $client->save();

            return redirect('/compte/accueil#infos');
        }
    }
}
