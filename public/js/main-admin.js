//Scripts du BO
$(document).ready(function(){
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
});