<div class="col-xs-12">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Position</th>
            <th>Nom</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{position}</td>
            <td>{nom}</td>
            <td><a href="" class="btn btn-default center-block"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
            <td><a href="" class="btn btn-default center-block"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
        </tr>
        </tbody>
    </table>
    <ol class="sortable">
        @for($i = 0; $i < 10; $i++)
        <li class="list-unstyled">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-1">#00</div>
                            <div class="col-xs-5">{nom}</div>
                            <div class="col-xs-3"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></div>
                            <div class="col-xs-3"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endfor
    </ol>
</div>