@extends('layouts.admin')
@section('title', 'Gestion des pages')
@section('content')

    <div class="row">
        <div class="liste-pages-BO">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Titre</th>
                        <th>Chemin</th>
                        <th>Ordre</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->titre}}</td>
                            <td>{{$page->slug}}</td>
                            <td>{{$page->ordre}}</td>

                            <td><a href="{{ route('admin::pages::details', $page->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open"></span> Modifier</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection