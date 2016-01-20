

@extends('layouts.front')

@section('title', 'Page d\'accueil')

@include('elements.nav')



@section('content')
   
    @include('elements.product')
   
    @include('elements.ambiances')
    
@endsection


@include('elements.engagement')


@include('elements.footer')