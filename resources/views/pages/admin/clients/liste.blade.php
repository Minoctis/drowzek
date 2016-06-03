@extends('layouts.admin')
@section('title', 'Liste des clients')
@section('content')

        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Civilité</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->civilite->libelle}}</td>
                            <td>{{$client->nom}}</td>
                            <td>{{$client->prenom}}</td>
                            <td>{{$client->email}}</td>

                            <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Commandes</a></td>
                            <td><a href="{{ route('admin::clients::details', $client->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> Afficher</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection