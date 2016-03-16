<div class="col-xs-12">
    <div class="row" id="titre-liste-categorie">
        <div class="col-xs-2">Position</div>
        <div class="col-xs-2">Nom</div>
        <div class="col-xs-5">Nombre de produits</div>
    </div>
    <ol class="sortable-1-level">
        @foreach($ambiances as $ambiance)
            <li class="list-unstyled">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-1">{{ $ambiance->ordre }}</div>
                                <div class="col-xs-4">{{ $ambiance->nom }}</div>
                                <div class="col-xs-3">0</div>
                                <div class="col-xs-2"><a href="{{ route('admin::catalogue::ambiances::edit', $ambiance->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></div>
                                <div class="col-xs-2"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>
</div>