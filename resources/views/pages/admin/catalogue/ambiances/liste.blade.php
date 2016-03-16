<div class="col-xs-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Position</th>
                <th>Nom</th>
                <th>Nombre de produits</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($ambiances as $ambiance)
            <tr>
                <th>{{ $ambiance->ordre }}</th>
                <th>{{ $ambiance->nom }}</th>
                <th>0</th>
                <th><a href="{{ route('admin::catalogue::ambiances::edit', ['id' => $ambiance->id]) }}" class="btn btn-default center-block"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a></th>
                <th><button class="btn btn-default center-block"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</button></th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>