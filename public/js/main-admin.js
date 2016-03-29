//Scripts du BO
$(document).ready(function(){
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
            updateCategoriesSort()
        }
    });

    $('.sortable-1-level').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 1,
        placeholder: "panel panel-default panel-body list-unstyled"
    });

    $('#toArray').click(function(e){
        arraied = $('.sortable-2-levels').nestedSortable('toArray', {startDepthCount: 0});
        console.log(arraied);
    });
});

function updateCategoriesSort() {
    $.ajax({
        url: '/admin/catalogue/categories/ordre',
        method: 'post',
        data: function() {$('.sortable-2-levels').nestedSortable('toArray', {startDepthCount: 0})}
    }).success(function(data) {
        console.log(data);
    });
}