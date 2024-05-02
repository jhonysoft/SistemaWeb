$(document).ready(function(){
    $(".buscar").select2();
    
    $("#multi").select2({
        placeholder: "Ingrese nombres o apellido..."
    });
    
    $("#minimum").select2({
        minimumInputLength: 2
    });
    
});