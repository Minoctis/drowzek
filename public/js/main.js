jQuery(document).ready(function () {
    var productThumbnailWidth = $('.product-thumbnail-image').first().width();
    $('.product-thumbnail-image').css({'height': productThumbnailWidth+'px'});

    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    /* Intro Height  */
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

    function introHeight() {
        var wh = $(window).height();
        $('#fiche-produit .fiche-produit').css({height: wh});
        $('#fiche-produit .product-bottom').css({top: wh});
        $('#fiche-produit .product-images .carousel-inner .item img').css({"min-height": wh});
    }

    introHeight();
    $(window).bind('resize',function () {
        if ($(window).width() > 991){  
            //Update slider height on resize
            introHeight();
        }

        productThumbnailWidth = $('.product-thumbnail-image').first().width();
        $('.product-thumbnail-image').css({'height': productThumbnailWidth+'px'});
    });

    $('.product-bottom').append(jQuery('.bottom-page'));
    
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
    resizeHeight("#fiche-produit .bloc-images");
    $(window).bind('resize',function () {
        //Update slider height on resize
        resizeHeight("#fiche-produit .bloc-images");
    });


    function resizeHeight(div){
        var height = $(div).height()+"px";
        var width = $(div).width()+"px";
        $(div).parent().css("height", height);
    }
    
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

    // Colonne sous menu
    $('.categorie.salle-a-manger').removeClass('col-md-2');
    $('.categorie.salle-a-manger').addClass('col-md-3');




});