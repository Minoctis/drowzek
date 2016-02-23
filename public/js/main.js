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
    
    
});