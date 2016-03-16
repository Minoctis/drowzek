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
        placeholder: "panel panel-default panel-body list-unstyled"
    });

    $('.sortable-1-level').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 1,
        placeholder: "panel panel-default panel-body list-unstyled"
    });
});