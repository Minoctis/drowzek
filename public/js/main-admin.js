//Scripts du BO
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    $('.sortable-2-levels').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 2,
        placeholder: "panel panel-default panel-body list-unstyled",
        relocate: function() {
            updateCategoriesSort();
        }
    });

    $('.sortable-1-level').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 1,
        placeholder: "panel panel-default panel-body list-unstyled",
        relocate: function() {
            updateAmbiancesSort();
        }
    });
});

function updateCategoriesSort() {
    // todo : update de l'affichage de la position
    $.ajax({
        url: '/admin/catalogue/categories/ordre',
        method: 'post',
        data: getCategoriesData()
    }).success(function(data) {
        toastr.success('Nouvel ordre des catégories enregistré !');
    });
}

function getCategoriesData() {
    var data = $('.sortable-2-levels').nestedSortable('toHierarchy');
    var json = {data: data};
    return json;
}

function updateAmbiancesSort() {
    $.ajax({
        url: '/admin/catalogue/ambiances/ordre',
        method: 'post',
        data: getAmbiancesData()
    }).success(function(data) {
        toastr.success('Nouvel ordre des ambiances enregistré !');
    });
}

function getAmbiancesData() {
    var data = $('.sortable-1-level').nestedSortable('toHierarchy');
    var json = {data: data};
    return json;
}

function openModalDeleteProduit(id, nom) {
    $('#content-modal-delete').innerHTML = document.querySelector('#content-modal-delete').innerHTML.replace('[produitNom]', nom);
    $('#validate-supprimer-produit').attr("data-id", id);
}

function deleteProduit(id) {
    $.ajax({
        url:'/admin/produits/' + id,
        method: 'delete'
    })
        .success(function() {
            toastr.success('Le produit a été supprimé', 'Suppresison de produit', {onHidden: function() { location.reload(); }, timeOut: 300});
            $('#delete-produit').modal('hide')
        })
        .error(function() {
            toastr.error('Une erreur est survenue à la suppression du produit.', 'Suppression de produit')
        })
}

$('#validate-supprimer-produit').on('click', function() {
    deleteProduit($(this).data('id'));
});

function rechercheProduits() {
    $.ajax({
        url: '/admin/produits/recherche',
        method: 'post',
        data: getRechercheProduitData()
    })
        .success(function(data) {
            toastr.success('La recherche a retourné ' + data.length + ' produits.', 'Recherche');

            data.forEach(function(produit) {

                var template = '<tr>' +
                '<td></td>' +
                '<td></td>' +
                '<td><a href=""></a> // <a href=""></a></td>' +
                '<td><a href=""></a></td>' +
                '<td></td>' +
                '<td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>' +
                '<td><button class="btn btn-danger" data-toggle="modal" data-target="#delete-produit" onclick="openModalDeleteProduit(, )"><span class="glyphicon glyphicon-trash"></span> Supprimer</button></td>' +
                '</tr>';
            })

        })
        .error(function() {
            toastr.error('Une erreur est survenue pendant la recherche de produit', 'Recherche');
        })
}

function getRechercheProduitData() {
    var data = {
        nom: '',
        nouveau: '',
        categorie: ''
    };

    data.nom = document.querySelector('#recherche-produit-nom').value;
    data.nouveau = document.querySelector('#recherche-produit-nouveau').value;
    data.categorie = document.querySelector('#recherche-produit-categorie').value;

    return data;
}

/* Avis produit */
function openModalDeleteAvis(id){
    $("#validate-supprimer-avis").attr("data-id", id);
}

function deleteAvis(id) {
    $.ajax({
            url:'/admin/avis/' + id,
            method: 'delete'
        })
        .success(function() {
            toastr.success('L\'avis a été supprimé', 'Suppresison d\'avis', {onHidden: function() { location.reload(); }, timeOut: 300})
            $('#delete-produit').modal('hide')
        })
        .error(function() {
            toastr.error('Une erreur est survenue à la suppression de l\'avis.', 'Suppression de l\'avis')
        })
}

$('#validate-supprimer-avis').on('click', function() {
    deleteAvis($(this).data('id'));
});
