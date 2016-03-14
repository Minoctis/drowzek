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
        @for($i = 0; $i < 10; $i++)
            <tr>
                <th>{{ $i+1 }}</th>
                <th>{nom}</th>
                <th>0</th>
                <th><a href="{{ route('admin::catalogue::ambiances::edit', ['id' => 0]) }}" class="btn btn-default center-block"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a></th>
                <th><button class="btn btn-default center-block"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</button></th>
            </tr>
        @endfor
        </tbody>
    </table>
</div>