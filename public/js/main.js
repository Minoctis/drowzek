jQuery(document).ready(function () {
    
    //Manipulation des images du sous menu
    
    
    // salle a manger
    $(".salle-a-manger")
    .mouseenter(function () {
        $("#salle-a-manger").css("display", "block");  
    })
    .mouseleave(function (){
        $("#salle-a-manger").css("display", "none");  
    })

    // Sejour
    $(".sejour")    
    .mouseenter(function () {
        $("#sejour").css("display", "block");  
    })
    .mouseleave(function (){
        $("#sejour").css("display", "none");  
    })

    $(".chambre") 
    .mouseenter(function () {
        $("#chambre").css("display", "block");  
    })
    .mouseleave(function (){
        $("#chambre").css("display", "none");  
    })
    
    


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