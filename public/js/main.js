jQuery(document).ready(function () {
    
    //Manipulation des images du sous menu

    $(".categorie")
        .mouseenter(function() {
            var current_class = $(this).attr('class');
            var nom_categorie = current_class.substr(current_class.lastIndexOf(' ') + 1);
            $('#'+nom_categorie).css('display', 'block');
        })
        .mouseleave(function() {
            var current_class = $(this).attr('class');
            var nom_categorie = current_class.substr(current_class.lastIndexOf(' ') + 1);
            $('#'+nom_categorie).css('display', 'none');
        });
    


    // Hauteur caroussel images produit
    function resizeHeight(div){
        var height = $(div).height()+"px";
        var width = $(div).width()+"px";
        $(div).parent().css("height", height);
    }
    resizeHeight(".bloc-images");
    $(window).bind('resize',function () {
        //Update slider height on resize
        resizeHeight(".bloc-images");
    });

    /*$(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });

            // register clicks outisde search box, and toggle correct classes
            document.addEventListener("click",function(e){
                var clickedID = e.target.id;
                if (clickedID != "search-terms" && clickedID != "search-label") {
                    if (classie.has(searchEl,"focus")) {
                        classie.remove(searchEl,"focus");
                        classie.remove(labelEl,"active");
                    }
                }
            });
        }(window));

*/



});