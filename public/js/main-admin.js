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

function rechercheProduits() {
    $.ajax({
        url: '/admin/produits/recherche',
        method: 'post',
        data: getRechercheProduitData()
    })
        .success(function(data) {
            toastr.success('La recherche a retourné ' + data.length + ' produits.', 'Recherche');

            // Cache of the template
            var template = document.getElementById("template-list-item");
            // Get the contents of the template
            var templateHtml = template.innerHTML;
            // Final HTML variable as empty string
            var listHtml = "";

            data.forEach(function(produit) {
                var lienCatParent = '';
                var ambiances = '';

                if (produit.categorie.parent.id) {
                    lienCatParent = '<a href="/admin/catalogue/categories/modifier/' + produit.categorie.parent.id + '">' + produit.categorie.parent.nom + '</a>';
                }

                produit.ambiances.forEach(function(ambiance) {
                   ambiances += '<a href="/admin/catalogue/ambiances/edit/' + ambiance.id + '">' + ambiance.nom + '</a>';
                });
                
                listHtml += templateHtml.replace(/##nom##/g, produit.nom)
                    .replace(/##nouveau##/g, produit.is_new ? 'Oui' : 'Non')
                    .replace(/##lienCatParent##/g, lienCatParent)
                    .replace(/##lienCatEnfant##/g, '/admin/catalogue/categories/modifier/' + produit.categorie.id)
                    .replace(/##nomCatEnfant##/g, produit.categorie.nom)
                    .replace(/##ambiances##/g, ambiances)
                    .replace(/##ambiancesTotal##/g, produit.ambiances.length)
                    .replace(/##lienEditProduit##/g, '/admin/produits/modifier/' + produit.id)
                    .replace(/##produit_id##/g, produit.id)
                    .replace(/##produit_nom##/g, produit.nom);
        });
            $("#table-liste-produits>tbody").find("tr:gt(0)").remove();
            $("#table-liste-produits>tbody").append(listHtml);

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

function deleteRestoreProduit(checkbox, id) {
    console.log('etat produit', checkbox.checked)
    if (checkbox.checked) {
        $.ajax({
                url:'/admin/produits/' + id+ '/restore',
                method: 'put'
            })
            .success(function() {
                toastr.success('Le produit a été réactivé', 'Etat du produit');
            })
            .error(function() {
                toastr.error('Une erreur est survenue à la suppression du produit.', 'Etat du produit')
            })
    }
    else {
        $.ajax({
                url:'/admin/produits/' + id,
                method: 'delete'
            })
            .success(function() {
                toastr.success('Le produit a été désactivé', 'Etat du produit');
            })
            .error(function() {
                toastr.error('Une erreur est survenue à la désactivation du produit.', 'Etat du produit')
            })
    }
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


/* Theme */