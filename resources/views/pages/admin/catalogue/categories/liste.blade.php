<div class="col-xs-12">
    <div class="row" id="titre-liste-categorie">
        <div class="col-xs-2">Position</div>
        <div class="col-xs-5">Nom</div>
    </div>
    <ol class="sortable-2-levels">
        @foreach($categories as $categorie)
        <li class="list-unstyled">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-1">{{ $categorie->ordre }}</div>
                            <div class="col-xs-7">{{ $categorie->nom }}</div>
                            <div class="col-xs-2"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></div>
                            <div class="col-xs-2"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($categorie->children))
                <ol class="sortable-1-level">
                    @foreach($categorie->children as $child)
                        <li class="list-unstyled">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-1">{{ $child->ordre }}</div>
                                            <div class="col-xs-7">{{ $child->nom }}</div>
                                            <div class="col-xs-2"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></div>
                                            <div class="col-xs-2"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @endif
        </li>
        @endforeach
    </ol>
</div>