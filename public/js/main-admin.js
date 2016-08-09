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