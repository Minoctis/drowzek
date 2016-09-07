@extends('layouts.facture')
@section('title', 'votre facture')
@section('content')

    <header>
        <h1>FACTURE
            <h2>{{ $commande->client->nom }} {{ $commande->client->prenom }} − Commande n° {{ $commande->reference }}</h2>
        </h1>
    </header>

    <section class="flex">
        <dl>
            <dt>Facture #</dt>
            <dd>{{ $commande->reference }}</dd>
            <dt>Date de facturation</dt>
            <dd>{{ date("d/m/Y", strtotime($commande->date)) }}</dd>
        </dl>
    </section>
    <section class="flex">
        <dl class="bloc">
            <dt>Facturé à:</dt>
            <dd>
                {{ $commande->client->nom }} {{ $commande->client->prenom }} <br>
                {{ $commande->adresse_facturation }}<br>
                {{ $commande->compl_adresse_facturation }}<br>
                {{ $commande->cp_facturation }} {{ $commande->ville_facturation }}<br>
                {{ $commande->paysFacturation->libelle }} <br>

                <dl>
            <dt>Téléphone</dt>
            <dd>{{ $commande->telephone_facturation }}</dd>
            <dt>Courriel</dt>
            <dd>{{ $commande->client->email }}</dd>
        </dl>
        </dd>
        </dl>
        
    </section>
    <table>
        <thead>
        <tr>
            <th>N°</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Option</th>
            <th>Montant</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commande_produits as $produit)
        <tr>
            <td>{{ $produit->id }}</td>
            <td>{{ $produit->produit_libelle }}</td>
            <td>{{ $produit->quantite }}</td>
            <td>{{ $produit->option_libelle }}</td>
            <td>{{ $produit->prix_unitaire_ht }}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">− Payé par {{ $commande->paiementType->libelle }} −</td>
            <td>Total:</td>
            <td>{{ $commande_total_TTC }}</td>
        </tr>
        </tfoot>
    </table>
    <footer>
        <p>Home de goût By philiphe Drowzek | <a href="http://joseroux.com">homedegout.com</a></p>
        <p>Adresse du siège, Lille | Tél. 450-555-1000 | <a href="mailto:mail@me.com">contact@homedegout.com</a></p>
    </footer>

@endsection