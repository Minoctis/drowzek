@extends('layouts.checkout')

@section('title', 'Étape 1 : Vos Adresses')

@section('page-id', 'checkout-adresses')

@section('content')
<div class="container">
	<div class="row">
		<ul class="nav nav-pills nav-justified nav-checkout">
			<li role="presentation">identification</li>
			<li role="presentation" class="active">adresses</li>
			<li role="presentation">livraison</li>
			<li role="presentation">paiement</li>
			<li role="presentation">confirmation</li>
		</ul>
	</div>
</div>
@endsection